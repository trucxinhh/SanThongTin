@extends('index')
@section('title')
   Đăng nhập tài khoản
@endsection
@section('style')

@endsection
@section('script')

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
            <h2>Đăng nhập tài khoản</h2>
            <form  action="">
              <label for="">Username</label>
              <input type="text" placeholder="Tên đăng nhập" required>
              <label for="">Password</label>
              <input type="password" name="pw1" placeholder="Mật khẩu"required/>
              <div><a href=""> Quên mật khẩu?</a></div>
              <button type="submit" class="btn btn-default">Đăng nhập</button>
            </form>
            <h5> Bạn đã chưa có tài khoản? <a href="{{URL::to('/')}}/dangky" >Đăng ký tại đây</a></h5>
          </div><!--/sign up form-->
        </div>
        <div class="col-sm-3 right">
          @include('layout.sidebar_right')
        </div>
      </div>
    </div>
  </section><!--/form-->
  
  
@endsection