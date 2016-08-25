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
							<input class="input_text" type="text" name="address" value="" id="google-map-autocomplete" placeholder="Nhập địa chỉ tài sản để định giá">
							<input class="input_text" name="placeId" id="placeId" type="hidden" value="" >
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
					<input type="hidden" class="lat" value="{{ $lat }}">
					<input type="hidden" class="lng" value="{{ $lng }}">
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
		<!--<div class="popup_map_wrapper none">-->
		<!--	<div class="popup_map">-->
		<!--		<div class="popup_map_inner clearfix">-->
		<!--			<div class="popup_left">-->
		<!--				<div class="property_title">Bán nhà phố Quận 2</div>-->
		<!--				<div class="property_address">Khu vực: Quận 2, TP.Hồ Chí Minh</div>-->
		<!--				<div class="property_info_row clearfix">-->
		<!--					<div class="property_info_left">Diện tích đất</div>-->
		<!--					<div class="property_info_right">200m<sup>2</sup></div>-->
		<!--				</div>-->
		<!--				<div class="property_info_row clearfix">-->
		<!--					<div class="property_info_left">Diện tích sử dụng</div>-->
		<!--					<div class="property_info_right">400m<sup>2</sup></div>-->
		<!--				</div>-->
		<!--				<div class="property_info_row clearfix">-->
		<!--					<div class="property_info_left">Giá rao bán</div>-->
		<!--					<div class="property_info_right">2.8 tỷ</div>-->
		<!--				</div>-->
		<!--			</div>-->
		<!--			<div class="popup_right">-->
		<!--				<div class="property_thumbbnail" style="background: url(images/hinh_taisancungdongia_35823583.png) center no-repeat; background-size: cover;"></div>-->
		<!--				<div class="popup_button_group">-->
		<!--					<a href="#"><div class="btn btn_icon btn_gradient4"><i class="icon_cungdongia"></i><span>Xem chi tiết</span></div></a>-->
		<!--				</div>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--		<button class="btn_close_popup"></button>-->
		<!--	</div>-->
		<!--</div>-->
		
	</div>
	
	{{ HTML::script('default/js/price.js') }}
	{{ HTML::style('default/css/custom.css') }}
</div>
@endsection