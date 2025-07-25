<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
    public function create(Patient $patient)
    {
        return view('medical_history.create', compact('patient'));
    }

    public function store(Request $request, Patient $patient)
    {
        // dd($request->all()); // For debugging, remove this line in production
        $data = $request->validate([
            'registered_date' => 'required|date',
            'last_menstruation_date' => 'required|date',
            'estimated_delivery_date' => 'required|date',
            'last_birth_or_miscarriage_date' => 'nullable|date',
            'pregnancy_count' => 'nullable|integer|min:0',
            'education_level' => 'required|string|max:255',
            'has_birth_defect_history' => 'nullable',
            'smokes' => 'nullable',
            'chews_betel' => 'nullable',
            'allergic_medicines' => 'nullable|string|max:255',
            'current_medicines' => 'nullable|string|max:255',
            'disease_history' => 'nullable|string',
            'other_diseases' => 'nullable|string|max:255',
            'used_birth_control' => 'nullable',
            'birth_control_method' => 'nullable|string|max:255',
            'birth_control_duration' => 'nullable|string|max:255',
            'hiv_syphilis_counseling' => 'nullable',
            'deworming_given' => 'nullable',
            'iron_supplement_given' => 'nullable',
            'tt_vaccine_1_date' => 'nullable|date',
            'tt_vaccine_2_date' => 'nullable|date',
        ]);

        $data['has_birth_defect_history'] = isset($data['has_birth_defect_history']) && $data['has_birth_defect_history'] == 'on' ? true : false;
        $data['smokes'] = isset($data['smoking']) && $data['smoking'] == 'on' ? true : false;
        $data['chews_betel'] = isset($data['chews_betel']) && $data['chews_betel'] == 'on' ? true : false;
        $data['used_birth_control'] = isset($data['used_birth_control']) && $data['used_birth_control'] == 'on' ? true : false;
        $data['birth_control_method'] = $data['used_birth_control'] ? $data['birth_control_method'] : null;
        $data['birth_control_duration'] = $data['used_birth_control'] ? $data['birth_control_duration'] : null;
        $data['tt_vaccine_1_date'] = $data['tt_vaccine_1_date'] ?? null;
        $data['tt_vaccine_2_date'] = $data['tt_vaccine_2_date'] ?? null;
        $data['disease_history'] = $data['disease_history'] ?: '';
        $data['last_menstruation_date'] = Carbon::parse($data['last_menstruation_date'])->format('Y-m-d');
        $data['estimated_delivery_date'] = Carbon::parse($data['estimated_delivery_date'])->format('Y-m-d');
        $data['registered_date'] = Carbon::parse($data['registered_date'])->format('Y-m-d');
        $data['pregnancy_count'] = $data['pregnancy_count'] ?: 0;
        $data['education_level'] = $data['education_level'] ?: 'Unknown';
        $data['allergic_medicines'] = $data['allergic_medicines'] ?: '';
        $data['current_medicines'] = $data['current_medicines'] ?: '';
        $data['other_diseases'] = $data['other_diseases'] ?: '';
        $data['last_birth_or_miscarriage_date'] = $data['last_birth_or_miscarriage_date'] ?: null;
        $data['hiv_syphilis_counseling'] = isset($data['hiv_syphilis_counseling']) && $data['hiv_syphilis_counseling'] == 'on' ? true : false;
        $data['deworming_given'] = isset($data['deworming_given']) && $data['deworming_given'] == 'on' ? true : false;
        $data['iron_supplement_given'] = isset($data['iron_supplement_given']) && $data['iron_supplement_given'] == 'on' ? true : false;

        $patient->medicalHistory()->create($data);

        $this->generateSchedules($patient, $data['last_menstruation_date']);

        return redirect()->route('today-patients.show', $patient->id)->with('success', 'မိခင်ကိုယ်ရေးရာဇဝင်ထည့်သွင်းပြီးပါပြီ။');
    }

    public function generateSchedules($patient, $lastMenstruationDate)
    {
        $edd = Carbon::parse($lastMenstruationDate)->addDays(280);

        // ANC Visits (for simplicity, fixed offsets – you can adjust)
        $ancOffsets = [30, 60, 90, 120, 150, 180, 210, 240]; // days after LMP
        foreach ($ancOffsets as $i => $days) {
            Schedule::create([
                'patient_id' => $patient->id,
                'type' => 'ANC',
                'number' => $i + 1,
                'visit_date' => Carbon::parse($lastMenstruationDate)->addDays($days),
                'visited' => false,
            ]);
        }
    }

    public function markAsDelivered(Request $request, Patient $patient)
    {
        $request->validate([
            'delivery_date' => 'required|date',
        ]);

        $deliveryDate = Carbon::parse($request->delivery_date);
        $patient->update(['delivery_date' => $deliveryDate]);

        $pncOffsets = [1, 3, 7, 42];

        foreach ($pncOffsets as $i => $days) {
            Schedule::create([
                'patient_id' => $patient->id,
                'type' => 'PNC',
                'number' => $i + 1,
                'visit_date' => $deliveryDate->copy()->addDays($days),
                'visited' => false,
            ]);
        }

        return back()->with('success', 'Patient marked as delivered and PNC schedules created.');
    }
}
