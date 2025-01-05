<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\ExaminerController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/signup', [AuthController::class, 'create'])->name('examiner.create');
Route::post('/signup', [AuthController::class, 'store'])->name('examiner.store');
Route::get('login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('examiner.login');
Route::get('students/login', [StudentController::class, 'loginForm'])->name('student.login');
Route::post('students/login', [StudentController::class, 'login'])->name('login.student');
Route::get('/students/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
Route::post('/students/logout', [StudentController::class, 'logout'])->name('student.logout');
Route::get('/password/reset/{student}', [StudentController::class, 'resetPasswordForm'])->name('reset.form');
Route::post('/password/reset/{student}', [StudentController::class, 'resetPassword'])->name('password.reset');
Route::get('/profile/update', [StudentController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [StudentController::class, 'update'])->name('profile.update');

Route::middleware('auth')->group(function() {
    Route::get('/examiner/dashboard', [ExaminerController::class, 'dashboard'])->name('examiner.dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('examiner.logout');
    Route::get('/{examination}/enroll/students', [ExaminationController::class, 'enrollStudents'])->name('enroll.students');
    Route::post('/{examination}/enroll/students', [ExaminationController::class, 'addStudents'])->name('student.store');

    Route::get('/examination/new', [ExaminationController::class, 'create'])->name('examination.create');
    Route::post('/examination/new', [ExaminationController::class, 'store'])->name('examination.store');
});

