<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm', 20)->unique();
            $table->string('nik', 20)->unique()->nullable();
            $table->string('nama', 100);
            $table->enum('jenis_kelamin', ['L','P'])->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_telepon', 20)->nullable();
            $table->enum('jenis_pasien', ['Umum','BPJS','Gratis'])->default('Umum');
            $table->string('no_bpjs', 20)->nullable();
            $table->string('faskes_tingkat_satu', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};