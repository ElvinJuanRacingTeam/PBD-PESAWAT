<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = $request->username;
        $pass = $request->password;

        if($user === 'admin' && $pass === 'admin123'){
            session(['login' => true]);
            return redirect('/dashboard');
        }

        return back()->with('error','Username atau Password salah');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}
