@props(['variant' => 'default', 'hover' => false])

@php
    $classes = match($variant) {
        'elevated' => 'card-elevated',
        default => $hover ? 'card-hover' : 'card',
    };
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    @if(isset($title))
        <div class="mb-4 pb-3 border-b border-accent/20">
            <h3 class="text-xl font-bold text-thistle">{{ $title }}</h3>
            @if(isset($subtitle))
                <p class="text-sm text-thistle/60 mt-0.5">{{ $subtitle }}</p>
            @endif
        </div>
    @endif
    <div>
        {{ $slot }}
    </div>
    @if(isset($footer))
        <div class="mt-4 pt-3 border-t border-accent/20">
            {{ $footer }}
        </div>
    @endif
</div>