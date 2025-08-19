@props(['size' => 'md', 'text' => 'Loading...'])

@php
    $sizeClasses = [
        'sm' => 'w-4 h-4',
        'md' => 'w-6 h-6',
        'lg' => 'w-8 h-8',
        'xl' => 'w-12 h-12'
    ];
    
    $textSizes = [
        'sm' => 'text-sm',
        'md' => 'text-base',
        'lg' => 'text-lg',
        'xl' => 'text-xl'
    ];
@endphp

<div class="flex items-center justify-center {{ $attributes->get('class', '') }}">
    <div class="flex flex-col items-center space-y-2">
        <div class="relative">
            <div class="{{ $sizeClasses[$size] }} animate-spin rounded-full border-2 border-secondary-200 border-t-primary-600"></div>
        </div>
        @if($text)
            <p class="{{ $textSizes[$size] }} text-secondary-600 font-medium">{{ $text }}</p>
        @endif
    </div>
</div>
