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
        return [
            'mother_first_name' => $this->mother_first_name,
            'mother_last_name' => $this->mother_last_name,
            'mother_phone_number' => $this->mother_phone_number,
            'father_first_name' => $this->father_first_name,
            'father_last_name' => $this->father_last_name,
            'father_phone_number' => $this->father_phone_number,
            'parent_address' => $this->parent_address,
            'guardian_first_name' => $this->guardian_first_name,
            'guardian_last_name' => $this->guardian_last_name,
            'guardian_phone_number' => $this->guardian_phone_number,
        ];
    }
}
