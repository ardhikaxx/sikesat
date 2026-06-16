<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kunjungan_pasiens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id');
            $table->date('tanggal');
            $table->integer('jumlah_kunjungan_umum')->default(0);
            $table->integer('jumlah_kunjungan_bpjs')->default(0);
            $table->integer('jumlah_kunjungan_gratis')->default(0);
            $table->integer('total_kunjungan')->default(0);
            $table->decimal('rata_waktu_tunggu', 5, 2)->default(0);
            $table->unsignedBigInteger('input_oleh');
            $table->timestamps();
            $table->unique(['unit_id', 'tanggal']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kunjungan_pasiens');
    }
};