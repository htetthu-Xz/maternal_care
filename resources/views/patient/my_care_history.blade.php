@extends('layouts.master')

@section('title', 'Patient Care History')
@section('pages', 'Patients')
@section('page', 'Care History')

@section('content')
<div class="row">
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
          <th>Details</th>
        </tr>
      </thead>
      <tbody>
        @foreach($schedules as $visit)
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
          <td>
            @if (!$visit->visited && \Carbon\Carbon::parse($visit->visit_date)->isPast())
                <span class="badge bg-danger">Missed</span>
            @else
                <a href="{{ route('patient.history.show', $visit->id) }}">View Details</a>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
@endsection

