@props(['facility'])

<div {{ $attributes->merge(['class' => 'bg-white border border-border rounded-2xl p-6 text-center hover:shadow-md transition-shadow']) }}>
    <div class="w-12 h-12 rounded-xl bg-academic-blue/10 flex items-center justify-center mx-auto mb-4">
        <svg class="w-6 h-6 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
        </svg>
    </div>
    <h3 class="font-semibold text-slate-dark mb-2">{{ $facility->name }}</h3>
    @if ($facility->features)
        <ul class="text-sm text-muted text-left space-y-1">
            @foreach (array_slice($facility->features, 0, 3) as $feature)
                <li class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-success shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ $feature }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
