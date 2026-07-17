@props(['event'])

<div {{ $attributes->merge(['class' => 'bg-white border border-border rounded-2xl p-6 hover:shadow-md transition-shadow']) }}>
    <div class="flex gap-4">
        <div class="shrink-0 w-14 h-14 rounded-xl bg-academic-blue/10 flex flex-col items-center justify-center text-center">
            <span class="text-lg font-bold text-academic-blue leading-tight">{{ $event->event_date->format('d') }}</span>
            <span class="text-xs font-medium text-academic-blue/70">{{ $event->event_date->format('M') }}</span>
        </div>
        <div class="min-w-0">
            <h3 class="font-semibold text-slate-dark mb-1">
                <a href="{{ route('events.show', $event->slug) }}" class="hover:text-academic-blue transition-colors">
                    {{ $event->title }}
                </a>
            </h3>
            @if ($event->venue)
                <p class="text-xs text-muted flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ $event->venue }}
                </p>
            @endif
            <p class="text-sm text-muted line-clamp-2 mt-2">{{ strip_tags($event->description) }}</p>
        </div>
    </div>
</div>
