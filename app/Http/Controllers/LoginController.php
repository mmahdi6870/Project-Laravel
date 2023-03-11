<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Halaman Login Salvator'
        ]);
    }

    public function check(Request $request)
    {
        $masuk = $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Username tidak boleh kosong!',
                'password.required' => 'Password tidak boleh kosong!',
            ]
        );

        if (Auth::attempt($masuk)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginError', 'Login Anda Gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
