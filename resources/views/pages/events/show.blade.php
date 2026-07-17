@extends('layouts.public')

@section('breadcrumbs')
    <x-layout.breadcrumbs :crumbs="[
        ['label' => 'Events', 'url' => route('events.index')],
        ['label' => $event->title, 'url' => null],
    ]" />
@endsection

@section('title', $event->title)

@section('meta_description', strip_tags($event->description))

@section('content')
    <section class="py-12 lg:py-16">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-3xl lg:text-5xl font-bold text-slate-dark mb-8">{{ $event->title }}</h1>

                <div class="grid sm:grid-cols-3 gap-4 mb-8">
                    <div class="p-4 rounded-xl bg-light-gray">
                        <p class="text-xs text-muted mb-1">Date</p>
                        <p class="font-semibold text-slate-dark">{{ $event->event_date->format('l, F d, Y') }}</p>
                    </div>
                    @if ($event->start_time)
                        <div class="p-4 rounded-xl bg-light-gray">
                            <p class="text-xs text-muted mb-1">Time</p>
                            <p class="font-semibold text-slate-dark">
                                {{ $event->start_time->format('g:i A') }}
                                @if ($event->end_time)
                                    – {{ $event->end_time->format('g:i A') }}
                                @endif
                            </p>
                        </div>
                    @endif
                    @if ($event->venue)
                        <div class="p-4 rounded-xl bg-light-gray">
                            <p class="text-xs text-muted mb-1">Venue</p>
                            <p class="font-semibold text-slate-dark">{{ $event->venue }}</p>
                        </div>
                    @endif
                </div>

                <div class="prose prose-lg max-w-none mb-10">
                    {!! $event->description !!}
                </div>
            </div>
        </div>
    </section>
@endsection
