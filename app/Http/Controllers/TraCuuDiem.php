<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Truong;
use App\Models\Nganh;
use App\Models\TuyenSinh;
use App\Models\DiemChuan;
use App\Models\TinTuc;
use App\Models\LoaiTin;
use DB;
use Illuminate\Support\Facades\Auth;

class TraCuuDiem extends Controller
{
    function __construct()
    {
      if(Auth::check()){
        view()->share('nguoidung',Auth::user());
      }
    }
    public function Diem_Form(){
        $truong = DB::table('Truong')->select('MaTr','TenTr')->orderBy('TenTr')->get();    
        $nganh = DB::table('Nganhtt')->select('ID','TenChung')->orderBy('TenChung')->get();    
        return view('diemchuan.tracuunew',compact('truong','nganh'));
    }
    public function fetch(Request $request){
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = "MaNg";
        $dt = DB::table('TuyenSinh')
                ->join('Nganh', 'Nganh.MaNg', 'TuyenSinh.MaNg')
                ->select('TuyenSinh.MaNg','TenNg')
                ->where([
                            [$select, '=', $value],
                            // ['Nam', '=', '2020']
                        ])
                ->Distinct('TuyenSinh.MaNg','TenNg')
                ->orderBy('TenNg')->get();
        $output = '<option value="">'.ucfirst("--Chọn ngành--").'</option>';
        foreach ($dt as $row) {
            $output .= '<option value="'.$row->$dependent.'">'.$row->TenNg.'</option>';
        }
        echo $output;
    }
    
