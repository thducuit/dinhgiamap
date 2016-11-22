@extends('default.layouts.default')
@section('content')

<!--
/*==============================*\
MAIN 
/*==============================*\
-->
<div id="main" class="screen">
	<div class="main_wrapper">
		
		<div class="page_thanhtoan_wrapper clearfix">
			<div class="page_thanhtoan_left screen"></div>
			<div class="page_thanhtoan_right">
				<div class="page_thanhtoan_right_inner">
				    
					<div class="thanhtoan_body clearfix thanhtoan_body_step1">
						<div class="thanhtoan_left">

							<!--.errors-->
        				    @if( $errors->has() )
        				    <div class="row errors">
        				        <div class="col-md-12">
        			                @foreach( $errors->all() as $error )
        			                <p class='error'>{{ $error }} </p>
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
        							  <strong><p class='error'>{{ Session::get('message') }}</p></strong>
        							</div>
        					    </div>
        					</div>
        				    @endif
        				    <!--/.alert-->

							<div class="thanhtoan_left_inner register">
							    
							    {{ Form::open(array('url'=>'login', 'method'=>'post')) }}
								<div class="form_group">
									<div class="form_group_header">
										<span>Đăng nhập</span>
									</div>
									<div class="form_group_body clearfix">
										<div class="form_group form_field field_goidichvu">
										    <label for="email">Email</label>
											<input type="text" name="email" id="goidichvu_thanhtoan_dichvudinhgia" value="">
										</div>
										<div class="clearfix"></div>
										<div class="form_group form_field field_goidichvu">
											<label for="password">Mật khẩu</label>
											<input type="password" name="password" id="goidichvu_thanhtoan_xemquihoach" value="">
										</div>
										
										<div class="form_field field_btn_tieptuc">
											<button type="submit" class="btn btn_tieptuc">Đăng nhập</button>
										</div>
									</div>
								</div>
								{{ Form::close() }}
								
								{{ Form::open( array('url' => 'register', 'method' => 'post') ) }}
								<div class="form_group">
									<div class="form_group_header">
										<span>Đăng kí</span>
									</div>
									<div class="form_group_body clearfix">
									    <div class="form_group form_field field_goidichvu">
										    <label for="name">Học và tên</label>
											<input type="text" name="name" id="goidichvu_thanhtoan_dichvudinhgia" value="{{ Input::old('name') }}">
										</div>
										<div class="clearfix"></div>
										<div class="form_group form_field field_goidichvu">
										    <label for="email">Email</label>
											<input type="text" name="email" id="goidichvu_thanhtoan_dichvudinhgia" value="{{ Input::old('email') }}">
										</div>
										<div class="clearfix"></div>
										<div class="form_group form_field field_goidichvu">
											<label for="password">Mật khẩu</label>
											<input type="password" name="password" id="goidichvu_thanhtoan_xemquihoach" value="">
										</div>
										<div class="clearfix"></div>
										<div class="form_group form_field field_goidichvu">
											<label for="password_confirmation">Nhập lại mật khẩu</label>
											<input type="password" name="password_confirmation" id="goidichvu_thanhtoan_xemquihoach" value="">
										</div>
										<div class="clearfix"></div>
										<div class="form_group form_field field_goidichvu">
											<label for="gender">Giới tính</label>
											<input type="radio" name="gender" checked value="1"> Nam<br>
											<input type="radio" name="gender" value="0"> Nữ<br>
										</div>
										<div class="clearfix"></div>
										<div class="form_group form_field field_goidichvu">
											<label for="bday">Ngày sinh</label>
											<input type="text" name="bday" id="bday" value="{{ Input::old('bday') }}">
											<script>
											  jQuery( function() {
											    jQuery( "#bday" ).datepicker({
											    	dateFormat: "dd/mm/yy"
											    });
											  });
											  </script>
										</div>
										<div class="clearfix"></div>
										<div class="form_group form_field field_goidichvu">
											<label for="phone">Điện thoại bàn</label>
											<input type="text" name="phone" id="goidichvu_thanhtoan_xemquihoach" value="{{ Input::old('phone') }}">
										</div>
										<div class="clearfix"></div>
										<div class="form_group form_field field_goidichvu">
											<label for="mobile">Điện thoại di động</label>
											<input type="text" name="mobile" id="goidichvu_thanhtoan_xemquihoach" value="{{ Input::old('mobile') }}">
										</div>
										<div class="clearfix"></div>
										<div class="form_group form_field field_goidichvu">
											<label for="province">Tỉnh/Thành phố</label>
											{{ Form::select('province', Province::getOptions(), Input::old('province'), ['class'=>'province', 'id'=>'province']) }}
										</div>
										<div class="clearfix"></div>
										<div class="form_group form_field field_goidichvu">
											<label for="district">Quận/Huyện</label>
											{{ Form::select('district', District::getOptions(), Input::old('district'), ['class'=>'district', 'id'=>'district']) }}
										</div>
										<div class="clearfix"></div>
										<div class="form_group form_field field_goidichvu">
											<label for="address">Địa chỉ</label>
											<input type="text" name="address" id="goidichvu_thanhtoan_xemquihoach" value="{{ Input::old('address') }}">
										</div>
										<div class="clearfix"></div>
										<div class="form_group form_field field_goidichvu">
											<label for="note">Mô tả</label>
											<input type="text" name="note" id="goidichvu_thanhtoan_xemquihoach" value="{{ Input::old('note') }}">
										</div>
										
										<div class="form_field field_btn_tieptuc">
											<button class="btn btn_tieptuc">Đăng kí</button>
										</div>
									</div>
								</div>
								{{ Form::close() }}
							</div>
						</div>
						<div class="thanhtoan_right">
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
@endsection