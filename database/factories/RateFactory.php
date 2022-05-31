<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function Symfony\Component\Translation\t;

class RateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' =>$this->faker->numberBetween(1,20),
            'user_id' =>$this->faker->numberBetween(1,10),
            'review' => $this->faker->text,
            'amount' => $this->faker->numberBetween(1,5),
        ];
    }
}
