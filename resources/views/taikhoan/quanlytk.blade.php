@extends('index')
@section('title')
   Quản lý tài khoản
@endsection
@section('style')
<style>
	li#canhan1.active, li#canhan2.active, li#canhan3.active{
	  background-color: #dfdff9;
	  cursor: pointer;
	}
	
	.container.quanly #trangdk .col-sm-3.left ul li{
		padding-left: 10px;
	}
	.container.quanly #trangdk .col-sm-3.left ul li a{
		padding-left: 0px;
	}
</style>
@endsection

@section('content')

	<div class="container quanly">
		<div class="row" id="trangdk">
			<div class="col-sm-3 left" style="margin-top: 0; padding-bottom: 30px">
	          	<h3>Quản lý tài khoản</h3>
	          	<ul>
					<li id="canhan1" class="active">Thông tin cá nhân</li>
					<li id="canhan2">Đổi mật khẩu</li>
					<li id="canhan3">Chính sách bảo mật</li>
					<li>Đăng xuất</li>
					<li><a href="{{URL::to('/')}}">Về trang chủ</a></li>          
	          	</ul>
	        </div>
			<div class="col-sm-6">
				<div class="thongtincanhan">
					<div class="nen-avt"></div>
					<div class="Welcome"> 
						<div>Welcome <span>Tên tài khoản</span>!!!</div>
						<div class="not">Bạn không phải là <span>Tên tài khoản</span>?<a href=""> Đăng xuất</a></div>
					</div>
					<center><img class="avatar" src="{{URL::to('/')}}/public/frontend/images/avt3.png" alt=""></center>
					<!-- <div class="canhan">
						<div>Tên tài khoản</div>
						<div>Tên đăng nhập</div>
					</div> -->
					<br>
					<br>
				</div>
				<div class="doimatkhau"style="margin-left: 20px;display: none; margin-top:0">
					<h2>Đổi mật khẩu</h2>
					<form onSubmit="return checkPw(this)"action="">
						<label for="">Old password</label>
						<input type="password" placeholder="Mật khẩu cũ"required/>
						<label for="">New password</label>
                        <input type="password" name="pw1" placeholder="Mật khẩu mới"required/>
                        <label for="">New password</label>
                        <input type="password" name="pw2" placeholder="Nhập lại mật khẩu"required/>
                        <button type="submit" class="btn btn-default">Xác nhận</button>
					</form>
				</div>
				<div class="chinhsach" style="margin-left: 20px;display: none">
					<ul>
						<li>gfgf</li>
					</ul>
				</div>
			</div>
			<div class="col-sm-3">
				@include('layout.sidebar_right')
			</div>
		</div>
	</div>
@endsection
@section('script') 
<script>
    function checkPw(form) {
      pw1 = form.pw1.value;
      pw2 = form.pw2.value;
      if (pw1 != pw2) {
      alert ("\nBạn không nhập lại đúng mật khẩu, hãy kiểm tra và nhập lại cho khớp.")
      return false;
      }
      else {
        alert ("\nBạn đã đổi mật khẩu thành công!!!")
        return true;
      }
    };
</script>


<script type="text/javascript">
    $(document).ready(function(){
	    var thongtincanhan = $('.thongtincanhan');
	    var doimatkhau = $('.doimatkhau');
	    var chinhsach = $('.chinhsach')
	    var status = false;
	    $("#canhan1").click(function(event){
	        event.preventDefault();
	        if(status == false){
	        	thongtincanhan.fadeIn();
	            doimatkhau.hide();
	            chinhsach.hide();	            
	            status = true;
	            $(this).addClass('active');
	            $("#canhan2").removeClass('active');
	            $("#canhan3").removeClass('active');
	        }
	        else{
	        	thongtincanhan.fadeIn();
	            doimatkhau.hide();
	            chinhsach.hide();	            
	            status = false;
	            $(this).addClass('active');
	            $("#canhan2").removeClass('active');
	            $("#canhan3").removeClass('active');
	        }
	    });
	    $("#canhan2").click(function(event){
	        event.preventDefault();
	        if(status == false){
	            doimatkhau.fadeIn();
	            thongtincanhan.hide();
	            chinhsach.hide();
	            status = true;
	            $(this).addClass('active');
	            $("#canhan1").removeClass('active');
	            $("#canhan3").removeClass('active');
	        }
	        else{
	        	doimatkhau.fadeIn();
	            thongtincanhan.hide();
	            chinhsach.hide();
	            status = false;
	            $(this).addClass('active');
	            $("#canhan1").removeClass('active');
	            $("#canhan3").removeClass('active');
	        }
	    })
	    $("#canhan3").click(function(event){
	        event.preventDefault();
	        if(status == false){
	        	chinhsach.fadeIn();
	            doimatkhau.hide();
	            thongtincanhan.hide();
	            status = true;
	            $(this).addClass('active');
	            $("#canhan1").removeClass('active');
	            $("#canhan2").removeClass('active');
	        }
	        else{
	        	chinhsach.fadeIn();
	            doimatkhau.hide();
	            thongtincanhan.hide();
	            status = false;
	            $(this).addClass('active');
	            $("#canhan1").removeClass('active');
	            $("#canhan2").removeClass('active');
	        }
	    })
      });
</script>
@endsection
 