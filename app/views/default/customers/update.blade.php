@extends('default.layouts.default')
@section('content')
<!--
/*==============================*\
MAIN 
/*==============================*\
-->
<div id="main" class="minscreen">
	<div class="main_wrapper">
		
		<div class="profile_wrapper clearfix">
			<div class="profile_left">
				<div class="clearfix">
					<div class="profile_info_wrapper">
						<div class="profile_avatar_wrapper">
							<div class="profile_avatar" style="background: url(images/icon_camera.png) center no-repeat; background-size: cover;"></div>
						</div>
						<div class="profile_name">
							<span>{{ $customer->name }}</span>
						</div>								
					</div>
					<div class="profile_info_wrapper">
						<p class="sotien">Số tiền: <strong>{{ number_format($customer->account) }} VNĐ</strong></p>
						<button type="button" class="btn btn_gradient_yellow btn_naptien">Nạp tiền</button>
					</div>
				</div>
				<div class="profile_menu">
					<ul>
						<li class="current"><a href="{{ URL::to('/customer/info') }}">Thông tin tài khoản</a></li>
						<li><a href="#">Lịch sử giao dịch</a></li>
						<li><a href="{{ URL::to('/customer/history') }}">Xem tài sản đã định giá</a></li>
					</ul>
				</div>
			</div>
			<!--.errors-->
		    @if( $errors->has() )
		    <div class="row the-error">
		        <div class="col-md-12">
	                @foreach( $errors->all() as $error )
	                <p>{{ $error }} </p>
	        		@endforeach
				</div>
		    </div>
		    @endif
			<!--/.errors-->
			{{ Form::open(array('url'=>'/customer/update', 'method'=>'post')
			<div class="profile_right">
				<div class="profile_right_inner">
                                                
                    <div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Loại Tài khoản:</strong></span>
						</div>
						<div class="profile_info_col">
							<div class="checkbox">
								<label>
									<input type="radio" name="customer_type" checked='{{ $customer->sex == 0 ? true:false }}' id="loaiTK" value="1">
                                    Môi giới/Cá nhân
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="radio" name="customer_type" checked='{{ $customer->sex == 0 ? true:false }}'  id="loaiTK" value="0">
									Công ty
								</label>
							</div>
						</div>
					</div>
                                                
                    <div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Tên công ty:</strong></span>
						</div>
						<div class="profile_info_col">
							<input type="text" id="tenDangNhap" name="company" value="{{ $customer->company }}">
						</div>
					</div>
                                                
                    <div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Địa chỉ/Chi nhánh:</strong></span>
						</div>
						<div class="profile_info_col">
							<input type="text" id="tenDangNhap" name="company_address" value="{{ $customer->company_address }}">
						</div>
					</div>
                                                
                    <div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Điện thoại:</strong></span>
						</div>
						<div class="profile_info_col">
							<input type="text" id="tenDangNhap" name="company_phone" value="{{ $customer->phone }}">
						</div>
					</div>
                    <div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Email:</strong></span>
						</div>
						<div class="profile_info_col">
							<input type="text" id="tenDangNhap" name="company_email" value="{{ $customer->email }}">
						</div>
					</div>
                                                
                    <div class="profile_info_row clearfix">
                        <hr style="border-top: 1px solid #111010;">
                    </div>
                                                
                    <div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Tên đăng nhập:</strong></span>
						</div>
						<div class="profile_info_col">
							<input type="text" id="tenDangNhap" name="email" value="{{ $customer->email }}">
						</div>
					</div>
                                                
                    <div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Họ và tên</strong></span>
						</div>
						<div class="profile_info_col">
							<input type="text" name="name" id="hoten" value="{{ $customer->name }}">
						</div>
					</div>
                    <div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Điện thoại</strong></span>
						</div>
						<div class="profile_info_col">
							<input type="text" name="mobile" id="dienthoaididong" value="{{ $customer->mobile }}">
						</div>
					</div>																							
					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Địa chỉ</strong></span>
						</div>
						<div class="profile_info_col">
							<input type="text" name="address" id="diachi" value="{{ $customer->address }}">
						</div>
					</div>								
					
					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Giới tính</strong></span>
						</div>
						<div class="profile_info_col">
							<div class="checkbox">
								<label>
								<input type="radio" name="gender" checked='{{ $customer->sex == 0 ? true:false }}' id="gioitinh_nam" value="">
								Nam
								</label>
							</div>
							<div class="checkbox">
								<label>
								<input type="radio" name="gender" checked='{{ $customer->sex == 1 ? true:false }}' id="gioitinh_nu" value="">
								Nữ
								</label>
							</div>
						</div>
					</div>
					
					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Ngày sinh:</strong></span>
						</div>
						<div class="profile_info_col">
							<div class="row">
								<?php 
								$day = date('d', strtotime($customer->bday));
								$month = date('m', strtotime($customer->bday));
								$year = date('Y', strtotime($customer->bday));                          
								?>                       
								<div class="form_col col-md-4">
								  <select name="d_ngaySinh">
								    <option value="">Ngày</option>
								    <?php 
								    for($i = 1; $i <= 31; $i++){
								      ?>
								      <option <?php if($day==$i)echo 'selected'?> value="<?php echo $i?>"><?php echo $i?></option>
								      <?php
								    }
								    ?>
								  </select>
								</div>
								<div class="form_col col-md-4">
								  <select name="m_ngaySinh">
								    <option value="">Tháng</option>
								    <?php 
								    for($i = 1; $i <= 12; $i++){
								      ?>
								      <option <?php if($month==$i)echo 'selected'?> value="<?php echo $i?>"><?php echo $i?></option>
								      <?php
								    }
								    ?>
								  </select>
								</div>
								<div class="form_col col-md-4">
								  <select name="y_ngaySinh">
								    <option value="">Năm</option>
								    <?php 
								    for($i = 1916; $i <= 1998; $i++){
								      ?>
								      <option <?php if($year==$i)echo 'selected'?> value="<?php echo $i?>"><?php echo $i?></option>
								      <?php
								    }
								    ?>
								  </select>
								</div>
							</div>
						</div>
					</div>	
					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							 <a class="btn btn-danger btn-flat " id="DoiMK" style="width: 100%;" data-toggle="modal" data-target="#modal_doiMatKhau">Đổi mật khẩu.</a>
						</div>
						<div class="profile_info_col">
							
						</div>
					</div>	
					<div class="button_group">
                                                           
						<button type="submit" class="btn_edit2" ><i class="icon_edit2"></i><span>Hoàn Tất</span></button>
					</div>
				</div>
			</div>
			{{ Form::close() }}
		</div>
		
	</div>
</div>

{{ HTML::style('default/css/custom.css') }}
@endsection