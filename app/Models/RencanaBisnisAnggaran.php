<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RencanaBisnisAnggaran extends Model
{
    //
    protected $table = 'rencana_bisnis_anggarans';

    public function tahun_anggaran()
    {
        return $this->belongsTo(TahunAnggaran::class, 'tahun_anggaran_id');
    }

    public function sumber_dana()
    {
        return $this->belongsTo(SumberDana::class, 'sumber_dana_id');
    }

    public function unit()
    {
        return $this->belongsTo(UnitPelayanan::class, 'unit_id');
    }
}
