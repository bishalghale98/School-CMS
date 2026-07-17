@extends('layouts.public')

@section('breadcrumbs')
    <x-layout.breadcrumbs :crumbs="[['label' => 'News', 'url' => null]]" />
@endsection

@section('title', 'News')
@section('meta_description', 'Latest news and updates from our school.')

@section('content')
    <section class="relative bg-gradient-to-br from-slate-dark via-slate-dark to-academic-blue/80 py-20 lg:py-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10"><div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 -translate-y-1/3"></div></div>
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 relative z-10">
            <span class="inline-block px-4 py-1 rounded-full bg-white/10 text-white/80 text-sm font-semibold mb-4">Updates</span>
            <h1 class="text-4xl lg:text-6xl font-bold text-white mb-4">Latest News</h1>
            <p class="text-lg text-white/70 max-w-2xl">Stay updated with the latest happenings, achievements, and announcements from our school.</p>
        </div>
    </section>

    <section class="py-8 bg-white border-b border-border sticky top-16 lg:top-[72px] z-30">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <form method="GET" action="{{ route('news.index') }}" class="flex flex-col md:flex-row gap-3">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search news..." class="w-full md:w-72 h-11 px-4 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow">
                <select name="category" class="w-full md:w-48 h-11 px-4 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }} ({{ $category->news_count }})</option>
                    @endforeach
                </select>
                <button type="submit" class="h-11 px-6 rounded-xl bg-academic-blue text-white text-sm font-medium hover:bg-academic-blue/90 transition-colors">Filter</button>
                @if (request('search') || request('category'))
                    <a href="{{ route('news.index') }}" class="h-11 px-6 rounded-xl border border-border text-sm font-medium text-muted hover:bg-light-gray transition-colors inline-flex items-center">Clear</a>
                @endif
            </form>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            @if ($featured)
                <div class="mb-10">
                    <a href="{{ route('news.show', $featured->slug) }}" class="group relative rounded-3xl overflow-hidden bg-light-gray block">
                        <div class="md:flex">
                            <div class="md:w-1/2 aspect-[16/9] md:aspect-auto">
                                @if ($featured->featured_image)
                                    <img src="{{ asset('storage/' . $featured->featured_image) }}" alt="{{ $featured->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-academic-blue/10 to-academic-blue/5 flex items-center justify-center min-h-[300px]">
                                        <svg class="w-16 h-16 text-muted/30" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                    </div>
                                @endif
                            </div>
                            <div class="md:w-1/2 p-8 lg:p-12 flex flex-col justify-center">
                                <div class="flex items-center gap-2 mb-3">
                                    @if ($featured->category)
                                        <x-ui.badge variant="primary">{{ $featured->category->name }}</x-ui.badge>
                                    @endif
                                    <span class="text-xs text-muted">Featured</span>
                                </div>
                                <h2 class="text-2xl lg:text-3xl font-bold text-slate-dark mb-3 group-hover:text-academic-blue transition-colors">{{ $featured->title }}</h2>
                                <p class="text-muted mb-4 line-clamp-3">{{ $featured->excerpt ?? strip_tags($featured->content) }}</p>
                                <p class="text-xs text-muted">{{ $featured->published_at?->format('F d, Y') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endif

            @if ($news->count())
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($news as $item)
                        <x-cards.news :news="$item" />
                    @endforeach
                </div>
                <div class="mt-8">
                    <x-ui.pagination :paginator="$news" />
                </div>
            @elseif (!$featured)
                <x-ui.empty-state title="No news found" description="Check back later for updates." />
            @endif
        </div>
    </section>

    <section class="py-12 lg:py-16 bg-academic-blue">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 text-center">
            <h2 class="text-2xl lg:text-3xl font-bold text-white mb-3">Stay Connected</h2>
            <p class="text-white/80 mb-6">Don't miss important updates. Follow us or subscribe to our newsletter.</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 h-12 text-sm font-semibold text-academic-blue bg-white rounded-xl hover:bg-white/90 transition-all">Contact Us</a>
        </div>
    </section>
@endsection
