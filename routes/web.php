<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\divisiController;
use App\Http\Controllers\GambarController;
use App\Http\Controllers\GambarPembelianController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\penerimaanController;
use App\Http\Controllers\pengajuanController;
use App\Http\Controllers\supplierController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::resource('barang', barangController::class);
    Route::resource('kategori', kategoriController::class);
    Route::resource('divisi', divisiController::class);
    Route::resource('supplier', supplierController::class);

    Route::resource('pengajuan', pengajuanController::class);
    Route::get('/pengajuan/{id}/generate', [PengajuanController::class, 'generate'])->name('pengajuan.generate');
    Route::get('/laporanPengajuan', [PengajuanController::class, 'cetakPengajuan'])->name('pengajuan.laporan');

    Route::resource('pembelians', PembelianController::class);
    Route::get('/pembelians', [PembelianController::class, 'index'])->name('pembelians.index');

    // Update Pembelian
    Route::put('/pembelians/{pembelian}', [PembelianController::class, 'update'])->name('pembelians.update');
    // Rute untuk menghapus gambar

    Route::get('/pembelians/{id}/hapus-gambar', [GambarController::class, 'index'])->name('pembelians.hapusGambar');
    Route::delete('/gambar/{id}', [GambarController::class, 'destroy'])->name('gambar.destroy');

    Route::resource('penerimaan', penerimaanController::class);

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
