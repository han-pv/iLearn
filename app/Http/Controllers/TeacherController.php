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

    public function create()
    {
        return view("teachers.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "first_name" => ["required", "string", "max:255"],
            "last_name" => ["required", "string", "max:255"],
            "email" => ["nullable", "email", "unique:teachers,email"],
            "phone" => ["required", "string", "max:20"],
            "address" => ["required", "string", "max:200"],
            "experience" => ["required", "string", "max:20"],
            "degree" => ["required", "string", "max:20"],
            "knowledge" => ["required", "string", "max:20"],
            "education" => ["required", "string", "max:20"],
            "bio" => ["nullable", "string", "max:20"],
            "salary" => ["nullable", "string", "max:20"],
            "image" => ["nullable", "mimes:jpeg,png,jpg,gif", "max:2048"], //2 MB
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/teachers', 'public');
        }

        Teacher::create([
            "name" => $request->first_name,
            "lastname" => $request->last_name,
            "email" => $request->email,
            "address" => $request->address,
            "experience" => $request->experience,
            "degree" => $request->degree,
            "knowledge" => $request->knowledge,
            "education" => $request->education,
            "bio" => $request->bio,
            "salary" => $request->salary ?? null,
            "image" => $imagePath ?? null,
        ]);

        return redirect()->route("teachers.index")->with("success", "Teacher created successfully.");
    }
}
