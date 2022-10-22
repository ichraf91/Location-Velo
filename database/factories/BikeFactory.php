<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      return [
                 'marque'=> $this->faker->company,
                 'model' => $this->faker->year,
                 'prixJ' => $this->faker->randomNumber(),
                 'dispo' => $this->faker->randomDigit(0,1),

             ];
    }
}
