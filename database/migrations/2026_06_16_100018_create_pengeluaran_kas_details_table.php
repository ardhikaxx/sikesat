<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengeluaran_kas_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengeluaran_id');
            $table->unsignedBigInteger('akun_id');
            $table->string('nama_item', 200)->nullable();
            $table->string('satuan', 50)->nullable();
            $table->decimal('jumlah_qty', 10, 2)->default(1);
            $table->decimal('harga_satuan', 15, 2)->default(0);
            $table->decimal('subtotal', 15, 2);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengeluaran_kas_details');
    }
};