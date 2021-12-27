<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CỔNG TƯ VẤN TUYỂN SINH ĐẠI HỌC</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <!-- logo title web -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{URL::to('/')}}/public/frontend/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL::to('/')}}/public/frontend/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('/')}}/public/frontend/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{URL::to('/')}}/public/frontend/favicon/site.webmanifest">
    <!-- logo title web -->
</head><!--/head-->

<body>
    @include('layout.header')        
    <section style=" margin-bottom: 20px">
        <div class="container">
            <div class="row" style="margin-left: 30px;">
                <div class="col-sm-8 padding-right">
                    @yield('content')               
                </div>
                <div class="col-sm-4"> <!-- sidebar tin tức -->
                    @include('layout.sidebar_right')
                    
                </div>
            </div>
        </div>
    </section>
    @include('layout.footer')
  
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
</body>
</html>