<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Exports\AllPatientsExport;
use App\Exports\TodayPatientsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReturningPatientsExport;

class DashboardController extends Controller
{
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

    public function index()
    {
        $todayPatients = Patient::whereDate('created_at', today())
            ->whereDoesntHave('careSteps', function ($query) {
                $query->where('type', 'ANC');
            })
            ->get();

        return view('admin.patients.index', compact('todayPatients'));
    }

    public function return()
    {
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

        return view('admin.patients.return', compact('returningPatients'));
    }

    public function allPatients()
    {
        $allPatients = Patient::with(['user', 'schedules'])->get();

        return view('admin.patients.all', compact('allPatients'));
    }

    public function exportToday()
    {
        return Excel::download(new TodayPatientsExport, 'today_patients.xlsx');
    }

    public function exportReturning()
    {
        return Excel::download(new ReturningPatientsExport, 'returning_patients.xlsx');
    }

    public function exportAll()
    {
        return Excel::download(new AllPatientsExport, 'all_patients.xlsx');
    }
}
