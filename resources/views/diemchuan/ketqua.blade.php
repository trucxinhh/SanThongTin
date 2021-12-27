p@extends('index')
@section('content')
    <center><h1>TRA CỨU ĐIỂM CHUẨN</h1></center>
    <br>
	<div class="search">
        <div class="wrapper">
            <div class="search-field">
                <form action="{{route('diemchuan/ketqua')}}" method="post">
                    {{ csrf_field()}}
                    <div class="s">
                        <div class="filter-group">
                            <span id="loc">Mã Trường</span>
                            <input class="form-control" list="matruong" name="matruong">
                            <datalist id="matruong">
                                <option value="BVH">
                                <option value="DDQ">
                                <option value="HHT">
                                <option value="DHF">
                                <option value="DSG">
                                <option value="SPS">
                            </datalist>
                        </div>
                        <div class="filter-group">
                            <span id="loc">Mã Ngành</span>
                            <input class="form-control" list="manganh" name="manganh">
                            <datalist id="manganh">
                                <option value="7340122">
                                <option value=" 7340201">
                                <option value="7310107">
                                <option value="7310205">
                                <option value="7340120">
                                <option value="7380101">
                                <option value="7329001">
                                <option value="7340115">
                                <option value="7140231">
                                <option value="7140234">
                                <option value="7510203">
                            </datalist>
                        </div>
                        <div class="filter-group">
                            <span id="loc">Nam</span>
                            <input class="form-control" list="nam" name="nam">
                            <datalist id="nam">
                                <option value="2020">
                                <option value="2019">
                                <option value="2018">
                                <option value="2017">
                                <option value="2016">
                                <option value="2015">
                            </datalist>
                        </div>
                        <br>
                        <div class="action-group" style=" margin-left: 20px">
                            <button class="temp-submit" type="submit">Tìm kiếm</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        
    </div>
	<br>
	<div class="container" style="font-size: 18px">
		<div>
			<canvas id="bieudo"></canvas>
		</div>
		<br> 
		<br>
		<div style="margin-left: 150px; margin-right: 150px">
			@if ($loi!='')
				<p style='font-size: 17px; text-align: center'>{{$loi}}</p>
			@endif

			@if ($matruong!='' && $manganh!='')
				<p style='font-size: 25px; text-align: center'>Điểm chuẩn trường {{$matruong}} - Ngành {{$manganh}} qua các năm</p>
				<table class="table table-bordered">
		        <thead style="background-color: #FFCC33; color: white">
		          <tr>
		            <th>Năm</th>
		            <th>Khối Thi</th>
		            <th>Điểm Chuẩn</th>
		          </tr>
		        </thead> 
		        <tbody >
		            @foreach ($data as $row)
		              <tr>
		                <td>{{$row->Nam}}</td>
		                <td>{{$row->KhoiThi}}</td>
		                <td>{{$row->DiemChuan}}</td>
		              </tr>
		            @endforeach
		        </tbody>
		      </table>
			@endif
			@if ($matruong!='' && $nam!='')
			<p style='font-size: 17px; text-align: center'>Điểm chuẩn trường {{$matruong}} - Năm {{$nam}}</p>
				<table class="table table-bordered">
		        <thead style="background-color: #FFCC33; color: white">
		          <tr>
		            <th>Mã Ngành</th>
		            <th>Tên Ngành</th>
		            <th>Khối Thi</th>
		            <th>Điểm Chuẩn</th>
		          </tr>
		        </thead> 
		        <tbody>
		            @foreach ($data as $row)
		              <tr>
		                <td>{{$row->MaNg}}</td>
		                <td>{{$row->TenNg}}</td>
		                <td>{{$row->KhoiThi}}</td>
		                <td>{{$row->DiemChuan}}</td>
		              </tr>
		            @endforeach
		        </tbody>
		      </table>
			@endif
			@if ($manganh!='' && $nam!='')
				<p style='font-size: 17px; text-align: center'>Điểm chuẩn Ngành {{$manganh}} - Năm {{$nam}} giữa các trường</p>
				<table class="table table-bordered">
		        <thead style="background-color: #FFCC33; color: white">
		          <tr>
		            <th>Trường</th>
		            <th>Khối Thi</th>
		            <th>Điểm Chuẩn</th>
		          </tr>
		        </thead> 
		        <tbody>
		            @foreach ($data as $row)
		              <tr>
		                <td>{{$row->MaTr}}</td>
		                <td>{{$row->KhoiThi}}</td>
		                <td>{{$row->DiemChuan}}</td>
		              </tr>
		            @endforeach
		        </tbody>
		      </table>
			@endif
		</div>
		
	</div>
	<script>
		var matruong = <?php echo json_encode($matruong) ?>;
		var manganh = <?php echo json_encode($manganh) ?>;
		var nam = <?php echo json_encode($nam)?>;
		if (matruong!=null && manganh!=''){
			var cotx =  <?php echo json_encode($data_Nam) ?>;
			var coty =  <?php echo json_encode($data_DiemChuan) ?>
		}
		if (matruong!=null && nam!=null){
			var cotx =  <?php echo json_encode($data_MaNg) ?>;
			var coty =  <?php echo json_encode($data_DiemChuan) ?>
		}
		if (manganh!=null && nam!=null){
			var cotx =  <?php echo json_encode($data_MaTr) ?>;
			var coty =  <?php echo json_encode($data_DiemChuan) ?>
		}
		/*var abc = ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange']
		var dcd = [12, 19, 3, 5, 2, 3]*/
		var ctx = document.getElementById('bieudo');
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: cotx,
		        datasets: [{
		            label: 'Điểm Chuẩn',
		            data: coty,
		            backgroundColor: [
	                	'#006666'	                
		            ],
		            borderColor: [
		                '#003300'	                
		            ],
			            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            y: {
		                beginAtZero: true
		            }
		        }
		    }
		});
	</script>
