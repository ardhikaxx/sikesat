<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('distribusi_ke_units', function (Blueprint $table) {
            $table->id();
            $table->string('no_distribusi', 30)->unique();
            $table->date('tanggal');
            $table->unsignedBigInteger('unit_tujuan_id');
            $table->enum('status', ['draft','dikirim','diterima'])->default('draft');
            $table->unsignedBigInteger('dikirim_oleh')->nullable();
            $table->unsignedBigInteger('diterima_oleh')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('distribusi_ke_units');
    }
};