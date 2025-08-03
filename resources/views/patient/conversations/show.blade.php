@extends('layouts.master')

@section('title', 'Message Thread')
@section('pages', 'Messages')
@section('page', 'Conversation')

@section('content')
<div class="card">
  <div class="card-header">
    <h5>Conversation</h5>
  </div>
@if ($errors->any())
    <div class="alert alert-danger mx-3">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($error = session('error'))
    <div class="alert alert-danger">
        {{ $error }}
    </div>
@endif
  <div class="card-body" style="max-height: 500px; overflow-y: auto;">
    @foreach ($conversation->messages as $message)
      <div class="mb-3">
        <div class="{{ $message->sender_id === auth()->id() ? 'text-end' : 'text-start' }}">
          <div class="d-inline-block rounded p-2 {{ $message->sender_id === auth()->id() ? 'bg-primary text-white' : 'bg-light' }}">
            {{ $message->message }}
          </div>
          <div class="text-muted small" style="margin-left: 10px">
            {{ $message->created_at->diffForHumans() }}
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="card-footer">
    <form method="POST" action="{{ route('patient.conversations.reply', $conversation->id) }}">
      @csrf
      <div class="input-group">
        <input type="text" name="message" class="form-control" placeholder="Type your reply..." required>
        <button class="btn btn-success" type="submit">Send</button>
      </div>
    </form>
  </div>
</div>
@endsection
