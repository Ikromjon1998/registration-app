<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'gender' => fake()->randomElement(['M', 'F', 'D']),
            'birthday' => fake()->date,
            'birthplace_city' => fake()->city,
            'birthplace_country' => fake()->country,
            'citizenship' => fake()->country,
            'phone_number' => fake()->phoneNumber,
            'telephone_number' => fake()->phoneNumber,
            'email' => fake()->email,
            'is_photo_usage_accepted' => fake()->boolean,
        ];
    }
}
