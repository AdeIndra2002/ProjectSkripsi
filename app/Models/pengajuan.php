<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $fillable = ['namaPengajuan', 'tanggalPengajuan', 'divisiId'];

    public function barangs()
    {
        return $this->belongsToMany(Barang::class, 'pengajuan_barang')
            ->withPivot('jumlah')
            ->withTimestamps();
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisiId');
    }
}
