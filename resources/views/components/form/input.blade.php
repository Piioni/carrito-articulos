<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-semibold mb-2 text-charcoal">
        {{ $label }}
    </label>
    <input
        type="{{ $type ?? 'text' }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value ?? '') }}"
        {{ $attributes->merge(['class' => '']) }}
    >
    @error($name)
    <p class="text-sm mt-1 text-fulvous">{{ $message }}</p>
    @enderror
</div>