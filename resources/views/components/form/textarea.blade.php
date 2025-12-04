<div>
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
        {{ $label }}
    </label>
    <textarea
            name="{{ $name }}"
            id="{{ $name }}"
            {{ $attributes->merge(['class' => 'w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500', 'rows' => 4]) }}
    >
        {{ old($name, $value ?? '') }}
    </textarea>

    @error($name)
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>