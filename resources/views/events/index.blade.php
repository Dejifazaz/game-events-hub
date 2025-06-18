@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Events</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('events.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">
            Create New Event
        </a>

        @if($events->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($events as $event)
                    <div class="border rounded shadow p-4">
                        @if($event->image)
                            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="mb-3 w-full h-48 object-cover rounded">
                        @endif
                        <h2 class="text-xl font-semibold">{{ $event->title }}</h2>
                        <p class="text-gray-600">{{ $event->date->format('M d, Y') }} | {{ $event->location }}</p>
                        <p class="mt-2">{{ Str::limit($event->description, 100) }}</p>
                        <a href="{{ route('events.show', $event) }}" class="text-blue-600 hover:underline mt-3 block">View Details</a>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $events->links() }}
            </div>
        @else
            <p>No events found.</p>
        @endif
    </div>
@endsection
