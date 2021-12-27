@extends('index')

@section('title')
Các ngành học
@endsection

@section('style')
<style>
    h2{
        text-align: center;
    }
    .khung{
        width: 250px;
        height: 200px;
        overflow-y: scroll;
        overflow-x: hidden;
        border: 2px solid black;
        margin: 0 20px;

    }
    .khoinganh{
        background-color: #1b387c;
        color: #fff;
        border-radius: 5px 5px 0 0;
        margin-bottom: 0;
        display: inline-block;
        padding: 5px 10px;
        text-align: center;
        width: 250px;
        margin: 0 20px;
    }
    .khoinganh h4{
        height: 25px;
    }
    .nganhhot{
        background-color: #006666;
        color: #fff;
        border-radius: 7px 7px;
        margin: 20px;
        width: 250px;
        text-align: center;
        height: 50px;  
        padding: 10px;
        font-size: 20px;
    }
    ul{
        padding-left: 10px;
    }
    .arrow-pointer{
        right: 45px;
    }
    .nganhhi{
        margin-top: 20px;
    } 
</style>
@endsection

@section('content')
<section style=" margin-bottom: 20px">
    <div class="container">
        <div>
            <div class="row">
                <div class="col-sm-3" > <!-- sidebar trang chủ -->
                    @include('layout.sidebar_left')
                </div>
                <div class="col-sm-9" style="padding-left:20px;">
                    <div>
                        <h2>TOP NHƯNG NGÀNH HOT HIỆN NAY</h1>
                        <div class="row">
                            <div class="col-sm-4 nganhhot">
                                <p><a href="{{URL::to('/')}}/nganh/59" style="color: #fff">Công nghệ thông tin</a></p>
                            </div>
                            <div class="col-sm-4 nganhhot">
                                <p><a href="{{URL::to('/')}}/nganh/59" style="color: #fff">Khoa học dữ liệu </a></p>
                            </div>
                            <div class="col-sm-4 nganhhot">
                                <p><a href="{{URL::to('/')}}/nganh/59" style="color: #fff">Y - Dược</a></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 nganhhot">
                                <p><a href="{{URL::to('/')}}/nganh/59" style="color: #fff">Phiên dịch viên</a></p>
                            </div>
                            <div class="col-sm-4 nganhhot">
                                <p><a href="{{URL::to('/')}}/nganh/59" style="color: #fff">Kỹ sư ô tô</a></p>
                            </div>
                            <div class="col-sm-4 nganhhot">
                                <p><a href="{{URL::to('/')}}/nganh/59" style="color: #fff">Marketing</a></p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h2>CÁC KHỐI NGÀNH</h2>
                        
                        <div class="row">
                            <div class="col-sm-4 nganhhi">
                                <div class="khoinganh">
                                    <h4>Báo chí - Truyền thông - Truyền hình</h4>
                                </div>
                                <div class="khung">
                                    <ul>
                                        @foreach ($Baochi as $row)
                                            <li><a href="{{URL::to('/')}}/nganh/{{$row->ID}}"><a href="{{URL::to('/')}}/nganh/{{$row->ID}}">{{$row->TenChung}}</a></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 nganhhi">
                                <div class="khoinganh">
                                    <h4>Công an - Quân đội</h4>
                                </div>
                                <div class="khung">
                                    <ul>
                                        @foreach ($Congan as $row)
                                            <li><a href="{{URL::to('/')}}/nganh/{{$row->ID}}">{{$row->TenChung}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 nganhhi">
                                <div class="khoinganh">
                                    <h4>Du lịch - Vận tải</h4>
                                </div>
                                <div class="khung">
                                    <ul>
                                        @foreach ($Dulich as $row)
                                            <li><a href="{{URL::to('/')}}/nganh/{{$row->ID}}">{{$row->TenChung}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 nganhhi">
                                <div class="khoinganh">
                                    <h4>Kiến trúc - Xây dựng</h4>
                                </div>
                                <div class="khung">
                                    <ul>
                                        @foreach ($Kientruc as $row)
                                            <li><a href="{{URL::to('/')}}/nganh/{{$row->ID}}">{{$row->TenChung}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 nganhhi">
                                <div class="khoinganh">
                                    <h4>Kinh tế - Quản lý</h4>
                                </div>
                                <div class="khung">
                                    <ul>
                                        @foreach ($kinhte as $row)
                                            <li><a href="{{URL::to('/')}}/nganh/{{$row->ID}}">{{$row->TenChung}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 nganhhi">
                                <div class="khoinganh">
                                    <h4>Kỹ thuật - Công nghệ</h4>
                                </div>
                                <div class="khung">
                                    <ul>
                                        @foreach ($kythuat as $row)
                                            <li><a href="{{URL::to('/')}}/nganh/{{$row->ID}}">{{$row->TenChung}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 nganhhi">
                                <div class="khoinganh">
                                    <h4>Luật</h4>
                                </div>
                                <div class="khung">
                                    <ul>
                                        @foreach ($luat as $row)
                                            <li><a href="{{URL::to('/')}}/nganh/{{$row->ID}}">{{$row->TenChung}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 nganhhi">
                                <div class="khoinganh">
                                    <h4>Máy tính - Công nghệ thông tin</h4>
                                </div>
                                <div class="khung">
                                    <ul>
                                        @foreach ($maytinh as $row)
                                            <li><a href="{{URL::to('/')}}/nganh/{{$row->ID}}">{{$row->TenChung}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 nganhhi">
                                <div class="khoinganh">
                                    <h4>Môi trường - Năng lượng</h4>
                                </div>
                                <div class="khung">
                                    <ul>
                                        @foreach ($moitruong as $row)
                                            <li><a href="{{URL::to('/')}}/nganh/{{$row->ID}}">{{$row->TenChung}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 nganhhi">
                                <div class="khoinganh">
                                    <h4>Năng khiếu Âm nhạc - Mỹ thuật</h4>
                                </div>
                                <div class="khung">
                                    <ul>
                                        @foreach ($amnhac as $row)
                                            <li><a href="{{URL::to('/')}}/nganh/{{$row->ID}}">{{$row->TenChung}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 nganhhi">
                                <div class="khoinganh">
                                    <h4>Nông - Lâm - Ngư</h4>
                                </div>
                                <div class="khung">
                                    <ul>
                                        @foreach ($nonglam as $row)
                                            <li><a href="{{URL::to('/')}}/nganh/{{$row->ID}}">{{$row->TenChung}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 nganhhi">
                                <div class="khoinganh">
                                    <h4>Sư phạm - Giáo dục - Ngoại ngữ</h4>
                                </div>
                                <div class="khung">
                                    <ul>
                                        @foreach ($supham as $row)
                                            <li><a href="{{URL::to('/')}}/nganh/{{$row->ID}}">{{$row->TenChung}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 nganhhi">
                                <div class="khoinganh">
                                    <h4>Toán - Tin - Sinh và Ứng dụng</h4>
                                </div>
                                <div class="khung">
                                    <ul>
                                        @foreach ($toantin as $row)
                                            <li><a href="{{URL::to('/')}}/nganh/{{$row->ID}}">{{$row->TenChung}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 nganhhi">
                                <div class="khoinganh">
                                    <h4>Văn hóa - Chính trị - Xã hội</h4>
                                </div>
                                <div class="khung">
                                    <ul>
                                        @foreach ($chinhtri as $row)
                                            <li><a href="{{URL::to('/')}}/nganh/{{$row->ID}}">{{$row->TenChung}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 nganhhi">
                                <div class="khoinganh">
                                    <h4>Y - Dược - Chăm sóc sức khỏe</h4>
                                </div>
                                <div class="khung">
                                    <ul>
                                        @foreach ($yduoc as $row)
                                            <li><a href="{{URL::to('/')}}/nganh/{{$row->ID}}">{{$row->TenChung}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection