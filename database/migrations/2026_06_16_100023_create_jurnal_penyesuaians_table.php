<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jurnal_penyesuaians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tahun_anggaran_id');
            $table->date('tanggal');
            $table->enum('jenis', ['akrual_pendapatan','akrual_beban','penyusutan','persediaan','lainnya']);
            $table->text('keterangan');
            $table->enum('status', ['draft','disetujui','posted'])->default('draft');
            $table->unsignedBigInteger('disetujui_oleh')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jurnal_penyesuaians');
    }
};