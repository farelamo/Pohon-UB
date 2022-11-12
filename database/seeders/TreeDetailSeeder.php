<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TreeDetail;

class TreeDetailSeeder extends Seeder
{
    public function run()
    {
        return TreeDetail::factory()->count(5)->create();
    }
}
