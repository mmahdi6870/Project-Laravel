<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Guest;
use App\Models\GuestR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {

        return view('dashboard.index', [
            'data' => Guest::where('hasil', 'Bersih')->count('hasil'),
            'data2' => Guest::where('hasil', 'Simple Cleanning')->count('hasil'),
            'data3' => Guest::where('hasil', 'Expert Cleanning')->count('hasil'),
            'data4' => Guest::where('hasil', 'Premium Cleanning')->count('hasil'),
            'dataa' => GuestR::where('hasil', 'Bersih')->count('hasil'),
            'datab' => GuestR::where('hasil', 'Unyellowing')->count('hasil'),
            'datac' => GuestR::where('hasil', 'Basic Colour Shoes')->count('hasil'),
            'datad' => GuestR::where('hasil', 'Costume Repaint')->count('hasil'),
            'datae' => GuestR::where('hasil', 'Leather Basic Colour')->count('hasil'),
            'title' => 'Profile Saya',
            'active' => 'Halaman Profile'
        ]);
    }


    public function tabel()
    {

        return view('dashboard.tabel', [
            'bayes' => Guest::latest()->Filter()->paginate(5),
            'title' => 'Halaman Tabel',
            'active' => 'Halaman Tabel',

        ]);
    }

    public function destroy($guest)
    {
        Guest::destroy($guest);
        return redirect('/tabel')->with('success', 'Data Sudah Berhasil Di Hapus');
    }
    public function edit()
    {
        return view('dashboard.edit', [
            'title' => 'Edit Profil',
            'active' => 'Halaman Profile',
        ]);
    }
    public function editpass()
    {
        return view('dashboard.editpass', [
            'title' => 'Halaman Ubah Password',
            'active' => 'Halaman Profile',
        ]);
    }
    public function store(Request $request, User $user)
    {

        $rules = [
            'username' =>   'required',
            'nohp' => 'required|digits_between:6,15',
            'email' => 'required|email:dns'
        ];
        $message = [
            'username.required' => 'Username tidak boleh kosong!',
            'email.required' => 'email tidak boleh kosong!',
            'email.email' => 'format email salah',
            'nohp.digits_between' => 'No HP harus diisi antara 6 dan 15 digit',
            'nohp.required' => ' No Hp Tidak boleh kosong!'

        ];
        if ($request->username != $user->username) {
            $rules['username'] = 'required|unique:users';
        }
        if ($request->email != $user->email) {
            $rules['email'] = 'required|unique:users|email:dns';
        }
        $validateData = $request->validate($rules, $message);
        $validateData['is_admin'] = $user->is_admin;
        $validateData['password'] = $user->password;
        User::where('id', $user->id)
            ->update($validateData);
        return redirect('/dashboard')->with('success', ' profil sudah berhasil di update');
    }
    public function storepass(Request $request, User $user)
    {
        $rule['password'] = 'required';
        $rule['password2'] = 'required';

        if ($request->password2 != $request->password) {
            return redirect('/dashboard')->with('nosuccess', ' Password Baru tidak cocok dengan Konfirmasi Password');
        } else {
            $rules['password'] = 'required|min:5|max:20';
            $validateData = $request->validate($rules);
            $validateData['password'] = hash::make($validateData['password']);
            $validateData['username'] = $user->username;
            $validateData['iduser'] = $user->iduser;
            $validateData['nohp'] = $user->nohp;
            $validateData['email'] = $user->email;
            $validateData['is_admin'] = $user->is_admin;
            User::where('id', $user->id)
                ->update($validateData);
            return redirect('/dashboard')->with('success', ' Password kamu Berhasil Dirubah!');
        }
    }

    public function akhir()
    {
        return view('home', [
            "title" => 'Salvator Cleaning Shoes',
            'menu' => Menu::all()
        ]);
    }
}
