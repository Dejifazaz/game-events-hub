@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Pending Events</h1>

        @if($events->count())
            @foreach($events as $event)
                <div class="border p-4 mb-4 rounded shadow">
                    <h2 class="text-xl font-semibold">{{ $event->title }}</h2>
                    <p class="text-gray-600">{{ $event->description }}</p>
                    <p class="text-sm text-gray-500"><strong>Date:</strong> {{ $event->date->format('F j, Y') }}</p>

                    <form action="{{ route('admin.events.approve', $event) }}" method="POST" class="mt-2">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Approve</button>
                    </form>
                </div>
            @endforeach

            {{ $events->links() }}
        @else
            <p>No pending events found.</p>
        @endif
    </div>
@endsection
