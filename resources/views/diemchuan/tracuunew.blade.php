@extends('index')

@section('title')
Tra cứu điểm chuẩn, chỉ tiêu
@endsection

@section('style')
 <style>
        .temp-submit{
            cursor: pointer;
            display: inline-block;
            background-color: #fff;
            border-radius: 1.5rem;
            color: #087ade;
            padding: 10px 17px;
            margin-top: 15px;
            margin-bottom: 0;
            border: 1px solid #087ade;
            box-shadow: 0 2px 5px #00000029;
            margin-left: -90px;
        }
        .locthongtin{
            display: flex;
            font-size: 20px;
            background-color:#fff;
            color: #087ade;
            cursor: pointer;
            user-select: none;
            width: 800px;
            border: 2px solid #087ade;
            /* margin-left: -15px; */
            margin-top: -10px;
            border-radius: 0px 0px 10px 10px;
        }

        .locthongtin i{
            margin-top: 10px;
            margin-left: 20px;
        }
        .locthongtin h3{
            font-size: 18px;
            font-weight: 600;
            margin-left: 40px;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .locthongtin:hover{
            display: flex;
            font-size: 20px;
            background-color: #065ea5;
            color: #fff;
            cursor: pointer;
            user-select: none;
            width: 800px;
            border: 2px solid #087ade;
            /* margin-left: -15px; */
            margin-top: -10px;
            border-radius: 0px 0px 10px 10px;
        }
        .locthongtin.active{
            display: flex;
            font-size: 20px;
            background-color: #065ea5;
            color: #fff;
            cursor: pointer;
            user-select: none;
            width: 800px;
            border: 2px solid #087ade;
            /* margin-left: -15px; */
            margin-top: -10px;
            border-radius: 0px 0px 10px 10px;
        }
        .row{
            display: flex;
        }
        .item{
            margin-top: 20px;
            margin-left: -250px;
        }
        .filter-item{
            display: flex;
            padding: 0px 0px;
        }
        .filter-item select{
            height: 22px;
            margin-left: -30px;
            margin-top: 6px;
            font-size: 14px;
        }
        .filter-item h3{
            font-size: 14px;
            font-weight: 600;
            font-family: 'Roboto',sans-serif;
            padding-right: 40px;
        }
        .name-filter{
            margin-top: 30px;
            margin-left: -50px;
        }
        .name-filter h3{
            font-size: 14px;
            font-weight: 600;
            font-family: 'Roboto',sans-serif;
            padding-left: 0px;
            margin-top: 10px;
            margin-left: -20px;
            margin-bottom: 2px;
            padding-bottom: 13px;
        }.chart{
            margin-left: -35px;
            display: flex;
            margin-top: 20px;
        }
        .chart h3{
            font-size: 14px;
            font-weight: 600;
            font-family: 'Roboto',sans-serif;
            padding-left: 0px;
            margin-top: 10px;
            margin-left: -20px;
            margin-bottom: 2px;
        }
        .chart select{
            height: 22px;
            margin-left: 50px;
            margin-top: 5px;
            font-size: 14px;
        }option{
            height: 22px;
            font-size: 14px;
            text-align: center;
        }
        .thongketheo{
            font-size: 15px;
            padding-left: 30px;
            margin-top: 15px;
        }
        .thongketheo h3{
            font-weight: 700;
        }
        .thongketheo .tk1,.tk2,.tk3,.tk4{
            cursor: pointer;
            user-select: none;
            background-color:#fff;
            color: #065ea5;
            border:2.5px solid #087ade;
            padding: 5px 5px;
            margin:5px;
            border-radius: 1rem;
            width: 70%
        }
        .filter-group{
            width: 250px;
            padding-bottom: 5px;
        }
       /*  .thongketheo .tk1:hover,.tk2:hover,.tk3:hover,.tk4:hover{
            cursor: pointer;
            user-select: none;
            background-color:#065ea5;
            color: #fff;
            border:2.5px solid #087ade;
            padding: 5px 5px;
            margin:5px;
            border-radius: 1rem;
        } */
        .thongketheo .tk1.active,.tk2.active,.tk3.active,.tk4.active{
            cursor: pointer;
            user-select: none;
            background-color:#065ea5;
            color: #fff;
            border:2.5px solid #087ade;
            padding: 5px 5px;
            margin:5px;
            border-radius: 1rem;
        }
        .thongke{
            background-color: #fff;
            border-radius: 0px 0px 10px 10px;
            box-shadow: 0 3px 6px #00000029;
            padding-top: 10px;
            margin: 0 auto;
            position: relative;
            z-index: 999;
            margin-top: 5px;
            margin-bottom: 100px;
            width: 800px;
        }
        .khung .row{padding-bottom: 10px;}
        
        .locthongtin.active i{
            transform: rotate(180deg);
            margin-bottom: 10px
        }
        i{
            transition:  all 0.3s;
        }
        .filter-item1, .filter-item2, .filter-item3, .filter-item4{display: none;}
        .khung{display: none;}

        .ghichu,.ghichu1{display: none}
        .vidu:hover .ghichu{
            display: block;
            z-index:5
        }
        .vidu:hover .ghichu1{
            display: block;
            z-index:5
        }
        .ghichu{
            background-color: #eceaea;
            color: #fff;
            left: 100%;
            position: absolute;
            margin-left: -100px;
            margin-top: 5px;
            border-radius: 0 10px 10px 10px;
            width: 400px;
            z-index: 15;
        }
        .ghichu1{
            background-color: #eceaea;
            color: #fff;
            left: 100%;
            position: absolute;
            margin-left: -100px;
            margin-top: -42px;
            border-radius: 10px 10px 10px 0;
            width: 400px;
            z-index: 15;
        }
        .ghichu,.ghichu1 .noidung{
            padding: 20px;
            color: #555555;
        }
        .arrow-left{
            width: 0;
            height: 0;
            position: absolute;
            border-bottom: 16px solid transparent;
            border-top: 16px solid transparent;
            border-right: 16px solid #eceaea;
            left: -15px;
            top: 0px;
            padding: 0;
            /* z-index: -1; */
        }
        .ghichu1 .arrow-left{
            width: 0;
            height: 0;
            position: absolute;
            border-bottom: 16px solid transparent;
            border-top: 16px solid transparent;
            border-right: 16px solid #eceaea;
            left: -15px;
            top: 50px;
            padding: 0;
            /* z-index: -1; */
        }
        
    </style>
@endsection

@section('content')
    <script>
        $(document).ready(function(){
            $('.row.filter-item1').slideDown();
            $('.tk1').click(function() {
                $('.tk1').addClass('active');
                $('.tk2').removeClass('active');
                $('.tk3').removeClass('active');
                $('.tk4').removeClass('active');
                $('.filter-item2').hide();
                $('.filter-item3').hide();
                $('.filter-item4').hide();
                $('.filter-item1').show();
            });
        });

        $(document).ready(function(){
            $('.row.filter-item2').slideDown();
            $('.tk2').click(function() {
                $('.tk1').removeClass('active');
                $('.tk2').addClass('active');
                $('.tk3').removeClass('active');
                $('.tk4').removeClass('active');
                $('.filter-item1').hide();
                $('.filter-item3').hide();
                $('.filter-item4').hide();
                $('.filter-item2').show();
                $('.chitieu1').reset();
                $('.nam1').reset();
                $('.truong1').reset();
            });
        });
        $(document).ready(function(){
            $('.row.filter-item3').slideDown();
            $('.tk3').click(function() {
                $('.tk1').removeClass('active');
                $('.tk2').removeClass('active');
                $('.tk3').addClass('active');
                $('.tk4').removeClass('active');
                $('.filter-item1').hide();
                $('.filter-item2').hide();
                $('.filter-item4').hide();
                $('.filter-item3').show();
            });
        });
        $(document).ready(function(){
            $('.row.filter-item4').slideDown();
            $('.tk4').click(function() {
                $('.tk1').removeClass('active');
                $('.tk2').removeClass('active');
                $('.tk3').removeClass('active');
                $('.tk4').addClass('active');
                $('.filter-item1').hide();
                $('.filter-item2').hide();
                $('.filter-item3').hide();
                $('.filter-item4').show();
            });
        });
        $(document).ready(function(){
            $('.dynamic').change(function(){
                if($(this).val() != ''){
                    var select = $(this).attr("id");
                    var dependent = $(this).data('dependent');
                    var value = $(this).val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('dynamicdependent')}}",
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
                            alert('SAI')
                        }
                    })
                }
                // alert (value + dependent );
            });
        });
        
        $(document).ready(function(){
            $('.locthongtin').slideDown();
            $('.locthongtin').click(function() {
                $(this).toggleClass('active');
                $('.khung').parent().children('.khung').slideToggle();
            });
        });
    </script>
    </head>
