@extends('index')
@section('title')
    Đăng ký tài khoản
@endsection
@section('style')
<style>
    #trangdk{
      background-color: #f9f9f9;
    }
    #trangdk .col-sm-3.left{
      width: 25%;
      padding: 20px 30px;
      margin:20px -20px 0 20px;
      background-color: #f5f5f5;
      border-radius: 10px;
    }
    #trangdk .col-sm-3.left h3{
      padding-bottom: 20px;
      margin: 0;
      text-align: center
    }
     #trangdk .col-sm-3.left ul{
      padding-left: 5px;
      color: #555555
     }
    #trangdk .col-sm-3.left ul li{
     border-bottom: 2px solid #AAAAAA;
     font-size: 18px;
     padding: 10px 0;
    }
    #trangdk .col-sm-3.left ul li a{
      padding-left: 15px;
      color: #555555
    }
    #trangdk .col-sm-3.left ul li:hover{
      background-color: #dfdff9;
      cursor: pointer;
    }
    #trangdk .col-sm-3.right{
      width: 30%;
      margin: 20px 0;
      /* margin-left: 10px */
    }
    #trangdk .col-sm-3.right img{
      width: 80%;
    }
</style>
@endsection
@section('script')

<script type="text/javascript">
      $(document).ready(function(){
          var form2 = $('.login-form');
          var status = false;
          $("#dangnhap").click(function(event){
              event.preventDefault();
              if(status == false){
                  form2.fadeIn();
                  status = true;
              }
              else{
                  form2.hide();
                  status = false;
              }
          })
      });
</script>
<script>
    $(document).ready(function(){
        $('#nutmatruong').click(function(){
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password1').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{route('postdangky')}}",
                method: "POST",
                data: {
                    name:name,
                    email:email,
                    password:password,
                     _token:_token
                },
                success:function(result){
                    alert(result);
                },
                error:function(){
                    alert('Gửi dữ liệu không thành công');
                }
            })
        });
      });
</script>
@endsection
@section('content')
   <section id="trangdk"><!--form-->
      <div class="container">
          <div class="row">
              <div class="col-sm-3 left">
                  <h3>Truy cập nhanh</h3>
                  <ul>
                      <li> <a href="{{URL::to('/')}}">Về trang chủ</a></li>
                      <li><a href="{{URL::to('/')}}/tintuc"> Tin tức tuyển sinh</a></li>
                      <li> <a href="{{URL::to('/')}}/diemchuan/tracuu">Tra cứu điểm chuẩn</a></li>
                      <li> <a href="{{URL::to('/')}}/truong/tracuu">Tra cứu trường</a></li>
                      <li> <a href="{{URL::to('/')}}/truong/tuvan">Tư vấn chọn trường</a></li>
                      <li> <a href="{{URL::to('/')}}/nganhnghe">Ngành nghề</a></li>
                      <li> <a href="{{URL::to('/')}}/tohopmon">Tổ hợp khối thi</a></li>
                      <li> <a href="{{URL::to('/')}}/phuongthuc">Phương thức tuyển sinh</a></li>          
                  </ul>
              </div>
              <div class="col-sm-4" style="width: 40%;margin-left: 5%;">
                  <div class="signup-form"><!--sign up form-->
                      <h2>Đăng ký tài khoản</h2>
                      <form method="post" action="{{route('postdangky')}}">
                          <label for="">Username</label>
                          <input type="text" id='name' name ="name" placeholder="Tên đăng nhập" >
                          <label for="">Email</label> 
                          <input type="email" id='emaill' name="email"  placeholder="Email">
                          <label for="">Password</label>
                          <input type="password" id='password11' name="password" placeholder="Mật khẩu"/>
                          <label for="">Re-Password</label>
                          <input type="password" id='password22' name="pw2" placeholder="Nhập lại mật khẩu"/>
                          <button type="submit" class="btn btn-default">Đăng ký</button>
                        {{ csrf_field()}}
                      </form>
                      <h5> Bạn đã có tài khoản? <a href="{{URL::to('/')}}/dangnhap" id="dangnhap">Đăng nhập tại đây</a></h5>
                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                      @if(session('thongbao'))
                          <div class="alert alert-success">
                            {{session('thongbao')}}
                          </div>
                      @endif
                  </div><!--/sign up form-->
              </div>
              <div class="col-sm-3 right">
                @include('layout.sidebar_right')
              </div>
          </div>
      </div>
  </section><!--/form-->  
@endsection