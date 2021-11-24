<template>
    <section id="post-list" class="my-3 p-2">
        <h2 class="my-3">I miei post:</h2>
        
        <PostCard v-for="post in posts" :key="post.id" :post="post" class="p-2 my-4"/>

    </section>
</template>

<script>
import PostCard from './PostCard.vue';
export default {
    name: 'PostList',
    components : {
        PostCard
    },
    data(){
        return{
            posts : [],
            baseUri : 'http://127.0.0.1:8000',
            // `${this.baseUri}/api/posts/`
        }
    }, 
    methods:{
        getPostList(){
            axios.get(`http://localhost:8000/api/index`)
            .then((res) => {
                // eseguo solo quando la chiamata axios ha successo e res sarà la risposta
                this.posts = res.data.posts;
                
                console.log(res.data.posts[0]);
            })
            .catch((err)=> {
                // eseguo solo quando la chiamata axios non ha successo e l'errore sarà err
                console.error(err);
            })
            .then(()=>{
                // eseguo sempre indipendemente dall'andamento della chiamata axios
            });
        }
    },
    mounted() {
        this.getPostList();
    }
}
</script>

<style lang="scss" scoped>
    
</style>