@extends('layouts.master')

@section('title', 'Doctor Dashboard')
@section('pages', 'Messages')
@section('page', 'အကြောင်းကြားစာများ')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">အကြောင်းကြားစာများ</h5>
            <ul>
                @foreach($conversations as $conv)
                    <li>
                        <a href="{{ route('conversations.show', $conv) }}">
                            With Patient: {{ $conv->patient->user->name ?? 'N/A' }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
