@extends('layouts.master')

@section('title', 'Transfer Patient')
@section('pages', 'Transfer')
@section('page', 'Transfer Patient')

@section('content')
<div class="card p-4">
    <h4 class="mb-3">Transfer Patient: {{ $patient->user->name }} Details</h4>
    <p><strong>Transfer Date:</strong> {{ $transfer->transfer_date }}</p>
    <p><strong>Transfer To:</strong> {{ $transfer->transfer_to }}</p>
    <p><strong>Reason:</strong> {{ $transfer->reason }}</p>
    <p><strong>Patient Condition:</strong> {{ $transfer->patient_condition }}</p>
    <p><strong>Treatment Provided:</strong> {{ $transfer->treatment_provided }}</p>
</div>
@endsection
