@extends('index')
@section('title')
    {{$dt->TenChung}}
@endsection
@section('style')
<style>
	.tieude{
		color: ;
	}
	/* .mucchinh{
		background-color: #088A85;
		color: white;
		font-weight: bolder;
    	font-size: 18px;
    	margin: 10px;
    	padding: 1px;
	} */
	h3{
		background-color: #088A85;
		color: white;
	}
</style>
@endsection
@section('content')
<div class="container">
	<h1 class="tieude">Ngành {{$dt->TenChung}}</h1>
	
    <div><?php echo  $dt->ThongTin?></div>
	<div class="mucchinh">
		<h3>Các trường đào tạo ngành {{$dt->TenChung}}</h3>
	</div>
	
    <table class="table table-bordered">
        <thead>
          	<tr>
          		<th>STT</th>
	            <th>Mã Trường</th>
	            <th>Tên Trường</th>
	            <th>Tỉnh</th>
          	</tr>
        </thead> 
        <tbody>
        	<?php $j=1; ?>
        	@foreach ($data2 as $data2)
    			<tr>
    				<td>{{$j}}</td>
	                <td><a href="{{URL::to('/')}}/truong/{{$data2->MaTr}}/chitiet">{{$data2->MaTr}}</a></td>
	                <td><a href="{{URL::to('/')}}/truong/{{$data2->MaTr}}/chitiet">{{$data2->TenTr}}</a></td>
	                <td>{{$data2->Tinh}}</td>
	            </tr>
	            <?php $j++; ?>
    		@endforeach
        </tbody>
    </table>
</div> 
@endsection
