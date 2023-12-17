<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApprenticeshipResource;
use App\Models\Applicant;
use App\Models\Apprenticeship;
use Illuminate\Http\Request;

class ApprenticeshipController extends Controller
{
    public function update(Request $request, Applicant $applicant, Apprenticeship $apprenticeship)
    {
        if ($applicant->id !== $apprenticeship->applicant_id) {
            return response()->json([
                'message' => 'Applicant id and Apprenticeship applicant_id do not match',
            ], 400);
        }

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

        $apprenticeship->update($validatedApprenticeship);

        return response()->json(data: [
            'message' => 'Apprenticeship updated successfully',
            'applicantId' => $applicant->id,
            'apprenticeship' => new ApprenticeshipResource($apprenticeship),
        ], status: 200);
    }
}
