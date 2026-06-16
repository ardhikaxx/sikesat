<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('survei_kepuasans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id');
            $table->tinyInteger('periode_bulan');
            $table->year('periode_tahun');
            $table->integer('jumlah_responden')->default(0);
            $table->decimal('skor_rata_rata', 4, 2)->default(0);
            $table->decimal('persentase_puas', 5, 2)->default(0);
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('input_oleh');
            $table->timestamps();
            $table->unique(['unit_id', 'periode_bulan', 'periode_tahun']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('survei_kepuasans');
    }
};