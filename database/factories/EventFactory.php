<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraphs(2, true),
            'venue' => fake()->address(),
            'event_date' => fake()->dateTimeBetween('now', '+3 months'),
            'start_time' => '09:00:00',
            'end_time' => '12:00:00',
            'status' => 'upcoming',
        ];
    }

    public function completed(): static
    {
        return $this->state(fn (array $attributes) => [
            'event_date' => fake()->dateTimeBetween('-3 months', '-1 day'),
            'status' => 'completed',
        ]);
    }

    public function cancelled(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'cancelled',
        ]);
    }
}
