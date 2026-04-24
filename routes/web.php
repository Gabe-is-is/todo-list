<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RecoverController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware([
    'auth',
    'verified'
])->group(function () {
    Route::get('/', [TodoController::class, 'index'])->name('todo.index');
    Route::post('/', [TodoController::class, 'create'])->name('todo.create');
    Route::patch('/conclude/{id}', [TodoController::class, 'concluded'])->name('todo.toggleConcluded');
    Route::delete('/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');
    Route::post('/logout', function (Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    })->name('logout');
});

Route::middleware([
    'auth'
])->group(function () {
    Route::get('verify-email', function () {
        return 'email não verificado';
    })->name('verification.notice');
});

Route::middleware([
    'guest'
])->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'create'])->name('register.create');

    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'create'])->name('login.create');

    Route::get('/recover', [RecoverController::class, 'index'])->name('recover');
    Route::post('/recover', [RecoverController::class, 'recover'])->name('recover.create');

    Route::get('/reset/{token}', [PasswordResetController::class, 'index'])->name('password.reset');
    Route::post('/reset', [PasswordResetController::class, 'reset'])->name('reset.create');
});

// criar uma pagina de 'email nao verificado', botao de 'reenviar'