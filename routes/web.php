<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExaminerController;
use App\Http\Middleware\StudentAuthenticate;
use App\Http\Controllers\ExaminationController;
use App\Http\Middleware\StudentNotAuthenticated;

Route::get('/', function () {
    return redirect('login');
});
Route::get('/signup', [AuthController::class, 'create'])->name('examiner.create');
Route::post('/signup', [AuthController::class, 'store'])->name('examiner.store');
Route::get('login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('examiner.login');

Route::prefix('students')->middleware(StudentAuthenticate::class)->group(function() {
    Route::get('/login', [StudentController::class, 'loginForm'])->name('student.login');
    Route::post('/login', [StudentController::class, 'login'])->name('login.student');
});

//student middleware
Route::prefix('students')->middleware(StudentNotAuthenticated::class)->group(function() {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::post('/logout', [StudentController::class, 'logout'])->name('student.logout');
    Route::get('/password/reset/{student}', [StudentController::class, 'resetPasswordForm'])->name('reset.form');
    Route::post('/password/reset/{student}', [StudentController::class, 'resetPassword'])->name('password.reset');
    Route::get('/profile/update', [StudentController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [StudentController::class, 'update'])->name('profile.update');
});

Route::middleware('auth')->group(function() {
    Route::get('/examiner/dashboard', [ExaminerController::class, 'dashboard'])->name('examiner.dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('examiner.logout');
    Route::get('/{examination}/enroll/students', [ExaminationController::class, 'enrollStudents'])->name('enroll.students');
    Route::post('/{examination}/enroll/students', [ExaminationController::class, 'addStudents'])->name('student.store');
    Route::get('/{examination}/students', [ExaminationController::class, 'students'])->name('examination.students');
    Route::get('/students/update/{student}', [ExaminationController::class, 'editStudent'])->name('student.edit');
    Route::put('/students/update/{student}', [ExaminationController::class, 'updateStudent'])->name('student.update');
    Route::delete('/students/update/{student}', [ExaminationController::class, 'destroyStudent'])->name('student.destroy');

    Route::get('/examination/new', [ExaminationController::class, 'create'])->name('examination.create');
    Route::post('/examination/new', [ExaminationController::class, 'store'])->name('examination.store');
});

