@extends('layouts.public')

@php
    $crumbs = [['label' => 'Search', 'url' => null]];
@endphp

@section('title', 'Search')

@section('content')
    <section class="bg-light-gray border-b border-border">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-12 lg:py-24">
            <h1 class="text-3xl lg:text-5xl font-bold text-academic-blue">Search</h1>
            <p class="text-lg text-muted mt-2">Search across all content on our website</p>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <form method="GET" action="{{ route('search') }}" class="mb-8">
                <div class="flex gap-3 max-w-xl">
                    <input type="text" name="q" value="{{ $query }}" placeholder="Type to search..."
                        class="flex-1 h-12 px-4 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow">
                    <button type="submit" class="h-12 px-6 rounded-xl bg-academic-blue text-white text-sm font-medium hover:bg-academic-blue/90 transition-colors">Search</button>
                </div>
            </form>

            @if ($query && strlen($query) >= 2)
                <p class="text-sm text-muted mb-6">{{ $results->count() }} result{{ $results->count() !== 1 ? 's' : '' }} found for "<strong>{{ $query }}</strong>"</p>
            @endif

            @if ($results->count())
                <div class="space-y-4">
                    @foreach ($results as $result)
                        <a href="{{ $result['url'] }}" class="block p-5 rounded-xl border border-border hover:bg-light-gray transition-colors">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="inline-block px-2 py-0.5 text-xs font-medium bg-academic-blue/10 text-academic-blue rounded-full">{{ $result['type'] }}</span>
                                @if ($result['date'])
                                    <span class="text-xs text-muted">{{ $result['date']->format('M d, Y') }}</span>
                                @endif
                            </div>
                            <h3 class="font-semibold text-slate-dark">{{ $result['title'] }}</h3>
                        </a>
                    @endforeach
                </div>
            @elseif ($query && strlen($query) >= 2)
                <x-ui.empty-state title="No results found" description="Try searching with different keywords." />
            @endif
        </div>
    </section>
@endsection
