<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'prs_code' => 'PRS' . $this->faker->numberBetween(1, 3),
            'client_code' => 'CLT' . $this->faker->numberBetween(1, 2),
            'name' => $this->faker->company() . ' Homes',
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'city' => 'Dublin',
            'country' => 'Ireland',
            'website' => $this->faker->url(),
        ];
    }
}