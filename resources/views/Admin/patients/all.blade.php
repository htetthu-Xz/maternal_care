@extends('layouts.master')

@section('title', 'Doctor Dashboard')
@section('pages', 'Dashboard')
@section('page', 'လူနာများ အားလုံး')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- All Patients --}}
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center bg-secondary text-white">
            <h5 class="mb-0">⚪ All Patients ({{ $allPatients->count() }})</h5>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Patient Name</th>
                        <th>Registered Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($allPatients as $key => $patient)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $patient->user->name ?? 'Unknown' }}</td>
                            <td>{{ $patient->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('today-patients.show', $patient->id) }}" class="btn btn-sm btn-dark">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No patients found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
