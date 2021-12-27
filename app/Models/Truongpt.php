<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truongpt extends Model
{
    use HasFactory;
    protected $table = "Truongpt";
    public $timestamps = false;
    public function truongs()
    {
        return $this->belongsTo(Truong::class,'MaTr','MaTr');
    }
    public function phuongthucs()
    {
        return $this->belongsTo(PhuongThuc::class,'MaPhgThuc','MaPhgThuc');
    }
}
