<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('akun_akuntansis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_akun', 20)->unique();
            $table->string('nama_akun', 150);
            $table->enum('jenis_akun', ['aset','kewajiban','ekuitas','pendapatan','beban']);
            $table->enum('kelompok_akun', ['aset_lancar','aset_tetap','aset_lainnya','kewajiban_jangka_pendek','kewajiban_jangka_panjang','ekuitas','pendapatan_lra','pendapatan_lo','beban']);
            $table->unsignedBigInteger('akun_induk_id')->nullable();
            $table->tinyInteger('level')->default(1);
            $table->enum('saldo_normal', ['debit','kredit']);
            $table->tinyInteger('is_aktif')->default(1);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('akun_akuntansis');
    }
};