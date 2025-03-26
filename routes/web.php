<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', [TaskController::class, 'findAll'])->name('home');
Route::get('/home', [TaskController::class, 'findAll'])->name('home');

Route::get('/dashboard', fn (): View => view('dashboard.dashboard'))->name('dashboard');

Route::get(
    '/tasks/{id}',
    [TaskController::class, 'findById']
)->name('findTask');

Route::get(
    '/create',
    [TaskController::class, 'create']
)->name('createPage');

Route::post(
    '/store',
    [TaskController::class, 'store']
)->name('store');