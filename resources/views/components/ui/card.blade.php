<div class="card">
    @if(isset($title))
    <div class="mb-4 border-b-2 border-accent pb-3">
        <h3 class="text-xl font-bold text-thistle">{{ $title }}</h3>
    </div>
    @endif
    <div>
        {{ $slot }}
    </div>
</div>