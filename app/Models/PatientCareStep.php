<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientCareStep extends Model
{
    protected $fillable = [
        'patient_id',
        'type',
        'step_number',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
