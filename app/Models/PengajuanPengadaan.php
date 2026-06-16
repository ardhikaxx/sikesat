<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanPengadaan extends Model
{
    protected $guarded = [];

    public function unit()
    {
        return $this->belongsTo(UnitPelayanan::class, 'unit_id');
    }

    public function pengaju()
    {
        return $this->belongsTo(User::class, 'diajukan_oleh');
    }

    public function verifikator()
    {
        return $this->belongsTo(User::class, 'diverifikasi_oleh');
    }

    public function penyetuju()
    {
        return $this->belongsTo(User::class, 'disetujui_oleh');
    }

    public function items()
    {
        return $this->hasMany(PengajuanPengadaanItem::class, 'pengajuan_id');
    }
}
