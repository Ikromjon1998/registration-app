<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Residence>
 */
class ResidenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'applicant_id' => ApplicantFactory::inRandomOrder()->first()->id,
            'street' => fake()->streetName,
            'house_number' => fake()->buildingNumber,
            'city' => fake()->city,
            'zip_code' => fake()->postcode,
            'live_by' => fake()->sentence,
            'person_in_case_of_emergency' => fake()->name,
            'phone_number_in_case_of_emergency' => fake()->phoneNumber,
        ];
    }
}
