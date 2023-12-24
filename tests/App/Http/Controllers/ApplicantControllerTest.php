<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApplicantControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testRegisterWithValidData()
    {
        $applicantData = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'gender' => 'M',
            'birthday' => '1990-01-01',
            'birthplace_city' => 'Los Angeles',
            'birthplace_country' => 'USA',
            'citizenship' => 'USA',
            'phone_number' => '+1-900-123-4567',
            'telephone_number' => '+1-900-890-1234',
            'email' => 'jon.tz@iu.com',
            'is_photo_usage_accepted' => true,
        ];

        $response = $this->postJson('/api/applicants/register', $applicantData);

        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => 'Applicant created successfully',
            ]);

        $this->assertDatabaseHas('applicants', ['email' => 'jon.tz@iu.com']);
    }

    // Test a registration request with invalid data
    public function testRegisterWithInvalidData()
    {
        $applicantData = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'gender' => 'Z', // Invalid gender value
            'birthday' => '1990-01-01',
            'birthplace_city' => 'Los Angeles',
            'birthplace_country' => 'USA',
            'citizenship' => 'USA',
            'phone_number' => '+1-900-123-4567',
            'telephone_number' => '+1-900-890-1234',
            'email' => 'john.doe@example.com',
            'is_photo_usage_accepted' => true,
        ];

        $response = $this->postJson('/api/applicants/register', $applicantData);

        $response->assertStatus(422); // When validation fails, Laravel returns status 422
    }

    // Test a registration request with an email address that already exists
    public function testRegisterWithExistingEmail()
    {
        $applicant = Applicant::factory()->create();

        $applicantData = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'gender' => 'M',
            'birthday' => '1990-01-01',
            'birthplace_city' => 'Los Angeles',
            'birthplace_country' => 'USA',
            'citizenship' => 'USA',
            'phone_number' => '+1-900-123-4567',
            'telephone_number' => '+1-900-890-1234',
            'email' => $applicant->email,
            'is_photo_usage_accepted' => true,
        ];

        $response = $this->postJson('/api/applicants/register', $applicantData);

        $response->assertStatus(400);
    }
}
