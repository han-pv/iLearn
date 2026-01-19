<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $courses = ["Beginner", "Elementary", "Web design", "Web programming"];

        return view("home")->with([
            'courses' => $courses,
        ]);
    }
}
