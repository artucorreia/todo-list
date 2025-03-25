<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', fn (): View => view('home'));
Route::get('/home', fn (): View => view('home'));

Route::get('/dashboard', fn (): View => view('dashboard'));


Route::get(
    '/tasks', 
    [TaskController::class, 'findAll']
);

Route::get(
    '/tasks/{id}',
    [TaskController::class, 'findById']
);