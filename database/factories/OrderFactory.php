<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


class OrderFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'status' => random_int(0, 1),
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'user_id' => User::inRandomOrder()->first()->id,

        ];
    }
}
