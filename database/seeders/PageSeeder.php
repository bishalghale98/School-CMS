<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'title' => 'About Us',
                'slug' => 'about-us',
                'content' => '<h2>Our History</h2><p>Our school has a rich history of providing quality education...</p><h2>Our Mission</h2><p>To provide accessible, quality education that develops the whole child...</p><h2>Our Vision</h2><p>To be a leading educational institution that produces responsible global citizens...</p>',
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Vision & Mission',
                'slug' => 'vision-mission',
                'content' => '<h2>Our Vision</h2><p>To be a premier educational institution that nurtures academic excellence, character development, and global citizenship.</p><h2>Our Mission</h2><p>To provide a holistic education that empowers students to reach their full potential through innovative teaching, diverse opportunities, and a supportive community.</p>',
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'School History',
                'slug' => 'school-history',
                'content' => '<p>Founded in 2000, our school has grown from a small institution to a comprehensive educational facility serving over 1,200 students...</p>',
                'is_published' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Principal\'s Message',
                'slug' => 'principals-message',
                'content' => '<p>Welcome to our school community...</p>',
                'is_published' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Chairman\'s Message',
                'slug' => 'chairmans-message',
                'content' => '<p>It is my privilege to welcome you to our institution...</p>',
                'is_published' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'School Committee',
                'slug' => 'school-committee',
                'content' => '<p>Our school is guided by a dedicated committee...</p>',
                'is_published' => true,
                'sort_order' => 6,
            ],
            [
                'title' => 'Organizational Structure',
                'slug' => 'organizational-structure',
                'content' => '<p>The school is organized into the following departments...</p>',
                'is_published' => true,
                'sort_order' => 7,
            ],
            [
                'title' => 'Academic Programs',
                'slug' => 'academic-programs',
                'content' => '<h2>Our Programs</h2><p>We offer a comprehensive range of academic programs...</p>',
                'is_published' => true,
                'sort_order' => 8,
            ],
            [
                'title' => 'Admissions',
                'slug' => 'admissions',
                'content' => '<h2>Admission Process</h2><p>Welcome to our admissions page...</p>',
                'is_published' => true,
                'sort_order' => 9,
            ],
            [
                'title' => 'Contact Us',
                'slug' => 'contact-us',
                'content' => '<h2>Get in Touch</h2><p>We would love to hear from you...</p>',
                'is_published' => true,
                'sort_order' => 10,
            ],
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'content' => '<h2>Privacy Policy</h2><p>This privacy policy outlines how we collect and use information...</p>',
                'is_published' => true,
                'sort_order' => 11,
            ],
            [
                'title' => 'Terms of Service',
                'slug' => 'terms-of-service',
                'content' => '<h2>Terms of Service</h2><p>By using this website, you agree to the following terms...</p>',
                'is_published' => true,
                'sort_order' => 12,
            ],
        ];

        foreach ($pages as $page) {
            Page::firstOrCreate(
                ['slug' => $page['slug']],
                $page
            );
        }
    }
}
