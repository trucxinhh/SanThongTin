<style>
    .login-form .arrow-up{
        width: 0;
        height: 0;
        position: absolute;
        border-left: 20px solid transparent;
        border-right: 20px solid transparent;
        border-bottom: 20px solid #eceaea;
        right: 134px;
        top: -11px;
    }
    
    .taikhoan .arrow-up{
        width: 0;
        height: 0;
        position: absolute;
        border-left: 20px solid transparent;
        border-right: 20px solid transparent;
        border-bottom: 20px solid #F5F5F5;
        right: 42px;
        top: -10px;
    }
    
    .col-sm-4.log .login-form{
        position: absolute;
        width: 300px;
        height: auto;
        z-index: 15;
        background-color: #eceaea;
        right: 30px;
        top: 43px;
        box-shadow: 3px 3px 3px rgb(248 248 255 / 50%);
        border-radius: 0 0 10px 10px;
        display: none;
    }
    #usename .taikhoan{
        position: absolute;
        width: 160px;
        height: auto;
        z-index: 15;
        background-color: #F5F5F5;
        right: 10px;
        top: 43px;
        box-shadow: 3px 3px 3px rgb(248 248 255 / 50%);
        border-radius: 0 0 10px 10px;
        display: none;
    }
    #usename:hover>.taikhoan{
        display: block;
    }
    form div, .MyAcc ul{
        padding: 5px 10px;
    }
    .MyAcc ul li{
        padding: 5px 5px;
    }
    .login-form form input[type="submit"]{
        width: 60%;
        background-color: #1b387c;
        color: #fff;
        border-radius: 3px;
        margin-left: 50px;
    }
    .register-form form input[type="submit"]{
        width: 60%;
        background-color: #1b387c;
        color: #fff;
        border-radius: 3px;
        margin-left: 50px;
    }
    
</style>
<script type="text/javascript">
    $(document).ready(function(){
        var form1 = $('.login-form');
        var status = false;
        $("#login").click(function(event){
            event.preventDefault();
            if(status == false){
                form1.fadeIn();
                status = true;
            }
            else{
                form1.fadeOut();
                status = false;
            }
        })
    });
    
</script>
 <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row" style="display: flex;">
                    <div class="col-sm-8" >
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="{{URL::to('/')}}/truongdangnhap" title="Dành cho các cơ sở giáo dục"> Tham gia vào hệ thống</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i> +123456789</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> khoaluanxidu@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 log" >
                        <div class="dangkynhap">
                            <ul class="nav navbar-nav" style="float: right">
                                @if (!Auth::check())
                                    <li class="log" id=login><a> <i class="fas fa-sign-out-alt" ></i> Đăng nhập</a></li>
                                    <li class="log" id=register><a href="{{URL::to('/')}}/dangky"> <i class="fas fa-unlock-alt"></i> Đăng ký</a></li>
                                @else
                                    <li class="log" id=usename><a><i class="fas fa-user"></i> {{Auth::user()->name}}</a>
                                        <div class="taikhoan">
                                            <div class="arrow-up"></div>
                                            <div class=MyAcc>
                                                <ul>
                                                    <li><a href=""> Tài Khoản của tôi</a></li>
                                                    <li><a href="{{route('dangxuat')}}"> Đăng xuất</a></li>
                                                </ul>                              
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="login-form">
                            <div class="arrow-up"></div>
                            <form method="post" action="{{route('postdangnhap')}}">
                                <div>
                                    <label for="">Username</label>
                                    <input type="text" name="name" placeholder="Tên đăng nhập">
                                </div>
                                <div>
                                    <label for="">Password</label>
                                    <input type="password" name="password" placeholder="Mật khẩu">
                                </div>
                                <div><a href=""> Quên mật khẩu?</a></div>
                                <div>
                                    <input type="submit" value="Đăng nhập" >
                                </div>
                                {{ csrf_field()}}
                            </form>
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
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{URL::to('/')}}"><img style="width: 100px;margin-left: 20px;margin-top:-10px" src="{{URL::to('/')}}/public/frontend/images/logo3.png" alt="" /></a>
                        </div>
                        <center style="font-size: 2.0rem; font-weight: 800; padding-top: 1rem;">
                            <a href="{{URL::to('/')}}" style="margin-left: -8rem;color: #1b387c">
                                <span>THÔNG TIN TUYỂN SINH</span>
                                <br> 
                                <span style="margin-left: -10rem;color: #1b387c">TRỰC TUYẾN </span>
                            </a>
                        </center>
                    </div>
                    <div class="col-sm-1">
                        <div id="parallelogram"></div>
                    </div>
                    <div class="col-sm-7"
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                                <li><a href="{{URL::to('/tintuc')}}">Tin tức</a></li>
                                <li><a href="">Thông tin <i class="fas fa-sort-down"></i> </a>
                                    <ul>
                                        <li><a href="{{URL::to('/tohopmon')}}">Tổ hợp môn</a></li>
                                        <li><a href="{{URL::to('/nganhnghe')}}">Ngành nghề</a></li>
                                        <!-- <li><a href="{{URL::to('/phuongthuc')}}">Phương thức TS</a></li> -->
                                    </ul>
                                </li>
                                <li><a href="">Tra cứu<i class="fas fa-sort-down"></i></a>
                                    <ul>
                                        <li><a href="{{URL::to('/')}}/truong/tracuu">Tìm trường</a></li>
                                        <li><a href="{{URL::to('/')}}/diemchuan/tracuu">Điểm chuẩn</a></li>
                                        <li><a href="{{URL::to('/')}}/diemchuan/tracuu">Chỉ tiêu</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Tư vấn<i class="fas fa-sort-down"></i></a>
                                    <ul>
                                        <li><a href="{{URL::to('/')}}/tracnghiem">Chọn ngành</a></li>
                                        <li><a href="{{URL::to('/')}}/tuvan">Chọn trường</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{URL::to('/lienhe')}}">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <hr style="margin-top: 0px;margin-bottom: 0px;padding: 0px; width:1700px;margin-left: -200px; background-color: #1b387c; height: 2px">
                </div>
            </div>
        </div><!--/header-middle-->
 </header><!-- /header -->