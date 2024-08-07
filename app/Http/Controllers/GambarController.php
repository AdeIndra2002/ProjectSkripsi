<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use App\Models\GambarPembelian;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GambarController extends Controller
{
    // Menampilkan daftar gambar untuk pembelian tertentu
    public function index($pembelianId)
    {
        $pembelian = Pembelian::with('gambarPembelian')->findOrFail($pembelianId);
        return view('pembelians.hapus-gambar', compact('pembelian'));
    }
    public function destroy($id)
    {
        // Temukan gambar berdasarkan ID
        $gambar = GambarPembelian::findOrFail($id);

        // Path gambar yang benar
        $path = $gambar->path;

        // Hapus gambar dari storage
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        } else {
            return redirect()->back()->with('error', 'Gambar tidak ditemukan di penyimpanan.');
        }

        // Hapus record gambar dari database
        $gambar->delete();

        return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    }
}
