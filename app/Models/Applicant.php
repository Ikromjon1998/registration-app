<?php

namespace App\Models;

use App\Events\ApplicantCreated;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Applicant extends Model
{
    use HasFactory, HasUuids, Notifiable;

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

    public function information(): string
    {
        return $this->first_name.' '.$this->last_name.' '.$this->email;
    }

    protected $dispatchesEvents = [
        'created' => ApplicantCreated::class,
    ];

    public function residence(): HasOne
    {
        return $this->hasOne(Residence::class);
    }

    public function under18(): HasOne
    {
        return $this->hasOne(Under18::class);
    }

    public function apprenticeship(): HasOne
    {
        return $this->hasOne(Apprenticeship::class);
    }

    public function education(): HasOne
    {
        return $this->hasOne(Education::class);
    }
}
