@extends('layouts.public')

@section('breadcrumbs')
    <x-layout.breadcrumbs :crumbs="[
        ['label' => 'Gallery', 'url' => route('gallery.index')],
        ['label' => $album->title, 'url' => null],
    ]" />
@endsection

@section('title', $album->title)

@section('meta_description', strip_tags($album->description))

@section('content')
    <section class="py-12 lg:py-16">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl lg:text-5xl font-bold text-slate-dark">{{ $album->title }}</h1>
                    @if ($album->description)
                        <p class="text-muted mt-2">{{ $album->description }}</p>
                    @endif
                </div>
                @if ($album->event_date)
                    <span class="text-sm text-muted">{{ $album->event_date->format('F d, Y') }}</span>
                @endif
            </div>

            @if ($album->type === 'photo')
                <div
                    x-data="photoLightbox()"
                    class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"
                >
                    @foreach ($album->items as $item)
                        <button
                            @click="open('{{ $item->file_path ? Storage::url($item->file_path) : '' }}', '{{ $item->caption ?? $item->title }}')"
                            class="aspect-[4/3] rounded-xl overflow-hidden bg-light-gray group cursor-pointer"
                        >
                            @if ($item->file_path)
                                <img src="{{ Storage::url($item->file_path) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-muted text-sm">
                                    No image
                                </div>
                            @endif
                        </button>
                    @endforeach
                </div>

                <x-ui.modal name="photo-lightbox" maxWidth="2xl">
                    <div class="text-center">
                        <img :src="lightboxImage" :alt="lightboxCaption" class="max-w-full max-h-[70vh] mx-auto rounded-lg">
                        <p class="text-sm text-muted mt-3" x-text="lightboxCaption"></p>
                    </div>
                </x-ui.modal>
            @else
                <div class="grid sm:grid-cols-2 gap-6">
                    @foreach ($album->items as $item)
                        <div class="rounded-2xl overflow-hidden bg-light-gray border border-border">
                            <div class="aspect-[16/9] bg-black relative">
                                @if ($item->video_url)
                                    <iframe src="https://www.youtube.com/embed/{{ $item->video_url }}" title="{{ $item->title }}" class="w-full h-full" frameborder="0" allowfullscreen></iframe>
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-muted">
                                        No video URL
                                    </div>
                                @endif
                            </div>
                            @if ($item->title || $item->caption)
                                <div class="p-4">
                                    <h4 class="font-medium text-slate-dark text-sm">{{ $item->title }}</h4>
                                    @if ($item->caption)
                                        <p class="text-xs text-muted mt-1">{{ $item->caption }}</p>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('photoLightbox', () => ({
            lightboxImage: '',
            lightboxCaption: '',
            open(image, caption) {
                this.lightboxImage = image;
                this.lightboxCaption = caption;
                window.dispatchEvent(new CustomEvent('open-modal-photo-lightbox'));
            }
        }));
    });
</script>
@endpush