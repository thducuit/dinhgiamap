<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>{{ $title ? $title : 'CenGroup' }}</title>
		
		{{ HTML::style('https://fonts.googleapis.com/css?family=Lato:400,100,300,700') }}
		
		<!-- CSS -->
		<!--<link href="css/normalize.min.css" rel="stylesheet">-->
		<!--<link href="css/cenvalue.css" rel="stylesheet">-->
		<!--<link href="css/responsive.css" rel="stylesheet">-->
		
		{{ HTML::style('default/css/bootstrap.min.css') }}
		{{ HTML::style('default/css/normalize.min.css') }}
		{{ HTML::style('//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css') }}
		{{ HTML::style('default/css/cenvalue.css') }}
		{{ HTML::style('default/css/responsive.css') }}
		<!-- {{ HTML::style('default/css/styles.css') }} -->
		{{ HTML::style('http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css') }}
		
		{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') }}
		{{ HTML::script('https://code.jquery.com/ui/1.12.0/jquery-ui.js') }}
		{{ HTML::script('http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js') }}
		{{ HTML::script('http://maps.googleapis.com/maps/api/js?key=AIzaSyCFEQBvTi6zuAx2lh4Lte_bofdG8eMknlI&sensor=false&libraries=places,geometry') }}

		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<script>
            var placeInfo = null;
			var icon = {
				home: "{{ URL::asset('default/images/logo_icon2.png') }}",
				address: "{{ URL::asset('default/images/icon_cenvalue.png') }}"
			};
			
			var url = {
				info: '/public/info',
				markers: '/public/markers',
				address: '/public/address',
				price: '/public/price',
				plan: '/public/plan',
				street: '/public/streets',
				priceStreet: '/public/streets/price',
				district: '/public/district',
                login: '/public/login-ajax'
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
                            <div id="logo"><a href="{{ URL::to('/index1') }}">cenvalue</a></div>
							<div id="menu_button"><span></span></div>
						</div>
						<div id="navigation">
							<div class="navigation_wrapper">
								<ul class="menu_list clearfix">	
									@if(!Sentry::check())
									<li class="menu_item login-menu-item"><a class="clearfix dangNhap" href="#dangnhap"  data-toggle="modal" data-target="#modal_dangNhap"><i class="menu_icon icon_dangky"></i> <span>Đăng nhập</span></a></li>
                                    <li class="menu_item register-menu-item"><a class="clearfix dangKy" href="#dangky" data-toggle="modal" data-target="#modal_dangky"><i class="menu_icon icon_dangky"></i> <span>Đăng ký</span></a></li>
									@else
									<li class="menu_item"><a class="clearfix dangNhap" href="{{ URL::to('/info') }}"  ><i class="menu_icon icon_dangky"></i> <span>Thông tin tài khoản</span></a></li>
									@endif
									<li class="menu_item {{ isset($current) && $current == 1 ? 'current' : '' }}"><a class="clearfix" href="{{ URL::to('/index') }}"><i class="menu_icon icon_trangchu"></i><span>Trang chủ</span></a></li>
									<li class="menu_item {{ isset($current) && $current == 2 ? 'current' : '' }}"><a class="clearfix" href="{{ URL::to('/about') }}"><i class="menu_icon icon_vechungtoi"></i><span>Về chúng tôi</span></a></li>
									<li class="menu_item {{ isset($current) && $current == 3 ? 'current' : '' }}"><a class="clearfix" href="{{ URL::to('/plan') }}"><i class="menu_icon icon_xemquihoach"></i><span>Xem qui hoạch</span></a></li>
									<li class="menu_item {{ isset($current) && $current == 4 ? 'current' : '' }}"><a class="clearfix" href="{{ URL::to('/question') }}"><i class="menu_icon icon_faq"></i><span>Hỏi đáp</span></a></li>
									<li class="menu_item {{ isset($current) && $current == 5 ? 'current' : '' }}"><a class="clearfix" href="/huongdan/gioi-thieu.html"><i class="menu_icon icon_video"></i><span>Hướng dẫn sử dụng</span></a></li>
									<li class="menu_item {{ isset($current) && $current == 6 ? 'current' : '' }}"><a class="clearfix" href="{{ URL::to('/contact') }}"><i class="menu_icon icon_lienhe"></i><span>Liên hệ</span></a></li>									
								</ul>
								<ul class="submenu">
									<li><a href="#"><span>Điều khoản bảo mật</span></a></li>
									<li><a href="#"><span>Chính sách sử dụng</span></a></li>
								</ul>								
								<div class="nav_social">
                                                                        
									<p>Kết nối chúng tôi qua</p>
                                    <p>Hotline</p>
									<p><strong>1900 9079</strong></p>
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
			
			

			<footer>
				<div id="footer">
					<div class="main_width clearfix">					
						<div class="footer_col" style="text-align: center;">



							<img  src="{{ URL::asset('default/images/icon_cenvalua3.png') }}" width="125" style="padding-top: 3px;">

						</div>
						<div class="footer_col text-center" style="text-align: center;" >
							<a href="#lienhe">
								<span>Hỗ trợ trực tuyến</span>
								<img src="{{ URL::asset('default/images/footer_hotro2.png') }}" style="    padding-bottom: 10px;">
							</a>

						</div>
					<div class="footer_col text-center" style="text-align: center;">
						<a href="#lienhe">
							<span>Liên hệ định giá</span>
							<img src="{{ URL::asset('default/images/footer_lienhe3.png') }}" style="  padding-bottom: 4px;">
						</a>

					</div>
					<div class="footer_col text-center" style="text-align: center;">
						<div class="nav_social">
							<div class="social_list clearfix">
								<a class="social_item social_item_facebook" href="#">Facebook</a>
								<a class="social_item social_item_google" href="#">Google+</a>
								<a class="social_item social_item_linkedin" href="#">Linkedin</a>
							</div>
						</div>

					</div>
					<div class="footer_col text-center" style="text-align: center;">
						<a href="#lienhe" >

							<img  src="{{ URL::asset('default/images/comodossl.png') }}" style="height: 30px;">
						</a>

					</div>

					<div class="footer_col text-center" style="text-align: center;">
						<a href="#lienhe">

							<img src="{{ URL::asset('default/images/icon_bocongthuong2.png') }}" style=" height: 30px;">
						</a>

					</div>

					</div>					

				</div>
			</footer>

			
			
			
			<!-- Modal -->
			<div id="modal_info" class="modal fade" role="dialog">
				<div class="modal-dialog" style="max-width: 480px;">
					<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">×</button>

						<div class="p_address">
						<p>Địa chỉ : 27 Phó Đức Chính, P.Nguyễn Thái Bình, Q.1, TPHCM</p>
						</div>
						</div>
						<div class="modal-body">
							<div class="popup_button_group text-center">
								<div class="row">
				                    <div class="col-sm-12">
				                          <div class="infortrai">
				                              <a href="#" id="show-price-pop-up">
				                            <div class="btn btn_icon btn_gradient1" style="padding-right: 40px;">
				                                <i class="icon_xemdongia"></i>
				                                <span>Xem đơn giá    </span>
				                            </div></a>
				                          <a class="btn_dinhgia" href="#">
				                             <div class="btn btn_icon btn_gradient3" style="padding-right: 50px;">
				                                 <i class="icon_dinhgia"></i><span>Định giá</span>
				                             </div>
				                         </a>
				                          </div>
				                          <div class="inforphai">
				                              
				                         <a href="#" id="show-price-temp-pop-up">
				                             <div class="btn btn_icon btn_gradient4" style="padding-right: 25px;">
				                                 <i class="icon_phathanhchungthu"></i>
				                                 <span>Xem giá sơ bộ</span>
				                             </div>
				                         </a>

				                        <a href="#"><div id="btn_xemquihoach" class="btn btn_icon btn_gradient2"><i class="icon_xemquihoach"></i><span>Xem qui hoạch</span></div></a>
				                            </div>
				                          
				                    </div> 

							    </div>
							</div>
						</div>

					</div>

				</div>
			</div><!--end modal-->

			{@include('partials.dongiasobo')}

		</div>



		<!-- Modal -->
		<div id="modal_dongiathitruong" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Đơn giá đất</h4>
			  </div>
			  <div class="modal-body">
				<div class="address_row">
					<p><strong>Địa chỉ</strong></p>
					<p id="dgtt_popup_address">68 Hai Bà Trưng, P.Bến Nghé, Q.1, Tp.HCM</p>
				</div>
				<div class="clearfix">
					<div class="modal_half">
						<p><strong>Đơn giá đất thị trường đề xuất</strong><br>
						<span class="price"><span class="dongia_highlight_left"></span>(VNĐ/M<sup>2</sup>)</span></p>
					</div>
					<div class="modal_half">
						<p><strong>Đơn giá đất nhà nước đề xuất</strong><br>
						<span class="price"><span class="dongia_highlight_right"></span>(VNĐ/M<sup>2</sup>)</span></p>
					</div>
				</div>
			  </div>
			  <div class="modal-footer">
				<a id="btn_dinhgia" class="btn btn_dinhgia btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></a>
			  </div>
			</div>

		  </div>
		</div> <!-- end modal -->
		
<!--model-->

<div class="modal fade" id="modal_dangNhap" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="font-weight: bolder;">ĐĂNG NHẬP</h4>
          </div>
          <div class="modal-body">
            <div class="popup_button_group">
              <form class="form-horizontal login-form" role="form" method="post">
                <span class="the-error"></span>
                <div class="form-group">

                  <div class="col-sm-10 col-sm-offset-1">
                    <label  class="control-label">Tên đăng nhập(*):</label>
                    <input type="text" class="form-control"  placeholder="Tên đăng nhập" name="email">
                    <div class="help-block"></div>
                  </div>
                </div>
                <div class="form-group">

                  <div class="col-sm-10 col-sm-offset-1">
                    <label class="control-label">Mật khẩu (*):</label>
                    <input type="password" class="form-control"  placeholder="Mật khẩu"  name="password">
                    <div class="help-block"></div>
                  </div>
                </div>                                                                                                                                                                  
                <div class="form-group">
                  <div class="col-sm-offset-1 col-sm-10">

                    <div class="row">
                      <div class="col-sm-9">
                        <a class="btn btn-info btn-flat btn-login">Đăng nhập</a>                       
                        <a class="btn-forgot-password quenMatKhau" href="#">Quên mật khẩu ?</a>                        
                      </div>
                      <div class="col-sm-3 dn_dangky">
                        <a href="#"  class="btn btn-info dangKy2 dangKy-btn" data-toggle="modal" data-target="#modal_dangky">Đăng ký</a>
                      </div>

                    </div>
                    <!--                                                                                                  <div class="" style="float: left;">
                    <button class="btn btn-info btn-flat">Đăng nhập</button>
                    <a class="btn-forgot-password quenMatKhau" href="#">Quên mật khẩu ?</a>
                    </div>
                    <div class="text-right dn_dangky">
                    <a href="#"  class="btn btn-info dangKy2 dangKy-btn" data-toggle="modal" data-target="#modal_dangky">Đăng ký</a>
                    </div>-->
                  </div>
                </div>

              </form>	
            </div>
          </div>

        </div>

      </div>
    </div>
<!--                        modal dang ky-->
                                  <div class="modal fade" id="modal_dangky" role="dialog">
                                <div class="modal-dialog">

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title" style="font-weight: bolder;">ĐĂNG KÝ THÀNH VIÊN</h4>
                                    </div>
                                    <div class="modal-body">
                                     <div class="popup_button_group">
                                                                                      <div class="form-group">
                                                                                               <p style="font-weight: bolder; padding-left: 7px;">Mời quí vị đăng ký thành viên để được hưởng nhiều lợi ích và hổ trợ từ chúng tôi.</p>
                                                                                       </div>
                                                                                    
<!--                                                                                             <form class="form-horizontal" id="form_dangky" role="form" action="" method="post">-->
                                                                                             <form class="form-horizontal" id="form_dangky" method="post" action="">
    
                                                                                             <div class="form-group">
                                                                                              <label class="col-sm-3 control-label">Loại tài khoản (*):</label>
                                                                                              <div class="col-sm-9">
                                                                                                  
                                                                                                          <label class="radio-inline">
                                                                                                              <input type="radio" name="taiKhoan" id="inlineRadio2" checked="true" value="1"> Môi giới/Cá nhân
                                                                                                          </label>
                                                                                                            <label class="radio-inline">
                                                                                                            <input type="radio" name="taiKhoan" id="inlineRadio2" value="0"> Công ty
                                                                                                          </label>
                                                                                                         
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                               <label  class="col-sm-3 control-label">Tên đăng nhập (*):</label>
                                                                                              <div class="col-sm-9">
                                                                                                  <input type="text" class="form-control" id="danKy_email" name="danKy_email"  placeholder="Email đăng nhập">
                                                                                                <div class="help-block"></div>
                                                                                              </div>
                                                                                            </div>
                                                                                             <div class="form-group">
                                                                                              <label class="col-sm-3 control-label">Mật khẩu (*):</label>
                                                                                              <div class="col-sm-9">
                                                                                                <input type="password" class="form-control" id="danKy_MatKhau" name="danKy_MatKhau"  placeholder="Mật khẩu">
                                                                                                <div class="help-block"></div>
                                                                                              </div>
                                                                                            </div>
                                                                                             <div class="form-group">
                                                                                              <label class="col-sm-3 control-label">Gõ lại mật khẩu (*):</label>
                                                                                              <div class="col-sm-9">
                                                                                                <input type="password" class="form-control" id="danKy_ReMatKhau" name="danKy_ReMatKhau"  placeholder="Gõ lại mật khẩu">
                                                                                                <div class="help-block"></div>
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                              <label  class="col-sm-3 control-label">Họ & Tên (*):</label>
                                                                                              <div class="col-sm-9">
                                                                                                  <input type="text" class="form-control" id="dangKy_ht" name="dangKy_ht"  placeholder="Họ & Tên">
                                                                                                   <div class="help-block"></div>
                                                                                              </div>
                                                                                            </div>                                                                                            
                                                                                            <div class="form-group">
                                                                                              <label  class="col-sm-3 control-label">Điện thoại (*):</label>
                                                                                              <div class="col-sm-9">
                                                                                                  <input type="text" class="form-control" id="dangKy_dienthoai" name="dangKy_dienthoai">
                                                                                                  <div class="help-block"></div>
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                              <label class="col-sm-3 control-label">Địa chỉ:</label>
                                                                                              <div class="col-sm-9">
                                                                                                 <input type="text" class="form-control" id="dangKy_diaChi" name="dangKy_diaChi"  placeholder="Địa chỉ">
                                                                                                         
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                              <label  class="col-sm-3 control-label">Giới tính:</label>
                                                                                              <div class="col-sm-9">
                                                                                                  <label class="radio-inline">
                                                                                                            <input type="radio" name="gender" checked="true" id="inlineRadio1" value="0"> Nam
                                                                                                          </label>
                                                                                                          <label class="radio-inline">
                                                                                                            <input type="radio" name="gender" id="inlineRadio2" value="1"> Nữ
                                                                                                          </label>
                                                                                                         
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="form-group tab_body ngay-sinh-box">
                                                                                              <label  class="col-sm-3 control-label">Ngày sinh:</label>
                                                                                              <div class="col-sm-9 form_row">    
                                                                                                <div class="form_col">
                                                                                                  <select name="d_ngaySinh">
                                                                                                    <option value="">Ngày</option>
                                                                                                    <?php 
                                                                                                    for($i = 1; $i <= 31; $i++){
                                                                                                      ?>
                                                                                                    <option value="<?php echo $i?>"><?php echo $i?></option>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                  </select>
                                                                                                </div>
                                                                                                <div class="form_col">
                                                                                                  <select name="m_ngaySinh">
                                                                                                    <option value="">Tháng</option>
                                                                                                    <?php 
                                                                                                    for($i = 1; $i <= 12; $i++){
                                                                                                      ?>
                                                                                                    <option value="<?php echo $i?>"><?php echo $i?></option>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                  </select>
                                                                                                </div>
                                                                                                <div class="form_col">
                                                                                                  <select name="y_ngaySinh">
                                                                                                    <option value="">Năm</option>
                                                                                                    <?php 
                                                                                                    for($i = 1916; $i <= 1998; $i++){
                                                                                                      ?>
                                                                                                    <option value="<?php echo $i?>"><?php echo $i?></option>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                  </select>
                                                                                                </div>
<!--                                                                                                <div class="input-group">                                                                                                      
                                                                                                    <div class="input-group date" id="datetimepicker_ngaysinh">
                                                                                                        <input class="form-control" type="text" id="d_ngaySinh" name="d_ngaySinh">
                                                                                                                <span class="input-group-addon">
                                                                                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                                                                                </span>
                                                                                                        </div>                                                                                                        
                                                                                                </div>                                                                                                         -->
                                                                                              </div>
                                                                                            </div>                                                                                            
                                                                                            <div class="form-group">
                                                                                              <label  class="col-sm-3 control-label">Mã xác nhận:</label>
                                                                                              <div class="col-sm-9">
                                                                                                  <div class="row">
                                                                                                      <div class="col-xs-5 text-left" >
                                                                                                     <input type="text" class="form-control" id="danKy_captcha" name="danKy_captcha"  name="capChar"  >
                                                                                                          <div class="help-block"></div>
                                                                                                      </div>
                                                                                                    <div class="col-xs-7 text-left">
                                                                                                        <img src="{{ URL::asset('default/images/capchar.png') }}">
                                                                                                        <img src="{{ URL::asset('default/images/refesh.gif') }}">
                                                                                                  </div>
                                                                                                  
                                                                                                  </div>
                                                                                                  
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                              <div class="col-sm-offset-3 col-sm-9">
                                                                                                <div class="checkbox">
                                                                                                  <label>
                                                                                                      <input type="checkbox" name="danKy_DongY" id="danKy_DongY" value="1"> Tôi đồng ý với qui định của <span style="font-weight: bold;">ĐỊNH GIÁ TRỰC TUYẾN</span> 
                                                                                                       
                                                                                                  </label>
                                                                                                </div>
                                                                                                  <span style="padding-left: 21px;">
                                                                                                      hoặc vui lòng xem thêm<a href="#"><span> Chính sách sử dụng</span></a>
                                                                                                  </span>
                                                                                                  <div class="help-block dk_agree" style="color: #a94442;"></div>
<!--                                                                                                 <div class="checkbox">
                                                                                                  <label>
                                                                                                       Tôi đồng ý với qui định của <span style="font-weight: bold;">ĐỊNH GIÁ TRỰC TUYẾN</span> hoặc.
                                                                                                     
                                                                                                  </label>
                                                                                                </div>  -->
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                              <div class="col-sm-offset-3 col-sm-9">
                                                                                                  <button class="btn btn-danger btn-flat" id="register"   type="submit" >Đăng ký</button>
                                                                                               
                                                                                              </div>
                                                                                            </div>
                                                                                          </form>	
										</div>
                                    </div>
                                    
                                  </div>

                                </div>
                              </div>
<!--                            end modal dang ky-->
 

 <!--                            chon kich hoat tai khoan-->
                                      <div class="modal fade" id="modal_KichHoatTaiKhoan" role="dialog">
                                    <div class="modal-dialog" >

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    
                                    <div class="modal-body">
                                     <div class="popup_button_group form-horizontal">
                                                                                     
                                                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    
<!--                                                                                   <form class="form-horizontal" role="form">-->
                                                                                     <form class="form-horizontal" id="form_ChonKichHoat" method="post" action="">   
                                                                                            <div class="form-group">
                                                                                                 <div class="col-sm-10 col-sm-offset-1">
                                                                                                     <h4 class="modal-title" style="font-weight: bolder;"><img src="{{ URL::asset('default/images/icon_success.png') }}" style="padding-right: 5%; padding-bottom: 5%;">ĐĂNG KÝ THÀNH CÔNG.</h4>
                                                                                                     <label>Cám ơn quý khách đã đăng ký tài khoản tại <a href="#">www.dinhgiatructuyen.vn</a></label><br>
                                                                                                     <label>Để hoàn tất đăng ký vui lòng kích hoạt tài khoản:</label><br>
                                                                                                     
                                                                                                     
                                                                                                 </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                 <div class="col-sm-10 col-sm-offset-1">
                                                                                                     <div class="row">
                                                                                                         <div class="col-xs-4">
                                                                                                             <div class="radio">
                                                                                                                <label>
                                                                                                                    <input type="radio" id="KHoat" name="KHoat" value="0"> <span style="font-weight: bold;">Qua Email.</span> 

                                                                                                                </label>
                                                                                                              </div>
                                                                                                         </div>
                                                                                                      <div class="col-xs-4">
                                                                                                          
                                                                                                                <div class="radio">
                                                                                                                <label>
                                                                                                                    <input type="radio" id="KHoat" name="KHoat" value="1"> <span style="font-weight: bold;">Qua mobile.</span> 

                                                                                                                </label>
                                                                                                              </div>
                                                                                                      
                                                                                                      </div>
                                                                                                     
                                                                                                   </div>                                                                                                     
                                                                                                     
                                                                                                 </div>
                                                                                            </div>                                                                                                                                                                  
                                                                                            <div class="form-group">
                                                                                              <div class="col-sm-offset-1 col-sm-10">
                                                                                                  <div class="">
                                                                                                      <button class="btn btn-danger btn-flat" id="KichHoatTK" style="width: 100%;" href="index.html">Kích hoạt tài khoản</button>
                                                                                                      
                                                                                                   </div>
                                                                                                   
                                                                                              </div>   
                                                                                            </div>
                                                                                            
                                                                                    </form>

                                                                                            </div>
                                                                                            
                                                                                         	
										</div>
                                    </div>
                                    
                                  </div>

                                </div>
<!--                                end chon kich hoat tai khoan-->



                             
<!--                            chon kich hoat tai khoan-->
                                      <div class="modal fade" id="modal_KichHoatTaiKhoan" role="dialog">
                                    <div class="modal-dialog" >

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    
                                    <div class="modal-body">
                                     <div class="popup_button_group form-horizontal">
                                                                                     
                                                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    
<!--                                                                                   <form class="form-horizontal" role="form">-->
                                                                                     <form class="form-horizontal" id="form_ChonKichHoat" method="post" action="">   
                                                                                            <div class="form-group">
                                                                                                 <div class="col-sm-10 col-sm-offset-1">
                                                                                                     <h4 class="modal-title" style="font-weight: bolder;"><img src="images/icon_success.png" style="padding-right: 5%; padding-bottom: 5%;">ĐĂNG KÝ THÀNH CÔNG.</h4>
                                                                                                     <label>Cám ơn quý khách đã đăng ký tài khoản tại <a href="#">www.dinhgiatructuyen.vn</a></label><br>
                                                                                                     <label>Để hoàn tất đăng ký vui lòng kích hoạt tài khoản:</label><br>
                                                                                                     
                                                                                                     
                                                                                                 </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                 <div class="col-sm-10 col-sm-offset-1">
                                                                                                     <div class="row">
                                                                                                         <div class="col-xs-4">
                                                                                                             <div class="radio">
                                                                                                                <label>
                                                                                                                    <input type="radio" id="KHoat" name="KHoat" value="0"> <span style="font-weight: bold;">Qua Email.</span> 

                                                                                                                </label>
                                                                                                              </div>
                                                                                                         </div>
                                                                                                      <div class="col-xs-4">
                                                                                                          
                                                                                                                <div class="radio">
                                                                                                                <label>
                                                                                                                    <input type="radio" id="KHoat" name="KHoat" value="1"> <span style="font-weight: bold;">Qua mobile.</span> 

                                                                                                                </label>
                                                                                                              </div>
                                                                                                      
                                                                                                      </div>
                                                                                                     
                                                                                                   </div>                                                                                                     
                                                                                                     
                                                                                                 </div>
                                                                                            </div>                                                                                                                                                                  
                                                                                            <div class="form-group">
                                                                                              <div class="col-sm-offset-1 col-sm-10">
                                                                                                  <div class="">
                                                                                                      <button class="btn btn-danger btn-flat" id="KichHoatTK" style="width: 100%;" href="index.html">Kích hoạt tài khoản</button>
                                                                                                      
                                                                                                   </div>
                                                                                                   
                                                                                              </div>   
                                                                                            </div>
                                                                                            
                                                                                    </form>

                                                                                            </div>
                                                                                            
                                                                                         	
										</div>
                                    </div>
                                    
                                  </div>

                                </div>
<!--                                end chon kich hoat tai khoan-->

<!--                        modal xac nhan OTP-->
                                   <div class="modal fade" id="modal_maXacNhan" role="dialog">
                                    <div class="modal-dialog" style="min-width:300px; width: 500px; ">

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title" style="font-weight: bolder;">NHẬP MÃ XÁC NHẬN OTP</h4>
                                    </div>
                                    <div class="modal-body">
                                     <div class="popup_button_group">
                                                                                     
                                                                                    
<!--                                                                                   <form class="form-horizontal" role="form">-->
                                                                                    <form class="form-horizontal" id="form_xacNhanOTP" method="post" action="">         
                                                                                            <div class="form-group">
                                                                                             
                                                                                              <div class="col-sm-10 col-sm-offset-1">
                                                                                                  <label>Vui lòng nhập mã xác nhận OTP đã được gửi tới số điện thoại<span style="color: #d9534f;"> 0971621268 </span>để xác thực tài khoản.</label>
                                                                                              </div>
                                                                                            </div>
                                                                                             <div class="form-group">
                                                                                             
                                                                                              <div class="col-sm-10 col-sm-offset-1">
                                                                                                <label class="control-label">Nhập mã OTP</label>
                                                                                                <label class="control-label" style="float: right; color: #5bc0de;">Gửi lại mã OTP</label>
                                                                                                <input type="text" class="form-control"  placeholder="Mã OTP">
                                                                                              </div>
                                                                                            </div>                                                                                                                                                                  
                                                                                            <div class="form-group">
                                                                                              <div class="col-sm-offset-1 col-sm-10">
                                                                                                  <div class="">
                                                                                                      <button class="btn btn-danger btn-flat " id="xacNhanOTP" style="width: 100%;">Xác nhận</button>
                                                                                                      
                                                                                                   </div>
                                                                                                   
                                                                                              </div>   
                                                                                            </div>
                                                                                         </form>
                                                                                            </div>
                                                                                            
                                                                                         	
										</div>
                                    </div>
                                    
                                  </div>

                                </div>
<!--                            end modal xac nhan OTP-->
                                  
                                

<!--                             modal dang ky thanh cong-->
                                     <div class="modal fade" id="modal_dangKyThanhCong" role="dialog">
                                    <div class="modal-dialog" >

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    
                                    <div class="modal-body">
                                     <div class="popup_button_group form-horizontal">
                                                                                     
                                                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    
<!--                                                                                   <form class="form-horizontal" role="form">-->
                                                                                       
                                                                                            <div class="form-group">
                                                                                                 <div class="col-sm-10 col-sm-offset-1">
                                                                                                     <h4 class="modal-title" style="font-weight: bolder;"><img src="images/icon_success.png" style="padding-right: 5%; padding-bottom: 5%;">KÍCH HOẠT THÀNH CÔNG.</h4>
                                                                                                     <label>Cám ơn quý khách đã đăng ký tài khoản tại <a href="#">www.dinhgiatructuyen.vn</a></label><br>
                                                                                                     <label>Tài khoản đăng nhập:<span style="color: #d9534f;"> 0971621268 </span></label><br>
                                                                                                     <label>Số thẻ của quý khách là:<span style="color: #d9534f;"> 0971621268 </span></label>
                                                                                                     
                                                                                                 </div>
                                                                                            </div>
                                                                                                                                                                                                                                                              
                                                                                            <div class="form-group">
                                                                                              <div class="col-sm-offset-1 col-sm-10">
                                                                                                  <div class="">
                                                                                                      <a class="btn btn-danger btn-flat " id="xacNhanOTP" style="width: 100%;" href="index.html">Bắt đầu sử dụng dịch vụ</a>
                                                                                                      
                                                                                                   </div>
                                                                                                   
                                                                                              </div>   
                                                                                            </div>
                                                                                            
                                                                                            <div class="form-group">
                                                                                              <div class="col-sm-offset-1 col-sm-10">
                                                                                                  <div class="row">
                                                                                                      <div class="col-sm-4"><a href="#">Hướng dẫn </a></div>
                                                                                                      <div class="col-sm-4"><a href="#">Hướng dẫn thanh toán</a></div>
                                                                                                      <div class="col-sm-4"><label>Hotline : 1900 9079</label></div>
                                                                                                   </div>
                                                                                                   
                                                                                              </div>   
                                                                                            </div>

                                                                                            </div>
                                                                                            
                                                                                         	
										</div>
                                    </div>
                                    
                                  </div>

                                </div>
<!--                                 end modal dang ky thanh cong   -->

<!--                                        quên mật khẩu-->
                                        <div class="modal fade" id="modal_quenMatKhau" role="dialog">
                                    <div class="modal-dialog" >

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    
                                    <div class="modal-body">
                                     <div class="popup_button_group form-horizontal">
                                                                                     
                                                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    
<!--                                                                                   <form class="form-horizontal" role="form">-->
                                                                                   <form class="form-horizontal" id="form_quenMatKhau" role="form">    
                                                                                             <div class="form-group">
                                                                                                 <div class="col-sm-10 col-sm-offset-1">
                                                                                                     <h4 class="modal-title" style="font-weight: bolder;">QUÊN MẬT KHẨU TÀI KHOẢN.</h4>
                                                                                                     
                                                                                                    
                                                                                                                                                                                                         
                                                                                                 </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                 <div class="col-sm-10 col-sm-offset-1">
                                                                                                    
                                                                                                     <label>Để lấy lại mật khẩu bạn vui lòng nhập địa chỉ Email hoặc số điện thoại của mình vào đây.</label><br>
                                                                                                                                                                                                         
                                                                                                 </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                             
                                                                                              <div class="col-sm-10 col-sm-offset-1">
                                                                                                <label class="control-label">Email hoặc số điện thoại.</label>
                                                                                               
                                                                                                <input type="text" class="form-control"  id="quenMatKhau_email" name="quenMatKhau_email" placeholder="Email hoặc số điện thoại">
                                                                                                <div class="help-block"></div>
                                                                                              </div>
                                                                                            </div> 
                                                                                            <div class="form-group">
                                                                                             
                                                                                              <div class="col-sm-10 col-sm-offset-1">
                                                                                                <label class="control-label">Captcha.</label>
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-4"><a href="#"><img src="{{ URL::asset('default/images/capchar.png') }}" ></a></div>
                                                                                                      <div class="col-sm-8"><a href="#">
                                                                                                              
                                                                                                              <input type="text" class="form-control" id="quenMatKhau_captCha" name="quenMatKhau_captCha" placeholder="Xác nhận mã"></a></div>
                                                                                                              <div class="help-block"></div>
                                                                                                   </div>
                                                                                              </div>
                                                                                            </div>  
                                                                                            <div class="form-group">
                                                                                              <div class="col-sm-offset-1 col-sm-10">
                                                                                                  <div class="">
                                                                                                      <button class="btn btn-danger btn-flat " id="capLaiMatKhau" style="width: 100%;">Cấp lại mật khẩu</button>
                                                                                                      
                                                                                                   </div>
                                                                                                   
                                                                                              </div>   
                                                                                            </div>
                                                                                            
                                                                                                 </form>

                                                                                            </div>
                                                                                            
                                                                                         	
										</div>
                                    </div>
                                    
                                  </div>

                                </div>  
                                        
<!--                                        end quen mat khẩu-->

<!--                                         doi mat khau mobile-->
                                           <div class="modal fade" id="modal_doiMatKhauMobile" role="dialog">
                                    <div class="modal-dialog" >

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    
                                    <div class="modal-body">
                                     <div class="popup_button_group form-horizontal">
                                                                                     
                                                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    
                                                                                  
                                                                                       <form class="form-horizontal" id="form_doimobile" method="post" action="">
                                                                                             <div class="form-group">
                                                                                                 <div class="col-sm-10 col-sm-offset-1">
                                                                                                     <h4 class="modal-title" style="font-weight: bolder;">ĐỔI MẬT KHẨU</h4>
                                                                                                     
                                                                                                    
                                                                                                                                                                                                         
                                                                                                 </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                 <div class="col-sm-10 col-sm-offset-1">
                                                                                                    
                                                                                                     <label>Mã bảo mật dùng để khôi phục lại mật khẩu đã được gửi đến số điện thoại của bạn, vui lòng kiểm tra SMS .</label><br>
                                                                                                                                                                                                         
                                                                                                 </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                             
                                                                                              <div class="col-sm-10 col-sm-offset-1">
                                                                                                <label class="control-label">Nhập mã OTP</label>
                                                                                                <label class="control-label" style="float: right; color: #5bc0de;">Gửi lại mã OTP</label>
                                                                                                <input type="text" class="form-control"  placeholder="Mã OTP">
                                                                                              </div>
                                                                                            </div>   
                                                                                             <div class="form-group">
                                                                                             
                                                                                              <div class="col-sm-10 col-sm-offset-1">
                                                                                                <label class="control-label">Mật khẩu mới</label>
                                                                                             
                                                                                                <input type="password" class="form-control"  placeholder="Mật khẩu mới">
                                                                                              </div>
                                                                                            </div> 
                                                                                            <div class="form-group">
                                                                                             
                                                                                              <div class="col-sm-10 col-sm-offset-1">
                                                                                                <label class="control-label">Xác nhận mật khẩu mới</label>
                                                                                                
                                                                                                <input type="password" class="form-control"  placeholder="Nhập lại mật khẩu mới.">
                                                                                              </div>
                                                                                            </div> 
                                                                                            <div class="form-group">
                                                                                             
                                                                                              <div class="col-sm-10 col-sm-offset-1">
                                                                                                <label class="control-label">Captcha.</label>
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-4"><a href="#"><img src="{{ URL::asset('default/images/capchar.png') }}" ></a></div>
                                                                                                      <div class="col-sm-8"><a href="#" ><input type="text" class="form-control"  placeholder="Xác nhận mã"></a></div>
                                                                                                     
                                                                                                   </div>
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                              <div class="col-sm-offset-1 col-sm-10">
                                                                                                  <div class="">
                                                                                                      <button class="btn btn-danger btn-flat " id="capLaiMatKhau" style="width: 100%;">Tạo mật khẩu mới</button>
                                                                                                      
                                                                                                   </div>
                                                                                                   
                                                                                              </div>   
                                                                                            </div>
                                                                                            
                                                                                                 </form>

                                                                                            </div>
                                                                                            
                                                                                         	
										</div>
                                    </div>
                                    
                                  </div>

                                </div>  
<!--                                    end doi mat khau mobile-->

                       <!--         khoi phuc mat khẩu qua Email-->
                                          <div class="modal fade" id="modal_RePassEmail" role="dialog">
                                    <div class="modal-dialog" >

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    
                                    <div class="modal-body">
                                     <div class="popup_button_group form-horizontal">
                                                                                     
                                                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    
<!--                                                                                   <form class="form-horizontal" role="form">-->
                                                                                       
                                                                                            <div class="form-group">
                                                                                                 <div class="col-sm-10 col-sm-offset-1">
                                                                                                     <h4 class="modal-title" style="font-weight: bolder;"><img src="{{ URL::asset('default/images/icon_success.png') }}" style="padding-right: 5%; padding-bottom: 5%;">CÀI ĐẶT KHÔI PHỤC MẬT KHẨU.</h4>
                                                                                                     <label>Mã khôi phục mật khẩu đã được gửi tới Email của qúy khách!</label><br>
                                                                                                     <label>Vui lòng <a href="#" id="CapMatKhauQuaMail" >click vào đây để cài đặt lại mật khẩu</a>.</label><br>
                                                                                                    
                                                                                                     
                                                                                                 </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                 <div class="col-sm-10 col-sm-offset-1">
                                                                                                   
                                                                                                     <label>Kiểm tra mục Bulk/Spam nếu bạn không tìm thấy Email trong inbox.</label><br>
                                                                                                     <label>Nếu bạn thấy Email trong mục Bulk/Spam mail. Vui lòng đánh dấu lại Email "Not bulk/spam"</label><br>
                                                                                                     <label></label>
                                                                                                     
                                                                                                 </div>
                                                                                            </div>                                                                                                                                                                  
                                                                                                                                                                                      
                                                                                           
                                                                                            </div>
                                                                                            
                                                                                         	
										</div>
                                    </div>
                                    
                                  </div>

                                </div>
<!--                            end khoi phoi phục qua Email    -->
<!--                            Thong bao kich hoat qua Email-->
                                     <div class="modal fade" id="modal_ThongBaoKHQEmail" role="dialog">
                                    <div class="modal-dialog" >

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    
                                    <div class="modal-body">
                                     <div class="popup_button_group form-horizontal">
                                                                                     
                                                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    
<!--                                                                                   <form class="form-horizontal" role="form">-->
                                                                                       
                                                                                            <div class="form-group">
                                                                                                 <div class="col-sm-10 col-sm-offset-1">
                                                                                                     <h4 class="modal-title" style="font-weight: bolder;"><img src="{{ URL::asset('default/images/icon_success.png') }}" style="padding-right: 5%; padding-bottom: 5%;">KÍCH HOẠT TÀI KHOẢN.</h4>
                                                                                                     <label>Link kich hoạt đã được gửi tới Email của qúy khách!</label><br>
                                                                                                     <label>Vui lòng vào Email kích hoạt tài khoản.</label><br>
                                                                                                    
                                                                                                     
                                                                                                 </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                 <div class="col-sm-10 col-sm-offset-1">
                                                                                                   
                                                                                                     <label>Kiểm tra mục Bulk/Spam nếu bạn không tìm thấy Email trong inbox.</label><br>
                                                                                                     <label>Nếu bạn thấy Email trong mục Bulk/Spam mail. Vui lòng đánh dấu lại Email "Not bulk/spam"</label><br>
                                                                                                     <label></label>
                                                                                                     
                                                                                                 </div>
                                                                                            </div>                                                                                                                                                                  
                                                                                                                                                                                      
                                                                                           
                                                                                            </div>
                                                                                            
                                                                                         	
										</div>
                                    </div>
                                    
                                  </div>

                                </div>
<!--                                end thong bao kich hoat qua Email-->
                                
    <!--                                            doi mat khau tu email-->
                                                   <div class="modal fade" id="modal_MXNhanTuEmail" role="dialog">
                                    <div class="modal-dialog" >

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    
                                    <div class="modal-body">
                                     <div class="popup_button_group form-horizontal">
                                                                                     
                                                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    
                                                                                   <form class="form-horizontal" role="form">
                                                                                       
                                                                                             <div class="form-group">
                                                                                                 <div class="col-sm-10 col-sm-offset-1">
                                                                                                     <h4 class="modal-title" style="font-weight: bolder;">ĐỔI MẬT KHẨU</h4>
                                                                                                     
                                                                                                    
                                                                                                                                                                                                         
                                                                                                 </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                 <div class="col-sm-10 col-sm-offset-1">
                                                                                                    
                                                                                                     <label>Mã xác nhận đã được gửi tới Email quý khách. Vui lòng nhập mã xác nhận và mật khẩu mới.</label><br>
                                                                                                                                                                                                         
                                                                                                 </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                             
                                                                                              <div class="col-sm-10 col-sm-offset-1">
                                                                                                <label class="control-label">Mã xác nhận</label>
                                                                                               
                                                                                                <input type="text" class="form-control"  placeholder="Mã xác nhận">
                                                                                              </div>
                                                                                            </div>   
                                                                                             <div class="form-group">
                                                                                             
                                                                                              <div class="col-sm-10 col-sm-offset-1">
                                                                                                <label class="control-label">Mật khẩu mới</label>
                                                                                             
                                                                                                <input type="password" class="form-control"  placeholder="Mật khẩu mới">
                                                                                              </div>
                                                                                            </div> 
                                                                                            <div class="form-group">
                                                                                             
                                                                                              <div class="col-sm-10 col-sm-offset-1">
                                                                                                <label class="control-label">Xác nhận mật khẩu mới</label>
                                                                                                
                                                                                                <input type="password" class="form-control"  placeholder="Nhập lại mật khẩu mới.">
                                                                                              </div>
                                                                                            </div> 
                                                                                            <div class="form-group">
                                                                                             
                                                                                              <div class="col-sm-10 col-sm-offset-1">
                                                                                                <label class="control-label">Captcha.</label>
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-4"><a href="#"><img src="{{ URL::asset('default/images/capchar.png') }}" ></a></div>
                                                                                                      <div class="col-sm-8"><a href="#"><input type="text" class="form-control"  placeholder="Xác nhận mã"></a></div>
                                                                                                     
                                                                                                   </div>
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                              <div class="col-sm-offset-1 col-sm-10">
                                                                                                  <div class="">
                                                                                                      <button class="btn btn-danger btn-flat " id="capLaiMatKhau" style="width: 100%;">Tạo mật khẩu mới</button>
                                                                                                      
                                                                                                   </div>
                                                                                                   
                                                                                              </div>   
                                                                                            </div>
                                                                                            
                                                                                                 </form>

                                                                                            </div>
                                                                                            
                                                                                         	
										</div>
                                    </div>
                                    
                                  </div>

                                </div>  
<!--                                                end doi mat khau tu Email-->
                              
                
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
		
		{{ HTML::script('default/js/zjs/z.min.js') }}
		{{ HTML::script('default/js/jquery.accordion.js') }}
		{{ HTML::script('default/js/cenvalue.js') }}
		{{ HTML::script('default/js/custom.js') }}
	</body>
</html>