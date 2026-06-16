<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('obat_alkes', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 30)->unique();
            $table->string('nama_generik', 150);
            $table->string('nama_dagang', 150)->nullable();
            $table->unsignedBigInteger('kategori_id');
            $table->string('satuan', 30);
            $table->string('satuan_terkecil', 30)->nullable();
            $table->integer('konversi')->default(1);
            $table->unsignedBigInteger('akun_persediaan_id')->nullable();
            $table->integer('stok_minimum')->default(0);
            $table->integer('stok_maksimum')->default(0);
            $table->string('lokasi_penyimpanan', 100)->nullable();
            $table->string('suhu_penyimpanan', 50)->nullable();
            $table->enum('golongan', ['Bebas','Bebas_Terbatas','Keras','Narkotika','Psikotropika','Non_Obat'])->default('Bebas');
            $table->tinyInteger('is_aktif')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('obat_alkes');
    }
};