<template>
    <div class="card">
        <div>
            <div class="card-header"> {{ post.title }}  </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p> {{ post.post_content }} </p>
                    
                    <footer class="blockquote-footer">
                        Scritto da <cite title="Source Title">{{ post.author }}</cite>
                        il <time>{{ post.post_date }}</time>
                    </footer>
                </blockquote>
            </div>
        </div>
        
    </div>
</template>

<script>
export default {
    name: 'PostCard',
    props: ['post']
}
</script>

<style>
</style>