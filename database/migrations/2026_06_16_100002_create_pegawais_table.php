<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nip', 30)->unique()->nullable();
            $table->string('nama', 100);
            $table->enum('jenis_kelamin', ['L','P'])->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_telepon', 20)->nullable();
            $table->string('jabatan', 100)->nullable();
            $table->string('golongan', 10)->nullable();
            $table->enum('jenis_pegawai', ['PNS','PPPK','Kontrak','Honorer'])->default('PNS');
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->tinyInteger('status_aktif')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};