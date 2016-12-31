@extends('default.layouts.default')
@section('content')

<!--
/*==============================*\
MAIN 
/*==============================*\
-->
<div id="main" class="screen">
	<div class="main_wrapper">
		
		<div class="page_xemquihoach_wrapper clearfix">
			<div class="page_xemquihoach_left screen"></div>
			<div class="page_xemquihoach_right">
				<div class="page_xemquihoach_right_inner">
					<div class="xemquihoach_header">
						<p><strong>xem quy hoạch 1 địa điểm tài sản</strong></p>
						<p>(Chọn lựa các thông tin bên dưới để xem qui hoạch)</p>
					</div>
					{{ Form::open(array('url'=>'/xem-quy-hoach.html', 'method'=>'post')) }}
					<!--.errors-->
					@if( $errors->has() )
					<div class="row the-error">
					<div class="col-md-12">
					  @foreach( $errors->all() as $error )
					  <p class="error">{{ $error }} </p>
					  @endforeach
					</div>
					</div>
					@endif
					<!--/.errors-->
					<!-- Filter -->
					<div class="filter_group clearfix">
						<div class="filter_col">
							<label>Tỉnh/Thành Phố</label>
							{{ Form::select('province_id', Province::getOptions(), Input::old('province_id'), ['class'=>'province_id']) }}
						</div>
						<div class="filter_col">
							<label>Quận/Huyện</label>
							<select name="district_id"  class="district_id">
								<option>Quận/Huyện</option>
							</select>
							<input type="hidden" id="district_id" class="form-control" value="{{ Input::old('district_id') }}">
						</div>
						<div class="filter_col">
							<label>Phường/Xã</label>
							<select name="ward_id"  class="ward_id">
								<option>Phường/Xã</option>
							</select>
							<input type="hidden" id="ward_id" class="form-control" value="{{ Input::old('ward_id') }}">
						</div>
						<div class="filter_col">
							<label>Phân loại</label>
							<select>
								<option>Số thửa</option>
								<option>Số tờ</option>
							</select>
						</div>
						<div class="filter_col">
							<label></label>
							<input type="text" placeholder="Nhập số thửa" value="">
						</div>
						<div class="filter_col">
							<div class="popup_button_group">
								<button type="submit" id="btn_submit_xem_qui_hoach" class="btn btn_icon btn_gradient2"><i class="icon_xemquihoach"></i><span>Xem qui hoạch</span></button>                               
							</div>
						</div>
                      <div class="filter_col">                        
                         <a href="{{ URL::to('/tai-san-dang-giao-dich.html') }}" class="btn btn_icon btn_gradient4"><i class="icon_xemquihoach"></i><span>Tài sản đang giao dịch</span></a>                        
                      </div>
					</div>
					{{ Form::close() }}

					<!-- Map -->
					<div id="map_xemquihoach">
						<div class="map_xemquihoach_inner">
							<div id="map_photo" style="height: 410px"></div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
	</div>
</div>
{{ HTML::script('admin/js/custom/province.js') }} 
<script>
  // var layer;
  // function init() {
  //   var mapMinZoom = 0;
  //   var mapMaxZoom = 7;
  //   var map = L.map('map', {
  //     maxZoom: mapMaxZoom,
  //     minZoom: mapMinZoom,
  //     crs: L.CRS.Simple
  //   }).setView([0, 0], mapMaxZoom);
    
  //   var mapBounds = new L.LatLngBounds(
  //       map.unproject([0, 19968], mapMaxZoom),
  //       map.unproject([28160, 0], mapMaxZoom));
        
  //   map.fitBounds(mapBounds);
  //   layer = L.tileLayer('{z}/{x}/{y}.png', {
  //     minZoom: mapMinZoom, maxZoom: mapMaxZoom,
  //     bounds: mapBounds,
  //     attribution: 'Rendered with <a href="http://www.maptiler.com/">MapTiler</a>',
  //     noWrap: true,
  //     tms: false
  //   }).addTo(map);
  // }
</script>
@if( Session::get('name') )
<script>
	var mapMinZoom = 0;
	var mapMaxZoom = 7;
    var map = L.map('map_photo', {
		minZoom: mapMinZoom,
		maxZoom: mapMaxZoom
    }).setView([0, 0], 3);

    L.tileLayer('/public/plans/{{ Session::get('name') }}/{z}/{x}/{y}.png', {
        minZoom: mapMinZoom,
        maxZoom: mapMaxZoom,
        attribution: 'dinhgiatructuyen.vn',
        tms: false,
        noWrap: true
    }).addTo(map);

    var drawnItems = new L.FeatureGroup();
	map.addLayer(drawnItems);

    var drawControl = new L.Control.Draw({
		draw: {
			position: 'topleft',
			polygon: {
				title: 'Draw a sexy polygon!',
				allowIntersection: false,
				drawError: {
					color: '#b00b00',
					timeout: 1000
				},
				shapeOptions: {
					color: '#bada55'
				},
				showArea: true
			},
			polyline: {
				metric: false
			},
			circle: {
				shapeOptions: {
					color: '#662d91'
				}
			}
		},
		edit: {
			featureGroup: drawnItems
		}
	});
	map.addControl(drawControl);
</script>
@endif
@endsection