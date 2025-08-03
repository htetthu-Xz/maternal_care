@extends('layouts.master')

@section('title', 'Doctor Dashboard')
@section('pages', 'Messages')
@section('page', 'အကြောင်းကြားစာများ')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title mb-4">အကြောင်းကြားစာများ</h5>
                <div class="list-group">
                    @forelse($conversations as $conv)
                        <a href="{{ route('conversations.show', $conv) }}" class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3">
                            <div class="flex-grow-1">
                                <div class="fw-bold">
                                    {{ $conv->patient->user->name ?? 'N/A' }}
                                </div>
                                <small class="text-muted">
                                    {{ $conv->Messages->last()->message ?? 'No messages yet.' }}
                                </small>
                            </div>
                        </a>
                    @empty
                        <div class="text-center text-muted py-5">
                            No conversations found.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
