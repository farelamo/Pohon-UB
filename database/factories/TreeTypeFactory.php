<?php

namespace Database\Factories;

use App\Models\TreeType;
use Illuminate\Database\Eloquent\Factories\Factory;

class TreeTypeFactory extends Factory
{

    protected $model = TreeType::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
