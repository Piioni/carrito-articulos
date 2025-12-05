@props([
    'href',
    'text' => 'Volver',
])

<a
    href="{{ $href }}"
    {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 text-thistle hover:text-fulvous transition-colors mb-6 group']) }}
>
    <svg
        class="h-5 w-5 transition-transform group-hover:-translate-x-1"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
    >
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
    </svg>
    <span class="font-medium">{{ $text }}</span>
</a>
