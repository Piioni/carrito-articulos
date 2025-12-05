@props(['variant' => 'default', 'hover' => false])

@php
    $classes = match ($variant) {
        'elevated' => 'card-elevated',
        default => $hover ? 'card-hover' : 'card',
    };
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    @if (isset($title))
        <div class="border-accent/20 mb-4 border-b pb-3">
            <h3 class="text-thistle text-xl font-bold">{{ $title }}</h3>
            @if (isset($subtitle))
                <p class="text-thistle/60 mt-0.5 text-sm">{{ $subtitle }}</p>
            @endif
        </div>
    @endif

    <div>
        {{ $slot }}
    </div>
    @if (isset($footer))
        <div class="border-accent/20 mt-4 border-t pt-3">
            {{ $footer }}
        </div>
    @endif
</div>
