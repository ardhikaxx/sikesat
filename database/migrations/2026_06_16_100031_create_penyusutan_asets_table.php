<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penyusutan_asets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aset_id');
            $table->tinyInteger('periode_bulan');
            $table->year('periode_tahun');
            $table->decimal('nilai_penyusutan', 15, 2);
            $table->decimal('akumulasi_penyusutan', 15, 2);
            $table->decimal('nilai_buku_sesudah', 15, 2);
            $table->unsignedBigInteger('jurnal_id')->nullable();
            $table->timestamps();
            $table->unique(['aset_id', 'periode_bulan', 'periode_tahun']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penyusutan_asets');
    }
};