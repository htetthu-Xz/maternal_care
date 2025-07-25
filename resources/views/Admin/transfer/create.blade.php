@extends('layouts.master')

@section('title', 'Transfer Patient')
@section('pages', 'Transfer')
@section('page', 'Transfer Patient')

@section('content')
<div class="card p-4">
    <h4 class="mb-3">Transfer Patient: {{ $patient->user->name }}</h4>
    <form action="{{ route('transfer.store') }}" method="POST">
        @csrf
        <input type="hidden" name="patient_id" value="{{ $patient->id }}">

        <div class="mb-3">
            <label class="form-label">Transfer Date</label>
            <input type="date" name="transfer_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Transfer To</label>
            <input type="text" name="transfer_to" class="form-control" placeholder="Hospital/Clinic name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Reason</label>
            <textarea name="reason" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Patient Condition</label>
            <textarea name="patient_condition" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Treatment Provided</label>
            <textarea name="treatment_provided" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-danger">Transfer Now</button>
    </form>
</div>
@endsection
