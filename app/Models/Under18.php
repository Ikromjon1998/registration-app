<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Under18 extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'applicant_id',
        'mother_first_name',
        'mother_last_name',
        'mother_phone_number',
        'father_first_name',
        'father_last_name',
        'father_phone_number',
        'parent_address',
        'guardian_first_name',
        'guardian_last_name',
        'guardian_phone_number',
    ];

    public function applicant(): BelongsTo
    {
        return $this->belongsTo(Applicant::class);
    }
}
