<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';

    protected $fillable = ['barang', 'stok'];

    public function pengajuans()
    {
        return $this->belongsToMany(Pengajuan::class, 'pengajuan_barang')
            ->withPivot('jumlah')
            ->withTimestamps();
    }

    public function penerimaan()
    {
        return $this->hasMany(penerimaan::class);
    }

    public function pembatalan()
    {
        return $this->hasMany(pembatalan::class);
    }

    public function pembelians()
    {
        return $this->belongsToMany(Pembelian::class, 'pembelian_barang')
            ->withPivot('gambar')
            ->withTimestamps();
    }
}
