@extends('layouts.public')

@php
    $crumbs = [['label' => 'Academics', 'url' => null]];
@endphp

@section('title', 'Academics')
@section('meta_description', 'Explore our academic programs, curriculum, and teaching methodology.')

@section('content')
    {{-- HERO --}}
    <section class="relative bg-gradient-to-br from-slate-dark via-slate-dark to-academic-blue/80 py-20 lg:py-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 -translate-y-1/3"></div>
        </div>
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 relative z-10">
            <span class="inline-block px-4 py-1 rounded-full bg-white/10 text-white/80 text-sm font-semibold mb-4">Education</span>
            <h1 class="text-4xl lg:text-6xl font-bold text-white mb-4">Academic Programs</h1>
            <p class="text-lg text-white/70 max-w-2xl">Comprehensive educational programs designed to develop well-rounded individuals ready for the challenges of tomorrow.</p>
        </div>
    </section>

    {{-- OVERVIEW --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">Overview</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-dark mb-6">Nurturing Intellectual Growth</h2>
                    <p class="text-muted leading-relaxed mb-4">Our academic programs are designed to challenge students intellectually while fostering creativity, critical thinking, and a genuine love for learning.</p>
                    <p class="text-muted leading-relaxed">We believe that every student has unique potential, and our curriculum is structured to help each child discover and develop their strengths.</p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-light-gray rounded-2xl p-6 text-center border border-border">
                        <div class="text-3xl font-bold text-academic-blue mb-1">{{ $programs->count() }}</div>
                        <p class="text-sm text-muted">Programs</p>
                    </div>
                    <div class="bg-light-gray rounded-2xl p-6 text-center border border-border">
                        <div class="text-3xl font-bold text-academic-blue mb-1">{{ school_setting('stat_teachers', '50+') }}</div>
                        <p class="text-sm text-muted">Teachers</p>
                    </div>
                    <div class="bg-light-gray rounded-2xl p-6 text-center border border-border">
                        <div class="text-3xl font-bold text-academic-blue mb-1">{{ school_setting('stat_pass_rate', '100%') }}</div>
                        <p class="text-sm text-muted">Pass Rate</p>
                    </div>
                    <div class="bg-light-gray rounded-2xl p-6 text-center border border-border">
                        <div class="text-3xl font-bold text-academic-blue mb-1">{{ school_setting('stat_students', '500+') }}</div>
                        <p class="text-sm text-muted">Students</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PROGRAMS --}}
    @if ($programs->count())
    <section class="py-16 lg:py-24 bg-light-gray">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">Programs</span>
                <h2 class="text-3xl lg:text-5xl font-bold text-slate-dark">Our Programs</h2>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                @foreach ($programs as $program)
                    <div class="bg-white border border-border rounded-2xl p-6 lg:p-8 hover:shadow-lg transition-shadow">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="w-12 h-12 rounded-xl bg-academic-blue/10 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-slate-dark">{{ $program->name }}</h3>
                                <p class="text-sm text-muted">{{ $program->level }} · {{ $program->duration }} · {{ $program->medium }}</p>
                            </div>
                        </div>
                        <p class="text-muted mb-4">{{ $program->description }}</p>
                        @if ($program->features && count($program->features))
                            <ul class="space-y-2">
                                @foreach ($program->features as $feature)
                                    <li class="flex items-start gap-2 text-sm text-muted">
                                        <svg class="w-4 h-4 text-success mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                        {{ $feature }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CURRICULUM --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1">
                    <div class="aspect-[4/3] rounded-3xl bg-gradient-to-br from-academic-blue/10 to-academic-blue/5 flex items-center justify-center">
                        <svg class="w-24 h-24 text-academic-blue/20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                    </div>
                </div>
                <div class="order-1 lg:order-2">
                    <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">Curriculum</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-dark mb-6">Balanced & Comprehensive</h2>
                    <p class="text-muted leading-relaxed mb-6">Our curriculum follows national educational standards while incorporating modern teaching methodologies. We emphasize a balanced approach that develops both academic knowledge and practical skills.</p>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3 text-muted">
                            <svg class="w-5 h-5 text-success mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            <span>Activity-based learning approach</span>
                        </li>
                        <li class="flex items-start gap-3 text-muted">
                            <svg class="w-5 h-5 text-success mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            <span>Regular assessments and progress tracking</span>
                        </li>
                        <li class="flex items-start gap-3 text-muted">
                            <svg class="w-5 h-5 text-success mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            <span>Integration of technology in education</span>
                        </li>
                        <li class="flex items-start gap-3 text-muted">
                            <svg class="w-5 h-5 text-success mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            <span>Extracurricular activities for holistic growth</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- TEACHING METHODOLOGY --}}
    <section class="py-16 lg:py-24 bg-light-gray">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">Methodology</span>
                <h2 class="text-3xl lg:text-5xl font-bold text-slate-dark">Our Teaching Approach</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $methods = [
                        ['title' => 'Interactive Learning', 'desc' => 'Engaging classroom sessions that encourage participation and active learning.', 'icon' => 'M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122'],
                        ['title' => 'Project-Based', 'desc' => 'Hands-on projects that develop problem-solving and critical thinking skills.', 'icon' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z'],
                        ['title' => 'Collaborative', 'desc' => 'Group activities that build teamwork and communication skills.', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                    ];
                @endphp
                @foreach ($methods as $method)
                    <div class="bg-white rounded-2xl p-8 border border-border hover:shadow-lg transition-shadow text-center">
                        <div class="w-14 h-14 rounded-2xl bg-academic-blue/10 flex items-center justify-center mx-auto mb-5">
                            <svg class="w-7 h-7 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $method['icon'] }}" /></svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-dark mb-2">{{ $method['title'] }}</h3>
                        <p class="text-sm text-muted leading-relaxed">{{ $method['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FACILITIES SUPPORTING LEARNING --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">Resources</span>
                <h2 class="text-3xl lg:text-5xl font-bold text-slate-dark">Learning Resources</h2>
                <p class="text-muted mt-3 max-w-xl mx-auto">State-of-the-art facilities that support and enhance the learning experience.</p>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                @php
                    $resources = [
                        ['title' => 'Library', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                        ['title' => 'Computer Lab', 'icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                        ['title' => 'Science Lab', 'icon' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z'],
                        ['title' => 'Sports', 'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ];
                @endphp
                @foreach ($resources as $resource)
                    <a href="{{ route('facilities') }}" class="group bg-light-gray rounded-2xl p-6 border border-border text-center hover:shadow-md hover:border-academic-blue/20 transition-all">
                        <svg class="w-10 h-10 text-academic-blue/60 group-hover:text-academic-blue mx-auto mb-3 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $resource['icon'] }}" /></svg>
                        <h3 class="font-semibold text-sm text-slate-dark">{{ $resource['title'] }}</h3>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section class="py-16 lg:py-24 bg-light-gray">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-12">
                    <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">FAQ</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-dark">Academic FAQs</h2>
                </div>
                <div class="space-y-3">
                    @php
                        $acadFaqs = [
                            ['q' => 'What curriculum do you follow?', 'a' => 'We follow the national curriculum framework supplemented with international best practices and modern teaching methodologies.'],
                            ['q' => 'What is the student-teacher ratio?', 'a' => 'We maintain a low student-teacher ratio of approximately 20:1 to ensure personalized attention for every student.'],
                            ['q' => 'Are there extracurricular activities?', 'a' => 'Yes, we offer a wide range of extracurricular activities including sports, arts, music, debate, and community service programs.'],
                        ];
                    @endphp
                    <div x-data="{ open: null }">
                        @foreach ($acadFaqs as $i => $faq)
                            <div class="bg-white border border-border rounded-2xl overflow-hidden">
                                <button @click="open = open === {{ $i }} ? null : {{ $i }}" class="w-full flex items-center justify-between p-5 text-left hover:bg-light-gray/50 transition-colors">
                                    <span class="font-medium text-slate-dark pr-4">{{ $faq['q'] }}</span>
                                    <svg class="w-5 h-5 text-muted shrink-0 transition-transform duration-200" :class="open === {{ $i }} ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                </button>
                                <div x-show="open === {{ $i }}" x-transition class="px-5 pb-5">
                                    <p class="text-muted text-sm leading-relaxed">{{ $faq['a'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- APPLY CTA --}}
    <section class="py-16 lg:py-20 bg-gradient-to-br from-academic-blue to-academic-blue-light">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 text-center">
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">Ready to Start Your Academic Journey?</h2>
            <p class="text-white/80 mb-8 max-w-lg mx-auto">Join our community of learners and discover your full potential.</p>
            <a href="{{ route('online-admission.index') }}" class="inline-flex items-center gap-2 px-8 h-13 text-base font-semibold text-academic-blue bg-white rounded-xl hover:bg-white/90 transition-all hover:shadow-lg">
                Apply for Admission
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
            </a>
        </div>
    </section>
@endsection
