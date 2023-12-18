<?php

namespace App\Http\Controllers;

use App\Http\Resources\EducationResource;
use App\Models\Applicant;
use App\Models\Education;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Applicant $applicant): JsonResponse
    {
        $validatedEducation = $request->validate([
            'graduation_type' => 'required|string|max:255',
            'latest_school_name' => 'required|string|max:255',
            'graduation_year' => 'required|string|max:255',
            'completed_course_name' => 'required|string|max:255',
            'completed_education' => 'required|string|max:255',
            'new_in_school' => 'required|string|max:255',
        ]);

        $education = new Education($validatedEducation);
        $applicant->education()->save($education);

        return response()->json([
            'message' => 'Education saved successfully',
            'applicantId' => $applicant->id,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Applicant $applicant, Education $education)
    {
        if ($applicant->id !== $education->applicant_id) {
            return response()->json([
                'message' => 'Applicant id and Education applicant_id do not match',
            ], 400);
        }

        $validatedEducation = $request->validate([
            'street' => 'required|string|max:255',
            'house_number' => 'required|string|max:6',
            'city' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'live_by' => 'nullable|string|max:100', // nullable
            'person_in_case_of_emergency' => 'nullable|string|max:255', // nullable
            'phone_number_in_case_of_emergency' => 'nullable|string|max:255', // nullable
        ]);

        $education->update($validatedEducation);

        return response()->json([
            'message' => 'Residence updated successfully',
            'applicantId' => $education->applicant->id,
            'education' => new EducationResource($education),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        //
    }
}
