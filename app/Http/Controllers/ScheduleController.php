<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function createAN(Patient $patient)
    {

        return view('admin.an.create', compact('patient'));
    }

    public function storeAN(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'weight' => 'required|numeric',
            'anemia' => 'nullable|string',
            'blood_pressure' => 'nullable|string',
            'pregnancy_week' => 'nullable|integer',
            'uterus_height' => 'nullable|string',
            'fetal_heartbeat' => 'nullable|string',
            'symptoms_and_treatment' => 'nullable|string',
            'suspicion' => 'nullable|string',
            'urine_test' => 'nullable|string',
            'urine_sugar' => 'nullable|string',
            'hemoglobin' => 'nullable|string',
            'sifalip' => 'nullable|string',
            'iron_folate_tablets' => 'nullable|string',
            'is_transfer' => 'nullable|string',
        ]);

        $validated['visited'] = true;

        $validated['suspicion'] = $validated['suspicion'] === 'yes' ? true : false;
        $validated['urine_test'] = $validated['urine_test'] === 'yes' ? true : false;
        $validated['is_transfer'] = $validated['is_transfer'] === 'yes' ? true : false;
        $validated['urine_sugar'] = $validated['urine_sugar'] === 'yes' ? true : false;
        $validated['hemoglobin'] = $validated['hemoglobin'] === 'yes' ? true : false;
        $validated['sifalip'] = $validated['sifalip'] === 'yes' ? true : false;
        $validated['iron_folate_tablets'] = $validated['iron_folate_tablets'] === 'yes' ? true : false;;

        $patient = Patient::findOrFail($validated['patient_id']);

        $count = $patient->careSteps()->where('type', 'ANC')->count();

        $patient->careSteps()->create([
            'type' => 'ANC',
            'step_number' => $count + 1,
        ]);

        $schedule = $patient->schedules()->where('number', $count + 1)->first();

        $schedule->update($validated);

        if ($validated['is_transfer'] === true) {
            return redirect()->route('transfer.create', ['patient' => $validated['patient_id']])->with('success', 'AN Data Recorded Successfully. Please proceed to transfer.');
        }

        return redirect()->route('patients.show', [$patient->id])->with('success', 'AN Data Recorded Successfully');
    }


    public function storePN(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'weight' => 'nullable|numeric',
            'anemia' => 'nullable|string',
            'blood_pressure' => 'nullable|string',
            'symptoms_and_treatment' => 'nullable|string',
            'suspicion' => 'nullable|string',
            'urine_test' => 'nullable|string',
            'urine_sugar' => 'nullable|string',
            'hemoglobin' => 'nullable|string',
            'sifalip' => 'nullable|string',
            'iron_folate_tablets' => 'nullable|string',
            'is_transfer' => 'nullable|string',
        ]);

        $validated['visited'] = true;

        // Boolean conversion
        $validated['suspicion'] = $validated['suspicion'] === 'yes' ? true : false;
        $validated['urine_test'] = $validated['urine_test'] === 'yes';
        $validated['urine_sugar'] = $validated['urine_sugar'] === 'yes';
        $validated['hemoglobin'] = $validated['hemoglobin'] === 'yes';
        $validated['sifalip'] = $validated['sifalip'] === 'yes';
        $validated['iron_folate_tablets'] = $validated['iron_folate_tablets'] === 'yes';
        $validated['is_transfer'] = $validated['is_transfer'] === 'yes';

        $patient = Patient::findOrFail($validated['patient_id']);

        // Count how many PN steps already done
        $count = $patient->careSteps()->where('type', 'PNC')->count();

        // Save step record
        $patient->careSteps()->create([
            'type' => 'PNC',
            'step_number' => $count + 1,
        ]);

        // Update the corresponding schedule row
        $schedule = $patient->schedules()
            ->where('type', 'PNC')
            ->where('number', $count + 1)
            ->first();

        if ($schedule) {
            $schedule->update($validated);
        }

        if ($validated['is_transfer']) {
            return redirect()->route('transfer.create', ['patient' => $validated['patient_id']])
                ->with('success', 'PN Data Recorded. Please proceed to transfer.');
        }

        return redirect()->route('patients.show')->with('success', 'PN Data Recorded Successfully.');
    }
}
