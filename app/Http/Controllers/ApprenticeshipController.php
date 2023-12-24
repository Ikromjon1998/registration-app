<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApprenticeshipResource;
use App\Models\Applicant;
use App\Services\ApprenticeshipRegistrationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApprenticeshipController extends Controller
{
    public function __construct(private ApprenticeshipRegistrationService $registrationService)
    {
    }

    public function store(Request $request, Applicant $applicant): JsonResponse
    {
        $validatedApprenticeship = $request->validate([
            'apprentice_as' => 'required|string|max:4',
            'company_name' => 'required|string|max:255',
            'company_street' => 'required|string|max:255',
            'company_house_number' => 'required|string|max:6',
            'contact_person' => 'required|string|max:255',
            'company_phone_number' => 'required|string|max:255',
            'company_fax_number' => 'nullable|string|max:255',
            'company_email' => 'nullable|string|max:255',
            'apprentice_wish_week_days1' => 'required|string|max:255',
            'apprentice_wish_week_days2' => 'nullable|string|max:255',
        ]);

        $this->registrationService->register($applicant, $validatedApprenticeship);

        return response()->json(data: [
            'message' => 'Apprenticeship saved successfully',
            'applicantId' => $applicant->id,
            'apprenticeship' => new ApprenticeshipResource($applicant->apprenticeship),
        ], status: 201);
    }
}
