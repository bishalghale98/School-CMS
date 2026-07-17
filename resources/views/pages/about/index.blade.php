@extends('layouts.public')

@php
    $crumbs = [['label' => 'About', 'url' => null]];
@endphp

@section('title', 'About Our School')

@section('meta_description', 'Learn about our school\'s history, vision, mission, and leadership.')

@section('content')
    <section class="bg-light-gray border-b border-border">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-12 lg:py-24">
            <h1 class="text-3xl lg:text-5xl font-bold text-academic-blue">About Our School</h1>
            <p class="text-lg text-muted mt-2">Discover our story, our values, and the people who lead us</p>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <a href="{{ route('about.history') }}" class="bg-white border border-border rounded-2xl p-6 hover:shadow-md transition-shadow text-center">
                    <h3 class="font-semibold text-slate-dark mb-2">School History</h3>
                    <p class="text-sm text-muted">Learn about our journey</p>
                </a>
                <a href="{{ route('about.vision-mission') }}" class="bg-white border border-border rounded-2xl p-6 hover:shadow-md transition-shadow text-center">
                    <h3 class="font-semibold text-slate-dark mb-2">Vision & Mission</h3>
                    <p class="text-sm text-muted">Our guiding principles</p>
                </a>
                <a href="{{ route('about.committee') }}" class="bg-white border border-border rounded-2xl p-6 hover:shadow-md transition-shadow text-center">
                    <h3 class="font-semibold text-slate-dark mb-2">School Committee</h3>
                    <p class="text-sm text-muted">Meet our leadership</p>
                </a>
            </div>
        </div>
    </section>
@endsection
