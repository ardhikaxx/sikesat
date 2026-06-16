<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenerimaanKas extends Model
{
    protected $guarded = [];
    //
    protected $table = 'penerimaan_kass';

    public function sumber_dana()
    {
        return $this->belongsTo(SumberDana::class, 'sumber_dana_id');
    }

    public function unit()
    {
        return $this->belongsTo(UnitPelayanan::class, 'unit_id');
    }
}
