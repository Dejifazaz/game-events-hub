@extends('layouts.admin')

@section('title', 'Pending Events')

@section('content')
    <h1 class="text-3xl font-semibold mb-6">Pending Events for Approval</h1>

    @if($events->isEmpty())
        <p>No pending events right now.</p>
    @else
        <table class="min-w-full bg-white rounded shadow">
            <thead>
            <tr class="bg-indigo-600 text-white">
                <th class="py-3 px-4 text-left">Title</th>
                <th class="py-3 px-4 text-left">Date</th>
                <th class="py-3 px-4 text-left">Location</th>
                <th class="py-3 px-4 text-left">Submitted By</th>
                <th class="py-3 px-4 text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($events as $event)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2 px-4">{{ $event->title }}</td>
                    <td class="py-2 px-4">{{ $event->date instanceof \Carbon\Carbon ? $event->date->format('M d, Y') : \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</td>
                    <td class="py-2 px-4">{{ $event->location }}</td>
                    <td class="py-2 px-4">{{ $event->user->name ?? 'N/A' }}</td>
                    <td class="py-2 px-4 text-center">
                        <div class="flex space-x-2 justify-center">
                            <form action="{{ route('admin.events.approve', $event) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button
                                    type="submit"
                                    class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition"
                                >
                                    Approve
                                </button>
                            </form>
                            <form action="{{ route('admin.events.decline', $event) }}" method="POST" class="inline" 
                                  onsubmit="return confirm('Are you sure you want to decline this event? This action cannot be undone.')">
                                @csrf
                                @method('PATCH')
                                <button
                                    type="submit"
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition"
                                >
                                    Decline
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
