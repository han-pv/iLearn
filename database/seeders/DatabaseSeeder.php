<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Group;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            BranchSeeder::class,
            SeasonSeeder::class,
            ShiftSeeder::class,
        ]);

        Classroom::factory(50)->create();

        $this->call([
            CourseSeeder::class
        ]);

        Teacher::factory(50)->create();
        Student::factory(200)->create();
        Group::factory(100)->create();
    }
}
