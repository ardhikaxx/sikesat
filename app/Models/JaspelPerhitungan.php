<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class JaspelPerhitungan extends Model { protected $guarded = ['id']; public function details() { return $this->hasMany(JaspelDetail::class); } }