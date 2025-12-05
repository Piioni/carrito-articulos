@props(['variant' => 'default'])

@php
    $classes = match ($variant) {
        'elevated' => 'card-elevated',
        default => 'card',
    };
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    @if (isset($title))
        <div class="mb-4 border-b border-accent/20 pb-3">
            <h3 class="text-xl font-bold text-thistle">{{ $title }}</h3>
            @if (isset($subtitle))
                <p class="mt-0.5 text-sm text-thistle/60">{{ $subtitle }}</p>
            @endif
        </div>
    @endif

    <div>
        {{ $slot }}
    </div>
    @if (isset($footer))
        <div class="mt-4 border-t border-accent/20 pt-3">
            {{ $footer }}
        </div>
    @endif
</div>
