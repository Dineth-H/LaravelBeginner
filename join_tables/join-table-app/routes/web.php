<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/student', StudentController::class);

Route::resource('/course', CourseController::class);

Route::get('/student/create', [StudentController::class, 'create'])->name('students.create');

Route::get('/student/{id}', [StudentController::class, 'show']);

Route::patch('/student/{id}', [StudentController::class, 'update'])->name('students.update');

Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::get('/course/edit/{id}', [CourseController::class, 'edit'])->name('courses.edit');