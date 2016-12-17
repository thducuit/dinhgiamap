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
							<input class="input_text cen-address-text" type="text" name="address" value="{{ $address }}" id="google-map-autocomplete" placeholder="Nhập địa chỉ tài sản để định giá">
							<input class="input_text" name="placeId" id="placeId" type="hidden" value="{{ $placeId }}" >
						</div>
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
		
					
		
		
		
	</div>
	
	{{ HTML::script('default/js/map.js') }}
	<!-- {{ HTML::style('default/css/custom.css') }} -->
</div>
@endsection