<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
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

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    public static function getVisitDate($patient)
    {
        $careStepCount = $patient->careSteps->count();

        $schedule = $patient->schedules()->where('number', $careStepCount + 1)
            ->first();
        return $schedule->visit_date ?? null;
    }
}
