<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingItem extends Model
{
    protected $guarded = [];

    public function billing()
    {
        return $this->belongsTo(BillingPasien::class, 'billing_id');
    }

    public function obat()
    {
        return $this->belongsTo(ObatAlkes::class, 'obat_id');
    }
}
