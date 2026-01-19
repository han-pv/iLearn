<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $courses = ["Beginner", "Intermediate", "Advanced"];
        $courses = Course::get();

        return view("home")->with([
            'courses' => $courses,
        ]);
    }
}
