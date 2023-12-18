<?php

namespace App\Service;

use App\Models\Applicant;
use App\Models\Apprenticeship;

class ApprenticeshipRegistrationService implements \RegisterComponentInterface
{
    public function register(Applicant $applicant, array $validatedData): void
    {
        $apprenticeship = new Apprenticeship($validatedData);
        $applicant->apprenticeship()->save($apprenticeship);
    }
}
