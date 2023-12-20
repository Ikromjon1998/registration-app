<?php

namespace App\Services;

use App\Models\Applicant;

interface RegisterComponentInterface
{
    public function register(Applicant $applicant, array $validatedData): void;
}
