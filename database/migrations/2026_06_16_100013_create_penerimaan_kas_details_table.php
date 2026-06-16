<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penerimaan_kas_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penerimaan_id');
            $table->unsignedBigInteger('akun_id');
            $table->string('jenis_layanan', 100)->nullable();
            $table->decimal('jumlah', 15, 2);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penerimaan_kas_details');
    }
};