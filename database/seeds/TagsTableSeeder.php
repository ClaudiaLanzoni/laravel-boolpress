<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Tag;


class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tagIds = Tag::pluck('id')->toArray();

        $tagNames = ['#frontie', '#backie', '#aihie', '#kitschy', '#finnicky', '#funnily', 
        '#feminist', '#realMenAreFeminists'];

        

        for ($i = 0; $i < 8; $i++) {
           
            $newTag = new Tag();

            $newTag->name = $tagNames[array_rand($tagNames)];
    
            $newTag->color = $faker->hexColor();

            $newTag->save();
        }
            
    }
    };
