@props(['title' => 'No results found', 'description' => '', 'action' => null])

<div {{ $attributes->merge(['class' => 'text-center py-12']) }}>
    <svg class="w-12 h-12 text-muted mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
    </svg>
    <h3 class="text-lg font-semibold text-slate-dark mb-1">{{ $title }}</h3>
    @if ($description)
        <p class="text-muted text-sm">{{ $description }}</p>
    @endif
    @if ($action)
        <div class="mt-4">
            {{ $action }}
        </div>
    @endif
</div>
