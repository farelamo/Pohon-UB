<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        return $this->call([
            UserSeeder::class,
            TreeTypeSeeder::class,
            LocationSeeder::class,
            ClusterSeeder::class,
            TreeDetailSeeder::class,
        ]);
    }
}
