@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Events</h1>

        <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Create New Event</a>

        @if($events->count())
            <ul class="list-group">
                @foreach($events as $event)
                    <li class="list-group-item">
                        <a href="{{ route('events.show', $event) }}">{{ $event->title }}</a>
                        <span class="float-end">{{ $event->date->format('M d, Y') }}</span>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No events found.</p>
        @endif
    </div>
@endsection
