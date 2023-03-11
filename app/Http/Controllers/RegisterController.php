<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Halaman Register'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'username' => 'required|max:255',
                'nohp' => 'required|digits_between:6,15',
                'email' => 'required|unique:users|email:dns',
                'password' => 'required|min:5|max:255',

            ],
            [
                'username.required' => 'Username tidak boleh kosong!',
                'email.required' => 'email tidak boleh kosong!',
                'password.required' => 'Password tidak boleh kosong!',
                'nohp.digits_between' => 'No HP harus diisi antara 6 dan 15 digit',
                'nohp.required' => ' No Hp Tidak boleh kosong!'
            ]
        );

        $validateData['password'] = Hash::make($validateData['password']);
        $validateData['is_admin'] = 0;
        $validateData['iduser'] = random_int(474124, 144234397);

        User::create($validateData);

        return redirect('login')->with('success', 'Pendaftaran Anda Berhasil, Silahkan Login');
    }
}
