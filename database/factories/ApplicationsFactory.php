<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applications>
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
            'application_id' => 'AP' . $this->faker->unique()->numberBetween(1, 100),
            'prs_code' => 'PRS' . $this->faker->numberBetween(1, 3),
            'status' => $this->faker->randomElement(['New', 'In Progress', 'Approved', 'Declined', 'Cancelled', 'Withdrawn', 'Archived']),
        ];
    }
}
