<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jurnal_umums', function (Blueprint $table) {
            $table->id();
            $table->string('no_jurnal', 30)->unique();
            $table->date('tanggal');
            $table->enum('jenis_jurnal', ['umum','penyesuaian','penutup','koreksi','pembuka'])->default('umum');
            $table->enum('sumber', ['penerimaan','pengeluaran','pengadaan','penyesuaian','manual','penutup','pembuka']);
            $table->unsignedBigInteger('referensi_id')->nullable();
            $table->string('referensi_tipe', 50)->nullable();
            $table->string('no_bukti_sumber', 50)->nullable();
            $table->text('keterangan');
            $table->decimal('total_debit', 15, 2)->default(0);
            $table->decimal('total_kredit', 15, 2)->default(0);
            $table->enum('status', ['draft','posted','void'])->default('draft');
            $table->unsignedBigInteger('dibuat_oleh');
            $table->unsignedBigInteger('diposting_oleh')->nullable();
            $table->timestamp('diposting_at')->nullable();
            $table->unsignedBigInteger('void_oleh')->nullable();
            $table->timestamp('void_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jurnal_umums');
    }
};