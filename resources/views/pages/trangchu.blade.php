@extends('index')

@section('title')
Cổng thông tin tuyển sinh đại học
@endsection

@section('content')
    @include('layout.slide')   
    <section style=" margin-bottom: 20px">
        <div class="container">
            <div class="row" style="margin-left: 30px;">
                <div class="col-sm-3" style="width: 265px;"> <!-- sidebar trang chủ -->
                    @include('layout.sidebar_left')
                </div>
                <div class="col-sm-7 padding-right">
                    <div class="category-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tshirt" data-toggle="tab">Tin tổng hợp</a></li>
                                <li><a href="#blazers" data-toggle="tab">Tin tuyển sinh </a></li>
                                <li><a href="#sunglass" data-toggle="tab">Tin điểm sàn</a></li>                
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!-- Tin tổng hợp -->
                            <div class="tab-pane fade active in" id="tshirt" >
                            @foreach ($tintonghops as $tintonghop)
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img class="anh-tin" src="{{URL::to('/')}}/public/Upload/imgtintuc/{{$tintonghop->Thumnail}}" />
                                    </div>
                                    <div class="col-sm-10">
                                        <h2><a href="{{URL::to('/')}}/tintuc/chitiet/{{$tintonghop->Id}}">{{$tintonghop->TieuDe}}</a></h2>
                                        <h5>{{$tintonghop->created_at}}</h5>
                                        <h4>{{$tintonghop->MoTa}}</h4>
                                    </div>
                                </div>
                            @endforeach
                            <nav aria-label="Page navigation">
                                {!! $tintonghops->links() !!}
                            </nav>    
                            </div>
                            <!-- Tin THPH QG -->
                            <div class="tab-pane fade" id="blazers" >             
                            @foreach ($tintuyensinhs as $tintuyensinh)
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img class="anh-tin" src="{{URL::to('/')}}/public/Upload/imgtintuc/{{$tintuyensinh->Thumnail}}" />
                                    </div>
                                    <div class="col-sm-10">
                                        <h2><a href="{{URL::to('/')}}/tintuc/chitiet/{{$tintonghop->Id}}">{{$tintuyensinh->TieuDe}}</a></h2>
                                        <h5>{{$tintuyensinh->created_at}}</h5>
                                        <h4>{{$tintuyensinh->MoTa}}</h4>
                                    </div>
                                </div>
                            @endforeach   
                            <nav aria-label="Page navigation">
                                {!! $tintuyensinhs->links() !!}
                            </nav> 
                            </div>
                            <!-- Tin điểm sàn -->
                            <div class="tab-pane fade" id="sunglass" >
                            @foreach ($tindiemsans as $tindiemsan)
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img class="anh-tin" src="{{URL::to('/')}}/public/Upload/imgtintuc/{{$tindiemsan->Thumnail}}" />
                                    </div>
                                    <div class="col-sm-10">
                                        <h2><a href="{{URL::to('/')}}/tintuc/chitiet/{{$tintonghop->Id}}">{{$tindiemsan->TieuDe}}</a></h2>
                                        <h5>{{$tindiemsan->created_at}}</h5>
                                        <h4>{{$tindiemsan->MoTa}}</h4>
                                    </div>
                                </div>
                            @endforeach 
                            <nav aria-label="Page navigation">
                                {!! $tindiemsans->links() !!}
                            </nav>
                            </div>         
                        </div>
                    </div><!--/category-tab-->              
                </div>
               
                <div class="col-sm-2"> <!-- sidebar tin tức -->
                    @include('layout.sidebar_right')
                </div>
            </div>
        </div>
    </section>
@endsection