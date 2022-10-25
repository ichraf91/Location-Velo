<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BaladeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'mobile' => $this->faker->phoneNumber,
        ];
    }
}
