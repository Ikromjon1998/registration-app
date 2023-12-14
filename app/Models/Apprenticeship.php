<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprenticeship extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'applicant_id',
        'apprentice_as',
        'apprentice_company',
        'apprentice_company_street',
        'apprentice_company_house_number',
        'contact_person',
        'company_phone_number',
        'company_fax_number',
        'company_email',
        'apprentice_wish_week_days1_1',
        'apprentice_wish_week_days1_2',
    ];
}
