<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

// Auth
Route::get('/register', [AuthController::class, 'showRegister'])->name(
    'show.register',
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

// Users
Route::middleware('auth')
    ->controller(UserController::class)
    ->group(function () {
        Route::get('/edit', 'edit')->name('users.edit');
        Route::put('/update-profile', 'updateProfile')->name(
            'users.update.profile',
        );
        Route::put('/update-password', 'updatePassword')->name(
            'users.update.password',
        );
    });

// Dashboard
Route::middleware('auth')
    ->controller(DashboardController::class)
    ->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard.index');
    });
