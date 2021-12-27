@extends('index2')
@section('title')
    Cập nhật thông tin trường
@endsection
@section('style')
<style>
    #formdktruong{
      background-color: #f9f9f9;
      overflow: hidden;
      position: relative;
      margin-top: 70px;
    }
    #formdktruong .col-sm-3.left{
      width: 21%;
      padding: 20px 30px;
      margin: 20px -20px 30px 90px;
      background-color: #f5f5f5;
      border-radius: 10px;
    }
    #formdktruong .col-sm-3.left h3{
      padding-bottom: 20px;
      margin: 0;
      text-align: center
    }
     #formdktruong .col-sm-3.left ul{
      padding-left: 5px;
      color: #555555
     }
    #formdktruong .col-sm-3.left ul li{
     border-bottom: 2px solid #AAAAAA;
     font-size: 18px;
     padding: 10px 0;
    }
    #formdktruong .col-sm-3.left ul li a{
      padding-left: 15px;
      color: #555555
    }
    #formdktruong .col-sm-3.left ul li:hover{
      background-color: #dfdff9;
      cursor: pointer;
    }
    #formdktruong .col-sm-3.right{
      width: 30%;
      margin: 20px 0;
      /* margin-left: 10px */
    }
    #formdktruong .col-sm-3.right img{
      width: 80%;
    }
    .avatar.dki{
      width: 170px;
      cursor: pointer;
    }
    .uplogo{
      display: none;
      justify-content: center; 
      flex-direction: column; 
      align-items: center;
    }
    .uplogo.active{
      display: flex;
    }
    #formdktruong .col-sm-6{
    width: 47%;
    height: 235px;
    margin: 10px 5px;
    display: flex;
    flex-direction: column;
    border: 1px solid #ccc;
    padding: 20px 10px;
    border-radius: 5px;
    margin-top: 20px;
    }
    #formdktruong .col-sm-12.ten{
      width: 95%; 
      margin:5px; 
      display: flex;
      flex-direction: column;
      border: 1px solid #ccc;
      padding: 10px;
      border-radius: 5px;
      margin-top: 20px;

    }
    #formdktruong .col-sm-12.gioithieu{
      width: 95%; 
      margin:5px; 
      border: 1px solid #ccc;
      padding: 10px;
      margin-top: 20px;
      border-radius: 5px;
    }
    #formdktruong .col-sm-4{
      display: flex;
      flex-direction: column;
      padding-left:20px;
    }
    button.truongcoban{
      margin-left: 30%; 
      margin-top: 10px;
      margin-bottom: 20px;"
    }
    #formdktruong h4{
      margin-top: -32px;
      background-color: #f9f9f9;
      padding: 5px 15px;
      width: fit-content;
      text-align: center;
      color: #1b387c;
      font-weight: bold;
      font-size: 20px;

    }
    #formdktruong select{
      background: #Fff;
      border: solid 2px;
      border-color: #7b7070;
      color: #696763;
      padding: 5px;
      width: 100%;
      border-radius: 2px;
      resize: none;
      height: 32px;
      font-size: 15px;
    }
    li.active-menu1{
       background-color: #ebeff2;
    }
    ul.menu.truong li.active-menu1 a{
      color: #CC0000;
    }
    /* #themttkhac{
      display: none;
    }
    #themttkhac.active{
      display: block;
    }
    .themtt.active{
      display: none;
    } */
</style>
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
  const fileUploader = document.getElementById('file-uploader');
  fileUploader.addEventListener('change', (event) => {
    const files = event.target.files;
    console.log('files', files);
  });
</script>
<script>
  $(document).ready(function(){
            $('.avatar.dki').click(function() {
              $('.uplogo').toggle('active');
            });
        });
  // $(document).ready(function(){
  //           $('.themtt').click(function() {
  //             $(this).toggle('active');
  //             $('#themttkhac').toggle('active');
  //           });
  //       });
  // $(document).ready(function(){
  //           $('.boqua').click(function() {
  //             $('#themttkhac').removeClass('active');
  //           });
  //       });
