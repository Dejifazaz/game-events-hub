@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Admin Dashboard</h2>

    <p class="mb-6">Welcome back, <strong>{{ auth()->user()->name }}</strong>!</p>

    <div class="grid gap-6 md:grid-cols-3">
        <div class="bg-white p-6 rounded shadow">
            <h3 class="font-semibold text-gray-800 mb-2">Pending Events</h3>
            <p class="text-sm text-gray-600 mb-4">Approve or reject new submissions.</p>
            <p class="text-3xl font-bold mb-4">{{ $pendingCount ?? 0 }}</p>
            <a href="{{ route('admin.events.pending') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Manage</a>
        </div>

        <div class="bg-white p-6 rounded shadow">
            <h3 class="font-semibold text-gray-800 mb-2">All Events</h3>
            <p class="text-sm text-gray-600 mb-4">Browse all public and private events.</p>
            <a href="{{ route('events.index') }}" class="inline-block bg-gray-800 text-white px-4 py-2 rounded hover:bg-black">View</a>
        </div>

        <div class="bg-white p-6 rounded shadow">
            <h3 class="font-semibold text-gray-800 mb-2">Users</h3>
            <p class="text-sm text-gray-600 mb-4">View and edit registered users.</p>
            <a href="{{ route('admin.users.index') }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Manage</a>
        </div>
    </div>

    <div class="mt-8 bg-white p-6 rounded shadow">
        <h3 class="font-semibold text-gray-800 mb-4">Recent Events</h3>
        @if(($recentEvents ?? collect())->isEmpty())
            <p class="text-gray-600">No events found.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="text-left text-sm text-gray-600">
                            <th class="py-2 pr-4">Title</th>
                            <th class="py-2 pr-4">Date</th>
                            <th class="py-2 pr-4">Location</th>
                            <th class="py-2 pr-4">Approved</th>
                            <th class="py-2 pr-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentEvents as $event)
                            <tr class="border-t">
                                <td class="py-2 pr-4">{{ $event->title }}</td>
                                <td class="py-2 pr-4">{{ $event->date instanceof \Carbon\Carbon ? $event->date->format('M d, Y') : \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</td>
                                <td class="py-2 pr-4">{{ $event->location }}</td>
                                <td class="py-2 pr-4">{{ $event->approved ? 'Yes' : 'No' }}</td>
                                <td class="py-2 pr-4">
                                    <div class="flex space-x-2">
                                        <a class="text-blue-600 hover:underline" href="{{ route('events.show', $event) }}">View</a>
                                        @if(!$event->approved)
                                            <form class="inline" method="POST" action="{{ route('admin.events.approve', $event) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button class="text-green-700 hover:underline" type="submit">Approve</button>
                                            </form>
                                            <form class="inline" method="POST" action="{{ route('admin.events.decline', $event) }}"
                                                  onsubmit="return confirm('Are you sure you want to decline this event? This action cannot be undone.')">
                                                @csrf
                                                @method('PATCH')
                                                <button class="text-red-700 hover:underline" type="submit">Decline</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
