<?php

namespace App\Http\Controllers;

use App\Models\GambarPembelian;
use App\Models\Pembelian;
use App\Models\Pengajuan;
use App\Models\Supplier; // Ubah dari 'supplier' ke 'Supplier'
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'date_desc');

        $query = Pembelian::query();

        switch ($sort) {
            case 'price_asc':
                $query->orderBy('total_harga', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('total_harga', 'desc');
                break;
            case 'date_asc':
                $query->orderBy('tanggal_pembelian', 'asc');
                break;
            case 'date_desc':
            default:
                $query->orderBy('tanggal_pembelian', 'desc');
                break;
        }

        $pembelians = $query->get();

        return view('pembelians.index', compact('pembelians'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengajuans = Pengajuan::all();
        $suppliers = Supplier::all(); // Ubah dari 'supplier' ke 'Supplier'
        return view('pembelians.create', compact('pengajuans', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pengajuanId' => 'required|exists:pengajuans,id', // Sesuaikan nama dengan formulir
            'supplierId' => 'required|exists:suppliers,id',  // Sesuaikan nama dengan formulir
            'tanggalPembelian' => 'required|date', // Sesuaikan nama dengan formulir
            'totalHarga' => 'required|numeric', // Sesuaikan nama dengan formulir
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Sesuaikan nama dengan formulir
        ]);

        $pembelian = Pembelian::create([
            'pengajuan_id' => $request->input('pengajuanId'),
            'supplier_id' => $request->input('supplierId'),
            'tanggal_pembelian' => $request->input('tanggalPembelian'),
            'total_harga' => $request->input('totalHarga'),
        ]);

        if ($request->has('gambar')) {
            foreach ($request->file('gambar') as $image) {
                $path = $image->store('images', 'public');
                GambarPembelian::create([
                    'pembelian_id' => $pembelian->id,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('pembelians.index')->with('success', 'Pembelian created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pembelian = Pembelian::with('gambarPembelian', 'pengajuan', 'supplier')->findOrFail($id);
        return view('pembelians.show', compact('pembelian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pembelian = Pembelian::with('gambarPembelian')->findOrFail($id);
        $pengajuans = Pengajuan::all();
        $suppliers = Supplier::all();

        return view('pembelians.edit', compact('pembelian', 'pengajuans', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        $validated = $request->validate([
            'tanggal_pembelian' => 'required|date',
            'pengajuan_id' => 'required|exists:pengajuans,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'total_harga' => 'required|numeric',
            'gambar.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Perbarui data pembelian
        $pembelian->update($validated);

        // Tangani upload gambar
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $path = $file->store('images', 'public');
                $pembelian->gambarPembelian()->create(['path' => $path]);
            }
        }
        Log::info('Updating Pembelian:', $validated);

        return redirect()->route('pembelians.index')->with('success', 'Pembelian updated successfully.');
    }


    public function destroyGambar($id)
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

    public function showDeleteGambarForm($id)
    {
        $pembelian = Pembelian::with('gambarPembelian')->findOrFail($id);
        return view('pembelians.hapus-gambar', compact('pembelian'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();
        return redirect()->route('pembelians.index')->with('success', 'Pembelian deleted successfully.');
    }
}
