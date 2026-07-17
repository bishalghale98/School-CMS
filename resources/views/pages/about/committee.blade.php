@extends('layouts.public')

@section('title', 'School Committee')
@section('meta_description', 'Meet our school committee members.')

@section('content')
    <section class="relative bg-gradient-to-br from-slate-dark via-slate-dark to-academic-blue/80 py-20 lg:py-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 -translate-y-1/3"></div>
        </div>
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 relative z-10">
            <x-layout.breadcrumbs :crumbs="[['label' => 'About', 'url' => route('about.index')], ['label' => 'Committee', 'url' => null]]" />
            <h1 class="text-4xl lg:text-6xl font-bold text-white mb-4">School Committee</h1>
            <p class="text-lg text-white/70 max-w-2xl">Meet the dedicated leaders guiding our institution.</p>
        </div>
    </section>

    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            @if ($teachers->count())
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($teachers as $member)
                        <div class="bg-white border border-border rounded-2xl p-6 text-center hover:shadow-md transition-shadow">
                            <div class="w-24 h-24 rounded-full bg-academic-blue/10 mx-auto mb-4 overflow-hidden flex items-center justify-center">
                                @if ($member->photo)
                                    <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-10 h-10 text-academic-blue/40" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                @endif
                            </div>
                            <h3 class="font-bold text-slate-dark">{{ $member->name }}</h3>
                            <p class="text-sm text-academic-blue font-medium">{{ $member->position }}</p>
                            @if ($member->department)
                                <p class="text-xs text-muted mt-1">{{ $member->department }}</p>
                            @endif
                            @if ($member->qualification)
                                <p class="text-xs text-muted mt-1">{{ $member->qualification }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 text-muted/30 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    <p class="text-muted">Committee information will be available soon.</p>
                </div>
            @endif
        </div>
    </section>

    <section class="py-16 lg:py-20 bg-academic-blue">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 text-center">
            <h2 class="text-2xl lg:text-4xl font-bold text-white mb-4">Want to Join Our Team?</h2>
            <p class="text-white/80 mb-8 max-w-lg mx-auto">We're always looking for dedicated educators and leaders.</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 h-13 text-base font-semibold text-academic-blue bg-white rounded-xl hover:bg-white/90 transition-all">
                Contact Us
            </a>
        </div>
    </section>
@endsection
