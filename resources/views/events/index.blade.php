@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <!-- Breadcrumbs -->
        <div class="mb-6">
            <x-breadcrumbs :items="[
                ['label' => 'Events', 'url' => route('events.index')]
            ]" />
        </div>
        
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold gradient-text mb-4">Discover Amazing Events</h1>
            <p class="text-secondary-600 text-lg">Find and join the best events happening around you</p>
        </div>

        <!-- Filters -->
        <div class="glass-effect rounded-2xl p-6 mb-8 card-hover">
            <form method="GET" action="{{ route('events.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label for="search" class="block text-sm font-medium text-secondary-700 mb-2">Search Events</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" 
                           placeholder="Search by title, description, location, or category..."
                           class="w-full border border-secondary-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200" />
                </div>
                <div>
                    <label for="category" class="block text-sm font-medium text-secondary-700 mb-2">Category</label>
                    <select name="category" id="category" 
                            class="w-full border border-secondary-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200">
                        <option value="">All categories</option>
                        @foreach($categories as $key => $category)
                            <option value="{{ $key }}" {{ request('category')===$key ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="location" class="block text-sm font-medium text-secondary-700 mb-2">Location</label>
                    <select name="location" id="location" 
                            class="w-full border border-secondary-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200">
                        <option value="">All locations</option>
                        @foreach($locations as $loc)
                            <option value="{{ $loc }}" {{ request('location')===$loc ? 'selected' : '' }}>{{ $loc }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-end space-x-2">
                    <button type="submit" class="flex-1 btn-primary px-6 py-3 rounded-xl font-medium transition-all duration-200">
                        <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Search Events
                    </button>
                    @if(request('search') || request('location') || request('category'))
                        <a href="{{ route('events.index') }}" class="btn-secondary px-4 py-3 rounded-xl font-medium transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="glass-effect rounded-xl p-4 mb-8 border-l-4 border-success-500 bg-success-50">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-success-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <p class="text-success-800 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Search Results Info -->
        @if(request('search') || request('location'))
            <div class="glass-effect rounded-xl p-4 mb-8 border-l-4 border-primary-500 bg-primary-50">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-primary-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <p class="text-primary-800 font-medium">
                            @if(request('search') && request('location') && request('category'))
                                Showing results for "{{ request('search') }}" in {{ request('location') }} - {{ $categories[request('category')] }}
                            @elseif(request('search') && request('location'))
                                Showing results for "{{ request('search') }}" in {{ request('location') }}
                            @elseif(request('search') && request('category'))
                                Showing results for "{{ request('search') }}" in {{ $categories[request('category')] }}
                            @elseif(request('location') && request('category'))
                                Showing {{ $categories[request('category')] }} events in {{ request('location') }}
                            @elseif(request('search'))
                                Showing results for "{{ request('search') }}"
                            @elseif(request('location'))
                                Showing events in {{ request('location') }}
                            @elseif(request('category'))
                                Showing {{ $categories[request('category')] }} events
                            @endif
                            <span class="text-primary-600">({{ $events->total() }} {{ Str::plural('event', $events->total()) }})</span>
                        </p>
                    </div>
                    <a href="{{ route('events.index') }}" class="text-primary-600 hover:text-primary-800 text-sm font-medium">
                        Clear filters
                    </a>
                </div>
            </div>
        @endif

        <!-- Create Event Button -->
        @auth
            <div class="mb-8">
                <a href="{{ route('events.create') }}"
                   class="inline-flex items-center btn-accent px-6 py-3 rounded-xl font-medium shadow-lg transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Create New Event
                </a>
            </div>
        @endauth

        <!-- Events Grid -->
        @if($events->count())
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($events as $event)
                    <div class="glass-effect rounded-2xl overflow-hidden card-hover">
                        @if($event->image && \App\Helpers\ImageHelper::imageExists($event->image))
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ \App\Helpers\ImageHelper::getEventImageUrl($event->image) }}"
                                     alt="{{ $event->title }}"
                                     class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                            </div>
                        @else
                            <div class="relative h-48 bg-gradient-to-br from-secondary-100 to-secondary-200 flex items-center justify-center">
                                <svg class="w-16 h-16 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium border {{ $event->category_color }}">
                                    {{ $event->category_display_name }}
                                </span>
                                @if(!$event->approved)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-warning-100 text-warning-800 border border-warning-200">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                        </svg>
                                        Pending
                                    </span>
                                @endif
                            </div>
                            
                            <h2 class="text-xl font-bold text-secondary-800 mb-2 line-clamp-2">
                                {{ $event->title }}
                            </h2>
                            
                            <div class="flex items-center text-secondary-600 mb-3">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-sm">{{ $event->date->format('M d, Y') }}</span>
                            </div>
                            
                            <div class="flex items-center text-secondary-600 mb-4">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="text-sm">{{ $event->location }}</span>
                            </div>
                            
                            <p class="text-secondary-600 text-sm mb-4 line-clamp-3">
                                {{ Str::limit($event->description, 120) }}
                            </p>

                            <div class="flex items-center justify-between">
                                <a href="{{ route('events.show', $event) }}"
                                   class="btn-primary px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                    View Details
                                </a>

                                @can('update', $event)
                                    <div class="flex space-x-2">
                                        <a href="{{ route('events.edit', $event) }}"
                                           class="text-secondary-600 hover:text-secondary-800 text-sm font-medium transition-colors">
                                            Edit
                                        </a>
                                        <form action="{{ route('events.destroy', $event) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this event?');"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger-600 hover:text-danger-800 text-sm font-medium transition-colors">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endcan
                            </div>
                            
                            @if(auth()->check() && auth()->user()->role === 'admin' && !$event->approved)
                                <div class="mt-4 pt-4 border-t border-secondary-200">
                                    <form action="{{ route('admin.events.approve', $event) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="w-full btn-accent px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Approve Event
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                <div class="glass-effect rounded-xl p-4">
                    {{ $events->appends(request()->query())->links() }}
                </div>
            </div>
        @else
            <div class="text-center py-16">
                <svg class="w-24 h-24 text-secondary-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                <h3 class="text-2xl font-bold text-secondary-800 mb-4">No events found</h3>
                <p class="text-secondary-600 mb-8">Try adjusting your search criteria or create the first event!</p>
                @auth
                    <a href="{{ route('events.create') }}" class="btn-primary px-8 py-3 rounded-xl font-medium">
                        Create the First Event
                    </a>
                @endauth
            </div>
        @endif
    </div>
@endsection
