<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\divisi;
use App\Models\kategori;
use App\Models\penerimaan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class penerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penerimaans = penerimaan::orderBy('id', 'ASC')->get();
        $divisis = divisi::all();
        $kategoris = kategori::all();
        $pengajuans = Pengajuan::all();
        $barangs = barang::all();
        return view('penerimaan.index', compact('penerimaans', 'divisis', 'kategoris', 'pengajuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisis = divisi::all();
        $kategoris = kategori::all();
        $pengajuans = Pengajuan::all();
        $barangs = barang::all();
        return view('penerimaan.create', compact('divisis', 'kategoris', 'pengajuans', 'barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
