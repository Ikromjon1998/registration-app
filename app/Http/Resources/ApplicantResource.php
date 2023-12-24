<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'firstName' => $this->resource->first_name,
            'lastName' => $this->resource->last_name,
            'gender' => $this->resource->gender,
            'birthday' => $this->resource->birthday,
            'birthplaceCity' => $this->resource->birthplace_city,
            'birthplaceCountry' => $this->resource->birthplace_country,
            'citizenship' => $this->resource->citizenship,
            'phoneNumber' => $this->resource->phone_number,
            'telephoneNumber' => $this->resource->telephone_number,
            'email' => $this->resource->email,
            'isPhotoUsageAccepted' => $this->resource->is_photo_usage_accepted,
        ];
    }
}
