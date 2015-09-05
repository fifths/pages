<?php

namespace App\Http\Controllers\Backend;

use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $email=$request->input('email');
        $password=$request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return redirect()->intended('dashboard');
        }
    }
}
