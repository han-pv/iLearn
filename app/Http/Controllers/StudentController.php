<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            "branchId" => ["nullable", "integer", "exists:branches,id"],
            "courseId" => ["nullable", "integer", "exists:courses,id"],
            "teacherId" => ["nullable", "integer", "exists:teachers,id"],
            "classroomId" => ["nullable", "integer", "exists:classrooms,id"],
            "ageFrom" => ["nullable", "integer"],
            "ageTo" => ["nullable", "integer"],
        ]);

        $f_course_id = $request->courseId ? $request->courseId : null;
        $f_teacher_id = $request->teacherId ? $request->teacherId : null;
        $f_classroom_id = $request->classroomId ? $request->classroomId : null;
        $f_branch_id = $request->branchId ? $request->branchId : null;
        $f_age_from = $request->ageFrom ? $request->ageFrom : 0;
        $f_age_to = $request->ageTo ? $request->ageTo : 0;

        $students = Student::when($f_branch_id, function ($query) use ($f_branch_id) {
                return $query->where("branch_id", $f_branch_id);
            })
            ->when($f_course_id, function ($query) use ($f_course_id) {
                return $query->where("course_id", $f_course_id);
            })
            ->when($f_teacher_id, function ($query) use ($f_teacher_id) {
                return $query->where("teacher_id", $f_teacher_id);
            })
            ->when($f_classroom_id, function ($query) use ($f_classroom_id) {
                return $query->where("classroom_id", $f_classroom_id);
            })
            ->when($f_age_from > 0, function ($query) use ($f_age_from) {
                return $query->where("age", ">=", $f_age_from);
            })
            ->when($f_age_to > 0, function ($query) use ($f_age_to) {
                return $query->where("age", "<=", $f_age_to);
            })
            ->paginate(15)
            ->withQueryString();  // Onki query soraglar galar yaly

        $branches = Branch::get();
        $cources = Course::get();
        $teachers = Teacher::get();
        $classrooms = Classroom::get();

        return view("students.index")->with([
            "students" => $students,
            "branches" => $branches,
            "cources" => $cources,
            "teachers" => $teachers,
            "classrooms" => $classrooms,
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
