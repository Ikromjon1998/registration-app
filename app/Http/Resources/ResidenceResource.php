<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResidenceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'applicantId' => $this->resource->applicant_id,
            'street' => $this->resource->street,
            'houseNumber' => $this->resource->house_number,
            'city' => $this->resource->city,
            'zipCode' => $this->resource->zip_code,
            'liveBy' => $this->resource->live_by,
            'personInCaseOfEmergency' => $this->resource->person_in_case_of_emergency,
            'phoneNumberInCaseOfEmergency' => $this->resource->phone_number_in_case_of_emergency,
        ];
    }
}
