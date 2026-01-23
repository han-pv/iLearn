<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::where("course_id", 8)
            ->paginate(15);

        $cources = Course::get();

        return view("students.index")->with([
            "students" => $students,
            "cources" => $cources,
        ]);
    }

    public function show($id)
    {
        $student = Student::where("id", $id)->first();

        return view("students.show")->with([
            "student" => $student
        ]);
    }
}
