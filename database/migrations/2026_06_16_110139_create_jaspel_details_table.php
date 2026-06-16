<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('jaspel_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jaspel_perhitungan_id');
            $table->unsignedBigInteger('pegawai_id');
            $table->decimal('skor_total', 8, 2)->default(0);
            $table->decimal('nominal_diterima', 15, 2)->default(0);
            $table->timestamps();
            $table->foreign('jaspel_perhitungan_id')->references('id')->on('jaspel_perhitungans')->onDelete('cascade');
            $table->foreign('pegawai_id')->references('id')->on('pegawais')->onDelete('cascade');
        });
    }
    public function down(): void {
        Schema::dropIfExists('jaspel_details');
    }
};