<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::latest()
            ->paginate(15)
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
            "image_path" => $imagePath ?? null,
        ]);

        return redirect()->route("teachers.index")->with("success", "Teacher created successfully.");
    }

    public function edit($id)
    {
        $teacher = Teacher::where("id", $id)->first();

        return view("teachers.edit")->with([
            "teacher" => $teacher
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            "first_name" => ["required", "string", "max:255"],
            "last_name" => ["required", "string", "max:255"],
            "email" => ["nullable", "email"],
            "address" => ["required", "string", "max:200"],
            "experience" => ["required", "string", "max:20"],
            "degree" => ["required", "string", "max:20"],
            "knowledge" => ["required", "string", "max:20"],
            "education" => ["required", "string", "max:20"],
            "image" => ["nullable", "mimes:jpeg,png,jpg,gif", "max:2048"], //2 MB
        ]);

        $teacher = Teacher::where('id', $id)->firstOrFail();

        if ($request->hasFile('image')) {
            if ($teacher->image_path) {
                Storage::disk('public')->delete($teacher->image_path);
            }
            $imagePath = $request->file('image')->store('images/teachers', 'public');
        }

        $teacher->update([
            "name" => $request->first_name,
            "lastname" => $request->last_name,
            "email" => $request->email,
            "address" => $request->address,
            "experience" => $request->experience,
            "degree" => $request->degree,
            "knowledge" => $request->knowledge,
            "education" => $request->education,
            "image_path" => $imagePath ?? $teacher->image_path,
        ]);

        return redirect()->route("teachers.index")->with("success", "Teacher updated successfully.");
    }
    

    public function destroy($id)
    {
        $teacher = Teacher::where('id', $id)->firstOrFail();

        if ($teacher->image_path) {
            Storage::disk('public')->delete($teacher->image_path);
        }
        
        $teacher->delete();

        return redirect()->route("teachers.index")->with("success", "Teacher deleted successfully.");
    }
}
