<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Cenvalue</title>
		
		{{ HTML::style('https://fonts.googleapis.com/css?family=Lato:400,100,300,700') }}
		
		<!-- CSS -->
		<!--<link href="css/normalize.min.css" rel="stylesheet">-->
		<!--<link href="css/cenvalue.css" rel="stylesheet">-->
		<!--<link href="css/responsive.css" rel="stylesheet">-->
		
		{{ HTML::style('default/css/normalize.min.css') }}
		{{ HTML::style('default/css/cenvalue.css') }}
		{{ HTML::style('default/css/responsive.css') }}
		
		{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') }}
		{{ HTML::script('http://maps.googleapis.com/maps/api/js?key=AIzaSyDl_U9Nei3FMIhxCQysJYsj0-E0r-tDp4g&sensor=false&libraries=places,geometry') }}

		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<script>
			var icon = {
				home: "{{ URL::asset('default/images/logo_icon2.png') }}",
				address: "{{ URL::asset('default/images/icon_cenvalue.png') }}"
			};
			
			var url = {
				info: '/public/info',
				markers: '/public/markers',
				address: '/public/address',
				price: '/public/price',
				plan: '/public/plan'
			};
			
			jQuery(window).keydown(function(event){
			    if(event.keyCode == 13) {
			      event.preventDefault();
			      return false;
			    }
			});
		</script>
	</head>
	<body class="{{ $body_class }}">
		
		<div class="page_wrapper">
			
			<!--
			/*==============================*\
			HEADER 
			/*==============================*\
			-->
			<header>
				<div id="header">
					<div class="header_inner">
						<div class="header_show clearfix">
							<div id="logo"><a href="#">Cenvalue</a></div>
							<div id="menu_button"><span></span></div>
						</div>
						<div id="navigation">
							<div class="navigation_wrapper">
								<ul class="menu_list clearfix">
									<li class="menu_item"><a href="{{ URL::to('/payment') }}"><i class="menu_icon icon_dangky"></i><span>Đăng ký | Đăng nhập</span></a></li>
									<li class="menu_item"><a class="clearfix" href="{{ URL::to('/index') }}"><i class="menu_icon icon_trangchu"></i><span>Trang chủ</span></a></li>
									<li class="menu_item"><a class="clearfix" href="{{ URL::to('/price') }}"><i class="menu_icon icon_dinhgia"></i><span>Định giá</span></a></li>
									<li class="menu_item"><a class="clearfix" href="{{ URL::to('/plan') }}"><i class="menu_icon icon_xemquihoach"></i><span>Xem qui hoạch</span></a></li>
									<li class="menu_item"><a class="clearfix" href="{{ URL::to('/payment') }}"><i class="menu_icon icon_cungdongia"></i><span>Tài sản cùng đơn giá</span></a></li>
									<li class="menu_item"><a class="clearfix" href="{{ URL::to('/about') }}"><i class="menu_icon icon_vechungtoi"></i><span>Về chúng tôi</span></a></li>
									<li class="menu_item"><a class="clearfix" href="{{ URL::to('/contact') }}"><i class="menu_icon icon_lienhe"></i><span>Liên hệ</span></a></li>
								</ul>
								<div class="nav_contact">
									<p>Hotline</p>
									<p><strong>0983 604 426 - 0936 878 55</strong></p>
								</div>
								<div class="nav_social">
									<p>Kết nối chúng tôi qua</p>
									<div class="social_list clearfix">
										<a class="social_item social_item_facebook" href="#">Facebook</a>
										<a class="social_item social_item_google" href="#">Google+</a>
										<a class="social_item social_item_linkedin" href="#">Linkedin</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			
			
			@yield('content')
			
			
			<!--
			/*==============================*\
			FOOTER 
			/*==============================*\
			-->
			<footer>
				<div id="footer">
					<div class="footer_left clearfix">						
						<div class="footer_block footer_block_menu">
							<ul class="footer_menu_list">
								<li class="footer_menu_item"><a href="#">Thể lệ & Điều kiện</a></li>
								<li class="footer_menu_item"><a href="#">Hướng dẫn sử dụng</a></li>
								<li class="footer_menu_item"><a href="#">Video giới thiệu</a></li>
							<ul>
						</div>
						<div class="footer_block footer_block_info">
							<p>CÔNG TY CỔ PHẦN THẨM ĐỊNH GIÁ THẾ KỶ - CENVALUE</p>
							<p>Địa chỉ: Tầng 20, Tòa nhà 319 Bộ Quốc Phòng,</p>
							<p>Số 63 Lê Văn Lương - Cầu Giấy, Hà Nội</p>
							<p>Điện thoại: (04) 32222.786 - Fax: (04) 32222.787</p>
						</div>
					</div>
					<div class="footer_right clearfix">
						<div class="footer_block footer_block_contact_value">
							<div class="desktop">
								<p class="footer_block_header">Liên hệ<br> Định giá</p>
								<div class="btn btn_arrow btn_send_contact"><a href="#">Gửi thông tin <i></i></a></div>
							</div>
							<div class="mobile">
								<div class="footer_block_header"><a href="#">Liên hệ<br> Định giá</a></div>
							</div>
						</div>
						<div class="footer_block footer_block_support">
							<div class="desktop">
								<p class="footer_block_header">Hỗ trợ<br> Trực tuyến</p>
								<div class="btn btn_arrow btn_support"><a href="#">Trao đổi ngay <i></i></a></div>
							</div>
							<div class="mobile">
								<div class="footer_block_header"><a href="#">Hỗ trợ<br> Trực tuyến</a></div>
							</div>
						</div>
					</div>
				</div>
			</footer>
			
			
		</div>
		
		
		<!-- JS -->
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/cenvalue.js"></script>
		
		<script src="js/bootstrap.min.js"></script>
		<script src="js/moment.js"></script>
		<script src="js/moment-vi.js"></script>
		<script src="js/bootstrap-datetimepicker.js"></script>
		-->
		{{ HTML::script('default/js/bootstrap.min.js') }}
		{{ HTML::script('default/js/moment.js') }}
		{{ HTML::script('default/js/moment-vi.js') }}
		{{ HTML::script('default/js/bootstrap-datetimepicker.js') }}
		{{ HTML::script('default/js/zjs/z.min.js') }}
		{{ HTML::script('default/js/jquery.accordion.js') }}
		{{ HTML::script('default/js/cenvalue.js') }}
	</body>
</html>