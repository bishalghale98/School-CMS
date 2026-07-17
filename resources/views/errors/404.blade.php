@extends('layouts.public')

@section('title', 'Page Not Found')

@section('content')
    <section class="py-24">
        <div class="max-w-[1280px] mx-auto px-5 text-center">
            <h1 class="text-6xl lg:text-8xl font-bold text-academic-blue mb-4">404</h1>
            <h2 class="text-2xl lg:text-3xl font-semibold text-slate-dark mb-4">Page Not Found</h2>
            <p class="text-muted mb-8 max-w-md mx-auto">The page you are looking for does not exist or has been moved.</p>
            <a href="{{ route('home') }}" class="inline-flex items-center px-8 h-12 text-base font-medium text-white bg-academic-blue rounded-xl hover:bg-academic-blue/90 transition-colors">
                Back to Home
            </a>
        </div>
    </section>
@endsection
