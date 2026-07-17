@extends('layouts.public')

@section('title', 'School History')
@section('meta_description', 'Learn about the history of our school.')

@section('content')
    <section class="relative bg-gradient-to-br from-slate-dark via-slate-dark to-academic-blue/80 py-20 lg:py-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 -translate-y-1/3"></div>
        </div>
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 relative z-10">
            <x-layout.breadcrumbs :crumbs="[['label' => 'About', 'url' => route('about.index')], ['label' => 'History', 'url' => null]]" />
            <h1 class="text-4xl lg:text-6xl font-bold text-white mb-4">School History</h1>
            <p class="text-lg text-white/70 max-w-2xl">Our journey through the years, marked by milestones of growth and achievement.</p>
        </div>
    </section>

    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            @if ($page && $page->content)
                <div class="prose max-w-4xl text-muted leading-relaxed">
                    {!! $page->content !!}
                </div>
            @else
                <div class="max-w-4xl">
                    <p class="text-lg text-muted leading-relaxed mb-6">Our school was established with a vision to provide quality education that nurtures the whole child. From humble beginnings, we have grown into a comprehensive educational institution serving hundreds of students.</p>
                    <p class="text-lg text-muted leading-relaxed mb-6">Over the decades, we have continuously evolved our teaching methods, expanded our facilities, and strengthened our commitment to academic excellence. Each year brings new achievements and milestones that we celebrate as a community.</p>
                    <p class="text-lg text-muted leading-relaxed">The detailed history of our school can be managed through the admin panel. Navigate to Admin &rarr; Content &rarr; Pages to edit this content.</p>
                </div>
            @endif
        </div>
    </section>

    <section class="py-16 lg:py-20 bg-academic-blue">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 text-center">
            <h2 class="text-2xl lg:text-4xl font-bold text-white mb-4">Be Part of Our Story</h2>
            <p class="text-white/80 mb-8 max-w-lg mx-auto">Join us and write the next chapter in our legacy of excellence.</p>
            <a href="{{ route('online-admission.index') }}" class="inline-flex items-center gap-2 px-8 h-13 text-base font-semibold text-academic-blue bg-white rounded-xl hover:bg-white/90 transition-all">
                Apply Now
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
            </a>
        </div>
    </section>
@endsection
