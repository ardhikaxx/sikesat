<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rka_rincians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rka_id');
            $table->unsignedBigInteger('akun_id');
            $table->text('uraian');
            $table->decimal('volume', 10, 2)->default(1);
            $table->string('satuan', 50)->nullable();
            $table->decimal('harga_satuan', 15, 2)->default(0);
            $table->decimal('total', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rka_rincians');
    }
};