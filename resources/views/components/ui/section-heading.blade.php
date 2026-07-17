@props(['title' => '', 'subtitle' => '', 'action' => null])

<div {{ $attributes->merge(['class' => 'flex items-center justify-between mb-8 lg:mb-12']) }}>
    <div>
        <h2 class="text-2xl lg:text-4xl font-bold text-academic-blue">{{ $title }}</h2>
        @if ($subtitle)
            <p class="text-muted mt-1">{{ $subtitle }}</p>
        @endif
    </div>
    @if ($action)
        <div class="shrink-0">
            {{ $action }}
        </div>
    @endif
</div>
