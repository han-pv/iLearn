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
            "ageFrom" => ["nullable", "integer"],
            "ageTo" => ["nullable", "integer"],
        ]);

        $f_course_id = $request->courseId ? $request->courseId : null;
        $f_age_from = $request->ageFrom ? $request->ageFrom : 0;
        $f_age_to = $request->ageTo ? $request->ageTo : 0;

        $students = Student::when($f_course_id, function ($query) use ($f_course_id) {
            return $query->where("course_id", $f_course_id);

        })
        ->when($f_age_from > 0, function ($query) use ($f_age_from) {
            return $query->where("age", ">=",$f_age_from);
        })
        ->when($f_age_to > 0, function ($query) use ($f_age_to) {
            return $query->where("age", "<=",$f_age_to);
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
