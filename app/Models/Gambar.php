<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    use HasFactory;

    protected $fillable = ['path'];

    // Hubungan dengan model Pembelian
    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class);
    }
}
