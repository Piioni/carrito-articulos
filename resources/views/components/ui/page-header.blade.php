@props(['title', 'subtitle' => null])

<div class="mb-8">
    <h1 class="page-title">{{ $title }}</h1>
    @if($subtitle)
        <p class="page-subtitle">{{ $subtitle }}</p>
    @endif
    @if(isset($actions))
        <div class="mt-4 flex flex-wrap gap-3">
            {{ $actions }}
        </div>
    @endif
</div>

