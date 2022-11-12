<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TreeType;

class TreeTypeFactory extends Factory
{
    protected $model = TreeType::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word()
        ];
    }
}
