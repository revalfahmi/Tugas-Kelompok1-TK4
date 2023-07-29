<?php

use App\Http\Controllers\DashboardController;
<<<<<<< Updated upstream
use App\Http\Controllers\HakAksesController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
=======
use App\Http\Controllers\BarangController;
>>>>>>> Stashed changes
use Illuminate\Support\Facades\Route;

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

<<<<<<< Updated upstream
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Auth::routes();

Route::resource('hak-akses', HakAksesController::class);

Route::resource('pengguna', UserController::class);

Route::resource('penjualan', PenjualanController::class);

=======
Route::get('/', [DashboardController::class, 'index']);

# Route menampilkan data barang
Route::resource('barang', BarangController::class);
# Route mengakses view form tambah barang
// Route::get('/barangs/create','BarangController@create')->name('barangs.create');
// # Route untuk proses simpan data barang
// Route::post('/barangs','BarangController@store')->name('barangs.store');
// # Route untuk mengakses detail data
// Route::get('/barangs/{barang}','BarangController@detail')->name('barangs.detail');
// # Route untuk menampilkan form update
// Route::get('/barangs/{barang}/edit','BarangController@edit')->name('barangs.edit');
// # Route untuk update data ke dalam database
// Route::put('/barangs/{barang}','BarangController@update')->name('barangs.update');

# Route untuk menghapus barang
>>>>>>> Stashed changes

