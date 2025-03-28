<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/dashboard', fn (): View => view('dashboard.dashboard'))->name('dashboardPage');
Route::get('/', [TaskController::class, 'index'])->name('index');


Route::get('/register', [AuthController::class, 'showRegister'])->name('registerPage');
Route::get('/login', [AuthController::class, 'showLogin'])->name('loginPage');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->controller(TaskController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/create', 'create')->name('createPage');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('editPage');
    Route::put('/update/{id}', 'update')->name('update');
    Route::put('/finish/{id}', 'markAsFinished')->name('finish');
    Route::delete('/delete/{id}', 'destroy')->name('destroy');
});

Route::prefix('tasks')->group(function () 
{
});