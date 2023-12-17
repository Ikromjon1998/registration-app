<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'applicant_id',
        'graduation_type',
        'latest_school_name',
        'graduation_year',
        'completed_course_name', // Like Python programming
        'completed_education', // Like Fachinformatiker Anwendungsentwicklung
        'new_in_school', // newcomer in school, "I was already in school, but I changed the school", "I study in the same school"
    ];

    public function applicant(): BelongsTo
    {
        return $this->belongsTo(Applicant::class);
    }
}
