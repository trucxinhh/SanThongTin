<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nganhtt extends Model
{
    use HasFactory;
    protected $table = "Nganhtt";
    public $timestamps = false;
    public function nganhs(){
        return $this->hasMany(Nganh::class,'MaThongTin','MaThongTin');
    }
}
