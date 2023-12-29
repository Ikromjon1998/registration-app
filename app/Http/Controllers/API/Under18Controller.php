<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Under18Resource;
use App\Models\Applicant;
use App\Services\Under18RegistrationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Under18Controller extends Controller
{
    public function __construct(private Under18RegistrationService $registrationService)
    {
    }

    public function store(Request $request, Applicant $applicant): JsonResponse
    {
        $validatedUnder18Data = $request->validate([
            'mother_first_name' => 'nullable|string|max:255',
            'mother_last_name' => 'nullable|string|max:255',
            'mother_phone_number' => 'nullable|string|max:255',
            'father_first_name' => 'nullable|string|max:255',
            'father_last_name' => 'nullable|string|max:255',
            'father_phone_number' => 'nullable|string|max:255',
            'parent_address' => 'nullable|string|max:255',
            'guardian_first_name' => 'nullable|string|max:255',
            'guardian_last_name' => 'nullable|string|max:255',
            'guardian_phone_number' => 'nullable|string|max:255',
        ]);

        $this->registrationService->register($applicant, $validatedUnder18Data);

        return response()->json([
            'message' => 'Under18 saved successfully',
            'applicantId' => $applicant->id,
            'under18' => new Under18Resource($applicant->under18),
        ], 201);
    }
}
