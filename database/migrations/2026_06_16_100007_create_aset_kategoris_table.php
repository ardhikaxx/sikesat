<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aset_kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20)->unique();
            $table->string('nama', 100);
            $table->enum('jenis', ['Tanah','Gedung','Peralatan','Kendaraan','Aset_Lainnya']);
            $table->integer('masa_manfaat_tahun')->default(0);
            $table->decimal('tarif_penyusutan', 5, 2)->default(0);
            $table->unsignedBigInteger('akun_perolehan_id')->nullable();
            $table->unsignedBigInteger('akun_penyusutan_id')->nullable();
            $table->unsignedBigInteger('akun_akumulasi_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aset_kategoris');
    }
};