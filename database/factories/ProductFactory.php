<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name_ua'=> $this->faker->name(10),
            'name_ru'=> $this->faker->name(10),
            'description_ua' => $this->faker->text('40'),
            'description_ua' => $this->faker->text('40'),
            'image' => $this->faker->imageUrl(),
            'price' =>random_int(50,400),
            'count' => random_int(5,20),
        ];
    }
}
