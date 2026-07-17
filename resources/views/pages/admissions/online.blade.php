@extends('layouts.public')

@php
    $crumbs = [['label' => 'Admissions', 'url' => null]];
@endphp

@section('title', 'Admissions')
@section('meta_description', 'Apply online for admission to our school. Simple process, quick response.')

@section('content')
    {{-- HERO --}}
    <section class="relative bg-gradient-to-br from-slate-dark via-slate-dark to-academic-blue/80 py-20 lg:py-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10"><div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 -translate-y-1/3"></div></div>
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 relative z-10">
            <span class="inline-block px-4 py-1 rounded-full bg-white/10 text-white/80 text-sm font-semibold mb-4">{{ $settings['hero_badge'] }}</span>
            <h1 class="text-4xl lg:text-6xl font-bold text-white mb-4">{{ $settings['hero_title'] }}</h1>
            <p class="text-lg text-white/70 max-w-2xl">{{ $settings['hero_subtitle'] }}</p>
        </div>
    </section>

    {{-- HOW IT WORKS --}}
    <section class="py-12 lg:py-16 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="text-center mb-10">
                <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-3">Process</span>
                <h2 class="text-2xl lg:text-3xl font-bold text-slate-dark">{{ $settings['process_heading'] }}</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-4xl mx-auto">
                @php
                    $steps = [
                        ['num' => '01', 'title' => $settings['process_step_1_title'], 'desc' => $settings['process_step_1_desc']],
                        ['num' => '02', 'title' => $settings['process_step_2_title'], 'desc' => $settings['process_step_2_desc']],
                        ['num' => '03', 'title' => $settings['process_step_3_title'], 'desc' => $settings['process_step_3_desc']],
                        ['num' => '04', 'title' => $settings['process_step_4_title'], 'desc' => $settings['process_step_4_desc']],
                    ];
                @endphp
                @foreach ($steps as $step)
                    <div class="text-center p-4">
                        <div class="w-12 h-12 rounded-2xl bg-academic-blue text-white flex items-center justify-center mx-auto mb-3 text-sm font-bold">{{ $step['num'] }}</div>
                        <h3 class="font-bold text-sm text-slate-dark mb-1">{{ $step['title'] }}</h3>
                        <p class="text-xs text-muted leading-relaxed">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ADMISSION FORM --}}
    <section class="py-12 lg:py-24 bg-light-gray" id="apply">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-10">
                    <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-3">Apply</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-dark">Admission Inquiry Form</h2>
                    <p class="text-muted mt-3">Fields marked with * are required. Our team will contact you after submission.</p>
                </div>

                <div class="bg-white rounded-3xl p-8 lg:p-10 border border-border shadow-sm" x-data="admissionForm()">
                    <form @submit.prevent="submit" class="space-y-5">
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-slate-dark mb-1">Student Name *</label>
                                <input type="text" x-model="form.student_name" class="w-full h-11 px-4 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow" placeholder="Enter student's full name">
                                <template x-if="errors.student_name"><p class="text-xs text-danger mt-1" x-text="errors.student_name[0]"></p></template>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-dark mb-1">Applying for Class *</label>
                                <select x-model="form.applying_class" class="w-full h-11 px-4 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow">
                                    <option value="">Select Class</option>
                                    <option value="Nursery">Nursery</option>
                                    <option value="LKG">LKG</option>
                                    <option value="UKG">UKG</option>
                                    <option value="1">Class 1</option>
                                    <option value="2">Class 2</option>
                                    <option value="3">Class 3</option>
                                    <option value="4">Class 4</option>
                                    <option value="5">Class 5</option>
                                    <option value="6">Class 6</option>
                                    <option value="7">Class 7</option>
                                    <option value="8">Class 8</option>
                                    <option value="9">Class 9</option>
                                    <option value="10">Class 10</option>
                                    <option value="11">Class 11</option>
                                    <option value="12">Class 12</option>
                                </select>
                                <template x-if="errors.applying_class"><p class="text-xs text-danger mt-1" x-text="errors.applying_class[0]"></p></template>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-slate-dark mb-1">Parent/Guardian Name *</label>
                                <input type="text" x-model="form.parent_name" class="w-full h-11 px-4 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow" placeholder="Enter parent's name">
                                <template x-if="errors.parent_name"><p class="text-xs text-danger mt-1" x-text="errors.parent_name[0]"></p></template>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-dark mb-1">Mobile Number *</label>
                                <input type="tel" x-model="form.mobile" class="w-full h-11 px-4 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow" placeholder="Enter mobile number">
                                <template x-if="errors.mobile"><p class="text-xs text-danger mt-1" x-text="errors.mobile[0]"></p></template>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-slate-dark mb-1">Email Address *</label>
                                <input type="email" x-model="form.email" class="w-full h-11 px-4 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow" placeholder="Enter email address">
                                <template x-if="errors.email"><p class="text-xs text-danger mt-1" x-text="errors.email[0]"></p></template>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-dark mb-1">Previous School</label>
                                <input type="text" x-model="form.previous_school" class="w-full h-11 px-4 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow" placeholder="Enter previous school name">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-dark mb-1">Address</label>
                            <input type="text" x-model="form.address" class="w-full h-11 px-4 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow" placeholder="Enter residential address">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-dark mb-1">Additional Message</label>
                            <textarea x-model="form.message" rows="4" class="w-full px-4 py-3 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow resize-none" placeholder="Any specific questions or requirements?"></textarea>
                        </div>

                        <template x-if="errors._"><p class="text-sm text-danger" x-text="errors._[0]"></p></template>

                        <button type="submit" :disabled="submitting" class="w-full h-12 rounded-xl bg-academic-blue text-white text-sm font-semibold hover:bg-academic-blue-light transition-all disabled:opacity-50 flex items-center justify-center gap-2" x-text="submitting ? 'Submitting...' : 'Submit Inquiry'"></button>
                    </form>

                    <div x-show="success" x-transition class="mt-6 p-6 rounded-2xl bg-success/10 border border-success/20 text-center">
                        <svg class="w-12 h-12 text-success mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <h3 class="font-bold text-slate-dark mb-1">Inquiry Submitted Successfully!</h3>
                        <p class="text-sm text-muted">Thank you for your interest. Our admissions team will contact you within 2-3 business days.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- REQUIRED DOCUMENTS & ELIGIBILITY --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-light-gray rounded-2xl p-8 border border-border">
                    <div class="w-12 h-12 rounded-xl bg-academic-blue/10 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-dark mb-5">{{ $settings['documents_title'] }}</h3>
                    <ul class="space-y-3">
                        @foreach (explode("\n", $settings['documents_list']) as $doc)
                            <li class="flex items-start gap-3 text-sm text-muted">
                                <svg class="w-4 h-4 text-success mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                {{ trim($doc) }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="bg-light-gray rounded-2xl p-8 border border-border">
                    <div class="w-12 h-12 rounded-xl bg-gold/10 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-dark mb-5">{{ $settings['eligibility_title'] }}</h3>
                    <ul class="space-y-3">
                        @foreach (explode("\n", $settings['eligibility_list']) as $item)
                            <li class="flex items-start gap-3 text-sm text-muted">
                                <svg class="w-4 h-4 text-academic-blue mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                {{ trim($item) }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- WHAT HAPPENS NEXT --}}
    <section class="py-16 lg:py-24 bg-light-gray">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-10">
                    <span class="inline-block px-4 py-1 rounded-full bg-gold/10 text-gold text-sm font-semibold mb-3">Next Steps</span>
                    <h2 class="text-2xl lg:text-3xl font-bold text-slate-dark">What Happens After You Apply?</h2>
                </div>
                <div class="space-y-4">
                    @php
                        $nextSteps = [
                            ['title' => 'Inquiry Received', 'desc' => 'Our system confirms receipt of your inquiry immediately.', 'time' => 'Immediate'],
                            ['title' => 'Admissions Team Contact', 'desc' => 'A member of our team calls you to discuss next steps.', 'time' => '2-3 Business Days'],
                            ['title' => 'Document Submission', 'desc' => 'Submit required documents for verification.', 'time' => 'During Visit'],
                            ['title' => 'Campus Visit & Assessment', 'desc' => 'Schedule a visit for student interaction and assessment.', 'time' => 'Scheduled'],
                            ['title' => 'Admission Confirmation', 'desc' => 'Receive confirmation and complete fee payment.', 'time' => 'After Assessment'],
                        ];
                    @endphp
                    @foreach ($nextSteps as $step)
                        <div class="flex items-start gap-4 bg-white rounded-2xl p-5 border border-border">
                            <div class="w-10 h-10 rounded-xl bg-academic-blue/10 flex items-center justify-center shrink-0">
                                <span class="text-sm font-bold text-academic-blue">{{ $loop->iteration }}</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-slate-dark text-sm">{{ $step['title'] }}</h3>
                                <p class="text-xs text-muted mt-0.5">{{ $step['desc'] }}</p>
                            </div>
                            <span class="text-[10px] text-muted bg-light-gray px-2.5 py-1 rounded-full shrink-0 hidden sm:block">{{ $step['time'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    @if ($faqs->count())
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-10">
                    <h2 class="text-2xl lg:text-3xl font-bold text-slate-dark">Frequently Asked Questions</h2>
                </div>
                <div x-data="{ open: null }" class="space-y-3">
                    @foreach ($faqs as $i => $faq)
                        <div class="bg-light-gray border border-border rounded-2xl overflow-hidden">
                            <button @click="open = open === {{ $i }} ? null : {{ $i }}" class="w-full flex items-center justify-between p-5 text-left hover:bg-white/50 transition-colors">
                                <span class="font-medium text-slate-dark pr-4">{{ $faq->question }}</span>
                                <svg class="w-5 h-5 text-muted shrink-0 transition-transform duration-200" :class="open === {{ $i }} ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                            </button>
                            <div x-show="open === {{ $i }}" x-transition class="px-5 pb-5">
                                <p class="text-muted text-sm leading-relaxed">{{ $faq->answer }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- CONTACT --}}
    <section class="py-16 lg:py-20 bg-academic-blue">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 text-center">
            <h2 class="text-2xl lg:text-4xl font-bold text-white mb-4">{{ $settings['cta_heading'] }}</h2>
            <p class="text-white/80 mb-8 max-w-lg mx-auto">{{ $settings['cta_text'] }}</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="tel:{{ school_setting('school_phone', '+15551234567') }}" class="inline-flex items-center gap-2 px-8 h-13 text-base font-semibold text-academic-blue bg-white rounded-xl hover:bg-white/90 transition-all">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                    Call Admissions
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 h-13 text-base font-semibold text-white border-2 border-white/30 rounded-xl hover:bg-white/10 transition-all">
                    Contact Form
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('admissionForm', () => ({
            form: {
                student_name: '', applying_class: '', parent_name: '',
                mobile: '', email: '', previous_school: '', address: '', message: ''
            },
            errors: {},
            submitting: false,
            success: false,
            async submit() {
                this.submitting = true;
                this.errors = {};
                this.success = false;
                try {
                    const response = await fetch('{{ route('online-admission.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify(this.form),
                    });
                    if (response.ok) {
                        this.success = true;
                        this.form = {
                            student_name: '', applying_class: '', parent_name: '',
                            mobile: '', email: '', previous_school: '', address: '', message: ''
                        };
                    } else {
                        const data = await response.json();
                        this.errors = data.errors || {};
                    }
                } catch (e) {
                    this.errors = { _: ['An unexpected error occurred. Please try again.'] };
                } finally {
                    this.submitting = false;
                }
            },
        }));
    });
</script>
@endpush
