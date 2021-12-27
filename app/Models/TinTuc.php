<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    use HasFactory;
    protected $table = "TinTuc";
    public function loaitins()
    {
        return $this->belongsTo(LoaiTin::class,'loaitin_id','Id');
    }
}
