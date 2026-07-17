@extends('layouts.public')

@section('title', school_setting('school_name', config('app.name', 'School CMS')) . ' | Home')
@section('og_type', 'website')

@section('content')
    {{-- ============================================================ --}}
    {{-- SECTION 1: HERO --}}
    {{-- ============================================================ --}}
    @php $slider = $sliders->first(); @endphp
    <section class="relative h-screen min-h-[600px] max-h-[900px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-dark/80 via-slate-dark/60 to-academic-blue/40 z-10"></div>
        <div class="absolute inset-0 bg-light-gray">
            @if ($slider && $slider->hero_image)
                <img src="{{ asset('storage/' . $slider->hero_image) }}" alt="{{ $slider->title }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gradient-to-br from-academic-blue/30 via-academic-blue/10 to-light-gray"></div>
            @endif
        </div>

        <div class="relative z-20 text-center max-w-4xl mx-auto px-5">
            <div class="animate-fade-in-down">
                <span class="inline-block px-4 py-1.5 rounded-full bg-white/10 text-white/80 text-sm font-medium mb-6 backdrop-blur-sm border border-white/10">
                    Welcome to {{ school_setting('school_name', 'Our School') }}
                </span>
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-7xl font-bold text-white leading-[1.1] mb-6 animate-fade-in-up">
                {{ $slider->title ?? 'Shaping Futures, Building Leaders' }}
            </h1>
            <p class="text-lg sm:text-xl text-white/75 mb-10 max-w-2xl mx-auto leading-relaxed animate-fade-in-up delay-200">
                {{ $slider->subtitle ?? school_setting('school_tagline', 'Providing quality education and nurturing future leaders since our establishment.') }}
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in-up delay-400">
                <a href="{{ route('online-admission.index') }}" class="inline-flex items-center gap-2 px-8 h-13 text-base font-semibold text-white bg-academic-blue rounded-xl hover:bg-academic-blue-light transition-all hover:shadow-lg hover:shadow-academic-blue/25">
                    Apply Now
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 h-13 text-base font-semibold text-white border-2 border-white/25 rounded-xl hover:bg-white/10 transition-all backdrop-blur-sm">
                    Contact Us
                </a>
            </div>
        </div>

        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 animate-bounce">
            <svg class="w-6 h-6 text-white/50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" /></svg>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- SECTION 2: WHY CHOOSE US --}}
    {{-- ============================================================ --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="text-center mb-12 lg:mb-16">
                <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">Why Choose Us</span>
                <h2 class="text-3xl lg:text-5xl font-bold text-slate-dark">Why Parents Trust {{ school_setting('school_name', 'Our School') }}</h2>
                <p class="text-muted mt-3 max-w-2xl mx-auto">We provide an environment where every child can thrive academically, socially, and personally.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                <div class="group p-6 lg:p-8 rounded-2xl border border-border hover:border-academic-blue/20 hover:shadow-lg hover:shadow-academic-blue/5 transition-all duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-academic-blue/10 flex items-center justify-center mb-5 group-hover:bg-academic-blue group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7 text-academic-blue group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-dark mb-2">Academic Excellence</h3>
                    <p class="text-sm text-muted leading-relaxed">Rigorous curriculum designed to challenge students and prepare them for higher education and beyond.</p>
                </div>

                <div class="group p-6 lg:p-8 rounded-2xl border border-border hover:border-academic-blue/20 hover:shadow-lg hover:shadow-academic-blue/5 transition-all duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-academic-blue/10 flex items-center justify-center mb-5 group-hover:bg-academic-blue group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7 text-academic-blue group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-dark mb-2">Qualified Teachers</h3>
                    <p class="text-sm text-muted leading-relaxed">Experienced and dedicated educators who inspire curiosity and foster a love for learning.</p>
                </div>

                <div class="group p-6 lg:p-8 rounded-2xl border border-border hover:border-academic-blue/20 hover:shadow-lg hover:shadow-academic-blue/5 transition-all duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-academic-blue/10 flex items-center justify-center mb-5 group-hover:bg-academic-blue group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7 text-academic-blue group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-dark mb-2">Modern Facilities</h3>
                    <p class="text-sm text-muted leading-relaxed">State-of-the-art labs, libraries, and sports facilities that enhance the learning experience.</p>
                </div>

                <div class="group p-6 lg:p-8 rounded-2xl border border-border hover:border-academic-blue/20 hover:shadow-lg hover:shadow-academic-blue/5 transition-all duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-academic-blue/10 flex items-center justify-center mb-5 group-hover:bg-academic-blue group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7 text-academic-blue group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-dark mb-2">Safe Environment</h3>
                    <p class="text-sm text-muted leading-relaxed">24/7 security with CCTV monitoring ensuring a safe and nurturing environment for every child.</p>
                </div>

                <div class="group p-6 lg:p-8 rounded-2xl border border-border hover:border-academic-blue/20 hover:shadow-lg hover:shadow-academic-blue/5 transition-all duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-academic-blue/10 flex items-center justify-center mb-5 group-hover:bg-academic-blue group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7 text-academic-blue group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-dark mb-2">Student Activities</h3>
                    <p class="text-sm text-muted leading-relaxed">Rich extracurricular programs in sports, arts, debate, and cultural activities for holistic development.</p>
                </div>

                <div class="group p-6 lg:p-8 rounded-2xl border border-border hover:border-academic-blue/20 hover:shadow-lg hover:shadow-academic-blue/5 transition-all duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-academic-blue/10 flex items-center justify-center mb-5 group-hover:bg-academic-blue group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7 text-academic-blue group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-dark mb-2">Character Development</h3>
                    <p class="text-sm text-muted leading-relaxed">Building strong values, leadership skills, and civic responsibility in every student.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- SECTION 3: PRINCIPAL'S MESSAGE --}}
    {{-- ============================================================ --}}
    @if ($principalMessage)
    <section class="py-16 lg:py-24 bg-light-gray">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="grid lg:grid-cols-5 gap-10 lg:gap-16 items-center">
                <div class="lg:col-span-2 flex justify-center">
                    @if ($principalMessage->og_image)
                        <div class="relative">
                            <div class="w-64 h-64 lg:w-80 lg:h-80 rounded-3xl overflow-hidden shadow-2xl shadow-academic-blue/10">
                                <img src="{{ asset('storage/' . $principalMessage->og_image) }}" alt="Principal" class="w-full h-full object-cover">
                            </div>
                            <div class="absolute -bottom-4 -right-4 w-24 h-24 rounded-2xl bg-academic-blue/10 -z-10"></div>
                            <div class="absolute -top-4 -left-4 w-16 h-16 rounded-xl bg-academic-blue/5 -z-10"></div>
                        </div>
                    @else
                        <div class="relative">
                            <div class="w-64 h-64 lg:w-80 lg:h-80 rounded-3xl bg-gradient-to-br from-academic-blue/10 to-academic-blue/5 flex items-center justify-center shadow-2xl shadow-academic-blue/10">
                                <svg class="w-20 h-20 text-academic-blue/30" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            </div>
                            <div class="absolute -bottom-4 -right-4 w-24 h-24 rounded-2xl bg-academic-blue/10 -z-10"></div>
                        </div>
                    @endif
                </div>
                <div class="lg:col-span-3">
                    <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">Principal's Message</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-dark mb-6">A Warm Welcome from Our Principal</h2>
                    <div class="text-base text-slate-dark/60 leading-relaxed mb-6 prose max-w-none">
                        {!! $principalMessage->content !!}
                    </div>
                    <a href="{{ route('about.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-academic-blue hover:text-academic-blue-light transition-colors">
                        Read Full Message
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- ============================================================ --}}
    {{-- SECTION 4: ACADEMIC PROGRAMS --}}
    {{-- ============================================================ --}}
    @if ($programs->count())
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between mb-12 lg:mb-16">
                <div>
                    <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">Programs</span>
                    <h2 class="text-3xl lg:text-5xl font-bold text-slate-dark">Academic Programs</h2>
                    <p class="text-muted mt-3 max-w-xl">Comprehensive programs designed to nurture intellectual growth and personal development.</p>
                </div>
                <a href="{{ route('academics') }}" class="mt-4 sm:mt-0 inline-flex items-center gap-2 text-sm font-semibold text-academic-blue hover:text-academic-blue-light transition-colors shrink-0">
                    View All Programs
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($programs as $program)
                    <div class="group bg-white border border-border rounded-2xl p-6 lg:p-8 hover:shadow-lg hover:shadow-academic-blue/5 hover:border-academic-blue/20 transition-all duration-300">
                        <div class="w-12 h-12 rounded-xl bg-academic-blue/10 flex items-center justify-center mb-4 group-hover:bg-academic-blue transition-all duration-300">
                            <svg class="w-6 h-6 text-academic-blue group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                        </div>
                        <div class="flex items-center gap-2 mb-2">
                            <h3 class="font-bold text-lg text-slate-dark">{{ $program->name }}</h3>
                        </div>
                        <p class="text-sm text-muted leading-relaxed mb-4 line-clamp-2">{{ $program->description ? strip_tags($program->description) : '' }}</p>
                        <div class="flex flex-wrap gap-3 text-xs text-muted">
                            @if ($program->level)<span class="px-2.5 py-1 bg-light-gray rounded-full">{{ $program->level }}</span>@endif
                            @if ($program->duration)<span class="px-2.5 py-1 bg-light-gray rounded-full">{{ $program->duration }}</span>@endif
                            @if ($program->medium)<span class="px-2.5 py-1 bg-light-gray rounded-full">{{ $program->medium }}</span>@endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ============================================================ --}}
    {{-- SECTION 5: NEWS & EVENTS (Split Layout) --}}
    {{-- ============================================================ --}}
    <section class="py-16 lg:py-24 bg-light-gray">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16">
                {{-- Latest News --}}
                <div>
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-3">News</span>
                            <h2 class="text-2xl lg:text-3xl font-bold text-slate-dark">Latest News</h2>
                        </div>
                        <a href="{{ route('news.index') }}" class="text-sm font-semibold text-academic-blue hover:text-academic-blue-light transition-colors shrink-0">View All &rarr;</a>
                    </div>

                    @if ($news->count())
                        <div class="space-y-4">
                            @foreach ($news->take(3) as $item)
                                <a href="{{ route('news.show', $item->slug) }}" class="group flex gap-4 bg-white rounded-2xl p-4 border border-border hover:shadow-md transition-all">
                                    <div class="w-20 h-20 rounded-xl bg-light-gray shrink-0 overflow-hidden">
                                        @if ($item->featured_image)
                                            <img src="{{ asset('storage/' . $item->featured_image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <svg class="w-6 h-6 text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" /></svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        @if ($item->category)
                                            <x-ui.badge variant="primary">{{ $item->category->name }}</x-ui.badge>
                                        @endif
                                        <h3 class="font-semibold text-slate-dark mt-1 group-hover:text-academic-blue transition-colors line-clamp-2">{{ $item->title }}</h3>
                                        <p class="text-xs text-muted mt-1">{{ $item->published_at?->format('M d, Y') }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <x-ui.empty-state title="No news yet" description="Check back later for updates." />
                    @endif
                </div>

                {{-- Upcoming Events --}}
                <div>
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <span class="inline-block px-4 py-1 rounded-full bg-gold/10 text-gold text-sm font-semibold mb-3">Events</span>
                            <h2 class="text-2xl lg:text-3xl font-bold text-slate-dark">Upcoming Events</h2>
                        </div>
                        <a href="{{ route('events.index') }}" class="text-sm font-semibold text-academic-blue hover:text-academic-blue-light transition-colors shrink-0">View All &rarr;</a>
                    </div>

                    @if ($events->count())
                        <div class="space-y-4">
                            @foreach ($events as $event)
                                <a href="{{ route('events.show', $event->slug) }}" class="group flex gap-4 bg-white rounded-2xl p-4 border border-border hover:shadow-md transition-all">
                                    <div class="w-16 h-16 rounded-xl bg-academic-blue/10 flex flex-col items-center justify-center shrink-0 text-center">
                                        <span class="text-xl font-bold text-academic-blue leading-tight">{{ $event->event_date->format('d') }}</span>
                                        <span class="text-[10px] font-semibold text-academic-blue/70 uppercase">{{ $event->event_date->format('M') }}</span>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h3 class="font-semibold text-slate-dark group-hover:text-academic-blue transition-colors line-clamp-1">{{ $event->title }}</h3>
                                        @if ($event->venue)
                                            <p class="text-xs text-muted mt-0.5 flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                                {{ $event->venue }}
                                            </p>
                                        @endif
                                        @if ($event->start_time)
                                            <p class="text-xs text-muted mt-0.5">{{ $event->start_time }}{{ $event->end_time ? ' - ' . $event->end_time : '' }}</p>
                                        @endif
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-white rounded-2xl p-8 border border-border text-center">
                            <svg class="w-12 h-12 text-muted/40 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            <p class="text-sm text-muted">No upcoming events at this time.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- SECTION 6: ANNOUNCEMENTS / NOTICES --}}
    {{-- ============================================================ --}}
    @if ($notices->count())
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between mb-12">
                <div>
                    <span class="inline-block px-4 py-1 rounded-full bg-danger/5 text-danger text-sm font-semibold mb-3">Important</span>
                    <h2 class="text-3xl lg:text-5xl font-bold text-slate-dark">Announcements</h2>
                    <p class="text-muted mt-3">Stay informed with the latest official notices from the school administration.</p>
                </div>
                <a href="{{ route('notices.index') }}" class="mt-4 sm:mt-0 inline-flex items-center gap-2 text-sm font-semibold text-academic-blue hover:text-academic-blue-light transition-colors shrink-0">
                    View All Notices
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($notices->take(6) as $notice)
                    <a href="{{ route('notices.show', $notice->slug) }}" class="group block bg-white border rounded-2xl p-6 hover:shadow-lg transition-all duration-300 {{ $notice->is_pinned ? 'border-danger/20 bg-danger/5' : 'border-border hover:border-academic-blue/20' }}">
                        <div class="flex items-center gap-2 mb-3">
                            @if ($notice->category)
                                <x-ui.badge variant="primary">{{ $notice->category->name }}</x-ui.badge>
                            @endif
                            @if ($notice->is_pinned)
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-danger/10 text-danger text-[10px] font-semibold uppercase tracking-wider">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6z" /></svg>
                                    Pinned
                                </span>
                            @endif
                        </div>
                        <h3 class="font-bold text-slate-dark group-hover:text-academic-blue transition-colors mb-2 line-clamp-2">{{ $notice->title }}</h3>
                        <p class="text-sm text-muted line-clamp-2 mb-3">{{ $notice->excerpt ?? strip_tags($notice->content) }}</p>
                        <div class="flex items-center gap-2 text-xs text-muted">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            {{ $notice->published_at?->format('M d, Y') ?? $notice->created_at->format('M d, Y') }}
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ============================================================ --}}
    {{-- SECTION 7: CAMPUS LIFE (Gallery Preview) --}}
    {{-- ============================================================ --}}
    @if ($galleryAlbums->count())
    <section class="py-16 lg:py-24 bg-light-gray overflow-hidden">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="text-center mb-12 lg:mb-16">
                <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">Campus Life</span>
                <h2 class="text-3xl lg:text-5xl font-bold text-slate-dark">Life at {{ school_setting('school_name', 'Our School') }}</h2>
                <p class="text-muted mt-3 max-w-2xl mx-auto">A glimpse into the vibrant campus life, activities, and memorable moments.</p>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
                @foreach ($galleryAlbums as $i => $album)
                    <a href="{{ route('gallery.show', $album->slug) }}" class="group relative rounded-2xl overflow-hidden {{ $i === 0 ? 'row-span-2 aspect-[3/4]' : 'aspect-square' }}">
                        @if ($album->items->first() && $album->items->first()->file_path)
                            <img src="{{ Storage::url($album->items->first()->file_path) }}" alt="{{ $album->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-academic-blue/20 to-academic-blue/5 flex items-center justify-center">
                                <svg class="w-10 h-10 text-muted/40" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-dark/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-4 lg:p-5">
                            <h3 class="font-bold text-white text-sm lg:text-base">{{ $album->title }}</h3>
                            <p class="text-xs text-white/60 mt-0.5">{{ $album->items_count }} {{ Str::plural('photo', $album->items_count) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('gallery.index') }}" class="inline-flex items-center gap-2 px-8 h-12 text-sm font-semibold text-white bg-academic-blue rounded-xl hover:bg-academic-blue-light transition-all hover:shadow-lg hover:shadow-academic-blue/25">
                    Explore Full Gallery
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
            </div>
        </div>
    </section>
    @endif

    {{-- ============================================================ --}}
    {{-- SECTION 8: ACHIEVEMENTS & STATISTICS --}}
    {{-- ============================================================ --}}
    <section class="py-16 lg:py-24 bg-gradient-to-br from-slate-dark via-slate-dark to-academic-blue/90 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white/5 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white/5 rounded-full translate-x-1/2 translate-y-1/2"></div>
        </div>

        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 relative z-10">
            <div class="text-center mb-12 lg:mb-16">
                <span class="inline-block px-4 py-1 rounded-full bg-white/10 text-white/80 text-sm font-semibold mb-4">Our Impact</span>
                <h2 class="text-3xl lg:text-5xl font-bold">Achievements & Statistics</h2>
                <p class="text-white/60 mt-3 max-w-xl mx-auto">Numbers that reflect our commitment to educational excellence.</p>
            </div>

            <div x-data="counterAnimation()" x-init="startCounters()" class="grid grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                <div class="text-center p-6 lg:p-8 rounded-2xl bg-white/5 backdrop-blur-sm border border-white/10">
                    <div class="text-4xl lg:text-5xl font-bold mb-2" x-text="counters.years + '+'">0+</div>
                    <p class="text-sm text-white/60">Years of Excellence</p>
                </div>
                <div class="text-center p-6 lg:p-8 rounded-2xl bg-white/5 backdrop-blur-sm border border-white/10">
                    <div class="text-4xl lg:text-5xl font-bold mb-2" x-text="counters.students + '+'">0+</div>
                    <p class="text-sm text-white/60">Students Enrolled</p>
                </div>
                <div class="text-center p-6 lg:p-8 rounded-2xl bg-white/5 backdrop-blur-sm border border-white/10">
                    <div class="text-4xl lg:text-5xl font-bold mb-2" x-text="counters.teachers + '+'">0+</div>
                    <p class="text-sm text-white/60">Qualified Teachers</p>
                </div>
                <div class="text-center p-6 lg:p-8 rounded-2xl bg-white/5 backdrop-blur-sm border border-white/10">
                    <div class="text-4xl lg:text-5xl font-bold mb-2" x-text="counters.passRate + '%'">0%</div>
                    <p class="text-sm text-white/60">Pass Rate</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- SECTION 9: TESTIMONIALS --}}
    {{-- ============================================================ --}}
    @if ($testimonials->isNotEmpty())
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="text-center mb-12 lg:mb-16">
                <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">Testimonials</span>
                <h2 class="text-3xl lg:text-5xl font-bold text-slate-dark">What People Say</h2>
                <p class="text-muted mt-3 max-w-xl mx-auto">Hear from our community of parents, students, and alumni.</p>
            </div>

            <div x-data="{ active: 0 }" class="relative">
                <div class="hidden lg:grid lg:grid-cols-3 gap-6">
                    @foreach ($testimonials as $testimonial)
                        <div class="bg-light-gray rounded-2xl p-8 border border-border hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-1 mb-4">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 text-gold" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                                @endfor
                            </div>
                            <p class="text-sm text-slate-dark/70 leading-relaxed mb-6">"{{ $testimonial->content }}"</p>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-academic-blue/10 flex items-center justify-center text-academic-blue font-semibold text-sm">
                                    {{ substr($testimonial->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-sm text-slate-dark">{{ $testimonial->name }}</p>
                                    <p class="text-xs text-muted">{{ $testimonial->role }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Mobile carousel --}}
                <div class="lg:hidden overflow-x-auto snap-x snap-mandatory flex gap-4 pb-4 -mx-5 px-5">
                    @foreach ($testimonials as $i => $testimonial)
                        <div class="snap-center shrink-0 w-[85vw] max-w-sm bg-light-gray rounded-2xl p-6 border border-border">
                            <div class="flex items-center gap-1 mb-3">
                                @for ($j = 0; $j < 5; $j++)
                                    <svg class="w-3.5 h-3.5 text-gold" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                                @endfor
                            </div>
                            <p class="text-sm text-slate-dark/70 leading-relaxed mb-4">"{{ $testimonial->content }}"</p>
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-academic-blue/10 flex items-center justify-center text-academic-blue font-semibold text-xs">
                                    {{ substr($testimonial->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-sm text-slate-dark">{{ $testimonial->name }}</p>
                                    <p class="text-xs text-muted">{{ $testimonial->role }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- ============================================================ --}}
    {{-- SECTION 10: ADMISSION CTA --}}
    {{-- ============================================================ --}}
    <section class="py-16 lg:py-24 bg-light-gray">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="relative bg-gradient-to-br from-academic-blue to-academic-blue-light rounded-3xl overflow-hidden p-10 lg:p-16 text-center">
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full translate-x-1/3 -translate-y-1/3"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white rounded-full -translate-x-1/4 translate-y-1/4"></div>
                </div>
                <div class="relative z-10">
                    <h2 class="text-3xl lg:text-5xl font-bold text-white mb-4">Begin Your Child's Journey</h2>
                    <p class="text-white/80 max-w-2xl mx-auto mb-8 text-lg">Admissions are now open for the upcoming academic session. Give your child the gift of quality education.</p>
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ route('online-admission.index') }}" class="inline-flex items-center gap-2 px-8 h-13 text-base font-semibold text-academic-blue bg-white rounded-xl hover:bg-white/90 transition-all hover:shadow-lg">
                            Apply Now
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                        </a>
                        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 h-13 text-base font-semibold text-white border-2 border-white/30 rounded-xl hover:bg-white/10 transition-all">
                            Have Questions?
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- SECTION 11: CONTACT --}}
    {{-- ============================================================ --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16">
                <div>
                    <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">Get in Touch</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-dark mb-6">We'd Love to Hear From You</h2>
                    <p class="text-muted mb-8">Have questions about admissions, academics, or anything else? Our team is here to help.</p>

                    <div class="space-y-5">
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-xl bg-academic-blue/10 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-sm text-slate-dark">Address</h4>
                                <p class="text-sm text-muted">{{ school_setting('school_address', '123 School Street, City, State') }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-xl bg-academic-blue/10 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-sm text-slate-dark">Phone</h4>
                                <p class="text-sm text-muted">{{ school_setting('school_phone', '+1 (555) 123-4567') }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-xl bg-academic-blue/10 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-sm text-slate-dark">Email</h4>
                                <p class="text-sm text-muted">{{ school_setting('school_email', 'info@schoolcms.test') }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-xl bg-academic-blue/10 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-sm text-slate-dark">Office Hours</h4>
                                <p class="text-sm text-muted">Mon - Sat: 8:00 AM - 4:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="bg-light-gray rounded-2xl p-6 lg:p-8 border border-border">
                        <h3 class="text-lg font-bold text-slate-dark mb-4">Quick Contact</h3>
                        <div x-data="quickContact()">
                            <form @submit.prevent="submit" class="space-y-4">
                                <div>
                                    <input type="text" x-model="form.name" placeholder="Your Name *" class="w-full h-11 px-4 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow">
                                </div>
                                <div>
                                    <input type="email" x-model="form.email" placeholder="Email Address *" class="w-full h-11 px-4 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow">
                                </div>
                                <div>
                                    <textarea x-model="form.message" rows="4" placeholder="Your Message *" class="w-full px-4 py-3 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow resize-none"></textarea>
                                </div>
                                <button type="submit" :disabled="submitting" class="w-full h-11 rounded-xl bg-academic-blue text-white text-sm font-medium hover:bg-academic-blue-light transition-colors disabled:opacity-50" x-text="submitting ? 'Sending...' : 'Send Message'"></button>
                            </form>
                            <div x-show="success" x-transition class="mt-4 p-3 rounded-xl bg-success/10 text-success text-sm text-center">
                                Thank you! We'll get back to you soon.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('counterAnimation', () => ({
            counters: { years: 0, students: 0, teachers: 0, passRate: 0 },
            targets: {
                years: parseInt('{{ school_setting("stat_years", "25") }}') || 25,
                students: parseInt('{{ school_setting("stat_students", "500") }}') || 500,
                teachers: parseInt('{{ school_setting("stat_teachers", "50") }}') || 50,
                passRate: parseInt('{{ school_setting("stat_pass_rate", "100") }}') || 100,
            },
            started: false,
            startCounters() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && !this.started) {
                            this.started = true;
                            this.animateCounter('years', this.targets.years, 2000);
                            this.animateCounter('students', this.targets.students, 2000);
                            this.animateCounter('teachers', this.targets.teachers, 2000);
                            this.animateCounter('passRate', this.targets.passRate, 2000);
                        }
                    });
                }, { threshold: 0.3 });

                this.$nextTick(() => {
                    observer.observe(this.$el);
                });
            },
            animateCounter(key, target, duration) {
                const start = performance.now();
                const step = (timestamp) => {
                    const progress = Math.min((timestamp - start) / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    this.counters[key] = Math.round(eased * target);
                    if (progress < 1) requestAnimationFrame(step);
                };
                requestAnimationFrame(step);
            }
        }));

        Alpine.data('quickContact', () => ({
            form: { name: '', email: '', message: '' },
            errors: {},
            submitting: false,
            success: false,
            async submit() {
                this.submitting = true;
                this.errors = {};
                this.success = false;
                try {
                    const response = await fetch('{{ route('contact.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify(this.form),
                    });
                    if (response.ok) {
                        this.success = true;
                        this.form = { name: '', email: '', message: '' };
                    } else {
                        const data = await response.json();
                        this.errors = data.errors || {};
                    }
                } catch (e) {
                    this.errors = { _: ['An unexpected error occurred.'] };
                } finally {
                    this.submitting = false;
                }
            },
        }));
    });
</script>
@endpush
