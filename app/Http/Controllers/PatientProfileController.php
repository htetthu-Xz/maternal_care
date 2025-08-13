<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientProfileController extends Controller
{
    public function showForm()
    {
        return view('patient.profile_form'); // Create this Blade file
    }

    public function submitForm(Request $request)
    {

        $request->validate([
            'father_name' => 'required|string',
            'father_age' => 'required|integer|min:0',
            'father_blood_group' => 'required|string|max:3',
            'is_estimated_date_of_birth_known' => 'required|boolean',
            'is_expect_selected_for_birth' => 'required|boolean',
            'is_emergency_clinic' => 'required|boolean',
            'has_decision_maker_in_emergency' => 'required|boolean',
            'knows_how_to_get_money_in_emergency' => 'required|boolean',
            'has_planned_transport_for_emergency' => 'required|boolean',
            'has_basic_delivery_supplies' => 'required|boolean',
            'has_planned_companion_for_birth_and_24h' => 'required|boolean',
            'has_planned_helper_for_household_and_childcare' => 'required|boolean',
        ]);



        $patient = Auth::user()->patient;
        $patient->update([
            'father_name' => $request->father_name,
            'father_age' => $request->father_age,
            'father_blood_group' => $request->father_blood_group,
            'is_estimated_date_of_birth_known' => $request->is_estimated_date_of_birth_known == '1' ? true : false,
            'is_expect_selected_for_birth' => $request->is_expect_selected_for_birth == '1' ? true : false,
            'is_emergency_clinic' => $request->is_emergency_clinic == '1' ? true : false,
            'has_decision_maker_in_emergency' => $request->has_decision_maker_in_emergency == '1' ? true : false,
            'knows_how_to_get_money_in_emergency' => $request->knows_how_to_get_money_in_emergency == '1' ? true : false,
            'has_planned_transport_for_emergency' => $request->has_planned_transport_for_emergency == '1' ? true : false,
            'has_basic_delivery_supplies' => $request->has_basic_delivery_supplies == '1' ? true : false,
            'has_planned_companion_for_birth_and_24h' => $request->has_planned_companion_for_birth_and_24h == '1' ? true : false,
            'has_planned_helper_for_household_and_childcare' => $request->has_planned_helper_for_household_and_childcare == '1' ? true : false,
            'profile_completed' => true,
        ]);

        return redirect()->route('welcome')->with('success', 'Profile completed successfully.');
    }

    public function showTodayPatient(Patient $patient)
    {
        return view('admin.patients.show', compact('patient'));
    }

    public function show(Patient $patient)
    {
        $an_count = $patient->careSteps()->where('type', 'ANC')->count();
        $pn_count = $patient->careSteps()->where('type', 'PNC')->count();
        $AN_Data = $patient->schedules()->where('type', 'ANC')->take($an_count)->get();
        $PN_Data = $patient->schedules()->where('type', 'PNC')->take($pn_count)->get();
        $weeksAxis = range(0, 40);
        $lower = [];
        $upper = [];
        for ($w = 0; $w <= 40; $w++) {
            $lower[] = round(40 + (($w - 5) * (18 / 36)), 1); // 42 → 60
            $upper[] = round(54 + (($w - 5) * (15 / 36)), 1); // 48 → 63
        }

        $anc = $patient->schedules()
            ->where('type', 'ANC')
            ->whereNotNull('weight')
            ->get(['number', 'pregnancy_week', 'weight'])
            ->map(function ($s) {
                $map = [1 => 4, 2 => 8, 3 => 12, 4 => 16, 5 => 20, 6 => 24, 7 => 28, 8 => 32];
                $week = ($map[$s->number] ?? null);
                return $week ? ['x' => (int)$week, 'y' => (float)$s->weight] : null;
            })
            ->filter()
            ->sortBy('x')
            ->values();
        // dd($anc);

        if ($anc->isNotEmpty()) {
            $firstWeight = $anc->first()['y'];
            $anc->prepend(['x' => 4, 'y' => $firstWeight]);
        }




        return view('patient.show', [
            'patient' => $patient,
            'AN_Data' => $AN_Data,
            'PN_Data' => $PN_Data,
            'weeksAxis' => $weeksAxis,
            'lower' => $lower,
            'upper' => $upper,
            'points' => $anc
        ]);
    }

    public function showAnPn()
    {
        $user = Auth::user();
        $patient = $user->patient;

        $schedules = $patient->schedules()->take($patient->careSteps->count())->get();

        return view('patient.my_care_history', compact('schedules'));
    }

    public function showHistory($id)
    {
        $schedule = Auth::user()->patient->schedules()->findOrFail($id);

        return view('patient.historyShow', compact('schedule'));
    }
}
