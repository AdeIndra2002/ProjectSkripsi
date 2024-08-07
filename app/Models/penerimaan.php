<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerimaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal_penerimaan',
        'jumlah_penerimaan',
        'divisi_id',
        'kategori_id',
        'pengajuan_id'
    ];

    public function divisi()
    {
        return $this->belongsTo(divisi::class);
    }

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }

    public function pengajuan()
    {
        return $this->belongsTo(pengajuan::class);
    }
}
