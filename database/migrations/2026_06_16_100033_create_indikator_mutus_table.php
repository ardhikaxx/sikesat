<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('indikator_mutus', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20)->unique();
            $table->string('nama', 150);
            $table->string('satuan', 50);
            $table->enum('jenis', ['waktu_tunggu','kepuasan','kunjungan','ketersediaan_obat','lainnya']);
            $table->decimal('target_nilai', 10, 2)->nullable();
            $table->enum('arah_target', ['min','max','range'])->default('max');
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->tinyInteger('is_aktif')->default(1);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('indikator_mutus');
    }
};