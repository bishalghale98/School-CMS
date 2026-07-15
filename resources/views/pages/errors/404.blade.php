@extends('layouts.public')

@section('title', 'Page Not Found')

@section('content')
    <div class="flex-1 flex items-center justify-center py-20">
        <div class="text-center max-w-md mx-auto px-5">
            <p class="text-7xl lg:text-8xl font-bold text-muted mb-4">404</p>
            <h1 class="text-2xl lg:text-3xl font-bold text-slate-dark mb-4">Page Not Found</h1>
            <p class="text-muted mb-8 leading-relaxed">
                The page you are looking for does not exist or has been moved.
                Please check the URL or navigate back to the homepage.
            </p>
            <a href="{{ route('home') }}" class="inline-flex items-center px-8 h-12 text-base font-medium text-white bg-academic-blue rounded-xl hover:bg-academic-blue/90 transition-colors">
                Go to Homepage
            </a>
        </div>
    </div>
@endsection
