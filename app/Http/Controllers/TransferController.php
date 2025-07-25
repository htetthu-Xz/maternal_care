<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    public function create($patient_id)
    {
        $patient = Patient::with('user')->findOrFail($patient_id);
        return view('admin.transfer.create', compact('patient'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'transfer_date' => 'required|date',
            'transfer_to' => 'required|string',
            'reason' => 'required|string',
            'patient_condition' => 'required|string',
            'treatment_provided' => 'required|string',
        ]);

        $validated['created_by'] = Auth::user()->id;

        Transfer::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Patient transfer recorded successfully.');
    }
}
