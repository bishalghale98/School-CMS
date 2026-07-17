@extends('layouts.public')

@php
    $crumbs = [['label' => 'Academics', 'url' => null]];
@endphp

@section('title', 'Academics')

@section('content')
    <section class="bg-light-gray border-b border-border">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-12 lg:py-24">
            <h1 class="text-3xl lg:text-5xl font-bold text-academic-blue">Academics</h1>
            <p class="text-lg text-muted mt-2">Explore our academic programs and curriculum</p>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            @if ($programs->count())
                <div class="grid md:grid-cols-2 gap-6">
                    @foreach ($programs as $program)
                        <div class="bg-white border border-border rounded-2xl p-6 lg:p-8 hover:shadow-md transition-shadow">
                            <div class="flex items-start gap-4 mb-4">
                                <div class="w-12 h-12 rounded-xl bg-academic-blue/10 flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M12 14l9-5-9-5-9 5 9 5z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
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
                                            <svg class="w-4 h-4 text-success mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            {{ $feature }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <x-ui.empty-state title="No programs listed yet" description="Academic programs will be added soon." />
            @endif
        </div>
    </section>
@endsection