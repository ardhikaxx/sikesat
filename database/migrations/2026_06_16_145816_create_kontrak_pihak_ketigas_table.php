<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kontrak_pihak_ketigas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kontrak')->unique();
            $table->string('nama_vendor');
            $table->enum('jenis_kontrak', ['KSO_Alat', 'Limbah_B3', 'IT_System', 'Jasa_Keamanan', 'Jasa_Kebersihan', 'Lainnya']);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->decimal('nilai_kontrak', 15, 2)->default(0);
            $table->text('keterangan')->nullable();
            $table->enum('status', ['Aktif', 'Selesai', 'Dihentikan'])->default('Aktif');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontrak_pihak_ketigas');
    }
};
