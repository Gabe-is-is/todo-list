<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecoverController extends Controller
{
    public function recover() {
        return view('recover');
    }
}
