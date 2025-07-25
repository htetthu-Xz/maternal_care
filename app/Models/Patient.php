<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medicalHistory()
    {
        return $this->hasOne(MedicalHistory::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function careSteps()
    {
        return $this->hasMany(PatientCareStep::class);
    }

    public function transfers()
    {
        return $this->hasMany(Transfer::class);
    }
}
