<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            "Beginner",
            "Elemantary",
            "Math-1",
            "Math-2",
            "Programming (Basics)",
            "Web design",
            "Web programming",
            "Backend programming",
        ];

        foreach ($courses as $course) {
            Course::create([
                "name" => $course,
                "season" => 'Winter 2026',
                "start_date" => now(),
                "end_date" => now()->addMonths(3),
                "description" => null,
            ]);
        }
    }
}
