<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApplicantResource;
use App\Models\Applicant;
use App\Models\Apprenticeship;
use App\Models\Education;
use App\Models\Residence;
use App\Models\Under18;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function register(Request $request): \Illuminate\Http\JsonResponse
    {
        // validate email in applicants table
        $validatedApplicantData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:M,F,D',
            'birthday' => 'required|date',
            'birthplace_city' => 'required|string|max:255',
            'birthplace_country' => 'required|string|max:255',
            'citizenship' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'telephone_number' => 'nullable|string|max:255',
            'email' => 'required|email:rfc,dns|max:255',
            'is_photo_usage_accepted' => 'required|boolean',
        ]);

        if ($validatedApplicantData['is_photo_usage_accepted'] === false) {
            return response()->json([
                'message' => 'Photo usage must be accepted',
            ], 400);
        }

        // if email is in applicants table, return error
        if (Applicant::where('email', $validatedApplicantData['email'])->exists()) {
            return response()->json([
                'message' => 'Email already exists',
                'applicant' => new ApplicantResource(Applicant::where('email', $validatedApplicantData['email'])->first()),
            ], 400);
        }

        // it is wrong here
        $applicant = new Applicant($validatedApplicantData);
        $applicant->save();

        // Create a new Residence associated with the Applicant
        $residence = new Residence();
        $applicant->residence()->save($residence);

        $unter18 = new Under18();
        $applicant->under18()->save($unter18);

        $apprenticeship = new Apprenticeship();
        $applicant->apprenticeship()->save($apprenticeship);

        $education = new Education();
        $applicant->education()->save($education);


        return response()->json([
            'message' => 'Applicant created successfully',
            'applicantId' => $applicant->id,
            'residenceId' => $applicant->residence->id,
            'under18Id' => $applicant->under18->id,
            'apprenticeshipId' => $applicant->apprenticeship->id,
            'educationId' => $applicant->education->id,
        ], 201);
    }

    public function test(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'message' => 'Applicant created successfully',
        ], 201);
    }
}
