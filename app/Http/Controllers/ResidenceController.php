<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResidenceResource;
use App\Models\Applicant;
use App\Models\Residence;
use Illuminate\Http\Request;

class ResidenceController extends Controller
{
    public function update(Request $request, Applicant $applicant, Residence $residence)
    {
        if ($applicant->id !== $residence->applicant_id) {
            return response()->json([
                'message' => 'Applicant id and Residence applicant_id do not match',
            ], 400);
        }

        $validatedResidence = $request->validate([
            'street' => 'required|string|max:255',
            'house_number' => 'required|string|max:6',
            'city' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'live_by' => 'nullable|string|max:100', // nullable
            'person_in_case_of_emergency' => 'nullable|string|max:255', // nullable
            'phone_number_in_case_of_emergency' => 'nullable|string|max:255', // nullable
        ]);

        $residence->update($validatedResidence);

        return response()->json([
            'message' => 'Residence updated successfully',
            'applicant_id' => $residence->applicant->id,
            'residence' => new ResidenceResource($residence),
        ], 200);
    }
}
