<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ConfirmEmailController extends Controller
{
    public function index(Request $request)
    {
        /**
         * @var User|null $user
         */
        $user = $request->user();

        if (!$user) {
            abort(403);
        }

        $user->sendEmailVerificationNotification();

        return view('verify-email');
    }

    public function confirmEmail(Request $request)
    {
        /**
         * @var User|null $user
         */
        $user = $request->user();

        if (!$user) {
            abort(403);
        }

        $user->markEmailAsVerified();

        return view('confirmed-email');
    }
}
