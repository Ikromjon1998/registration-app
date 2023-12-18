<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Under18;
use App\Service\Under18RegistrationService;
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
        ], 201);
    }

    public function update(Request $request, Applicant $applicant, Under18 $under18)
    {
        if ($applicant->id !== $under18->applicant_id) {
            return response()->json([
                'message' => 'Applicant id and Under18 applicant_id do not match',
            ], 400);
        }

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

        $under18->update($validatedUnder18Data);

        return response()->json([
            'message' => 'Under18 updated successfully',
            'applicantId' => $under18->applicant->id,
            'under18' => $under18,
        ], 200);
    }
}
