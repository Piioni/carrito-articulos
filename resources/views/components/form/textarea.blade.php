@props(['name', 'label', 'value' => null, 'placeholder' => '', 'rows' => 4])

<div class="form-group">
    <label for="{{ $name }}" class="form-label">
        {{ $label }}
        @if($attributes->has('required'))
            <span class="text-danger">*</span>
        @endif
    </label>
    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        placeholder="{{ $placeholder }}"
        rows="{{ $rows }}"
        {{ $attributes->merge(['class' => $errors->has($name) ? 'form-input-error resize-none' : 'form-input resize-none']) }}
    >{{ old($name, $value ?? '') }}</textarea>

    @error($name)
        <p class="form-error">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            {{ $message }}
        </p>
    @enderror
</div>
