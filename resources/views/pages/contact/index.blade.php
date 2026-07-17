@extends('layouts.public')

@php
    $crumbs = [['label' => 'Contact', 'url' => null]];
@endphp

@section('title', 'Contact Us')
@section('meta_description', 'Get in touch with us. We\'d love to hear from you.')

@section('content')
    <section class="relative bg-gradient-to-br from-slate-dark via-slate-dark to-academic-blue/80 py-20 lg:py-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10"><div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 -translate-y-1/3"></div></div>
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 relative z-10">
            <span class="inline-block px-4 py-1 rounded-full bg-white/10 text-white/80 text-sm font-semibold mb-4">Reach Out</span>
            <h1 class="text-4xl lg:text-6xl font-bold text-white mb-4">Contact Us</h1>
            <p class="text-lg text-white/70 max-w-2xl">We're here to help. Get in touch with us for any queries about admissions, academics, or general information.</p>
        </div>
    </section>

    {{-- Contact Info Cards --}}
    <section class="py-12 lg:py-16 bg-white">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="bg-light-gray rounded-2xl p-6 text-center border border-border hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 rounded-xl bg-academic-blue/10 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </div>
                    <h3 class="font-bold text-slate-dark mb-1 text-sm">Visit Us</h3>
                    <p class="text-xs text-muted">{{ school_setting('school_address', '123 School Street, City, State') }}</p>
                </div>
                <div class="bg-light-gray rounded-2xl p-6 text-center border border-border hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 rounded-xl bg-academic-blue/10 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                    </div>
                    <h3 class="font-bold text-slate-dark mb-1 text-sm">Call Us</h3>
                    <p class="text-xs text-muted">{{ school_setting('school_phone', '+1 (555) 123-4567') }}</p>
                </div>
                <div class="bg-light-gray rounded-2xl p-6 text-center border border-border hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 rounded-xl bg-academic-blue/10 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    </div>
                    <h3 class="font-bold text-slate-dark mb-1 text-sm">Email Us</h3>
                    <p class="text-xs text-muted">{{ school_setting('school_email', 'info@schoolcms.test') }}</p>
                </div>
                <div class="bg-light-gray rounded-2xl p-6 text-center border border-border hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 rounded-xl bg-academic-blue/10 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-academic-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h3 class="font-bold text-slate-dark mb-1 text-sm">Office Hours</h3>
                    <p class="text-xs text-muted">Mon - Sat: 8:00 AM - 4:00 PM</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Map & Form --}}
    <section class="py-12 lg:py-24 bg-light-gray">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="grid lg:grid-cols-2 gap-12">
                {{-- Contact Form --}}
                <div>
                    <span class="inline-block px-4 py-1 rounded-full bg-academic-blue/5 text-academic-blue text-sm font-semibold mb-4">Message</span>
                    <h2 class="text-2xl lg:text-3xl font-bold text-slate-dark mb-6">Send Us a Message</h2>
                    <div x-data="contactForm()">
                        <form @submit.prevent="submit" class="space-y-4">
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-dark mb-1">Name *</label>
                                    <input type="text" x-model="form.name" class="w-full h-11 px-4 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow">
                                    <template x-if="errors.name"><p class="text-xs text-danger mt-1" x-text="errors.name[0]"></p></template>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-dark mb-1">Email *</label>
                                    <input type="email" x-model="form.email" class="w-full h-11 px-4 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow">
                                    <template x-if="errors.email"><p class="text-xs text-danger mt-1" x-text="errors.email[0]"></p></template>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-dark mb-1">Phone</label>
                                <input type="text" x-model="form.phone" class="w-full h-11 px-4 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-dark mb-1">Message *</label>
                                <textarea x-model="form.message" rows="5" class="w-full px-4 py-3 rounded-xl border border-border bg-white text-sm outline-none focus:ring-2 focus:ring-academic-blue/20 focus:border-academic-blue transition-shadow resize-none"></textarea>
                                <template x-if="errors.message"><p class="text-xs text-danger mt-1" x-text="errors.message[0]"></p></template>
                            </div>
                            <template x-if="errors._"><p class="text-sm text-danger" x-text="errors._[0]"></p></template>
                            <button type="submit" :disabled="submitting" class="h-11 px-8 rounded-xl bg-academic-blue text-white text-sm font-medium hover:bg-academic-blue/90 transition-colors disabled:opacity-50" x-text="submitting ? 'Sending...' : 'Send Message'"></button>
                        </form>
                        <div x-show="success" x-transition class="mt-4 p-4 rounded-xl bg-success/10 text-success text-sm">
                            Thank you for your message. We will get back to you soon.
                        </div>
                    </div>
                </div>

                {{-- Map & Office Hours --}}
                <div>
                    <span class="inline-block px-4 py-1 rounded-full bg-gold/10 text-gold text-sm font-semibold mb-4">Location</span>
                    <h2 class="text-2xl lg:text-3xl font-bold text-slate-dark mb-6">Find Us</h2>
                    <div class="aspect-[16/9] rounded-2xl overflow-hidden bg-white border border-border mb-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2825.123456789!2d85.123456789!3d27.123456789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjfCsDA3JzI0LjAiTiA4NcKwMDcnMjQuMCJF!5e0!3m2!1sen!2snp!4v1" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    {{-- Departments Contact --}}
                    <div class="bg-white rounded-2xl p-6 border border-border">
                        <h3 class="font-bold text-slate-dark mb-4">Departments</h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-muted">Admissions Office</span>
                                <span class="text-slate-dark font-medium">{{ school_setting('school_phone', '+1 (555) 123-4567') }}</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-muted">Academic Office</span>
                                <span class="text-slate-dark font-medium">{{ school_setting('school_phone', '+1 (555) 123-4567') }}</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-muted">Transport</span>
                                <span class="text-slate-dark font-medium">{{ school_setting('school_phone', '+1 (555) 123-4567') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Emergency Contact --}}
    <section class="py-8 bg-danger/5 border-t border-danger/10">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 text-center sm:text-left">
                <div class="flex items-center gap-2 text-danger font-semibold text-sm">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                    Emergency Contact:
                </div>
                <a href="tel:{{ school_setting('school_phone', '+15551234567') }}" class="text-sm text-slate-dark font-medium hover:text-academic-blue transition-colors">{{ school_setting('school_phone', '+1 (555) 123-4567') }}</a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('contactForm', () => ({
            form: { name: '', email: '', phone: '', message: '' },
            errors: {},
            submitting: false,
            success: false,
            async submit() {
                this.submitting = true;
                this.errors = {};
                this.success = false;
                try {
                    const response = await fetch('{{ route('contact.store') }}', {
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
                        this.form = { name: '', email: '', phone: '', message: '' };
                    } else {
                        const data = await response.json();
                        this.errors = data.errors || {};
                    }
                } catch (e) {
                    this.errors = { _: ['An unexpected error occurred.'] };
                } finally {
                    this.submitting = false;
                }
            },
        }));
    });
</script>
@endpush
