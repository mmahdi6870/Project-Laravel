<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            "title" => 'Salvator Cleaning Shoes',
            'menu' => Menu::all()
        ]);
    }
}
