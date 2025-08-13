@extends('layouts.master')

@section('title', 'Doctor Dashboard')
@section('pages', 'Dashboard')
@section('page', 'ယနေ့ လူနာများ')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- Today Registered Patients --}}
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
            <h5 class="mb-0 text-white">
                🟢 ယနေ့လူနာများ ({{ $todayPatients->count() }})
            </h5>
            <a href="{{ route('patients.export.today') }}" class="btn btn-sm btn-success d-flex align-items-center gap-1 shadow">
                <i class="bx bx-download"></i>
                <span>Export</span>
            </a>
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
                                <a href="{{ route('today-patients.show', $patient->id) }}" class="btn btn-sm btn-info">View</a>
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
</div>
@endsection
