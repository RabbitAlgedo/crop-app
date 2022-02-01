<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CulturePriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => '',
            'price_sell' => '',
            'price_buy' => '',
            'date' => ''
        ];
    }
}
