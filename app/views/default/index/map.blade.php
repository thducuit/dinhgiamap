@extends('default.layouts.default')
@section('content')

<!--
/*==============================*\
MAIN 
/*==============================*\
-->
<div id="main" class="screen">
	<div class="main_wrapper">
		
		<div class="block_overlay">
			<!--
			SEARCH BOX
			-->
			<div id="search_box">
				<div class="search_box_inner">
					{{ Form::open( array('url' => 'search', 'method' => 'get', 'class' => 'clearfix google-map-search-form') ) }}
						<div class="form_group form_group_icon_location"><i class="icon_location"></i></div>
						<div class="form_group form_group_input_text">
							<input class="input_text" type="text" name="address" value="{{ $address }}" id="google-map-autocomplete" placeholder="Nhập địa chỉ tài sản để định giá">
							<input class="input_text" name="placeId" id="placeId" type="hidden" value="{{ $placeId }}" >
						</div>
						<!--<div class="form_group form_group_input_select">-->
						<!--<select class="input_select">-->
						<!--	<option>Căn hộ</option>-->
						<!--	<option>Nhà nguyên căn</option>-->
						<!--	<option>Biệt thự</option>-->
						<!--	<option>Đất nền</option>-->
						<!--</select>-->
						<!--</div>-->
						<div class="form_group form_group_submit">
							<input class="input_submit" type="submit" value="Tìm kiếm">
						</div>
					{{ Form::close() }}
				</div>
			</div>		
		</div>		

		<!--
		MAP VIEW
		-->
		<div id="map_view" class="screen"></div>
		
					
		<!--
		POPUP
		-->
		<div id="dgtt_popup" class="popup_middle_wrapper popup_dongiathitruong none">
			<div class="popup_middle">
				<div class="popup_middle_inner clearfix">
					
					<div class="popup_middle_header clearfix">
						<span>Đơn giá thị trường</span>			
					</div>
					<div class="popup_middle_body">
						<div class="dongia_row">
							<p><strong>Địa chỉ</strong><br>
							<span id="dgtt_popup_address">
								68 Hai Bà Trưng Phường Bến Nghé, Quận 1,<br>
								Đoạn  Cao Bá Quát - Nguyễn Thị Minh Khai
							</span></p>
						</div>
						<div class="clearfix">
							<div class="dongia_row dongia_row50">
								<p><strong>Đơn giá đất thị trường đề xuất</strong></p>
								<p class="dongia_highlight"><span class="dongia_highlight_left">350,000,000</span> (VNĐ/M2)</p>
							</div>
							<div class="dongia_row dongia_row50">
								<p><strong>Đơn giá đất nhà nước</strong></p>
								<p class="dongia_highlight"><span class="dongia_highlight_right">350,000,000</span> (VNĐ/M2)</p>
							</div>
						</div>
						<div class="dongia_row clearfix">
							<div class="popup_button_group">
								<div id="btn_dinhgia" class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></div>
								<div id="btn_close"  class="btn btn_icon btn_gradient2"><span>Đóng lại</span></div>
							</div>
						</div>									
					</div>								
				</div>
			</div>
		</div>
		
		
	</div>
	
	{{ HTML::script('default/js/map.js') }}
	{{ HTML::style('default/css/custom.css') }}
</div>
@endsection