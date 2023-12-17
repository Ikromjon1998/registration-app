<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'graduationType' => $this->resource->graduation_type,
            'latestSchoolName' => $this->resource->latest_school_name,
            'graduationYear' => $this->resource->graduation_year,
            'completedCourseName' => $this->resource->completed_course_name,
            'completedEducation' => $this->resource->completed_education,
            'newInSchool' => $this->resource->new_in_school,
        ];
    }
}
