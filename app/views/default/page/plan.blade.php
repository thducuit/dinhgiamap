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
						<p><strong>xem qui hoạch 1 địa điểm tài sản</strong></p>
						<p>(Chọn lựa các thông tin bên dưới để xem qui hoạch)</p>
					</div>
					
					<!-- Filter -->
					<div class="filter_group clearfix">
						<div class="filter_col">
							<label>Tỉnh/Thành Phố</label>
							<select>
								<option>Hồ Chí Minh</option>
								<option>Hà Nội</option>
								<option>Đà Nẵng</option>
								<option>Cần Thơ</option>
							</select>
						</div>
						<div class="filter_col">
							<label>Quận/Huyện</label>
							<select>
								<option>Quận Tân Phú</option>
								<option>Quận 1</option>
								<option>Quận 2</option>
								<option>Quận 3</option>
								<option>Quận 4</option>
							</select>
						</div>
						<div class="filter_col">
							<label>Phường/Xã</label>
							<select>
								<option>Phường Tân Quý</option>
								<option>Phường Tân Kỳ</option>
								<option>Phường Tân Sơn</option>
								<option>Phường Tây Thạnh</option>
								<option>Phường An Phú</option>
							</select>
						</div>
						<div class="filter_col">
							<label>Phân loại</label>
							<select>
								<option>Số thửa</option>
								<option>Diện tích</option>
							</select>
						</div>
						<div class="filter_col">
							<label></label>
							<input type="text" placeholder="Nhập số thửa" value="">
						</div>
						<div class="filter_col">
							<div class="popup_button_group">
								<a href="#"><div id="btn_submit_xem_qui_hoach" class="btn btn_icon btn_gradient2"><i class="icon_xemquihoach"></i><span>Xem qui hoạch</span></div></a>
							</div>
						</div>
					</div>
					
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


<script>
    var map = L.map('map_photo').setView([0, 0], 2);
    L.tileLayer('/public/plans/HIEPTANQUYHOACH/{z}/{x}/{y}.png', {
        minZoom: 1,
        maxZoom: 6,
        attribution: 'dinhgiatructuyen.vn',
        tms: true
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
@endsection