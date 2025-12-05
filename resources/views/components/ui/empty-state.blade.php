@props([
    'icon' => '📭',
    'title',
    'description' => null,
])

<div class="empty-state">
    <div class="empty-state-icon">{{ $icon }}</div>
    <h3 class="empty-state-title">{{ $title }}</h3>
    @if ($description)
        <p class="empty-state-text">{{ $description }}</p>
    @endif

    @if (isset($action))
        <div>
            {{ $action }}
        </div>
    @endif
</div>
