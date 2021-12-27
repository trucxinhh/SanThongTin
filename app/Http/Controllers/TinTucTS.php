<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinTuc;
use App\Models\LoaiTin;
use Illuminate\Support\Facades\Auth;

class TinTucTS extends Controller
{
    function __construct()
    {
      if(Auth::check()){
        view()->share('nguoidung',Auth::user());
      }
    }
    public function tintuc(){
        $tintonghops = TinTuc::where('loaitin_id','=',1)->orderBy('created_at', 'desc')->paginate(10);
        $tintuyensinhs = TinTuc::where('loaitin_id','=',2)->orderBy('created_at', 'desc')->paginate(10);
        $tindiemsans = TinTuc::where('loaitin_id','=',6)->orderBy('created_at', 'desc')->paginate(10);
        $tinnoibat = TinTuc::where('NoiBat','=',1)->get();
        return view('tintuc.tintuc', compact('tintonghops','tintuyensinhs','tindiemsans','tinnoibat'));     
    }
    public function tintuc_chitiet(Request $request){
        $id = $request->id; 
        $tinnoibat = TinTuc::where('NoiBat','=',1)->get();
        
        $tintucs = TinTuc::where('Id','=',$id)->get();
        return view('tintuc.tinchitiet', compact('tintucs','tinnoibat'));
    }
}
