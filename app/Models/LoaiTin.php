<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    use HasFactory;
    protected $table = "LoaiTin";
    public function tintucs(){
    	return $this->hasMany(TinTuc::class,'loaitin_id','Id');
    }
}
