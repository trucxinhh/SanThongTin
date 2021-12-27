@extends('index3')
@section('title')
    Đăng Nhập
@endsection
@section('style')

<style>
    body{
        background-color: #f6f6f6;
    }
    ul.menu.truong{
        display: flex;
    }
    ul.menu.truong li{
        padding: 10px 15px;
        font-size: 16px;
        margin: 0 5px;
    }
    ul.menu.truong li:hover>a{
        color: #CC0000;
    }
    ul.menu.truong li:hover{
        
        background-color: #ebeff2;
    }
    ul.menu.truong li a{
        color: #1a0686;
        font-weight: 500;
        text-transform: uppercase; 
    }
    .signup-form.truong{
        background-color: #fff;
        background-image: none;
    }
</style>
<header id="header truong"><!--header-->
        <div class="header_top truong"><!--header_top-->
            <div class="container-fluid">
                <div class="row" style="display: flex;padding-top:5px; ">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{URL::to('/')}}"><img style="width: 60px;margin-left: 80px;" src="{{URL::to('/')}}/public/frontend/images/logo3.png" alt="" /></a>
                        </div>
                        <center style="font-size: 1.8rem; font-weight: 800; ">
                            <a href="{{URL::to('/')}}" style="margin-left: -8rem;color: #1b387c">
                                <span>CỔNG THÔNG TIN TUYỂN SINH</span>
                                <br> 
                                <span style="margin-left: -8rem;color: #800000;font-size: 20px;">Dành cho trường</span>
                            </a>
                        </center>
                    </div>
                    <div class="col-sm-5">
                    </div>
                    <div class="col-sm-1">
                        <h4><a href="{{URL::to('/')}}/">Trang chủ </a></h4>
                    </div>
                    <div class="col-sm-2 " style="margin-left: -75px;">
                        <ul class="menu truong">
                            <li><a href=""><i class="fab fa-facebook"></i></a></li>
                            <li><a href=""><i class="fab fa-youtube"></i></a></li>
                            <li><a href=""><i class="fab fa-google-drive"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
</header><!-- /header -->
 <body>
    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="col-sm-7">
                <img src="{{URL::to('/')}}/public/frontend/images/hinh-DN1.png" alt="">
            </div>
            <div class="col-sm-5">
                <div class="signup-form truong"><!--sign up form-->
                    <h2>Đăng nhập tài khoản dành cho cơ sở giáo dục</h2>
                    <form  action="">
                        <label for="">Username</label>
                        <input type="text" placeholder="Tên đăng nhập" required>
                        <label for="">Password</label>
                        <input type="password" name="pw1" placeholder="Mật khẩu"required/>
                        <div><a href=""> Quên mật khẩu?</a></div>
                        <button type="submit" class="btn btn-default">Đăng nhập</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
 </body>