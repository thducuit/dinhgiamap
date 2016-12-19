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
								<a href="xem-qui-hoach.html"><div id="btn_submit_xem_qui_hoach" class="btn btn_icon btn_gradient2"><i class="icon_xemquihoach"></i><span>Xem qui hoạch</span></div></a>
							</div>
						</div>
					</div>
					
					<!-- Map -->
					<div id="map_xemquihoach">
						<div class="map_xemquihoach_inner">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.604542970737!2d105.80625651527107!3d21.00848344384546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac9f04e4c2fd%3A0x5aa736c30ee5060e!2sCEN+Group!5e0!3m2!1sen!2s!4v1470474804079" width="100%" height="100" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
	</div>
</div>

<!-- <div id="map_photo" style="width: 700px; height: 500px"></div> -->
<script>
    var map = L.map('map_photo').setView([0, 0], 2);
    L.tileLayer('/upload/h/{z}/{x}/{y}.png', {
        minZoom: 1,
        maxZoom: 6,
        attribution: 'ESO/INAF-VST/OmegaCAM',
        tms: true
    }).addTo(map);
</script>
@endsection