<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'school_name', 'value' => 'School CMS', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_tagline', 'value' => 'Empowering Future Leaders', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_address', 'value' => '123 Education Street, City', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_phone', 'value' => '+880-2-1234567', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_email', 'value' => 'info@schoolcms.test', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_established_year', 'value' => '2000', 'group' => 'general', 'type' => 'text'],
            ['key' => 'principal_name', 'value' => 'Dr. John Doe', 'group' => 'general', 'type' => 'text'],
            ['key' => 'principal_message', 'value' => 'Welcome to our school, where we nurture young minds...', 'group' => 'general', 'type' => 'textarea'],
            ['key' => 'student_count', 'value' => '1200', 'group' => 'stats', 'type' => 'text'],
            ['key' => 'teacher_count', 'value' => '75', 'group' => 'stats', 'type' => 'text'],
            ['key' => 'staff_count', 'value' => '30', 'group' => 'stats', 'type' => 'text'],
            ['key' => 'program_count', 'value' => '5', 'group' => 'stats', 'type' => 'text'],
            ['key' => 'seo_title', 'value' => 'School CMS | Empowering Future Leaders', 'group' => 'seo', 'type' => 'text'],
            ['key' => 'seo_description', 'value' => 'A modern school management system building bright futures through quality education.', 'group' => 'seo', 'type' => 'textarea'],
            ['key' => 'social_facebook', 'value' => '#', 'group' => 'social', 'type' => 'text'],
            ['key' => 'social_youtube', 'value' => '#', 'group' => 'social', 'type' => 'text'],
            ['key' => 'social_instagram', 'value' => '#', 'group' => 'social', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
