<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penerimaan_kass', function (Blueprint $table) {
            $table->id();
            $table->string('no_bukti', 30)->unique();
            $table->date('tanggal');
            $table->enum('jenis_penerimaan', ['Layanan_Umum','BPJS_Kapitasi','BPJS_Non_Kapitasi','BOK','Hibah','APBD','Lainnya']);
            $table->unsignedBigInteger('sumber_dana_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->unsignedBigInteger('pasien_id')->nullable();
            $table->decimal('jumlah', 15, 2);
            $table->enum('metode_pembayaran', ['Tunai','Transfer','QRIS'])->default('Tunai');
            $table->string('no_referensi', 50)->nullable();
            $table->text('keterangan')->nullable();
            $table->enum('status', ['draft','posted','void'])->default('draft');
            $table->enum('status_jurnal', ['belum','sudah'])->default('belum');
            $table->unsignedBigInteger('input_oleh');
            $table->unsignedBigInteger('diverifikasi_oleh')->nullable();
            $table->timestamp('diverifikasi_at')->nullable();
            $table->unsignedBigInteger('void_oleh')->nullable();
            $table->timestamp('void_at')->nullable();
            $table->text('alasan_void')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penerimaan_kass');
    }
};