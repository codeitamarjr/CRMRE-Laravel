<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Properties>
 */
class PropertiesFactory extends Factory
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
            'property_code' => 'PROP' . $this->faker->numberBetween(1, 3),
            'client_code' => 'CLT' . $this->faker->numberBetween(1, 2),
            'type' => 'Apartment',
            'status' => 'For Rent',
            'name' => 'Building ' . $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'city' => 'Dublin',
            'country' => 'Ireland',
            'website' => $this->faker->url(),
            'description' => $this->faker->text(),
            'email_code' => 'MAIL' . $this->faker->numberBetween(1, 5),
        ];
    }
}