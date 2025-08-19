@extends('layouts.app')

@section('title', 'My Dashboard')

@section('content')
<div class="py-8 relative z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Welcome Section -->
        <div class="mb-12">
            <div class="glass-effect rounded-2xl p-8 card-hover">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <h1 class="text-3xl md:text-4xl font-bold gradient-text mb-4">Welcome back, {{ auth()->user()->name }}!</h1>
                        <p class="text-secondary-600 text-lg">Here's what's happening with your events today.</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="w-20 h-20 bg-gradient-to-br from-primary-500 to-accent-500 rounded-full flex items-center justify-center text-white text-3xl font-bold shadow-lg">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4 mb-12">
            <div class="stat-card rounded-2xl p-8 card-hover">
                <div class="flex flex-col items-start">
                    <div class="w-16 h-16 bg-primary-100 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <p class="text-secondary-600 text-sm font-medium mb-2">Total Events</p>
                    <p class="text-4xl font-bold text-primary-600 mb-2">{{ $totalEventsCount }}</p>
                    <p class="text-xs text-secondary-500">All your created events</p>
                </div>
            </div>

            <div class="stat-card rounded-2xl p-8 card-hover">
                <div class="flex flex-col items-start">
                    <div class="w-16 h-16 bg-success-100 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-secondary-600 text-sm font-medium mb-2">Approved Events</p>
                    <p class="text-4xl font-bold text-success-600 mb-2">{{ $approvedEventsCount }}</p>
                    <p class="text-xs text-secondary-500">Ready to go live</p>
                </div>
            </div>

            <div class="stat-card rounded-2xl p-8 card-hover">
                <div class="flex flex-col items-start">
                    <div class="w-16 h-16 bg-warning-100 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-warning-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-secondary-600 text-sm font-medium mb-2">Pending Events</p>
                    <p class="text-4xl font-bold text-warning-600 mb-2">{{ $pendingEventsCount }}</p>
                    <p class="text-xs text-secondary-500">Awaiting approval</p>
                </div>
            </div>

            <div class="stat-card rounded-2xl p-8 card-hover">
                <div class="flex flex-col items-start">
                    <div class="w-16 h-16 bg-accent-100 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <p class="text-secondary-600 text-sm font-medium mb-2">Upcoming</p>
                    <p class="text-4xl font-bold text-accent-600 mb-2">{{ $upcomingEvents->count() }}</p>
                    <p class="text-xs text-secondary-500">Next 30 days</p>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid gap-12 lg:grid-cols-3">
            <!-- Left Column - Quick Actions & Upcoming Events -->
            <div class="lg:col-span-2 space-y-12">
                <!-- Quick Actions -->
                <div class="glass-effect rounded-2xl p-8 card-hover">
                    <h2 class="text-2xl font-bold text-secondary-800 mb-8 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Quick Actions
                    </h2>
                    <div class="grid gap-6 md:grid-cols-2">
                        <a href="{{ route('events.create') }}" class="group p-6 bg-gradient-to-r from-primary-50 to-primary-100 rounded-xl border border-primary-200 hover:border-primary-300 transition-all duration-200 hover-lift">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-primary-500 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-secondary-800 text-lg mb-1">Create New Event</h3>
                                    <p class="text-sm text-secondary-600">Start planning your next event</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('user.my-events') }}" class="group p-6 bg-gradient-to-r from-secondary-50 to-secondary-100 rounded-xl border border-secondary-200 hover:border-secondary-300 transition-all duration-200 hover-lift">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-secondary-500 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-secondary-800 text-lg mb-1">View My Events</h3>
                                    <p class="text-sm text-secondary-600">Manage all your events</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('events.index') }}" class="group p-6 bg-gradient-to-r from-success-50 to-success-100 rounded-xl border border-success-200 hover:border-success-300 transition-all duration-200 hover-lift">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-success-500 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-secondary-800 text-lg mb-1">Browse All Events</h3>
                                    <p class="text-sm text-secondary-600">Discover events from others</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('profile.edit') }}" class="group p-6 bg-gradient-to-r from-accent-50 to-accent-100 rounded-xl border border-accent-200 hover:border-accent-300 transition-all duration-200 hover-lift">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-accent-500 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-secondary-800 text-lg mb-1">Edit Profile</h3>
                                    <p class="text-sm text-secondary-600">Update your information</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Upcoming Events -->
                <div class="glass-effect rounded-2xl p-8 card-hover">
                    <h2 class="text-2xl font-bold text-secondary-800 mb-8 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Upcoming Events (Next 30 Days)
                    </h2>
                    @if($upcomingEvents->isEmpty())
                        <div class="text-center py-12">
                            <svg class="w-20 h-20 text-secondary-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-secondary-600 mb-6 text-lg">No upcoming events in the next 30 days.</p>
                            <a href="{{ route('events.create') }}" class="btn-primary px-8 py-3 rounded-xl text-base font-medium">
                                Create Your First Event
                            </a>
                        </div>
                    @else
                        <div class="space-y-6">
                            @foreach($upcomingEvents as $event)
                                <div class="flex items-center justify-between p-6 bg-white/50 rounded-xl border border-white/50 hover:bg-white/70 transition-all duration-200 hover-lift">
                                    <div class="flex items-center space-x-6">
                                        @if($event->image && \App\Helpers\ImageHelper::imageExists($event->image))
                                            <img src="{{ \App\Helpers\ImageHelper::getEventImageUrl($event->image) }}" 
                                                 alt="{{ $event->title }}" 
                                                 class="w-16 h-16 rounded-xl object-cover shadow-md">
                                        @else
                                            <div class="w-16 h-16 bg-secondary-200 rounded-xl flex items-center justify-center shadow-md">
                                                <svg class="w-8 h-8 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                        <div>
                                            <h4 class="font-semibold text-secondary-800 text-lg mb-2">{{ $event->title }}</h4>
                                            <p class="text-secondary-600">{{ $event->date->format('M d, Y') }} • {{ $event->location }}</p>
                                        </div>
                                    </div>
                                    <a href="{{ route('events.show', $event) }}" class="text-primary-600 hover:text-primary-800 text-base font-medium flex items-center">
                                        View Details
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right Column - Recent Events & Activity -->
            <div class="space-y-12">
                <!-- Recent Events -->
                <div class="glass-effect rounded-2xl p-8 card-hover">
                    <h2 class="text-2xl font-bold text-secondary-800 mb-8 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Recent Events
                    </h2>
                    
                    @if($userEvents->isEmpty())
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-secondary-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <p class="text-secondary-600 text-base mb-6">You haven't created any events yet.</p>
                            <a href="{{ route('events.create') }}" class="btn-primary px-6 py-3 rounded-xl text-base font-medium">
                                Create Your First Event
                            </a>
                        </div>
                    @else
                        <div class="space-y-6">
                            @foreach($userEvents as $event)
                                <div class="p-6 bg-white/50 rounded-xl border border-white/50 hover:bg-white/70 transition-all duration-200 hover-lift">
                                    <div class="flex items-center justify-between mb-4">
                                        <h4 class="font-semibold text-secondary-800 text-base truncate">{{ $event->title }}</h4>
                                        @if($event->approved)
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-success-100 text-success-800 border border-success-200">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                </svg>
                                                Approved
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-warning-100 text-warning-800 border border-warning-200">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                                </svg>
                                                Pending
                                            </span>
                                        @endif
                                    </div>
                                    <p class="text-sm text-secondary-600 mb-4">{{ $event->date->format('M d, Y') }} • {{ $event->location }}</p>
                                    <div class="flex space-x-4">
                                        <a href="{{ route('events.show', $event) }}" class="text-primary-600 hover:text-primary-800 text-sm font-medium">View</a>
                                        <a href="{{ route('events.edit', $event) }}" class="text-secondary-600 hover:text-secondary-800 text-sm font-medium">Edit</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-8 pt-6 border-t border-white/50">
                            <a href="{{ route('user.my-events') }}" class="text-primary-600 hover:text-primary-800 text-base font-medium flex items-center">
                                View All My Events
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Quick Stats -->
                <div class="glass-effect rounded-2xl p-8 card-hover">
                    <h2 class="text-2xl font-bold text-secondary-800 mb-8 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Event Insights
                    </h2>
                    <div class="space-y-6">
                        <div class="flex items-center justify-between p-4 bg-white/50 rounded-xl">
                            <span class="text-base text-secondary-600">Approval Rate</span>
                            <span class="text-2xl font-bold text-success-600">
                                {{ $totalEventsCount > 0 ? round(($approvedEventsCount / $totalEventsCount) * 100) : 0 }}%
                            </span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-white/50 rounded-xl">
                            <span class="text-base text-secondary-600">Avg. Capacity</span>
                            <span class="text-2xl font-bold text-primary-600">
                                {{ $userEvents->avg('capacity') ? round($userEvents->avg('capacity')) : 0 }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-white/50 rounded-xl">
                            <span class="text-base text-secondary-600">This Month</span>
                            <span class="text-2xl font-bold text-accent-600">
                                {{ $userEvents->where('date', '>=', now()->startOfMonth())->count() }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
