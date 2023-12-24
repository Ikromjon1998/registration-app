<?php

namespace App\Http\Controllers;

use App\Http\Resources\EducationResource;
use App\Models\Applicant;
use App\Models\Education;
use App\Services\EducationRegistrationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function __construct(private EducationRegistrationService $registrationService)
    {
    }

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

        $this->registrationService->register($applicant, $validatedEducation);

        return response()->json([
            'message' => 'Education saved successfully',
            'applicantId' => $applicant->id,
            'education' => new EducationResource($applicant->education),
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
    public function update(Request $request, Education $education)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        //
    }
}
