<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryNames = ['HTML', 'PHP' , 'Java', 'JS', 'MySQL', 'Oracle', 'Vue', 'Laravel', 'Bootstrap'];
        
        foreach($categoryNames as $name){
            $category = new Category();

            $category->name = $name;
            $category->save();
        }
    }
}
