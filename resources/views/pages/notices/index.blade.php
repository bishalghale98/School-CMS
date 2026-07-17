@extends('layouts.public')

@section('breadcrumbs')
    <x-layout.breadcrumbs :crumbs="[['label' => 'Notices', 'url' => null]]" />
@endsection

@section('title', 'Notices')
@section('meta_description', 'Stay informed with the latest announcements from the school.')

@section('content')
    <section class="relative bg-gradient-to-br from-slate-dark via-slate-dark to-academic-blue/80 py-20 lg:py-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10"><div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 -translate-y-1/3"></div></div>
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 relative z-10">
            <span class="inline-block px-4 py-1 rounded-full bg-white/10 text-white/80 text-sm font-semibold mb-4">Announcements</span>
            <h1 class="text-4xl lg:text-6xl font-bold text-white mb-4">Notices</h1>
            <p class="text-lg text-white/70 max-w-2xl">Official announcements and important information from the school administration.</p>
        </div>
    </section>

    <section class="py-8 bg-white border-b border-border sticky top-16 lg:top-[72px] z-30">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <form method="GET" action="{{ route('notices.index') }}" class="flex flex-col md:flex-row gap-3" x-data>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search notices..." class="w-full md:w-72 h-11 px-4 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow">
                <select name="category" class="w-full md:w-48 h-11 px-4 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }} ({{ $category->notices_count }})</option>
                    @endforeach
                </select>
                <button type="submit" class="h-11 px-6 rounded-xl bg-academic-blue text-white text-sm font-medium hover:bg-academic-blue/90 transition-colors">Filter</button>
                @if (request('search') || request('category'))
                    <a href="{{ route('notices.index') }}" class="h-11 px-6 rounded-xl border border-border text-sm font-medium text-muted hover:bg-light-gray transition-colors inline-flex items-center">Clear</a>
                @endif
            </form>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            @if ($notices->count())
                {{-- Pinned notices --}}
                @php $pinned = $notices->filter(fn($n) => $n->is_pinned); @endphp
                @if ($pinned->count())
                    <div class="mb-8">
                        <h2 class="text-lg font-bold text-slate-dark mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-danger" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6z" /></svg>
                            Important Notices
                        </h2>
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                            @foreach ($pinned as $notice)
                                <a href="{{ route('notices.show', $notice->slug) }}" class="group block bg-danger/5 border border-danger/20 rounded-2xl p-6 hover:shadow-lg transition-all">
                                    <div class="flex items-center gap-2 mb-3">
                                        @if ($notice->category)
                                            <x-ui.badge variant="primary">{{ $notice->category->name }}</x-ui.badge>
                                        @endif
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-danger/10 text-danger text-[10px] font-semibold uppercase">Pinned</span>
                                    </div>
                                    <h3 class="font-bold text-slate-dark group-hover:text-academic-blue transition-colors mb-2">{{ $notice->title }}</h3>
                                    <p class="text-sm text-muted line-clamp-2 mb-3">{{ $notice->excerpt ?? strip_tags($notice->content) }}</p>
                                    <p class="text-xs text-muted">{{ $notice->published_at?->format('M d, Y') }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- All notices --}}
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                    @foreach ($notices->filter(fn($n) => !$n->is_pinned) as $notice)
                        <x-cards.notice :$notice />
                    @endforeach
                </div>
                <div class="mt-8">
                    <x-ui.pagination :paginator="$notices" />
                </div>
            @else
                <x-ui.empty-state title="No notices found" description="Check back later for new announcements." />
            @endif
        </div>
    </section>

    <section class="py-12 lg:py-16 bg-academic-blue">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 text-center">
            <h2 class="text-2xl lg:text-3xl font-bold text-white mb-3">Need More Information?</h2>
            <p class="text-white/80 mb-6">Contact our office for any questions about school notices and announcements.</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 h-12 text-sm font-semibold text-academic-blue bg-white rounded-xl hover:bg-white/90 transition-all">Contact Us</a>
        </div>
    </section>
@endsection
