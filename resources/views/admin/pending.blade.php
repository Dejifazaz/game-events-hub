@extends('layouts.app')

@section('title', 'Pending Events')

@section('content')
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Pending Events</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @forelse($events as $event)
            <div class="border p-4 mb-4 rounded shadow">
                <h2 class="text-xl font-semibold">{{ $event->title }}</h2>
                <p class="text-gray-600">{{ \Illuminate\Support\Str::limit($event->description, 150) }}</p>
                <p class="text-sm text-gray-500 mt-1">
                    <strong>Date:</strong> {{ $event->date->format('F j, Y') }}
                </p>
                <form action="{{ route('admin.events.approve', $event) }}" method="POST" class="mt-2">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
                        Approve
                    </button>
                </form>
            </div>
        @empty
            <p>No pending events found.</p>
        @endforelse

        <div class="mt-4">{{ $events->links() }}</div>
    </div>
@endsection
