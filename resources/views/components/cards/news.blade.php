@props(['news'])

<div {{ $attributes->merge(['class' => 'bg-white border border-border rounded-2xl overflow-hidden hover:shadow-md transition-shadow']) }}>
    <div class="aspect-[16/9] bg-light-gray flex items-center justify-center text-muted text-sm">
        @if ($news->featured_image)
            <img src="{{ asset('storage/' . $news->featured_image) }}" alt="{{ $news->title }}" class="w-full h-full object-cover">
        @else
            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        @endif
    </div>
    <div class="p-5">
        <div class="flex items-center gap-2 mb-2">
            @if ($news->category)
                <x-ui.badge variant="primary">{{ $news->category->name }}</x-ui.badge>
            @endif
        </div>
        <h3 class="font-semibold text-slate-dark mb-1">
            <a href="{{ route('news.show', $news->slug) }}" class="hover:text-academic-blue transition-colors">
                {{ $news->title }}
            </a>
        </h3>
        <p class="text-sm text-muted line-clamp-2">{{ $news->excerpt ?? strip_tags($news->content) }}</p>
        <p class="text-xs text-muted mt-3">{{ $news->published_at?->format('M d, Y') ?? $news->created_at->format('M d, Y') }}</p>
    </div>
</div>
