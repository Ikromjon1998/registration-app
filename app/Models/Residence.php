<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'applicant_id',
        'street',
        'house_number',
        'city',
        'zip_code',
        'country',
        'live_by',
        'person_in_case_of_emergency',
        'phone_number_in_case_of_emergency',
    ];

}
