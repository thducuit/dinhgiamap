
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
							<input class="input_text" type="text" name="address" id="google-map-autocomplete" placeholder="Nhập địa chỉ tài sản để định giá">
							<input type="text" class="input_text" id="placeId" name="placeId">
						</div>
						<!--<div class="form_group form_group_input_select">-->
						<!--<select name="type" class="input_select">-->
						<!--	<option>Căn hộ</option>-->
						<!--	<option>Nhà nguyên căn</option>-->
						<!--	<option>Biệt thự</option>-->
						<!--	<option>Đất nền</option>-->
						<!--</select>-->
						<!--</div>-->
						<div class="form_group form_group_submit">
							<input class="input_submit search-view" type="submit" value="Tìm kiếm">
						</div>
					{{ Form::close() }}
				</div>
			</div>		
		</div>		

		<!--
		MAP VIEW
		-->
		<div id="map_view" class="screen"></div>	
		{{ HTML::script('default/js/view.js') }}
	</div>
</div>
@endsection