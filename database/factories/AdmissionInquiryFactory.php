<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\AdmissionInquiry;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdmissionInquiryFactory extends Factory
{
    protected $model = AdmissionInquiry::class;

    public function definition(): array
    {
        return [
            'student_name' => fake()->name(),
            'applying_class' => fake()->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']),
            'parent_name' => fake()->name('male'),
            'mobile' => fake()->phoneNumber(),
            'email' => fake()->optional()->safeEmail(),
            'address' => fake()->address(),
            'previous_school' => fake()->optional()->company(),
            'message' => fake()->optional()->paragraph(),
            'status' => 'new',
            'notes' => null,
        ];
    }

    public function contacted(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'contacted',
            'notes' => 'Contacted parent via phone.',
        ]);
    }

    public function closed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'closed',
            'notes' => 'Inquiry resolved.',
        ]);
    }
}
