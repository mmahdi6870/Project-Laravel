<?php

namespace App\Http\Controllers;

use App\Models\GuestR;
use Illuminate\Http\Request;

class GuestRController extends Controller
{
    public function index()
    {
        return view('dashboard.tabelR', [
            'title' => 'Halaman Tabel Repaint',
            'active' => 'Halaman Tabel',
            'bayes' => GuestR::latest()->Filter()->paginate(5),
        ]);
    }

    public function destroy($guestR)
    {
        GuestR::destroy($guestR);
        return redirect('/tabelR')->with('success', 'Data Sudah Berhasil Di Hapus');
    }
}
