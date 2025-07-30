@extends('layouts.master')
@section('title', 'Conversation')
@section('pages', 'Messages')
@section('page', 'Conversation')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Conversation with {{ $conversation->patient->user->name ?? 'Unknown' }}</h5>

            <div class="mb-4" style="max-height: 400px; overflow-y: auto;">
                @foreach($conversation->messages as $message)
                    <div class="mb-2">  
                        <strong>{{ $message->sender->name }}:</strong>
                        <p>{{ $message->message }}</p>
                    </div>
                @endforeach
            </div>

            <form action="{{ route('conversations.message.store', $conversation) }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="message" class="form-control" placeholder="Type your message here..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Send</button>
            </form>
            
            @if(auth()->user()->id === $conversation->doctor_id)
                <form action="{{ route('conversations.skip.form', $conversation) }}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit" class="btn btn-danger">Skip AN/PN Form</button>
                </form>
            @endif
        </div>
    </div>
@endsection