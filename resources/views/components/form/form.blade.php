@props(['action', 'method' => 'POST', 'buttonText' => 'Guardar'])

<form action="{{ $action }}" method="POST" {{ $attributes }}>
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif

    <div class="space-y-4">
        {{ $slot }}
    </div>

    <div class="mt-6">
        <x-ui.button type="submit" class="w-full">
            {{ $buttonText }}
        </x-ui.button>
    </div>
</form>
