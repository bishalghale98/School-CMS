<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\NoticeCategory;
use Illuminate\Database\Seeder;

class NoticeCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Academic', 'slug' => 'academic', 'description' => 'Academic notices and circulars', 'sort_order' => 1],
            ['name' => 'Administrative', 'slug' => 'administrative', 'description' => 'Administrative announcements', 'sort_order' => 2],
            ['name' => 'Exam', 'slug' => 'exam', 'description' => 'Examination schedules and results', 'sort_order' => 3],
            ['name' => 'Holiday', 'slug' => 'holiday', 'description' => 'Holiday notices and calendar updates', 'sort_order' => 4],
            ['name' => 'Event', 'slug' => 'event', 'description' => 'School event announcements', 'sort_order' => 5],
            ['name' => 'General', 'slug' => 'general', 'description' => 'General notices', 'sort_order' => 6],
        ];

        foreach ($categories as $category) {
            NoticeCategory::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
