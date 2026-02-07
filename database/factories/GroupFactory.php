<?php

namespace Database\Factories;

use App\Models\Shift;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Season;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $season = Season::inRandomOrder()->first();
        $shift = Shift::inRandomOrder()->first();
        $branch = Branch::inRandomOrder()->first();
        $classroom = Classroom::inRandomOrder()->first();
        $course = Course::inRandomOrder()->first();
        $teacher = Teacher::inRandomOrder()->first();

        return [
            'season_id' => $season->id,
            'shift_id' => $shift->id,
            'branch_id' => $branch->id,
            'classroom_id' => $classroom->id,
            'course_id' => $course->id,
            'teacher_id' => $teacher->id,
            'name' => $course->name,
            'code' => strtoupper(fake()->lexify($course->name[0] . '-?')),
            'days' => fake()->randomElement([[1, 3, 5], [2, 4, 6]]),
            'description' => null,
        ];
    }
}
