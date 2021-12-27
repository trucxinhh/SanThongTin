<?php 
function adddotstring($strNum) {
            $len = strlen($strNum);
            $counter = 3;
            $result = "";
            while ($len - $counter > 0)
            {
                $con = substr($strNum, $len - $counter , 3);
                $result = '.'.$con.$result;
                $counter+= 3;
            }
            $con = substr($strNum, 0 , 3 - ($counter - $len) );
            $result = $con.$result;
            if(substr($result,0,1)=='.'){
                $result=substr($result,1,$len+1);
            }
            return $result;
    } ?>
@extends('index')
@section('title')
Tìm trường tuyển sinh
@endsection

@section('style')
<style type="text/css" media="screen">
       {min-height:400px;background-color:#f2f2f2}.bgr-layer{background-image:url(https://media.kenhtuyensinh.vn/static/images/bg-truongquocte-desktop@2x.png);background-size:100% 100%;width:100%;height:75vh;min-height:75vh;display:flex;justify-content:center;align-items:center}
        .search{background-color:#fff;border-radius:10px;box-shadow:0 3px 6px #00000029;padding:20px 30px;
            width:75%;margin:0 auto;position:relative;z-index:999;margin-top:-39px;margin-bottom:40px}
        .search .wrapper{display:flex;align-items:center}
        .search .search-field{position:relative;flex-basis:65%}
        .search .search-field .form-shape{border:none;border-bottom:1px solid #cecece;outline:none;border-radius:0;box-shadow:none;padding-right:45px}
        .search .search-field label{outline:none;box-shadow:none;background-color:transparent;padding:0;cursor:pointer;position:absolute;top:0;right:0}
        .search .search-field i{background-color:#087ade;padding:8px 10px;border-radius:50%;}
        .search .search-field i:hover{background-color:#065ea5;padding:8px 10px;border-radius:50%}
        .search .search-field i:before{color:#fff;font-size:15px}
        @media only screen and (max-width:768px){
            .search .search-field{flex-basis:55%}
        }
        .search .view-mode{flex-basis:15%}
        .search .view-mode span{cursor:pointer;background:#efefef;padding:7px 10px;margin-left:15px;display:inline-block}
        .search .view-mode span i{vertical-align:middle}.search .view-mode span.layout-list i{color:#9c9c9c}
        .search .view-mode span.layout-grid{background:#08f}.search .view-mode span.layout-grid i{color:#fff}
        @media only screen and (max-width:375px){.search .view-mode span{margin-left:10px}}
        @media only screen and (max-width:320px){.search .view-mode span{margin-left:6px}}
        @media only screen and (max-width:768px){.search .view-mode{flex-basis:20%}}
        @media only screen and (max-width:320px){.search .view-mode span{padding:5px 8px}}
        .search .search-advanced-label{cursor:pointer;user-select:none}
        .search .search-advanced-label i{margin-left:5px;background:#efefef;padding:1px 2px;border-radius:3px}
        .search .search-advanced-label.open{color:#08f}.search .search-advanced-group{display:none}
        .search .search-advanced-group .wrapper{margin-top:20px;display:flex;flex-wrap:wrap;justify-content:flex-start}
        .search .search-advanced-group .wrapper .filter-group{margin-top:10px;margin-right:18px;flex-basis:23%}
        @media only screen and (max-width:768px){.search .search-advanced-group .wrapper .filter-group{flex-basis:30%}}
        @media only screen and (min-width:769px){.search .search-advanced-group .wrapper .filter-group:nth-child(4n+4){margin-right:0}}
        @media only screen and (max-width:414px){.search .search-advanced-group .wrapper .filter-group:nth-child(3n){margin-right:0}}
        @media only screen and (max-width:320px){.search .search-advanced-group .wrapper .filter-group{flex-basis:44%}
        .search .search-advanced-group .wrapper .filter-group:nth-child(2n+1){margin-right:15px}}
        .search .search-advanced-group .wrapper .action-group{margin-top:10px}
        .search .search-advanced-group .wrapper .action-group .temp-submit{
            cursor:pointer;display:inline-block;background-color:#fff;border-radius:1.5rem;color:#087ade;padding:10px 17px;margin-top:10px;margin-bottom:0;border:1px solid #087ade;box-shadow:0 2px 5px #00000029;}
        .search .search-advanced-group .wrapper .action-group .temp-submit:hover{
            cursor:pointer;display:inline-block;background-color :#065ea5;border-radius:1.5rem;color:#fff;padding:10px 17px;margin-top:10px;margin-bottom:0;box-shadow:0 2px 5px #00000029}
        .search .search-advanced-group .wrapper .action-group .temp-submit i{margin-right:10px;font-size:16px;
            text-align: center;display:inline-block;vertical-align:baseline}
        .search .search-advanced-group .wrapper .action-group .undo{
            cursor:pointer;display:inline-block;border:1px solid #087ade;color:#087ade;border-radius:1.5rem;box-shadow:0 2px 5px #00000029;padding:10px 20px 10px 20px;margin-left:10px; text-align: center;background-color:#fff;}
        .search .search-advanced-group .wrapper .action-group .undo:hover{
            cursor:pointer;display:inline-block;border:1px solid #087ade;border-radius:1.5rem;box-shadow:0 2px 5px #00000029;padding:10px 20px 10px 20px;margin-left:10px; text-align: center;background-color:#065ea5;color:#fff}
        .search .search-advanced-group .wrapper .action-group .undo i{margin-right:0px;font-size:16px;display:inline-block;vertical-align:baseline}
        .search .search-advanced-danhba .wrapper .filter-group{margin-right:0px}
        @media only screen and (max-width:768px){
            .search .search-advanced-danhba .wrapper .filter-group{flex-basis:30.95%;margin-right:15px;font-size:14px}
            .search .search-advanced-danhba .wrapper .filter-group .form-control{font-size:14px}}
        @media only screen and (min-width:769px){
            .search .search-advanced-danhba .wrapper .filter-group:nth-child(4n+4){margin-right:0px}}
        @media only screen and (max-width:414px){
            .search .search-advanced-danhba .wrapper .filter-group{flex-basis:48%;margin-right:0px}
            .search .search-advanced-danhba .wrapper .filter-group:nth-child(3n){margin-right:0px}
            .search .search-advanced-danhba .wrapper .filter-group:nth-child(2n+2){margin-right:0}}
        @media only screen and (max-width:320px){
            .search .search-advanced-danhba .wrapper .filter-group{flex-basis:45%;font-size:12px}
            .search .search-advanced-danhba .wrapper .filter-group:nth-child(2n+1){margin-right:0px}
            .search .search-advanced-danhba .wrapper .filter-group .form-control{font-size:12px}}
        @media only screen and (max-width:1024px){
            .search{width:100%}}
        @media only screen and (max-width:414px){
            .search{padding:20px 10px}
            .search .wrapper{flex-wrap:wrap}
            .search .search-field{flex-basis:70%}
            .search .view-mode{flex-basis:30%}
            .search .search-advanced-label{margin-top:15px}}
        .search-danhba{margin-top:-100px}
        .uni-list .uni-item .uni-bg{display:none}.uni-list .uni-item .name-group{color:#828282;display:none}
        @media only screen and (max-width:414px){
            .uni-list.grid .uni-item{flex-basis:100%}.uni-list.grid .uni-item .group-item .uni-description{display:block}}
        .views #timtruong_viewmore,.views #timtruong_collapse{
            background-color:#087ade;border-radius:10px;color:#fff;box-shadow:0 2px 5px rgba(0,0,0,.16);
            padding:10px 50px;margin:10px 0;display:inline-block;font-size:13px;cursor:pointer;outline:none;border:0}
        .views #timtruong_collapse{display:none}
       
        body {
            font-family: 'Roboto',sans-serif;
            font-weight: 400;
            background-color: #f9f9f9;
        }
        .search .search-advanced-group .wrapper {
            margin-top: 20px;
            display: none;
            flex-wrap: wrap;
            justify-content: flex-start;
        }
        .search {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 3px 6px #00000029;
            padding: 20px 30px;
            width: 55%;
            margin: 0 auto;
            position: relative;
            z-index: 999;
            margin-top: 10px;
            margin-bottom: 30px;
        }
        .search .wrapper {
            display: flex;
            align-items: center;
        }   
        .search .search-field {
            position: relative;
            flex-basis: 98%;
        }
        .search .search-field .form-shape {
            border: none;
            border-bottom: 1px solid #cecece;
            outline: none;
            border-radius: 0;
            box-shadow: none;
            padding-right: 10px;
        }
        .form-control {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1.5rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-image: none;
            border-radius: .34rem;
            background-clip: padding-box;
        }
        button, input {
            overflow: visible;
        }
        .search .search-field label {
            outline: none;
            box-shadow: none;
            background-color: transparent;
            padding: 0;
            cursor: pointer;
            position: absolute;
            top: 0;
        }
        .search .search-field label.active {
            outline: none;
            box-shadow: none;
            background-color: transparent;
            padding: 0;
            display: none;
            position: absolute;
            top: 0;
            left: 148%;
        }
        .search .search-field i {
            background-color: #087ade;
            padding: 8px 10px;
            display: block;
            border-radius: 50%;
        }
        .fa-lg {
            font-size: 1.33333333em;
            line-height: .75em;
            vertical-align: -15%;
        }
        .fa {
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
        }
        .search .view-mode span {
            cursor: pointer;
            background: #efefef;
            padding: 7px 10px;
            margin-left: 15px;
            display: inline-block;
        }
        .search .view-mode span {
            cursor: pointer;
        }
        .search .view-mode span.layout-grid {
            background: #08f;
        }
        .search .view-mode span {
            cursor: pointer;
            background: #efefef;
            padding: 7px 10px;
            margin-left: 15px;
            display: inline-block;
        }
        .search .view-mode span.layout-list i {
            color: #9c9c9c;}
        .search .view-mode span i {
            vertical-align: middle;
        }
        .fa {
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;}

        .search .view-mode {
            flex-basis: 15%;
        }
        .search .view-mode span.layout-grid {
            background: #08f;
        }
        .search .view-mode span.layout-grid i {
            color: #fff;
        }
        .search .view-mode span i {
            vertical-align: middle;
        }
        .search .search-advanced-group .wrapper {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            justify-content: space-between;
        }
        .search .search-advanced-group .wrapper .filter-group {
            margin-top: 10px;
            margin-right: 5px;
            flex-basis: 23%;
        }
        select.form-control:not([size]):not([multiple]) {
            height: calc(3rem + 2px);
        }
        .search .search-advanced-label {
            cursor: pointer;
            user-select: none;
            background-color: #fff;
            color:#087ade;
            border:2.5px solid #087ade;
            padding: 10px 10px;
            margin-left: 50px;
            border-radius: 1rem;
        }
        .search-advanced-label.active {
            cursor: pointer;
            user-select: none;
            background-color:#065ea5;
            color: #fff;
            border:2.5px solid #087ade;
            padding: 10px 10px;
            margin-left: 50px;
            border-radius: 1rem;
        }
        .search-advanced-label:hover {
            cursor: pointer;
            user-select: none;
            background-color:#065ea5;
            color: #fff;
            border:2.5px solid #087ade;
            padding: 10px 10px;
            margin-left: 50px;
            border-radius: 1rem;
        }
        .search .search-advanced-label i {
            margin-left: 5px;
            padding: 1px 2px;
            border-radius: 3px;
        }
        option {
            font-weight: normal;
            display: block;
            font-size: 14px;
            white-space: nowrap;
            min-height: 1.2em;
            padding: 0px 2px 1px;
        }
        #loc{
            margin-left: 10px; margin-bottom: 7px;
            font-weight: 600;
        }
        .btn-timtruong.active{display: none;}
        .fa-caret-down{ color: blue; }
        .btn-timtruong button{
            border: none;
            background-color: #fff;
        }
.container-fluid.truong{
    /* margin-left: 140px; */
    padding: 25px 0;
    margin-top: 60px;
}
.container .row .tieude{
    text-align: center;
    margin-left: -100px;
    color: #990000;
    /* padding-bottom: 20px; */
}

</style>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.search-advanced-group .wrapper').slideDown();
            $('.search-advanced-label').click(function() {
                $(this).parent().children('.search-advanced-label').toggleClass('active');
                $('.search-advanced-group').parent().children('.search-advanced-group').slideToggle();
                $('.search-field').parent().children().children('label').toggleClass('active');
            });
        });
    </script>
    <script>//xem thêm. ẩn checkbox tỉnh
       //ẩn cục top trường để hiển thị kết quả
        $(document).ready(function(){
            var top= $('.col-sm-3.item');
            var status = true;
            $('#nuttracuu').click(function(event) {
                event.preventDefault();
                if(status=true){
                   top.hide();
                   status=false; 
                }
            });
        });

        $(document).ready(function(){
            var top= $('.col-sm-3.item');
            var status = true;
            $('#nutmatruong').click(function(event) {
                event.preventDefault();
                if(status=true){
                   top.hide();
                   status=false; 
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.dynamic').change(function(){
                if($(this).val() != ''){
                    var select = $(this).attr("id");
                    var dependent = $(this).data('dependent');
                    var value = $(this).val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('dynamic')}}",
                        method: "POST",
                        data: {
                            select:select,
                            value:value, 
                            _token:_token,
                            dependent:dependent
                        },
                        success:function(result){
                            $('#'+dependent).html(result);
                        },
                        error:function(){
                        }
                    })
                }
            });
        });
    </script>
@endsection
@section('content')
    @include('truong.menudoc')
    <div class="container-fluid">
        <div class="bannertimtruong">
            <img src="{{URL::to('/')}}/public/frontend/images/bannertruong1.jpg" alt=""> 
            <div></div>            
        </div>
        <div class="khungtimkiemtruong">
            <center>                
                <h1>TÌM TRƯỜNG ĐẠI HỌC</h1>
            </center>
            <br>
            <div class="search">
                <div class="wrapper">
                    <div class="search-field">
                        <input type="text" id="tukhoa" class="form-control form-shape" name="tukhoa" placeholder="Nhập tên trường hoặc mã trường" autocomplete="on">
                        <label for="submit-form" class="btn-timtruong">
                            <div>
                            <button id='nutmatruong'><i class="fas fa-search"></i></button>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid truong">
        <div class="row">
            <div class="col-sm-3" style="width: 300px;margin-left: 65px;color:#222222">
                <!-- menu dọc -->
                <nav class="sidebar card py-2 mb-4" >
                    <h3> Tìm kiếm nâng cao</h3>
                            {{ csrf_field()}}
                        <ul class="nav flex-column">
                            <li class="nav-item kv">
                                <a class="nav-link" > Khu vực và tỉnh thành <i class="fas fa-angle-right"></i> </a>
                                <ul class="submenu dropdown-menu kv">
                                    <li><a class="nav-link kv" >Miền Bắc</a>
                                        <ul>
                                            <li>
                                                <input class="common_selector" type="checkbox" value="Tất cả" id="checkbox-all1" />
                                                <label for="checkbox-all1"> Tất cả </label>
                                            </li>
                                            <?php $i=1; ?>
                                            @foreach ($MB as $row)
                                                <div class="col-sm-6">
                                                    <li>
                                                        <input class="common_selector khuvuc" type="checkbox" value="{{$row->Tinh}}" id='{{$i}}' name="kv1[]" />
                                                        <label for="{{$i}}"> {{$row->Tinh}}</label>
                                                    </li>
                                                </div>
                                                <?php $i++; ?>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a class="nav-link kv" >Miền Trung</a>
                                        <ul>
                                            <li>
                                                <input class="common_selector" type="checkbox" value="Tất cả" id="checkbox-all2" />
                                                <label for="checkbox-all2"> Tất cả </label>
                                            </li>
                                            @foreach ($MT as $row)
                                            <div class="col-sm-6">
                                                <li>
                                                    <input class="common_selector khuvuc" type="checkbox" value="{{$row->Tinh}}" id="{{$i}}" name="kv2[]" />
                                                    <label for="{{$i}}"> {{$row->Tinh}}</label>
                                                </li>
                                            </div>
                                                <?php $i++; ?>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a class="nav-link kv" >Miền Nam</a>
                                        <ul>
                                            <li>
                                                <input class="common_selector khuvuc" type="checkbox" value="Tất cả" id="checkbox-all3" />
                                                <label for="checkbox-all3"> Tất cả </label>
                                            </li>
                                            @foreach ($MN as $row)
                                            <div class="col-sm-6">
                                                <li>
                                                    <input class="common_selector khuvuc" type="checkbox" value="{{$row->Tinh}}" id="{{$i}}" name="kv3[]" />
                                                    <label for="{{$i}}"> {{$row->Tinh}}</label>
                                                </li>
                                            </div>
                                                <?php $i++; ?>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a class="nav-link kv" >Tây Nguyên</a>
                                        <ul style="width: 155px">
                                            <li>
                                                <input class="common_selector" type="checkbox" value="Tất cả" id="checkbox-all4" />
                                                <label for="checkbox-all4"> Tất cả </label>
                                            </li>
                                            @foreach ($TN as $row)
                                            <li>
                                                <input class="common_selector khuvuc" type="checkbox" value="{{$row->Tinh}}" id="{{$i}}" name="kv4[]" />
                                                <label for="{{$i}}"> {{$row->Tinh}}</label>
                                            </li>
                                                <?php $i++; ?>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" > Loại trường  </a>
                                <ul id="filters">
                                    <li>
                                        <input class="common_selector loaitruong" type="checkbox" value="Công lập" id="CongLap" />
                                        <label for="CongLap"> Công lập</label>
                                    </li>
                                    <li>
                                        <input class="common_selector loaitruong" type="checkbox" value="Dân lập" id="DanLap" />
                                        <label for="DanLap"> Dân lập</label>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" > Hệ đào tạo </i></a>
                                <ul id="filters">
                                    <li>
                                        <input class="common_selector hedaotao" type="checkbox" value="Đại học" id="DaiHoc" />
                                        <label for="DaiHoc"> Đại học</label>
                                    </li>
                                    <li>
                                        <input class="common_selector hedaotao" type="checkbox" value="Cao Đẳng" id="CaoDang" />
                                        <label for="CaoDang"> Cao Đẳng</label>
                                    </li>
                                    <li>
                                        <input class="common_selector hedaotao" type="checkbox" value="Trung Cấp" id="TrungCap" />
                                        <label for="TrungCap"> Trung Cấp</label>
                                    </li>                                                                         
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" > Khối ngành </a>
                                <select id="KhoiNganh" class="form-control common_selector dynamic khoinganh" name="khoinganh" data-dependent='MaNg'>
                                    <option selected="selected" value="">Tất cả</option>
                                    @foreach ($khoinganh as $khoinganh)
                                        <option value="{{$khoinganh->KhoiNganh}}">{{$khoinganh->KhoiNganh}}</option>
                                    @endforeach   
                                </select>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" > Ngành </a>
                                <select id="MaNg" class="form-control nganh" name="nganh">
                                    <option selected="selected" value="">Tất cả</option>
                                </select>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" > Phương thức tuyển sinh  </a>
                                <select id="filters" class="form-control common_selector phuongthuc" name="phuongthuc">
                                    <option selected="selected" value="">Tất cả</option>
                                     @foreach ($phuongthuc as $phuongthuc)
                                        <option value="{{$phuongthuc->MaPhgThuc}}">{{$phuongthuc->TenPhgThuc}}</option>
                                    @endforeach   
                                </select>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" > Học phí </a>
                                    <input type="number" class="form-control common_selector hhocphi" placeholder="triệu đồng" name="hhocphi" id="" ><br />
                            </li>
                        </ul>
                        <button class="btn btn-primary" id="nuttracuu">Tìm kiếm</button>
                        {{ csrf_field()}}
                </nav>
                <!-- hết menu dọc -->
                
            </div>
            <div class="col-sm-9" style="margin-left: 20px;">
                <div class="toptruong">          
                    <div class="row">
                        <div class="col-sm-3 item ">
                            <div class="khungtruong">
                                <div class="col-sm-8">
                                    <img src="{{URL::to('/')}}/public/frontend/images/Logo-VNU.jpg" alt="" class="logotruong">
                                </div>
                                <div class="col-sm-4">
                                    <div class="hinh1">
                                        <div class="hinhvuong"></div>
                                        <div class="tamgiac"></div>
                                    </div>
                                    <div class="kihieu">   
                                        <div class="rank">TOP 1</div>
                                        <div class="matruong"> VNU</div>
                                        <div class="namtl">1906</div>
                                    </div>
                                </div>
                            </div>
                            <div class="thongtin">
                                <h2> <a href="http://www.vnu.edu.vn/"> Đại học Quốc gia Hà Nội </a>
                                </h2>
                                <h3><i class="fas fa-map-marker-alt"></i>&ensp;Miền Bắc - Hà Nội</h3>
                                <h3><i class="fas fa-toolbox"></i> Đại học - Công Lập</h3>
                                <h3><i class="fas fa-tags"></i> Học phí TB:</h3>
                                <div class="chitiet">
                                    <a href="{{URL::to('/')}}/truong/QHT/chitiet" title="Xem chi tiết"><i class="fas fa-plus-circle"></i> </a>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="col-sm-3 item ">
                            <div class="khungtruong">
                                <div class="col-sm-8">
                                    <img src="{{URL::to('/')}}/public/frontend/images/Logo-TDT.jpg" alt="" class="logotruong">
                                </div>
                                <div class="col-sm-4">
                                    <div class="hinh2">
                                        <div class="hinhvuong"></div>
                                        <div class="tamgiac"></div>
                                    </div>
                                    <div class="kihieu">   
                                        <div class="rank">TOP 2</div>
                                        <div class="matruong"> DTT</div>
                                        <div class="namtl">1997</div>
                                    </div>
                                </div>
                            </div>
                            <div class="thongtin">
                                <h2> <a href="https://www.tdtu.edu.vn/"> Đại học Tôn Đức Thắng </a>
                                </h2>
                                <h3><i class="fas fa-map-marker-alt"></i>&ensp;Miền Nam - HCM</h3>
                                <h3><i class="fas fa-toolbox"></i> Đại học - Dân Lập</h3>
                                <h3><i class="fas fa-tags"></i> Học phí TB: 24 triệu/năm</h3>
                                <div class="chitiet">
                                    <a href="{{URL::to('/')}}/truong/DTT/chitiet" title="Xem chi tiết"><i class="fas fa-plus-circle"></i> </a>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="col-sm-3 item ">
                            <div class="khungtruong">
                                <div class="col-sm-8">
                                    <img src="{{URL::to('/')}}/public/frontend/images/Logo-DT.png" alt="" class="logotruong">
                                </div>
                                <div class="col-sm-4">
                                    <div class="hinh3">
                                        <div class="hinhvuong"></div>
                                        <div class="tamgiac"></div>
                                    </div>
                                    <div class="kihieu">   
                                        <div class="rank">TOP 3</div>
                                        <div class="matruong"> DDT</div>
                                        <div class="namtl">1994</div>
                                    </div>
                                </div>
                            </div>
                            <div class="thongtin">
                                <h2> <a href="https://duytan.edu.vn/"> Đại học Duy Tân </a>
                                </h2>
                                <h3><i class="fas fa-map-marker-alt"></i>&ensp;Miền Trung - Đà Nẵng</h3>
                                <h3><i class="fas fa-toolbox"></i> Đại học - Dân Lập</h3>
                                <h3><i class="fas fa-tags"></i> Học phí TB: 30 triệu/năm</h3>
                                <div class="chitiet">
                                    <a href="{{URL::to('/')}}/truong/DDT/chitiet" title="Xem chi tiết"><i class="fas fa-plus-circle"></i> </a>
                                </div>
                                <br>
                            </div>
                        </div>
                        <!-- vòng lặp -->
                        <?php $i = 4; ?>
                        @foreach ($toptruong as $row)
                        <div class="col-sm-3 item ">
                            <div class="khungtruong">
                                <div class="col-sm-8">
                                    <img src="{{URL::to('/')}}/public/Upload/logo/{{$row->Logo}}" alt="" class="logotruong">
                                </div>
                                <div class="col-sm-4">
                                    <div class="hinh4">
                                        <div class="hinhvuong"></div>
                                        <div class="tamgiac"></div>
                                    </div>
                                    <div class="kihieu">   
                                        <div class="rank">TOP</div>
                                        <div class="matruong" style="padding-left: 0"> {{$row->MaTr}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="thongtin">
                                <h2> <a href="{{URL::to('/')}}/truong/{{$row->MaTr}}/chitiet"> {{$row->TenTr}} </a>
                                </h2>
                                <h3><i class="fas fa-map-marker-alt"></i>&ensp;{{$row->KhuVuc}} - {{$row->Tinh}}</h3>
                                <h3><i class="fas fa-toolbox"></i> {{$row->HeDaoTao}} - {{$row->LoaiTr}}</h3>
                                <h3><i class="fas fa-tags"></i> Học phí TB: {{round(($row->HPTB)/1000000,2)}} triệu/năm</h3>
                                <div class="chitiet">
                                    <a href="{{URL::to('/')}}/truong/{{$row->MaTr}}/chitiet" title="Xem chi tiết"><i class="fas fa-plus-circle"></i> </a>
                                </div>
                                <br>
                            </div>
                        </div>
                        <?php $i++; ?>   
                        @endforeach
                        <div class='ketqua'></div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function(){
            function filter_data(){
                var tukhoa = 'khongcos đâu';
                var khuvuc = get_filter('khuvuc');
                var tinh = '';
                var loaitruong = get_filter('loaitruong');
                var hedaotao = get_filter('hedaotao');
                var khoinganh = $('.khoinganh').val();
                var nganh = $('.nganh').val();
                var phuongthuc = $('.phuongthuc').val();
                var hhocphi = $('.hhocphi').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                        url:"{{route('tratruong')}}",
                        method: "POST",
                        data: {
                            khuvuc:khuvuc,
                            loaitruong:loaitruong,
                            hedaotao:hedaotao,
                            khoinganh:khoinganh,
                            nganh:nganh,
                            phuongthuc:phuongthuc, 
                            hhocphi:hhocphi, 
                            tukhoa:tukhoa, 
                            tinh:tinh, 
                            _token:_token
                        },
                        success:function(result){
                            $('.ketqua').html(result);
                        },
                        error:function(){
                            alert('Lỗi');
                        }
                    })
            }
            function get_filter(class_name){
                var filter = [];
                $('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
                });
                return filter;
            }
            $('#nuttracuu').click(function(){
                filter_data();
            });
        });
        $(document).ready(function(){
             $('#nutmatruong').click(function(){
                var tukhoa = $('#tukhoa').val();
                $.ajax({
                        url:"{{route('tentruong')}}",
                        method: "GET",
                        data: {
                            tukhoa:tukhoa
                        },
                        success:function(result){
                            $('.ketqua').html(result);
                        },
                        error:function(){
                            alert('Lỗi');
                        }
                    })
            });
        });
    </script>
@endsection
