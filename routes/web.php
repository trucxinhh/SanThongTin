<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TraCuuTruong;
use App\Http\Controllers\TraCuuDiem;
use App\Http\Controllers\TinTucTS;
use App\Http\Controllers\Taikhoan;
use Illuminate\Http\Request;
use App\Models\Truong;
use App\Models\Nganh;
use App\Models\TuyenSinh;
use App\Models\DiemChuan;
use App\Models\TinTuc;
use App\Models\LoaiTin;

// use App\Http\Controllers\timtruong;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('layout');
//tạo lại đường dẫn mới cho tìm cứu điểm chuẩn
Route::group(['prefix'=>'diemchuan'], function(){
	Route::post('ketqua1',[TraCuuDiem::class, 'Diem_PostForm1'])->name('diemchuan/ketqua1');
	Route::post('ketqua2',[TraCuuDiem::class, 'Diem_PostForm2'])->name('diemchuan/ketqua2');
	Route::post('ketqua3',[TraCuuDiem::class, 'Diem_PostForm3'])->name('diemchuan/ketqua3');
	Route::post('ketqua4',[TraCuuDiem::class, 'Diem_PostForm4'])->name('diemchuan/ketqua4');
	Route::post('ketqua5',[TraCuuDiem::class, 'Diem_PostForm5'])->name('diemchuan/ketqua5');

	Route::get('tracuu',[TraCuuDiem::class, 'Diem_Form']);
	Route::post('tracuu/fetch',[TraCuuDiem::class, 'fetch'])->name('dynamicdependent');
});

// Tạo lại route mới để tra cứu trường
Route::group(['prefix'=>'truong'], function(){
	Route::get('tracuu',[TraCuuTruong::class, 'Truong_Form']);
	Route::post('ketquanc',[TraCuuTruong::class, 'Truong_PostFormNC'])->name('truong/ketquanc');
	Route::get('{matruong}/chitiet',[TraCuuTruong::class, 'Truong_chitiet']);
	Route::get('{matruong}/nganhtuyensinh',[TraCuuTruong::class, 'Truong_nganhtuyensinh']);
	Route::get('{matruong}/diem',[TraCuuTruong::class, 'Truong_diem']);
	//trang tra cứu
    Route::post('tracuu/fetch',[TraCuuTruong::class, 'fetch'])->name('dynamic');                        
    Route::post('tracuu/fetch1',[TraCuuTruong::class, 'fetch1'])->name('dynamic1'); 
    //trang kết quả
});
//trang thông tin ngành, cơ hội nghề nghiệp...
Route::get('nganh/{id}',[TraCuuTruong::class, 'Truong_nganhchitiet']);
//gọi trang tin tuc
Route::get('tintuc',[TinTucTS::class, 'tintuc'])->name('tintuc');
//gọi trang tin tức chi tiết
Route::get('tintuc/chitiet/{id}',[TinTucTS::class, 'tintuc_chitiet'])->name('tintucchitiet');
// Tạo route cho admin
Route::group(['prefix'=>'admin'], function(){
	Route::get('tracuu',[TraCuuTruong::class, 'Truong_Form']);
	Route::post('ketqua',[TraCuuTruong::class, '']);

});
//gọi đến trang ngành nghề
Route::get('nganhnghe',[HomeController::class, 'nganhnghe'])->name('nganhnghe');
//gọi đến trang tổ hợp môn
Route::get('tohopmon',[HomeController::class, 'tohopmon'])->name('tohopmon');
//tư vấn 
Route::get('tuvan',[HomeController::class, 'tuvan'])->name('tuvan');
Route::post('kqtuvan',[HomeController::class, 'kqtuvan'])->name('kqtuvan');
Route::get('doihocphi',function(){
        $truong = DB::table('Truong')
                ->join('TuyenSinh', 'TuyenSinh.MaTr', 'Truong.MaTr')
                ->select('Truong.MaTr', 'TenTr','MaNg', 'HocPhi', 'ChiTieu')
                ->where([
                    ['Nam', '2021'],
                    ['HocPhi', '<>', null]
                ])
                ->Distinct('Truong.MaTr', 'TenTr', 'KhuVuc', 'LoaiTr', 'HocPhi', 'ChiTieu')
                ->orderBy('Truong.MaTr')
                ->get();
        $query = "SELECT DISTINCT Truong.MaTr, TenTr, MaNg, ChiTieu, HocPhi FROM TuyenSinh 
                    INNER JOIN Truong ON TuyenSinh.MaTr = Truong.MaTr
                    WHERE Nam ='2020' ";
        $servername = "localhost";
        $database = "congthongtin2";
        $username = "root";
        $pass = "";
        $connect = new mysqli($servername, $username, $pass, $database);
        $result = mysqli_query($connect, $query);
        $i=1;
        foreach ($truong as $row) {
            echo $i.' '.$row->TenTr.' '.$row->HocPhi;
            echo '<br>';
            $i++;
        }
        $i=1;
        foreach ($result as $row) {
            echo $i.' '.$row['TenTr'].' '.$row['HocPhi'];
            echo '<br>';
            $i++;
        }
})->name('doihocphi');
//tư vấn 

Route::get('dangkytruong',[HomeController::class, 'dangkytruong'])->name('dangkytruong');
Route::get('dangkynganh',[HomeController::class, 'dangkynganh'])->name('dangkynganh');
Route::get('truongdangnhap',[HomeController::class, 'truongdangnhap'])->name('truongdangnhap');


