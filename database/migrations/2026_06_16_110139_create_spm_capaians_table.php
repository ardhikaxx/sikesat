<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('spm_capaians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('spm_indikator_id');
            $table->tinyInteger('periode_bulan');
            $table->year('periode_tahun');
            $table->decimal('nilai_capaian', 5, 2);
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->foreign('spm_indikator_id')->references('id')->on('spm_indikators')->onDelete('cascade');
        });
    }
    public function down(): void {
        Schema::dropIfExists('spm_capaians');
    }
};