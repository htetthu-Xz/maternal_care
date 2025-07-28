@extends('layouts.master')

@section('title', 'Doctor Dashboard')
@section('pages', 'Dashboard')
@section('page', 'Dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- Today Registered Patients --}}
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
            <h5 class="mb-0">🟢 Today Registered Patients ({{ $todayPatients->count() }})</h5>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Patient Name</th>
                        <th>Registered At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($todayPatients as $key => $patient)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $patient->user->name ?? 'Unknown' }}</td>
                            <td>{{ $patient->created_at->format('Y-m-d h:i A') }}</td>
                            <td>
                                <a href="{{ route('today-patients.show', $patient->user_id) }}" class="btn btn-sm btn-info">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No patients registered today.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Returning Patients --}}
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center bg-warning">
            <h5 class="mb-0">🟡 Returning Patients Today ({{ $returningPatients->count() }})</h5>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Patient Name</th>
                        <th>Return Reason</th>
                        <th>Scheduled Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($returningPatients as $key => $patient)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $patient->user->name ?? 'Unknown' }}</td>
                            <td>
                                <span class="badge bg-label-primary">{{ $patient->type ?? 'Follow-up' }}</span>
                            </td>
                            <td>{{ $patient->date }}</td>
                            <td>
                                <a href="{{ route('today-patients.show', $patient->user_id) }}" class="btn btn-sm btn-secondary">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No returning patients scheduled for today.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

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
                                <a href="{{ route('today-patients.show', $patient->user_id) }}" class="btn btn-sm btn-dark">View</a>
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
