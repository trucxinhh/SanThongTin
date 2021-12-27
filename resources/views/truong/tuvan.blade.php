@extends('index')
@section('title')
Tư vấn tìm trường
@endsection

@section('style')
<style>
  .bannertuvan img{
    margin-top: 1px;
    width: 100%;
    height: 440px;
  }
  .bannertuvan div{
    margin-top: -399px;
    width: 100%;
    height: 400px;
    background-color: rgba(0, 0, 0, 0.5);
    transform: translate(0%, 0%)
  }
  form .uutien{
    /* display: flex; */
    width: 200px;
  }
  form{
    display: flex;
    justify-content: space-evenly;
    margin-top: -20px;
  }
  .hienthi2,.hienthi1,.hienthi3, .hienthi4{
    display: none;
  }
  .filter {
      position: absolute;
      top: 90px;
      left: -20%;
      transform: translate3d( 40%, 30%, 0 );
      width: 77%;
      height: 332px;
      z-index: 0;
      -webkit-backdrop-filter: blur(10px);
      backdrop-filter: blur(10px);
      background-color: rgba(255, 255, 255, 0.2);
      border-radius: 10px;
  }

  .filter {
    /* display: flex; */
    align-items: center;
    justify-content: center;
    color: #fff;
  }
  label{
    color: #fff;
  }
  .nuttuvan{
    margin-left: 46%;
    padding: 10px;
    z-index: auto;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0px 3px 14px rgb(160 83 199 / 80%);
    color: #a92d27;
    font-weight: 500; 
  }
  .nuttuvan:hover{
    margin-left: 46%;
    padding: 10px;
    z-index: auto;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-weight: 500; 
    background-color: #1b387c;
    color: #fff;
    box-shadow: 0 2px 6px rgb(55 84 224 / 60%);
  }
  .ketqua{
    /* padding-bottom: 30px; */
    margin: 20px 60px;
  }
  .kimduyen{
    display: flex;
  }
  .kimduyen.mau{
    background-color: #efe0b1;
    text-align: center;
    font-weight: 600;
  }
  .kimduyen div{
    padding: 10px;
    font-size: 14px;
    border-left: solid 1px;
    border-top: solid 1px;
    border-bottom: solid 1px;
  }
  .kimduyen .top{
    width: 50px;
    border-left: solid 2px;
  }
  .kimduyen .matrg{
    width: 70px;
  }
  .kimduyen .tentr{
    width: 300px;
  }
  .kimduyen .loaitr{
    width: 100px;
  }
  .kimduyen .HDT{
    width: 100px;
  }
  .kimduyen .tinh{
    width: 100px;
  }
  .kimduyen .hphi{
    width: 200px;
    border-right:solid 2px;
  }
  .kimduyen .nganh{
    width: 250px;
  }
  .kimduyen .khoi{
    width: 150px;
  }
  .kimduyen .diem{
    width: 100px;
  }
  
</style>

@endsection

