@props(['member', 'type' => 'teacher'])

<div {{ $attributes->merge(['class' => 'bg-white border border-border rounded-2xl p-6 text-center hover:shadow-md transition-shadow']) }}>
    <div class="w-20 h-20 rounded-full bg-light-gray mx-auto mb-4 flex items-center justify-center text-muted overflow-hidden">
        @if (false)
            <img src="" alt="{{ $member->name }}" class="w-full h-full object-cover">
        @else
            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        @endif
    </div>
    <h3 class="font-semibold text-slate-dark">{{ $member->name }}</h3>
    <p class="text-sm text-muted">{{ $member->position }}</p>
    @if ($member->department)
        <p class="text-xs text-muted mt-1">{{ $member->department }}</p>
    @endif
</div>
