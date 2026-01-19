<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $branch = Branch::inRandomOrder()->first(); // 1-4
        return [
            "name" => fake()->numberBetween(100, 200),
            "capacity"=> fake()->numberBetween(15, 20),

            "branch_id" => $branch->id,
        ];
    }
}
