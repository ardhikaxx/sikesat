<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('neraca_saldos', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('periode_bulan');
            $table->year('periode_tahun');
            $table->unsignedBigInteger('akun_id');
            $table->decimal('saldo_awal_debit', 15, 2)->default(0);
            $table->decimal('saldo_awal_kredit', 15, 2)->default(0);
            $table->decimal('mutasi_debit', 15, 2)->default(0);
            $table->decimal('mutasi_kredit', 15, 2)->default(0);
            $table->decimal('saldo_akhir_debit', 15, 2)->default(0);
            $table->decimal('saldo_akhir_kredit', 15, 2)->default(0);
            $table->timestamps();
            $table->unique(['periode_bulan', 'periode_tahun', 'akun_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('neraca_saldos');
    }
};