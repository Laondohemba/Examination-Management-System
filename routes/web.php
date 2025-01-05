<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\ExaminerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/signup', [AuthController::class, 'create'])->name('examiner.create');
Route::post('/signup', [AuthController::class, 'store'])->name('examiner.store');
Route::get('login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('examiner.login');

Route::middleware('auth')->group(function() {
    Route::get('/examiner/dashboard', [ExaminerController::class, 'dashboard'])->name('examiner.dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('examiner.logout');
    Route::get('/{examination}/enroll/students', [ExaminationController::class, 'enrollStudents'])->name('enroll.students');
    Route::post('/{examination}/enroll/students', [ExaminationController::class, 'addStudents'])->name('student.store');

    Route::get('/examination/new', [ExaminationController::class, 'create'])->name('examination.create');
    Route::post('/examination/new', [ExaminationController::class, 'store'])->name('examination.store');
});

