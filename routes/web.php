<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExaminerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/signup', [AuthController::class, 'create'])->name('examiner.create');
Route::post('/signup', [AuthController::class, 'store'])->name('examiner.store');
Route::get('login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('examiner.login');

Route::get('/examiner/dashboard', [ExaminerController::class, 'dashboard'])->name('examiner.dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('examiner.logout');
