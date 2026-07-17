@extends('layouts.public')

@php
    $crumbs = [['label' => 'Admissions', 'url' => null]];
@endphp

@section('title', 'Admissions')

@section('content')
    <section class="bg-light-gray border-b border-border">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-12 lg:py-24">
            <h1 class="text-3xl lg:text-5xl font-bold text-academic-blue">Admissions</h1>
            <p class="text-lg text-muted mt-2">Learn about our admission process and apply online</p>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div class="max-w-3xl mx-auto mb-16">
                <h2 class="text-2xl lg:text-3xl font-bold text-slate-dark mb-4">Admission Process</h2>
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-academic-blue text-white flex items-center justify-center font-bold shrink-0">1</div>
                        <div>
                            <h3 class="font-semibold text-slate-dark">Submit Inquiry</h3>
                            <p class="text-sm text-muted">Fill out the online inquiry form below with your child's details.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-academic-blue text-white flex items-center justify-center font-bold shrink-0">2</div>
                        <div>
                            <h3 class="font-semibold text-slate-dark">Document Verification</h3>
                            <p class="text-sm text-muted">Submit required documents for verification by our admissions team.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-academic-blue text-white flex items-center justify-center font-bold shrink-0">3</div>
                        <div>
                            <h3 class="font-semibold text-slate-dark">Interaction & Assessment</h3>
                            <p class="text-sm text-muted">Student and parent interaction with school faculty.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-academic-blue text-white flex items-center justify-center font-bold shrink-0">4</div>
                        <div>
                            <h3 class="font-semibold text-slate-dark">Confirmation & Fee Payment</h3>
                            <p class="text-sm text-muted">Receive admission confirmation and complete fee payment.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-16">
                <div class="bg-light-gray rounded-2xl p-6 lg:p-8">
                    <h3 class="font-semibold text-slate-dark mb-4">Required Documents</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-2 text-sm text-muted">
                            <svg class="w-4 h-4 text-success mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            Birth certificate (original + copy)
                        </li>
                        <li class="flex items-start gap-2 text-sm text-muted">
                            <svg class="w-4 h-4 text-success mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            Previous school report cards (last 2 years)
                        </li>
                        <li class="flex items-start gap-2 text-sm text-muted">
                            <svg class="w-4 h-4 text-success mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            Passport-sized photographs (4 copies)
                        </li>
                        <li class="flex items-start gap-2 text-sm text-muted">
                            <svg class="w-4 h-4 text-success mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            Parent/guardian ID proof
                        </li>
                        <li class="flex items-start gap-2 text-sm text-muted">
                            <svg class="w-4 h-4 text-success mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            Transfer certificate (if applicable)
                        </li>
                    </ul>
                </div>
                <div class="bg-light-gray rounded-2xl p-6 lg:p-8">
                    <h3 class="font-semibold text-slate-dark mb-4">Eligibility</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-2 text-sm text-muted">
                            <svg class="w-4 h-4 text-academic-blue mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            Age requirements per grade level apply
                        </li>
                        <li class="flex items-start gap-2 text-sm text-muted">
                            <svg class="w-4 h-4 text-academic-blue mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            Previous academic records required for grade 2+
                        </li>
                        <li class="flex items-start gap-2 text-sm text-muted">
                            <svg class="w-4 h-4 text-academic-blue mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            Admission subject to seat availability
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mb-16">
                <h2 class="text-2xl lg:text-3xl font-bold text-slate-dark mb-6 text-center">Submit an Inquiry</h2>
                <x-forms.inquiry-form />
            </div>
        </div>
    </section>
@endsection