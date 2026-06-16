<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('realisasi_indikator_mutus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('indikator_id');
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->tinyInteger('periode_bulan');
            $table->year('periode_tahun');
            $table->decimal('nilai_realisasi', 10, 2);
            $table->decimal('nilai_target', 10, 2)->nullable();
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('input_oleh');
            $table->timestamps();
            $table->unique(['indikator_id', 'unit_id', 'periode_bulan', 'periode_tahun'], 'real_ind_mutu_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('realisasi_indikator_mutus');
    }
};