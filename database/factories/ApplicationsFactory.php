<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ApplicationsFactory extends Factory
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
            'applications_code' => 'PRF' . $this->faker->unique()->numberBetween(),
            'property_code' => 'PROP' . $this->faker->numberBetween(1, 17),
            'type' => 'M',
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'dob' => $this->faker->date(),
            'pps_number' => $this->faker->unique()->numberBetween(1000000, 9999999) . 'MA',
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'city' => 'Dublin',
            'country' => 'Ireland',
            'postcode' => $this->faker->postcode(),
            'employment_status' => 'Employed',
            'employment_sector' => 'IT',
            'employment_position' => 'Developer',
            'employment_company' => $this->faker->company(),
            'employment_start_date' => $this->faker->date(),
            'income' => $this->faker->numberBetween(1000, 10000),
            'landlord_name' => $this->faker->name(),
            'landlord_phone' => $this->faker->phoneNumber(),
            'preferred_move_in_date' => $this->faker->date(),
            'notes' => $this->faker->text(),
            'waiting_list' => $this->faker->boolean('yes', 'no'),
        ];
    }
}
