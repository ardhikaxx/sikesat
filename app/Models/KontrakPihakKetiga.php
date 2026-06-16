<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontrakPihakKetiga extends Model
{
    protected $guarded = [];
    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];
}
