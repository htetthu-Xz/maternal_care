<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientCareStep;

class CareStepController extends Controller
{
    public function skip(Patient $patient)
    {
        dd($patient->CareSteps->count());

        PatientCareStep::create([
            'user_id' => $patientId,
            'Type' => ,
            'recorded_by' => auth()->id(),
        ]);

        return back()->with('status', 'Care step skipped.');
    }
}
