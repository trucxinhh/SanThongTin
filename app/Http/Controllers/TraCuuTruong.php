<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Truong;
use App\Models\Nganh;
use App\Models\Nganhtt;
use App\Models\TuyenSinh;
use App\Models\DiemChuan;
use App\Models\TinTuc;
use App\Models\LoaiTin;
use Illuminate\Support\Facades\Auth;
class TraCuuTruong extends Controller
{
    function __construct()
    {
      if(Auth::check()){
        view()->share('nguoidung',Auth::user());
      }
    }
    public function Truong_Form(){
        $khuvuc = DB::table('Truong')->select('KhuVuc')->groupby('KhuVuc')->get();    
        $khoinganh = DB::table('Nganh')->select('KhoiNganh')->groupby('KhoiNganh')->get();    
        $phuongthuc = DB::table('PhuongThuc')->select('MaPhgThuc','TenPhgThuc')->groupby('MaPhgThuc')->groupby('TenPhgThuc')->get();    
        $toptruong = DB::table('Truong')
                ->where([
                    ['Rankvn', '>',3 ],
                    ['Rankvn', '<', 10]
                ])
                ->orderby('rankvn')->get();
        $MB = DB::table('Truong')->select('Tinh')->where('KhuVuc','=','Miền Bắc')->groupby('Tinh')->orderBy('Tinh', 'asc')->get();
        $MT = DB::table('Truong')->select('Tinh')->where('KhuVuc','=','Miền Trung')->groupby('Tinh')->orderBy('Tinh', 'asc')->get();
        $MN = DB::table('Truong')->select('Tinh')->where('KhuVuc','=','Miền Nam')->groupby('Tinh')->orderBy('Tinh', 'asc')->get();
        $TN = DB::table('Truong')->select('Tinh')->where('KhuVuc','=','Tây Nguyên')->groupby('Tinh')->orderBy('Tinh', 'asc')->get();    
        return view('truong.tracuu',compact('khuvuc','khoinganh','phuongthuc','toptruong','MB','MT','MN','TN'));
    }
    public function Truong_PostForm(Request $request){
        $tukhoa = $request->tukhoa;
        $data =[];
        $output = '';        
        if (!empty($tukhoa)){
            $data = Truong::where('TenTr', 'like', "%$tukhoa%")
                                        ->orwhere('MaTr', 'like', "%$tukhoa%")->get();
        }
            foreach ($data as $row) {
                $hocphi = $row->HPTB/1000000;
                $logo = "http://localhost/congthongtin/public/Upload/logo/".$row->Logo."";
                $linkchitiet = "http://localhost/congthongtin/truong/".$row->MaTr."/chitiet";

                $output .='
                        <div class="col-sm-3 item ">
                            <div class="khungtruong">
                                <div class="col-sm-8">
                                    <img src="'.$logo.'" alt="" class="logotruong">
                                </div>
                                <div class="col-sm-4">
                                    <div class="hinh4">
                                        <div class="hinhvuong"></div>
                                        <div class="tamgiac"></div>
                                    </div>
                                    <div class="kihieu">   
                                        <div class="rank">Mã</div>
                                        <div class="rank">Trường</div>
                                        <div class="matruong" style="padding-left: 0"> '.$row->MaTr.'</div>
                                    </div>
                                </div>
                            </div>
                            <div class="thongtin">
                                <h2> <a href="'.$linkchitiet.'"> '.$row->TenTr.'</a>
                                </h2>
                                <h3><i class="fas fa-map-marker-alt"></i>&ensp;'.$row->KhuVuc.' - '.$row->Tinh.'</h3>
                                <h3><i class="fas fa-toolbox"></i> '.$row->HeDaoTao.' - '.$row['LoaiTr'].'</h3>
                                <h3><i class="fas fa-tags"></i> Học phí TB: '.$hocphi.' triệu/năm</h3>
                                <div class="chitiet">
                                    <a href="'.$linkchitiet.'" title="Xem chi tiết"><i class="fas fa-plus-circle"></i> </a>
                                </div>
                                <br>
                            </div>
                        </div>
                '; 
            }
        echo $output;
    }
    public function Truong_chitiet($matruong){
        $data = DB::table('Truong')->where('MaTr', '=', $matruong)->get();
        $data2 = DB::table('TuyenSinh')
            ->join('Nganh', 'Nganh.MaNg', 'TuyenSinh.MaNg')
            ->where([
                ['MaTr', '=', $matruong],
                ['Nam', '=', '2021']
            ])->get();
        $lat =   16.048777986436036;
        $lng =  108.238775246030668;
         foreach ($data as $row){
            if (($row->Lat)!=null and ($row->Lng)!=null){
                $lat =  $row->Lat;
                $lng =  $row->Lng;
            }
         }
        return view('truong.chitiet',compact('data2','data','lat','lng'));
    }
    public function Truong_nganhtuyensinh($matruong){
        $data = DB::table('Truong')->where('MaTr', '=', $matruong)->get();
        $data2 = DB::table('TuyenSinh')
            ->join('Nganh', 'Nganh.MaNg', 'TuyenSinh.MaNg')
            ->where([
                ['MaTr', '=', $matruong],
                ['Nam', '=', '2021']
            ])->get();
        $lat =   16.048777986436036;
        $lng =  108.238775246030668;
         foreach ($data as $row){
            if (($row->Lat)!=null and ($row->Lng)!=null){
                $lat =  $row->Lat;
                $lng =  $row->Lng;
            }
         }
        return view('truong.nganhtuyensinh',compact('data2','data','lat','lng'));
    }
    public function Truong_nganhchitiet($id){
        $tennganh = "";
        $dt = Nganhtt::find($id);
        $data = Nganh::where('ID', '=', $id)->get();
        $data2 = DB::table('Nganh')
                    ->join('TuyenSinh', 'TuyenSinh.MaNg', 'Nganh.MaNg')
                    ->join('Truong', 'Truong.MaTr', 'TuyenSinh.MaTr')
                    -> select('Truong.MaTr','Tinh','TenTr')
                    ->where([
                            ['Nganh.ID', '=', $id]
                        ])
                    ->groupby('Truong.MaTr')->groupby('Tinh')->groupby('TenTr')->orderBy('Tinh', 'asc')->get();
        return view('truong.nganhchitiet',compact('dt','data','data2'));
    }
    public function Truong_diem($matruong){
        $nam='2020';
        $data = DB::table('Truong')->where('MaTr', '=', $matruong)->get();
        $data2 = DB::table('TuyenSinh')
            ->join('DiemChuan', 'DiemChuan.ID_DC', 'TuyenSinh.ID_DC')
            ->join('Nganh', 'Nganh.MaNg', 'TuyenSinh.MaNg')
            ->where([
                ['MaTr', '=', $matruong],
                ['Nam', '=', $nam]
            ])->get();
        $lat =   16.048777986436036;
        $lng =  108.238775246030668;
         foreach ($data as $row){
            if (($row->Lat)!=null and ($row->Lng)!=null){
                $lat =  $row->Lat;
                $lng =  $row->Lng;
            }
         }
        return view('truong.diem',compact('data2','data','lat','lng'));
    }
    public function fetch(Request $request){
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $dt = DB::table('Nganh')
                ->join('Nganhtt', 'Nganhtt.ID', 'Nganh.ID')
                ->where($select, $value)
                ->select('Nganhtt.ID','TenChung')->groupby('TenChung')->groupby('Nganhtt.ID')
                ->get();
        $output = '<option value="">'.ucfirst("---------Tất cả---------").'</option>';
        foreach ($dt as $row) {
            $output .= '<option value="'.$row->ID.'">'.$row->TenChung.'</option>';
        }
        echo $output;
    }
    public function fetch1(Request $request){
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $dt = DB::table('Nganh')
                ->where($select, $value)
                ->select($dependent,'TenNg')->groupby($dependent)->groupby('TenNg')
                ->get();
        $output = '<option value="">'.ucfirst("---------Tất cả---------").'</option>';
        foreach ($dt as $row) {
            $output .= '<option value="'.$row->$dependent.'">'.$row->TenNg.'</option>';
        }
        echo $output;
    }
    public function ketquafetch(Request $request){
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $dt = DB::table('Truong')
                ->where($select, $value)
                ->select($dependent)->groupby($dependent)
                ->get();
        $output = '<option value="">'.ucfirst("---------Tất cả---------").'</option>';
        foreach ($dt as $row) {
            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    }
    public function ketquafetch1(Request $request){
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $dt = DB::table('Nganh')
                ->where($select, $value)
                ->select($dependent,'TenNg')->groupby($dependent)->groupby('TenNg')
                ->get();
        $output = '<option value="">'.ucfirst("---------Tất cả---------").'</option>';
        foreach ($dt as $row) {
            $output .= '<option value="'.$row->$dependent.'">'.$row->TenNg.'</option>';
        }
        echo $output;
    }
    public function ketquatimtruong(Request $request){
        $query = "SELECT DISTINCT Truong.MaTr, TenTr, HPTB, KhuVuc, Tinh, LoaiTr, HeDaoTao, Logo FROM TuyenSinh 
                    INNER JOIN Truong ON TuyenSinh.MaTr = Truong.MaTr
                    INNER JOIN Nganh ON TuyenSinh.MaNg = Nganh.MaNg
                    INNER JOIN Truongpt ON Truong.MaTr = Truongpt.MaTr
                    INNER JOIN nganhtt ON Nganh.ID = nganhtt.ID
                    WHERE Tinh ='Đà Nẵng' ";
        if (isset($request->khuvuc)){
                $khuvuc = implode("','",$request->khuvuc);
                $query .= "AND Tinh IN('".$khuvuc."')";
            }
        if (isset($request->loaitruong)){
                $loaitruong = implode("','",$request->loaitruong);
                $query .= "AND LoaiTr IN('".$loaitruong."')";
            }
        if (isset($request->hedaotao)){
                $hedaotao = implode("','",$request->hedaotao);
                $query .= "AND HeDaoTao IN('".$hedaotao."')";
            }
        if (isset($request->khoinganh)){
                $khoinganh = $request->khoinganh;
                $query .= "AND KhoiNganh IN('".$khoinganh."')";
            }
        if (isset($request->nganh)){
                $nganh = $request->nganh;
                $query .= "AND Nganh.ID IN('".$nganh."')";
            }
        if (isset($request->phuongthuc)){
                $phuongthuc = $request->phuongthuc;
                $query .= "AND MaPhgThuc IN('".$phuongthuc."')";
            }
        if (isset($request->hhocphi)){
                $hhocphi = ($request->hhocphi)*1000000;
                $query .= "AND HPTB <= '".$hhocphi."'";
            }
        $query .= "ORDER BY Rankvn asc";
        $servername = "localhost";
        $database = "congthongtin2";
        $username = "root";
        $pass = "";
        $connect = new mysqli($servername, $username, $pass, $database);
        $result = mysqli_query($connect, $query);
        $output = '';
            foreach($result as $row){
                $hocphi = $row['HPTB']/1000000;
                $logo = "http://localhost/congthongtin/public/Upload/logo/".$row['Logo']."";
                $linkchitiet = "http://localhost/congthongtin/truong/".$row['MaTr']."/chitiet";
                $output .='
                        <div class="col-sm-3 item ">
                            <div class="khungtruong">
                                <div class="col-sm-8">
                                    <img src="'.$logo.'" alt="" class="logotruong">
                                </div>
                                <div class="col-sm-4">
                                    <div class="hinh4">
                                        <div class="hinhvuong"></div>
                                        <div class="tamgiac"></div>
                                    </div>
                                    <div class="kihieu">   
                                        <div class="rank">Mã</div>
                                        <div class="rank">Trường</div>
                                        <div class="matruong" style="padding-left: 0"> '.$row['MaTr'].'</div>
                                    </div>
                                </div>
                            </div>
                            <div class="thongtin">
                                <h2> <a href="'.$linkchitiet.'"> '.$row['TenTr'].'</a>
                                </h2>
                                <h3><i class="fas fa-map-marker-alt"></i>&ensp;'.$row['KhuVuc'].' - '.$row['Tinh'].'</h3>
                                <h3><i class="fas fa-toolbox"></i> '.$row['HeDaoTao'].' - '.$row['LoaiTr'].'</h3>
                                <h3><i class="fas fa-tags"></i> Học phí TB: '.$hocphi.' triệu/năm</h3>
                                <div class="chitiet">
                                    <a href="'.$linkchitiet.'" title="Xem chi tiết"><i class="fas fa-plus-circle"></i> </a>
                                </div>
                                <br>
                            </div>
                        </div>
                ';
            }
        echo $output;            
    }
    
}