Route::get('quanlytk',[Taikhoan::class, 'quanlytk'])->name('quanlytk');
Route::get('lienhe',[Taikhoan::class, 'lienhe'])->name('lienhe');
Route::get('dangky',[Taikhoan::class, 'dangky'])->name('dangky');
Route::post('postdangky',[Taikhoan::class, 'postdangky'])->name('postdangky');
Route::post('postdangnhap',[Taikhoan::class, 'postdangnhap'])->name('postdangnhap');
Route::get('dangxuat',[Taikhoan::class, 'dangxuat'])->name('dangxuat');
Route::get('tracnghiem',[HomeController::class, 'get_tracnghiem'])->name('tracnghiem');
Route::post('ketquatracnghiem',[HomeController::class, 'post_tracnghiem'])->name('ketquatracnghiem');

Route::get('tentruong',[TraCuuTruong::class, 'Truong_PostForm'])->name('tentruong');

// route tra ket qua tim dữ liệu trường
Route::post('tratruong',function(Request $request){
    $query = "SELECT DISTINCT Truong.MaTr, TenTr, HPTB, KhuVuc, Tinh, LoaiTr, HeDaoTao, Logo FROM TuyenSinh 
                    INNER JOIN Truong ON TuyenSinh.MaTr = Truong.MaTr
                    INNER JOIN Nganh ON TuyenSinh.MaNg = Nganh.MaNg
                    INNER JOIN Truongpt ON Truong.MaTr = Truongpt.MaTr
                    INNER JOIN nganhtt ON Nganh.ID = nganhtt.ID
                    WHERE Tinh !='' ";
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
    $result = [];
    $result = mysqli_query($connect, $query);
    $output = '';
	foreach($result as $row){
        if ($row['HPTB']!=null){
	        $hocphi = round($row['HPTB']/1000000,2);
	        $hocphi = $hocphi.' triệu/năm';
        }else{
	        $hocphi = '';
        }
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
                        <h3><i class="fas fa-tags"></i> Học phí TB: '.$hocphi.'</h3>
                        <div class="chitiet">
                            <a href="'.$linkchitiet.'" title="Xem chi tiết"><i class="fas fa-plus-circle"></i> </a>
                        </div>
                        <br>
                    </div>
                </div>
        ';
    }
    echo $output;
})->name('tratruong');
//đoạn route nháp
Route::get('testbang',function(){
	$truongs = Truong::where('MaTr','=','DDQ')->get();
	foreach ($truongs as $value) {
		echo $value->MaTr;
		echo '<hr>';
		echo $value->TenTr;
	}
	$tintucs = TinTuc::find(1);
	echo $tuyensinh = $tintucs->loaitins;
	echo $tuyensinh->Ten;
	echo '<hr>';
	/*$loaitins = LoaiTin::find(1);
	$tintuc = $loaitins->tintucs;
	echo $tintuc;*/
	echo '<hr>';
	$truongs1 = Truong::where('MaTr','=','DDQ')->get();
	// echo $truongs1;
	foreach ($truongs1 as $value) {
		echo $tuyensinh = $value->tuyensinhs;
		echo '<hr>'; 
		foreach ($tuyensinh as $value) {
			echo $value->ChiTieu;
		echo '<br>'; 

		}
	}
	// return view('pages.truong_timkiem');
});
Route::get('testbk',function(){
   $truongs = DB::table('TuyenSinh')
            ->join('Nganh', 'Nganh.MaNg', 'TuyenSinh.MaNg')
            ->where([
                ['Nganh.MaNg', '=', 'EM-NU'],
            ])->get();
    foreach ($truongs as $row) {
            echo    '<tr>
                          
                          <td><a href="nganh/'.$row->ID.'">'.$row->MaNg.'</a></td>
                          <td><a href="nganh/'.$row->ID.'">'.$row->TenNg.'</a></td>
                          <td><a href="nganh/'.$row->ID.'">'.$row->MaTr.'</a></td>
                    </tr>';
            echo '<br>';            
    }
});
Route::get('testmang',function(){
        $tallest_buildings = [
            ["Building" => "Burj Khalifa","City" => "Dubai","Country" => "United Arab Emirates","Height" => 828,"Floors" => 163,"Year" => 2010],
            ["Building" => "Shanghai Tower","City" => "Shanghai","Country" => "China","Height" => 632,"Floors" => 128,"Year" => 2015],
            ["Building" => "Abraj Al-Bait Towers","City" => "Mecca","Country" => "Saudi Arabia","Height" => 601,"Floors" => 120,"Year" => 2012],
            ["Building" => "Ping An Finance Center","City" => "Shenzhen","Country" => "China","Height" => 599,"Floors" => 115,"Year" => 2017],
            ["Building" => "Lotte World Tower","City" => "Seoul","Country" => "South Korea" ,"Height" => 554,"Floors" => 123,"Year" => 2016]
        ];
        $tallest_buildings = [
            ["Building" => "KD","City" => "DaNang","Country" => "VN","Height" => 1000,"Floors" => 500,"Year" => 2020]
        ]; 
        function storey_sort($building_a, $building_b) {
            return $building_a["Floors"] - $building_b["Floors"];
        }
         
        usort($tallest_buildings, "storey_sort");
         
        foreach($tallest_buildings as $tall_building) {
            list($building, $city, $country, $height, $floors) = array_values($tall_building);
            echo $building." is in ".$city.", ".$country.". It is ".$height." meters tall with ".$floors." floors.";
            echo '<br>';
        }

});
//đoạn route nháp