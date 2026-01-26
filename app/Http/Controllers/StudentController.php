<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            "courseId" => ["nullable", "integer", "exists:courses,id"],
        ]);

        $f_course_id = $request->courseId ? $request->courseId : null;

        $students = Student::when($f_course_id, function ($query) use ($f_course_id) {
            $query->where("course_id", $f_course_id);
        })
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
