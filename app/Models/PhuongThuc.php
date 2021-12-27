<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhuongThuc extends Model
{
    use HasFactory;
    protected $table = "PhuongThuc";
    public $timestamps = false;
    public function truongpts(){
        return $this->hasMany(Truongpt::class,'MaPhgThuc','MaPhgThuc');
    }
}
