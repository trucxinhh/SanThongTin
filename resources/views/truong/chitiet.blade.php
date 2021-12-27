@extends('index')
@section('title')
    @foreach ($data as $row)
          {{$row->TenTr}}
    @endforeach
@endsection
@section('style')
<style>
    .kieuchu{
        font-size: 20px;
        text-align: justify;
        color: #fff;
    }
    .tentruong{
        font-size: 21px;
        color: blue;
    }
    .tentruong2{
        font-size: 33px;
        color: #fff;
        font-weight: 700;
    }
    .nen{
        background-color: white;
    }
    #map {
      height: 330px;
      width: 560px;
      padding-left: 15px;
    }

    .filter {
      position: absolute;
      top: 30px;
      left: -28%;
      transform: translate3d( 40%, 30%, 0 );
      width: 87%;
      height: 400px;
      z-index: 0;
      -webkit-backdrop-filter: blur(10px);
      backdrop-filter: blur(10px);
      background-color: rgba(148, 149, 158, 0.25);
      border-radius: 10px;
    }

    .filter {
      /* display: flex; */
      align-items: center;
      justify-content: center;
      color: #fff;
    }
    .thongtintruong .col-sm-6{
      width: 46%;
      margin-left: 16px;
      margin-top: -45px;
      z-index: 11
    }
    .kieuchu.aa a{
      color: #fff;
      font-weight: 500;

    }
    .kieuchu.aa a:hover{
      color: #FF0000;
      font-weight: 500;

    }
</style>
@endsection
@section('content')
   <br>
   <br>
  <div class="container-fluid chitiettr">
    <div class="row">
      <div class="bannerchitiettruong">
        <img src="{{URL::to('/')}}/public/frontend/images/bannertruong3.jpg" alt="">
        <div></div> 
      </div>
      <div class="thongtintruong">
        <div id="first-element" class="filter"></div> 
        <div class="col-sm-6">
          <div class="row">
            @foreach ($data as $row)
              <p class="tentruong2">{{$row->TenTr}}</p>
            @endforeach
          </div>
          <div class="row">
            <div class="col-sm-4">
              @foreach ($data as $row)
                <img src="{{URL::to('/')}}/public/Upload/logo/{{$row->Logo}}" alt="Logo" >
                <p class= "kieuchu" style="margin-left: 15px;text-align: center"><span>Mã Trường:<span><br><span> {{$row->MaTr}}<span></p>
              @endforeach
            </div>
            <div class="col-sm-8">
              @foreach ($data as $row)
                <p class= "kieuchu">{{$row->HeDaoTao}} - {{$row->LoaiTr}}</p >
                <p class= "kieuchu">Địa chỉ: {{$row->DiaChi}}</p >
                <p class= "kieuchu">Email: {{$row->Email}} </p >
                <p class= "kieuchu aa">Website: <a href="{{$row->Website}}" target="_blank">{{$row->Website}} </a></p >
                <p class= "kieuchu aa">Trang tuyển sinh: <a href="{{$row->WebTS}}" target="_blank">Tại đây</a> </p>
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="maptruong">
            <div id="map"></div>
            <script>
              var lat = <?php echo $lat;?>;
              var lng = <?php echo $lng;?>;        
              let map;

              function initMap() {
                
                var geocode={lat: lat, lng: lng };
                map2 = new google.maps.Map(document.getElementById("map"), {
                  center: geocode,
                  zoom: 15,
                  scrollwheel:false
                });
                const marker1 = new google.maps.Marker({
                  position: geocode,
                  animation: google.maps.Animation.DROP,
                  map: map2,
                });
                /*const marker2 = new google.maps.Marker({
                  position: {lat: 16.07591733058181, lng: 108.15347137060738 },
                  animation: google.maps.Animation.DROP,
                  map: map2,
                });*/
              }
            </script>
            
          </div>
        </div>
      </div>
      <div class="khungchitiet">
        <div class="col-sm-8" style="margin-top: -50px;margin-right: 30px;">
          <div class='kieuchu'>
            <ul class="nav nav-tabs">
                <li class="active"><a href="">Giới thiệu</a></li>
                <li ><a href="nganhtuyensinh">Ngành tuyển sinh</a></li>
                <li ><a href="diem">Điểm chuẩn các năm</a></li>
            </ul>
          </div>
          <div>
            @foreach ($data as $row)
                <br>
                @if($row->GioiThieu !='')
                <div><?php echo $row->GioiThieu; ?></div>
              @else 
                <p>Dữ liệu đang cập nhật</p>
              
              @endif
          @endforeach
          </div>
        </div>
        <div class="col-sm-3" style="width: 265px;">
          @include('layout.sidebar_left')
        </div>
      </div>        
    </div>
  </div>

    
@endsection