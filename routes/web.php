<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RecoverController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;


Route::middleware([
    'auth'
])->group(function () {
    Route::get('/', [TodoController::class, 'index'])->name('todo.index');
    Route::post('/', [TodoController::class, 'create'])->name('todo.create');
    Route::patch('/conclude/{id}', [TodoController::class, 'concluded'])->name('todo.toggleConcluded');
    Route::delete('/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'create'])->name('register.create');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'create'])->name('login.create');

Route::get('/recover', [RecoverController::class, 'recover'])->name('recover');


// tela de esqueceu minha senha e botao de log out