    public function Diem_PostForm1(Request $request){
        $truong = DB::table('Truong')->select('MaTr','TenTr')->orderBy('TenTr')->get();    
        $nganh = DB::table('Nganhtt')->select('ID','TenChung')->orderBy('TenChung')->get();
        $bieudo = $request->bieudo1;
        $chitieu = $request->chitieu1;
        $nam = $request->nam1;
        $matruong = $request->truong1;
        $tentruong = '';
        $data =[];
        $loi="";
        if (!empty($matruong) && !empty($nam)){
            $data = DB::table('TuyenSinh')
                    ->join('Truong', 'Truong.MaTr', 'TuyenSinh.MaTr')
                    ->join('Nganh', 'Nganh.MaNg', 'TuyenSinh.MaNg')
                    ->join('DiemChuan', 'DiemChuan.ID_DC', 'TuyenSinh.ID_DC')
                    ->where([
                            ['TuyenSinh.MaTr', '=', $matruong],
                            ['Nam', '=', $nam]
                        ])->get();
            $tentrg = Truong::where('MaTr', '=', $matruong)->get();
            foreach ($tentrg as $value) {
                $tentruong = $value->TenTr;
            }
        }
        else {
            $loi = "Không được để trống bất kỳ ô nào";
        }
        /*$i=0;
        foreach ($data as $row){
                $data_MaNg[$i] = $row->MaNg;
                $data_TenNg[$i] = $row->TenNg;
                $data_DiemChuan[$i] = $row->DiemChuan;
                $data_ChiTieu[$i] = $row->ChiTieu;
                $i++;
        }*/
        return view('diemchuan.ketquanew',compact('truong','nganh','data','loi','matruong','nam','bieudo','chitieu','tentruong'));
    }
    public function Diem_PostForm2(Request $request){
        $truong = DB::table('Truong')->select('MaTr','TenTr')->orderBy('TenTr')->get();    
        $nganh = DB::table('Nganhtt')->select('ID','TenChung')->orderBy('TenChung')->get();
        $bieudo = $request->bieudo2;
        $chitieu = $request->chitieu2;
        $nam = $request->nam2;
        $manganh = $request->nganh2;
        $tennganh = '';
        $data =[];
        $loi="";
        if (!empty($manganh) && !empty($nam)){
            $data = DB::table('TuyenSinh')
                    ->join('Truong', 'Truong.MaTr', 'TuyenSinh.MaTr')
                    ->join('DiemChuan', 'DiemChuan.ID_DC', 'TuyenSinh.ID_DC')
                    ->join('Nganh', 'Nganh.MaNg', 'TuyenSinh.MaNg')
                    ->join('Nganhtt', 'Nganhtt.ID', 'Nganh.ID')
                    ->select('TuyenSinh.MaTr','Truong.TenTr','Truong.HeDaoTao','Nganh.ID','Nganh.MaNg','Nganh.TenNg','TenChung','Nam','ChiTieu','HocPhi','KhoiThi','DiemChuan','DiemChuan.GhiChu')
                    ->where([
                            ['Nganh.ID', '=', $manganh],
                            ['Nam', '=', $nam]
                        ])->get();
            $tenng = DB::table('Nganhtt')->where('ID', '=', $manganh)->get();
            foreach ($tenng as $value) {
                $tennganh = $value->TenChung;
            }
        }
        else {
            $loi = "Không được để trống bất kỳ ô nào";
        }
        
        return view('diemchuan.ketquanew',compact('truong','nganh','data','loi','manganh','nam','bieudo','chitieu','tennganh'));
    }
    public function Diem_PostForm3(Request $request){
        $truong = DB::table('Truong')->select('MaTr','TenTr')->orderBy('TenTr')->get();    
        $nganh = DB::table('Nganhtt')->select('ID','TenChung')->orderBy('TenChung')->get();
        $bieudo = $request->bieudo3;
        $chitieu = $request->chitieu3;
        $matruong = $request->truong3;
        $manganh = $request->nganh3;
        $tennganh = '';
        $tentruong = '';
        $data =[];
        $loi="";
        if (!empty($manganh) && !empty($matruong)){
            // $data = DB::table('TuyenSinh')
            //         ->join('DiemChuan', 'DiemChuan.ID_DC', 'TuyenSinh.ID_DC')
            $data = DB::table('TuyenSinh')
                    ->join('Truong', 'Truong.MaTr', 'TuyenSinh.MaTr')
                    ->join('Nganh', 'Nganh.MaNg', 'TuyenSinh.MaNg')
                    ->join('DiemChuan', 'DiemChuan.ID_DC', 'TuyenSinh.ID_DC')
                    ->where([
                            ['TuyenSinh.MaNg', '=', $manganh],
                            ['TuyenSinh.MaTr', '=', $matruong],
                            ['Nam', '!=', '2021']
                        ])->get();
            $tenng = Nganh::where('MaNg', '=', $manganh)->get();
            foreach ($tenng as $value) {
                $tennganh = $value->TenNg;
            }
            $tentrg = Truong::where('MaTr', '=', $matruong)->get();
            foreach ($tentrg as $value) {
                $tentruong = $value->TenTr;
            }
        }
        else {
            $loi = "Không được để trống bất kỳ ô nào";
        }
        
        return view('diemchuan.ketquanew',compact('truong','nganh','data','loi','manganh','matruong','bieudo','chitieu','tentruong','tennganh'));
    }
    public function Diem_PostForm4(Request $request){
        $truong = DB::table('Truong')->select('MaTr','TenTr')->orderBy('TenTr')->get();    
        $nganh = DB::table('Nganhtt')->select('ID','TenChung')->orderBy('TenChung')->get();
        $bieudo = $request->bieudo4;
        $chitieu = $request->chitieu4;
        $matruong =  $request->truong4;
        $data =[];
        $loi="";
        $form4="";
        if (!empty($matruong)){
            $data = DB::table('TuyenSinh')
                    ->join('Truong', 'Truong.MaTr', 'TuyenSinh.MaTr')
                    ->join('Nganh', 'Nganh.MaNg', 'TuyenSinh.MaNg')
                    ->join('DiemChuan', 'DiemChuan.ID_DC', 'TuyenSinh.ID_DC')
                    ->where([
                            ['TuyenSinh.MaTr', '=', $matruong]
                        ])->get();
        }
        else {
            $loi = "Không được để trống bất kỳ ô nào";
        }
        $i=0;
        foreach ($data as $row){
                $data_Nam[$i] = $row->Nam;
                $data_MaNg[$i] = $row->MaNg;
                $data_TenNg[$i] = $row->TenNg;
                $data_DiemChuan[$i] = $row->DiemChuan;
                $data_ChiTieu[$i] = $row->ChiTieu;
                $i++;
        }
        return view('diemchuan.ketquanew',compact('truong','nganh','data','loi','matruong','bieudo','chitieu','data_Nam','data_ChiTieu','data_DiemChuan','data_TenNg','data_MaNg','form4'));
    }
    public function Diem_PostForm5(Request $request){
        $truong = DB::table('Truong')->select('MaTr','TenTr')->orderBy('TenTr')->get();    
        $nganh = DB::table('Nganhtt')->select('ID','TenChung')->orderBy('TenChung')->get();
        
        $bieudo = $request->bieudo1;
        $chitieu = $request->chitieu1;
        $nam = $request->nam1;
        $matruong = $request->truong1;
        $tentruong = '';
        $data =[];
        $loi="";
        if (!empty($matruong) && !empty($nam)){
            $data = TuyenSinh::where([
                            ['MaTr', '=', $matruong],
                            ['Nam', '=', $nam]
                        ])->get();
            $tentrg = Truong::where('MaTr', '=', $matruong)->get();
            foreach ($tentrg as $value) {
                $tentruong = $value->TenTr;
            }
        }
        else {
            $loi = "Không được để trống bất kỳ ô nào";
        }

        return view('diemchuan.ketquatest',compact('truong','nganh','matruong','nam','bieudo','chitieu','data','loi','tentruong'));

    }

}
