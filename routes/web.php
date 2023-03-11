<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\bayesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GuestRController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index']);
Route::Post('/bayes', [bayesController::class, 'bayes']);
Route::Post('/bayesR', [bayesController::class, 'bayesR']);

// autentikasi
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::Post('/login', [LoginController::class, 'check']);
Route::Post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('admin');
Route::Post('/register', [RegisterController::class, 'store']);

//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/ubah', [DashboardController::class, 'edit'])->middleware('auth');
Route::get('/dashboard/ubahpass', [DashboardController::class, 'editpass'])->middleware('auth');
Route::Put('/dashboard/ubahdata/{user:iduser}', [DashboardController::class, 'store'])->middleware('auth');
Route::Put('/dashboard/updatepass/{user:iduser}', [DashboardController::class, 'storepass'])->middleware('auth');
Route::delete('/dashboard/hapus/{id}', [DashboardController::class, 'destroy'])->middleware('auth');

//tabel
Route::get('/tabel', [DashboardController::class, 'tabel'])->middleware('admin');
Route::Post('/', [DashboardController::class, 'akhir']);
Route::get('/tabelR', [GuestRController::class, 'index'])->middleware('admin');
Route::Delete('/tabelR/hapus/{guestR:id}', [GuestRController::class, 'destroy'])->middleware('admin');

//menu
Route::resource('/menu', MenuController::class)->middleware('admin');

//pemasukan
Route::resource('/pemasukan', PemasukanController::class)->middleware('admin');
