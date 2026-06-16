<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mutasi_stoks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('obat_alkes_id');
            $table->unsignedBigInteger('stok_gudang_id')->nullable();
            $table->date('tanggal');
            $table->enum('jenis', ['masuk','keluar','penyesuaian','retur','kadaluarsa']);
            $table->decimal('jumlah', 10, 2);
            $table->decimal('saldo_sesudah', 10, 2);
            $table->enum('sumber', ['pengadaan','pelayanan','penyesuaian','retur','kadaluarsa']);
            $table->unsignedBigInteger('referensi_id')->nullable();
            $table->unsignedBigInteger('unit_tujuan_id')->nullable();
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('input_oleh');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mutasi_stoks');
    }
};