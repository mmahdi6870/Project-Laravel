<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Carbon\Carbon;


class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $harga_total = 0;
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $data = Pemasukan::whereBetween('created_at', [$start_date, $end_date])->get();
            $harga_total = 0;
            foreach ($data as $item => $value) {
                $harga_total += $value['total'];
            }
        } else {
            $data = Pemasukan::latest()->get();
        }

        return view('dashboard.pemasukan.index', [
            'title' => 'Halaman Pemasukan Salvator',
            'active' => 'Halaman Pemasukan',
            'pemasukan' => $data,
            'total' => $harga_total,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required|max:255',
            'jasa' => 'required|max:255',
            'jumlah' => 'required|max:255',
        ];
        $message = [
            'nama.required' => 'Nama Pemesan tidak boleh kosong!',
            'jasa.required' => 'jasa yang dipesan tidak boleh kosong!',
            'jumlah.required' => ' Jumlah Pemesanan Tidak boleh kosong!'

        ];
        $validateData = $request->validate($rules, $message);
        if ($request->input('jasa') == "Simple Cleanning") {
            $validateData['harga'] = 25000;
        } elseif ($request->input('jasa') == "Premium Cleanning") {
            $validateData['harga'] = 30000;
        } elseif ($request->input('jasa') == "Expert Cleanning") {
            $validateData['harga'] = 40000;
        } elseif ($request->input('jasa') == "Unyellowing") {
            $validateData['harga'] = 65000;
        } elseif ($request->input('jasa') == "Repaint Basic Colour") {
            $validateData['harga'] = 75000;
        } elseif ($request->input('jasa') == "Leather Basic Colour") {
            $validateData['harga'] = 120000;
        } elseif ($request->input('jasa') == "Custom Repaint") {
            $validateData['harga'] = 80000;
        } else {
            $validateData['harga'] = 0;
        }

        $validateData['total'] = $validateData['harga'] * $request->input('jumlah');
        Pemasukan::create($validateData);
        return redirect('/pemasukan')->with('success', 'Pemasukan sudah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemasukan $pemasukan)
    {
        Pemasukan::destroy($pemasukan->id);
        return redirect('/pemasukan')->with('success', 'Data Pemasukan Berhasil Di Hapus');
    }
}
