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
                                <li><a href="{{URL::to('/')}}/truongdangnhap" title="D??nh cho c??c c?? s??? gi??o d???c"> Tham gia v??o h??? th???ng</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i> +123456789</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> khoaluanxidu@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 log" >
                        <div class="dangkynhap">
                            <ul class="nav navbar-nav" style="float: right">
                                @if (!Auth::check())
                                    <li class="log" id=login><a> <i class="fas fa-sign-out-alt" ></i> ????ng nh???p</a></li>
                                    <li class="log" id=register><a href="{{URL::to('/')}}/dangky"> <i class="fas fa-unlock-alt"></i> ????ng k??</a></li>
                                @else
                                    <li class="log" id=usename><a><i class="fas fa-user"></i> {{Auth::user()->name}}</a>
                                        <div class="taikhoan">
                                            <div class="arrow-up"></div>
                                            <div class=MyAcc>
                                                <ul>
                                                    <li><a href=""> T??i Kho???n c???a t??i</a></li>
                                                    <li><a href="{{route('dangxuat')}}"> ????ng xu???t</a></li>
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
                                    <input type="text" name="name" placeholder="T??n ????ng nh???p">
                                </div>
                                <div>
                                    <label for="">Password</label>
                                    <input type="password" name="password" placeholder="M???t kh???u">
                                </div>
                                <div><a href=""> Qu??n m???t kh???u?</a></div>
                                <div>
                                    <input type="submit" value="????ng nh???p" >
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
                                <span>TH??NG TIN TUY???N SINH</span>
                                <br> 
                                <span style="margin-left: -10rem;color: #1b387c">TR???C TUY???N </span>
                            </a>
                        </center>
                    </div>
                    <div class="col-sm-1">
                        <div id="parallelogram"></div>
                    </div>
                    <div class="col-sm-7"
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="{{URL::to('/')}}">Trang ch???</a></li>
                                <li><a href="{{URL::to('/tintuc')}}">Tin t???c</a></li>
                                <li><a href="">Th??ng tin <i class="fas fa-sort-down"></i> </a>
                                    <ul>
                                        <li><a href="{{URL::to('/tohopmon')}}">T??? h???p m??n</a></li>
                                        <li><a href="{{URL::to('/nganhnghe')}}">Ng??nh ngh???</a></li>
                                        <!-- <li><a href="{{URL::to('/phuongthuc')}}">Ph????ng th???c TS</a></li> -->
                                    </ul>
                                </li>
                                <li><a href="">Tra c???u<i class="fas fa-sort-down"></i></a>
                                    <ul>
                                        <li><a href="{{URL::to('/')}}/truong/tracuu">T??m tr?????ng</a></li>
                                        <li><a href="{{URL::to('/')}}/diemchuan/tracuu">??i???m chu???n</a></li>
                                        <li><a href="{{URL::to('/')}}/diemchuan/tracuu">Ch??? ti??u</a></li>
                                    </ul>
                                </li>
                                <li><a href="">T?? v???n<i class="fas fa-sort-down"></i></a>
                                    <ul>
                                        <li><a href="{{URL::to('/')}}/tracnghiem">Ch???n ng??nh</a></li>
                                        <li><a href="{{URL::to('/')}}/tuvan">Ch???n tr?????ng</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{URL::to('/lienhe')}}">Li??n h???</a></li>
                            </ul>
                        </div>
                    </div>
                    <hr style="margin-top: 0px;margin-bottom: 0px;padding: 0px; width:1700px;margin-left: -200px; background-color: #1b387c; height: 2px">
                </div>
            </div>
        </div><!--/header-middle-->
 </header><!-- /header -->