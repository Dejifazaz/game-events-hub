<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --primary-50: #f0f9ff;
            --primary-100: #e0f2fe;
            --primary-200: #bae6fd;
            --primary-300: #7dd3fc;
            --primary-400: #38bdf8;
            --primary-500: #0ea5e9;
            --primary-600: #0284c7;
            --primary-700: #0369a1;
            --primary-800: #075985;
            --primary-900: #0c4a6e;
            
            --secondary-50: #f8fafc;
            --secondary-100: #f1f5f9;
            --secondary-200: #e2e8f0;
            --secondary-300: #cbd5e1;
            --secondary-400: #94a3b8;
            --secondary-500: #64748b;
            --secondary-600: #475569;
            --secondary-700: #334155;
            --secondary-800: #1e293b;
            --secondary-900: #0f172a;
            
            --accent-50: #fefce8;
            --accent-100: #fef9c3;
            --accent-200: #fef08a;
            --accent-300: #fde047;
            --accent-400: #facc15;
            --accent-500: #eab308;
            --accent-600: #ca8a04;
            --accent-700: #a16207;
            --accent-800: #854d0e;
            --accent-900: #713f12;
            
            --success-50: #f0fdf4;
            --success-100: #dcfce7;
            --success-200: #bbf7d0;
            --success-300: #86efac;
            --success-400: #4ade80;
            --success-500: #22c55e;
            --success-600: #16a34a;
            --success-700: #15803d;
            --success-800: #166534;
            --success-900: #14532d;
            
            --warning-50: #fffbeb;
            --warning-100: #fef3c7;
            --warning-200: #fde68a;
            --warning-300: #fcd34d;
            --warning-400: #fbbf24;
            --warning-500: #f59e0b;
            --warning-600: #d97706;
            --warning-700: #b45309;
            --warning-800: #92400e;
            --warning-900: #78350f;
            
            --danger-50: #fef2f2;
            --danger-100: #fee2e2;
            --danger-200: #fecaca;
            --danger-300: #fca5a5;
            --danger-400: #f87171;
            --danger-500: #ef4444;
            --danger-600: #dc2626;
            --danger-700: #b91c1c;
            --danger-800: #991b1b;
            --danger-900: #7f1d1d;
        }
        
        body {
            background: linear-gradient(135deg, var(--secondary-50) 0%, var(--primary-50) 100%);
            min-height: 100vh;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-800));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-700));
            border: none;
            transition: all 0.3s ease;
            color: white;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-700), var(--primary-800));
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(14, 165, 233, 0.3);
            color: white;
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, var(--secondary-600), var(--secondary-700));
            border: none;
            transition: all 0.3s ease;
            color: white;
        }
        
        .btn-secondary:hover {
            background: linear-gradient(135deg, var(--secondary-700), var(--secondary-800));
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(71, 85, 105, 0.3);
            color: white;
        }
        
        .btn-accent {
            background: linear-gradient(135deg, var(--accent-500), var(--accent-600));
            border: none;
            transition: all 0.3s ease;
            color: white;
        }
        
        .btn-accent:hover {
            background: linear-gradient(135deg, var(--accent-600), var(--accent-700));
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(234, 179, 8, 0.3);
            color: white;
        }
        
        .stat-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.85));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .animate-fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-slide-up {
            animation: slideUp 0.3s ease-out;
        }
        
        @keyframes slideUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .hover-lift {
            transition: all 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .text-shadow {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .backdrop-blur-sm {
            backdrop-filter: blur(4px);
        }
        
        .backdrop-blur-md {
            backdrop-filter: blur(8px);
        }
        
        .backdrop-blur-lg {
            backdrop-filter: blur(16px);
        }
        
        /* Fix z-index issues for dropdowns */
        .relative {
            position: relative;
        }
        
        .z-50 {
            z-index: 50;
        }
        
        .z-40 {
            z-index: 40;
        }
        
        .z-30 {
            z-index: 30;
        }
        
        .z-20 {
            z-index: 20;
        }
        
        .z-10 {
            z-index: 10;
        }
        
        /* Ensure dropdowns appear above other content */
        [x-data] {
            position: relative;
        }
        
        /* Professional color overrides */
        .text-primary-600 {
            color: var(--primary-600) !important;
        }
        
        .text-primary-700 {
            color: var(--primary-700) !important;
        }
        
        .text-primary-800 {
            color: var(--primary-800) !important;
        }
        
        .text-secondary-600 {
            color: var(--secondary-600) !important;
        }
        
        .text-secondary-700 {
            color: var(--secondary-700) !important;
        }
        
        .text-secondary-800 {
            color: var(--secondary-800) !important;
        }
        
        .bg-primary-50 {
            background-color: var(--primary-50) !important;
        }
        
        .bg-primary-100 {
            background-color: var(--primary-100) !important;
        }
        
        .bg-primary-500 {
            background-color: var(--primary-500) !important;
        }
        
        .bg-primary-600 {
            background-color: var(--primary-600) !important;
        }
        
        .bg-secondary-50 {
            background-color: var(--secondary-50) !important;
        }
        
        .bg-secondary-100 {
            background-color: var(--secondary-100) !important;
        }
        
        .bg-secondary-500 {
            background-color: var(--secondary-500) !important;
        }
        
        .bg-secondary-600 {
            background-color: var(--secondary-600) !important;
        }
        
        .border-primary-200 {
            border-color: var(--primary-200) !important;
        }
        
        .border-primary-300 {
            border-color: var(--primary-300) !important;
        }
        
        .border-secondary-200 {
            border-color: var(--secondary-200) !important;
        }
        
        .border-secondary-300 {
            border-color: var(--secondary-300) !important;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="glass-effect shadow-sm border-b border-white/20">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @elseif (View::hasSection('header'))
            <header class="glass-effect shadow-sm border-b border-white/20">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @yield('header')
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="relative z-10">
            @isset($slot)
                {{ $slot }}
            @else
                @yield('content')
            @endisset
        </main>
    </div>

    <!-- Professional Footer -->
    <footer class="bg-gray-900 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="bg-white rounded-xl p-2">
                            <x-application-logo class="block h-8 w-auto fill-current text-primary-600" />
                        </div>
                        <span class="text-xl font-bold text-white drop-shadow-lg">Game Events Hub</span>
                    </div>
                                    <p class="text-gray-100 mb-4 max-w-md font-medium">
                    Your premier platform for discovering and creating amazing events. 
                    From sports matches to concerts, we connect people through unforgettable experiences.
                </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-100 hover:text-yellow-300 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-100 hover:text-yellow-300 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-100 hover:text-yellow-300 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-white drop-shadow-sm">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('events.index') }}" class="text-gray-100 hover:text-yellow-300 transition-colors font-medium">Browse Events</a></li>
                        <li><a href="{{ route('events.create') }}" class="text-gray-100 hover:text-yellow-300 transition-colors font-medium">Create Event</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-100 hover:text-yellow-300 transition-colors font-medium">Contact Us</a></li>
                        @auth
                            <li><a href="{{ route('dashboard') }}" class="text-gray-100 hover:text-yellow-300 transition-colors font-medium">Dashboard</a></li>
                        @else
                            <li><a href="{{ route('login') }}" class="text-gray-100 hover:text-yellow-300 transition-colors font-medium">Login</a></li>
                            <li><a href="{{ route('register') }}" class="text-gray-100 hover:text-yellow-300 transition-colors font-medium">Register</a></li>
                        @endauth
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-white drop-shadow-sm">Support</h3>
                    <ul class="space-y-2">
                                                                            <li><a href="#" class="text-gray-100 hover:text-yellow-300 transition-colors font-medium">Help Center</a></li>
                        <li><a href="{{ route('sitemap') }}" class="text-gray-100 hover:text-yellow-300 transition-colors font-medium">Sitemap</a></li>
                        <li><a href="#" class="text-gray-100 hover:text-yellow-300 transition-colors font-medium">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-100 hover:text-yellow-300 transition-colors font-medium">Terms of Service</a></li>
                        <li><a href="#" class="text-gray-100 hover:text-yellow-300 transition-colors font-medium">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-secondary-700 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-100 text-sm font-medium">
                    © {{ date('Y') }} Game Events Hub. All rights reserved.
                </p>
                <p class="text-gray-100 text-sm mt-2 md:mt-0 font-medium">
                    Built with Laravel & Tailwind CSS
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
