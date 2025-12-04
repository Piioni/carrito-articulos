<button
    type="{{ $type ?? 'button' }}"
    {{ $attributes->merge(['class' => 'btn-primary']) }}
>
    {{ $slot }}
</button>