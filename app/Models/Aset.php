<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    //
    protected $table = 'asets';

    public function kategori()
    {
        return $this->belongsTo(KategoriAset::class, 'kategori_id');
    }
}
