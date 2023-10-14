<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('todos/index', [TodoController::class, 'index'])->name('todos.index');

Route::get('todos/create', [TodoController::class, 'create'])->name('todos.create');

Route::post('todos/store', [TodoController::class, 'store'])->name('todos.store');