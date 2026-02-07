<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index'])->name("home");

Route::get('/teachers', [TeacherController::class, 'index'])->name("teachers.index");
Route::get('/teachers/{id}', [TeacherController::class, 'show'])->name("teachers.show");

Route::get('/students', [StudentController::class, 'index'])->name("students.index");
Route::get('/students/{id}', [StudentController::class, 'show'])->name("students.show");


Route::controller(CourseController::class)
    ->name("courses.")
    ->prefix("courses")
    ->group(function () {
        Route::get('/create', 'create')->name("create");

        Route::get('/{id}/edit', 'edit')->name("edit");
        Route::put('/{id}', 'update')->name("update");

        Route::delete('/{id}', 'destroy')->name("destroy");

        Route::post('', 'store')->name("store");
        Route::get('', 'index')->name("index");

    });



// Route::get('/departments', [DepartmentController::class, 'index']);

// Route::get('/employees', [EmployeeController::class, 'index']);

