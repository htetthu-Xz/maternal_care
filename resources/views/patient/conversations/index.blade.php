@extends('layouts.master')

@section('title', 'Reminders')
@section('pages', 'Messages')
@section('page', 'Reminders from Doctor')

@section('content')
<div class="card">
  <div class="card-header">
    <h5 class="mb-0">Your Reminders</h5>
  </div>
  <div class="card-body">
    @forelse ($conversations as $conversation)
      <a href="{{ route('patient.conversations.show', $conversation->id) }}" class="list-group-item list-group-item-action mb-2">
        <div class="d-flex justify-content-between">
          <div>
            <strong>{{ $conversation->patient->user->name }}</strong>
            <div class="text-muted small">Started: {{ $conversation->created_at->diffForHumans() }}</div>
          </div>
          @if ($conversation->messages->where('sender_id', '!=', auth()->id())->where('read', false)->count())
            <span class="badge bg-danger">New</span>
          @endif
        </div>
      </a>
    @empty
      <p>No reminders yet.</p>
    @endforelse
  </div>
</div>
@endsection
