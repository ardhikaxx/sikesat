<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('periode_tutup_bukus', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('periode_bulan');
            $table->year('periode_tahun');
            $table->enum('status', ['terbuka','ditutup'])->default('terbuka');
            $table->unsignedBigInteger('ditutup_oleh')->nullable();
            $table->timestamp('ditutup_at')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
            $table->unique(['periode_bulan', 'periode_tahun']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('periode_tutup_bukus');
    }
};