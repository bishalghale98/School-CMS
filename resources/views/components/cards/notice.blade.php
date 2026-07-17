@props(['notice'])


<div {{ $attributes->merge(['class' => 'bg-white border border-border rounded-2xl p-6 hover:shadow-md transition-shadow']) }}>


    <div class="flex items-center gap-2 mb-3">
        @if ($notice->category)

            <x-ui.badge variant="primary">{{ $notice->category->name }}</x-ui.badge>
        @endif
        @if ($notice->is_pinned)
            <x-ui.badge variant="warning">Pinned</x-ui.badge>
        @endif
    </div>
    <h3 class="font-semibold text-slate-dark mb-2">
        <a href="{{ route('notices.show', $notice->slug) }}" class="hover:text-academic-blue transition-colors">
            {{ $notice->title }}
        </a>
    </h3>
    <p class="text-sm text-muted line-clamp-2">{{ $notice->excerpt ?? strip_tags($notice->content) }}</p>
    <p class="text-xs text-muted mt-3">{{ $notice->published_at?->format('M d, Y') ?? $notice->created_at->format('M d, Y') }}</p>
</div>
