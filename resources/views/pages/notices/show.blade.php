@extends('layouts.public')

@section('breadcrumbs')
    <x-layout.breadcrumbs :crumbs="[['label' => 'Notices', 'url' => route('notices.index')], ['label' => $notice->title, 'url' => null]]" />
@endsection

@section('title', $notice->title)

@section('meta_description', $notice->meta_description ?? $notice->excerpt)

@section('content')

    <section class="py-12 lg:py-16">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="max-w-3xl mx-auto">
                <div class="flex items-center gap-3 mb-4">
                    @if ($notice->category)
                        <x-ui.badge variant="primary">{{ $notice->category->name }}</x-ui.badge>
                    @endif
                    @if ($notice->is_pinned)
                        <x-ui.badge variant="warning">Pinned</x-ui.badge>
                    @endif
                    <span
                        class="text-sm text-muted">{{ $notice->published_at?->format('F d, Y') ?? $notice->created_at->format('F d, Y') }}</span>
                </div>

                <h1 class="text-3xl lg:text-5xl font-bold text-slate-dark mb-6">{{ $notice->title }}</h1>

                @if ($notice->excerpt)
                    <p class="text-lg text-muted mb-8 leading-relaxed">{{ $notice->excerpt }}</p>
                @endif

                <div class="prose prose-lg max-w-none mb-10">
                    {!! $notice->content !!}
                </div>

                @if (!empty($notice->attachments) && count($notice->attachments))
                    <div class="border-t border-border pt-8 mb-10">
                        <h3 class="font-semibold text-slate-dark mb-4">Attachments</h3>
                        <div class="flex flex-col gap-2">
                            @foreach ($notice->attachments as $attachment)
                                <a href="{{ asset('storage/' . $attachment) }}" target="_blank" rel="noopener"
                                    class="inline-flex items-center gap-3 px-4 py-3 rounded-xl border border-border hover:bg-light-gray transition-colors">
                                    <svg class="w-5 h-5 text-academic-blue shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm text-slate-dark">{{ basename($attachment) }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if ($related && $related->count())
                    <div class="border-t border-border pt-8">
                        <h3 class="font-semibold text-slate-dark mb-4">Related Notices</h3>
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($related as $rel)
                                <a href="{{ route('notices.show', $rel->slug) }}"
                                    class="p-4 rounded-xl border border-border hover:bg-light-gray transition-colors">
                                    <p class="text-sm font-medium text-slate-dark line-clamp-2">{{ $rel->title }}</p>
                                    <p class="text-xs text-muted mt-2">{{ $rel->published_at?->format('M d, Y') }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
