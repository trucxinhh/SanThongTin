@extends('index')
@section('title')
   Thông tin liên hệ
@endsection
@section('style')
<style>
	#contact-page .bg .row.row1{
		margin-top: -520px;
		/* padding-bottom: 50px; */
		/* padding: 20px 40px; */
	}
	.contact-form{
		margin-top: 30px;
	}


	.filter {
	    position: absolute;
	    top: 2.5%;
	    left: -20%;
	    transform: translate3d( 40%, 30%, 0 );
	    width: 77%;
	    height: 34%;
	    z-index: 0;
	    -webkit-backdrop-filter: blur(10px);
	    backdrop-filter: blur(10px);
	    background-color: rgba(255, 255, 255, 0.2);
	    border-radius: 10px;
	}

	.filter {
	  /* display: flex; */
	  align-items: center;
	  justify-content: center;
	  color: #fff;
	}

</style>
@endsection

@section('content')

<section>
	<div class="container-fluid">
        <div class="bannerlienhe">
            <img src="{{URL::to('/')}}/public/frontend/images/nenlienhe.jpg" alt=""> 
            <div></div>            
        </div>
    </div>
	<div id="contact-page" class="container">

    	<div class="bg">
		    <div id="first-element" class="filter"></div>     		
	    		<div class="row row1">
					<div class="col-sm-5"> 
						<div class="contact-info">
		    				<h2 class="title text-center">Thông tin liên hệ</h2>
		    				<address>
								<p>Địa chỉ: 71 Ngũ Hành Sơn, Đà Nẵng, Việt Nam</p>
								<p>Mobile: 0123456789</p>
								<p>Fax: 21121212121</p>
								<p>Email: khoaluanxidu@gmail.com</p>
		    				</address>
		    				<div class="social-networks">
		    					<h2 class="title text-center">Social Networking</h2>
								<ul>
									<li>
										<a href="#"><i class="fab fa-facebook"></i></a>
									</li>
									<li>
										<a href="#"><i class="fab fa-facebook-messenger"></i></a>
									</li>
									<li>
										<a href="#"><i class="fab fa-github"></i></a>
									</li>
									<li>
										<a href="#"><i class="fab fa-youtube"></i></a>
									</li>
									<li>
										<a href="#"><i class="fab fa-google-drive"></i></a>
									</li>
								</ul>
		    				</div>
		    			</div>
					</div>
					<div class="col-sm-7">    			   			
						<br>
						<br>    			    				    				
						<div id="gmap" class="contact-map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3644.62816579743!2d108.23728471471586!3d16.047393488894375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142176215eb4ed7%3A0xd50bf793bd3ed1f2!2zNzEgTmfFqSBIw6BuaCBTxqFuLCBC4bqvYyBN4bu5IFBow7osIE5nxakgSMOgbmggU8ahbiwgxJDDoCBO4bq1bmcgNTUwMDAwLCBWaWV0bmFt!5e1!3m2!1sen!2s!4v1621085814269!5m2!1sen!2s" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</div>
					</div>			 		
				</div>   	
    		<div class="row" style="margin-top: 50px;">
    			<div class="col-sm-3"></div>  	
	    		<div class="col-sm-6">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Gửi thông tin đóng góp cho chúng tôi</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Họ và Tên">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Chủ đề">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Lời nhắn"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="Gửi" class="btn btn-primary pull-right" value="Gửi">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-3">
	    			
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
</section>

@endsection

@section('script')
@endsection 