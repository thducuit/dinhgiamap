
@extends('default.layouts.default')
@section('content')
<!--
/*==============================*\
MAIN 
/*==============================*\
-->
<div id="main" class="screen landing-page">
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
							<input class="input_text cen-address-text" type="text" name="address" id="google-map-autocomplete" placeholder="Nhập địa chỉ tài sản để định giá">
							<input type="hidden" class="input_text place-id" name="placeId" id="placeId">
						</div>
						<div class="form_group form_group_submit">
<!--							<input class="input_submit search-view" type="submit" value="Tìm kiếm">-->
                          <input class="search-view" type="submit" value="Tìm kiếm">
						</div>
					{{ Form::close() }}
				</div>
			</div>
            <div class="list-item-marker">
              <ul></ul>
            </div>
            <div class="box-current-position">
              <a class="btn-get-current-position cursor"><img src="{{ URL::asset('default/images/logo_icon2.png') }}"/></a>
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