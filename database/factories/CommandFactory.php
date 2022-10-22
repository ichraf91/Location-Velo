<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Bike;

class CommandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       return [

                       // 'user_id'=> App\User::pluck('id')->random(),
                       'user-id' => $this->faker->randomDigit,
                        'bike-id' => $this->faker->randomDigit,
                        'dateL' => $this->faker->dateTime($max = 'now'),
                        'dateR' => $this->faker->dateTime($max = 'now'),
                        'prixTTC' => $this->faker->randomDigit(100,500),
                        'notes' => $this->faker->text(300),


                    ];
    }
}
