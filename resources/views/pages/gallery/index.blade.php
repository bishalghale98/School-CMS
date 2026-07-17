@extends('layouts.public')

@section('breadcrumbs')
    <x-layout.breadcrumbs :crumbs="[['label' => 'Gallery', 'url' => null]]" />
@endsection

@section('title', 'Gallery')

@section('content')
    <section class="bg-light-gray border-b border-border">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-12 lg:py-24">
            <h1 class="text-3xl lg:text-5xl font-bold text-academic-blue">Gallery</h1>
            <p class="text-lg text-muted mt-2">Photo albums and videos from school activities</p>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div x-data="{ tab: 'photos' }">
                <div class="flex gap-2 mb-8 p-1 bg-light-gray rounded-xl w-fit">
                    <button @click="tab = 'photos'" :class="tab === 'photos' ? 'bg-white shadow-sm text-slate-dark' : 'text-muted hover:text-slate-dark'" class="px-5 py-2 rounded-lg text-sm font-medium transition-all">
                        Photos
                    </button>
                    <button @click="tab = 'videos'" :class="tab === 'videos' ? 'bg-white shadow-sm text-slate-dark' : 'text-muted hover:text-slate-dark'" class="px-5 py-2 rounded-lg text-sm font-medium transition-all">
                        Videos
                    </button>
                </div>

                <div x-show="tab === 'photos'" x-transition>
                    @if ($photoAlbums->count())
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($photoAlbums as $album)
                                <a href="{{ route('gallery.show', $album->slug) }}" class="group rounded-2xl overflow-hidden border border-border bg-white hover:shadow-md transition-shadow">
                                    <div class="aspect-[4/3] bg-light-gray relative">
                                        @if ($album->items->first() && $album->items->first()->file_path)
                                            <img src="{{ Storage::url($album->items->first()->file_path) }}" alt="{{ $album->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <svg class="w-12 h-12 text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                        <div class="absolute top-3 right-3">
                                            <span class="px-2.5 py-1 rounded-full bg-white/90 text-xs font-medium text-slate-dark">{{ $album->items_count }} photos</span>
                                        </div>
                                    </div>
                                    <div class="p-5">
                                        <h3 class="font-semibold text-slate-dark group-hover:text-academic-blue transition-colors">{{ $album->title }}</h3>
                                        @if ($album->event_date)
                                            <p class="text-xs text-muted mt-1">{{ $album->event_date->format('M d, Y') }}</p>
                                        @endif
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <x-ui.empty-state title="No photo albums yet" description="Photo albums will appear here once added." />
                    @endif
                </div>

                <div x-show="tab === 'videos'" x-transition x-cloak>
                    @if ($videoAlbums->count())
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($videoAlbums as $album)
                                <a href="{{ route('gallery.show', $album->slug) }}" class="group rounded-2xl overflow-hidden border border-border bg-white hover:shadow-md transition-shadow">
                                    <div class="aspect-[16/9] bg-light-gray relative flex items-center justify-center">
                                        @if ($album->items->first() && $album->items->first()->video_url)
                                            <img src="https://img.youtube.com/vi/{{ $album->items->first()->video_url }}/hqdefault.jpg" alt="{{ $album->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        @else
                                            <svg class="w-12 h-12 text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        @endif
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <div class="w-14 h-14 rounded-full bg-white/90 flex items-center justify-center shadow-lg">
                                                <svg class="w-6 h-6 text-slate-dark ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                            </div>
                                        </div>
                                        <div class="absolute top-3 right-3">
                                            <span class="px-2.5 py-1 rounded-full bg-white/90 text-xs font-medium text-slate-dark">{{ $album->items_count }} videos</span>
                                        </div>
                                    </div>
                                    <div class="p-5">
                                        <h3 class="font-semibold text-slate-dark group-hover:text-academic-blue transition-colors">{{ $album->title }}</h3>
                                        @if ($album->event_date)
                                            <p class="text-xs text-muted mt-1">{{ $album->event_date->format('M d, Y') }}</p>
                                        @endif
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <x-ui.empty-state title="No video albums yet" description="Video albums will appear here once added." />
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
