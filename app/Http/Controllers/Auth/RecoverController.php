<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class RecoverController extends Controller
{
    public function index()
    {
        return view('recover');
    }

    public function recover(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email:rfc,dns'
            ],
            [
                'required' => 'O campo :attribute é obrigatório',
                'email.email' => 'O email digitado não é válido'
            ]
        );

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::PASSWORD_RESET) {
            return back()->with('status', true);
        }

        return back()->withErrors(['status' => false]);
    }
}
