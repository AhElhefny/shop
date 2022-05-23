<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function Symfony\Component\Translation\t;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->paragraph(2),
            'price' => $this->faker->numberBetween(50,400),
            'amount' => $this->faker->numberBetween(0,100),
            'category_id' => $this->faker->numberBetween(1,13),
        ];
    }
}
