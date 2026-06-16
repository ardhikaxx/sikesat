<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asets', function (Blueprint $table) {
            $table->id();
            $table->string('kode_aset', 30)->unique();
            $table->string('nama_aset', 150);
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->unsignedBigInteger('pengeluaran_detail_id')->nullable();
            $table->date('tanggal_perolehan');
            $table->decimal('nilai_perolehan', 15, 2);
            $table->integer('masa_manfaat_tahun')->default(0);
            $table->enum('metode_penyusutan', ['garis_lurus','saldo_menurun','tidak_disusutkan'])->default('garis_lurus');
            $table->decimal('akumulasi_penyusutan', 15, 2)->default(0);
            $table->decimal('nilai_buku', 15, 2);
            $table->enum('kondisi', ['Baik','Rusak_Ringan','Rusak_Berat','Hilang','Dihapus'])->default('Baik');
            $table->string('no_seri', 100)->nullable();
            $table->text('spesifikasi')->nullable();
            $table->string('lokasi_detail', 200)->nullable();
            $table->enum('status', ['Aktif','Tidak_Aktif','Dipinjam','Penghapusan'])->default('Aktif');
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asets');
    }
};