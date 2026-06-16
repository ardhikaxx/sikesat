<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('billing_pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('no_invoice')->unique();
            $table->unsignedBigInteger('pasien_id');
            $table->date('tanggal');
            $table->decimal('total_tagihan', 15, 2)->default(0);
            $table->enum('status', ['Belum Bayar', 'Lunas'])->default('Belum Bayar');
            $table->string('metode_pembayaran')->nullable();
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('penerimaan_kas_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing_pasiens');
    }
};
