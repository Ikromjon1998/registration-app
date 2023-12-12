<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appicant extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'gender',
        'birthday',
        'birthplace_city',
        'birthplace_country',
        'citizenship',
        'phone_number',
        'telephone_number',
        'email',
        'is_photo_usage_accepted',
    ];
}
