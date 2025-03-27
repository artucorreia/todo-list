<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', [TaskController::class, 'index'])->name('index');
Route::get('/home', [TaskController::class, 'index'])->name('index');

Route::get('/dashboard', fn (): View => view('dashboard.dashboard'))->name('dashboardPage');

Route::get(
    '/tasks/{id}',
    [TaskController::class, 'show']
)->name('show');

Route::get(
    '/create',
    [TaskController::class, 'create']
)->name('createPage');

Route::post(
    '/store',
    [TaskController::class, 'store']
)->name('store');

Route::delete(
    '/delete/{id}',
    [TaskController::class, 'destroy']
)->name('destroy');