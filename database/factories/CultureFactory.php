<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CultureFactory extends Factory
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
//            'place_id' => $this->faker->numberBetween(1, 25),
            'termin' => $this->faker->randomElement(["5", "14", "30"]),
            'culture' => $this->faker->randomElement(['SOY', 'BARLEY', 'CORN']),
            'type' => $this->faker->randomElement(['SELLING', 'BUYING']),
            'status' => $this->faker->randomElement(['IN_PROGRESS', 'STOPED', 'HOLDING']),
            'delivery' => $this->faker->randomElement(['CPT', 'FCA', 'EXW']),
            'price' => $this->faker->numberBetween(670, 2530),
            'weight' => $this->faker->numberBetween(1, 2000),
            'lat' => $this->faker->randomFloat(6,44.121487, 52.711661),
            'lng' => $this->faker->randomFloat(6,21.749725, 40.615880),
        ];
    }
}
