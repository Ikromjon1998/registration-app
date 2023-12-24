<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApprenticeshipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'apprenticeAs' => $this->resource->apprentice_as,
            'companyName' => $this->resource->company_name,
            'companyStreet' => $this->resource->company_street,
            'companyHouseNumber' => $this->resource->company_house_number,
            'contactPerson' => $this->resource->contact_person,
            'companyPhoneNumber' => $this->resource->company_phone_number,
            'companyFaxNumber' => $this->resource->company_fax_number,
            'companyEmail' => $this->resource->company_email,
            'apprenticeWishWeekDays1' => $this->resource->apprentice_wish_week_days1_1,
            'apprenticeWishWeekDays2' => $this->resource->apprentice_wish_week_days1_2,
        ];
    }
}
