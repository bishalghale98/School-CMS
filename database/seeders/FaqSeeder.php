<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'What are the school hours?',
                'answer' => 'School hours are from 8:00 AM to 2:00 PM, Sunday through Thursday. The office is open from 7:30 AM to 3:30 PM.',
                'category' => 'general',
                'sort_order' => 1,
                'is_published' => true,
            ],
            [
                'question' => 'What is the admission process?',
                'answer' => 'The admission process includes submitting an online inquiry, document verification, an entrance assessment, and a final interview with the principal.',
                'category' => 'admission',
                'sort_order' => 2,
                'is_published' => true,
            ],
            [
                'question' => 'What documents are required for admission?',
                'answer' => 'Required documents include birth certificate, previous school report cards (if applicable), passport-size photographs, parent/guardian national ID copies, and immunization records.',
                'category' => 'admission',
                'sort_order' => 3,
                'is_published' => true,
            ],
            [
                'question' => 'What is the student-teacher ratio?',
                'answer' => 'Our student-teacher ratio is approximately 20:1, ensuring personalized attention for every student.',
                'category' => 'academic',
                'sort_order' => 4,
                'is_published' => true,
            ],
            [
                'question' => 'Does the school provide transportation?',
                'answer' => 'Yes, we provide school bus service for students. Routes cover most areas within the city. Please contact the office for route availability.',
                'category' => 'facilities',
                'sort_order' => 5,
                'is_published' => true,
            ],
            [
                'question' => 'What extracurricular activities are available?',
                'answer' => 'We offer a wide range of extracurricular activities including sports, debate, music, art, robotics, drama, and community service programs.',
                'category' => 'academic',
                'sort_order' => 6,
                'is_published' => true,
            ],
            [
                'question' => 'How are parents informed about student progress?',
                'answer' => 'Parents receive regular progress reports, can access the online parent portal, and are invited to parent-teacher meetings held three times per academic year.',
                'category' => 'general',
                'sort_order' => 7,
                'is_published' => true,
            ],
            [
                'question' => 'What is the fee structure?',
                'answer' => 'Our fee structure varies by grade level. Please contact the admissions office or download the fee schedule from our Downloads page for detailed information.',
                'category' => 'admission',
                'sort_order' => 8,
                'is_published' => true,
            ],
            [
                'question' => 'Does the school have a uniform policy?',
                'answer' => 'Yes, all students are required to wear the school uniform. Uniform details and ordering information are provided at the time of admission.',
                'category' => 'general',
                'sort_order' => 9,
                'is_published' => true,
            ],
            [
                'question' => 'What is the school\'s academic calendar?',
                'answer' => 'The academic year runs from January to December, with three terms. The complete academic calendar is available on our Downloads page.',
                'category' => 'academic',
                'sort_order' => 10,
                'is_published' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::firstOrCreate(
                ['question' => $faq['question']],
                $faq
            );
        }
    }
}
