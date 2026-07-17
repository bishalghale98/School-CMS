@extends('layouts.public')

@php
    $crumbs = [['label' => 'Facilities', 'url' => null]];
@endphp

@section('title', 'Facilities')

@section('content')
    <section class="bg-light-gray border-b border-border">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-12 lg:py-24">
            <h1 class="text-3xl lg:text-5xl font-bold text-academic-blue">Facilities</h1>
            <p class="text-lg text-muted mt-2">Explore our campus facilities and resources</p>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            @if ($facilities->count())
                <div class="space-y-12 lg:space-y-20">
                    @foreach ($facilities as $i => $facility)
                        <div class="grid md:grid-cols-2 gap-8 lg:gap-12 items-center">
                            <div class="{{ $i % 2 !== 0 ? 'md:order-2' : '' }}">
                                <div class="aspect-[4/3] rounded-2xl overflow-hidden bg-light-gray">
                                        <div class="w-full h-full flex items-center justify-center">
                                            <svg class="w-16 h-16 text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 21v-2a2 2 0 00-2-2H9a2 2 0 00-2 2v2" />
                                            </svg>
                                        </div>
                                </div>
                            </div>
                            <div class="{{ $i % 2 !== 0 ? 'md:order-1' : '' }}">
                                <x-ui.badge variant="primary">{{ $facility->type?->label() ?? 'Facility' }}</x-ui.badge>
                                <h2 class="text-2xl lg:text-3xl font-bold text-slate-dark mt-3 mb-3">{{ $facility->name }}</h2>
                                <p class="text-muted mb-4">{{ $facility->description }}</p>
                                @if ($facility->features && count($facility->features))
                                    <ul class="space-y-2">
                                        @foreach ($facility->features as $feature)
                                            <li class="flex items-start gap-2 text-sm text-muted">
                                                <svg class="w-4 h-4 text-success mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                {{ $feature }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <x-ui.empty-state title="No facilities listed yet" description="Facility information will be added soon." />
            @endif
        </div>
    </section>
@endsection