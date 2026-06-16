<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rencana_kegiatan_anggarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tahun_anggaran_id');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('sumber_dana_id');
            $table->string('kode_kegiatan', 30);
            $table->string('nama_kegiatan', 200);
            $table->text('tujuan')->nullable();
            $table->text('sasaran')->nullable();
            $table->decimal('target_kuantitas', 10, 2)->nullable();
            $table->string('satuan_target', 50)->nullable();
            $table->decimal('total_pagu', 15, 2)->default(0);
            $table->enum('status', ['draft','diajukan','diverifikasi','disetujui','ditolak'])->default('draft');
            $table->unsignedBigInteger('diajukan_oleh')->nullable();
            $table->timestamp('diajukan_at')->nullable();
            $table->unsignedBigInteger('diverifikasi_oleh')->nullable();
            $table->timestamp('diverifikasi_at')->nullable();
            $table->unsignedBigInteger('disetujui_oleh')->nullable();
            $table->timestamp('disetujui_at')->nullable();
            $table->text('catatan_revisi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rencana_kegiatan_anggarans');
    }
};