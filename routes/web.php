<?php

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $todos = Todo::all();

    $completed = Todo::where('concluded', '=', true)->count();

    return view('index', [
        'todos' => $todos,
        'completed' => $completed
    ]);
})->name('todo.index');

Route::post('/conclude/{id}', function (int $id) {
    $todo = Todo::findOrFail($id);

    $todo->concluded = !$todo->concluded;
    $todo->save();

    return response()->redirectToRoute('todo.index');
})->name('todo.toggleConcluded');

Route::post('/', function (Request $request) {
    $request->validate(
        [
            'todo' => 'required|max:255|min:3'
        ],
        [
            'todo.required' => 'O campo é obrigatório.',
            'todo.max' => 'O máximo de caracteres foi excedido.',
            'todo.min' => 'É obrigatório no mínimo 3 caracteres.'
        ]
    );

    $todo = new Todo();
    $todo->name = $request->todo;
    $todo->save();

    return response()->redirectToRoute('todo.index');
})->name('todo.create');

Route::post('/delete/{id}', function (int $id) {
    $todo = Todo::findOrFail($id);
    $todo->delete();

    return response()->redirectToRoute('todo.index');
})->name('todo.delete');
