<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

// Auth
Route::get('/register', [AuthController::class, 'showRegister'])->name(
    'show.register'
);
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Tasks
Route::middleware('auth')
    ->controller(TaskController::class)
    ->group(function () {
        Route::get('/', 'index')->name('tasks.index');
        Route::get('/show/{id}', 'show')->name('tasks.show');
        Route::get('/create', 'create')->name('tasks.create');
        Route::post('/store', 'store')->name('tasks.store');
        Route::get('/edit/{id}', 'edit')->name('tasks.edit');
        Route::put('/update/{id}', 'update')->name('tasks.update');
        Route::put('/finish/{id}', 'markAsFinished')->name('tasks.finish');
        Route::delete('/delete/{id}', 'destroy')->name('tasks.destroy');
    });

// Dashboard
Route::get('/dashboard', fn(): View => view('dashboard.dashboard'))->name(
    'show.dashboard'
);
