<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('distribusi_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('distribusi_id');
            $table->unsignedBigInteger('obat_alkes_id');
            $table->unsignedBigInteger('stok_gudang_id')->nullable();
            $table->decimal('jumlah', 10, 2);
            $table->string('satuan', 30);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('distribusi_details');
    }
};