@endsection
<script>
        
        var matruong = <?php echo json_encode($matruong) ?>;
        var nam = <?php echo json_encode($nam)?>;
        if (matruong!=null && nam!=null){
            var cotx =  <?php echo json_encode($data_MaNg) ?>;
            var coty =  <?php echo json_encode($data_DiemChuan) ?>
        }
        var d = ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'];
        var dcd = [12, 19, 3, 5, 2, 3];
        var ctx = document.getElementById('bieudohh');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: cotx,
                datasets: [{
                    label: 'Điểm Chuẩn',
                    data: coty,
                    backgroundColor: [
                        '#006666'                   
                    ],
                    borderColor: [
                        '#003300'                   
                    ],
                        borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        function abc(){
            alert(coty);
        }
        function xyz(){
            alert(cotx);
        }
    </script>


    var matruong = <?php if (isset($matruong)){echo json_encode($matruong);} else {echo '';}?>;
        var manganh = <?php if (isset($manganh)){echo json_encode($manganh);} else {echo '';}?>;
        var nam = <?php if (isset($nam)){echo json_encode($nam);} else {echo '';}?>;
        
        if (matruong!='' && manganh!=''){
            var cotx =  <?php if (isset($data_Nam)){echo json_encode($data_Nam);} ?>;
            var coty =  <?php if (isset($data_DiemChuan)){echo json_encode($data_DiemChuan);} ?>;
        }
        if (matruong!='' && nam!=''){
            var cotx =  $data_MaNg;
            var coty =  $data_DiemChuan;
        }
        if (manganh!='' && nam!=''){
            var cotx =  <?php if (isset($data_MaTr)){echo json_encode($data_MaTr);} ?>;
            var coty =  <?php if (isset($data_DiemChuan)){echo json_encode($data_DiemChuan);} ?>;
        }


        /*var matruong = <?php echo json_encode($matruong) ?>;
        var nam = <?php echo json_encode($nam)?>;
        if (matruong!=null && nam!=null){
            var cotx =  <?php echo json_encode($data_MaNg) ?>;
            var coty =  <?php echo json_encode($data_DiemChuan) ?>
        }*/




        if (matruong!='' && manganh!=''){
            var cotx =  <?php echo json_encode($data_Nam) ?>;
            var coty =  <?php echo json_encode($data_DiemChuan); ?>
        }
        if (matruong!='' && nam!=''){
            var cotx =  <?php echo json_encode($data_MaNg) ?>;
            var coty =  <?php echo json_encode($data_DiemChuan); ?>
        }
        if (manganh!='' && nam!=''){
            var cotx =  <?php echo json_encode($data_MaTr) ?>;
            var coty =  <?php echo json_encode($data_DiemChuan); ?>
        }
        var d = ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'];
        var dcd = [12, 19, 3, 5, 2, 3];
        var ctx = document.getElementById('bieudohh');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: cotx,
                datasets: [{
                    label: 'Điểm Chuẩn',
                    data: coty,
                    backgroundColor: [
                        '#006666'                   
                    ],
                    borderColor: [
                        '#003300'                   
                    ],
                        borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });