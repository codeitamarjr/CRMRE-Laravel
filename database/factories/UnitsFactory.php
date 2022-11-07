<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Units>
 */
class UnitsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'property_code' => 'PROP' . $this->faker->unique($reset = true)->numberBetween(1, 3),
            'unit_code' => 'UNIT' . $this->faker->randomNumber(4),
            'type' => 'Apartment',
            'block' => 'Block ' . $this->faker->numberBetween(1, 10),
            'floor' => $this->faker->numberBetween(1, 10),
            'number' => $this->faker->numberBetween(1, 100),
            'bedrooms' => $this->faker->numberBetween(1, 5),
            'car_spaces' => $this->faker->numberBetween(0, 1),
            'date_available' => $this->faker->date(),
            'status' => 'For Rent',
        ];
    }
}