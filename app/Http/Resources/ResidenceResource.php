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
            'house_number' => $this->resource->house_number,
            'city' => $this->resource->city,
            'zip_code' => $this->resource->zip_code,
            'live_by' => $this->resource->live_by,
            'person_in_case_of_emergency' => $this->resource->person_in_case_of_emergency,
            'phone_number_in_case_of_emergency' => $this->resource->phone_number_in_case_of_emergency,
        ];
    }
}
