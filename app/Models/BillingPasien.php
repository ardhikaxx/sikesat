<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingPasien extends Model
{
    protected $guarded = [];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function items()
    {
        return $this->hasMany(BillingItem::class, 'billing_id');
    }

    public function penerimaan_kas()
    {
        return $this->belongsTo(PenerimaanKas::class);
    }
}
