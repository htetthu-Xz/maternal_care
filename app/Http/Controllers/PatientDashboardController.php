<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $patient = $user->patient;

        $nextVisit = $patient->schedules()
            ->where('visited', false)
            ->whereDate('visit_date', '>=', now())
            ->orderBy('visit_date')
            ->first();

        $lastVisit = $patient->schedules()
            ->where('visited', true)
            ->orderByDesc('visit_date')
            ->first();

        $missedCount = $patient->schedules()
            ->where('visited', false)
            ->whereDate('visit_date', '<', now())
            ->count();

        $unreadMessages = $patient->conversations()
            ->with('messages')
            ->get()
            ->pluck('messages')
            ->flatten()
            ->where('read', false)
            ->where('sender_id', '!=', $user->id)
            ->count();

        return view('dashboard', compact(
            'patient',
            'nextVisit',
            'lastVisit',
            'missedCount',
            'unreadMessages'
        ));
    }
}
