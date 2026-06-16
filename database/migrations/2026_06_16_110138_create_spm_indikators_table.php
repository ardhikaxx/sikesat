<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('spm_indikators', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_layanan', 150);
            $table->string('indikator', 255);
            $table->decimal('standar_persentase', 5, 2);
            $table->tinyInteger('is_aktif')->default(1);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('spm_indikators');
    }
};