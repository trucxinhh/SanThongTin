<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truong extends Model
{
    use HasFactory;
    protected $table = "Truong";
    public $timestamps = false;
    public function tuyensinhs(){
    	return $this->hasMany(TuyenSinh::class,'MaTr','MaTr');
    }
    public function nganhs()
    {
        return $this->hasManyThrough(TuyenSinh::class, Nganh::class);
    }
    public function diems()
    {
        return $this->hasManyThrough(TuyenSinh::class, DiemChuan::class);
    }
    public function truongpts(){
        return $this->hasMany(Truongpt::class,'MaTr','MaTr');
    }
}
