@props(['items' => [], 'multiple' => false])

<div {{ $attributes->merge(['class' => 'divide-y divide-border border border-border rounded-2xl']) }}
     x-data="{ expanded: {{ $multiple ? '[]' : 'false' }} }"
>
    @foreach ($items as $index => $item)
        <div class="accordion-item">
            <button
                @click="expanded = {{ $multiple ? "expanded.includes($index) ? expanded.filter(i => i !== $index) : [...expanded, $index]" : "expanded === $index ? false : $index" }}"
                class="w-full flex items-center justify-between px-6 py-4 text-left text-slate-dark font-medium hover:bg-light-gray/50 transition-colors"
            >
                <span>{{ $item['question'] ?? $item['label'] ?? '' }}</span>
                <svg class="w-5 h-5 text-muted transition-transform shrink-0 ml-4" :class="expanded === {{ $multiple ? "$index" : "true" }} ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div
                x-show="expanded === {{ $multiple ? "$index" : "true" }}"
                x-collapse
                class="px-6 pb-4 text-sm text-muted leading-relaxed"
            >
                {{ $item['answer'] ?? $item['content'] ?? '' }}
            </div>
        </div>
    @endforeach
</div>
