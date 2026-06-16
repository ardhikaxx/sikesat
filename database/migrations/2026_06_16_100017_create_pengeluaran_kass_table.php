<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengeluaran_kass', function (Blueprint $table) {
            $table->id();
            $table->string('no_bukti', 30)->unique();
            $table->date('tanggal');
            $table->unsignedBigInteger('pengajuan_id')->nullable();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->enum('jenis_pengeluaran', ['Obat','Alkes','ATK','Operasional','Pemeliharaan','Jasa_Pegawai','Lainnya']);
            $table->unsignedBigInteger('sumber_dana_id');
            $table->unsignedBigInteger('rka_id')->nullable();
            $table->string('no_spd', 50)->nullable();
            $table->string('no_spm', 50)->nullable();
            $table->string('no_sp2d', 50)->nullable();
            $table->enum('metode_pembayaran', ['Tunai','Transfer','Giro'])->default('Transfer');
            $table->string('no_referensi', 50)->nullable();
            $table->decimal('jumlah_bruto', 15, 2);
            $table->decimal('pajak_ppn', 15, 2)->default(0);
            $table->decimal('pajak_pph', 15, 2)->default(0);
            $table->decimal('jumlah_neto', 15, 2);
            $table->text('keterangan')->nullable();
            $table->string('no_faktur', 50)->nullable();
            $table->date('tanggal_faktur')->nullable();
            $table->enum('status', ['draft','diverifikasi','disetujui','dibayar','void'])->default('draft');
            $table->enum('status_jurnal', ['belum','sudah'])->default('belum');
            $table->unsignedBigInteger('input_oleh');
            $table->unsignedBigInteger('diverifikasi_oleh')->nullable();
            $table->timestamp('diverifikasi_at')->nullable();
            $table->unsignedBigInteger('disetujui_oleh')->nullable();
            $table->timestamp('disetujui_at')->nullable();
            $table->unsignedBigInteger('dibayar_oleh')->nullable();
            $table->timestamp('dibayar_at')->nullable();
            $table->unsignedBigInteger('void_oleh')->nullable();
            $table->timestamp('void_at')->nullable();
            $table->text('alasan_void')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengeluaran_kass');
    }
};