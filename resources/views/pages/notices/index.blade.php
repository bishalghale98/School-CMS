@extends('layouts.public')

@section('breadcrumbs')
    <x-layout.breadcrumbs :crumbs="[['label' => 'Notices', 'url' => null]]" />
@endsection

@section('title', 'Notices')

@section('content')
    <section class="bg-light-gray border-b border-border">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-12 lg:py-24">
            <h1 class="text-3xl lg:text-5xl font-bold text-academic-blue">Notices</h1>
            <p class="text-lg text-muted mt-2">Stay informed with the latest announcements from the school</p>
        </div>
    </section>

    <section class="py-8 bg-white border-b border-border">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <form method="GET" action="{{ route('notices.index') }}" class="flex flex-col md:flex-row gap-4" x-data>
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
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($notices as $notice)
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
@endsection
