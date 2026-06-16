<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class JaspelDetail extends Model { protected $guarded = ['id']; public function perhitungan() { return $this->belongsTo(JaspelPerhitungan::class, 'jaspel_perhitungan_id'); } public function pegawai() { return $this->belongsTo(Pegawai::class); } }