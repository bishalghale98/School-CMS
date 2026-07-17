@extends('layouts.public')

@section('title', school_setting('school_name', config('app.name', 'School CMS')) . ' | Home')
@section('og_type', 'website')

@section('content')
    @php $slider = $sliders->first(); @endphp
    <section class="relative h-[80vh] min-h-[500px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-dark/80 via-slate-dark/60 to-slate-dark/40 z-10"></div>
        <div class="absolute inset-0 bg-light-gray">
            @if (false)
                <img src="" alt="" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gradient-to-br from-academic-blue/20 to-academic-blue/5"></div>
            @endif
        </div>

        <div class="relative z-20 text-center max-w-3xl mx-auto px-5">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight mb-4">
                {{ $slider->title ?? 'Welcome to ' . school_setting('school_name', 'School CMS') }}
            </h1>
            <p class="text-lg sm:text-xl text-white/80 mb-8 max-w-2xl mx-auto leading-relaxed">
                {{ $slider->subtitle ?? school_setting('school_tagline', 'Providing quality education and nurturing future leaders since our establishment.') }}
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('about.index') }}" class="inline-flex items-center px-8 h-12 text-base font-medium text-white border-2 border-white/30 rounded-xl hover:bg-white/10 transition-colors">
                    {{ $slider->button_text ?? 'Learn More' }}
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
                    <p class="text-3xl lg:text-4xl font-bold text-white">{{ school_setting('stat_years', '25+') }}</p>
                    <p class="text-sm text-white/70 mt-1">Years of Excellence</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl lg:text-4xl font-bold text-white">{{ school_setting('stat_students', '500+') }}</p>
                    <p class="text-sm text-white/70 mt-1">Students Enrolled</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl lg:text-4xl font-bold text-white">{{ school_setting('stat_teachers', '50+') }}</p>
                    <p class="text-sm text-white/70 mt-1">Qualified Teachers</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl lg:text-4xl font-bold text-white">{{ school_setting('stat_pass_rate', '100%') }}</p>
                    <p class="text-sm text-white/70 mt-1">Pass Rate</p>
                </div>
            </div>
        </div>
    </section>

    @if ($principalMessage)
    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-16 items-center">
                <div>
                    @if (false)
                        <img src="" alt="Principal" class="w-48 h-48 lg:w-56 lg:h-56 rounded-full mx-auto lg:mx-0 object-cover">
                    @else
                        <div class="w-48 h-48 lg:w-56 lg:h-56 rounded-full bg-light-gray mx-auto lg:mx-0 flex items-center justify-center text-muted text-sm border border-border">
                            Photo
                        </div>
                    @endif
                </div>
                <div>
                    <h2 class="text-2xl lg:text-4xl font-bold text-academic-blue mb-4">Principal's Message</h2>
                    <div class="text-base lg:text-lg text-slate-dark/70 leading-relaxed mb-6 prose max-w-none">
                        {!! $principalMessage->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="py-12 lg:py-24 bg-light-gray">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <x-ui.section-heading title="Latest Notices" subtitle="Stay informed with the latest announcements">
                <x-slot:action>
                    <a href="{{ route('notices.index') }}" class="text-sm font-medium text-academic-blue hover:text-academic-blue/70 transition-colors">View All &rarr;</a>
                </x-slot:action>
            </x-ui.section-heading>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($notices as $notice)
                    <x-cards.notice :$notice />
                @empty
                    <div class="md:col-span-2 lg:col-span-3">
                        <x-ui.empty-state title="No notices yet" description="Check back later for updates." />
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <x-ui.section-heading title="Latest News" subtitle="Recent updates from our school">
                <x-slot:action>
                    <a href="{{ route('news.index') }}" class="text-sm font-medium text-academic-blue hover:text-academic-blue/70 transition-colors">View All &rarr;</a>
                </x-slot:action>
            </x-ui.section-heading>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($news as $newsItem)
                    <x-cards.news :news="$newsItem" />
                @empty
                    <div class="md:col-span-2 lg:col-span-3">
                        <x-ui.empty-state title="No news yet" description="Check back later for updates." />
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-24 bg-light-gray">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <x-ui.section-heading title="Academic Programs" subtitle="Explore our comprehensive academic offerings" />
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($programs as $program)
                    <div class="bg-white border border-border rounded-2xl p-6 lg:p-8">
                        <div class="w-12 h-12 rounded-xl bg-academic-blue/10 flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg text-slate-dark mb-2">{{ $program->name }}</h3>
                        <p class="text-sm text-muted leading-relaxed">{{ $program->description ? strip_tags($program->description) : '' }}</p>
                        @if ($program->duration || $program->medium)
                            <div class="flex gap-3 mt-3 text-xs text-muted">
                                @if ($program->duration)<span>Duration: {{ $program->duration }}</span>@endif
                                @if ($program->medium)<span>Medium: {{ $program->medium }}</span>@endif
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="md:col-span-2 lg:col-span-3">
                        <x-ui.empty-state title="No programs added yet" />
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <x-ui.section-heading title="Our Facilities" subtitle="State-of-the-art facilities for comprehensive learning" />
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 lg:gap-6">
                @forelse ($facilities as $facility)
                    <x-cards.facility :$facility />
                @empty
                    <div class="col-span-full">
                        <x-ui.empty-state title="No facilities added yet" />
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    @if ($testimonials->isNotEmpty())
    <section class="py-12 lg:py-24 bg-light-gray">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <x-ui.section-heading title="What People Say" subtitle="Testimonials from our community" />
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($testimonials as $testimonial)
                    <x-cards.testimonial :$testimonial />
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <section class="bg-academic-blue">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-16 lg:py-20 text-center">
            <h2 class="text-2xl lg:text-4xl font-bold text-white mb-4">Get in Touch</h2>
            <p class="text-white/80 mb-8 max-w-lg mx-auto">
                Have questions about admissions, academics, or anything else? We're here to help.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 text-white/80 mb-8">
                <span class="flex items-center gap-2 text-sm">{{ school_setting('school_phone', '+1 (555) 123-4567') }}</span>
                <span class="hidden sm:block text-white/40">|</span>
                <span class="flex items-center gap-2 text-sm">{{ school_setting('school_email', 'info@schoolcms.test') }}</span>
            </div>
            <a href="{{ route('contact') }}" class="inline-flex items-center px-8 h-12 text-base font-medium text-academic-blue bg-white rounded-xl hover:bg-white/90 transition-colors">
                Contact Us
            </a>
        </div>
    </section>
@endsection
