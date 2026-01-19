<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Phone;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Database\Factories\StudentFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([BranchSeeder::class]);

        Teacher::factory(50)->create();

         $this->call([CourseSeeder::class]);

         Classroom::factory(50)->create();

         Student::factory(2000)->create();
    }
}
