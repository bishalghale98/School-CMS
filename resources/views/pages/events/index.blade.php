@extends('layouts.public')

@section('breadcrumbs')
    <x-layout.breadcrumbs :crumbs="[['label' => 'Events', 'url' => null]]" />
@endsection

@section('title', 'Events')
@section('meta_description', 'Upcoming and past events at our school.')

@section('content')
    <section class="relative bg-gradient-to-br from-slate-dark via-slate-dark to-academic-blue/80 py-20 lg:py-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10"><div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 -translate-y-1/3"></div></div>
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 relative z-10">
            <span class="inline-block px-4 py-1 rounded-full bg-white/10 text-white/80 text-sm font-semibold mb-4">Calendar</span>
            <h1 class="text-4xl lg:text-6xl font-bold text-white mb-4">Events</h1>
            <p class="text-lg text-white/70 max-w-2xl">Stay updated with school events, competitions, celebrations, and community gatherings.</p>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div x-data="{ tab: 'upcoming' }">
                <div class="flex gap-2 mb-8 p-1 bg-light-gray rounded-xl w-fit">
                    <button @click="tab = 'upcoming'" :class="tab === 'upcoming' ? 'bg-white shadow-sm text-slate-dark' : 'text-muted hover:text-slate-dark'" class="px-5 py-2 rounded-lg text-sm font-medium transition-all">Upcoming Events</button>
                    <button @click="tab = 'past'" :class="tab === 'past' ? 'bg-white shadow-sm text-slate-dark' : 'text-muted hover:text-slate-dark'" class="px-5 py-2 rounded-lg text-sm font-medium transition-all">Past Events</button>
                </div>

                <div x-show="tab === 'upcoming'" x-transition>
                    @if ($upcoming->count())
                        <div class="space-y-4">
                            @foreach ($upcoming as $event)
                                <x-cards.event :$event />
                            @endforeach
                        </div>
                        <div class="mt-8"><x-ui.pagination :paginator="$upcoming" /></div>
                    @else
                        <div class="text-center py-16 bg-light-gray rounded-3xl">
                            <svg class="w-16 h-16 text-muted/30 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            <h3 class="text-lg font-bold text-slate-dark mb-2">No Upcoming Events</h3>
                            <p class="text-sm text-muted">Check back later for upcoming events.</p>
                        </div>
                    @endif
                </div>

                <div x-show="tab === 'past'" x-transition x-cloak>
                    @if ($past->count())
                        <div class="space-y-4">
                            @foreach ($past as $event)
                                <x-cards.event :$event />
                            @endforeach
                        </div>
                        <div class="mt-8"><x-ui.pagination :paginator="$past" /></div>
                    @else
                        <div class="text-center py-16 bg-light-gray rounded-3xl">
                            <p class="text-sm text-muted">No past events recorded yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-16 bg-academic-blue">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 text-center">
            <h2 class="text-2xl lg:text-3xl font-bold text-white mb-3">Don't Miss Out</h2>
            <p class="text-white/80 mb-6">Stay informed about all our upcoming events and activities.</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 h-12 text-sm font-semibold text-academic-blue bg-white rounded-xl hover:bg-white/90 transition-all">Get In Touch</a>
        </div>
    </section>
@endsection
