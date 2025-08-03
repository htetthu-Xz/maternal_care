@extends('layouts.master')

@section('title', 'Patient Dashboard')
@section('pages', 'Dashboard')
@section('page', 'Dashboard')

@section('content')
<div class="row">
  <!-- Basic Info -->
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">Welcome, {{ $patient->user->name }}</div>
      <div class="card-body">
        <p><strong>Registered:</strong> {{ $patient->created_at->format('d M Y') }}</p>
        <p><strong>Expected Delivery:</strong> {{ \Carbon\Carbon::parse($patient->estimated_delivery_date)->format('d M Y') }}</p>
        <p><strong>Transfer Status:</strong> 
          @if($patient->transfers->count())
            <span class="badge bg-warning">Transferred</span>
          @else
            <span class="badge bg-success">Normal</span>
          @endif
        </p>
        <p><strong>Unread Messages:</strong> 
          <span class="badge bg-danger">{{ $unreadMessages }}</span>
          <a href="{{ route('patient.conversations.index') }}" class="btn btn-sm btn-outline-primary ms-2">View</a>
        </p>
      </div>
    </div>
  </div>

  <!-- Visit Stats -->
  <div class="col-md-6">
    <div class="row">
      <div class="col-sm-6">
        <div class="card text-center">
          <div class="card-body">
            <h5>Total AN Visits</h5>
            <span class="fs-4">{{ $patient->careSteps->where('type', 'ANC')->count() }}</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card text-center">
          <div class="card-body">
            <h5>Missed Visits</h5>
            <span class="fs-4 text-danger">{{ $missedCount }}</span>
          </div>
        </div>
      </div>
    </div>

    @if ($nextVisit)
    <div class="card mt-2">
      <div class="card-body">
        <p class="mb-0">📅 <strong>Next Visit:</strong> {{ \Carbon\Carbon::parse($nextVisit->visit_date)->format('d M Y') }} ({{ $nextVisit->type }})</p>
      </div>
    </div>
    @endif
  </div>
</div>

<!-- History Table -->
<div class="card mt-4">
  <div class="card-header">AN & PN Visit History</div>
  <div class="table-responsive text-nowrap">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Visit #</th>
          <th>Date</th>
          <th>Type</th>
          <th>Visited</th>
        </tr>
      </thead>
      <tbody>
        @foreach($patient->schedules()->orderBy('visit_date')->get() as $visit)
        <tr>
          <td>{{ $visit->number }}</td>
          <td>{{ \Carbon\Carbon::parse($visit->visit_date)->format('d M Y') }}</td>
          <td>{{ $visit->type }}</td>
          <td>
            @if($visit->visited && \Carbon\Carbon::parse($visit->visit_date)->isPast())
                <span class="badge bg-success">Yes</span>
            @elseif(\Carbon\Carbon::parse($visit->visit_date)->isToday())
                <span class="badge bg-info">Today</span>
            @elseif(!$visit->visited && \Carbon\Carbon::parse($visit->visit_date)->isPast())
                <span class="badge bg-danger">Missed</span>
            @else
                <span class="badge bg-secondary">Upcoming</span>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

