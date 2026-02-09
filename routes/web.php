<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

// Route::get('/', function () {
//     return view('home');
// });

Route::middleware("guest")
    ->middleware("throttle:60,1")
    ->group(function () {
        Route::get('/login', function () {
            return view('auth.login');
        })->name("login");

        Route::post('/login', [LoginController::class, 'login']);
    });


Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name("home");

    Route::post('/logout', [LoginController::class, 'logout'])->name("logout");

    Route::controller(StudentController::class)
        ->name("students.")
        ->prefix("students")
        ->group(function () {
            Route::post('', 'store')->name("store");
            Route::get('', 'index')->name("index");
        });


    Route::controller(TeacherController::class)
        ->name("teachers.")
        ->prefix("teachers")
        ->group(function () {
            Route::get('', 'index')->name("index");
            Route::get('/{id}', 'show')->name("show");
        });

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
});
