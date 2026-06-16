<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemeliharaan_asets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aset_id');
            $table->date('tanggal');
            $table->enum('jenis_pemeliharaan', ['rutin','perbaikan','penggantian_spare']);
            $table->decimal('biaya', 15, 2)->default(0);
            $table->unsignedBigInteger('pengeluaran_id')->nullable();
            $table->enum('kondisi_sebelum', ['Baik','Rusak_Ringan','Rusak_Berat'])->nullable();
            $table->enum('kondisi_sesudah', ['Baik','Rusak_Ringan','Rusak_Berat'])->nullable();
            $table->string('dilakukan_oleh', 100)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemeliharaan_asets');
    }
};