</script>
@endsection
@section('content')
  <section id="formdktruong"><!--form-->
      <div class="container-fluid">
        <div class="row">
          <form action="">
            <div class="col-sm-3 left">
              <center>
                <img class="avatar dki" src="{{URL::to('/')}}/public/frontend/images/avt3.png" alt="" title="Thay logo">
                <!-- <h5 id="bamlogo">Chọn logo</h5> -->
                <div class="uplogo" >
                  <input type="file" id="file-uploader" accept=".jpg, .png" multiple>
                </div>
              </center>
              <div style="display: flex;justify-content: center; flex-direction: column;">
                <label for="">Mã trường</label>              
                <input type="text" name ="MaTrg" placeholder="VD: DDQ" >
                <label for="">Năm thành lập</label>              
                <input type="text" name ="NamTL" placeholder="VD: 1975" >
                <label for="">Loại trường</label>
                <select name="" id="">
                  <option value="Công lập">Công lập</option>
                  <option value="Dân lập">Dân lập</option>
                </select>
                <label for="">Hệ đào tạo</label>
                <select name="" id="">
                  <option value="Đại học">Đại học</option>
                  <option value="Cao đẳng">Cao đẳng</option>
                </select>               
                <label for="">Khu vực</label>
                <select name="" id="">
                  <option value="Miền Bắc">Miền Bắc</option>
                  <option value="Miền Nam">Miền Nam</option>
                  <option value="Miền Trung">Miền Trung</option>
                  <option value="Tây Nguyên">Tây Nguyên</option>
                </select>
              </div>
            </div>
            <div class="col-sm-9" style="width: 69%;margin-left: 4%;">
              <div class="col-sm-12 ten" > 
                <h4>Tên trường</h4>
                <input type="text" name ="TenTrg" placeholder="VD: Đại học Kinh tế - DHDN" >
              </div>
              <div class="col-sm-6" >
                <h4>Địa chỉ</h4>
                <label for="">Tỉnh</label>
                <select name="Tinh" id="">
                  <option value="">Đà Nẵng</option>
                </select>
                <label for="QuanHuyen">Quận/Huyện</label>
                <input type="text"  name ="name" placeholder="VD: Ngũ Hành Sơn" >
                <label for="">Đường, Phường</label>                                 
                <input type="text"  name ="DuongPhuong" placeholder="VD: 71 Ngũ Hành Sơn, Mỹ An" >
                </div>
              <div class="col-sm-6"> 
                <h4>Thông tin liên lạc</h4>
                <label for="">Webside</label>
                <input type="text"  name ="Webside" placeholder="due.udn.vn" >
                <label for="">SĐT</label>
                <input type="text"  name ="SDT" placeholder="0123456789" >
                <label for="">Email</label>
                <input type="text"  name ="Email" placeholder="due.udn@edu.com" >
              </div>
              <div class="col-sm-12 ten"> 
                <h4>Giới thiệu trường</h4>
                <textarea name="GioiThieu"></textarea>
                <script>
                        CKEDITOR.replace( 'GioiThieu' );
                </script>
              </div>
              <!-- <div class="themtt" >Thông tin khác</div> -->
              <div class="col-sm-12 gioithieu" id="themttkhac" >
                <h4 title="Bỏ qua" class="boqua">Thông tin chi tiết khác</h4>
                <div class="col-sm-4" >
                  <label for="">Chỉ tiêu/năm</label>
                  <input type="text"  name ="name" placeholder="3100" >
                  <label for="">Số ngành đào tạo</label>
                  <input type="text"  name ="name" placeholder="15" >                  
                </div>
                <div class="col-sm-4" >               
                  <label for="">Số cán bộ, giảng viên</label>
                  <input type="text"  name ="name" placeholder="" >
                  <label for="">Số lượng công trình nghiên cứu</label>
                  <input type="text"  name ="name" placeholder="" >
                </div>
                <div class="col-sm-4" >
                  <label for="">Học phí TB/Năm (triệu)</label>
                  <input type="text"  name ="name" placeholder="17,5" >
                  <label for="">Diện tích khuôn viên</label>
                  <input type="text"  name ="name" placeholder="" >
                </div>
              </div>
            </div>
            <button class="truongcoban" type="submit" > Cập nhật </button>
          </form>
        </div>
      </div>
  </section><!--/form-->

@endsection