@extends('layouts.admin')

@section('title', 'My Events')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-gray-800">My Events</h2>

    @if($events->isEmpty())
        <p class="text-gray-600">No events found.</p>
    @else
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($events as $event)
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
                    @if($event->image && \App\Helpers\ImageHelper::imageExists($event->image))
                        <img src="{{ \App\Helpers\ImageHelper::getEventImageUrl($event->image) }}"
                             alt="{{ $event->title }}"
                             class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $event->title }}</h3>
                        <p class="text-sm text-gray-600 mb-2">{{ $event->date->format('M d, Y') }} • {{ $event->location }}</p>
                        <p class="text-gray-700 text-sm mb-4">{{ Str::limit($event->description, 100) }}</p>
                        <div class="flex space-x-2">
                            <a href="{{ route('events.show', $event) }}" class="text-blue-600 hover:underline text-sm">View</a>
                            <a href="{{ route('events.edit', $event) }}" class="text-green-600 hover:underline text-sm">Edit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $events->links() }}
        </div>
    @endif
@endsection


