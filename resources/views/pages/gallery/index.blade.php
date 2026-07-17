@extends('layouts.public')

@section('breadcrumbs')
    <x-layout.breadcrumbs :crumbs="[['label' => 'Gallery', 'url' => null]]" />
@endsection

@section('title', 'Gallery')
@section('meta_description', 'Photo albums and videos from school activities.')

@section('content')
    <section class="relative bg-gradient-to-br from-slate-dark via-slate-dark to-academic-blue/80 py-20 lg:py-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10"><div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 -translate-y-1/3"></div></div>
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 relative z-10">
            <span class="inline-block px-4 py-1 rounded-full bg-white/10 text-white/80 text-sm font-semibold mb-4">Explore</span>
            <h1 class="text-4xl lg:text-6xl font-bold text-white mb-4">Gallery</h1>
            <p class="text-lg text-white/70 max-w-2xl">Browse through our collection of photos and videos showcasing campus life and activities.</p>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div x-data="{ tab: 'photos' }">
                <div class="flex gap-2 mb-8 p-1 bg-light-gray rounded-xl w-fit">
                    <button @click="tab = 'photos'" :class="tab === 'photos' ? 'bg-white shadow-sm text-slate-dark' : 'text-muted hover:text-slate-dark'" class="px-5 py-2 rounded-lg text-sm font-medium transition-all">Photo Albums</button>
                    <button @click="tab = 'videos'" :class="tab === 'videos' ? 'bg-white shadow-sm text-slate-dark' : 'text-muted hover:text-slate-dark'" class="px-5 py-2 rounded-lg text-sm font-medium transition-all">Video Albums</button>
                </div>

                <div x-show="tab === 'photos'" x-transition>
                    @if ($photoAlbums->count())
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($photoAlbums as $album)
                                <a href="{{ route('gallery.show', $album->slug) }}" class="group rounded-2xl overflow-hidden border border-border bg-white hover:shadow-lg transition-all duration-300">
                                    <div class="aspect-[4/3] bg-light-gray relative overflow-hidden">
                                        @if ($album->items->first() && $album->items->first()->file_path)
                                            <img src="{{ Storage::url($album->items->first()->file_path) }}" alt="{{ $album->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <svg class="w-12 h-12 text-muted/30" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                            </div>
                                        @endif
                                        <div class="absolute top-3 right-3">
                                            <span class="px-2.5 py-1 rounded-full bg-white/90 text-xs font-medium text-slate-dark backdrop-blur-sm">{{ $album->items_count }} photos</span>
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
                                <a href="{{ route('gallery.show', $album->slug) }}" class="group rounded-2xl overflow-hidden border border-border bg-white hover:shadow-lg transition-all duration-300">
                                    <div class="aspect-[16/9] bg-light-gray relative flex items-center justify-center overflow-hidden">
                                        @if ($album->items->first() && $album->items->first()->video_url)
                                            <img src="https://img.youtube.com/vi/{{ $album->items->first()->video_url }}/hqdefault.jpg" alt="{{ $album->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        @else
                                            <svg class="w-12 h-12 text-muted/30" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        @endif
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <div class="w-14 h-14 rounded-full bg-white/90 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                                <svg class="w-6 h-6 text-slate-dark ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                            </div>
                                        </div>
                                        <div class="absolute top-3 right-3">
                                            <span class="px-2.5 py-1 rounded-full bg-white/90 text-xs font-medium text-slate-dark backdrop-blur-sm">{{ $album->items_count }} videos</span>
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

    <section class="py-12 lg:py-16 bg-academic-blue">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 text-center">
            <h2 class="text-2xl lg:text-3xl font-bold text-white mb-3">Want to See More?</h2>
            <p class="text-white/80 mb-6">Visit our campus and experience it firsthand.</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 h-12 text-sm font-semibold text-academic-blue bg-white rounded-xl hover:bg-white/90 transition-all">Schedule a Visit</a>
        </div>
    </section>
@endsection
