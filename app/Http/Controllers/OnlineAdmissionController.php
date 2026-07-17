<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Admission\ProcessInquiryAction;
use App\Http\Requests\InquiryRequest;
use App\Models\Faq;

class OnlineAdmissionController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('is_published', true)
            ->where('category', 'Admission')
            ->orderBy('sort_order')
            ->take(6)
            ->get();

        $settings = [
            'hero_badge' => school_setting('admission_hero_badge', 'Join Us'),
            'hero_title' => school_setting('admission_hero_title', 'Online Admission'),
            'hero_subtitle' => school_setting('admission_hero_subtitle', 'Begin your child\'s journey with us. Our admission process is simple, transparent, and designed for your convenience.'),
            'process_heading' => school_setting('admission_process_heading', 'How It Works'),
            'process_step_1_title' => school_setting('admission_process_step_1_title', 'Fill the Form'),
            'process_step_1_desc' => school_setting('admission_process_step_1_desc', 'Complete the online inquiry form with your details.'),
            'process_step_2_title' => school_setting('admission_process_step_2_title', 'We Contact You'),
            'process_step_2_desc' => school_setting('admission_process_step_2_desc', 'Our admissions team reaches out within 2-3 days.'),
            'process_step_3_title' => school_setting('admission_process_step_3_title', 'Campus Visit'),
            'process_step_3_desc' => school_setting('admission_process_step_3_desc', 'Visit the campus, meet faculty, student assessment.'),
            'process_step_4_title' => school_setting('admission_process_step_4_title', 'Confirm Admission'),
            'process_step_4_desc' => school_setting('admission_process_step_4_desc', 'Submit documents and complete fee payment.'),
            'documents_title' => school_setting('admission_documents_title', 'Required Documents'),
            'documents_list' => school_setting('admission_documents_list', "Birth certificate (original + copy)\nPrevious school report cards (last 2 years)\nPassport-sized photographs (4 copies)\nParent/guardian ID proof\nTransfer certificate (if applicable)"),
            'eligibility_title' => school_setting('admission_eligibility_title', 'Eligibility'),
            'eligibility_list' => school_setting('admission_eligibility_list', "Age requirements per grade level apply\nPrevious academic records required for grade 2+\nAdmission subject to seat availability\nAll students must complete the assessment round\nFinal admission at the discretion of the school"),
            'cta_heading' => school_setting('admission_cta_heading', 'Need Help?'),
            'cta_text' => school_setting('admission_cta_text', 'Our admissions team is ready to assist you.'),
        ];

        return view('pages.admissions.online', compact('faqs', 'settings'));
    }

    public function store(InquiryRequest $request, ProcessInquiryAction $action)
    {
        $inquiry = $action->execute($request->validated());

        return response()->json([
            'message' => 'Your admission inquiry has been submitted successfully. Our admissions team will contact you within 2-3 business days.',
            'inquiry' => $inquiry,
        ], 201);
    }
}
