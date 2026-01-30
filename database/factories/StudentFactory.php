<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $branch = Branch::inRandomOrder()->first();
        $classroom = Classroom::inRandomOrder()->first();
        $course = Course::inRandomOrder()->first();
        $teacher = Teacher::inRandomOrder()->first();
        $birth_date = fake()->date();
        return [
            "name" => fake()->firstName(),
            "lastname" => fake()->lastName(),
            "birth_date" => $birth_date,
            "age" => Carbon::parse($birth_date)->age,
            "phone" => fake()->numberBetween(61000000, 65999999),
            "parent_phone" => fake()->boolean(70) ? fake()->numberBetween(61000000, 65999999) : null,
            "gender" => fake()->randomElement(['male', 'female']),
            "address" => fake()->address(),
            "image" => null,
            "branch_id" => $branch->id,
            "teacher_id" => $teacher->id,
            "classroom_id" => $classroom->id,
            "course_id" => $course->id,

        ];
    }
}
