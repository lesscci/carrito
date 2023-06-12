<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        
        User::create([
            'name' => 'Natalie',
            'email' => 'natalie@natalie.com',
            'password' => bcrypt('password'),
        ]);

    }
}
