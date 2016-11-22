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
				{{ Form::open(array('url'=>'/customer/update', 'method'=>'post')) }}
				<div class="profile_right_inner">
					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Họ và tên</strong></span>
						</div>
						<div class="profile_info_col">
							<input type="text" name="name" value="{{ $customer->name }}">
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
							<span><strong>Ngày sinh</strong></span>
						</div>
						<div class="profile_info_col">
							<input type="text" name="bday" id="bday" value="{{ $customer->bday }}">
							<script>
							  jQuery( function() {
							    jQuery( "#bday" ).datepicker({
							    	dateFormat: "dd/mm/yy"
							    });
							  } );
							  </script>
						</div>
					</div>
					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Điện thoại di động</strong></span>
						</div>
						<div class="profile_info_col">
							<input type="text" name="mobile" id="dienthoaididong" value="{{ $customer->mobile }}">
						</div>
					</div>
					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Điện thoại bàn</strong></span>
						</div>
						<div class="profile_info_col">
							<input type="text" name="phone" id="dienthoaiban" value="{{ $customer->phone }}">
						</div>
					</div>
					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Tỉnh / Thành phố</strong></span>
						</div>
						<div class="profile_info_col">
							{{ Form::select('province', Province::getOptions(), $customer->province_id, ['class'=>'province', 'id'=>'province']) }}
						</div>
					</div>
					<div class="profile_info_row clearfix">
						<div class="profile_info_col">
							<span><strong>Quận / Huyện</strong></span>
						</div>
						<div class="profile_info_col">
							{{ Form::select('district', District::getOptions(), $customer->district_id, ['class'=>'district', 'id'=>'district']) }}
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
							<span><strong>Mô tả</strong></span>
						</div>
						<div class="profile_info_col">
							<input type="text" name="note" id="mota" value="{{ $customer->note }}">
						</div>
					</div>
					
					<div class="button_group">
						<button type="submit" class="btn_edit2" ><i class="icon_edit2"></i><span>Hoàn Tất</span></button>
					</div>
				</div>
				{{ Form::close() }}
			</div>
		</div>
		
	</div>
</div>
{{ HTML::style('default/css/custom.css') }}
@endsection