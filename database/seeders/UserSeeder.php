<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker=Factory::create();

        User::create([
            'role_id'=>1,
            'name'=>$faker->name,
            'email'=>'admin@gmail.com',
            'mobile'=>'01717578265',
            'password'=>Hash::make('123456'),
            'status'=>'active'
        ]);

        foreach(range(1,10) as $index){

            User::create([
                'name'=>$faker->name,
                'email'=>$faker->unique()->email,
                'password'=>Hash::make('12345678'),
                'status'=>randomStatus()
            ]);

        }



    }
}
