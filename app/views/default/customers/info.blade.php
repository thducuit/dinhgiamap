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
							<div class="profile_avatar"></div>
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
						<li><a href="{{ URL::to('/customer/history') }}">Lịch sử giao dịch</a></li>
						<li><a href="#">Hướng dẫn sử dụng</a></li>
					</ul>
				</div>
			</div>
			<div class="profile_right">
				<!--.alert-->
				@if( Session::get('message') )
				<div class="row">
				    <div class="col-md-12">
				    	<div class="alert">
						  <strong>{{ Session::get('message') }}</strong>
						</div>
				    </div>
				</div>
			    @endif
			    <!--/.alert-->
				<div class="profile_right_inner">
					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Họ & Tên</strong></span>
						</div>
						<div class="profile_info_col">
							<span>{{ $customer->name }}</span>
						</div>
					</div>
					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Tên đăng nhập</strong></span>
						</div>
						<div class="profile_info_col">
							<span>{{ $customer->email }}</span>
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
							<span><strong>Ngày sinh</strong></span>
						</div>
						<div class="profile_info_col">
                          <span><?php echo date('d-m-Y', strtotime($customer->bday))?></span>
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
<!--					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Điện thoại bàn</strong></span>
						</div>
						<div class="profile_info_col">
							<span>{{ $customer->phone }}</span>
						</div>
					</div>
-->
                    <?php if($customer->province_id){?>
					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Tỉnh / Thành phố</strong></span>
						</div>
						<div class="profile_info_col">
							<span>{{ Province::name($customer->province_id) }}</span>
						</div>
					</div>
                    <?php }?>

                    <?php if($customer->district_id){?>
					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Quận / Huyện</strong></span>
						</div>
						<div class="profile_info_col">
							<span>{{ District::name($customer->district_id) }}</span>
						</div>
					</div>
                    <?php }?>
					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Địa chỉ</strong></span>
						</div>
						<div class="profile_info_col">
							<span>{{ $customer->address }}</span>
						</div>
					</div>
                    <?php if($customer->note){?>
					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Mô tả</strong></span>
						</div>
						<div class="profile_info_col">
							<span>{{ $customer->note }}</span>
						</div>
					</div>
                    <?php }?>
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