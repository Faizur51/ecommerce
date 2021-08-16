<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create([
            'sl'=>1,
            'name'=>'Super Admin',

        ]);
        UserRole::create([
            'sl'=>2,
            'name'=>'Admin'
        ]);
        UserRole::create([
            'sl'=>3,
            'name'=>'User'
        ]);



    }
}
