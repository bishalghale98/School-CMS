@extends('layouts.public')

@php
    $crumbs = [['label' => 'Search', 'url' => null]];
@endphp

@section('title', 'Search')

@section('content')
    <section class="bg-light-gray border-b border-border">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-12 lg:py-24">
            <h1 class="text-3xl lg:text-5xl font-bold text-academic-blue">Search</h1>
            <p class="text-lg text-muted mt-2">Search across all content on our website</p>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <p class="text-muted">Search will be implemented in Phase 11.</p>
        </div>
    </section>
@endsection
