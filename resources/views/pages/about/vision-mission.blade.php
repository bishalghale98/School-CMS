@extends('layouts.public')

@section('title', 'Vision & Mission')

@section('meta_description', 'Our vision and mission statements.')

@section('content')
    <section class="bg-light-gray border-b border-border">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-12 lg:py-24">
            <h1 class="text-3xl lg:text-5xl font-bold text-academic-blue">Vision & Mission</h1>
            <p class="text-lg text-muted mt-2">Our guiding principles</p>
        </div>
    </section>
    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-xl lg:text-2xl font-bold text-academic-blue mb-4">Our Vision</h2>
                    <p class="text-muted leading-relaxed">{{ school_setting('vision', 'Content managed through admin panel.') }}</p>
                </div>
                <div>
                    <h2 class="text-xl lg:text-2xl font-bold text-academic-blue mb-4">Our Mission</h2>
                    <p class="text-muted leading-relaxed">{{ school_setting('mission', 'Content managed through admin panel.') }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
