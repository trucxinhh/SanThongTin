<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nganh extends Model
{
    use HasFactory;
    protected $table = "Nganh";
    public $timestamps = false;
    public function tuyensinhs(){
    	return $this->hasMany(TuyenSinh::class,'MaNg','MaNg');
    }
    public function truongs()
    {
        return $this->hasManyThrough(TuyenSinh::class, Truong::class);
    }
    public function nganhtts()
    {
        return $this->belongsTo(Nganhtt::class,'MaThongTin','MaThongTin');
    }
}
