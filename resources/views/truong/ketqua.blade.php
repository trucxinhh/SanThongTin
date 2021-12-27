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
            width: 65%;
            margin: 0 auto;
            position: relative;
            z-index: 999;
            margin-top: 10px;
            margin-bottom: 40px;
        }
        .search .wrapper {
            display: flex;
            align-items: center;
        }   
        .search .search-field {
            position: relative;
            flex-basis: 65%;
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
            right: 0;
        }
        .search .search-field label.active {
            outline: none;
            box-shadow: none;
            background-color: transparent;
            padding: 0;
            display: none;
            position: absolute;
            top: 0;
            right: 0;
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
    margin-left: 140px;
    padding: 20px 0;
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
                            // alert(select)
                        }
                    })
                }
                // alert (value + dependent );
            });
        });
        $(document).ready(function(){
            $('.dynamic1').change(function(){
                if($(this).val() != ''){
                    var select = $(this).attr("id");
                    var dependent = $(this).data('dependent');
                    var value = $(this).val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('dynamic1')}}",
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
                            // alert(select)
                        }
                    })
                }
            });
        });
    </script>
@endsection

@section('content')
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
                            // alert(select)

                        }
                    })
                }
                // alert (value + dependent );
            });
        });
        $(document).ready(function(){
            $('.dynamic1').change(function(){
                if($(this).val() != ''){
                    var select = $(this).attr("id");
                    var dependent = $(this).data('dependent');
                    var value = $(this).val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('dynamic1')}}",
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
                            // alert(select)

                        }
                    })
                }
                // alert (value + dependent );
            });
        });
