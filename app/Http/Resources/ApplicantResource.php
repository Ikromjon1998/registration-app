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
        /***
         * 'user_id',
         * 'first_name',
         * 'last_name',
         * 'gender',
         * 'birthday',
         * 'birthplace_city',
         * 'birthplace_country',
         * 'citizenship',
         * 'phone_number',
         * 'telephone_number',
         * 'email',
         * 'is_photo_usage_accepted',
         */
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'birthplace_city' => $this->birthplace_city,
            'birthplace_country' => $this->birthplace_country,
            'citizenship' => $this->citizenship,
            'phone_number' => $this->phone_number,
            'telephone_number' => $this->telephone_number,
            'email' => $this->email,
            'is_photo_usage_accepted' => $this->is_photo_usage_accepted,
        ];
    }
}
