<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enquiries>
 */
class EnquiriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name();
        // $property_code = $this->faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']);
        $property_code = 'PROP' . $this->faker->numberBetween(1, 3);
        $email = $this->faker->email();
        return [
            //
            'email_code' => 'EMAIL0001',
            'enquiry_id' => 'ENQ' . $this->faker->unique()->numberBetween(),
            'prs_code' => 'PRS' . $this->faker->numberBetween(1, 3),
            'property_code' => $property_code,
            'email' => $email,
            'title' => 'Enquiry from ' . $name . ' on Daft.ie | Apartment Share | ' . $property_code,
            'date' => $this->faker->dateTime(),
            'body' => $this->faker->paragraph(10),
            'contact_phone' => $this->faker->phoneNumber(),
            'contact_name' => $name,
            'contact_email' => $email,
            'status' => 'New',
        ];
    }
}
