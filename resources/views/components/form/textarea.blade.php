<div class="mb-4">
    <label for="{{ $name }}" class="text-charcoal mb-2 block text-sm font-semibold">
        {{ $label }}
    </label>
    <textarea name="{{ $name }}" id="{{ $name }}"
        {{ $attributes->merge(['class' => 'w-full px-4 py-2 border-2 border-accent bg-white-smoke rounded focus:outline-none focus:ring-2 focus:ring-accent transition-all', 'rows' => 4]) }}>{{ old($name, $value ?? '') }}</textarea>

    @error($name)
        <p class="text-fulvous mt-1 text-sm">{{ $message }}</p>
    @enderror
</div>
