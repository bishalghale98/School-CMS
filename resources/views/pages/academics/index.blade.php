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
            <p class="text-muted">Academics page content will be managed through the admin panel.</p>
        </div>
    </section>
@endsection
