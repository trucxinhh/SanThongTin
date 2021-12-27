@extends('index')
@section('title')
	@foreach ($tintucs as $tintuc)
		{{$tintuc->TieuDe}} <!-- Tin tức chi tiết -->
	@endforeach
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
		/* padding: 10px; */
		color: ;
	}
	.sidebar-menu{
		padding-left: 10px;
	    height: 34px;
	    line-height: 34px;
	}
	.sidebar p{
		font-size: 15px;

	}
	.mota{
		font-size: 16px;
	}
	.nd{
		padding: 10px 10px;
		background-color: #fff;

	}
	.container .row{
		margin-left: 0px;
		padding-top: 10px;
	}
</style>
@endsection
@section('content')
<section style=" margin-bottom: 20px">

<div class="container-fluid" style="margin-left: 180px;margin-top: 20px;">
	 <div class="row">
	 	<div class="col-sm-3" style="width: 265px;margin-top: 10px;">
          @include('layout.sidebar_left')
        </div>
		<div class="col-sm-6">
			<ul class="nd" style="margin-top: 10px;">
			@foreach ($tintucs as $tintuc)
				<h3>{{$tintuc->TieuDe}}</h3>
				<img src="{{URL::to('/')}}/public/Upload/imgtintuc/{{$tintuc->Thumnail}}" alt="">
				<p>{{$tintuc->created_at}}</p>
				<p class="mota">{{$tintuc->MoTa}}</p>
				<hr>
				<?php  echo $tintuc->NoiDung; ?>
				<hr>
			@endforeach
		</ul>
		</div>
		<div class="col-sm-3" style="width: 265px;">
			<div class="sidebar" style="margin-top: 10px;">
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
	        		<div class="col-sm-3" >
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
</div>
</section>

@endsection
