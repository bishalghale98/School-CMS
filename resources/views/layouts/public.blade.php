

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'School CMS'))</title>
    <meta name="description" content="@yield('meta_description', '')">

    <meta property="og:title" content="@yield('og_title', '@yield('title')')">
    <meta property="og:description" content="@yield('meta_description', '')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="{{ school_setting('school_name', config('app.name')) }}">
    @hasSection('og_image')
        <meta property="og:image" content="@yield('og_image')">
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', config('app.name', 'School CMS'))">
    <meta name="twitter:description" content="@yield('meta_description', '')">
    <link rel="canonical" href="{{ url()->current() }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <script type="application/ld+json">@json([
        '@context' => 'https://schema.org',
        '@type' => 'EducationalOrganization',
        'name' => school_setting('school_name', config('app.name')),
        'url' => url('/'),
        'telephone' => school_setting('phone'),
        'email' => school_setting('email'),
    ])</script>

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
