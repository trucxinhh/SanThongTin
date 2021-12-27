<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuyenSinh extends Model
{
    use HasFactory;
    protected $table = "TuyenSinh";
    public $timestamps = false;
    public function truongs()
    {
        return $this->belongsTo(Truong::class,'MaTr','MaTr');
    }
    public function nganhs()
    {
        return $this->belongsTo(Nganh::class,'MaNg','MaNg');
    }
    public function diemchuans()
    {
        return $this->belongsTo(DiemChuan::class,'ID_DC','ID_DC');
    }
}
