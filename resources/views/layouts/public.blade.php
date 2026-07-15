@php
$navigation = [
    ['label' => 'Home', 'route' => 'home', 'url' => route('home'), 'routes' => ['home']],
    ['label' => 'About', 'route' => 'about', 'url' => route('about'), 'routes' => ['about'], 'children' => [['label' => 'School History', 'route' => 'about.history', 'url' => '#'], ['label' => 'Vision & Mission', 'route' => 'about.vision-mission', 'url' => '#']]],
    ['label' => 'Notices', 'route' => 'notices.index', 'url' => route('notices.index'), 'routes' => ['notices.index', 'notices.show']],
    ['label' => 'News', 'route' => 'news.index', 'url' => route('news.index'), 'routes' => ['news.index', 'news.show']],
    ['label' => 'Events', 'route' => 'events.index', 'url' => route('events.index'), 'routes' => ['events.index', 'events.show']],
    ['label' => 'Gallery', 'route' => 'gallery.index', 'url' => route('gallery.index'), 'routes' => ['gallery.index', 'gallery.show']],
    ['label' => 'Downloads', 'route' => 'downloads', 'url' => route('downloads'), 'routes' => ['downloads']],
    ['label' => 'Contact', 'route' => 'contact', 'url' => route('contact'), 'routes' => ['contact']],
];
@endphp


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'School CMS'))</title>
    <meta name="description" content="@yield('meta_description', '')">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen flex flex-col">
    <x-layout.header :navigation="$navigation" />

    @unless(request()->routeIs('home'))
        <x-layout.breadcrumbs />
    @endunless

    <main class="flex-1">
        @yield('content')
    </main>

    <x-layout.footer />

    <x-layout.mobile-nav :navigation="$navigation" />

    @stack('scripts')
</body>
</html>
