<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->firstName(), 
            "lastname" => fake()->lastName(),
            "email" => fake()->unique()->safeEmail(),
            "address" => fake()->address(),
            "experience" => fake()->numberBetween(0, 20),
            "degree" => fake()->randomElement(['Bachelor', "Master"]),
            "knowledge" => fake()->randomElement(["English", "Russian", "Math", "Computer Science"]),
            "education" => fake()->randomElement(["TDU","MIT"]),
        ];
    }
}
