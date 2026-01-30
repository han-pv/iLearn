<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::get();

        return view('courses.index')->with([
            "courses" => $courses
        ]);
    }

    public function create()
    {
        return view("courses.create"); // Blade ugradyar
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => ["required", "string", "max:255"],
            "season" => ["required", "string", "max:255"],
            "description" => ["nullable", "string", "max:1025"],
        ]);

        Course::create([
            "name" => $request->name,
            "season" => $request->season,
            "start_date" => now()->format("Y-m-d"),
            "end_date" => now()->format("Y-m-d"),
            "description" => $request->description ? $request->description : null,
        ]);

        return to_route("courses.index")->with([
            "success" => "Ustunlikli course doredildi",
        ]);

    }
}
