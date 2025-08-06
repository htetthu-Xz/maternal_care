<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CareStepController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\PatientProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PatientDashboardController;
use App\Http\Controllers\PatientConversationController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::get('health-care-knowledge', function () {
    return view('knowledge');
})->name('knowledge');

Route::get('knowledges', function () {
    return view('knowledges.knowledge');
})->name('knowledges.index');

Route::get('knowledges/chapter1', function () {
    return view('knowledges.ch1');
})->name('knowledges.chapter1');

Route::get('knowledges/chapter2', function () {
    return view('knowledges.ch2');
})->name('knowledges.chapter2');

Route::get('knowledges/chapter3', function () {
    return view('knowledges.ch3');
})->name('knowledges.chapter3');

Route::get('knowledges/chapter4', function () {
    return view('knowledges.ch4');
})->name('knowledges.chapter4');

Route::get('knowledges/chapter5', function () {
    return view('knowledges.ch5');
})->name('knowledges.chapter5');

Route::get('knowledges/chapter6', function () {
    return view('knowledges.ch6');
})->name('knowledges.chapter6');

Route::get('knowledges/chapter7', function () {
    return view('knowledges.ch7');
})->name('knowledges.chapter7');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/patient/profile-form', [PatientProfileController::class, 'showForm'])->name('patient.profile.form');
    Route::post('/patient/profile-form', [PatientProfileController::class, 'submitForm'])->name('patient.profile.submit');

    Route::middleware(['patient.profile.check'])->group(function () {
        Route::get('/dashboard', [PatientDashboardController::class, 'index'])->name('patient.dashboard');
    });

    Route::get('/my-messages', [PatientConversationController::class, 'index'])->name('patient.conversations.index');
    Route::get('/my-messages/{conversation}', [PatientConversationController::class, 'show'])->name('patient.conversations.show');
    Route::post('/my-messages/{conversation}/reply', [PatientConversationController::class, 'reply'])->name('patient.conversations.reply');

    Route::get('my-care-history', [PatientProfileController::class, 'showAnPn'])->name('patient.my-care-history');
    Route::get('my-care-history/{id}', [PatientProfileController::class, 'showHistory'])->name('patient.history.show');
});

Route::middleware(['auth', 'admin.check'])->group(function () {

    Route::get('/patients/{patient}/medical-history/create', [MedicalHistoryController::class, 'create'])->name('medical-history.create');
    Route::post('/patients/{patient}/medical-history', [MedicalHistoryController::class, 'store'])->name('medical-history.store');

    //Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/dashboard/today', [DashboardController::class, 'index'])->name('admin.dashboard.today');
    Route::get('admin/dashboard/return', [DashboardController::class, 'return'])->name('admin.dashboard.return');
    Route::get('admin/dashboard/all-patients', [DashboardController::class, 'allPatients'])->name('admin.dashboard.all');

    Route::get('/patients/{patient}', [PatientProfileController::class, 'show'])->name('patients.show');


    Route::get('/today-patients/{patient}', [PatientProfileController::class, 'showTodayPatient'])->name('today-patients.show');
    Route::get('mark-as-delivered/{patient}', [MedicalHistoryController::class, 'markAsDelivered'])->name('patient.mark-as-delivered');

    Route::get('schedule/an/create/{patient}', [ScheduleController::class, 'createAN'])->name('schedule.an.create');
    Route::post('schedule/an/store', [ScheduleController::class, 'storeAN'])->name('schedule.an.store');

    Route::get('/transfer/{patient}/create', [TransferController::class, 'create'])->name('transfer.create');
    Route::post('/transfer', [TransferController::class, 'store'])->name('transfer.store');
    Route::get('/transfer/{transfer}/show', [TransferController::class, 'show'])->name('transfer.show');

    Route::get('/conversations', [ConversationController::class, 'index'])->name('conversations.index');
    Route::get('/conversations/{conversation}', [ConversationController::class, 'show'])->name('conversations.show');
    Route::post('/conversations/{conversation}/messages', [ConversationController::class, 'storeMessage'])->name('conversations.message.store');
    Route::post('/patients/{patient}/remind', [ConversationController::class, 'remindPatient'])->name('patients.remind');
    Route::post('/conversations/{conversation}/skip', [ConversationController::class, 'skipForm'])->name('conversations.skip.form');
    Route::post('/care-step/skip/{patient}', [CareStepController::class, 'skip'])->name('care-step.skip');
});

require __DIR__ . '/auth.php';