<body>
<div class="container-fluid">
        <div class="bannertradiem">
            <img src="{{URL::to('/')}}/public/frontend/images/bannertruong1.jpg" alt="" > 
            <div></div>            
        </div>
        <div class="khungtimkiemtruong">
            <center>                
                <h1>TRA CỨU ĐIỂM CHUẨN - CHỈ TIÊU</h1>
            </center>
            <br>
            <div class="thongke">
                <div class="container">
                    <div class="locthongtin"> 
                        <h3>Tra cứu điểm chuẩn và chỉ tiêu</h3>
                        <i class="fas fa-caret-down "></i>
                    </div>
                    <div class="khung">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="thongketheo">
                                   <!--  <h3>Thống kê theo</h3> -->
                                    <div class="vidu"style="display:flex;">
                                        <div class="tk3" >
                                            <div>Theo trường và ngành học</div>
                                        </div>
                                        <div class="ghichu"> 
                                            <div class="arrow-left"></div>
                                            <div class="noidung">Ví dụ: Điểm chuẩn ngành Thương mại điện tử của Trường Đại học kinh tế - ĐHĐN qua các năm</div>
                                        </div>
                                    </div>
                                    <div class="vidu"style="display:flex;">
                                        <div class="tk1" >Theo trường và năm</div>
                                        <div class="ghichu"> 
                                            <div class="arrow-left"></div>
                                            <div class="noidung">Ví dụ: Điểm chuẩn của Trường Đại học kinh tế năm 2020</div>
                                        </div>
                                    </div>
                                    <div class="vidu"style="display:flex;">
                                        <div class="tk2">Theo ngành và năm</div>
                                        <div class="ghichu"> 
                                            <div class="arrow-left"></div>
                                            <div class="noidung">Ví dụ: Điểm chuẩn ngành Thương mại điện tử năm 2020 giữa các trường</div>
                                        </div>
                                    </div>
                                    <div class="vidu"style="display:flex;">
                                        <div class="tk4">Theo trường</div>
                                        <div class="ghichu1"> 
                                            <div class="arrow-left"></div>
                                            <div class="noidung">Ví dụ: Điểm chuẩn của Trường Đại học kinh tế qua các năm</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">

                                <div class="filter-item3">
                                    <div class="row">                        
                                        <div class="col-sm-5">
                                            <div class="name-filter">
                                                <h3> Kiểu biểu đồ</h3> 
                                                <h3>Chỉ tiêu thống kê</h3>
                                                <h3>Trường</h3>
                                                <h3>Ngành</h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <form action="{{route('diemchuan/ketqua3')}}" method="post">
                                            <div class="item">
                                                <div class="filter-group">
                                                    <select class="form-control" name="bieudo3" >
                                                        <option value="bar">Bar</option>
                                                        <option value="line">Line</option>
                                                        <option value="stepline">StepLine</option>
                                                        <option value="column">Column</option>
                                                        <option value="area">Area</option>
                                                    </select>
                                                </div>
                                                <div class="filter-group">
                                                    <select name="chitieu3" class='form-control chitieutk'>
                                                        <option value="ChiTieu">Chỉ tiêu</option>
                                                        <option selected="selected" value="DiemChuan">Điểm chuẩn</option>
                                                    </select>
                                                </div>
                                                <div class="filter-group">
                                                    <select name="truong3" id='MaTr' class='form-control truong3 dynamic' data-dependent='MaNg'>
                                                        <option value="">--Chọn trường--</option>
                                                            @foreach ($truong as $tr)
                                                                <option value="{{$tr->MaTr}}">{{$tr->TenTr}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                                <div class="filter-group">
                                                    <select name="nganh3" id='MaNg' class='form-control nganh3'>
                                                        <option value="">--Chọn Ngành--</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{ csrf_field()}}
                                                <button class="btn btn-primary" type='submit' name='button3'>Tra cứu</button>
                                            
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-item1">
                                    <div class="row">                        
                                        <div class="col-sm-5">
                                            <div class="name-filter">
                                                <h3> Kiểu biểu đồ</h3> 
                                                <h3>Chỉ tiêu thống kê</h3>
                                                <h3>Năm</h3>
                                                <h3>Trường</h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <form action="{{route('diemchuan/ketqua1')}}" method='post'>
                                                {{ csrf_field()}}
                                                <div class="item">
                                                    <div class="filter-group">
                                                        <select class="form-control" name="bieudo1" >
                                                        <option value="bar">Bar</option>
                                                        <option value="line">Line</option>
                                                        <option value="stepline">StepLine</option>
                                                        <option value="column">Column</option>
                                                        <option value="area">Area</option>
                                                        </select>
                                                    </div>
                                                    <div class="filter-group">
                                                        <select name="chitieu1" class='form-control chitieutk'>
                                                            <option selected="selected" value="DiemChuan">Điểm chuẩn</option>
                                                            <option value="ChiTieu">Chỉ tiêu</option>
                                                        </select>

                                                    </div>
                                                    <div class="filter-group">
                                                        <select name="truong1" class='form-control truong'>
                                                            <option selected="selected" value="">--Chọn trường--</option>
                                                            @foreach ($truong as $tr)
                                                                <option value="{{$tr->MaTr}}">{{$tr->TenTr}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="filter-group">
                                                        <select name="nam1" class='form-control nam1'>
                                                            <option selected="selected" value="">--Chọn năm--</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                        </select>

                                                    </div>
                                                    
                                                </div>
                                                <button class="btn btn-primary" type='submit' name='button1'>Tra cứu</button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-item2">
                                    <div class="row">                        
                                        <div class="col-sm-5">
                                            <div class="name-filter">
                                                <h3>Kiểu biểu đồ</h3> 
                                                <h3>Chỉ tiêu thống kê</h3>
                                                <h3>Năm</h3>
                                                <h3>Ngành</h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <form action="{{route('diemchuan/ketqua2')}}" method="post">
                                                {{ csrf_field()}}
                                            <div class="item">
                                                <div class="filter-group">
                                                    <select class="form-control" name="bieudo2" >
                                                        <option value="bar">Bar</option>
                                                        <option value="line">Line</option>
                                                        <option value="stepline">StepLine</option>
                                                        <option value="column">Column</option>
                                                        <option value="area">Area</option>
                                                    </select>
                                                </div>
                                                <div class="filter-group">
                                                    <select name="chitieu2" class='form-control chitieutk'>
                                                        <option selected="selected" value="DiemChuan">Điểm chuẩn</option>
                                                        <option  value="ChiTieu">Tổng chỉ tiêu</option>
                                                    </select>
                                                </div>
                                                <div class="filter-group">
                                                    <select name="nam2" class='form-control nam'>
                                                        <option selected="selected" value="">--Chọn năm--</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                    </select>
                                                </div>
                                                <div class="filter-group">
                                                    <select name="nganh2" class='form-control nganh'>
                                                        <option selected="selected" value="">--Chọn Ngành--</option>
                                                            @foreach ($nganh as $ng)
                                                                <option value="{{$ng->ID}}">{{$ng->TenChung}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type='submit' name='button2'>Tra cứu</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-item4">
                                    <div class="row">                        
                                        <div class="col-sm-5">
                                            <div class="name-filter">
                                                <h3> Kiểu biểu đồ</h3> 
                                                <h3>Trường</h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <form action="{{route('diemchuan/ketqua4')}}" method="post">
                                                <div class="item">
                                                <div class="filter-group">
                                                    <select class="form-control" name="bieudo4" >
                                                        <option value="bar">Bar</option>
                                                        <option value="line">Line</option>
                                                        <option value="stepline">StepLine</option>
                                                        <option value="column">Column</option>
                                                        <option value="area">Area</option>
                                                    </select>
                                                </div>
                                                <div class="filter-group">
                                                    <select name="truong4" class='form-control truong'>
                                                        <option selected="selected" value="">--Chọn trường--</option>
                                                            @foreach ($truong as $tr)
                                                                <option value="{{$tr->MaTr}}">{{$tr->TenTr}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{ csrf_field()}}
                                                <button class="btn btn-primary" type='submit' name='button4'>Tra cứu</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
        </div>
        </div>
</div>

@endsection
