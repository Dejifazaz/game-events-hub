@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $event->title }}</h1>
        <p><strong>Date:</strong> {{ $event->date->format('M d, Y') }}</p>
        <p><strong>Location:</strong> {{ $event->location }}</p>
        <p><strong>Capacity:</strong> {{ $event->capacity }}</p>
        <p>{{ $event->description }}</p>

        @if($event->image)
            <img src="{{ $event->image }}" alt="{{ $event->title }}" class="img-fluid">
        @endif

        <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">Back to Events</a>
    </div>
@endsection
