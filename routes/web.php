<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class, 'index'])->name('todo.index');

Route::post('/conclude/{id}', [TodoController::class, 'concluded'])->name('todo.toggleConcluded');

Route::post('/', [TodoController::class, 'create'])->name('todo.create');

Route::post('/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');
