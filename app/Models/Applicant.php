<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Applicant extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    protected bool $primaryKeyIsUuid = true;
    protected $fillable = [
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

    public function residence(): HasOne
    {
        return $this->hasOne(Residence::class);
    }

    public function under18(): HasOne
    {
        return $this->hasOne(Under18::class);
    }
}
