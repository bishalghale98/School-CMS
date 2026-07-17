@extends('layouts.public')

@php
    $crumbs = [['label' => 'Facilities', 'url' => null]];
@endphp

@section('title', 'Facilities')
@section('meta_description', 'Explore our campus facilities and resources.')

@section('content')
    <section class="relative bg-gradient-to-br from-slate-dark via-slate-dark to-academic-blue/80 py-20 lg:py-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10"><div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 -translate-y-1/3"></div></div>
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 relative z-10">
            <span class="inline-block px-4 py-1 rounded-full bg-white/10 text-white/80 text-sm font-semibold mb-4">Campus</span>
            <h1 class="text-4xl lg:text-6xl font-bold text-white mb-4">Our Facilities</h1>
            <p class="text-lg text-white/70 max-w-2xl">State-of-the-art facilities designed to support and enhance the learning experience.</p>
        </div>
    </section>

    {{-- Campus Overview --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">Overview</span>
                <h2 class="text-3xl lg:text-5xl font-bold text-slate-dark">World-Class Campus</h2>
                <p class="text-muted mt-3 max-w-2xl mx-auto">Our campus is equipped with modern infrastructure to provide the best possible environment for learning and growth.</p>
            </div>
        </div>
    </section>

    {{-- Individual Facilities --}}
    <section class="pb-16 lg:pb-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            @if ($facilities->count())
                <div class="space-y-16 lg:space-y-24">
                    @foreach ($facilities as $i => $facility)
                        <div class="grid md:grid-cols-2 gap-8 lg:gap-16 items-center">
                            <div class="{{ $i % 2 !== 0 ? 'md:order-2' : '' }}">
                                <div class="aspect-[4/3] rounded-3xl overflow-hidden bg-gradient-to-br from-academic-blue/10 to-academic-blue/5 flex items-center justify-center">
                                    @if ($facility->images && count($facility->images))
                                        <img src="{{ asset('storage/' . $facility->images[0]) }}" alt="{{ $facility->name }}" class="w-full h-full object-cover">
                                    @else
                                        <svg class="w-20 h-20 text-academic-blue/20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 21v-2a2 2 0 00-2-2H9a2 2 0 00-2 2v2" /></svg>
                                    @endif
                                </div>
                            </div>
                            <div class="{{ $i % 2 !== 0 ? 'md:order-1' : '' }}">
                                <x-ui.badge variant="primary">{{ $facility->type?->label() ?? 'Facility' }}</x-ui.badge>
                                <h2 class="text-2xl lg:text-3xl font-bold text-slate-dark mt-3 mb-4">{{ $facility->name }}</h2>
                                <p class="text-muted leading-relaxed mb-6">{{ $facility->description }}</p>
                                @if ($facility->features && count($facility->features))
                                    <ul class="space-y-3">
                                        @foreach ($facility->features as $feature)
                                            <li class="flex items-start gap-3 text-sm text-muted">
                                                <svg class="w-4 h-4 text-success mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
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

    {{-- Health & Safety --}}
    <section class="py-16 lg:py-24 bg-light-gray">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-1 rounded-full bg-success/10 text-success text-sm font-semibold mb-4">Safety</span>
                <h2 class="text-3xl lg:text-5xl font-bold text-slate-dark">Health & Safety</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $safety = [
                        ['title' => '24/7 Security', 'desc' => 'Round-the-clock security personnel and CCTV monitoring.', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                        ['title' => 'Medical Room', 'desc' => 'Fully equipped medical room with trained nurse on duty.', 'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
                        ['title' => 'Fire Safety', 'desc' => 'Fire extinguishers and emergency evacuation plans in place.', 'icon' => 'M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z'],
                    ];
                @endphp
                @foreach ($safety as $item)
                    <div class="bg-white rounded-2xl p-6 border border-border text-center">
                        <div class="w-14 h-14 rounded-2xl bg-success/10 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" /></svg>
                        </div>
                        <h3 class="font-bold text-slate-dark mb-2">{{ $item['title'] }}</h3>
                        <p class="text-sm text-muted leading-relaxed">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-16 bg-academic-blue">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 text-center">
            <h2 class="text-2xl lg:text-3xl font-bold text-white mb-3">See Our Campus in Person</h2>
            <p class="text-white/80 mb-6">Schedule a visit and explore our world-class facilities firsthand.</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 h-12 text-sm font-semibold text-academic-blue bg-white rounded-xl hover:bg-white/90 transition-all">Schedule a Visit</a>
        </div>
    </section>
@endsection
