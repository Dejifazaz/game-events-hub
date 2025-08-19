@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            {{ isset($event) ? 'Edit Event' : 'Create New Event' }}
        </h1>

        <div class="bg-white rounded-lg shadow p-6">
            <form method="POST" 
                  action="{{ isset($event) ? route('events.update', $event) : route('events.store') }}"
                  enctype="multipart/form-data">
                @csrf
                @if(isset($event))
                    @method('PUT')
                @endif

                <div class="space-y-6">
                    {{-- Title --}}
                    <div>
                        <label for="title" class="block font-semibold mb-1">Event Title</label>
                        <input type="text" name="title" id="title" 
                               value="{{ old('title', $event->title ?? '') }}"
                               class="w-full border rounded px-3 py-2 @error('title') border-red-500 @enderror"
                               required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div>
                        <label for="description" class="block font-semibold mb-1">Description</label>
                        <textarea name="description" id="description" rows="4"
                                  class="w-full border rounded px-3 py-2 @error('description') border-red-500 @enderror"
                                  required>{{ old('description', $event->description ?? '') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Date --}}
                    <div>
                        <label for="date" class="block font-semibold mb-1">Event Date</label>
                        <input type="date" name="date" id="date" 
                               value="{{ old('date', isset($event) ? $event->date->format('Y-m-d') : '') }}"
                               class="w-full border rounded px-3 py-2 @error('date') border-red-500 @enderror"
                               required>
                        @error('date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Location --}}
                    <div>
                        <label for="location" class="block font-semibold mb-1">Location</label>
                        <input type="text" name="location" id="location" 
                               value="{{ old('location', $event->location ?? '') }}"
                               class="w-full border rounded px-3 py-2 @error('location') border-red-500 @enderror"
                               required>
                        @error('location')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Capacity --}}
                    <div>
                        <label for="capacity" class="block font-semibold mb-1">Capacity</label>
                        <input type="number" name="capacity" id="capacity" 
                               value="{{ old('capacity', $event->capacity ?? '') }}"
                               min="1"
                               class="w-full border rounded px-3 py-2 @error('capacity') border-red-500 @enderror"
                               required>
                        @error('capacity')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Image --}}
                    <div>
                        <label for="image" class="block font-semibold mb-1">Event Image (optional)</label>
                        <input type="file" name="image" id="image" accept="image/*"
                               class="w-full border rounded px-3 py-2 @error('image') border-red-500 @enderror">
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        
                        @if(isset($event) && $event->image && \App\Helpers\ImageHelper::imageExists($event->image))
                            <div class="mt-2">
                                <p class="text-sm text-gray-600 mb-2">Current image:</p>
                                <img src="{{ \App\Helpers\ImageHelper::getEventImageUrl($event->image) }}" 
                                     alt="Current image" 
                                     class="w-48 h-32 object-cover rounded border">
                            </div>
                        @endif
                    </div>

                    {{-- Submit Button --}}
                    <div class="flex space-x-4">
                        <button type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition-colors">
                            {{ isset($event) ? 'Update Event' : 'Create Event' }}
                        </button>
                        <a href="{{ route('events.index') }}" 
                           class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded transition-colors">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
