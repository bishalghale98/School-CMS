<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\NoticeCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoticeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'content' => fake()->paragraphs(3, true),
            'excerpt' => fake()->paragraph(),
            'notice_category_id' => NoticeCategory::factory(),
            'status' => 'draft',
            'is_pinned' => false,
            'published_at' => null,
        ];
    }

    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'published',
            'published_at' => fake()->dateTimeBetween('-1 month'),
        ]);
    }

    public function pinned(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_pinned' => true,
        ]);
    }
}
