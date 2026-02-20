<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

// Route::get('/', function () {
//     return view('home');
// });
Route::get('locale/{locale}', [HomeController::class, 'locale'])
    ->name('locale')->where('locale', '[a-z]+');

Route::middleware("guest")
    ->group(function () {

        // Dine Login store edilyan yerde throttle bar
        Route::post('/login', [LoginController::class, 'store'])->middleware("throttle:5,1");

        Route::get('/login', [LoginController::class, 'login'])->name("login");
    });


Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name("home");

    Route::post('/logout', [LoginController::class, 'destroy'])->name("logout");


    Route::controller(TeacherController::class)
        ->name("teachers.")
        ->prefix("teachers")
        ->group(function () {
            Route::get('/create', 'create')->name("create");
            Route::post('', 'store')->name("store");

            Route::get('/{id}/edit', 'edit')->name("edit");
            Route::put('/{id}', 'update')->name("update");

            Route::delete('/{id}', 'destroy')->name("destroy");

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

    Route::controller(StudentController::class)
        ->name("students.")
        ->prefix("students")
        ->group(function () {
            Route::post('', 'store')->name("store");
            Route::get('', 'index')->name("index");
        });

    Route::controller(GroupController::class)
        ->name("groups.")
        ->prefix("groups")
        ->group(function () {
            Route::get('', 'index')->name("index");
        });

    Route::controller(UserController::class)
        ->name("users.")
        ->prefix("users")
        ->group(function () {
            Route::get('/create', 'create')->name("create");
            Route::post('', 'store')->name("store");

            Route::get('/{id}/edit', 'edit')->name("edit");
            Route::put('/{id}', 'update')->name("update");

            Route::delete('/{id}', 'destroy')->name("destroy");

            Route::get('', 'index')->name("index");
            Route::get('/{id}', 'show')->name("show");
        });

    Route::controller(ShiftController::class)
        ->name("shifts.")
        ->prefix("shifts")
        ->group(function () {
            Route::get('/create', 'create')->name("create");
            Route::post('', 'store')->name("store");

            Route::get('/{id}/edit', 'edit')->name("edit");
            Route::put('/{id}', 'update')->name("update");

            Route::delete('/{id}', 'destroy')->name("destroy");

            Route::get('', 'index')->name("index");
        });
});
