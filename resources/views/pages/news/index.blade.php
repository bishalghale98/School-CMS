@extends('layouts.public')

@php
    $crumbs = [['label' => 'News', 'url' => null]];
@endphp

@section('title', 'News')

@section('content')
    <section class="bg-light-gray border-b border-border">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-12 lg:py-24">
            <h1 class="text-3xl lg:text-5xl font-bold text-academic-blue">News</h1>
            <p class="text-lg text-muted mt-2">Latest news and updates from our school</p>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <p class="text-muted">News listing will be implemented in Phase 9.</p>
        </div>
    </section>
@endsection
