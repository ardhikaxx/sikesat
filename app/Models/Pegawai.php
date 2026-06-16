<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $guarded = [];
    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_masuk' => 'date',
        'tanggal_berakhir_str' => 'date',
        'tanggal_berakhir_sip' => 'date',
    ];
    public function unit()
    {
        return $this->belongsTo(UnitPelayanan::class, 'unit_id');
    }
}
