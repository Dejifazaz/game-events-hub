@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>
        <p>Welcome back, <strong>{{ auth()->user()->name }}</strong>!</p>
        <nav class="mt-4">
            <a href="{{ route('admin.events.pending') }}" class="text-blue-600 hover:underline mr-4">
                View Pending Events
            </a>
            <a href="{{ route('events.index') }}" class="text-blue-600 hover:underline">
                Public Events
            </a>
        </nav>
    </div>
@endsection
