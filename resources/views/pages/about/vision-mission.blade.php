@extends('layouts.public')

@section('title', 'Vision & Mission')
@section('meta_description', 'Our vision and mission statements.')

@section('content')
    <section class="relative bg-gradient-to-br from-slate-dark via-slate-dark to-academic-blue/80 py-20 lg:py-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 -translate-y-1/3"></div>
        </div>
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 relative z-10">
            <x-layout.breadcrumbs :crumbs="[['label' => 'About', 'url' => route('about.index')], ['label' => 'Vision & Mission', 'url' => null]]" />
            <h1 class="text-4xl lg:text-6xl font-bold text-white mb-4">Vision & Mission</h1>
            <p class="text-lg text-white/70 max-w-2xl">The guiding principles that shape everything we do.</p>
        </div>
    </section>

    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="grid md:grid-cols-2 gap-8 lg:gap-12">
                <div class="bg-light-gray rounded-3xl p-8 lg:p-10 border border-border">
                    <div class="w-14 h-14 rounded-2xl bg-academic-blue/10 flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                    </div>
                    <h2 class="text-2xl lg:text-3xl font-bold text-academic-blue mb-4">Our Vision</h2>
                    <p class="text-muted leading-relaxed text-lg">{{ school_setting('vision', 'To be a leading educational institution that empowers students with knowledge, skills, and values to become responsible global citizens and future leaders.') }}</p>
                </div>
                <div class="bg-light-gray rounded-3xl p-8 lg:p-10 border border-border">
                    <div class="w-14 h-14 rounded-2xl bg-gold/10 flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    </div>
                    <h2 class="text-2xl lg:text-3xl font-bold text-academic-blue mb-4">Our Mission</h2>
                    <p class="text-muted leading-relaxed text-lg">{{ school_setting('mission', 'To provide a nurturing and stimulating learning environment that promotes academic excellence, critical thinking, creativity, and character development in every student.') }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 lg:py-20 bg-academic-blue">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 text-center">
            <h2 class="text-2xl lg:text-4xl font-bold text-white mb-4">Live Our Values Every Day</h2>
            <p class="text-white/80 mb-8 max-w-lg mx-auto">Experience an education built on purpose and principles.</p>
            <a href="{{ route('online-admission.index') }}" class="inline-flex items-center gap-2 px-8 h-13 text-base font-semibold text-academic-blue bg-white rounded-xl hover:bg-white/90 transition-all">
                Apply Now
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
            </a>
        </div>
    </section>
@endsection
