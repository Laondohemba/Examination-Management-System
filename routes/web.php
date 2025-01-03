<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExaminerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/signup', [AuthController::class, 'create'])->name('examiner.create');
Route::post('/signup', [AuthController::class, 'store'])->name('examiner.store');

Route::get('/examiner/dashboard', [ExaminerController::class, 'dashboard'])->name('examiner.dashboard');
