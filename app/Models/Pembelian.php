<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pembelian extends Model
{
    use HasFactory;

    protected $fillable = ['pengajuan_id', 'supplier_id', 'tanggal_pembelian', 'total_harga'];
    protected $casts = [
        'tanggal_pembelian' => 'datetime',
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function gambarPembelian()
    {
        return $this->hasMany(GambarPembelian::class);
    }
}
