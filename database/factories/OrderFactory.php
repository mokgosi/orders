<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'description' => $this->faker->word(),
            'quantity' => $this->faker->randomDigit(),
            'tracking_code' => $this->faker->ean8(),
            'contact_number' => $this->faker->e164PhoneNumber(),
            'address' => $this->faker->address(),
        ];
    }
}
