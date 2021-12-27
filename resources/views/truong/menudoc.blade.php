
<script>
	document.addEventListener("DOMContentLoaded", function(){
		// make it as accordion for smaller screens
			var checkboxAll1 = $('#checkbox-all1');
			var kv1Check= $('input[name="kv1[]"]');

			var checkboxAll2 = $('#checkbox-all2');
			var kv2Check= $('input[name="kv2[]"]');

			var checkboxAll3 = $('#checkbox-all3');
			var kv3Check= $('input[name="kv3[]"]');

			var checkboxAll4 = $('#checkbox-all4');
			var kv4Check= $('input[name="kv4[]"]');
		// end if innerWidth

		//checkbox all change 1
			checkboxAll1.change(function(){
				var isCheckedAll=$(this).prop('checked');
				kv1Check.prop('checked', isCheckedAll);
			});

			kv1Check.change(function(){
				var isCheckedAll = kv1Check.length === $('input[name="kv1[]"]:checked').length;
				checkboxAll1.prop('checked',isCheckedAll);
			});
		//checkbox all change 2
			checkboxAll2.change(function(){
				var isCheckedAll=$(this).prop('checked');
				kv2Check.prop('checked', isCheckedAll);
			});

			kv2Check.change(function(){
				var isCheckedAll = kv2Check.length === $('input[name="kv2[]"]:checked').length;
				checkboxAll2.prop('checked',isCheckedAll);
			});
		//checkbox all change 3
			checkboxAll3.change(function(){
				var isCheckedAll=$(this).prop('checked');
				kv3Check.prop('checked', isCheckedAll);
			});

			kv3Check.change(function(){
				var isCheckedAll = kv3Check.length === $('input[name="kv3[]"]:checked').length;
				checkboxAll3.prop('checked',isCheckedAll);
			});

		//checkbox all change 4
			checkboxAll4.change(function(){
				var isCheckedAll=$(this).prop('checked');
				kv4Check.prop('checked', isCheckedAll);
			});

			kv4Check.change(function(){
				var isCheckedAll = kv4Check.length === $('input[name="kv4[]"]:checked').length;
				checkboxAll4.prop('checked',isCheckedAll);
			});
	}); 
</script>

<style>
@media all and (min-width: 992px) {

	.sidebar li{ position: relative; padding: 0 5px; }
	.sidebar li .submenu{ 
		position: absolute;
		left:100%; top:-22px;
		/* display: flex; */
	    flex-direction: row;
	    width: 1130px;}
	}
/* ============ desktop view .end// ============ */

/* ============ small devices ============ */
@media (max-width: 991px) {

	.sidebar .submenu, .sidebar .dropdown-menu{
		position: static!important;
		margin-left:0.7rem; margin-right:0.7rem; margin-bottom: .5rem;
	}
}
.sidebar li:hover .submenu{
	position: absolute;
	left:100%; top:-22px;
	display: flex;
    flex-direction: row;
    width: 1130px;
    padding: 5px 0;
}

