<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('unit_pelayanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20)->unique();
            $table->string('nama', 100);
            $table->enum('jenis', ['rawat_jalan','rawat_inap','penunjang','administrasi','farmasi']);
            $table->string('kepala_unit', 100)->nullable();
            $table->tinyInteger('is_aktif')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unit_pelayanans');
    }
};