<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifikasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('judul', 200);
            $table->text('pesan');
            $table->enum('jenis', ['info','sukses','peringatan','bahaya'])->default('info');
            $table->string('referensi_modul', 50)->nullable();
            $table->unsignedBigInteger('referensi_id')->nullable();
            $table->tinyInteger('sudah_dibaca')->default(0);
            $table->timestamp('dibaca_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifikasis');
    }
};