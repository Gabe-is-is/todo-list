<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function create(Request $request) {
        $rules = [
            'email' => 'required|email:rfc,dns|unique:users',
            'name' => 'required|string',
            'password' => 'required|string|max:16|min:8'
        ];

        $messages = [
            'required' => 'O campo :attribute é obrigatório',
            'email.email' => 'O email digitado não é válido',
            'email.unique' => 'email ou senha inválidos',
            'name.string' => 'nome inválido',
            'password.string' => 'email ou senha inválidos',
            'password.max' => 'email ou senha inválidos',
            'password.min' => 'email ou senha inválidos',
        ];

        $request->validate(
            $rules,
            $messages
        );

        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = $request->password;
        $newUser->save();
    }
}
