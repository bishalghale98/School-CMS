@extends('layouts.public')

@section('og_image', $news->getFirstMediaUrl('featured_image') ?: '')
@section('og_type', 'article')

@section('breadcrumbs')
    <x-layout.breadcrumbs :crumbs="[
        ['label' => 'News', 'url' => route('news.index')],
        ['label' => $news->title, 'url' => null],
    ]" />
@endsection

@section('title', $news->title)

@section('meta_description', $news->meta_description ?? $news->excerpt)

@section('content')
    <section class="py-12 lg:py-16">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="max-w-3xl mx-auto">
                @if ($news->featured_image)
                    <div class="aspect-[16/9] rounded-2xl overflow-hidden bg-light-gray mb-8">
                        <img src="{{ asset('storage/' . $news->featured_image) }}" alt="{{ $news->title }}" class="w-full h-full object-cover">
                    </div>
                @endif

                <div class="flex items-center gap-3 mb-4">
                    @if ($news->category)
                        <x-ui.badge variant="primary">{{ $news->category->name }}</x-ui.badge>
                    @endif
                    <span class="text-sm text-muted">{{ $news->published_at?->format('F d, Y') ?? $news->created_at->format('F d, Y') }}</span>
                </div>

                <h1 class="text-3xl lg:text-5xl font-bold text-slate-dark mb-6">{{ $news->title }}</h1>

                @if ($news->excerpt)
                    <p class="text-lg text-muted mb-8 leading-relaxed">{{ $news->excerpt }}</p>
                @endif

                <div class="prose prose-lg max-w-none mb-10">
                    {!! $news->content !!}
                </div>

                <div class="flex items-center gap-4 border-t border-border pt-6 mb-10">
                    <span class="text-sm font-medium text-slate-dark">Share:</span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('news.show', $news->slug)) }}" target="_blank" rel="noopener" class="p-2 rounded-lg bg-light-gray text-muted hover:bg-academic-blue/10 hover:text-academic-blue transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($news->title) }}&url={{ urlencode(route('news.show', $news->slug)) }}" target="_blank" rel="noopener" class="p-2 rounded-lg bg-light-gray text-muted hover:bg-academic-blue/10 hover:text-academic-blue transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . route('news.show', $news->slug)) }}" target="_blank" rel="noopener" class="p-2 rounded-lg bg-light-gray text-muted hover:bg-academic-blue/10 hover:text-academic-blue transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    </a>
                </div>

                @if ($related && $related->count())
                    <div class="border-t border-border pt-8">
                        <h3 class="font-semibold text-slate-dark mb-4">Related News</h3>
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($related as $rel)
                                <x-cards.news :news="$rel" class="!mb-0" />
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
