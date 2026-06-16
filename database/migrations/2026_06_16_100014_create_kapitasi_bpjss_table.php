<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kapitasi_bpjss', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penerimaan_id')->nullable();
            $table->tinyInteger('bulan');
            $table->year('tahun');
            $table->integer('jumlah_peserta')->default(0);
            $table->decimal('tarif_per_peserta', 10, 2)->default(0);
            $table->decimal('total_kapitasi', 15, 2)->default(0);
            $table->date('tanggal_terima')->nullable();
            $table->string('no_spm', 50)->nullable();
            $table->timestamps();
            $table->unique(['bulan', 'tahun']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kapitasi_bpjss');
    }
};