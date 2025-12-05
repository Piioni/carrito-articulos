@props(['name', 'size' => 'md'])

@php
    $sizeClass = match($size) {
        'sm' => 'w-7 h-7 text-xs',
        'lg' => 'w-12 h-12 text-lg',
        'xl' => 'w-16 h-16 text-xl',
        default => 'w-9 h-9 text-sm',
    };
@endphp

<div {{ $attributes->merge(['class' => "rounded-full bg-gradient-to-br from-accent to-fulvous/80 flex items-center justify-center text-white font-bold shadow-sm shrink-0 $sizeClass"]) }}>
    {{ strtoupper(substr($name, 0, 1)) }}
</div>
