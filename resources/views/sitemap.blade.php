@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumbs -->
        <div class="mb-6">
            <x-breadcrumbs :items="[
                ['label' => 'Sitemap', 'url' => route('sitemap')]
            ]" />
        </div>

        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-secondary-800 mb-4">Sitemap</h1>
            <p class="text-lg text-secondary-600 max-w-2xl mx-auto">
                Navigate through all the pages and features available on Game Events Hub
            </p>
        </div>

        <!-- Main Sections -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Public Pages -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-secondary-100">
                <h2 class="text-2xl font-bold text-secondary-800 mb-4 flex items-center">
                    <svg class="w-6 h-6 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                    </svg>
                    Public Pages
                </h2>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('home') }}" class="flex items-center text-secondary-600 hover:text-primary-600 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('events.index') }}" class="flex items-center text-secondary-600 hover:text-primary-600 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Browse Events
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="flex items-center text-secondary-600 hover:text-primary-600 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="flex items-center text-secondary-600 hover:text-primary-600 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Contact Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="flex items-center text-secondary-600 hover:text-primary-600 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Login
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="flex items-center text-secondary-600 hover:text-primary-600 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            Register
                        </a>
                    </li>
                </ul>
            </div>

            <!-- User Features -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-secondary-100">
                <h2 class="text-2xl font-bold text-secondary-800 mb-4 flex items-center">
                    <svg class="w-6 h-6 text-accent-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    User Features
                </h2>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('dashboard') }}" class="flex items-center text-secondary-600 hover:text-primary-600 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('events.create') }}" class="flex items-center text-secondary-600 hover:text-primary-600 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Create Event
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.my-events') }}" class="flex items-center text-secondary-600 hover:text-primary-600 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            My Events
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.edit') }}" class="flex items-center text-secondary-600 hover:text-primary-600 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Profile Settings
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Admin Features -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-secondary-100">
                <h2 class="text-2xl font-bold text-secondary-800 mb-4 flex items-center">
                    <svg class="w-6 h-6 text-success-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    Admin Features
                </h2>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center text-secondary-600 hover:text-primary-600 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Admin Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.events.pending') }}" class="flex items-center text-secondary-600 hover:text-primary-600 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Pending Events
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.index') }}" class="flex items-center text-secondary-600 hover:text-primary-600 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            User Management
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.my-events') }}" class="flex items-center text-secondary-600 hover:text-primary-600 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            My Admin Events
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="mt-12 bg-gradient-to-r from-primary-50 to-accent-50 rounded-2xl p-8">
            <h2 class="text-2xl font-bold text-secondary-800 mb-6 text-center">Platform Statistics</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="text-3xl font-bold text-primary-600 mb-2">{{ \App\Models\Event::where('approved', true)->count() }}</div>
                    <div class="text-secondary-600">Approved Events</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-accent-600 mb-2">{{ \App\Models\Event::where('approved', false)->count() }}</div>
                    <div class="text-secondary-600">Pending Events</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-success-600 mb-2">{{ \App\Models\User::count() }}</div>
                    <div class="text-secondary-600">Registered Users</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-secondary-600 mb-2">{{ \App\Models\User::where('role', 'admin')->count() }}</div>
                    <div class="text-secondary-600">Admin Users</div>
                </div>
            </div>
        </div>

        <!-- Help Section -->
        <div class="mt-12 bg-white rounded-2xl p-8 shadow-sm border border-secondary-100">
            <h2 class="text-2xl font-bold text-secondary-800 mb-6 text-center">Need Help?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-secondary-800 mb-2">FAQ & Support</h3>
                    <p class="text-secondary-600 mb-4">Find answers to common questions and get help with your account.</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium">
                        Contact Support
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-secondary-800 mb-2">About Our Platform</h3>
                    <p class="text-secondary-600 mb-4">Learn more about Game Events Hub and how we help connect communities.</p>
                    <a href="{{ route('about') }}" class="inline-flex items-center text-accent-600 hover:text-accent-700 font-medium">
                        Learn More
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
