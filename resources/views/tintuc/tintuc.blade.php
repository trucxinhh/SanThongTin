@extends('index')

@section('title')
Tin tức tuyển sinh
@endsection

@section('style')
<style>
	.col-227{
		box-shadow: 2px -2px 3px -1px #f2f2f3;
   		border: 1px solid #eeeeef;
		margin-left: 10px;
		background-color: #fff;
		box-shadow: 0 2px 2px rgb(55 84 224 / 40%);
	}
	.phantrang{
		text-align: right ;
		margin: 10px;
		font-size: 20px;
	}
	.sidebar-title{
		margin: 5px;
		background-color: #9e0808;
		color: #fff;
		text-align: center;
		padding: 1px;
		margin: 5px;
	}
	.sidebar-tgpost{
		font-size: 10px;
	}
	.title{
		text-align: center;
		margin: 10px;
		padding: 10px;
		color: ;
	}
	.sidebar-menu{
		padding-left: 10px;
	    height: 34px;
	    line-height: 34px;
	}
</style>
@endsection
@section('content')
<div class="container">
	<div class="title"><h1>TIN TUYỂN SINH ĐẠI HỌC - CAO ĐẲNG</h1></div>
	<div class="row">
		<div class="col-sm-9 padding-right">
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
                            <nav class="pagination">
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
		<div class="col-sm-3">
			<div class="col-227">
	        	<div class="sidebar-title">
	        		<h4><b>TRA CỨU</b></h4>
	        	</div>
	        	<div class="">
	        		<ul >
						<li class="sidebar-menu"><a href="{{URL::to('/')}}/truong/tracuu">Tra cứu trường tuyển sinh</a></li>
						<li class="sidebar-menu"><a href="{{URL::to('/')}}/diemchuan/tracuunew">Tra cứu điểm chuẩn</a></li>
						<li class="sidebar-menu"><a href="{{URL::to('/')}}/diemchuan/tracuunew">Tra cứu chỉ tiêu</a></li>
						<li class="sidebar-menu"><a href="{{URL::to('/')}}/diemchuan/tracuunew">Tra cứu học phí</a></li>
					</ul>
	        	</div>
			</div>
			<div  class="col-227">
	        	<div class="sidebar-title">
	        		<h4><b>TIN NỔI BẬT</b></h4>
	        	</div>
	        	@foreach ($tinnoibat as $tin)
	        	<div class="row">
	        		<div class="col-sm-3">
	        			<img src="{{URL::to('/')}}/public/Upload/imgtintuc/{{$tin->Thumnail}}" alt="" width="100%" style="margin-left: 20px;padding-right: 7px;">
	        		</div>
	        		<div class="col-sm-9">
	        			<p><a href="{{URL::to('/')}}/tintuc/chitiet/{{$tin->Id}}">{{$tin->TieuDe}}</a></p>
	        			<!-- <p class ='sidebar-tgpost'>{{$tin->created_at}}</p> -->
	        		</div>
	        	</div>
	        	@endforeach
			</div>
			<div  class="col-227">
	        	<div class="sidebar-title">
	        		<h4><b>TIN LIÊN QUAN</b></h4>
	        	</div>
	        	@foreach ($tinnoibat as $tin)
	        	<div class="row">
	        		<div class="col-sm-3">
	        			<img src="{{URL::to('/')}}/public/Upload/imgtintuc/{{$tin->Thumnail}}" alt="" width="100%" style="margin-left: 20px;padding-right: 7px;">
	        		</div>
	        		<div class="col-sm-9">
	        			<p><a href="{{URL::to('/')}}/tintuc/chitiet/{{$tin->Id}}">{{$tin->TieuDe}}</a></p>
	        		</div>
	        	</div>
	        	@endforeach
			</div>
			
		</div>
	</div>
</div> 
@endsection
