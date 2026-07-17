@extends('layouts.public')

@php
    $crumbs = [['label' => 'About', 'url' => null]];
@endphp

@section('title', 'About Our School')
@section('meta_description', 'Learn about our school\'s history, vision, mission, and leadership.')

@section('content')
    {{-- HERO --}}
    <section class="relative bg-gradient-to-br from-slate-dark via-slate-dark to-academic-blue/80 py-20 lg:py-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 -translate-y-1/3"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-white rounded-full -translate-x-1/4 translate-y-1/4"></div>
        </div>
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 relative z-10">
            <span class="inline-block px-4 py-1 rounded-full bg-white/10 text-white/80 text-sm font-semibold mb-4">About Us</span>
            <h1 class="text-4xl lg:text-6xl font-bold text-white leading-tight mb-4">Discover Our Story</h1>
            <p class="text-lg text-white/70 max-w-2xl">A legacy of excellence in education, dedicated to shaping the leaders of tomorrow.</p>
        </div>
    </section>

    {{-- SCHOOL HISTORY --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <div>
                    <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">Our Journey</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-dark mb-6">A Legacy of Educational Excellence</h2>
                    <div class="text-muted leading-relaxed space-y-4">
                        @if ($historyPage)
                            {!! $historyPage->content !!}
                        @else
                            <p>Founded with a vision to provide quality education, our school has grown from a small institution to one of the most respected educational establishments in the region.</p>
                            <p>Over the years, we have maintained our commitment to academic excellence while adapting to the evolving needs of modern education. Our state-of-the-art facilities and experienced faculty ensure that every student receives the best possible education.</p>
                        @endif
                    </div>
                    <a href="{{ route('about.history') }}" class="inline-flex items-center gap-2 mt-6 text-sm font-semibold text-academic-blue hover:text-academic-blue-light transition-colors">
                        Read Full History
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </a>
                </div>
                <div class="relative">
                    <div class="aspect-[4/3] rounded-3xl bg-gradient-to-br from-academic-blue/10 to-academic-blue/5 flex items-center justify-center overflow-hidden">
                        <svg class="w-24 h-24 text-academic-blue/20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 21v-2a2 2 0 00-2-2H9a2 2 0 00-2 2v2" /></svg>
                    </div>
                    <div class="absolute -bottom-6 -right-6 w-32 h-32 rounded-2xl bg-academic-blue/10 -z-10"></div>
                    <div class="absolute -top-6 -left-6 w-24 h-24 rounded-xl bg-gold/10 -z-10"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- VISION & MISSION --}}
    <section class="py-16 lg:py-24 bg-light-gray">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">Our Purpose</span>
                <h2 class="text-3xl lg:text-5xl font-bold text-slate-dark">Vision & Mission</h2>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white rounded-3xl p-8 lg:p-10 border border-border hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 rounded-2xl bg-academic-blue/10 flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-dark mb-4">Our Vision</h3>
                    <p class="text-muted leading-relaxed">{{ school_setting('vision', 'To be a leading educational institution that empowers students with knowledge, skills, and values to become responsible global citizens and future leaders.') }}</p>
                </div>
                <div class="bg-white rounded-3xl p-8 lg:p-10 border border-border hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 rounded-2xl bg-gold/10 flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-dark mb-4">Our Mission</h3>
                    <p class="text-muted leading-relaxed">{{ school_setting('mission', 'To provide a nurturing and stimulating learning environment that promotes academic excellence, critical thinking, creativity, and character development in every student.') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- PRINCIPAL'S MESSAGE --}}
    @if ($principalMessage)
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="grid lg:grid-cols-5 gap-12 items-center">
                <div class="lg:col-span-2 flex justify-center">
                    <div class="relative">
                        <div class="w-64 h-64 lg:w-72 lg:h-72 rounded-3xl overflow-hidden shadow-xl">
                            @if ($principalMessage->og_image)
                                <img src="{{ asset('storage/' . $principalMessage->og_image) }}" alt="Principal" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-academic-blue/10 to-academic-blue/5 flex items-center justify-center">
                                    <svg class="w-20 h-20 text-academic-blue/30" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                </div>
                            @endif
                        </div>
                        <div class="absolute -bottom-4 -right-4 w-20 h-20 rounded-xl bg-academic-blue/10 -z-10"></div>
                    </div>
                </div>
                <div class="lg:col-span-3">
                    <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">Leadership</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-dark mb-6">Principal's Message</h2>
                    <div class="text-muted leading-relaxed prose max-w-none mb-6">
                        {!! $principalMessage->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- CHAIRMAN'S MESSAGE --}}
    @if ($chairmanMessage)
    <section class="py-16 lg:py-24 bg-light-gray">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="grid lg:grid-cols-5 gap-12 items-center">
                <div class="lg:col-span-3 order-2 lg:order-1">
                    <span class="inline-block px-4 py-1 rounded-full bg-gold/10 text-gold text-sm font-semibold mb-4">Leadership</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-dark mb-6">Chairman's Message</h2>
                    <div class="text-muted leading-relaxed prose max-w-none">
                        {!! $chairmanMessage->content !!}
                    </div>
                </div>
                <div class="lg:col-span-2 flex justify-center order-1 lg:order-2">
                    <div class="relative">
                        <div class="w-64 h-64 lg:w-72 lg:h-72 rounded-3xl overflow-hidden shadow-xl">
                            @if ($chairmanMessage->og_image)
                                <img src="{{ asset('storage/' . $chairmanMessage->og_image) }}" alt="Chairman" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-gold/10 to-gold/5 flex items-center justify-center">
                                    <svg class="w-20 h-20 text-gold/30" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                </div>
                            @endif
                        </div>
                        <div class="absolute -bottom-4 -left-4 w-20 h-20 rounded-xl bg-gold/10 -z-10"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- CORE VALUES --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">Values</span>
                <h2 class="text-3xl lg:text-5xl font-bold text-slate-dark">Our Core Values</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $values = [
                        ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Integrity', 'desc' => 'We uphold honesty and ethical behavior in all our actions.'],
                        ['icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253', 'title' => 'Excellence', 'desc' => 'We strive for the highest standards in teaching and learning.'],
                        ['icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z', 'title' => 'Compassion', 'desc' => 'We foster empathy and care for every member of our community.'],
                        ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'title' => 'Innovation', 'desc' => 'We embrace creative thinking and modern educational approaches.'],
                    ];
                @endphp
                @foreach ($values as $value)
                    <div class="text-center p-6 rounded-2xl border border-border hover:shadow-lg hover:border-academic-blue/20 transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-academic-blue/10 flex items-center justify-center mx-auto mb-5">
                            <svg class="w-7 h-7 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $value['icon'] }}" /></svg>
                        </div>
                        <h3 class="font-bold text-lg text-slate-dark mb-2">{{ $value['title'] }}</h3>
                        <p class="text-sm text-muted leading-relaxed">{{ $value['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- SCHOOL LEADERSHIP --}}
    @if ($teachers->count())
    <section class="py-16 lg:py-24 bg-light-gray">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">Team</span>
                <h2 class="text-3xl lg:text-5xl font-bold text-slate-dark">School Leadership</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($teachers as $teacher)
                    <div class="bg-white rounded-2xl p-6 border border-border text-center hover:shadow-md transition-shadow">
                        <div class="w-20 h-20 rounded-full bg-academic-blue/10 mx-auto mb-4 overflow-hidden flex items-center justify-center">
                            @if ($teacher->photo)
                                <img src="{{ asset('storage/' . $teacher->photo) }}" alt="{{ $teacher->name }}" class="w-full h-full object-cover">
                            @else
                                <svg class="w-8 h-8 text-academic-blue/40" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            @endif
                        </div>
                        <h3 class="font-bold text-slate-dark">{{ $teacher->name }}</h3>
                        <p class="text-sm text-academic-blue font-medium">{{ $teacher->position }}</p>
                        @if ($teacher->department)
                            <p class="text-xs text-muted mt-1">{{ $teacher->department }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ACHIEVEMENTS --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">Milestones</span>
                <h2 class="text-3xl lg:text-5xl font-bold text-slate-dark">Our Achievements</h2>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center p-6 rounded-2xl bg-light-gray border border-border">
                    <div class="text-3xl lg:text-4xl font-bold text-academic-blue mb-2">{{ school_setting('stat_years', '25+') }}</div>
                    <p class="text-sm text-muted">Years of Excellence</p>
                </div>
                <div class="text-center p-6 rounded-2xl bg-light-gray border border-border">
                    <div class="text-3xl lg:text-4xl font-bold text-academic-blue mb-2">{{ school_setting('stat_students', '500+') }}</div>
                    <p class="text-sm text-muted">Students Enrolled</p>
                </div>
                <div class="text-center p-6 rounded-2xl bg-light-gray border border-border">
                    <div class="text-3xl lg:text-4xl font-bold text-academic-blue mb-2">{{ $newsCount }}</div>
                    <p class="text-sm text-muted">News Published</p>
                </div>
                <div class="text-center p-6 rounded-2xl bg-light-gray border border-border">
                    <div class="text-3xl lg:text-4xl font-bold text-academic-blue mb-2">{{ $facilityCount }}</div>
                    <p class="text-sm text-muted">Campus Facilities</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 lg:py-20 bg-gradient-to-br from-academic-blue to-academic-blue-light">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 text-center">
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">Become Part of Our Family</h2>
            <p class="text-white/80 mb-8 max-w-lg mx-auto">Join a community dedicated to excellence in education and character development.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('online-admission.index') }}" class="inline-flex items-center gap-2 px-8 h-13 text-base font-semibold text-academic-blue bg-white rounded-xl hover:bg-white/90 transition-all hover:shadow-lg">
                    Apply for Admission
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 h-13 text-base font-semibold text-white border-2 border-white/30 rounded-xl hover:bg-white/10 transition-all">
                    Contact Us
                </a>
            </div>
        </div>
    </section>
@endsection
