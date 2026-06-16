<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class SpmIndikator extends Model { protected $guarded = ['id']; public function capaians() { return $this->hasMany(SpmCapaian::class); } }