<?php

namespace App\Services;

use App\Models\Applicant;
use App\Models\Residence;

class ResidenceRegistrationService implements RegisterComponentInterface
{
    public function register(Applicant $applicant, array $validatedData): void
    {
        $residence = new Residence($validatedData);
        $applicant->residence()->save($residence);
    }
}
