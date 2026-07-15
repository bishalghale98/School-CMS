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
<div
    x-data="{ open: false }"
    x-on:toggle-mobile-nav.window="open = $event.detail.open"
    x-show="open"
    x-cloak
    class="fixed inset-0 z-40 lg:hidden"
>
    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="fixed inset-0 bg-black/30" @click="open = false; $dispatch('toggle-mobile-nav', { open: false })"></div>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-x-4"
        x-transition:enter-end="opacity-100 translate-x-0"
        class="fixed inset-y-0 left-0 w-full max-w-sm bg-white shadow-xl overflow-y-auto"
    >
        <div class="pt-20 pb-8 px-5">
            <nav class="space-y-1">
                @foreach ($navigation as $item)
                    @php $active = $isActive($item); @endphp
                    @if (!empty($item['children']))
                        <div x-data="{ expanded: false }" class="border-b border-border last:border-b-0">
                            <button
                                @click="expanded = !expanded"
                                class="w-full flex items-center justify-between py-3 px-2 text-base font-medium rounded-lg transition-colors
                                    {{ $active ? 'text-academic-blue bg-academic-blue/5' : 'text-slate-dark hover:bg-light-gray' }}
                                "
                            >
                                {{ $item['label'] }}
                                <svg class="w-5 h-5 transition-transform" :class="expanded ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="expanded" x-collapse class="pb-2 pl-4">
                                @foreach ($item['children'] as $child)
                                    @php $childActive = request()->routeIs($child['route'] ?? ''); @endphp
                                    <a
                                        href="{{ $child['url'] }}"
                                        @click="open = false"
                                        class="block py-2 px-2 text-sm rounded-lg transition-colors
                                            {{ $childActive ? 'text-academic-blue bg-academic-blue/5 font-medium' : 'text-slate-dark/80 hover:text-academic-blue hover:bg-light-gray' }}
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
                            @click="open = false"
                            class="block py-3 px-2 text-base font-medium rounded-lg transition-colors border-b border-border
                                {{ $active ? 'text-academic-blue bg-academic-blue/5' : 'text-slate-dark hover:bg-light-gray' }}
                            "
                        >
                            {{ $item['label'] }}
                        </a>
                    @endif
                @endforeach
            </nav>

            <div class="mt-8 pt-6 border-t border-border">
                <a
                    href="{{ route('admissions') }}"
                    @click="open = false"
                    class="flex items-center justify-center w-full h-12 text-base font-medium text-white bg-academic-blue rounded-xl hover:bg-academic-blue/90 transition-colors"
                >
                    Apply Now
                </a>
            </div>
        </div>
    </div>
</div>