@section('script')
<script>
    $(document).ready(function(){
        var lat = '';
        var lng = '';
        var address = 550000;
        geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
             lat = results[0].geometry.location.lat();
             lng = results[0].geometry.location.lng();
          } else {
            alert("Geocode was not successful for the following reason: " + status);
          }
        });
        alert('Latitude: ' + lat + ' Logitude: ' + lng);
    });
  $(document).ready(function(){
    var ut1,ut2,ut3,ut4,hp,kv,lt,dc,chonnganh;
    $("#chon-uutien1").change(function () {
      var ht1=$('.uutien1 .hienthi1');
      var ht2=$('.uutien1 .hienthi2');
      var ht3=$('.uutien1 .hienthi3');
      var ht4=$('.uutien1 .hienthi4');
      if (ut1!=null){
        if (ut1=='1'){
          $("#chon-uutien2 #2hp").show();
          $("#chon-uutien3 #3hp").show();
          $("#chon-uutien4 #4hp").show();
        }
        else if(ut1=='2'){
          $("#chon-uutien2 #2lt").show();
          $("#chon-uutien3 #3lt").show();
          $("#chon-uutien4 #4lt").show();
        }
        else if(ut1=='3'){
          $("#chon-uutien2 #2kv").show();
          $("#chon-uutien3 #3kv").show();
          $("#chon-uutien4 #4kv").show();
        }
        else if(ut1=='4'){
          $("#chon-uutien2 #2dc").show();
          $("#chon-uutien3 #3dc").show();
          $("#chon-uutien4 #4dc").show();
        }
      }
      if($(this).val() == "1"){ 
        ht1.show();
        ht2.hide();
        ht3.hide();
        ht4.hide();
        $("#chon-uutien2 #2hp").hide()
        $("#chon-uutien3 #3hp").hide()
        $("#chon-uutien4 #4hp").hide()
        ut1 = "1";
        }
      else if($(this).val() == "2"){
        ht2.show();
        ht1.hide();
        ht3.hide();
        ht4.hide();
        $("#chon-uutien2 #2lt").hide()
        $("#chon-uutien3 #3lt").hide()
        $("#chon-uutien4 #4lt").hide()
        ut1 = "2";
      }
      else if($(this).val() == "3"){
        ht3.show();
        ht1.hide();
        ht2.hide();
        ht4.hide();
        $("#chon-uutien2 #2kv").hide()
        $("#chon-uutien3 #3kv").hide()
        $("#chon-uutien4 #4kv").hide()
        ut1 = "3";
      }
      else if($(this).val() == "4"){
        ht4.show();
        ht1.hide();
        ht2.hide();
        ht3.hide();
        $("#chon-uutien2 #2dc").hide()
        $("#chon-uutien3 #3dc").hide()
        $("#chon-uutien4 #4dc").hide()
        ut1 = "4";
      }else{ 
        ht3.hide();
        ht1.hide();
        ht2.hide();
        ht4.hide();
        ut1 = "0";
      }
    });
    $('.uutien1 .hienthi1').change(function(){
      hp = $('input[name=hocphi1]:checked').val();
    });
    $('.uutien1 .hienthi2').change(function(){
      lt = $('input[name=loaitruong1]:checked').val();
    });
    $('.uutien1 .hienthi3').change(function(){
      kv = $('input[name=khuvuc1]:checked').val();
    });
    $('.uutien1 .hienthi4').change(function(){
      dc = $('.diemchuan1').val();
    });
    $("#chon-uutien2").change(function(){
      var ht1=$('.uutien2 .hienthi1');
      var ht2=$('.uutien2 .hienthi2');
      var ht3=$('.uutien2 .hienthi3');
      var ht4=$('.uutien2 .hienthi4');
      if (ut2!=null){
        if (ut2=='1'){
          $("#chon-uutien1 #1hp").show();
          $("#chon-uutien3 #3hp").show();
          $("#chon-uutien4 #4hp").show();
        }
        else if(ut2=='2'){
          $("#chon-uutien1 #1lt").show();
          $("#chon-uutien3 #3lt").show();
          $("#chon-uutien4 #4lt").show();
        }
        else if(ut2=='3'){
          $("#chon-uutien1 #1kv").show();
          $("#chon-uutien3 #3kv").show();
          $("#chon-uutien4 #4kv").show();
        }
        else if(ut2=='4'){
          $("#chon-uutien1 #1dc").show();
          $("#chon-uutien3 #3dc").show();
          $("#chon-uutien4 #4dc").show();
        }
      }
      if($(this).val() == "1"){ 
        ht1.show();
        ht2.hide();
        ht3.hide();
        ht4.hide();
        $("#chon-uutien1 #1hp").hide();
        $("#chon-uutien3 #3hp").hide();
        $("#chon-uutien4 #4hp").hide();
        ut2 = '1';
        }
      else if($(this).val() == "2"){
        ht2.show();
        ht1.hide();
        ht3.hide();
        ht4.hide();
        $("#chon-uutien1 #1lt").hide();
        $("#chon-uutien3 #3lt").hide();
        $("#chon-uutien4 #4lt").hide();
        ut2 = '2';
      }
      else if($(this).val() == "3"){
        ht3.show();
        ht1.hide();
        ht2.hide();
        ht4.hide();
        $("#chon-uutien1 #1kv").hide();
        $("#chon-uutien3 #3kv").hide();
        $("#chon-uutien4 #4kv").hide();
        ut2 = '3';
      }
      else if($(this).val() == "4"){
        ht4.show();
        ht1.hide();
        ht2.hide();
        ht3.hide();
        $("#chon-uutien1 #1dc").hide();
        $("#chon-uutien3 #3dc").hide();
        $("#chon-uutien4 #4dc").hide();
        ut2 = '4';
      }else{ 
        ht3.hide();
        ht1.hide();
        ht2.hide();
        ht4.hide();
        ut2 = '0';
      }      
    });
    $('.uutien2 .hienthi1').change(function(){
      hp = $('input[name=hocphi2]:checked').val();
    });
    $('.uutien2 .hienthi2').change(function(){
      lt = $('input[name=loaitruong2]:checked').val();
    });
    $('.uutien2 .hienthi3').change(function(){
      kv = $('input[name=khuvuc2]:checked').val();
    });
    $('.uutien2 .hienthi4').change(function(){
      dc = $('.diemchuan2').val();
    });
    $("#chon-uutien3").change(function () {
      var ht1=$('.uutien3 .hienthi1');
      var ht2=$('.uutien3 .hienthi2');
      var ht3=$('.uutien3 .hienthi3');
      var ht4=$('.uutien3 .hienthi4');
      if (ut3!=null){
        if (ut3=='1'){
          $("#chon-uutien1 #1hp").show();
          $("#chon-uutien2 #2hp").show();
          $("#chon-uutien4 #4hp").show();
        }
        else if(ut3=='2'){
          $("#chon-uutien1 #1lt").show();
          $("#chon-uutien2 #2lt").show();
          $("#chon-uutien4 #4lt").show();
        }
        else if(ut3=='3'){
          $("#chon-uutien1 #1kv").show();
          $("#chon-uutien2 #2kv").show();
          $("#chon-uutien4 #4kv").show();
        }
        else if(ut3=='4'){
          $("#chon-uutien1 #1dc").show();
          $("#chon-uutien2 #2dc").show();
          $("#chon-uutien4 #4dc").show();
        }
      }
      if($(this).val() == "1"){ 
        ht1.show();
        ht2.hide();
        ht3.hide();
        ht4.hide();
        $("#chon-uutien1 #1hp").hide();
        $("#chon-uutien2 #2hp").hide();
        $("#chon-uutien4 #4hp").hide();
        ut3 = '1';
        }
      else if($(this).val() == "2"){
        ht2.show();
        ht1.hide();
        ht3.hide();
        ht4.hide();
        $("#chon-uutien1 #1lt").hide();
        $("#chon-uutien2 #2lt").hide();
        $("#chon-uutien4 #4lt").hide();
        ut3 = '2';
      }
      else if($(this).val() == "3"){
        ht3.show();
        ht1.hide();
        ht2.hide();
        ht4.hide();
        $("#chon-uutien1 #1kv").hide();
        $("#chon-uutien2 #2kv").hide();
        $("#chon-uutien4 #4kv").hide();
        ut3 = '3';
      }
      else if($(this).val() == "4"){
        ht4.show();
        ht1.hide();
        ht2.hide();
        ht3.hide();
        $("#chon-uutien1 #1dc").hide();
        $("#chon-uutien2 #2dc").hide();
        $("#chon-uutien4 #4dc").hide();
        ut3 = '4';
      }else{ 
        ht3.hide();
        ht1.hide();
        ht2.hide();
        ht4.hide();
        ut3 = '0';
      }
    });
    $('.uutien3 .hienthi1').change(function(){
      hp = $('input[name=hocphi3]:checked').val();
    });
    $('.uutien3 .hienthi2').change(function(){
      lt = $('input[name=loaitruong3]:checked').val();
    });
    $('.uutien3 .hienthi3').change(function(){
      kv = $('input[name=khuvuc3]:checked').val();
    });
    $('.uutien3 .hienthi4').change(function(){
      dc = $('.diemchuan3').val();
    });
    $("#chon-uutien4").change(function () {
      var ht1=$('.uutien4 .hienthi1');
      var ht2=$('.uutien4 .hienthi2');
      var ht3=$('.uutien4 .hienthi3');
      var ht4=$('.uutien4 .hienthi4');
      if (ut4!=null){
        if (ut4=='1'){
          $("#chon-uutien1 #1hp").show();
          $("#chon-uutien2 #2hp").show();
          $("#chon-uutien3 #3hp").show();
        }
        else if(ut4=='2'){
          $("#chon-uutien1 #1lt").show();
          $("#chon-uutien2 #2lt").show();
          $("#chon-uutien3 #3lt").show();
        }
        else if(ut4=='3'){
          $("#chon-uutien1 #1kv").show();
          $("#chon-uutien2 #2kv").show();
          $("#chon-uutien3 #3kv").show();
        }
        else if(ut4=='4'){
          $("#chon-uutien1 #1dc").show();
          $("#chon-uutien2 #2dc").show();
          $("#chon-uutien3 #3dc").show();
        }
      }
      if($(this).val() == "1"){ 
        ht1.show();
        ht2.hide();
        ht3.hide();
        ht4.hide();
        $("#chon-uutien1 #1hp").hide();
        $("#chon-uutien2 #2hp").hide();
        $("#chon-uutien3 #3hp").hide();
        ut4 = '1';
        }
      else if($(this).val() == "2"){
        ht2.show();
        ht1.hide();
        ht3.hide();
        ht4.hide();
        $("#chon-uutien1 #1lt").hide();
        $("#chon-uutien2 #2lt").hide();
        $("#chon-uutien3 #3lt").hide();
        ut4 = '2';
      }
      else if($(this).val() == "3"){
        ht3.show();
        ht1.hide();
        ht2.hide();
        ht4.hide();
        $("#chon-uutien1 #1kv").hide();
        $("#chon-uutien2 #2kv").hide();
        $("#chon-uutien3 #3kv").hide();
        ut4 = '3';
      }
      else if($(this).val() == "4"){
        ht4.show();
        ht1.hide();
        ht2.hide();
        ht3.hide();
        $("#chon-uutien1 #1dc").hide();
        $("#chon-uutien2 #2dc").hide();
        $("#chon-uutien3 #3dc").hide();
        ut4 = '4';
      }else{ 
        ht3.hide();
        ht1.hide();
        ht2.hide();
        ht4.hide();
        ut4 = '0';
      }
    });
    $('.uutien4 .hienthi1').change(function(){
      hp = $('input[name=hocphi4]:checked').val();
    });
    $('.uutien4 .hienthi2').change(function(){
      lt = $('input[name=loaitruong4]:checked').val();
    });
    $('.uutien4 .hienthi3').change(function(){
      kv = $('input[name=khuvuc4]:checked').val();
    });
    $('.uutien4 .hienthi4').change(function(){
      dc = $('.diemchuan4').val();
    });
    $('.chonnganh').change(function(){
      chonnganh = $(this).val();
    });

 /* });
  $(document).ready(function(){*/
       $('.nuttuvan').click(function(){
          var _token = $('input[name="_token"]').val();
          $.ajax({
                  url:"{{route('kqtuvan')}}",
                  method: "POST",
                  data: {
                      ut1:ut1,
                      ut2:ut2,
                      ut3:ut3,
                      ut4:ut4,
                      chonnganh:chonnganh,
                      hp:hp,
                      lt:lt,
                      kv:kv,
                      dc:dc,
                      _token:_token
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

@section('content')
<div class="container-fluid">
    <div class="bannertuvan">
        <img src="{{URL::to('/')}}/public/frontend/images/nenlienhe.jpg" alt=""> 
        <div></div>            
    </div>
</div>
<div class="container">
  <div id="first-element" class="filter"></div> 
  <div class="form-tuvan" style="margin-top: -365px; height: auto; position: relative;">
    <center>
      <h3 style="color: #fff;">
        Chọn đặc điểm về trường bạn cần tìm theo thứ tự ưu tiên dưới đây
      </h3>
    </center>
    <center>
      {{ csrf_field()}}
        <select class="form-control common_selector chonnganh" style="width: 30%;margin: 15px 0; " name="chonnganh" id="">
            <option value="">Chọn ngành</option>
            @foreach ($nganh as $row)
              <option value='{{$row->ID}}'>{{$row->TenChung}}</option>
            @endforeach
        </select>
      </center>
        <br>
    <form action="" method="post">
      <div class="uutien">
        <select id="chon-uutien1" class="form-control common_selector dynamic uutien"  name="Ưu tiên"> 
          <option selected="selected"  value="0"> Ưu tiên 1</option>
          <option  id="1hp" value="1">Học phí</option>
          <option  id="1lt" value="2">Loại trường</option>
          <option  id="1kv" value="3">Khu vực</option>
          <option  id="1dc" value="4">Điểm chuẩn</option>
        </select>

        <div class="uutien1">
          <div class="hienthi1">
                <input type="radio" class="duoi15" name="hocphi1" value="1">
                <label for="duoi15">Dưới 15 triệu</label><br>
                <input type="radio" class="15toi25" name="hocphi1" value="2">
                <label for="15toi25">Từ 15 - 25 triệu</label><br>
                <input type="radio" class="tren25" name="hocphi1" value="3">
                <label for="tren25">Trên 25 triệu</label>
          </div>
          <div class="hienthi2">
                <input type="radio" class="CongLap" name="loaitruong1" value="Công lập">
                <label for="CongLap">Công lập</label><br>
                <input type="radio" class="DanLap" name="loaitruong1" value="Dân lập">
                <label for="DanLap">Dân lập</label>
          </div>
          <div class="hienthi3">
                <input type="radio" class="kv1" name="khuvuc1" value="Miền Bắc">
                <label for="kv1">Miền Bắc</label><br>
                <input type="radio" class="kv2" name="khuvuc1" value="Miền Nam">
                <label for="kv2">Miền Nam</label><br>
                <input type="radio" class="kv3" name="khuvuc1" value="Miền Trung">
                <label for="kv3">Miền Trung</label><br>
                <input type="radio" class="kv4" name="khuvuc1" value="Tây Nguyên">
                <label for="kv4">Tây Nguyên</label>
          </div>
          <div class="hienthi4">
            <input type="text" class="form-control form-shape diemchuan1" name="diemchuan1" placeholder="Nhập điểm dự kiến" autocomplete="on"style="width: 110%;">
          </div>
        </div>
      </div>
      <div class="uutien">
        <select id="chon-uutien2" class="form-control common_selector dynamic uutien" name="Ưu tiên"> 
          <option selected="selected"  value="0"> Ưu tiên 2</option>
          <option  id="2hp" value="1">Học phí</option>
          <option  id="2lt" value="2">Loại trường</option>
          <option  id="2kv" value="3">Khu vực</option>
          <option  id="2dc" value="4">Điểm chuẩn</option>
        </select>
        <div class="uutien2">
          <div class="hienthi1">
                <input type="radio" class="duoi15" name="hocphi2" value="1">
                <label for="duoi15">Dưới 15 triệu</label><br>
                <input type="radio" class="15toi25" name="hocphi2" value="2">
                <label for="15toi25">Từ 15 - 25 triệu</label><br>
                <input type="radio" class="tren25" name="hocphi2" value="3">
                <label for="tren25">Trên 25 triệu</label>
          </div>
          <div class="hienthi2">
                <input type="radio" class="CongLap" name="loaitruong2" value="Công lập">
                <label for="CongLap">Công lập</label><br>
                <input type="radio" class="DanLap" name="loaitruong2" value="Dân lập">
                <label for="DanLap">Dân lập</label>
          </div>
          <div class="hienthi3">
                <input type="radio" class="kv1" name="khuvuc2" value="Miền Bắc">
                <label for="kv1">Miền Bắc</label><br>
                <input type="radio" class="kv2" name="khuvuc2" value="Miền Nam">
                <label for="kv2">Miền Nam</label><br>
                <input type="radio" class="kv3" name="khuvuc2" value="Miền Trung">
                <label for="kv3">Miền Trung</label><br>
                <input type="radio" class="kv4" name="khuvuc2" value="Tây Nguyên">
                <label for="kv4">Tây Nguyên</label>
          </div>
          <div class="hienthi4">
            <input type="text" class="form-control form-shape diemchuan2" name="diemchuan2" placeholder="Nhập điểm dự kiến" autocomplete="on"style="width: 110%;">
          </div>
        </div>
      </div>
      <div class="uutien">
        <select id="chon-uutien3" class="form-control common_selector dynamic uutien" name="Ưu tiên"> 
          <option selected="selected"  value="0"> Ưu tiên 3</option>
          <option  id="3hp" value="1">Học phí</option>
          <option  id="3lt" value="2">Loại trường</option>
          <option  id="3kv" value="3">Khu vực</option>
          <option  id="3dc" value="4">Điểm chuẩn</option>
        </select>
        <div class="uutien3">
          <div class="hienthi1">
                <input type="radio" class="duoi15" name="hocphi3" value="1">
                <label for="duoi15">Dưới 15 triệu</label><br>
                <input type="radio" class="15toi25" name="hocphi3" value="2">
                <label for="15toi25">Từ 15 - 25 triệu</label><br>
                <input type="radio" class="tren25" name="hocphi3" value="3">
                <label for="tren25">Trên 25 triệu</label>
          </div>
          <div class="hienthi2">
                <input type="radio" class="CongLap" name="loaitruong3" value="Công lập">
                <label for="CongLap">Công lập</label><br>
                <input type="radio" class="DanLap" name="loaitruong3" value="Dân lập">
                <label for="DanLap">Dân lập</label>
          </div>
          <div class="hienthi3">
                <input type="radio" class="kv1" name="khuvuc3" value="Miền Bắc">
                <label for="kv1">Miền Bắc</label><br>
                <input type="radio" class="kv2" name="khuvuc3" value="Miền Nam">
                <label for="kv2">Miền Nam</label><br>
                <input type="radio" class="kv3" name="khuvuc3" value="Miền Trung">
                <label for="kv3">Miền Trung</label><br>
                <input type="radio" class="kv4" name="khuvuc3" value="Tây Nguyên">
                <label for="kv4">Tây Nguyên</label>
          </div>
          <div class="hienthi4">
            <input type="text" class="form-control form-shape diemchuan3" name="diemchuan3" placeholder="Nhập điểm dự kiến" autocomplete="on"style="width: 110%;">
          </div>
        </div>
      </div>
      <div class="uutien">
        <select id="chon-uutien4" class="form-control common_selector dynamic uutien" name="Ưu tiên"> 
          <option selected="selected"  value="0"> Ưu tiên 4</option>
          <option  id="4hp" value="1">Học phí</option>
          <option  id="4lt" value="2">Loại trường</option>
          <option  id="4kv" value="3">Khu vực</option>
          <option  id="4dc" value="4">Điểm chuẩn</option>
        </select>
        <div class="uutien4">
          <div class="hienthi1">
                <input type="radio" class="duoi15" name="hocphi4" value="1">
                <label for="duoi15">Dưới 15 triệu</label><br>
                <input type="radio" class="15toi25" name="hocphi4" value="2">
                <label for="15toi25">Từ 15 - 25 triệu</label><br>
                <input type="radio" class="tren25" name="hocphi4" value="3">
                <label for="tren25">Trên 25 triệu</label>
          </div>
          <div class="hienthi2">
                <input type="radio" class="CongLap" name="loaitruong4" value="Công lập">
                <label for="CongLap">Công lập</label><br>
                <input type="radio" class="DanLap" name="loaitruong4" value="Dân lập">
                <label for="DanLap">Dân lập</label>
          </div>
          <div class="hienthi3">
                <input type="radio" class="kv1" name="khuvuc4" value="Miền Bắc">
                <label for="kv1">Miền Bắc</label><br>
                <input type="radio" class="kv2" name="khuvuc4" value="Miền Nam">
                <label for="kv2">Miền Nam</label><br>
                <input type="radio" class="kv3" name="khuvuc4" value="Miền Trung">
                <label for="kv3">Miền Trung</label><br>
                <input type="radio" class="kv4" name="khuvuc4" value="Tây Nguyên">
                <label for="kv4">Tây Nguyên</label>
          </div>
          <div class="hienthi4">
            <input type="text" class="form-control form-shape diemchuan4" name="diemchuan4" placeholder="Nhập điểm dự kiến" autocomplete="on"style="width: 110%;">
          </div>
        </div>
      </div>
    </form>
    {{ csrf_field()}}
    <button type="submit" class="nuttuvan">Nhận kết quả</button>
  </div>
    
</div> 
<!-- <div class="container-fluid truong">
        <div class="row">
            <div class="col-sm-3" style="width: 300px;margin-left: 65px;color:#222222">
                <nav class="sidebar card py-2 mb-4" ></nav>
            </div>
            <div class="col-sm-9" style="margin-left: 20px;width: 800px">
                <div class="toptruong">          
                    <div class="row">
                        <div class="col-sm-3 item ">
                            <div class="khungtruong">
                                <div class="col-sm-8">
                                    <img src="{{URL::to('/')}}/public/Upload/logo/ktdn.jpg" alt="" class="logotruong">
                                </div>
                                <div class="col-sm-4">
                                    <div class="hinh1">
                                        <div class="hinhvuong"></div>
                                        <div class="tamgiac"></div>
                                    </div>
                                    <div class="kihieu">   
                                        <div class="rank">TOP 1</div>
                                        <div class="matruong"> DDQ</div>
                                        <div class="namtl"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="thongtin">
                                <h2> <a href="http://www.vnu.edu.vn/"> Trường Đại học Kinh tế - ĐHĐN </a>
                                </h2>
                                <h3><i class="fas fa-map-marker-alt"></i>&ensp;Miền Trung - Đà Nẵng</h3>
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
                                    <img src="{{URL::to('/')}}/public/frontend/images/Logo-DT.png" alt="" class="logotruong">
                                </div>
                                <div class="col-sm-4">
                                    <div class="hinh2">
                                        <div class="hinhvuong"></div>
                                        <div class="tamgiac"></div>
                                    </div>
                                    <div class="kihieu">   
                                        <div class="rank">TOP 2</div>
                                        <div class="matruong"> DTT</div>
                                        <div class="namtl"></div>
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
                        <div class="col-sm-3 item ">
                            <div class="khungtruong">
                                <div class="col-sm-8">
                                    <img src="http://localhost/congthongtin/public/Upload/logo/HueEco.jpg" alt="" class="logotruong">
                                </div>
                                <div class="col-sm-4">
                                    <div class="hinh3">
                                        <div class="hinhvuong"></div>
                                        <div class="tamgiac"></div>
                                    </div>
                                    <div class="kihieu">   
                                        <div class="rank">TOP 3</div>
                                        <div class="matruong"> DHK</div>
                                        <div class="namtl"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="thongtin">
                                <h2> <a href="https://duytan.edu.vn/"> Trường Đại học Kinh tế - ĐH Huế </a>
                                </h2>
                                <h3><i class="fas fa-map-marker-alt"></i>&ensp;Miền Trung - Huế</h3>
                                <h3><i class="fas fa-toolbox"></i> Đại học - Công lập</h3>
                                <h3><i class="fas fa-tags"></i> Học phí TB: </h3>
                                <div class="chitiet">
                                    <a href="{{URL::to('/')}}/truong/DDT/chitiet" title="Xem chi tiết"><i class="fas fa-plus-circle"></i> </a>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="col-sm-3 item ">
                            <div class="khungtruong">
                                <div class="col-sm-8">
                                    <img src="{{URL::to('/')}}/public/Upload/logo/logo UDA.jpg" alt="" class="logotruong">
                                </div>
                                <div class="col-sm-4">
                                    <div class="hinh4">
                                        <div class="hinhvuong"></div>
                                        <div class="tamgiac"></div>
                                    </div>
                                    <div class="kihieu">   
                                        <div class="rank">TOP 4</div>
                                        <div class="matruong" style="padding-left: 0"> DAD</div>
                                    </div>
                                </div>
                            </div>
                            <div class="thongtin">
                                <h2> <a href="https://duytan.edu.vn/"> Đại học Đông Á </a>
                                </h2>
                                <h3><i class="fas fa-map-marker-alt"></i>&ensp;Miền Trung - Đà Nẵng</h3>
                                <h3><i class="fas fa-toolbox"></i> Đại học - Dân Lập</h3>
                                <h3><i class="fas fa-tags"></i> Học phí TB: </h3>
                                <div class="chitiet">
                                    <a href="{{URL::to('/')}}/truong/DDT/chitiet" title="Xem chi tiết"><i class="fas fa-plus-circle"></i> </a>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="col-sm-3 item ">
                            <div class="khungtruong">
                                <div class="col-sm-8">
                                    <img src="{{URL::to('/')}}/public/Upload/logo/kientrucdanang.png" alt="" class="logotruong">
                                </div>
                                <div class="col-sm-4">
                                    <div class="hinh4">
                                        <div class="hinhvuong"></div>
                                        <div class="tamgiac"></div>
                                    </div>
                                    <div class="kihieu">   
                                        <div class="rank">TOP 5</div>
                                        <div class="matruong" style="padding-left: 0"> KTD</div>
                                    </div>
                                </div>
                            </div>
                            <div class="thongtin">
                                <h2> <a href="https://duytan.edu.vn/"> Đại học kiến trúc Đà Nẵng </a>
                                </h2>
                                <h3><i class="fas fa-map-marker-alt"></i>&ensp;Miền Trung - Đà Nẵng</h3>
                                <h3><i class="fas fa-toolbox"></i> Đại học - Dân lập</h3>
                                <h3><i class="fas fa-tags"></i> Học phí TB: </h3>
                                <div class="chitiet">
                                    <a href="{{URL::to('/')}}/truong/DDT/chitiet" title="Xem chi tiết"><i class="fas fa-plus-circle"></i> </a>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div> -->
<div class="container-fluid">
  <div class="ketqua">
    <div></div>
  </div>
</div>
@endsection
