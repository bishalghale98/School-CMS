@extends('layouts.public')

@section('title', 'School History')

@section('meta_description', 'Learn about the history of our school.')

@section('content')
    <section class="bg-light-gray border-b border-border">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-12 lg:py-24">
            <h1 class="text-3xl lg:text-5xl font-bold text-academic-blue">School History</h1>
            <p class="text-lg text-muted mt-2">Our journey through the years</p>
        </div>
    </section>
    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="prose max-w-3xl">
                <p class="text-muted">School history content will be managed through the admin panel. Navigate to Admin &rarr; Content &rarr; Pages to edit this page.</p>
            </div>
        </div>
    </section>
@endsection
