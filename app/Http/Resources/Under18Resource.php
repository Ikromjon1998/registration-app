<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Under18Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array(
            'motherFirstName' => $this->resource->mother_first_name,
            'motherLastName' => $this->resource->mother_last_name,
            'motherPhoneNumber' => $this->resource->mother_phone_number,
            'fatherFirstName' => $this->resource->father_first_name,
            'fatherLastName' => $this->resource->father_last_name,
            'fatherPhoneNumber' => $this->resource->father_phone_number,
            'parentAddress' => $this->resource->parent_address,
            'guardianFirstName' => $this->resource->guardian_first_name,
            'guardianLastName' => $this->resource->guardian_last_name,
            'guardianPhoneNumber' => $this->resource->guardian_phone_number,
        );
    }
}
