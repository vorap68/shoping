<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->title(5),
            'name_ua' => $this->faker->name(10),
            'name_ru' => $this->faker->name(10),
            'description_ua' => $this->faker->text('40'),
            'description_ua' => $this->faker->text('40'),
            'image' => $this->faker->imageUrl(),

        ];
    }
}
