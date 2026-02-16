<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $courses = ["Beginner", "Intermediate", "Advanced"];
        $courses_count = Course::count();
        $teachers_count = Teacher::count();

        return view("home")->with([
            'courses_count' => $courses_count,
            'teachers_count' => $teachers_count,
        ]);
    }

    // public function locale($locale)
    // {
    //     if (in_array($locale, ['en', 'tm'])) {
    //         session()->put('locale', $locale);
    //     }
    //     return redirect()->back();
    // }
    
    public function locale($locale) // ru
    {
        $locale = in_array($locale, ['tm', 'ru']) ? $locale : 'en';
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
