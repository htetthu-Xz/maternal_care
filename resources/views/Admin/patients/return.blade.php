@extends('layouts.master')

@section('title', 'Doctor Dashboard')
@section('pages', 'Dashboard')
@section('page', 'ရက်ချိန်း လူနာများ')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center bg-warning">
            <h5 class="mb-0 text-white">🟡 Returning Patients Today ({{ $returningPatients->count() }})</h5>
            <a href="{{ route('patients.export.returning') }}" class="btn btn-sm btn-success d-flex align-items-center gap-1 shadow">
                <i class="bx bx-download"></i>
                <span>Export</span>
            </a>
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
                            <td>{{ App\Models\Patient::getVisitDate($patient) }}</td>
                            <td>
                                <a href="{{ route('today-patients.show', $patient->id) }}" class="btn btn-sm btn-secondary">View</a>
                                <button 
                                    class="btn btn-sm btn-warning remind-btn"
                                    data-user-id="{{ $patient->id }}"
                                >
                                    Remind
                                </button>
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
</div>
@endsection

@push('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $(document).ready(function () {
        $('.remind-btn').on('click', function () {
            let userId = $(this).data('user-id');
            $.ajax({
                url: '/patients/' + userId + '/remind',
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    patient_id: userId
                },
                success: function (res) {
                    alert('Reminder sent!');
                },
                error: function (err) {
                    alert('Something went wrong');
                }
            });
        });
    });
</script>
@endpush