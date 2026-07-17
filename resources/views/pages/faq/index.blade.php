@extends('layouts.public')

@php
    $crumbs = [['label' => 'FAQ', 'url' => null]];
@endphp

@section('title', 'Frequently Asked Questions')
@section('meta_description', 'Find answers to common questions about our school.')

@section('content')
    <section class="relative bg-gradient-to-br from-slate-dark via-slate-dark to-academic-blue/80 py-20 lg:py-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10"><div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 -translate-y-1/3"></div></div>
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 relative z-10">
            <span class="inline-block px-4 py-1 rounded-full bg-white/10 text-white/80 text-sm font-semibold mb-4">Help Center</span>
            <h1 class="text-4xl lg:text-6xl font-bold text-white mb-4">Frequently Asked Questions</h1>
            <p class="text-lg text-white/70 max-w-2xl">Find quick answers to the most common questions about our school, admissions, and programs.</p>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="max-w-3xl mx-auto" x-data="faqSearch()">
                {{-- Search --}}
                <div class="relative mb-6">
                    <svg class="w-5 h-5 text-muted absolute left-4 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    <input type="text" x-model="search" placeholder="Search for answers..." class="w-full h-12 pl-12 pr-4 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow">
                </div>

                {{-- Categories --}}
                @if ($categories->count())
                    <div class="flex flex-wrap gap-2 mb-8">
                        <button @click="category = ''" :class="!category ? 'bg-academic-blue text-white' : 'bg-light-gray text-muted hover:bg-gray-200'" class="px-4 py-1.5 rounded-full text-sm font-medium transition-colors">All Questions</button>
                        @foreach ($categories as $cat)
                            <button @click="category = '{{ $cat }}'" :class="category === '{{ $cat }}' ? 'bg-academic-blue text-white' : 'bg-light-gray text-muted hover:bg-gray-200'" class="px-4 py-1.5 rounded-full text-sm font-medium transition-colors">{{ $cat }}</button>
                        @endforeach
                    </div>
                @endif

                {{-- FAQ List --}}
                @if ($faqs->count())
                    <div class="space-y-3">
                        @foreach ($faqs as $faq)
                            <div
                                x-show="matches('{{ addslashes($faq->question) }}', '{{ addslashes($faq->answer) }}', '{{ addslashes($faq->category) }}')"
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
                                    ><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
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

    <section class="py-16 lg:py-20 bg-academic-blue">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 text-center">
            <h2 class="text-2xl lg:text-4xl font-bold text-white mb-3">Still Have Questions?</h2>
            <p class="text-white/80 mb-8 max-w-lg mx-auto">We're here to help. Reach out to us and our team will get back to you.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 h-13 text-base font-semibold text-academic-blue bg-white rounded-xl hover:bg-white/90 transition-all">
                    Contact Us
                </a>
                <a href="tel:{{ school_setting('school_phone', '+15551234567') }}" class="inline-flex items-center gap-2 px-8 h-13 text-base font-semibold text-white border-2 border-white/30 rounded-xl hover:bg-white/10 transition-all">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                    Call Us
                </a>
            </div>
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
