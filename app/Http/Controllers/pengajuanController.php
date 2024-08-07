<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\divisi;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class pengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view_pengajuan = Pengajuan::orderBy('id', 'desc')->get();
        $divisis = Divisi::all();
        $barangs = Barang::all();
        return view('pengajuan.pengajuan', compact('view_pengajuan', 'divisis', 'barangs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::all();
        $divisis = Divisi::all();

        return view('pengajuan.create', compact('barangs', 'divisis', 'barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaPengajuan' => 'required|string|max:255',
            'tanggalPengajuan' => 'required|date',
            'barangId' => 'required|array',
            'barangId.*' => 'exists:barangs,id',
            'jumlah' => 'required|array',
            'jumlah.*' => 'required|integer|min:1',
            'divisiId' => 'required|integer|exists:divisis,id',
        ]);

        $pengajuan = Pengajuan::create([
            'namaPengajuan' => $request->namaPengajuan,
            'tanggalPengajuan' => $request->tanggalPengajuan,
            'divisiId' => $request->divisiId,
        ]);

        foreach ($request->barangId as $index => $barangId) {
            $pengajuan->barangs()->attach($barangId, ['jumlah' => $request->jumlah[$index]]);
        }

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('pengajuan.show', compact('pengajuan'));
    }

    public function cetakPengajuan(Request $request)
    {
        $divisis = Divisi::all();
        $view_pengajuan = Pengajuan::orderBy('id', 'desc')->get(); // Menggunakan $view_pengajuan
        $selected_division = $request->input('selected_division');
        $divisiId = $request->input('division');

        // Filter pengajuan berdasarkan divisi yang dipilih
        $view_pengajuan = Pengajuan::when($divisiId, function ($query, $divisiId) {
            $query->whereHas('divisi', function ($query) use ($divisiId) {
                $query->where('id', $divisiId);
            });
        })->get();

        return view('pengajuan.lapdiv', compact('view_pengajuan', 'divisis', 'selected_division')); // Menggunakan $view_pengajuan
    }

    public function generate($id)
    {
        $pengajuan = Pengajuan::findOrFail($id); // Mengambil data pengajuan berdasarkan ID
        return view('pengajuan.surat', compact('pengajuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengajuan = Pengajuan::with('barangs')->findOrFail($id);
        $barangs = Barang::all();
        $divisis = Divisi::all();

        // Debugging
        // dd($pengajuan->barangs);

        return view('pengajuan.edit', compact('pengajuan', 'barangs', 'divisis'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data pengajuan
        $validatedData = $request->validate([
            'namaPengajuan' => 'required|string|max:255',
            'tanggalPengajuan' => 'required|date',
            'barangId' => 'required|array',
            'barangId.*' => 'exists:barangs,id',
            'jumlah' => 'required|array',
            'jumlah.*' => 'required|integer|min:1',
            'divisiId' => 'required|integer|exists:divisis,id',
        ]);

        // Ambil data pengajuan yang akan diupdate
        $pengajuan = Pengajuan::findOrFail($id);

        // Update data pengajuan
        $pengajuan->update([
            'namaPengajuan' => $validatedData['namaPengajuan'],
            'tanggalPengajuan' => $validatedData['tanggalPengajuan'],
            'divisiId' => $validatedData['divisiId'],
        ]);

        // Siapkan data untuk sync
        $barangs = [];
        foreach ($validatedData['barangId'] as $index => $barangId) {
            $barangs[$barangId] = ['jumlah' => $validatedData['jumlah'][$index]];
        }

        // Sinkronkan data barang dan jumlah pada tabel pivot
        $pengajuan->barangs()->sync($barangs);

        return redirect()->route('pengajuan.index')->with('success', 'Data pengajuan berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengajuan = pengajuan::where('id', $id)->first();
        $pengajuan->delete();
        return redirect()->route('pengajuan.index');
    }
}
