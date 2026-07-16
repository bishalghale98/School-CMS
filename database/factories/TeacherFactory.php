<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'position' => fake()->randomElement(['Senior Teacher', 'Assistant Teacher', 'Lecturer', 'Associate Professor']),
            'department' => fake()->randomElement(['Mathematics', 'Science', 'English', 'Bengali', 'Social Studies', 'ICT']),
            'qualification' => fake()->randomElement(['M.Sc.', 'M.A.', 'B.Ed.', 'M.Ed.', 'Ph.D.']),
            'experience' => fake()->randomElement(['5 years', '8 years', '10 years', '15 years', '20 years']),
            'biography' => fake()->paragraph(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'sort_order' => fake()->numberBetween(1, 100),
            'is_published' => true,
        ];
    }
}
