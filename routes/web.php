<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\PatientProfileController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/patient/profile-form', [PatientProfileController::class, 'showForm'])->name('patient.profile.form');
    Route::post('/patient/profile-form', [PatientProfileController::class, 'submitForm'])->name('patient.profile.submit');

    Route::get('/today-patients/{patient}', [PatientProfileController::class, 'showTodayPatient'])->name('today-patients.show');

    Route::get('schedule/an/create/{patient}', [ScheduleController::class, 'createAN'])->name('schedule.an.create');
    Route::post('schedule/an/store', [ScheduleController::class, 'storeAN'])->name('schedule.an.store');

    Route::get('/transfer/{patient}/create', [TransferController::class, 'create'])->name('transfer.create');
    Route::post('/transfer', [TransferController::class, 'store'])->name('transfer.store');


    Route::middleware(['patient.profile.check'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
    });
});

Route::middleware(['auth', 'admin.check'])->group(function () {

    Route::get('/patients/{patient}/medical-history/create', [MedicalHistoryController::class, 'create'])->name('medical-history.create');
    Route::post('/patients/{patient}/medical-history', [MedicalHistoryController::class, 'store'])->name('medical-history.store');

    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/patients/{id}', [PatientProfileController::class, 'show'])->name('patients.show');
});


require __DIR__ . '/auth.php';
