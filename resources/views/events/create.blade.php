@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 max-w-lg">
        <h1 class="text-3xl font-bold mb-6">Create New Event</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            @include('events.partials.form', ['event' => null])

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Create Event
            </button>
        </form>
    </div>
@endsection
