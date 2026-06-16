<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('jaspel_perhitungans', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('periode_bulan');
            $table->year('periode_tahun');
            $table->enum('sumber_dana', ['BPJS','Umum','BOK']);
            $table->decimal('total_dana', 15, 2);
            $table->enum('status', ['draft','verifikasi_ppk','approved_kepala','dicairkan'])->default('draft');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('jaspel_perhitungans');
    }
};