@props(['navigation' => []])

@php
    $isActive = function ($item) {
        if (!empty($item['routes'])) {
            foreach ($item['routes'] as $route) {
                if (request()->routeIs($route)) {
                    return true;
                }
            }
        }
        if (request()->routeIs($item['route'] ?? '')) {
            return true;
        }
        if (!empty($item['children'])) {
            foreach ($item['children'] as $child) {
                if (request()->routeIs($child['route'] ?? '')) {
                    return true;
                }
            }
        }
        return false;
    };
@endphp
<header
    x-data="{ mobileOpen: false }"
    class="fixed top-0 left-0 right-0 z-50 h-16 lg:h-[72px] bg-white border-b border-border transition-shadow duration-150"
    :class="mobileOpen ? 'shadow-md' : ''"
>
    <div class="max-w-[1280px] mx-auto px-5 lg:px-6 h-full flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0">
            <div class="w-8 h-8 lg:w-10 lg:h-10 rounded-lg bg-academic-blue flex items-center justify-center text-white font-bold text-sm lg:text-base">
                S
            </div>
            <span class="font-semibold text-base lg:text-lg text-slate-dark hidden sm:block">
                School CMS
            </span>
        </a>

        <nav class="hidden lg:flex items-center gap-1">
            @foreach ($navigation as $item)
                @php $active = $isActive($item); @endphp
                @if (!empty($item['children']))
                    <div
                        x-data="{ open: false }"
                        @mouseenter="open = true"
                        @mouseleave="open = false"
                        class="relative"
                    >
                        <a
                            href="{{ $item['url'] }}"
                            class="px-3 py-2 text-sm font-medium rounded-lg transition-colors flex items-center gap-1
                                {{ $active ? 'text-academic-blue bg-academic-blue/5' : 'text-slate-dark hover:bg-light-gray' }}
                            "
                            :class="open && !{{ $active ? 'true' : 'false' }} ? 'bg-light-gray' : ''"
                        >
                            {{ $item['label'] }}
                            <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <div
                            x-show="open"
                            @mouseenter="open = true"
                            @mouseleave="open = false"
                            x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0 translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-cloak
                            class="absolute top-full left-0 mt-1 w-56 bg-white border border-border rounded-xl shadow-lg py-2"
                        >
                            @foreach ($item['children'] as $child)
                                @php $childActive = request()->routeIs($child['route'] ?? ''); @endphp
                                <a
                                    href="{{ $child['url'] }}"
                                    class="block px-4 py-2 text-sm transition-colors
                                        {{ $childActive ? 'text-academic-blue bg-academic-blue/5 font-medium' : 'text-slate-dark hover:bg-light-gray' }}
                                    "
                                >
                                    {{ $child['label'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a
                        href="{{ $item['url'] }}"
                        class="px-3 py-2 text-sm font-medium rounded-lg transition-colors
                            {{ $active ? 'text-academic-blue bg-academic-blue/5' : 'text-slate-dark hover:bg-light-gray' }}
                        "
                    >
                        {{ $item['label'] }}
                    </a>
                @endif
            @endforeach
        </nav>

        <div class="flex items-center gap-3">
            <a
                href="{{ route('search') }}"
                class="p-2 rounded-lg hover:bg-light-gray transition-colors hidden lg:block"
                aria-label="Search"
            >
                <svg class="w-5 h-5 text-slate-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </a>

            <a
                href="{{ route('online-admission.index') }}"
                class="hidden lg:inline-flex items-center px-6 h-10 text-sm font-medium text-white bg-academic-blue rounded-xl hover:bg-academic-blue/90 transition-colors"
            >
                Apply Now
            </a>

            <button
                @click="mobileOpen = !mobileOpen; $dispatch('toggle-mobile-nav', { open: mobileOpen })"
                class="lg:hidden p-2 rounded-lg hover:bg-light-gray transition-colors"
                aria-label="Toggle navigation menu"
            >
                <svg class="w-6 h-6 text-slate-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path :class="mobileOpen ? 'hidden' : 'block'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="mobileOpen ? 'block' : 'hidden'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</header>
