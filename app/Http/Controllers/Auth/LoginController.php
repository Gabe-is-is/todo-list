<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function create(Request $request)
    {
        $rules = [
            'email' => 'required|email:rfc,dns',
            'password' => 'required|string|max:16|min:8'
        ];

        $messages = [
            'required' => 'O campo :attribute é obrigatório',
            'email.email' => 'O email digitado não é válido',
            'password.string' => 'email ou senha inválidos',
            'password.max' => 'email ou senha inválidos',
            'password.min' => 'email ou senha inválidos',
        ];

        $credentials = $request->validate(
            $rules,
            $messages
        );

        $sucess = Auth::attempt($credentials);

        if($sucess) {
            $request->session()->regenerate();
            return redirect()->route('todo.index');
        }
        
        return back()->withErrors([
            'email' => 'credenciais inválidas'
        ])->onlyInput('email');
    }
}
