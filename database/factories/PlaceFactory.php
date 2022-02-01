<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'place_type' => $this->faker->randomElement(['COMORA', 'ELEVATOR', 'ZAVOD']),
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'lat' => $this->faker->randomFloat(6,44.121487, 52.711661),
            'lng' => $this->faker->randomFloat(6,21.749725, 40.615880),
        ];
    }
}
