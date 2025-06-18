@extends('layouts.app')

@section('title', $event->title)

@section('content')
    <div class="container mx-auto px-4 max-w-3xl">
        <h1 class="text-4xl font-bold mb-4">{{ $event->title }}</h1>

        @if($event->image)
            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-64 object-cover rounded mb-6">
        @endif

        <div class="mb-4 text-gray-700">
            <p><strong>Date:</strong> {{ $event->date->format('F j, Y') }}</p>
            <p><strong>Location:</strong> {{ $event->location }}</p>
            <p><strong>Capacity:</strong> {{ $event->capacity }}</p>
        </div>

        <div class="mb-6">
            <p>{{ $event->description }}</p>
        </div>

        @can('update', $event)
            <a href="{{ route('events.edit', $event) }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mr-3">Edit</a>
        @endcan

        @can('delete', $event)
            <form action="{{ route('events.destroy', $event) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this event?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
            </form>
        @endcan

        <a href="{{ route('events.index') }}" class="inline-block mt-6 text-blue-600 hover:underline">Back to Events</a>
    </div>
@endsection
