<?php

use Illuminate\Database\Seeder;

use App\Models\Post; //aggiunta
use App\Models\Category; //aggiunta

use Faker\Generator as Faker; //aggiunta

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) //aggiunti
    {


        // Sto creando un array di tutti e soli gli id di category
        $category_ids = Category::pluck('id')->toArray();


        for ($i = 0; $i < 40; $i++) {

            $newPost = new Post();

            $newPost->title = $faker->words(4, true);
            $newPost->author = $faker->name();
            $newPost->post_content = $faker->paragraphs(6, true);
            $newPost->post_date = $faker->dateTime();
            $newPost->url = $faker->imageUrl(400, 300);
            $newPost->category_id = Arr::random($category_ids);

            $newPost->save();
        }
    }
}
