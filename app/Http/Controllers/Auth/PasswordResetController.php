<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller
{
    public function index(Request $request, string $token)
    {
        $email = $request->input('email');

        return view('reset', ['token' => $token, 'email' => $email]);
    }

    public function reset(Request $request)
    {
        $request->validate(
            [
                'token' => 'required|string',
                'email' => 'required|email:rfc,dns',
                'password' => 'required|string|max:16|min:8'
            ],
            [
                'string' => 'O campo :attribute deve ser do tipo string',
                'required' => 'O campo :attribute é obrigatório',
                'email.email' => 'O email digitado não é válido',
                'password.max' => 'email ou senha inválidos',
                'password.min' => 'email ou senha inválidos',
            ]
        );

        $status = Password::reset(
            $request->only('email', 'password', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );

        if($status === Password::PASSWORD_RESET) {
            return redirect()->route('login');
        }

        return back()->withErrors([
            'password'=> 'Ocorreu um erro ao trocar senha'
        ]);
    }
}
