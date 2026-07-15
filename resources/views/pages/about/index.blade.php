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
            <p class="text-muted">About page content will be managed through the admin panel.</p>
        </div>
    </section>
@endsection
