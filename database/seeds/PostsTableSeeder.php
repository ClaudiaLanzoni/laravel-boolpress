<?php

use Illuminate\Database\Seeder;

use App\Models\Post; //aggiunta

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
        for ($i = 0; $i < 40; $i++) {

            $newPost = new Post();

            $newPost->title = $faker->words(4, true);
            $newPost->author = $faker->name();
            $newPost->post_topic = $faker->words(3, true);
            $newPost->post_content = $faker->paragraphs(6, true);
            $newPost->post_date = $faker->dateTime();
            $newPost->url = $faker->imageUrl(400, 300);

            $newPost->save();
        }
    }
}
