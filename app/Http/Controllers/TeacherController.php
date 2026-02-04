<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::paginate(15)
            ->withQueryString();

        return view("teachers.index")->with([
            "teachers" => $teachers,
        ]);
    }

    public function show($id)
    {
        $teacher = Teacher::where("id", $id)->first();

        return view("teachers.show")->with([
            "teacher" => $teacher
        ]);
    }
}
