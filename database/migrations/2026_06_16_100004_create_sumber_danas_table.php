<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sumber_danas', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20)->unique();
            $table->string('nama', 100);
            $table->enum('jenis', ['APBD','APBN','BPJS_Kapitasi','BPJS_Non_Kapitasi','BOK','Hibah','PAD','Lainnya']);
            $table->year('tahun_anggaran');
            $table->decimal('total_pagu', 15, 2)->default(0);
            $table->text('keterangan')->nullable();
            $table->tinyInteger('is_aktif')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sumber_danas');
    }
};