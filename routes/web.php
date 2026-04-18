<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class, 'index'])->name('todo.index');

Route::get('/register', [TodoController::class, 'register'])->name('todo.index');

Route::patch('/conclude/{id}', [TodoController::class, 'concluded'])->name('todo.toggleConcluded');

Route::post('/', [TodoController::class, 'create'])->name('todo.create');

Route::delete('/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');
