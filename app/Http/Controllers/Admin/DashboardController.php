<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $todayPatients = Patient::whereDate('created_at', today())
            ->whereDoesntHave('careSteps', function ($query) {
                $query->where('type', 'ANC');
            })
            ->get();

        $returningPatients = Patient::whereHas('careSteps', function ($query) {
            $query->where('type', 'ANC');
        })
            ->whereHas('schedules', function ($query) {
                $query->whereDate('visit_date', Carbon::today());
            })
            ->with(['user', 'schedules' => function ($query) {
                $query->whereDate('visit_date', Carbon::today());
            }])
            ->get();

        $allPatients = Patient::all();

        //dd($returningPatients);

        return view('admin.dashboard', compact(
            'todayPatients',
            'returningPatients',
            'allPatients'
        ));
    }


    public function userDashboard()
    {
        $today = Carbon::today()->toDateString();

        $todayPatients = Patient::whereHas('schedules', function ($q) use ($today) {
            $q->whereDate('visit_date', $today);
        })->with(['schedules' => function ($q) use ($today) {
            $q->whereDate('visit_date', $today);
        }])->get();

        return view('layouts.master', compact('todayPatients'));
    }
}
