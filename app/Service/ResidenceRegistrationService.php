<?php

namespace App\Service;

use App\Models\Applicant;
use App\Models\Residence;
use RegisterComponentInterface;

class ResidenceRegistrationService implements RegisterComponentInterface
{
    public function register(Applicant $applicant, array $validatedData): void
    {
        $residence = new Residence($validatedData);
        $applicant->residence()->save($residence);
    }
}
