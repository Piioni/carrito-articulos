@props([
    'name',
    'id' => null,
    'label' => null,
    'checked' => false,
])

<div class="flex items-center gap-3">
    <input
        type="checkbox"
        name="{{ $name }}"
        id="{{ $id ?? $name }}"
        {{ $checked ? 'checked' : '' }}
        {{ $attributes->merge(['class' => 'w-5 h-5 text-fulvous bg-white-smoke border-2 border-cream rounded focus:ring-accent focus:ring-2 transition-colors cursor-pointer']) }}
    />
    @if ($label)
        <label for="{{ $id ?? $name }}" class="text-charcoal cursor-pointer select-none text-sm">
            {{ $label }}
        </label>
    @endif
</div>
