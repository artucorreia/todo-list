<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/dashboard', fn (): View => view('dashboard.dashboard'))->name('dashboardPage');
Route::get('/', [TaskController::class, 'index'])->name('index');


Route::prefix('tasks')->group(function () 
{
    Route::get('/', [TaskController::class, 'index'])->name('index');
    
    Route::get('/show/{id}', [TaskController::class, 'show'])->name('show');
    
    Route::get('/create', [TaskController::class, 'create'])->name('createPage');
    
    Route::post('/store', [TaskController::class, 'store'])->name('store');
    
    Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('editPage');
    
    Route::put('/update/{id}', [TaskController::class, 'update'])->name('update');
    
    Route::put('/finish/{id}', [TaskController::class, 'markAsFinished'])->name('finish');
    
    Route::delete('/delete/{id}', [TaskController::class, 'destroy'])->name('destroy');
});