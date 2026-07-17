

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
        @hasSection('breadcrumbs')
            @yield('breadcrumbs')
        @else
            <x-layout.breadcrumbs :crumbs="$crumbs ?? []" />
        @endif
    @endunless

    <main class="flex-1">
        @yield('content')
    </main>

    <x-layout.footer />

    <x-layout.mobile-nav :navigation="$navigation" />

    @stack('scripts')
</body>
</html>
