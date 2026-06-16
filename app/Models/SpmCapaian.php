<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class SpmCapaian extends Model { protected $guarded = ['id']; public function indikator() { return $this->belongsTo(SpmIndikator::class, 'spm_indikator_id'); } }