@extends('layouts.public')

@section('breadcrumbs')
    <x-layout.breadcrumbs :crumbs="[['label' => 'Events', 'url' => null]]" />
@endsection

@section('title', 'Events')

@section('content')
    <section class="bg-light-gray border-b border-border">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-12 lg:py-24">
            <h1 class="text-3xl lg:text-5xl font-bold text-academic-blue">Events</h1>
            <p class="text-lg text-muted mt-2">Upcoming and past events at our school</p>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div x-data="{ tab: 'upcoming' }">
                <div class="flex gap-2 mb-8 p-1 bg-light-gray rounded-xl w-fit">
                    <button @click="tab = 'upcoming'" :class="tab === 'upcoming' ? 'bg-white shadow-sm text-slate-dark' : 'text-muted hover:text-slate-dark'" class="px-5 py-2 rounded-lg text-sm font-medium transition-all">
                        Upcoming
                    </button>
                    <button @click="tab = 'past'" :class="tab === 'past' ? 'bg-white shadow-sm text-slate-dark' : 'text-muted hover:text-slate-dark'" class="px-5 py-2 rounded-lg text-sm font-medium transition-all">
                        Past
                    </button>
                </div>

                <div x-show="tab === 'upcoming'" x-transition>
                    @if ($upcoming->count())
                        <div class="space-y-4">
                            @foreach ($upcoming as $event)
                                <x-cards.event :$event />
                            @endforeach
                        </div>
                        <div class="mt-8">
                            <x-ui.pagination :paginator="$upcoming" />
                        </div>
                    @else
                        <x-ui.empty-state title="No upcoming events" description="Check back later for upcoming events." />
                    @endif
                </div>

                <div x-show="tab === 'past'" x-transition x-cloak>
                    @if ($past->count())
                        <div class="space-y-4">
                            @foreach ($past as $event)
                                <x-cards.event :$event />
                            @endforeach
                        </div>
                        <div class="mt-8">
                            <x-ui.pagination :paginator="$past" />
                        </div>
                    @else
                        <x-ui.empty-state title="No past events" description="No events have taken place yet." />
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
