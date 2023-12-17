<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Under18;
use Illuminate\Http\Request;

class Under18Controller extends Controller
{
    /**
     * $table->uuid('applicant_id');
     * $table->string('mother_first_name')->nullable();
     * $table->string('mother_last_name')->nullable();
     * $table->string('mother_phone_number')->nullable();
     * $table->string('father_first_name')->nullable();
     * $table->string('father_last_name')->nullable();
     * $table->string('father_phone_number')->nullable();
     * $table->string('parent_address')->nullable();
     * $table->string('guardian_first_name')->nullable();
     * $table->string('guardian_last_name')->nullable();
     * $table->string('guardian_phone_number')->nullable();
     */
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
