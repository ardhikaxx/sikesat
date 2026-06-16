<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengeluaranKas extends Model
{
    //
    protected $table = 'pengeluaran_kass';

    public function sumber_dana()
    {
        return $this->belongsTo(SumberDana::class, 'sumber_dana_id');
    }
}
