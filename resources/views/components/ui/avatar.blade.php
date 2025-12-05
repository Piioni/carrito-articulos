@props([
    'name',
    'size' => 'md',
])

@php
    $sizeClass = match ($size) {
        'sm' => 'h-7 w-7 text-xs',
        'lg' => 'h-12 w-12 text-lg',
        'xl' => 'h-16 w-16 text-xl',
        default => 'h-9 w-9 text-sm',
    };
@endphp

<div
    {{ $attributes->merge(['class' => "rounded-full bg-gradient-to-br from-accent to-fulvous/80 flex items-center justify-center text-white font-bold shadow-sm shrink-0 $sizeClass"]) }}
>
    {{ strtoupper(substr($name, 0, 1)) }}
</div>
