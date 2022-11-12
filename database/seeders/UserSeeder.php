<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            [
                'name'     => 'admin1', 
                'email'    => 'admin1@gmail.com',
                'password' => bcrypt('rahasiabro')
            ],
            [
                'name'     => 'admin2',
                'email'    => 'admin2@gmail.com',
                'password' => bcrypt('rahasiabro')
            ],
        ]);
    }
}
