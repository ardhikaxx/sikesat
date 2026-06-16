<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    //
    public function unit()
    {
        return $this->belongsTo(UnitPelayanan::class, 'unit_id');
    }
}
