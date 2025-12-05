@props(['type' => 'button', 'variant' => 'primary', 'size' => 'md'])

@php
    $variantClass = match($variant) {
        'secondary' => 'btn-secondary',
        'danger' => 'btn-danger',
        'ghost' => 'btn-ghost',
        default => 'btn-primary',
    };

    $sizeClass = match($size) {
        'sm' => 'text-sm px-3 py-1.5',
        'lg' => 'text-lg px-6 py-3',
        default => '',
    };
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => "$variantClass $sizeClass"]) }}
>
    {{ $slot }}
</button>