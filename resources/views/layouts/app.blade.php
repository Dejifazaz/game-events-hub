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
</body>
</html>
