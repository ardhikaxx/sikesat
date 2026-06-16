<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rencana_bisnis_anggarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tahun_anggaran_id');
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->enum('jenis', ['pendapatan','belanja']);
            $table->unsignedBigInteger('akun_id');
            $table->unsignedBigInteger('sumber_dana_id');
            $table->decimal('target_triwulan_1', 15, 2)->default(0);
            $table->decimal('target_triwulan_2', 15, 2)->default(0);
            $table->decimal('target_triwulan_3', 15, 2)->default(0);
            $table->decimal('target_triwulan_4', 15, 2)->default(0);
            $table->decimal('total_target', 15, 2)->default(0);
            $table->enum('status', ['draft','diajukan','disetujui','ditolak'])->default('draft');
            $table->unsignedBigInteger('disetujui_oleh')->nullable();
            $table->timestamp('disetujui_at')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rencana_bisnis_anggarans');
    }
};