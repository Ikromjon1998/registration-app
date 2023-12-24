<?php

namespace App\Services;

use App\Models\Applicant;
use App\Models\Education;

class EducationRegistrationService implements RegisterComponentInterface
{
    public function register(Applicant $applicant, array $validatedData): void
    {
        $education = new Education($validatedData);
        $applicant->education()->save($education);
    }
}