.submenu.dropdown-menu li ul{
	padding-left: 20px;
	width: 310px;
}
.submenu.dropdown-menu.kv>li{
	border-right: 1px solid #CCCCCC;
}
#filters{padding-left: 20px}
.nav.flex-column a:hover{background:none;}
.nav-item.kv>.nav-link:hover{background-color: #EEEEEE}
.sidebar.card.py-2.mb-4	{
	width: 270px;margin-left: 20px; background-color:#f5f5f5;
	padding: 5px 10px 10px 10px; 
	margin-top: 10px;
}
nav h3{text-align: center;color: #444444;/* border-bottom: 6px solid #1b387c */}
li.nav-item{ padding: 10px 5px;border-bottom: 2px solid #AAAAAA	}
li.nav-item a{ color:#555555; font-size: 18px;font-weight: 500  }
li.nav-item ul li label{ color:#666666;cursor: pointer;padding:  3px 10px;}
li.nav-item ul li label:hover{ color:#666666;cursor: pointer;padding: 3px 10px; background-color: #EEEEEE}
.nav-link.kv{ padding: 0 10px 10px 10px; text-align: center }
</style>

<!-- <nav class="sidebar card py-2 mb-4" >
	<h3> Tìm kiếm nâng cao</h3>
	<ul class="nav flex-column">
		<li class="nav-item kv">
			<a class="nav-link" href="#"> Khu vực và tỉnh thành <i class="fas fa-angle-right"></i> </a>
			<ul class="submenu dropdown-menu kv">
			    <li><a class="nav-link kv" href="#">Miền Bắc</a>
			    	<ul>
			    		<li>
	                        <input type="checkbox" value="Hồ Chí Minh" id="1" name="kv1[]" />
	                        <label for="1"> Hồ Chí Minh</label>
	                    </li>
	                    <li>
	                        <input type="checkbox" value="Huế" id="2" name="kv1[]" />
	                        <label for="2"> Huế</label>
	                    </li>
	                    <li>
	                        <input type="checkbox" value="Đà Nẵng" id="3" name="kv1[]" />
	                        <label for="3"> Đà Nẵng</label>
	                    </li>
	                    <li>
	                        <input type="checkbox" value="Tất cả" id="checkbox-all1" />
	                        <label for="checkbox-all1"> Tất cả </label>
	                    </li>
			    	</ul>
			    </li>
			    <li><a class="nav-link kv" href="#">Miền Nam</a>
			    	<ul>
			    		<li>
	                        <input type="checkbox" value="Hồ Chí Minh" id="1" name="kv2[]" />
	                        <label for="1"> Hồ Chí Minh</label>
	                    </li>
	                    <li>
	                        <input type="checkbox" value="Huế" id="2" name="kv2[]" />
	                        <label for="2"> Huế</label>
	                    </li>
	                    <li>
	                        <input type="checkbox" value="Đà Nẵng" id="3" name="kv2[]" />
	                        <label for="3"> Đà Nẵng</label>
	                    </li>
	                    <li>
	                        <input type="checkbox" value="Tất cả" id="checkbox-all2" />
	                        <label for="checkbox-all2"> Tất cả </label>
	                    </li>
			    	</ul>
			    </li>
			    <li><a class="nav-link kv" href="#">Miền Trung</a>
			    	<ul>
			    		<li>
	                        <input type="checkbox" value="Hồ Chí Minh" id="1" name="kv3[]" />
	                        <label for="1"> Hồ Chí Minh</label>
	                    </li>
	                    <li>
	                        <input type="checkbox" value="Huế" id="2" name="kv3[]"/>
	                        <label for="2"> Huế</label>
	                    </li>
	                    <li>
	                        <input type="checkbox" value="Đà Nẵng" id="3" name="kv3[]"/>
	                        <label for="3"> Đà Nẵng</label>
	                    </li>
	                    <li>
	                        <input type="checkbox" value="Tất cả" id="checkbox-all3" />
	                        <label for="checkbox-all3"> Tất cả </label>
	                    </li>
			    	</ul>
			    </li>
			    <li><a class="nav-link kv" href="#">Tây Nguyên</a>
			    	<ul>
			    		<li>
	                        <input type="checkbox" value="Hồ Chí Minh" id="1" name="kv4[]" />
	                        <label for="1"> Hồ Chí Minh</label>
	                    </li>
	                    <li>
	                        <input type="checkbox" value="Huế" id="2" name="kv4[]"/>
	                        <label for="2"> Huế</label>
	                    </li>
	                    <li>
	                        <input type="checkbox" value="Đà Nẵng" id="3" name="kv4[]"/>
	                        <label for="3"> Đà Nẵng</label>
	                    </li>
	                    <li>
	                        <input type="checkbox" value="Tất cả" id="checkbox-all4" />
	                        <label for="checkbox-all4"> Tất cả </label>
	                    </li>
			    	</ul>
			    </li>
			</ul>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#"> Loại trường  </a>
			<ul id="filters">
				<li>
		            <input type="checkbox" value="Công lập" id="CongLap" />
		            <label for="CongLap"> Công lập</label>
		        </li>
		        <li>
		            <input type="checkbox" value="Dân lập" id="DanLap" />
		            <label for="DanLap"> Dân lập</label>
		        </li>
			</ul>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#"> Hệ đào tạo </i></a>
			<ul id="filters">
	            <li>
	                <input type="checkbox" value="Đại học" id="DaiHoc" />
	                <label for="DaiHoc"> Đại học</label>
	            </li>
	            <li>
	                <input type="checkbox" value="Cao Đẳng" id="CaoDang" />
	                <label for="CaoDang"> Cao Đẳng</label>
	            </li>
	            <li>
	                <input type="checkbox" value="Trung Cấp" id="TrungCap" />
	                <label for="TrungCap"> Trung Cấp</label>
	            </li>                                                                         
	        </ul>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#"> Khối ngành </a>
			<select id="KhoiNganh" class="form-control dynamic1" name="khoinganh" data-dependent='MaNg'>
	            <option selected="selected" value="">---------Tất cả---------</option>
	            <option selected="selected" value="">---------Tất cả---------</option>
	                
	        </select>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#"> Ngành </a>
			<select id="MaNg" class="form-control" name="nganh">
	            <option selected="selected" value="">---------Tất cả---------</option>
	        </select>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#"> Phương thức tuyển sinh  </a>
			<ul id="filters">
			    <li>
	                <input type="checkbox" value="Đại học" id="filter-DaiHoc" />
	                <label for="filter-DaiHoc"> Đại học</label>
	            </li>
	            <li>
	                <input type="checkbox" value="CaoDang" id="filter-CaoDang" />
	                <label for="filter-CaoDang"> Cao Đẳng</label>
	            </li>
	            <li>
	                <input type="checkbox" value="TrungCap" id="filter-TrungCap" />
	                <label for="filter-TrungCap"> Trung Cấp</label>
	            </li> 
			</ul>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#"> Học phí </a>
			<div class="well text-center" >
				<div class="show" ></div>
				<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="100000000" data-slider-step="500000" data-slider-value="[0,35000000]" id="sl2" ><br />
				<b class="pull-left">0đ</b> <b class="pull-right">100000000đ</b>

			</div>
		</li>
	</ul>
</nav>  -->
