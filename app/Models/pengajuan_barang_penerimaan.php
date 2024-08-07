<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan_barang_penerimaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengajuan_barang_id',
        'penerimaan_id',
    ];

    public function pengajuan_barang()
    {
        return $this->belongsTo(pengajuan_barang::class);
    }

    public function penerimaan()
    {
        return $this->belongsTo(penerimaan::class);
    }
}
