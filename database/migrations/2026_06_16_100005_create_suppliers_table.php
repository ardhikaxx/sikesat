<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20)->unique();
            $table->string('nama', 100);
            $table->enum('jenis', ['Obat','Alkes','ATK','Makanan','Jasa','Lainnya']);
            $table->text('alamat')->nullable();
            $table->string('no_telepon', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('NPWP', 30)->nullable();
            $table->string('nama_rekening', 100)->nullable();
            $table->string('no_rekening', 30)->nullable();
            $table->string('nama_bank', 50)->nullable();
            $table->tinyInteger('is_aktif')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};