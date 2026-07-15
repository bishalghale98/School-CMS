@extends('layouts.public')

@php
    $crumbs = [['label' => 'Downloads', 'url' => null]];
@endphp

@section('title', 'Downloads')

@section('content')
    <section class="bg-light-gray border-b border-border">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-12 lg:py-24">
            <h1 class="text-3xl lg:text-5xl font-bold text-academic-blue">Downloads</h1>
            <p class="text-lg text-muted mt-2">Download admission forms, prospectus, and other documents</p>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <p class="text-muted">Downloads page will be implemented in Phase 10.</p>
        </div>
    </section>
@endsection
