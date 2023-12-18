<?php

namespace App\Service;

use App\Models\Applicant;
use App\Models\Under18;

class Under18RegistrationService implements \RegisterComponentInterface
{
    public function register(Applicant $applicant, array $validatedData): void
    {
        $under18 = new Under18($validatedData);
        $applicant->under18()->save($under18);
    }
}
