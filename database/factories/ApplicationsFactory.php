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
            'application_id' => 'AP' . $this->faker->unique()->numberBetween(),
            'prs_code' => 'PRS' . $this->faker->numberBetween(1, 3),
            'property_code' => 'PROP' . $this->faker->numberBetween(1, 17),
            'type' => $this->faker->randomElement(['Main', 'Joint', 'Guarantor']),
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'dob' => $this->faker->date(),
            'pps_number' => $this->faker->unique()->numberBetween(1000000, 9999999) . 'MA',
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'city' => 'Dublin',
            'country' => 'Ireland',
            'postcode' => $this->faker->postcode(),
            'employment_status' => $this->faker->randomElement(['Employed', 'Self-Employed', 'Unemployed', 'Student', 'Retired']),
            'employment_sector' => $this->faker->randomElement(['Accounting', 'Banking', 'Construction', 'Education', 'Engineering', 'Finance', 'Healthcare', 'Hospitality', 'IT', 'Legal', 'Manufacturing', 'Marketing', 'Media', 'Property', 'Retail', 'Sales', 'Science', 'Transport', 'Other']),
            'employment_position' => $this->faker->jobTitle(),
            'employment_company' => $this->faker->company(),
            'employment_phone' => $this->faker->phoneNumber(),
            'employment_start_date' => $this->faker->date(),
            'income' => $this->faker->numberBetween(1000, 10000),
            'landlord_name' => $this->faker->name(),
            'landlord_phone' => $this->faker->phoneNumber(),
            'preferred_move_out_date' => $this->faker->date(),
            'car' => $this->faker->numberBetween(0, 1),
            'pet' => $this->faker->numberBetween(0, 1),
            'pet_breed' => $this->faker->randomElement(['Dog', 'Cat', 'Bird', 'Fish', 'Rabbit']),
            'children' => $this->faker->numberBetween(0, 1),
            'children_age' => $this->faker->numberBetween(1, 18),
            'HAP' => $this->faker->randomElement(['yes', 'no']),
            'HAP_allowance' => $this->faker->numberBetween(100, 1000),
            'notes' => $this->faker->text(),
            'waiting_list' => $this->faker->randomElement(['yes', 'no']),
            'status' => $this->faker->randomElement(['New', 'In Progress', 'Approved', 'Declined', 'Cancelled', 'Withdrawn', 'Archived']),
        ];
    }
}
