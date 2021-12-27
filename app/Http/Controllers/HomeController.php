<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinTuc;
use App\Models\LoaiTin;
use App\Models\Truong;
use App\Models\Truongpt;
use App\Models\Nganh;
use App\Models\Nganhtt;
use App\Models\TuyenSinh;
use App\Models\DiemChuan;
use App\Models\PhuongThuc;
use DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function __construct()
    {
      if(Auth::check()){
        view()->share('nguoidung',Auth::user());
      }
    }
    public function index(){
    	$tintonghops = TinTuc::where('loaitin_id','=',1)->orderBy('created_at', 'desc')->paginate(5);
    	$tintuyensinhs = TinTuc::where('loaitin_id','=',2)->orderBy('created_at', 'desc')->paginate(5);
    	$tindiemsans = TinTuc::where('loaitin_id','=',6)->orderBy('created_at', 'desc')->paginate(5);
    	return view('pages.trangchu', compact('tintonghops','tintuyensinhs','tindiemsans'));
    }
    public function nganhnghe(){
        $Baochi = DB::table('Nganh')
                ->join('Nganhtt', 'Nganhtt.ID', 'Nganh.ID')
                ->select('KhoiNganh','Nganhtt.ID','TenChung')
                ->where('KhoiNganh','=',"Báo chí - Truyền thông - Truyền hình")
                ->groupby('KhoiNganh')
                ->groupby('ID')->groupby('TenChung')->orderBy('TenChung', 'asc')->get();
        $Congan = DB::table('Nganh')
                ->join('Nganhtt', 'Nganhtt.ID', 'Nganh.ID')
                ->select('KhoiNganh','Nganhtt.ID','TenChung')
                ->where('KhoiNganh','=',"Công an - Quân đội")
                ->groupby('KhoiNganh')->groupby('ID')->groupby('TenChung')->orderBy('TenChung', 'asc')->get(); 
        $Dulich = DB::table('Nganh')
                ->join('Nganhtt', 'Nganhtt.ID', 'Nganh.ID')
                ->select('KhoiNganh','Nganhtt.ID','TenChung')
                ->where('KhoiNganh','=',"Du lịch - Vận tải")
                ->groupby('KhoiNganh')->groupby('ID')->groupby('TenChung')->orderBy('TenChung', 'asc')->get(); 
        $Kientruc = DB::table('Nganh')
                ->join('Nganhtt', 'Nganhtt.ID', 'Nganh.ID')
                ->select('KhoiNganh','Nganhtt.ID','TenChung')
                ->where('KhoiNganh','=',"Kiến trúc - Xây dựng")
                ->groupby('KhoiNganh')->groupby('ID')->groupby('TenChung')->orderBy('TenChung', 'asc')->get(); 
        $kinhte = DB::table('Nganh')
                ->join('Nganhtt', 'Nganhtt.ID', 'Nganh.ID')
                ->select('KhoiNganh','Nganhtt.ID','TenChung')
                ->where('KhoiNganh','=',"Kinh tế - Quản lý")
                ->groupby('KhoiNganh')->groupby('ID')->groupby('TenChung')->orderBy('TenChung', 'asc')->get(); 
        $kythuat = DB::table('Nganh')
                ->join('Nganhtt', 'Nganhtt.ID', 'Nganh.ID')
                ->select('KhoiNganh','Nganhtt.ID','TenChung')
                ->where('KhoiNganh','=',"Kỹ thuật - Công nghệ")
                ->groupby('KhoiNganh')->groupby('ID')->groupby('TenChung')->orderBy('TenChung', 'asc')->get();
        $luat = DB::table('Nganh')
                ->join('Nganhtt', 'Nganhtt.ID', 'Nganh.ID')
                ->select('KhoiNganh','Nganhtt.ID','TenChung')
                ->where('KhoiNganh','=',"Luật")
                ->groupby('KhoiNganh')->groupby('ID')->groupby('TenChung')->orderBy('TenChung', 'asc')->get(); 
        $maytinh = DB::table('Nganh')
                ->join('Nganhtt', 'Nganhtt.ID', 'Nganh.ID')
                ->select('KhoiNganh','Nganhtt.ID','TenChung')
                ->where('KhoiNganh','=',"Máy tính - Công nghệ thông tin")
                ->groupby('KhoiNganh')->groupby('ID')->groupby('TenChung')->orderBy('TenChung', 'asc')->get(); 
        $moitruong = DB::table('Nganh')
                ->join('Nganhtt', 'Nganhtt.ID', 'Nganh.ID')
                ->select('KhoiNganh','Nganhtt.ID','TenChung')
                ->where('KhoiNganh','=',"Môi trường - Năng lượng")
                ->groupby('KhoiNganh')->groupby('ID')->groupby('TenChung')->orderBy('TenChung', 'asc')->get(); 
        $amnhac = DB::table('Nganh')
                ->join('Nganhtt', 'Nganhtt.ID', 'Nganh.ID')
                ->select('KhoiNganh','Nganhtt.ID','TenChung')
                ->where('KhoiNganh','=',"Năng khiếu Âm nhạc - Mỹ thuật")
                ->groupby('KhoiNganh')->groupby('ID')->groupby('TenChung')->orderBy('TenChung', 'asc')->get();
        $nonglam = DB::table('Nganh')
                ->join('Nganhtt', 'Nganhtt.ID', 'Nganh.ID')
                ->select('KhoiNganh','Nganhtt.ID','TenChung')
                ->where('KhoiNganh','=',"Nông - Lâm - Ngư")
                ->groupby('KhoiNganh')->groupby('ID')->groupby('TenChung')->orderBy('TenChung', 'asc')->get();
        $supham = DB::table('Nganh')
                ->join('Nganhtt', 'Nganhtt.ID', 'Nganh.ID')
                ->select('KhoiNganh','Nganhtt.ID','TenChung')
                ->where('KhoiNganh','=',"Sư phạm - Giáo dục - Ngoại ngữ")
                ->groupby('KhoiNganh')->groupby('ID')->groupby('TenChung')->orderBy('TenChung', 'asc')->get(); 
        $toantin = DB::table('Nganh')
                ->join('Nganhtt', 'Nganhtt.ID', 'Nganh.ID')
                ->select('KhoiNganh','Nganhtt.ID','TenChung')
                ->where('KhoiNganh','=',"Toán - Tin - Sinh và Ứng dụng")
                ->groupby('KhoiNganh')->groupby('ID')->groupby('TenChung')->orderBy('TenChung', 'asc')->get(); 
        $chinhtri = DB::table('Nganh')
                ->join('Nganhtt', 'Nganhtt.ID', 'Nganh.ID')
                ->select('KhoiNganh','Nganhtt.ID','TenChung')
                ->where('KhoiNganh','=',"Văn hóa - Chính trị - Xã hội")
                ->groupby('KhoiNganh')->groupby('ID')->groupby('TenChung')->orderBy('TenChung', 'asc')->get(); 
        $yduoc = DB::table('Nganh')
                ->join('Nganhtt', 'Nganhtt.ID', 'Nganh.ID')
                ->select('KhoiNganh','Nganhtt.ID','TenChung')
                ->where('KhoiNganh','=',"Y - Dược - Chăm sóc sức khỏe")
                ->groupby('KhoiNganh')->groupby('ID')->groupby('TenChung')->orderBy('TenChung', 'asc')->get(); 

    	return view('pages.nganhnghe', compact('Baochi', 'Congan', 'Dulich', 'Kientruc', 'kinhte', 'kythuat', 'luat', 'maytinh', 'moitruong', 'amnhac', 'nonglam', 'supham', 'toantin', 'chinhtri', 'yduoc'));
    }
    public function tohopmon(){
        $tohopmon = DB::table('Tohop')->get();    
        return view('pages.tohopmon', compact('tohopmon'));
    }
    
    public function get_tracnghiem(){
        $cauhoi = DB::table('Tracnghiem')->get();    
        return view('pages.tracnghiem',compact('cauhoi'));
    }
    public function post_tracnghiem(Request $request){
        $data = [];
        for($i=1;$i<=54;$i++){
            $data[$i-1] = $request->$i;
        }
        $R = 0; 
        $I = 0; 
        $A = 0; 
        $S = 0; 
        $E = 0; 
        $C = 0; 
        for($i=0;$i<=53;$i++){
            if ($i<9){
                $R = $R + $data[$i];
            }elseif($i<18){
                $I = $I + $data[$i];
            }elseif($i<27){
                $A = $A + $data[$i];
            }elseif($i<36){
                $S = $S + $data[$i];
            }elseif($i<45){
                $E = $E + $data[$i];
            }else{
                $C = $C + $data[$i];
            }
        }
        $R = $R/9; 
        $I = $I/9; 
        $A = $A/9; 
        $S = $S/9; 
        $E = $E/9; 
        $C = $C/9;

        $mangtb = array("R"=>$R, "I"=>$I, "A"=>$A, "S"=>$S, "E"=>$E, "C"=>$C);
        $max = max($mangtb);
        $tinhcach='';
        if ($max == $mangtb["R"]) {
            $tinhcach = 'R';
        }elseif ($max == $mangtb["I"]){
            $tinhcach = 'I';
        }elseif ($max == $mangtb["A"]){
            $tinhcach = 'A';
        }elseif ($max == $mangtb["S"]){
            $tinhcach = 'S';
        }elseif ($max == $mangtb["E"]){
            $tinhcach = 'E';
        }else{
            $tinhcach = 'C';
        }
        return view('pages.ketquatracnghiem',compact('tinhcach'));
    }
    public function tuvan(){
        $nganh = DB::table('Nganhtt')->select('ID','TenChung')->orderBy('TenChung')->get();
        /*$truong = DB::table('Truong')
                ->join('TuyenSinh', 'TuyenSinh.MaTr', 'Truong.MaTr')
                ->join('Nganh', 'Nganh.MaNg', 'TuyenSinh.MaNg')
                ->join('DiemChuan', 'DiemChuan.ID_DC', 'TuyenSinh.ID_DC')
                ->select('Truong.MaTr', 'TenTr', 'KhuVuc', 'LoaiTr', 'HocPhi', 'Rankvn','DiemChuan.DiemChuan')
                ->where([
                    ['Nam', '2020'],
                    ['Truong.MaTr', 'like', '%DD%'],
                    ['Nganh.TenNg', 'like', '%kế toán%']
                ])
                ->Distinct('Truong.MaTr', 'TenTr', 'KhuVuc', 'LoaiTr', 'HocPhi', 'Rankvn','DiemChuan.DiemChuan')
                ->orderBy('Truong.MaTr')
                ->get();
        foreach ($truong as $row) {
            if ($row->KhuVuc=='Miền Bắc'){
                $data["$row->MaTr"]["MB"] = 1;
                $data["$row->MaTr"]["MT"] = 0;
                $data["$row->MaTr"]["MN"] = 0;
                $data["$row->MaTr"]["TN"] = 0;
            }
            elseif ($row->KhuVuc=='Miền Trung'){
                $data["$row->MaTr"]["MB"] = 0;
                $data["$row->MaTr"]["MT"] = 1;
                $data["$row->MaTr"]["MN"] = 0;
                $data["$row->MaTr"]["TN"] = 0;
            }
            elseif ($row->KhuVuc=='Miền Nam'){
                $data["$row->MaTr"]["MB"] = 0;
                $data["$row->MaTr"]["MT"] = 0;
                $data["$row->MaTr"]["MN"] = 1;
                $data["$row->MaTr"]["TN"] = 0;
            }else{
                $data["$row->MaTr"]["MB"] = 0;
                $data["$row->MaTr"]["MT"] = 0;
                $data["$row->MaTr"]["MN"] = 0;
                $data["$row->MaTr"]["TN"] = 1;
            }

            if ($row->LoaiTr=='Công Lập'){
                $data["$row->MaTr"]["CL"] = 1;
                $data["$row->MaTr"]["DL"] = 0;
            }
            else{
                $data["$row->MaTr"]["CL"] = 0;
                $data["$row->MaTr"]["DL"] = 1;
            }

            if ($row->HocPhi>=30000000){
                $data["$row->MaTr"]["HPC"] = 1;
                $data["$row->MaTr"]["HPTB"] = 0;
                $data["$row->MaTr"]["HPT"] = 0;
            }
            elseif ($row->HocPhi>=10000000){
                $data["$row->MaTr"]["HPC"] = 0;
                $data["$row->MaTr"]["HPTB"] = 1;
                $data["$row->MaTr"]["HPT"] = 0;
            }
            else{
                $data["$row->MaTr"]["HPC"] = 0;
                $data["$row->MaTr"]["HPTB"] = 0;
                $data["$row->MaTr"]["HPT"] = 1;
            }

            if ($row->Rankvn<=20){
                $data["$row->MaTr"]["DTC"] = 1;
                $data["$row->MaTr"]["DTTB"] = 0;
                $data["$row->MaTr"]["DTT"] = 0;
            }
            elseif ($row->Rankvn<=100){
                $data["$row->MaTr"]["DTC"] = 0;
                $data["$row->MaTr"]["DTTB"] = 1;
                $data["$row->MaTr"]["DTT"] = 0;
            }
            else{
                $data["$row->MaTr"]["DTC"] = 0;
                $data["$row->MaTr"]["DTTB"] = 0;
                $data["$row->MaTr"]["DTT"] = 1;
            }
        }
        $data["DV"]["MB"] = 0;
        $data["DV"]["MT"] = 1;
        $data["DV"]["MN"] = 0;
        $data["DV"]["TN"] = 0;
        $data["DV"]["CL"] = 1;
        $data["DV"]["DL"] = 0;
        $data["DV"]["HPC"] = 0;
        $data["DV"]["HPTB"] = 0;
        $data["DV"]["HPT"] = 1;
        $data["DV"]["DTC"] = 1;
        $data["DV"]["DTTB"] = 0;
        $data["DV"]["DTT"] = 0;
        
        $tieuchi = array('MB','MT','MN','TN','CL','DL','HPC','HPTB','HPT','DTC','DTTB','DTT');
        $dodaiDV = 0;
        for($i=0;$i<12;$i++) {
                $dodaiDV = $dodaiDV + ($data["DV"]["$tieuchi[$i]"])*($data["DV"]["$tieuchi[$i]"]);
            }
        $dodaiDV = sqrt($dodaiDV);
        $kq_truong=[];
        $kq_cos=[];
        $j=0;
        foreach ($truong as $row) {
            $vohuong = 0;
            $dodai = 0;
            for($i=0;$i<12;$i++) {
                $vohuong = $vohuong + ($data["DV"]["$tieuchi[$i]"]*$data["$row->MaTr"]["$tieuchi[$i]"]);
                $dodai = $dodai + ($data["$row->MaTr"]["$tieuchi[$i]"])*($data["$row->MaTr"]["$tieuchi[$i]"]);
            }
            $dodai = sqrt($dodai);
            $cos = $vohuong/($dodai*$dodaiDV);
            $kq_truong[$j] = $row->MaTr;
            $kq_cos[$j] = $cos;
            $j++;
        }*/
        return view('truong.tuvan',  compact('nganh'));
    }
    public function kqtuvan(Request $request){
        $chonnganh = $request->get('chonnganh');
        $hp = $request->get('hp');
        $lt = $request->get('lt');
        $kv = $request->get('kv');
        $dc = $request->get('dc');
        $ut1 = $request->get('ut1');
        $ut2 = $request->get('ut2');
        $ut3 = $request->get('ut3');
        $ut4 = $request->get('ut4');
        $output = '';
        /*biểu diễn vector đầu vào*/
            if ($kv=='Miền Bắc'){
                $data["DV"]["MB"] = 1;
                $data["DV"]["MT"] = 0;
                $data["DV"]["MN"] = 0;
                $data["DV"]["TN"] = 0;
            }
            elseif ($kv=='Miền Trung'){
                $data["DV"]["MB"] = 0;
                $data["DV"]["MT"] = 1;
                $data["DV"]["MN"] = 0;
                $data["DV"]["TN"] = 0;
            }
            elseif ($kv=='Miền Nam'){
                $data["DV"]["MB"] = 0;
                $data["DV"]["MT"] = 0;
                $data["DV"]["MN"] = 1;
                $data["DV"]["TN"] = 0;
            }else{
                $data["DV"]["MB"] = 0;
                $data["DV"]["MT"] = 0;
                $data["DV"]["MN"] = 0;
                $data["DV"]["TN"] = 1;
            }

            if ($lt=='Công Lập'){
                $data["DV"]["CL"] = 1;
                $data["DV"]["DL"] = 0;
            }
            else{
                $data["DV"]["CL"] = 0;
                $data["DV"]["DL"] = 1;
            }

            if ($hp=="3"){
                $data["DV"]["HPC"] = 1;
                $data["DV"]["HPTB"] = 0;
                $data["DV"]["HPT"] = 0;
            }
            elseif ($hp=="2"){
                $data["DV"]["HPC"] = 0;
                $data["DV"]["HPTB"] = 1;
                $data["DV"]["HPT"] = 0;
            }
            else{
                $data["DV"]["HPC"] = 0;
                $data["DV"]["HPTB"] = 0;
                $data["DV"]["HPT"] = 1;
            }

            if ($dc>=25){
                $data["DV"]["DCC"] = 1;
                $data["DV"]["DCTB"] = 0;
                $data["DV"]["DCT"] = 0;
            }
            elseif ($dc>=20){
                $data["DV"]["DCC"] = 0;
                $data["DV"]["DCTB"] = 1;
                $data["DV"]["DCT"] = 0;
            }
            else{
                $data["DV"]["DCC"] = 0;
                $data["DV"]["DCTB"] = 0;
                $data["DV"]["DCT"] = 1;
            }
            $data["DV"]["Truong"] = "DV";
        /*biểu diễn vector đầu vào*/

        $truong = DB::table('Truong')
                ->join('TuyenSinh', 'TuyenSinh.MaTr', 'Truong.MaTr')
                ->join('Nganh', 'Nganh.MaNg', 'TuyenSinh.MaNg')
                ->join('DiemChuan', 'DiemChuan.ID_DC', 'TuyenSinh.ID_DC')
                ->select('Truong.MaTr', 'TenTr', 'KhuVuc', 'LoaiTr', 'HocPhi','DiemChuan','KhoiThi')
                ->where([
                    ['Nam', '2020'],
                    ['Nganh.ID', $chonnganh]
                ])
                ->Distinct('Truong.MaTr', 'TenTr', 'KhuVuc', 'LoaiTr', 'HocPhi','DiemChuan','KhoiThi')
                ->orderBy('Truong.MaTr')
                ->get();
        /*biểu diễn trường thành vecto*/
        $k = 0;
        foreach ($truong as $row) {
            if ($row->KhuVuc=='Miền Bắc'){
                $data["$row->MaTr"]["MB"] = 1;
                $data["$row->MaTr"]["MT"] = 0;
                $data["$row->MaTr"]["MN"] = 0;
                $data["$row->MaTr"]["TN"] = 0;
                $MB[$k] = 1;
                $MT[$k] = 0;
                $MN[$k] = 0;
                $TN[$k] = 0;
            }
            elseif ($row->KhuVuc=='Miền Trung'){
                $data["$row->MaTr"]["MB"] = 0;
                $data["$row->MaTr"]["MT"] = 1;
                $data["$row->MaTr"]["MN"] = 0;
                $data["$row->MaTr"]["TN"] = 0;
                $MB[$k] = 0;
                $MT[$k] = 1;
                $MN[$k] = 0;
                $TN[$k] = 0;
            }
            elseif ($row->KhuVuc=='Miền Nam'){
                $data["$row->MaTr"]["MB"] = 0;
                $data["$row->MaTr"]["MT"] = 0;
                $data["$row->MaTr"]["MN"] = 1;
                $data["$row->MaTr"]["TN"] = 0;
                $MB[$k] = 0;
                $MT[$k] = 0;
                $MN[$k] = 1;
                $TN[$k] = 0;
            }else{
                $data["$row->MaTr"]["MB"] = 0;
                $data["$row->MaTr"]["MT"] = 0;
                $data["$row->MaTr"]["MN"] = 0;
                $data["$row->MaTr"]["TN"] = 1;
                $MB[$k] = 0;
                $MT[$k] = 0;
                $MN[$k] = 0;
                $TN[$k] = 1;
            }

            if ($row->LoaiTr=='Công Lập'){
                $data["$row->MaTr"]["CL"] = 1;
                $data["$row->MaTr"]["DL"] = 0;
                $CL[$k] = 1;
                $DL[$k] = 0;
            }
            else{
                $data["$row->MaTr"]["CL"] = 0;
                $data["$row->MaTr"]["DL"] = 1;
                $CL[$k] = 0;
                $DL[$k] = 1;
            }

            if ($row->HocPhi>=30000000){
                $data["$row->MaTr"]["HPC"] = 1;
                $data["$row->MaTr"]["HPTB"] = 0;
                $data["$row->MaTr"]["HPT"] = 0;
                $HPC[$k] = 1;
                $HPTB[$k] = 0;
                $HPT[$k] = 0;
            }
            elseif ($row->HocPhi>=10000000){
                $data["$row->MaTr"]["HPC"] = 0;
                $data["$row->MaTr"]["HPTB"] = 1;
                $data["$row->MaTr"]["HPT"] = 0;
                $HPC[$k] = 0;
                $HPTB[$k] = 1;
                $HPT[$k] = 0;
            }
            else{
                $data["$row->MaTr"]["HPC"] = 0;
                $data["$row->MaTr"]["HPTB"] = 0;
                $data["$row->MaTr"]["HPT"] = 1;
                $HPC[$k] = 0;
                $HPTB[$k] = 0;
                $HPT[$k] = 1;
            }

            if ($row->DiemChuan>=25){
                $data["$row->MaTr"]["DCC"] = 1;
                $data["$row->MaTr"]["DCTB"] = 0;
                $data["$row->MaTr"]["DCT"] = 0;
                $DCC[$k] = 1;
                $DCTB[$k] = 0;
                $DCT[$k] = 0;
            }
            elseif ($row->DiemChuan>=20){
                $data["$row->MaTr"]["DCC"] = 0;
                $data["$row->MaTr"]["DCTB"] = 1;
                $data["$row->MaTr"]["DCT"] = 0;
                $DCC[$k] = 0;
                $DCTB[$k] = 1;
                $DCT[$k] = 0;
            }
            else{
                $data["$row->MaTr"]["DCC"] = 0;
                $data["$row->MaTr"]["DCTB"] = 0;
                $data["$row->MaTr"]["DCT"] = 1;
                $DCC[$k] = 0;
                $DCTB[$k] = 0;
                $DCT[$k] = 1;
            }
            $trg[$k] = $row->MaTr;
            $diemchuan[$k] = $row->DiemChuan;
            $khoithi[$k] = $row->KhoiThi;
            $data["$row->MaTr"]["Truong"] = $row->MaTr;
            $k++;
        }
        /*biểu diễn trường thành vecto*/

        $tieuchi = array('MB','MT','MN','TN','CL','DL','HPC','HPTB','HPT','DCC','DCTB','DCT');
        $dodaiDV = 0;
        for($i=0;$i<12;$i++) {
                $dodaiDV = $dodaiDV + ($data["DV"]["$tieuchi[$i]"])*($data["DV"]["$tieuchi[$i]"]);
            }
        $dodaiDV = sqrt($dodaiDV);

        $kq_truong=[]; $kq_cos=[]; $j=0;
        foreach ($truong as $row) {
            $vohuong = 0;
            $dodai = 0;
            for($i=0;$i<12;$i++) {
                $vohuong = $vohuong + ($data["DV"]["$tieuchi[$i]"]*$data["$row->MaTr"]["$tieuchi[$i]"]);
                $dodai = $dodai + ($data["$row->MaTr"]["$tieuchi[$i]"])*($data["$row->MaTr"]["$tieuchi[$i]"]);
            }
            $dodai = sqrt($dodai);
            $cos = $vohuong/($dodai*$dodaiDV);
            $kq_truong[$j] = $row->MaTr;
            $kq_cos[$j] = $cos;
            $j++;
        }
        /*for($i=0;$i<12;$i++) {
                echo $data["DV"]["$tieuchi[$i]"].' ';
            }
        $j=0;
        foreach ($truong as $row) {
            echo $row->MaTr.' ';
            for($i=0;$i<12;$i++) {
                echo $data["$row->MaTr"]["$tieuchi[$i]"].' ';
            }
            echo $kq_cos[$j].' '.$kq_truong[$j].' '.$trg[$j];
            echo '<br>';
            $j++;
        }
        echo "ahihihi";*/
        for($i=0;$i<count($truong);$i++) {
            if ($ut4=="1"){
                if ($hp=="3"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($HPC[$a] < $HPC[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;        
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }elseif ($hp=="2"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($HPTB[$a] < $HPTB[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }else{
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($HPT[$a] < $HPT[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }
            }elseif($ut4=="2"){
                if ($lt=="Công Lập"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($CL[$a] < $CL[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2; 
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;       
                            }
                        }
                    }
                }else{
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($DL[$a] < $DL[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;  
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;      
                            }
                        }
                    }
                }
            }elseif($ut4=="3"){
                if ($kv=="MB"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($MB[$a] < $MB[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;   
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;     
                            }
                        }
                    }
                }elseif($kv=="MT"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($MT[$a] < $MT[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;     
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;   
                            }
                        }
                    }
                }elseif($kv=="MN"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($MN[$a] < $MN[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;     
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;   
                            }
                        }
                    }
                }else{
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($TN[$a] < $TN[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;    
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;    
                            }
                        }
                    }
                }
            }else{
                if ($dc>=25){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($DCC[$a] < $DCC[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;       
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4; 
                            }
                        }
                    }
                }elseif($dc>=20){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($DCTB[$a] < $DCTB[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2; 
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;       
                            }
                        }
                    }
                }else{
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($DCT[$a] < $DCT[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;  
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;      
                            }
                        }
                    }
                }
            }

            if ($ut3=="1"){
                if ($hp=="3"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($HPC[$a] < $HPC[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }elseif ($hp=="2"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($HPTB[$a] < $HPTB[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }else{
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($HPT[$a] < $HPT[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }
            }elseif($ut3=="2"){
                if ($lt=="Công Lập"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($CL[$a] < $CL[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }else{
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($DL[$a] < $DL[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }
            }elseif($ut3=="3"){
                if ($kv=="MB"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($MB[$a] < $MB[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }elseif($kv=="MT"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($MT[$a] < $MT[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }elseif($kv=="MN"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($MN[$a] < $MN[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2; 
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;       
                            }
                        }
                    }
                }else{
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($TN[$a] < $TN[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }
            }else{
                if ($dc>=25){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($DCC[$a] < $DCC[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2; 
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;       
                            }
                        }
                    }
                }elseif($dc>=20){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($DCTB[$a] < $DCTB[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }else{
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($DCT[$a] < $DCT[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;  
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;      
                            }
                        }
                    }
                }
            }

            if ($ut2=="1"){
                if ($hp=="3"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($HPC[$a] < $HPC[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2; 
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;       
                            }
                        }
                    }
                }elseif ($hp=="2"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($HPTB[$a] < $HPTB[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }else{
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($HPT[$a] < $HPT[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }
            }elseif($ut2=="2"){
                if ($lt=="Công Lập"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($CL[$a] < $CL[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }else{
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($DL[$a] < $DL[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }
            }elseif($ut2=="3"){
                if ($kv=="MB"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($MB[$a] < $MB[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }elseif($kv=="MT"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($MT[$a] < $MT[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }elseif($kv=="MN"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($MN[$a] < $MN[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }else{
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($TN[$a] < $TN[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }
            }else{
                if ($dc>=25){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($DCC[$a] < $DCC[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2; 
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;       
                            }
                        }
                    }
                }elseif($dc>=20){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($DCTB[$a] < $DCTB[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }else{
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($DCT[$a] < $DCT[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2; 
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;       
                            }
                        }
                    }
                }
            }

            if ($ut1=="1"){
                if ($hp=="3"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($HPC[$a] < $HPC[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2; 
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;       
                            }
                        }
                    }
                }elseif ($hp=="2"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($HPTB[$a] < $HPTB[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }else{
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($HPT[$a] < $HPT[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }
            }elseif($ut1=="2"){
                if ($lt=="Công Lập"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($CL[$a] < $CL[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }else{
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($DL[$a] < $DL[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }
            }elseif($ut1=="3"){
                if ($kv=="MB"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($MB[$a] < $MB[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }elseif($kv=="MT"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($MT[$a] < $MT[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }elseif($kv=="MN"){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($MN[$a] < $MN[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }else{
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($TN[$a] < $TN[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }
            }else{
                if ($dc>=25){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($DCC[$a] < $DCC[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2; 
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;       
                            }
                        }
                    }
                }elseif($dc>=20){
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($DCTB[$a] < $DCTB[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                            }
                        }
                    }
                }else{
                    for($a = 0; $a < count($truong) - 1; $a++){
                        for($b = $a + 1; $b < count($truong); $b++){
                            if($DCT[$a] < $DCT[$b]){
                                $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                                $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                                $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                                $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                                $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                                $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                                $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                                $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                                $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                                $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                                $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                                $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                                $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                                $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2; 
                                $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                                $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;       
                            }
                        }
                    }
                }
            }

            for($a = 0; $a < count($truong) - 1; $a++){
                for($b = $a + 1; $b < count($truong); $b++){
                    if($kq_cos[$a] < $kq_cos[$b]){
                        $tam = $MB[$a]; $MB[$a] = $MB[$b]; $MB[$b] = $tam;        
                        $tam = $MT[$a]; $MT[$a] = $MT[$b]; $MT[$b] = $tam;        
                        $tam = $MN[$a]; $MN[$a] = $MN[$b]; $MN[$b] = $tam;        
                        $tam = $TN[$a]; $TN[$a] = $TN[$b]; $TN[$b] = $tam;        
                        $tam = $CL[$a]; $CL[$a] = $CL[$b]; $CL[$b] = $tam;        
                        $tam = $DL[$a]; $DL[$a] = $DL[$b]; $DL[$b] = $tam;        
                        $tam = $HPC[$a]; $HPC[$a] = $HPC[$b]; $HPC[$b] = $tam;        
                        $tam = $HPTB[$a]; $HPTB[$a] = $HPTB[$b]; $HPTB[$b] = $tam;        
                        $tam = $HPT[$a]; $HPT[$a] = $HPT[$b]; $HPT[$b] = $tam;        
                        $tam = $DCC[$a]; $DCC[$a] = $DCC[$b]; $DCC[$b] = $tam;        
                        $tam = $DCTB[$a]; $DCTB[$a] = $DCTB[$b]; $DCTB[$b] = $tam;        
                        $tam = $DCT[$a]; $DCT[$a] = $DCT[$b]; $DCT[$b] = $tam;        
                        $tam1 = $kq_cos[$a]; $kq_cos[$a] = $kq_cos[$b]; $kq_cos[$b] = $tam1;        
                        $tam2 = $trg[$a]; $trg[$a] = $trg[$b]; $trg[$b] = $tam2;
                        $tam3 = $diemchuan[$a]; $diemchuan[$a] = $diemchuan[$b]; $diemchuan[$b] = $tam3;        
                        $tam4 = $khoithi[$a]; $khoithi[$a] = $khoithi[$b]; $khoithi[$b] = $tam4;        
                    }
                }
            }
        }
        /*echo '<br>';
        for($i=0;$i<count($truong);$i++) {
            echo $MB[$i].' '.$MT[$i].' '.$MN[$i].' '.$TN[$i].' '.$CL[$i].' '.$DL[$i].' '.$HPC[$i].' '.$HPTB[$i].' '.$HPT[$i].' '.$DCC[$i].' '.$DCTB[$i].' '.$DCT[$i].' '.$kq_cos[$i].' '.$trg[$i];
            echo '<br>';
        }*/
        for($i=0;$i<5;$i++) {
            $top5[$i] = $trg[$i];
        }
        /*for($i=0;$i<5;$i++) {
            echo $top5[$i].' ';
        }*/
        echo '<br>';
        $timtruong = DB::table('Truong')
            ->join('TuyenSinh', 'TuyenSinh.MaTr', 'Truong.MaTr')
            ->join('Nganh', 'Nganh.MaNg', 'TuyenSinh.MaNg')
            ->select('Truong.MaTr', 'TenTr', 'Tinh','TuyenSinh.MaNg','TenNg', 'LoaiTr', 'HocPhi','ChiTieu','HeDaoTao')
            ->wherein('Nam', ['2020','0'])
            ->where('Nganh.ID', $chonnganh)
            ->wherein('Truong.MaTr', $top5)
            ->Distinct('Truong.MaTr', 'TenTr', 'Tinh', 'TuyenSinh.MaNg','LoaiTr', 'HocPhi','ChiTieu','TenNg','HeDaoTao')
            ->get();
        echo '<div class="kimduyen mau">
                        <div class="top">TOP</div>
                        <div class="matrg">Mã trường</div>
                        <div class="tentr">Tên trường</div>
                        <div class="loaitr">Loại trường</div>
                        <div class="HDT">Hệ đào tạo</div>
                        <div class="tinh">Tỉnh</div>
                        <div class="nganh">Ngành</div>
                        <div class="khoi">Khối Thi</div>
                        <div class="diem">Điểm chuẩn 2020</div>
                        <div class="hphi">Học phí 2021</div>
                        </div>';
        $k = 1;$n=0;
        foreach ($top5 as $value) {
            foreach ($timtruong as $row) {
                if ($row->MaTr == $value){
                    echo '<div class="kimduyen">
                        <div class="top">'.$k.'</div>
                        <div class="matrg">'.$row->MaTr.'</div>
                        <div class="tentr"><a href="truong/'.$row->MaTr.'/chitiet">'.$row->TenTr.'</a></div>
                        <div class="loaitr">'.$row->LoaiTr.'</div>
                        <div class="HDT">'.$row->HeDaoTao.'</div>
                        <div class="tinh">'.$row->Tinh.'</div>
                        <div class="nganh">'.$row->MaNg.' - '.$row->TenNg.'</div>
                        <div class="khoi">'.$khoithi[$n].'</div>
                        <div class="diem">'.$diemchuan[$n].'</div>
                        <div class="hphi">'.round($row->HocPhi/1000000,2).' triệu/năm</div>
                        </div>';
                }
            }
            $k++;$n++;
        }
    }
    public function dangkytruong(){
        
       return view('truongform.truongcoban');
    }
    public function dangkynganh(){
        
       return view('truongform.nganhcoban');
    }
    public function truongdangnhap(){
        
       return view('truongform.truongdangnhap');
    }

}















