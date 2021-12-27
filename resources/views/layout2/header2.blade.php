<style>
    .head-logo{
        width: 40px;
        cursor: pointer;
        border-radius: 50%;
        margin-top: 6px;
        
    }
    .header_top.truong{
        overflow: hidden;
        position: fixed; 
        width: 100%;
        z-index: 1;     
    }
    .taikhoan{
        display: none;
        position: fixed;
    }
    .taikhoan .arrow-up{
        width: 0;
        height: 0;
        position: absolute;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        border-bottom: 15px solid #eaeaea;
        left: 5px;
        /* top: 50px; */
    }
    #headlogo:hover>.taikhoan{
        display: block;
    }
    .MyAcc{
        background-color: #eaeaea;
        width: 150px;
        padding: 5px 0 0.1px 0;
        z-index: 15;
        border-radius: 0 5px 5px 5px;
        margin-top: 12px;

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
        color: #fff;
        font-weight: 500;
        text-transform: uppercase; 
    }
    #parallelogram {
      width: 1200px;
      /* margin-top: -10px; */
      height: 62px;
      background:#1b387c;
      -webkit-transform: skew(-40deg);
      -moz-transform: skew(-40deg);
      -o-transform: skew(-40deg);
      transform: skew(-40deg);
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
                                <span style="margin-left: -8rem;color: #800000;font-size: 20px;">Đại học Kinh Tế - ĐHĐN </span>
                            </a>
                        </center>
                    </div>
                    <div class="col-sm-1 " >
                        <div id="parallelogram"></div>
                    </div>
                    <div class="col-sm-5 " >
                        <ul class="menu truong">
                            <li class="active-menu1"> <a href="{{URL::to('/')}}/dangkytruong"> Thông tin trường</a></li>
                            <li class="active-menu2"> <a href="{{URL::to('/')}}/dangkynganh"> Thông tin ngành</a></li>
                            <li> <a href=""> Thống kê</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-1 " style="margin-left: -55px;" >
                        <div id="headlogo">
                        <img class="head-logo" src="{{URL::to('/')}}/public/frontend/images/avt3.png" alt="">
                        <div class="taikhoan">
                            <div class="arrow-up"></div>
                            <div class="MyAcc">
                                <ul>
                                    <!-- <li><a href=""> Hồ Sơ</a></li> -->
                                    <li><a href="{{route('dangxuat')}}"> Đăng xuất</a></li>
                                </ul>                              
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-1 " style="margin-left: -75px;">
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