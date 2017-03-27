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
			<div class="profile_right">
				<div class="profile_right_inner">
					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Loại Tài khoản:</strong></span>
						</div>
						<div class="profile_info_col">
							<span>Công ty</span>
						</div>
					</div>
                    <div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Tên công ty:</strong></span>
						</div>
						<div class="profile_info_col">
							<span>Công ty TNHH</span>
						</div>
					</div>
                    <div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Địa chỉ/Chi nhánh:</strong></span>
						</div>
						<div class="profile_info_col">
							<span>Thông tin địa chỉ</span>
						</div>
					</div>
                    <div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Điện thoại:</strong></span>
						</div>
						<div class="profile_info_col">
							<span>{{ $customer->mobile }}</span>
						</div>
					</div>
                    <div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Email:</strong></span>
						</div>
						<div class="profile_info_col">
							<span>{{ $customer->email }}</span>
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
							<span>{{ $customer->email }}</span>
						</div>
					</div>
					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Họ tên</strong></span>
						</div>
						<div class="profile_info_col">
							<span>{{ $customer->name }}</span>
						</div>
					</div>
                    <div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Điện thoại</strong></span>
						</div>
						<div class="profile_info_col">
							<span>{{ $customer->mobile }}</span>
						</div>
					</div>
                    <div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Chức vụ:</strong></span>
						</div>
						<div class="profile_info_col">
							<span>Thông tin chức vụ</span>
						</div>
					</div>
                                                
					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Địa chỉ</strong></span>
						</div>
						<div class="profile_info_col">
							<span>{{ $customer->address }}</span>
						</div>
					</div>
                    <div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Giới tính</strong></span>
						</div>
						<div class="profile_info_col">
							<span>{{ $customer->sex == 1 ? 'Nam' : 'Nữ' }}</span>
						</div>
					</div>
					
					
					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Ngày sinh:</strong></span>
						</div>
						<div class="profile_info_col">
							<span><?php echo date('d-m-Y', strtotime($customer->bday))?></span>
						</div>
					</div>
					
					
					
					
					<div class="button_group">
						<a class="btn_edit2" href="{{ URL::to('/customer/update') }}"><i class="icon_edit2"></i><span>Chỉnh sửa</span></a>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
{{ HTML::style('default/css/custom.css') }}
@endsection