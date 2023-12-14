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
            'applicant_id' => $this->applicant_id,
            'street' => $this->street,
            'house_number' => $this->house_number,
            'city' => $this->city,
            'zip_code' => $this->zip_code,
            'live_by' => $this->live_by,
            'person_in_case_of_emergency' => $this->person_in_case_of_emergency,
            'phone_number_in_case_of_emergency' => $this->phone_number_in_case_of_emergency,
        ];
    }
}
