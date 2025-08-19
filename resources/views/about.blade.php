@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-secondary-800 py-16">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                About Game Events Hub
            </h1>
            <p class="text-xl text-white/90 max-w-3xl mx-auto">
                Connecting people through amazing events and unforgettable experiences.
            </p>
        </div>
    </div>

    <!-- Mission Section -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-secondary-800 mb-6">Our Mission</h2>
                    <p class="text-lg text-secondary-600 mb-6">
                        At Game Events Hub, we believe that great events have the power to bring people together, 
                        create lasting memories, and build stronger communities. Our mission is to provide a 
                        platform where event creators and attendees can connect seamlessly.
                    </p>
                    <p class="text-lg text-secondary-600 mb-6">
                        Whether you're organizing a local sports tournament, planning a gaming convention, 
                        or hosting a community fundraiser, we're here to help you reach your audience and 
                        make your event a success.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('events.create') }}" 
                           class="inline-flex items-center px-6 py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Create Your First Event
                        </a>
                        <a href="{{ route('contact') }}" 
                           class="inline-flex items-center px-6 py-3 border-2 border-primary-600 text-primary-600 font-semibold rounded-lg hover:bg-primary-600 hover:text-white transition-colors">
                            Contact Us
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-gradient-to-br from-primary-100 to-accent-100 rounded-2xl p-8">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-primary-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-secondary-800 mb-2">Community</h3>
                                <p class="text-sm text-secondary-600">Building connections through shared experiences</p>
                            </div>
                            <div class="text-center">
                                <div class="w-16 h-16 bg-accent-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-secondary-800 mb-2">Quality</h3>
                                <p class="text-sm text-secondary-600">Curated events that meet our standards</p>
                            </div>
                            <div class="text-center">
                                <div class="w-16 h-16 bg-success-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-secondary-800 mb-2">Innovation</h3>
                                <p class="text-sm text-secondary-600">Modern platform with cutting-edge features</p>
                            </div>
                            <div class="text-center">
                                <div class="w-16 h-16 bg-secondary-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-secondary-800 mb-2">Passion</h3>
                                <p class="text-sm text-secondary-600">Driven by our love for great events</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Values Section -->
    <div class="py-16 bg-secondary-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-secondary-800 mb-4">Our Values</h2>
                <p class="text-lg text-secondary-600 max-w-2xl mx-auto">
                    These core values guide everything we do at Game Events Hub.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-sm">
                    <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-secondary-800 mb-4">Trust & Safety</h3>
                    <p class="text-secondary-600">
                        We prioritize the safety and trust of our community. All events are reviewed to ensure 
                        they meet our quality standards and community guidelines.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm">
                    <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-secondary-800 mb-4">Inclusivity</h3>
                    <p class="text-secondary-600">
                        We believe events should be accessible to everyone. Our platform welcomes diverse 
                        communities and promotes inclusive event experiences.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm">
                    <div class="w-12 h-12 bg-success-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-secondary-800 mb-4">Innovation</h3>
                    <p class="text-secondary-600">
                        We continuously improve our platform with cutting-edge features and technology 
                        to provide the best experience for event creators and attendees.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-secondary-800 mb-4">Our Story</h2>
                <p class="text-lg text-secondary-600 max-w-3xl mx-auto">
                    Game Events Hub was born from a simple idea: making it easier for people to discover 
                    and create amazing events. What started as a small project has grown into a vibrant 
                    community platform.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1">
                    <div class="bg-gradient-to-br from-primary-100 to-accent-100 rounded-2xl p-8">
                        <h3 class="text-2xl font-bold text-secondary-800 mb-4">From Idea to Reality</h3>
                        <p class="text-secondary-600 mb-6">
                            Our journey began when we noticed how difficult it was to find quality events 
                            in our local community. Traditional event platforms were either too generic 
                            or too focused on specific niches.
                        </p>
                        <p class="text-secondary-600 mb-6">
                            We decided to build a platform that would serve the gaming and sports community 
                            specifically, with features tailored to their needs. Today, we're proud to serve 
                            thousands of users across the globe.
                        </p>
                        <div class="flex items-center space-x-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-primary-600">{{ \App\Models\Event::where('approved', true)->count() }}+</div>
                                <div class="text-sm text-secondary-600">Events Created</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-accent-600">{{ \App\Models\User::count() }}+</div>
                                <div class="text-sm text-secondary-600">Happy Users</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-1 lg:order-2">
                    <div class="bg-secondary-100 rounded-2xl p-8 text-center">
                        <div class="w-24 h-24 bg-primary-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-secondary-800 mb-4">Built with Laravel</h3>
                        <p class="text-secondary-600 mb-6">
                            Our platform is built using modern web technologies including Laravel, 
                            ensuring reliability, security, and scalability for our growing community.
                        </p>
                        <div class="flex justify-center space-x-4">
                            <span class="px-3 py-1 bg-primary-100 text-primary-800 rounded-full text-sm font-medium">Laravel</span>
                            <span class="px-3 py-1 bg-accent-100 text-accent-800 rounded-full text-sm font-medium">Tailwind CSS</span>
                            <span class="px-3 py-1 bg-success-100 text-success-800 rounded-full text-sm font-medium">MySQL</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="py-16 bg-gradient-to-r from-primary-600 to-accent-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">
                Join Our Community Today
            </h2>
            <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                Ready to discover amazing events or create your own? Join thousands of users who are already part of our community.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('events.index') }}" 
                   class="inline-flex items-center px-8 py-4 bg-white text-primary-600 font-semibold rounded-xl hover:bg-gray-100 transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Browse Events
                </a>
                @guest
                    <a href="{{ route('register') }}" 
                       class="inline-flex items-center px-8 py-4 border-2 border-white text-white font-semibold rounded-xl hover:bg-white hover:text-primary-600 transition-all duration-300">
                        Get Started Free
                    </a>
                @else
                    <a href="{{ route('events.create') }}" 
                       class="inline-flex items-center px-8 py-4 border-2 border-white text-white font-semibold rounded-xl hover:bg-white hover:text-primary-600 transition-all duration-300">
                        Create Event
                    </a>
                @endguest
            </div>
        </div>
    </div>
@endsection
