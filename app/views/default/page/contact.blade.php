@extends('default.layouts.default')
@section('content')

<!--
/*==============================*\
MAIN 
/*==============================*\
-->
<div id="main" class="screen">
	<div class="main_wrapper">
		
		<div class="page_contact_wrapper clearfix">
			<div class="page_contact_left screen"></div>
			<div class="page_contact_right">
				<div class="page_contact_right_inner">
					
					<div class="page_contact_sidelink">
						<a class="current" href="{{ URL::to('/contact') }}">Liên hệ tư vấn</a>
						<a href="{{ URL::to('/question') }}">Câu hỏi thường gặp</a>
					</div>
					
					<div class="block_contact_address clearfix">
						<div class="block_contact_address_left">
							<div class="contact_item">
								<div class="contact_item_header">Địa Chỉ:</div>
								<div class="contact_item_body">
									<p>TP.HCM : 36 Bùi Thị Xuân,<br>
									Phường Bến Thành, Quận 1, TP.HCM</p>
									<p>HÀ NỘI : Tầng 20,Tòa nhà 319 Bộ Quốc phòng,<br>
									63 Lê Văn Lương, Trung Hòa, Cầu Giấy, Hà Nội</p>
								</div>
							</div>
						</div>
						<div class="block_contact_address_right clearfix">
							<div class="clearfix">
								<div class="contact_item">
									<div class="contact_item_header">Điện thoại:</div>
									<div class="contact_item_body">
										<p>(08) 39 256 973<br>
										(04) 32222.786</p>												
									</div>
								</div>
								<div class="contact_item">
									<div class="contact_item_header">Email liên hệ hỗ trợ:</div>
									<div class="contact_item_body">
										<p>hi@cenvalue.vn  </p>												
									</div>
								</div>
							</div>
							<div class="clearfix">
								<div class="contact_item">
									<div class="contact_item_header">Hotline:</div>
									<div class="contact_item_body">
										<p>1900 9079</p>												
									</div>
								</div>
								<div class="contact_item">
									<div class="contact_item_header">Website:</div>
									<div class="contact_item_body">
										<p>dinhgiatructuyen.vn</p>												
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="block_contact_form clearfix">
						<p><em>“Chuyên viên chúng tôi luôn sẵn sàng tư vấn & phục vụ quí khách hàng nhằm đem lại trải nghiệm dịch vụ tốt nhất, rất mong nhận được phản hồi và đóng góp ý kiến từ quí khách hàng.”</em></p>
						<p>Vui lòng nhập thông tin của bạn để nhận tư vấn</p>
						<!--.errors-->
					    @if( $errors->has() )
					    <div class="row">
					        <div class="col-md-12">
				                @foreach( $errors->all() as $error )
				                <p>{{ $error }} </p>
				        		@endforeach
							</div>
					    </div>
					    @endif
						<!--/.errors-->
						
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
	    
						<div class="block_contact_form_left">
							{{ Form::open( array( 'url'=>'/contact/add', 'method'=>'post' ) ) }}
								<div class="form_group clearfix">
									<div class="form_label">Tên</div>
									<div class="form_field">
										<input type="text" id="hoten" name="name" value="">
									</div>
								</div>
								<div class="form_group clearfix">
									<div class="form_label">Số điện thoại</div>
									<div class="form_field">
										<input type="text" id="sodienthoai" name="phone" value="">
									</div>
								</div>
								<div class="form_group clearfix">
									<div class="form_label">Địa chỉ email</div>
									<div class="form_field">
										<input type="email" id="diachiemail" name="email"  value="">
									</div>
								</div>
								<div class="form_group clearfix">
									<div class="form_label">Tiêu đề</div>
									<div class="form_field">
										<input type="text" id="tieude" name="title" value="">
									</div>
								</div>
								<div class="form_group clearfix">
									<div class="form_label">Câu hỏi</div>
									<div class="form_field">
										<textarea name="content" rows="5"></textarea>
									</div>
								</div>
								<div class="form_group clearfix">
									<button type="submit" class="btn btn_gradient_yellow btn_submit_contact">Gửi thông tin</button>
								</div>
							{{ Form::close() }}
						</div>
						<div class="block_contact_form_right">
							<div class="contact_item">
								<div class="contact_item_header">Báo chí, hợp tác:</div>
								<div class="contact_item_body">
									<p>baochi@cenvalue.vn</p>												
								</div>
							</div>
							<div class="contact_item">
								<div class="contact_item_header">Tổng đài tư vấn,<br>hỗ trợ khách hàng (7h30 đến 22h):</div>
								<div class="contact_item_body">
									<p>1900.9079</p>												
								</div>
							</div>
							<div class="contact_item">
								<div class="contact_item_header">Email:</div>
								<div class="contact_item_body">
									<p>hi@cenvalue.vn</p>												
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>

@endsection