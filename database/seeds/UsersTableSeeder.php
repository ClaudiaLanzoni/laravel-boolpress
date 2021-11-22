<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = new User();
        $user->name = 'claudiaz';
        $user->email = 'claudiaz@gmanzo.com';
        $user->password = bcrypt('claudia1234');
        $user->save();
        
        for ($i= 0 ; $i<16 ; $i++){
            $newUser = new User();

            $newUser->name = $faker->userName();
            $newUser->email = $faker->safeEmail();
            $newUser->password = bcrypt($faker->password(9,12));
            $newUser->save();
        }
    }
}
