<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TreeType;

class TreeTypeSeeder extends Seeder
{
    public function run()
    {
        TreeType::factory()->count(5)->create();
    }
}
