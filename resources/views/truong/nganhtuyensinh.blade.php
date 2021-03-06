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
                  <p class= "kieuchu" style="margin-left: 15px;text-align: center"><span>M?? Tr?????ng:<span><br><span> {{$row->MaTr}}<span></p>
                @endforeach
              </div>
              <div class="col-sm-8">
                @foreach ($data as $row)
                  <p class= "kieuchu">{{$row->HeDaoTao}} - {{$row->LoaiTr}}</p >
                  <p class= "kieuchu">?????a ch???: {{$row->DiaChi}}</p >
                  <p class= "kieuchu">Email: {{$row->Email}} </p >
                  <p class= "kieuchu aa">Website: <a href="{{$row->Website}}" target="_blank">{{$row->Website}} </a></p >
                  <p class= "kieuchu aa">Trang tuy???n sinh: <a href="{{$row->WebTS}}" target="_blank">T???i ????y</a> </p>
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
                  
                  var geocode={lat: lat, lng: lng};
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
              @foreach ($data as $row)
                  <li ><a href="chitiet">Gi???i thi???u</a></li>
                  <li class="active"><a href="">Ng??nh tuy???n sinh</a></li>
                  <li ><a href="diem">??i???m chu???n c??c n??m</a></li>
              @endforeach
            </ul>
          </div>
          <div>
            <br>
            @foreach ($data as $row)
                  <div>{{$row->TongCT}}</div>
            @endforeach
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width = '15%'>M?? Ng??nh</th>
                  <th width = '55%'>T??n Ng??nh</th>
                  <th width = '10%'>Ch??? ti??u</th>
                  <th width = '20%'>H???c ph??</th>
                </tr>
              </thead> 
              <tbody>
                  @foreach ($data2 as $row)
                    <tr>
                      <td><a href="{{URL::to('/')}}/nganh/{{$row->ID}}">{{$row->MaNg}}</a></td>
                      <td><a href="{{URL::to('/')}}/nganh/{{$row->ID}}">{{$row->TenNg}}</a></td>
                      <td>{{$row->ChiTieu}}</td>
                      <td>{{($row->HocPhi)/1000000}} tri???u/n??m</td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-sm-3" style="width: 265px;">
          @include('layout.sidebar_left')
        </div>
      </div>        
    </div>
</div>

<!-- <div class="container">
    <div class="row">
        <div class="col-sm-4">
            @foreach ($data as $row)
                <img src="{{URL::to('/')}}/public/Upload/logo/{{$row->Logo}}" alt="Logo" width="150px" height="150px">
                <p class="tentruong2">{{$row->TenTr}}</p>
                <p class= "kieuchu">M?? Tr?????ng: {{$row->MaTr}}</p>
                <p class= "kieuchu">{{$row->HeDaoTao}} - {{$row->LoaiTr}}</p >
                <p class= "kieuchu">?????a ch???: {{$row->DiaChi}}</p >
                <p class= "kieuchu">Email: {{$row->Email}} </p >
                <p class= "kieuchu">Website: <a href="{{$row->Website}} ">{{$row->Website}} </a></p >
                  <p class= "kieuchu">Trang tuy???n sinh: <a href="{{$row->WebTS}}">T???i ????y</a></p>

            @endforeach
         </div>
         <div class="col-sm-8">
            <div class='kieuchu'>
                <ul class="nav nav-tabs">
                  @foreach ($data as $row)
                      <li ><a href="chitiet">Gi???i thi???u</a></li>
                      <li class="active"><a href="">Ng??nh tuy???n sinh</a></li>
                      <li ><a href="diem">??i???m chu???n c??c n??m</a></li>
                  @endforeach
                </ul>
            </div>
            <br>
            <br>
            <div>
                  <div class="panel panel-primary">
                  <div class="panel-heading">
                    <p><b>Danh s??ch c??c ng??nh tuy???n sinh</b></p>
                  </div>
                  <div class="panel-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>M?? Ng??nh</th>
                          <th>T??n Ng??nh</th>
                          <th>Ch??? ti??u</th>
                          <th>H???c ph??</th>
                        </tr>
                      </thead> 
                      <tbody>
                          @foreach ($data2 as $row)
                            <tr>
                              <td><a href="{{URL::to('/')}}/nganh/{{$row->ID}}">{{$row->MaNg}}</a></td>
                              <td><a href="{{URL::to('/')}}/nganh/{{$row->ID}}">{{$row->TenNg}}</a></td>
                              <td>{{$row->ChiTieu}}</td>
                              <td>{{$row->HocPhi}}</td>
                            </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </div>          
                </div>
                
            </div>
         </div>
    </div>
</div> -->

@endsection