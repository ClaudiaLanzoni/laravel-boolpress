<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\UserInfo;

class UserInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        

        for ($i= 1 ; $i < 18 ; $i++){
            $newUserInfo = new UserInfo();

            $newUserInfo->user_id= $i;
            $newUserInfo->address=$faker->address();
            $newUserInfo->country=$faker->words(1,true);
            $newUserInfo->phone=$faker->randomNumber(5);

            $newUserInfo->save();
        }
        
    }
}
