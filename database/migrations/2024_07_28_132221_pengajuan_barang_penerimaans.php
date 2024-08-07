<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan_barang_penerimaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuan_barang_id')->constrained('pengajuan_barang')->onDelete('cascade');
            $table->foreignId('penerimaan_id')->constrained('penerimaans')->onDelete('cascade');
            $table->integer('jumlah'); // Menambahkan kolom jumlah
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_barang_penerimaans');
    }
};
