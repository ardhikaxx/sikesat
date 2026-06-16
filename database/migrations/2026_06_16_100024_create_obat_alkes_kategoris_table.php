<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('obat_alkes_kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20)->unique();
            $table->string('nama', 100);
            $table->enum('jenis', ['Obat','Alkes','BHP','Reagent','Lainnya']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('obat_alkes_kategoris');
    }
};