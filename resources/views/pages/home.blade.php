@extends('layouts.public')

@section('title', config('app.name', 'School CMS') . ' | Home')

@section('content')
    <section class="relative h-[80vh] min-h-[500px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-dark/80 via-slate-dark/60 to-slate-dark/40 z-10"></div>
        <div class="absolute inset-0 bg-light-gray">
            <div class="w-full h-full bg-gradient-to-br from-academic-blue/20 to-academic-blue/5"></div>
        </div>

        <div class="relative z-20 text-center max-w-3xl mx-auto px-5">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight mb-4">
                Welcome to School CMS
            </h1>
            <p class="text-lg sm:text-xl text-white/80 mb-8 max-w-2xl mx-auto leading-relaxed">
                Providing quality education and nurturing future leaders since our establishment.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('about') }}" class="inline-flex items-center px-8 h-12 text-base font-medium text-white border-2 border-white/30 rounded-xl hover:bg-white/10 transition-colors">
                    Learn More
                </a>
                <a href="{{ route('admissions') }}" class="inline-flex items-center px-8 h-12 text-base font-medium text-white bg-academic-blue rounded-xl hover:bg-academic-blue/90 transition-colors">
                    Apply Now
                </a>
            </div>
        </div>
    </section>

    <section class="bg-academic-blue">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-8 lg:py-10">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                <div class="text-center">
                    <p class="text-3xl lg:text-4xl font-bold text-white">25+</p>
                    <p class="text-sm text-white/70 mt-1">Years of Excellence</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl lg:text-4xl font-bold text-white">500+</p>
                    <p class="text-sm text-white/70 mt-1">Students Enrolled</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl lg:text-4xl font-bold text-white">50+</p>
                    <p class="text-sm text-white/70 mt-1">Qualified Teachers</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl lg:text-4xl font-bold text-white">100%</p>
                    <p class="text-sm text-white/70 mt-1">Pass Rate</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-16 items-center">
                <div>
                    <div class="w-48 h-48 lg:w-56 lg:h-56 rounded-full bg-light-gray mx-auto lg:mx-0 flex items-center justify-center text-muted text-sm border border-border">
                        Photo
                    </div>
                </div>
                <div>
                    <h2 class="text-2xl lg:text-4xl font-bold text-academic-blue mb-4">Principal's Message</h2>
                    <p class="text-base lg:text-lg text-slate-dark/70 leading-relaxed mb-6">
                        Welcome to School CMS, where we believe in nurturing every student's potential
                        through quality education, character development, and a supportive learning environment.
                        Our dedicated faculty and staff work tirelessly to create an atmosphere where students
                        can thrive academically, socially, and emotionally.
                    </p>
                    <p class="font-semibold text-slate-dark">Principal Name</p>
                    <p class="text-sm text-muted">Principal, School CMS</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-24 bg-light-gray">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="flex items-center justify-between mb-8 lg:mb-12">
                <div>
                    <h2 class="text-2xl lg:text-4xl font-bold text-academic-blue">Latest Notices</h2>
                    <p class="text-muted mt-1">Stay informed with the latest announcements</p>
                </div>
                <a href="{{ route('notices.index') }}" class="text-sm font-medium text-academic-blue hover:text-academic-blue/70 transition-colors">
                    View All &rarr;
                </a>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white border border-border rounded-2xl p-6">
                    <span class="inline-block px-3 py-1 text-xs font-medium bg-academic-blue/10 text-academic-blue rounded-full mb-3">General</span>
                    <h3 class="font-semibold text-slate-dark mb-2">Notice Title Will Appear Here</h3>
                    <p class="text-sm text-muted line-clamp-2">Notice content will be managed through the admin panel.</p>
                    <p class="text-xs text-muted mt-3">Jan 15, 2026</p>
                </div>
                <div class="bg-white border border-border rounded-2xl p-6">
                    <span class="inline-block px-3 py-1 text-xs font-medium bg-academic-blue/10 text-academic-blue rounded-full mb-3">Academic</span>
                    <h3 class="font-semibold text-slate-dark mb-2">Another Notice Title</h3>
                    <p class="text-sm text-muted line-clamp-2">Content will be managed through the CMS admin panel.</p>
                    <p class="text-xs text-muted mt-3">Jan 14, 2026</p>
                </div>
                <div class="bg-white border border-border rounded-2xl p-6">
                    <span class="inline-block px-3 py-1 text-xs font-medium bg-academic-blue/10 text-academic-blue rounded-full mb-3">Events</span>
                    <h3 class="font-semibold text-slate-dark mb-2">Upcoming Event Notice</h3>
                    <p class="text-sm text-muted line-clamp-2">Stay tuned for upcoming school events and activities.</p>
                    <p class="text-xs text-muted mt-3">Jan 13, 2026</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="flex items-center justify-between mb-8 lg:mb-12">
                <div>
                    <h2 class="text-2xl lg:text-4xl font-bold text-academic-blue">Academic Programs</h2>
                    <p class="text-muted mt-1">Explore our comprehensive academic offerings</p>
                </div>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white border border-border rounded-2xl p-6 lg:p-8">
                    <div class="w-12 h-12 rounded-xl bg-academic-blue/10 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg text-slate-dark mb-2">Primary Education</h3>
                    <p class="text-sm text-muted leading-relaxed">Strong foundation in core subjects with focus on holistic development.</p>
                </div>
                <div class="bg-white border border-border rounded-2xl p-6 lg:p-8">
                    <div class="w-12 h-12 rounded-xl bg-academic-blue/10 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg text-slate-dark mb-2">Secondary Education</h3>
                    <p class="text-sm text-muted leading-relaxed">Comprehensive curriculum preparing students for higher education.</p>
                </div>
                <div class="bg-white border border-border rounded-2xl p-6 lg:p-8">
                    <div class="w-12 h-12 rounded-xl bg-academic-blue/10 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg text-slate-dark mb-2">Co-Curricular Programs</h3>
                    <p class="text-sm text-muted leading-relaxed">Diverse activities for balanced student development.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-24 bg-light-gray">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="flex items-center justify-between mb-8 lg:mb-12">
                <div>
                    <h2 class="text-2xl lg:text-4xl font-bold text-academic-blue">Our Facilities</h2>
                    <p class="text-muted mt-1">State-of-the-art facilities for comprehensive learning</p>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 lg:gap-6">
                <div class="bg-white border border-border rounded-2xl p-6 text-center">
                    <div class="w-10 h-10 rounded-lg bg-academic-blue/10 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-5 h-5 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-slate-dark">Library</span>
                </div>
                <div class="bg-white border border-border rounded-2xl p-6 text-center">
                    <div class="w-10 h-10 rounded-lg bg-academic-blue/10 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-5 h-5 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-slate-dark">Computer Lab</span>
                </div>
                <div class="bg-white border border-border rounded-2xl p-6 text-center">
                    <div class="w-10 h-10 rounded-lg bg-academic-blue/10 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-5 h-5 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-slate-dark">Science Lab</span>
                </div>
                <div class="bg-white border border-border rounded-2xl p-6 text-center">
                    <div class="w-10 h-10 rounded-lg bg-academic-blue/10 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-5 h-5 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-slate-dark">Sports</span>
                </div>
                <div class="bg-white border border-border rounded-2xl p-6 text-center">
                    <div class="w-10 h-10 rounded-lg bg-academic-blue/10 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-5 h-5 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-slate-dark">Hostel</span>
                </div>
                <div class="bg-white border border-border rounded-2xl p-6 text-center">
                    <div class="w-10 h-10 rounded-lg bg-academic-blue/10 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-5 h-5 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-slate-dark">Transport</span>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-academic-blue">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-16 lg:py-20 text-center">
            <h2 class="text-2xl lg:text-4xl font-bold text-white mb-4">Get in Touch</h2>
            <p class="text-white/80 mb-8 max-w-lg mx-auto">
                Have questions about admissions, academics, or anything else? We're here to help.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 text-white/80 mb-8">
                <span class="flex items-center gap-2 text-sm">+1 (555) 123-4567</span>
                <span class="hidden sm:block text-white/40">|</span>
                <span class="flex items-center gap-2 text-sm">info@schoolcms.test</span>
            </div>
            <a href="{{ route('contact') }}" class="inline-flex items-center px-8 h-12 text-base font-medium text-academic-blue bg-white rounded-xl hover:bg-white/90 transition-colors">
                Contact Us
            </a>
        </div>
    </section>
@endsection