</script>
    <div class="container-fluid">
        <div class="bannertimtruong">
            <img src="{{URL::to('/')}}/public/frontend/images/bannertruong1.jpg" alt=""> 
            <div></div>            
        </div>
        <div class="khungtimkiemtruong">
            <center><h1>TÌM TRƯỜNG ĐẠI HỌC</h1></center>
            <br>
            <div class="search">
                <div class="wrapper">
                    <div class="search-field">
                        <form action="{{route('truong/ketqua')}}" method="post">
                            {{ csrf_field()}}
                            <input type="text" id="tukhoa" class="form-control form-shape" name="tukhoa" placeholder="Nhập tên trường hoặc mã trường" autocomplete="on">
                            <label for="submit-form" class="btn-timtruong">
                                <div>
                                <button type="submit" ><i class="fas fa-search"></i></button>
                                </div>
                            </label>
                        </form>
                    </div>
                    <div class="search-advanced-label ">
                        <span>Tìm kiếm nâng cao</span>
                        <i class="fas fa-caret-down" ></i>
                    </div>
                </div>
                <div class="search-advanced-group" >
                    <!-- <div class="wrapper"> -->
                        <form class="wrapper" action="{{route('truong/ketquanc')}}" method="post">
                            {{ csrf_field()}}
                        <div class="filter-group">
                            <span id="loc">Khu vực</span>
                            <select id="KhuVuc" class="form-control dynamic" name="khuvuc" data-dependent='Tinh'>
                                <option selected="selected" value="">---------Tất cả---------</option>
                                    @foreach ($khuvuc as $khuvuc)
                                        <option value="{{$khuvuc->KhuVuc}}">{{$khuvuc->KhuVuc}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="filter-group">
                            <span id="loc">Tỉnh thành</span>
                            <select id="Tinh" class="form-control" name="tinh">
                                <option selected="selected" value="">---------Tất cả---------</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <span id="loc">Khối ngành</span>
                            <select id="KhoiNganh" class="form-control dynamic1" name="khoinganh" data-dependent='MaNg'>
                                <option selected="selected" value="">---------Tất cả---------</option>
                                    @foreach ($khoinganh as $khoinganh)
                                        <option value="{{$khoinganh->KhoiNganh}}">{{$khoinganh->KhoiNganh}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="filter-group">
                            <span id="loc">Ngành</span>
                            <select id="MaNg" class="form-control" name="nganh">
                                <option selected="selected" value="">---------Tất cả---------</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <span id="loc">Loại trường</span>
                            <select class="form-control" name="loaitruong">
                                <option selected="selected" value="">---------Tất cả---------</option>
                                <option value="Công lập">Công lập</option>
                                <option value="Dân lập">Dân lập</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <span id="loc">Phương thức tuyển sinh</span>
                            <select class="form-control" name="phuongthuc">
                                <option selected="selected" value="">---------Tất cả---------</option>
                                    @foreach ($phuongthuc as $phuongthuc)
                                        <option value="{{$phuongthuc->MaPhgThuc}}">{{$phuongthuc->TenPhgThuc}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="filter-group">
                            <span id="loc">Hệ đào tạo</span>
                            <select class="form-control" name="hedaotao">
                                <option selected="selected" value="">---------Tất cả---------</option>
                                <option value="Đại học">Đại học</option>
                                <option value="Cao đẳng">Cao đẳng</option>
                                <option value="Trung cấp">Trung cấp</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <span id="loc">Học phí</span>
                            <input class="form-control"  type="number" name="hocphi" placeholder="Tất cả">
                        </div>
                        <!-- 
                        <div class="action-group" style=" margin-left: 20px">
                            <label for="submit-form" class="temp-submit"><i class="fas fa-search" aria-hidden="true"></i>Tìm kiếm </label>
                            <span class="undo remove-filter"><i class="fa fa-undo" aria-hidden="true"></i>Làm lại</span>
                        </div> -->
                        <div class="action-group" style=" margin-left: 410px">
                            <button class="temp-submit" type="submit">Tìm kiếm</button>
                        </div>
                    </form>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
    
	<br>
	<div class="container">
		<p style='font-size: 20px; text-align: center'><b>{{$tim}}</b></p>
		<br>
	   
    <div class="nen" style='font-size: 18px'>
    @for ($i=0; $i<$dem; $i++)
        @if ($i ==0)
        <div class="col-sm-5" style='/* border-style: solid; border-width: 2px;  */border-color: #003366; margin: 10px 40px; box-shadow:  0 3px 6px #00000029; border-radius: 10px ; height: 150px'>
            <div class="col-sm-3" style="padding-top: 20px">
                <img src="{{URL::to('/')}}/public/Upload/logo/{{$data[$i]->Logo}}" alt="Logo" width="100%" height="100%" >
            </div>
            <div class="col-sm-9" style="padding-top: 10px">
                <a href="{{$data[$i]->MaTr}}/chitiet" class="tentruong">{{$data[$i]->TenTr}}</a>
                <ul>
                    <li class="kieuchu">Mã Trường: {{$data[$i]->MaTr}}</li>
                    <li class="kieuchu">{{$data[$i]->HeDaoTao}} - {{$data[$i]->LoaiTr}}</li >
                    <li class="kieuchu">{{$data[$i]->KhuVuc}} - {{$data[$i]->Tinh}}</li >
                </ul>
            </div>
        </div>
        @elseif ($data[$i]->MaTr !=$data[$i-1]->MaTr)
            <div class="col-sm-5" style='/* border-style: solid; border-width: 2px;  */border-color: #003366; margin: 10px 40px; box-shadow:  0 3px 6px #00000029; border-radius: 10px; height: 150px'>
                <div class="col-sm-3" style="padding-top: 20px">
                    <img src="{{URL::to('/')}}/public/Upload/logo/{{$data[$i]->Logo}}" alt="Logo" width="100%" height="100%" >
                </div>
                <div class="col-sm-9" style="padding-top: 10px">
                    <a href="{{$data[$i]->MaTr}}/chitiet" class="tentruong">{{$data[$i]->TenTr}}</a>
                    <ul>
                        <li class="kieuchu">Mã Trường: {{$data[$i]->MaTr}}</li>
                        <li class="kieuchu">{{$data[$i]->HeDaoTao}} - {{$data[$i]->LoaiTr}}</li >
                        <li class="kieuchu">{{$data[$i]->KhuVuc}} - {{$data[$i]->Tinh}}</li >
                    </ul>
                </div>
            </div>
        @endif
    @endfor
    </div>

	</div>
		<br>
		<br>
    <div class="container-fluid truong">
        <div class="row">
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
                            <div class="chitiet">
                                <a href=""><i class="fas fa-plus-circle"></i> Chi Tiết</a>
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
                                    <div class="matruong"> TDT</div>
                                    <div class="namtl">1997</div>
                                </div>
                            </div>
                        </div>
                        <div class="thongtin">
                            <h2> <a href="https://www.tdtu.edu.vn/"> Đại học Tôn Đức Thắng </a>
                            </h2>
                            <h3><i class="fas fa-map-marker-alt"></i>&ensp;Miền Nam - HCM</h3>
                            <h3><i class="fas fa-toolbox"></i> Đại học - Dân Lập</h3>
                            <div class="chitiet">
                                <a href=""><i class="fas fa-plus-circle"></i> Chi Tiết</a>
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
                                    <div class="matruong"> DTU</div>
                                    <div class="namtl">1994</div>
                                </div>
                            </div>
                        </div>
                        <div class="thongtin">
                            <h2> <a href="https://duytan.edu.vn/"> Đại học Duy Tân </a>
                            </h2>
                            <h3><i class="fas fa-map-marker-alt"></i>&ensp;Miền Trung - Đà Nẵng</h3>
                            <h3><i class="fas fa-toolbox"></i> Đại học - Dân Lập</h3>
                            <div class="chitiet">
                                <a href=""><i class="fas fa-plus-circle"></i> Chi Tiết</a>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-sm-3 item ">
                        <div class="khungtruong">
                            <div class="col-sm-8">
                                <img src="{{URL::to('/')}}/public/frontend/images/Logo-BK.png" alt="" class="logotruong">
                            </div>
                            <div class="col-sm-4">
                                <div class="hinh4">
                                    <div class="hinhvuong"></div>
                                    <div class="tamgiac"></div>
                                </div>
                                <div class="kihieu">   
                                    <div class="rank">TOP 4</div>
                                    <div class="matruong" style="padding-left: 0">HCMUT</div>
                                    <div class="namtl">1957</div>
                                </div>
                            </div>
                        </div>
                        <div class="thongtin">
                            <h2> <a href="https://www.hcmut.edu.vn/vi"> Đại học Bách khoa TPHCM </a>
                            </h2>
                            <h3><i class="fas fa-map-marker-alt"></i>&ensp;Miền Nam - HCM</h3>
                            <h3><i class="fas fa-toolbox"></i> Đại học - Công Lập</h3>
                            <div class="chitiet">
                                <a href=""><i class="fas fa-plus-circle"></i> Chi Tiết</a>
                            </div>
                            <br>
                        </div>
                    </div>             
                </div>
            </div>
        </div>
    </div>
@endsection