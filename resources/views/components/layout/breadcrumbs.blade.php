@props(['crumbs' => []])
<nav aria-label="Breadcrumb" class="bg-light-gray border-b border-border">
    <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-3">
        <ol class="flex items-center gap-1.5 text-sm overflow-x-auto whitespace-nowrap scrollbar-hide">
            <li>
                <a href="{{ route('home') }}" class="text-muted hover:text-academic-blue transition-colors">
                    Home
                </a>
            </li>
            @foreach ($crumbs as $crumb)
                <li class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-muted shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    @if ($crumb['url'] && !$loop->last)
                        <a href="{{ $crumb['url'] }}" class="text-muted hover:text-academic-blue transition-colors">
                            {{ $crumb['label'] }}
                        </a>
                    @else
                        <span class="text-slate-dark font-medium truncate max-w-[200px]">
                            {{ $crumb['label'] }}
                        </span>
                    @endif
                </li>
            @endforeach
        </ol>
    </div>
</nav>
