@extends('layouts.public')

@php
    $crumbs = [['label' => 'Downloads', 'url' => null]];
@endphp

@section('title', 'Downloads')

@section('content')
    <section class="bg-light-gray border-b border-border">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-12 lg:py-24">
            <h1 class="text-3xl lg:text-5xl font-bold text-academic-blue">Downloads</h1>
            <p class="text-lg text-muted mt-2">Download admission forms, prospectus, and other documents</p>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="flex flex-wrap gap-2 mb-8">
                <a href="{{ route('downloads') }}" class="px-4 py-1.5 rounded-full text-sm font-medium transition-colors {{ !request('category') ? 'bg-academic-blue text-white' : 'bg-light-gray text-muted hover:bg-gray-200' }}">All</a>
                @foreach ($categories as $cat)
                    <a href="{{ route('downloads', ['category' => $cat->value]) }}" class="px-4 py-1.5 rounded-full text-sm font-medium transition-colors {{ request('category') === $cat->value ? 'bg-academic-blue text-white' : 'bg-light-gray text-muted hover:bg-gray-200' }}">{{ $cat->label() }}</a>
                @endforeach
            </div>

            @if ($downloads->count())
                <div class="bg-white border border-border rounded-2xl overflow-hidden">
                    <div class="hidden md:grid grid-cols-12 gap-4 px-6 py-4 bg-light-gray border-b border-border text-xs font-semibold text-muted uppercase tracking-wider">
                        <div class="col-span-5">Title</div>
                        <div class="col-span-2">Category</div>
                        <div class="col-span-2">Size</div>
                        <div class="col-span-1">Downloads</div>
                        <div class="col-span-2"></div>
                    </div>
                    <div class="divide-y divide-border">
                        @foreach ($downloads as $download)
                            <div class="grid md:grid-cols-12 gap-4 px-6 py-4 items-center hover:bg-light-gray/50 transition-colors">
                                <div class="md:col-span-5">
                                    <p class="font-medium text-slate-dark text-sm">{{ $download->title }}</p>
                                    @if ($download->description)
                                        <p class="text-xs text-muted line-clamp-1">{{ $download->description }}</p>
                                    @endif
                                </div>
                                <div class="md:col-span-2">
                                    <span class="md:hidden text-xs text-muted mr-1">Category:</span>
                                    <x-ui.badge variant="primary">{{ $download->category?->label() ?? 'Other' }}</x-ui.badge>
                                </div>
                                <div class="md:col-span-2 text-sm text-muted">
                                    <span class="md:hidden text-xs text-muted mr-1">Size:</span>
                                    {{ $download->file_size ? number_format($download->file_size / 1024, 1) . ' KB' : '—' }}
                                </div>
                                <div class="md:col-span-1 text-sm text-muted">
                                    <span class="md:hidden text-xs text-muted mr-1">Downloads:</span>
                                    {{ $download->download_count ?? 0 }}
                                </div>
                                <div class="md:col-span-2 text-right">
                                    <a href="{{ route('downloads.file', $download) }}" class="inline-flex items-center gap-1.5 px-4 h-9 rounded-lg bg-academic-blue text-white text-sm font-medium hover:bg-academic-blue/90 transition-colors">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Download
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <x-ui.empty-state title="No downloads available" description="Documents will be available for download once added." />
            @endif
        </div>
    </section>
@endsection