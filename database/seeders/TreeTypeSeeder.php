<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TreeType;

class TreeTypeSeeder extends Seeder
{

    public function run()
    {
        return TreeType::factory()->count(5)->create();
    }
}
