<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategorieBaladeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //faker categorie balade           
            'name' => $this->faker->name(),
            'price' => $this->faker->randomDigit(100,500),
           
        ];
    }
}
