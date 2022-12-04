<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TreeDetail;

class TreeDetailFactory extends Factory
{
    protected $model = TreeDetail::class;

    public function definition()
    {
        return [
            'tall'          => mt_rand(0, 200),
            'cluster_id'    => $this->faker->numberBetween(1, 2),
            'year'          => $this->faker->numberBetween(2018, 2022),
        ];
    }
}
