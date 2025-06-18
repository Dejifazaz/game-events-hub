@extends('layouts.app')

@section('content')
    <div class="p-6 max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

        <div class="grid grid-cols-3 gap-6">
            <div class="bg-white shadow rounded p-4">
                <h2 class="text-xl font-semibold">Total Events</h2>
                <p class="text-3xl">{{ $totalEvents }}</p>
            </div>

            <div class="bg-white shadow rounded p-4">
                <h2 class="text-xl font-semibold">Pending Events</h2>
                <p class="text-3xl">{{ $pendingEvents }}</p>
            </div>

            <div class="bg-white shadow rounded p-4">
                <h2 class="text-xl font-semibold">Total Users</h2>
                <p class="text-3xl">{{ $totalUsers }}</p>
            </div>
        </div>
    </div>
@endsection
