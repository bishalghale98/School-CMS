@extends('layouts.public')

@php
    $crumbs = [['label' => 'FAQ', 'url' => null]];
@endphp

@section('title', 'Frequently Asked Questions')

@section('content')
    <section class="bg-light-gray border-b border-border">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-12 lg:py-24">
            <h1 class="text-3xl lg:text-5xl font-bold text-academic-blue">Frequently Asked Questions</h1>
            <p class="text-lg text-muted mt-2">Find answers to common questions about our school</p>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="max-w-3xl mx-auto" x-data="faqSearch()">
                <div class="relative mb-6">
                    <svg class="w-5 h-5 text-muted absolute left-4 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" x-model="search" placeholder="Search FAQs..." class="w-full h-12 pl-12 pr-4 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow">
                </div>

                @if ($categories->count())
                    <div class="flex flex-wrap gap-2 mb-8">
                        <button @click="category = ''" :class="!category ? 'bg-academic-blue text-white' : 'bg-light-gray text-muted hover:bg-gray-200'" class="px-4 py-1.5 rounded-full text-sm font-medium transition-colors">All</button>
                        @foreach ($categories as $cat)
                            <button @click="category = '{{ $cat }}'" :class="category === '{{ $cat }}' ? 'bg-academic-blue text-white' : 'bg-light-gray text-muted hover:bg-gray-200'" class="px-4 py-1.5 rounded-full text-sm font-medium transition-colors">{{ $cat }}</button>
                        @endforeach
                    </div>
                @endif

                @if ($faqs->count())
                    <div class="space-y-3">
                        @foreach ($faqs as $faq)
                            <div
                                x-show="matches('{{ $faq->question }}', '{{ $faq->answer }}', '{{ $faq->category }}')"
                                class="bg-white border border-border rounded-2xl overflow-hidden"
                            >
                                <button
                                    @click="toggle({{ $faq->id }})"
                                    class="w-full flex items-center justify-between p-5 text-left hover:bg-light-gray/50 transition-colors"
                                >
                                    <span class="font-medium text-slate-dark pr-4">{{ $faq->question }}</span>
                                    <svg
                                        class="w-5 h-5 text-muted shrink-0 transition-transform duration-200"
                                        :class="{ 'rotate-180': open === {{ $faq->id }} }"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="open === {{ $faq->id }}" x-transition class="px-5 pb-5">
                                    <p class="text-muted text-sm leading-relaxed">{{ $faq->answer }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div x-show="filteredCount === 0" x-cloak class="mt-8">
                        <x-ui.empty-state title="No matching questions" description="Try a different search term or category." />
                    </div>
                @else
                    <x-ui.empty-state title="No FAQs yet" description="Frequently asked questions will be added soon." />
                @endif
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-24 bg-academic-blue">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 text-center">
            <h2 class="text-2xl lg:text-4xl font-bold text-white mb-3">Still have questions?</h2>
            <p class="text-white/80 mb-6">We're here to help. Reach out to us and we'll get back to you.</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center px-8 h-12 text-base font-medium text-academic-blue bg-white rounded-xl hover:bg-white/90 transition-colors">Contact Us</a>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('faqSearch', () => ({
            search: '',
            category: '',
            open: null,
            toggle(id) {
                this.open = this.open === id ? null : id;
            },
            matches(question, answer, cat) {
                const q = this.search.toLowerCase();
                const matchesSearch = !q || question.toLowerCase().includes(q) || answer.toLowerCase().includes(q);
                const matchesCategory = !this.category || cat === this.category;
                return matchesSearch && matchesCategory;
            },
            get filteredCount() {
                return document.querySelectorAll('[x-show^="matches("]:not([style*="display: none"])').length;
            }
        }));
    });
</script>
@endpush