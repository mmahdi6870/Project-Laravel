<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.menu', [
            'title' => 'Halaman Menu',
            'active' => 'Halaman Menu',
            'menu' => Menu::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.menuadd', [
            'title' => 'Halaman Menu',
            'active' => 'Halaman Menu',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'pelayanan' => 'required|max:255|unique:menus',
            'detail' => 'required|max:255',
            'harga' => 'required|max:255',
            'gambar' => 'image|file|max:3072',
            'link' => 'required',
        ]);
        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/asset/img'), $filename);
            $validateData['gambar'] = $filename;
        }

        Menu::create($validateData);
        return redirect('/menu')->with('success', 'Menu Baru sudah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $Menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('dashboard.menuedit', [
            'title' => 'Halaman Menu',
            'active' => 'Halaman Menu',
            'menu' => $menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $Menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $rules = [
            'pelayanan' => 'required|max:255',
            'detail' => 'required',
            'gambar' => 'image|file|max:3072',
            'link' => 'required',
            'harga' => 'required'
        ];
        $validateData = $request->validate($rules);
        if ($request->file('gambar')) {
            $image_path = public_path("\asset\img\\") . $menu->gambar;
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
            $file = $request->file('gambar');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/asset/img'), $filename);
            $validateData['gambar'] = $filename;
        }

        Menu::where('id', $menu->id)
            ->update($validateData);
        return redirect('/menu')->with('success', ' Menu Sudah berhasil di Perbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {

        $image_path = public_path("\asset\img\\") . $menu->gambar;

        if (file_exists($image_path)) {

            @unlink($image_path);
        }
        Menu::destroy($menu->id);
        return redirect('/menu')->with('success', 'Data Sudah Berhasil Di Hapus');
    }
}
