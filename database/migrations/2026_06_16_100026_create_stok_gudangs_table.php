<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stok_gudangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('obat_alkes_id');
            $table->string('no_batch', 50)->nullable();
            $table->date('tanggal_kedaluwarsa')->nullable();
            $table->decimal('jumlah_masuk', 10, 2)->default(0);
            $table->decimal('jumlah_keluar', 10, 2)->default(0);
            $table->decimal('stok_tersedia', 10, 2)->default(0);
            $table->decimal('harga_perolehan', 15, 2)->default(0);
            $table->unsignedBigInteger('pengeluaran_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stok_gudangs');
    }
};