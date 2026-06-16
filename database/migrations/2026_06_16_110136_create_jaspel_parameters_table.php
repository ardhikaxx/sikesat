<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('jaspel_parameters', function (Blueprint $table) {
            $table->id();
            $table->string('nama_parameter', 100);
            $table->decimal('bobot', 5, 2)->default(0.00);
            $table->tinyInteger('is_aktif')->default(1);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('jaspel_parameters');
    }
};