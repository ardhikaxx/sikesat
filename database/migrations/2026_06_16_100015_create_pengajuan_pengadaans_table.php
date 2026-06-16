<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuan_pengadaans', function (Blueprint $table) {
            $table->id();
            $table->string('no_pengajuan', 30)->unique();
            $table->date('tanggal_pengajuan');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('rka_id')->nullable();
            $table->enum('jenis_pengadaan', ['Obat','Alkes','ATK','Operasional','Pemeliharaan','Jasa','Lainnya']);
            $table->enum('prioritas', ['rendah','sedang','tinggi','urgent'])->default('sedang');
            $table->text('deskripsi');
            $table->decimal('total_estimasi', 15, 2)->default(0);
            $table->enum('status', ['draft','diajukan','diverifikasi','disetujui','proses_pengadaan','selesai','ditolak'])->default('draft');
            $table->unsignedBigInteger('diajukan_oleh');
            $table->unsignedBigInteger('diverifikasi_oleh')->nullable();
            $table->timestamp('diverifikasi_at')->nullable();
            $table->unsignedBigInteger('disetujui_oleh')->nullable();
            $table->timestamp('disetujui_at')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_pengadaans');
    }
};