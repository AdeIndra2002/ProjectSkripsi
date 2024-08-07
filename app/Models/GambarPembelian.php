<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarPembelian extends Model
{
    use HasFactory;

    protected $fillable = ['pembelian_id', 'path'];

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class);
    }
}
