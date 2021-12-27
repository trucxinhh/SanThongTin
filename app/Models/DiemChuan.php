<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiemChuan extends Model
{
    use HasFactory;
    protected $table = "DiemChuan";
    public $timestamps = false;
    public function tuyensinhs()
    {
        return $this->hasOne(TuyenSinh::class);
    }
}
