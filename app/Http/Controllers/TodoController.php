<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();

        $completed = Todo::where('concluded', '=', true)->count();

        return view('index', [
            'todos' => $todos,
            'completed' => $completed
        ]);
    }

        public function register()
    {
        $todos = Todo::all();

        $completed = Todo::where('concluded', '=', true)->count();

        return view('register', [
            'todos' => $todos,
            'completed' => $completed
        ]);
    }

    public function create(Request $request)
    {
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
    }

    public function concluded(int $id)
    {
        $todo = Todo::findOrFail($id);

        $todo->concluded = !$todo->concluded;
        $todo->save();

        return response()->redirectToRoute('todo.index');
    }

    public function delete(int $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return response()->redirectToRoute('todo.index');
    }
}
