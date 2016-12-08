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
		<div id="map_view"></div>
		
		
		
		<!--
		POPUP
		-->
		<!-- <div class="popup_middle_wrapper"> -->
		<div id="modal_dinhgia" class="modal fade" role="dialog">	
			<div class="modal-dialog" style="max-width: 900px;">
			<!-- <div class="popup_middle"> -->
				<!-- <div class="popup_middle_inner clearfix"> -->
				<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-body">
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
					
					<!--.alert-->
					@if( Session::get('message') )
					<div class="row">
					    <div class="col-md-12">
					    	<div class="alert">
							  <strong><p class="error">{{ Session::get('message') }}</p></strong>
							</div>
					    </div>
					</div>
				    @endif
				    <!--/.alert-->
				    
					<!-- danh cho ban desktop -->
					<div class="desktop">
						<div class="dinhgia_tabpanel">
							<div class="ztabpanel clearfix">
								<ul>
									<li class="clearfix"><i class="icon_tabpanel icon_dattrong"></i> <span>Đất trống</span></li>
									<li class="clearfix"><i class="icon_tabpanel icon_nhapho"></i> <span>Nhà phố</span></li>
									<li class="clearfix"><i class="icon_tabpanel icon_bietthu"></i> <span>Biệt thự</span></li>
									<li class="clearfix"><i class="icon_tabpanel icon_canho"></i> <span>Căn hộ</span></li>
									<li class="clearfix"><i class="icon_tabpanel icon_khachsan"></i> <span>Khách sạn</span></li>
									<li class="clearfix"><i class="icon_tabpanel icon_toanha"></i> <span>Tòa nhà văn phòng</span></li>
									<li class="clearfix"><i class="icon_tabpanel icon_khoxuong"></i> <span>Kho xưởng</span></li>
								</ul>
								
								<!-- content tab dat trong -->
								<div>
									<div class="tab_header">
										<h3 class="tab_header_title">Địa chỉ định giá</h3>
										<p>Địa chỉ : {{ $address }}</p>
									</div>
									<div class="tab_body">
										<div class="tab_body_inner">
											{{ Form::open( array('url' => 'the-price', 'method' => 'post', 'class' => 'clearfix price-form vacant_land_form') ) }}
												<div class="form_row clearfix">
                                                    <div class="form_col">
														<label>Quận</label>
														<select class="selectQuan">
                                                          <option value="">Chọn Quận</option>
															@foreach ($districts as $key => $value)
															<option value="{{ $key }}">{{ $value }}</option>
															@endforeach
														</select>
													</div>
													<div class="form_col">
														<label class="highlight">Vị trí (*)</label>
														<input type="hidden" name="type" value='vacant_land'/>
														<input type="hidden" name="place_id" value='{{ $placeId }}'/>
														<input type="hidden" name="street_id"  value="{{ $streetId }}" >
														<input type="hidden" name="address"  value="{{ $address }}" >
                                                        <input type="hidden" name="viTri"  value="" class="inputViTri">
														<select class="selectVitri">
                                                          <option value="">Chọn Vị trí</option>
                                                          @foreach ($viTri as $s)
															<option value="{{ $s['id'] }}">{{ $s['description'] }}</option>
                                                          @endforeach															
														</select>
													
													</div>
													
													<div class="form_col">
                                                      <label>Yếu tố khác</label>
                                                      <input type="hidden" name="yeuToKhac"  value="" class="inputYeuToKhac">
                                                      <select class="selectYeuToKhac">
                                                        <option value="">Yếu tố khác</option>
                                                        @foreach ($yeuToKhac as $s)
                                                          <option value="{{ $s['id'] }}">{{ $s['description'] }}</option>
                                                        @endforeach															
                                                      </select>
													</div>	
												</div>
												
	                                            <div class="form_row clearfix">
	                                              <div class="form_col">
	                                                  <label>Hình dạng thửa đất</label>
	                                                  <input type="hidden" name="hinhDangThuaDat"  value="" class="inputHinhDangThuaDat">                                                  
	                                                  <select name="shape" class="selectHinhDangThuaDat">
	                                                    <option value="">Hình dạng</option>
	                                                    @foreach ($hinhDangThuaDat as $s)
	                                                    <option value="{{ $s['id'] }}">{{ $s['description'] }}</option>
	                                                    @endforeach
	                                                  </select>
	                                              </div>                                                                                            
	                                            </div>
                                            
												<div class="form_row clearfix">
													<div class="form_col">
														<label class="highlight">Đất sử dụng riêng (*)</label>
														<input type="text" name="total_area" placeholder="Tổng diện tích (m2)" value="{{ Input::old('total_area') }}">
													</div>
													<div class="form_col">
                                                      <input type="hidden" name="chieuNgang"  value="" class="inputChieuNgang">
                                                      <label>&nbsp;</label>                                                      
                                                      <input  class="textChieuNgang" type="text" name="horizontal" placeholder="Chiều ngang mặt tiền (m)" value="{{ Input::old('horizontal') }}">                                                      
													</div>
													<div class="form_col">
														<label>&nbsp;</label>
														<input type="text" name="vertical" placeholder="Chiều dài lớn nhất (m)" value="{{ Input::old('vertical') }}">
													</div>
												</div>														
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất phù hợp quy hoạch</label>
													</div>
													<div class="form_col">
                                                      <input type="hidden" name="dienTichDat"  value="" class="inputDienTichDat">                                                      
                                                      <input type="text" class="textDienTichDat" placeholder="Đất ở (m)" name="leaving_plan_area" value="{{ Input::old('leaving_plan_area') }}">                                                      
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_plan_area" value="{{ Input::old('trade_plan_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_plan_area" value="{{ Input::old('production_plan_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_plan_area" value="{{ Input::old('farming_plan_area') }}">
													</div>
												</div>											
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất vi phạm lộ giới được công nhận</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_violance_area" value="{{ Input::old('leaving_violance_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_violance_area" value="{{ Input::old('trade_violance_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_violance_area" value="{{ Input::old('production_violance_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_violance_area" value="{{ Input::old('farming_violance_area') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="popup_button_group groupThanhToan">

														<!-- <a href="{{ URL::to('/payment') }}"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a> -->
														@if( !Sentry::check() ) 
														<button data='.vacant_land_form' type='submit' id="btn_dinhgia" class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@else
														<button  type='submit' class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@endif
													</div>
												</div>
												<input type="hidden" class="chooser" name="chooser">
											{{ Form::close() }}
										</div>
									</div>
								</div>
								
								<!-- content tab nha pho -->
								<div>
									<div class="tab_header">
										<h3 class="tab_header_title">Địa chỉ định giá</h3>
										<p>Địa chỉ : {{ $address }}</p>
									</div>
									<div class="tab_body">
										<div class="tab_body_inner">
											{{ Form::open( array('url' => 'the-price', 'method' => 'post', 'class' => 'clearfix price-form house_form') ) }}
												<div class="form_row clearfix">
													<div class="form_col">
														<label class="highlight">Vị trí (*)</label>
														<input type="hidden" name="type" value='house'/>
														<input type="hidden" name="place_id" value='{{ $placeId }}'/>
														<input type="hidden" name="street_id"  value="{{ $streetId }}" >
														<input type="hidden" name="address"  value="{{ $address }}" >
														<select>
															<option>1 hẻm</option>
															<option>2 hẻm</option>
														</select>
													</div>
													<div class="form_col">
														<label>Hình dạng thửa đất</label>
														<select name="shape">
															@foreach (AdjustOption::findByGroupId(4)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
													<div class="form_col"  style="width: 50%;">
														<label>Yếu tố khác</label>
														<select>
                                                            <option>BĐS nằm gần trung tâm thương mại, siêu thị,... </option>
															<option>BĐS nằm gần trung tâm thương mại, siêu thị,... </option>
														</select>
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label class="highlight">Đất sử dụng riêng (*)</label>
														<input type="text" name="total_area" placeholder="Tổng diện tích (m2)" value="{{ Input::old('total_area') }}">
													</div>
													<div class="form_col">
														<label>&nbsp;</label>
														<input type="text" name="horizontal" placeholder="Chiều ngang mặt tiền (m)" value="{{ Input::old('horizontal') }}">
													</div>
													<div class="form_col">
														<label>&nbsp;</label>
														<input type="text" name="vertical" placeholder="Chiều dài lớn nhất (m)" value="{{ Input::old('vertical') }}">
													</div>
												</div>														
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất phù hợp quy hoạch</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_plan_area" value="{{ Input::old('leaving_plan_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_plan_area" value="{{ Input::old('trade_plan_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_plan_area" value="{{ Input::old('production_plan_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_plan_area" value="{{ Input::old('farming_plan_area') }}">
													</div>
												</div>											
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất vi phạm lộ giới được công nhận</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_violance_area" value="{{ Input::old('leaving_violance_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_violance_area" value="{{ Input::old('trade_violance_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_violance_area" value="{{ Input::old('production_violance_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_violance_area" value="{{ Input::old('farming_violance_area') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Công trình xây dựng</label>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col form_col2">
														<label>Kết cấu chính</label>
														<select name="structure" id="">
															@foreach (Structure::findByAlias('nha-pho')->structure_options()->get()->toArray() as $s)
															<option value="{{ $s['price'] }}">{{ $s['structure'] }}</option>
															@endforeach
														</select>
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" name="total_ground_area" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select name="year_building">
															@foreach (AdjustOption::findByGroupId(9)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
												</div>	
												<div class="form_row form_add_row_wrapper clearfix">
													<div class="form_col">
														<button class="btn btn_add_more_row">+ Thêm công trình xây dựng</button>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col form_col2">
														<label>Kết cấu chính</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select>
															<option>2016</option>
															<option>2015</option>
														</select>
													</div>
												</div>	
												<div class="form_row clearfix">
													<div class="popup_button_group groupThanhToan">
														<!-- <a href="thanh-toan.html"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a> -->
														@if( !Sentry::check() ) 
														<button data='.house_form' type='submit' id="btn_dinhgia" class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@else
														<button  type='submit' class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@endif
													</div>
												</div>
											{{ Form::close() }}
										</div>
									</div>
								</div>
								
								<!-- content tab biet thu -->
								<div>
									<div class="tab_header">
										<h3 class="tab_header_title">Địa chỉ định giá</h3>
										<p>Địa chỉ : {{ $address }}</p>
									</div>
									<div class="tab_body">
										<div class="tab_body_inner">
											{{ Form::open( array('url' => 'the-price', 'method' => 'post', 'class' => 'clearfix google-map-search-form vila_form') ) }}
												<div class="form_row clearfix">
													<div class="form_col">
														<label class="highlight">Vị trí (*)</label>
														<input type="hidden" name="type" value='house'/>
														<input type="hidden" name="place_id" value='{{ $placeId }}'/>
														<input type="hidden" name="street_id"  value="{{ $streetId }}" >
														<input type="hidden" name="address"  value="{{ $address }}" >
														<select>
															<option>1 hẻm</option>
															<option>2 hẻm</option>
														</select>
													</div>
													<div class="form_col">
														<label>Hình dạng thửa đất</label>
														<select name="shape">
															@foreach (AdjustOption::findByGroupId(4)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
													<div class="form_col"  style="width: 50%;">
														<label>Yếu tố khác</label>
														<select>
                                                            <option>BĐS nằm gần trung tâm thương mại, siêu thị,... </option>
															<option>BĐS nằm gần trung tâm thương mại, siêu thị,... </option>
														</select>
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label class="highlight">Đất sử dụng riêng (*)</label>
														<input type="text" name="total_area" placeholder="Tổng diện tích (m2)" value="{{ Input::old('total_area') }}">
													</div>
													<div class="form_col">
														<label>&nbsp;</label>
														<input type="text" name="horizontal" placeholder="Chiều ngang mặt tiền (m)" value="{{ Input::old('horizontal') }}">
													</div>
													<div class="form_col">
														<label>&nbsp;</label>
														<input type="text" name="vertical" placeholder="Chiều dài lớn nhất (m)" value="{{ Input::old('vertical') }}">
													</div>
												</div>														
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất phù hợp quy hoạch</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_plan_area" value="{{ Input::old('leaving_plan_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_plan_area" value="{{ Input::old('trade_plan_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_plan_area" value="{{ Input::old('production_plan_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_plan_area" value="{{ Input::old('farming_plan_area') }}">
													</div>
												</div>											
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất vi phạm lộ giới được công nhận</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_violance_area" value="{{ Input::old('leaving_violance_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_violance_area" value="{{ Input::old('trade_violance_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_violance_area" value="{{ Input::old('production_violance_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_violance_area" value="{{ Input::old('farming_violance_area') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Công trình xây dựng</label>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col form_col2">
														<label>Kết cấu chính</label>
														<select name="structure" id="">
															@foreach (Structure::findByAlias('biet-thu')->structure_options()->get()->toArray() as $s)
															<option value="{{ $s['price'] }}">{{ $s['structure'] }}</option>
															@endforeach
														</select>
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" name="total_ground_area" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select name="year_building">
															@foreach (AdjustOption::findByGroupId(9)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
													
												</div>	
												<div class="form_row form_add_row_wrapper clearfix">
													<div class="form_col">
														<button class="btn btn_add_more_row">+ Thêm công trình xây dựng</button>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col form_col2">
														<label>Kết cấu chính</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select>
															<option>2016</option>
															<option>2015</option>
														</select>
													</div>
												</div>	
												<div class="form_row clearfix">
													<div class="popup_button_group groupThanhToan">
														<!-- <a href="thanh-toan.html"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a> -->
														@if( !Sentry::check() ) 
														<button data='.vila_form' type='submit' id="btn_dinhgia" class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@else
														<button  type='submit' class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@endif
													</div>
												</div>
											{{ Form::close() }}
										</div>
									</div>
								</div>
								
								<!-- content tab can ho -->
								<div>
									<div class="tab_header">
										<h3 class="tab_header_title">Địa chỉ định giá</h3>
										<p>Địa chỉ : {{ $address }}</p>
									</div>
									<div class="tab_body">
										<div class="tab_body_inner">
											{{ Form::open( array('url' => 'the-price', 'method' => 'post', 'class' => 'clearfix google-map-search-form flat_form') ) }}
												<div class="form_row clearfix">
													<div class="form_col">
														<label class="highlight">Vị trí (*)</label>
														<input type="hidden" name="type" value='house'/>
														<input type="hidden" name="place_id" value='{{ $placeId }}'/>
														<input type="hidden" name="street_id"  value="{{ $streetId }}" >
														<input type="hidden" name="address"  value="{{ $address }}" >
														<select>
															<option>1 hẻm</option>
															<option>2 hẻm</option>
														</select>
													</div>
													<div class="form_col">
														<label>Hình dạng thửa đất</label>
														<select name="shape">
															@foreach (AdjustOption::findByGroupId(4)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
													<div class="form_col"  style="width: 50%;">
														<label>Yếu tố khác</label>
														<select>
                                                            <option>BĐS nằm gần trung tâm thương mại, siêu thị,... </option>
															<option>BĐS nằm gần trung tâm thương mại, siêu thị,... </option>
														</select>
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label class="highlight">Đất sử dụng riêng (*)</label>
														<input type="text" name="total_area" placeholder="Tổng diện tích (m2)" value="{{ Input::old('total_area') }}">
													</div>
													<div class="form_col">
														<label>&nbsp;</label>
														<input type="text" name="horizontal" placeholder="Chiều ngang mặt tiền (m)" value="{{ Input::old('horizontal') }}">
													</div>
													<div class="form_col">
														<label>&nbsp;</label>
														<input type="text" name="vertical" placeholder="Chiều dài lớn nhất (m)" value="{{ Input::old('vertical') }}">
													</div>
												</div>														
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất phù hợp quy hoạch</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_plan_area" value="{{ Input::old('leaving_plan_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_plan_area" value="{{ Input::old('trade_plan_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_plan_area" value="{{ Input::old('production_plan_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_plan_area" value="{{ Input::old('farming_plan_area') }}">
													</div>
												</div>											
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất vi phạm lộ giới được công nhận</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_violance_area" value="{{ Input::old('leaving_violance_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_violance_area" value="{{ Input::old('trade_violance_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_violance_area" value="{{ Input::old('production_violance_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_violance_area" value="{{ Input::old('farming_violance_area') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Công trình xây dựng</label>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col form_col2">
														<label>Kết cấu chính</label>
														<select name="structure" id="">
															@foreach (Structure::findByAlias('can-ho')->structure_options()->get()->toArray() as $s)
															<option value="{{ $s['price'] }}">{{ $s['structure'] }}</option>
															@endforeach
														</select>
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" name="total_ground_area" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select name="year_building">
															@foreach (AdjustOption::findByGroupId(9)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
													
												</div>	
												<div class="form_row form_add_row_wrapper clearfix">
													<div class="form_col">
														<button class="btn btn_add_more_row">+ Thêm công trình xây dựng</button>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col form_col2">
														<label>Kết cấu chính</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select>
															<option>2016</option>
															<option>2015</option>
														</select>
													</div>
												</div>	
												<div class="form_row clearfix">
													<div class="popup_button_group groupThanhToan">
														<!-- <a href="thanh-toan.html"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a> -->
														@if( !Sentry::check() ) 
														<button data='.flat_form' type='submit' id="btn_dinhgia" class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@else
														<button  type='submit' class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@endif
													</div>
												</div>
											{{ Form::close() }}
										</div>
									</div>
								</div>
								
								<!-- content tab khach san -->
								<div>
									<div class="tab_header">
										<h3 class="tab_header_title">Địa chỉ định giá</h3>
										<p>Địa chỉ : {{ $address }}</p>
									</div>
									<div class="tab_body">
										<div class="tab_body_inner">
											{{ Form::open( array('url' => 'the-price', 'method' => 'post', 'class' => 'clearfix google-map-search-form hotel_form') ) }}
												<div class="form_row clearfix">
													<div class="form_col">
														<label class="highlight">Vị trí (*)</label>
														<input type="hidden" name="type" value='house'/>
														<input type="hidden" name="place_id" value='{{ $placeId }}'/>
														<input type="hidden" name="street_id"  value="{{ $streetId }}" >
														<input type="hidden" name="address"  value="{{ $address }}" >
														<select>
															<option>1 hẻm</option>
															<option>2 hẻm</option>
														</select>
													</div>
													<div class="form_col">
														<label>Hình dạng thửa đất</label>
														<select name="shape">
															@foreach (AdjustOption::findByGroupId(4)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
													<div class="form_col"  style="width: 50%;">
														<label>Yếu tố khác</label>
														<select>
                                                            <option>BĐS nằm gần trung tâm thương mại, siêu thị,... </option>
															<option>BĐS nằm gần trung tâm thương mại, siêu thị,... </option>
														</select>
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label class="highlight">Đất sử dụng riêng (*)</label>
														<input type="text" name="total_area" placeholder="Tổng diện tích (m2)" value="{{ Input::old('total_area') }}">
													</div>
													<div class="form_col">
														<label>&nbsp;</label>
														<input type="text" name="horizontal" placeholder="Chiều ngang mặt tiền (m)" value="{{ Input::old('horizontal') }}">
													</div>
													<div class="form_col">
														<label>&nbsp;</label>
														<input type="text" name="vertical" placeholder="Chiều dài lớn nhất (m)" value="{{ Input::old('vertical') }}">
													</div>
												</div>														
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất phù hợp quy hoạch</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_plan_area" value="{{ Input::old('leaving_plan_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_plan_area" value="{{ Input::old('trade_plan_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_plan_area" value="{{ Input::old('production_plan_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_plan_area" value="{{ Input::old('farming_plan_area') }}">
													</div>
												</div>											
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất vi phạm lộ giới được công nhận</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_violance_area" value="{{ Input::old('leaving_violance_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_violance_area" value="{{ Input::old('trade_violance_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_violance_area" value="{{ Input::old('production_violance_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_violance_area" value="{{ Input::old('farming_violance_area') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Công trình xây dựng</label>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col form_col2">
														<label>Kết cấu chính</label>
														<select name="structure" id="">
															@foreach (Structure::findByAlias('khach-san')->structure_options()->get()->toArray() as $s)
															<option value="{{ $s['price'] }}">{{ $s['structure'] }}</option>
															@endforeach
														</select>
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" name="total_ground_area" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select name="year_building">
															@foreach (AdjustOption::findByGroupId(9)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
													
												</div>	
												<div class="form_row form_add_row_wrapper clearfix">
													<div class="form_col">
														<button class="btn btn_add_more_row">+ Thêm công trình xây dựng</button>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col form_col2">
														<label>Kết cấu chính</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select>
															<option>2016</option>
															<option>2015</option>
														</select>
													</div>
												</div>	
												<div class="form_row clearfix">
													<div class="popup_button_group groupThanhToan">
														<!-- <a href="thanh-toan.html"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a> -->
														@if( !Sentry::check() ) 
														<button data='.hotel_form' type='submit' id="btn_dinhgia" class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@else
														<button  type='submit' class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@endif
													</div>
												</div>
											{{ Form::close() }}
										</div>
									</div>
								</div>
								
								<!-- content tab toa nha van phong -->
								<div>
									<div class="tab_header">
										<h3 class="tab_header_title">Địa chỉ định giá</h3>
										<p>Địa chỉ : {{ $address }}</p>
									</div>
									<div class="tab_body">
										<div class="tab_body_inner">
											{{ Form::open( array('url' => 'the-price', 'method' => 'post', 'class' => 'clearfix google-map-search-form office_form') ) }}
												<div class="form_row clearfix">
													<div class="form_col">
														<label class="highlight">Vị trí (*)</label>
														<input type="hidden" name="type" value='house'/>
														<input type="hidden" name="place_id" value='{{ $placeId }}'/>
														<input type="hidden" name="street_id"  value="{{ $streetId }}" >
														<input type="hidden" name="address"  value="{{ $address }}" >
														<select>
															<option>1 hẻm</option>
															<option>2 hẻm</option>
														</select>
													</div>
													<div class="form_col">
														<label>Hình dạng thửa đất</label>
														<select name="shape">
															@foreach (AdjustOption::findByGroupId(4)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
													<div class="form_col"  style="width: 50%;">
														<label>Yếu tố khác</label>
														<select>
                                                            <option>BĐS nằm gần trung tâm thương mại, siêu thị,... </option>
															<option>BĐS nằm gần trung tâm thương mại, siêu thị,... </option>
														</select>
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label class="highlight">Đất sử dụng riêng (*)</label>
														<input type="text" name="total_area" placeholder="Tổng diện tích (m2)" value="{{ Input::old('total_area') }}">
													</div>
													<div class="form_col">
														<label>&nbsp;</label>
														<input type="text" name="horizontal" placeholder="Chiều ngang mặt tiền (m)" value="{{ Input::old('horizontal') }}">
													</div>
													<div class="form_col">
														<label>&nbsp;</label>
														<input type="text" name="vertical" placeholder="Chiều dài lớn nhất (m)" value="{{ Input::old('vertical') }}">
													</div>
												</div>														
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất phù hợp quy hoạch</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_plan_area" value="{{ Input::old('leaving_plan_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_plan_area" value="{{ Input::old('trade_plan_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_plan_area" value="{{ Input::old('production_plan_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_plan_area" value="{{ Input::old('farming_plan_area') }}">
													</div>
												</div>											
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất vi phạm lộ giới được công nhận</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_violance_area" value="{{ Input::old('leaving_violance_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_violance_area" value="{{ Input::old('trade_violance_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_violance_area" value="{{ Input::old('production_violance_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_violance_area" value="{{ Input::old('farming_violance_area') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Công trình xây dựng</label>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col form_col2">
														<label>Kết cấu chính</label>
														<select name="structure" id="">
															@foreach (Structure::findByAlias('toa-nha-van-phong')->structure_options()->get()->toArray() as $s)
															<option value="{{ $s['price'] }}">{{ $s['structure'] }}</option>
															@endforeach
														</select>
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" name="total_ground_area" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select name="year_building">
															@foreach (AdjustOption::findByGroupId(9)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
													
												</div>	
												<div class="form_row form_add_row_wrapper clearfix">
													<div class="form_col">
														<button class="btn btn_add_more_row">+ Thêm công trình xây dựng</button>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col form_col2">
														<label>Kết cấu chính</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select>
															<option>2016</option>
															<option>2015</option>
														</select>
													</div>
												</div>	
												<div class="form_row clearfix">
													<div class="popup_button_group groupThanhToan">
														<!-- <a href="thanh-toan.html"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a> -->
														@if( !Sentry::check() ) 
														<button data='.office_form' type='submit' id="btn_dinhgia" class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@else
														<button  type='submit' class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@endif
													</div>
												</div>
											{{ Form::close() }}
										</div>
									</div>
								</div>
								
								<!-- content tab kho xuong -->
								<div>
									<div class="tab_header">
										<h3 class="tab_header_title">Địa chỉ định giá</h3>
										<p>Địa chỉ : {{ $address }}</p>
									</div>
									<div class="tab_body">
										<div class="tab_body_inner">
											{{ Form::open( array('url' => 'the-price', 'method' => 'post', 'class' => 'clearfix google-map-search-form warehouse_form') ) }}
												<div class="form_row clearfix">
													<div class="form_col">
														<label class="highlight">Vị trí (*)</label>
														<input type="hidden" name="type" value='house'/>
														<input type="hidden" name="place_id" value='{{ $placeId }}'/>
														<input type="hidden" name="street_id"  value="{{ $streetId }}" >
														<input type="hidden" name="address"  value="{{ $address }}" >
														<select>
															<option>1 hẻm</option>
															<option>2 hẻm</option>
														</select>
													</div>
													<div class="form_col">
														<label>Hình dạng thửa đất</label>
														<select name="shape">
															@foreach (AdjustOption::findByGroupId(4)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
													<div class="form_col"  style="width: 50%;">
														<label>Yếu tố khác</label>
														<select>
                                                            <option>BĐS nằm gần trung tâm thương mại, siêu thị,... </option>
															<option>BĐS nằm gần trung tâm thương mại, siêu thị,... </option>
														</select>
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label class="highlight">Đất sử dụng riêng (*)</label>
														<input type="text" name="total_area" placeholder="Tổng diện tích (m2)" value="{{ Input::old('total_area') }}">
													</div>
													<div class="form_col">
														<label>&nbsp;</label>
														<input type="text" name="horizontal" placeholder="Chiều ngang mặt tiền (m)" value="{{ Input::old('horizontal') }}">
													</div>
													<div class="form_col">
														<label>&nbsp;</label>
														<input type="text" name="vertical" placeholder="Chiều dài lớn nhất (m)" value="{{ Input::old('vertical') }}">
													</div>
												</div>														
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất phù hợp quy hoạch</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_plan_area" value="{{ Input::old('leaving_plan_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_plan_area" value="{{ Input::old('trade_plan_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_plan_area" value="{{ Input::old('production_plan_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_plan_area" value="{{ Input::old('farming_plan_area') }}">
													</div>
												</div>											
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất vi phạm lộ giới được công nhận</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_violance_area" value="{{ Input::old('leaving_violance_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_violance_area" value="{{ Input::old('trade_violance_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_violance_area" value="{{ Input::old('production_violance_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_violance_area" value="{{ Input::old('farming_violance_area') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Công trình xây dựng</label>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col form_col2">
														<label>Kết cấu chính</label>
														<select name="structure_parent" id="structure_parent">
															@foreach (Structure::findByParent('kho-xuong')->get()->toArray() as $s)
															<option value="{{ $s['id'] }}">{{ $s['name'] }}</option>
															@endforeach
														</select>
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" name="total_ground_area" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select name="year_building">
															@foreach (AdjustOption::findByGroupId(9)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
													
												</div>	
												<div class="form_row form_add_row_wrapper clearfix">
													<div class="form_col">
														<button class="btn btn_add_more_row">+ Thêm công trình xây dựng</button>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col form_col2">
														<label>Kết cấu chính</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select>
															<option>2016</option>
															<option>2015</option>
														</select>
													</div>
												</div>	
												<div class="form_row clearfix">
													<div class="popup_button_group groupThanhToan">
														<!-- <a href="thanh-toan.html"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a> -->
														@if( !Sentry::check() ) 
														<button data='.warehouse_form' type='submit' id="btn_dinhgia" class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@else
														<button  type='submit' class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@endif
													</div>
												</div>
											{{ Form::close() }}
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					
					<!-- danh cho ban mobile -->
					<div class="mobile">
						<section id="list_loaitaisan_dinhgia" data-accordion-group>
					  
						  <section data-accordion>
							<button data-control><i class="icon_tabpanel icon_dattrong"></i> Đất trống</button>
							<div data-content>
							  <article>
								<!-- content tab dat trong -->
								<div>
									<div class="tab_header">
										<h3 class="tab_header_title">Địa chỉ định giá</h3>
										<p>Địa chỉ : {{ $address }}</p>
									</div>
									<div class="tab_body">
										<div class="tab_body_inner">
											{{ Form::open( array('url' => 'the-price', 'method' => 'post', 'class' => 'clearfix google-map-search-form') ) }}
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label class="highlight">Đất sử dụng riêng (*)</label>
														<input type="hidden" name="type" value='vacant_land'/>
														<input type="hidden" name="place_id" value='{{ $placeId }}'/>
														<input type="hidden" name="street_id"  value="{{ $streetId }}" >
														<input type="hidden" name="address"  value="{{ $address }}" >
													
													</div>
													<div class="form_col">
														<input type="text" name="total_area" placeholder="Tổng diện tích (m2)" value="{{ Input::old('total_area') }}">
													</div>
													<div class="form_col">
														<input type="text" name="horizontal" placeholder="Chiều ngang mặt tiền (m)" value="{{ Input::old('horizontal') }}">
													</div>																										
													<div class="form_col">
														<input type="text" name="vertical" placeholder="Chiều dài lớn nhất (m)" value="{{ Input::old('vertical') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Hình dạng thửa đất</label>
													</div>
													<div class="form_col">
														<select name="shape">
															@foreach (AdjustOption::findByGroupId(4)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
												</div>														
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất phù hợp quy hoạch</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_plan_area" value="{{ Input::old('leaving_plan_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_plan_area" value="{{ Input::old('trade_plan_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_plan_area" value="{{ Input::old('production_plan_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_plan_area" value="{{ Input::old('farming_plan_area') }}">
													</div>
												</div>											
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất vi phạm lộ giới được công nhận</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_violance_area" value="{{ Input::old('leaving_violance_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_violance_area" value="{{ Input::old('trade_violance_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_violance_area" value="{{ Input::old('production_violance_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_violance_area" value="{{ Input::old('farming_violance_area') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="popup_button_group groupThanhToan">

														<!-- <a href="{{ URL::to('/payment') }}"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a> -->
														@if( !Sentry::check() ) 
														<button data='.vacant_land_form' type='submit' id="btn_dinhgia" class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@else
														<button  type='submit' class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@endif
													</div>
												</div>
												<input type="hidden" class="chooser" name="chooser">
											{{ Form::close() }}
										</div>
									</div>
								</div>
							  </article>
							</div>
						  </section>
						  
						  <section data-accordion>
							<button data-control><i class="icon_tabpanel icon_nhapho"></i> Nhà phố</button>
							<div data-content>
							  <article>
								<!-- content tab nha pho -->
								<div>
									<div class="tab_header">
										<h3 class="tab_header_title">Địa chỉ định giá</h3>
										<p>Địa chỉ : {{ $address }}</p>
									</div>
									<div class="tab_body">
										<div class="tab_body_inner">
											{{ Form::open( array('url' => 'the-price', 'method' => 'post', 'class' => 'clearfix price-form house_form') ) }}
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label class="highlight">Đất sử dụng riêng (*)</label>
														<input type="hidden" name="type" value='house'/>
														<input type="hidden" name="place_id" value='{{ $placeId }}'/>
														<input type="hidden" name="street_id"  value="{{ $streetId }}" >
														<input type="hidden" name="address"  value="{{ $address }}" >
													
													</div>
													<div class="form_col">
														<input type="text" placeholder="Tổng diện tích (m2)" name="total_area" value="{{ Input::old('total_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Chiều ngang mặt tiền (m)" name="horizontal" value="{{ Input::old('horizontal') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Chiều dài lớn nhất (m)" name="vertical" value="{{ Input::old('vertical') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Hình dạng thửa đất</label>
													</div>
													<div class="form_col">
														<select name="shape">
															@foreach (AdjustOption::findByGroupId(4)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
												</div>														
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất phù hợp quy hoạch</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_plan_area" value="{{ Input::old('leaving_plan_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_plan_area" value="{{ Input::old('trade_plan_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_plan_area" value="{{ Input::old('production_plan_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_plan_area" value="{{ Input::old('farming_plan_area') }}">
													</div>
												</div>											
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất vi phạm lộ giới được công nhận</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_violance_area" value="{{ Input::old('leaving_violance_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_violance_area" value="{{ Input::old('trade_violance_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_violance_area" value="{{ Input::old('production_violance_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_violance_area" value="{{ Input::old('farming_violance_area') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Công trình xây dựng</label>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Kết cấu chính</label>
														<select name="structure" id="">
															@foreach (Structure::findByAlias('nha-pho')->structure_options()->get()->toArray() as $s)
															<option value="{{ $s['price'] }}">{{ $s['structure'] }}</option>
															@endforeach
														</select>
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" name="total_ground_area" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select name="year_building">
															@foreach (AdjustOption::findByGroupId(9)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
													
												</div>	
												<div class="form_row form_add_row_wrapper clearfix">
													<div class="form_col">
														<button class="btn btn_add_more_row">+ Thêm công trình xây dựng</button>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Kết cấu chính</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select>
															<option>2016</option>
															<option>2015</option>
														</select>
													</div>
												</div>	
												<div class="form_row clearfix">
													<div class="popup_button_group groupThanhToan">
														<!-- <a href="thanh-toan.html"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a> -->
														@if( !Sentry::check() ) 
														<button data='.house_form' type='submit' id="btn_dinhgia" class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@else
														<button  type='submit' class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@endif
													</div>
												</div>
											{{ Form::close() }}
										</div>
									</div>
								</div>
							  </article>
							</div>
						  </section>
						  
						  <section data-accordion>
							<button data-control><i class="icon_tabpanel icon_bietthu"></i> Biệt thự</button>
							<div data-content>
							   <article>
									<!-- content tab biet thu -->
									<div>
										<div class="tab_header">
											<h3 class="tab_header_title">Địa chỉ định giá</h3>
											<p>Địa chỉ : {{ $address }}</p>
										</div>
										<div class="tab_body">
											<div class="tab_body_inner">
												{{ Form::open( array('url' => 'the-price', 'method' => 'post', 'class' => 'clearfix google-map-search-form vila_form') ) }}
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label class="highlight">Đất sử dụng riêng (*)</label>
														<input type="hidden" name="type" value='vila'/>
														<input type="hidden" name="place_id" value='{{ $placeId }}'/>
														<input type="hidden" name="street_id"  value="{{ $streetId }}" >
														<input type="hidden" name="address"  value="{{ $address }}" >
													</div>
													<div class="form_col">
														<input type="text" placeholder="Tổng diện tích (m2)" name="total_area" value="{{ Input::old('total_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Chiều ngang mặt tiền (m)" name="horizontal" value="{{ Input::old('horizontal') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Chiều dài lớn nhất (m)" name="vertical" value="{{ Input::old('vertical') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Hình dạng thửa đất</label>
													</div>
													<div class="form_col">
														<select name="shape">
														@foreach (AdjustOption::findByGroupId(4)->get()->toArray() as $s)
														<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
														@endforeach
														</select>
													</div>
												</div>														
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất phù hợp quy hoạch</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_plan_area" value="{{ Input::old('leaving_plan_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_plan_area" value="{{ Input::old('trade_plan_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_plan_area" value="{{ Input::old('production_plan_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_plan_area" value="{{ Input::old('farming_plan_area') }}">
													</div>
												</div>											
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất vi phạm lộ giới được công nhận</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_violance_area" value="{{ Input::old('leaving_violance_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_violance_area" value="{{ Input::old('trade_violance_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_violance_area" value="{{ Input::old('production_violance_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_violance_area" value="{{ Input::old('farming_violance_area') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Công trình xây dựng</label>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Kết cấu chính</label>
														<select name="structure" id="">
															@foreach (Structure::findByAlias('biet-thu')->structure_options()->get()->toArray() as $s)
															<option value="{{ $s['price'] }}">{{ $s['structure'] }}</option>
															@endforeach
														</select>
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" name="total_ground_area" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select name="year_building">
															@foreach (AdjustOption::findByGroupId(9)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
													
												</div>	
												<div class="form_row form_add_row_wrapper clearfix">
													<div class="form_col">
														<button class="btn btn_add_more_row">+ Thêm công trình xây dựng</button>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Kết cấu chính</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select>
															<option>2016</option>
															<option>2015</option>
														</select>
													</div>
												</div>	
												<div class="form_row clearfix">
													<div class="popup_button_group groupThanhToan">
														<!-- <a href="thanh-toan.html"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a> -->
														@if( !Sentry::check() ) 
														<button data='.vila_form' type='submit' id="btn_dinhgia" class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@else
														<button  type='submit' class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@endif
													</div>
												</div>
											{{ Form::close() }}
											</div>
										</div>
									</div>
							  </article>
							</div>
						  </section>
						  
						  <section data-accordion>
							<button data-control><i class="icon_tabpanel icon_canho"></i> Căn hộ</button>
							<div data-content>
							   <article>
									<!-- content tab can ho -->
									<div>
										<div class="tab_header">
											<h3 class="tab_header_title">Địa chỉ định giá</h3>
											<p>Địa chỉ : {{ $address }}</p>
										</div>
										<div class="tab_body">
											<div class="tab_body_inner">
												{{ Form::open( array('url' => 'the-price', 'method' => 'post', 'class' => 'clearfix google-map-search-form flat_form') ) }}
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label class="highlight">Đất sử dụng riêng (*)</label>
														<input type="hidden" name="type" value='flat'/>
														<input type="hidden" name="place_id" value='{{ $placeId }}'/>
														<input type="hidden" name="street_id"  value="{{ $streetId }}" >
														<input type="hidden" name="address"  value="{{ $address }}" >
													
													</div>
													<div class="form_col">
														<input type="text" placeholder="Tổng diện tích (m2)" name="total_area" value="{{ Input::old('total_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Chiều ngang mặt tiền (m)" name="horizontal" value="{{ Input::old('horizontal') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Chiều dài lớn nhất (m)" name="vertical" value="{{ Input::old('vertical') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Hình dạng thửa đất</label>
													</div>
													<div class="form_col">
														<select name="shape">
															@foreach (AdjustOption::findByGroupId(4)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
												</div>														
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất phù hợp quy hoạch</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_plan_area" value="{{ Input::old('leaving_plan_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_plan_area" value="{{ Input::old('trade_plan_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_plan_area" value="{{ Input::old('production_plan_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_plan_area" value="{{ Input::old('farming_plan_area') }}">
													</div>
												</div>											
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất vi phạm lộ giới được công nhận</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_violance_area" value="{{ Input::old('leaving_violance_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_violance_area" value="{{ Input::old('trade_violance_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_violance_area" value="{{ Input::old('production_violance_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_violance_area" value="{{ Input::old('farming_violance_area') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Công trình xây dựng</label>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Kết cấu chính</label>
														<select name="structure" id="">
															@foreach (Structure::findByAlias('can-ho')->structure_options()->get()->toArray() as $s)
															<option value="{{ $s['price'] }}">{{ $s['structure'] }}</option>
															@endforeach
														</select>
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" name="total_ground_area" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select name="year_building">
															@foreach (AdjustOption::findByGroupId(9)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
													
												</div>	
												<div class="form_row form_add_row_wrapper clearfix">
													<div class="form_col">
														<button class="btn btn_add_more_row">+ Thêm công trình xây dựng</button>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Kết cấu chính</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select>
															<option>2016</option>
															<option>2015</option>
														</select>
													</div>
												</div>	
												<div class="form_row clearfix">
													<div class="popup_button_group groupThanhToan">
														<!-- <a href="thanh-toan.html"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a> -->
														@if( !Sentry::check() ) 
														<button data='.flat_form' type='submit' id="btn_dinhgia" class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@else
														<button  type='submit' class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@endif
													</div>
												</div>
											{{ Form::close() }}
											</div>
										</div>
									</div>
							  </article>
							</div>
						  </section>
						  
						  <section data-accordion>
							<button data-control><i class="icon_tabpanel icon_khachsan"></i> Khách sạn</button>
							<div data-content>
							   <article>
									<!-- content tab khach san -->
									<div>
										<div class="tab_header">
											<h3 class="tab_header_title">Địa chỉ định giá</h3>
											<p>Địa chỉ : {{ $address }}</p>
										</div>
										<div class="tab_body">
											<div class="tab_body_inner">
												{{ Form::open( array('url' => 'the-price', 'method' => 'post', 'class' => 'clearfix google-map-search-form hotel_form') ) }}
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label class="highlight">Đất sử dụng riêng (*)</label>
														<input type="hidden" name="type" value='hotel'/>
														<input type="hidden" name="place_id" value='{{ $placeId }}'/>
														<input type="hidden" name="street_id"  value="{{ $streetId }}" >
														<input type="hidden" name="address"  value="{{ $address }}" >
													</div>
													<div class="form_col">
														<input type="text" placeholder="Tổng diện tích (m2)" name="total_area" value="{{ Input::old('total_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Chiều ngang mặt tiền (m)" name="horizontal" value="{{ Input::old('horizontal') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Chiều dài lớn nhất (m)" name="vertical" value="{{ Input::old('vertical') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Hình dạng thửa đất</label>
													</div>
													<div class="form_col">
														<select name="shape">
															@foreach (AdjustOption::findByGroupId(4)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
												</div>														
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất phù hợp quy hoạch</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_plan_area" value="{{ Input::old('leaving_plan_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_plan_area" value="{{ Input::old('trade_plan_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_plan_area" value="{{ Input::old('production_plan_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_plan_area" value="{{ Input::old('farming_plan_area') }}">
													</div>
												</div>											
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất vi phạm lộ giới được công nhận</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_violance_area" value="{{ Input::old('leaving_violance_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_violance_area" value="{{ Input::old('trade_violance_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_violance_area" value="{{ Input::old('production_violance_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_violance_area" value="{{ Input::old('farming_violance_area') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Công trình xây dựng</label>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Kết cấu chính</label>
														<select name="structure" id="">
															@foreach (Structure::findByAlias('khach-san')->structure_options()->get()->toArray() as $s)
															<option value="{{ $s['price'] }}">{{ $s['structure'] }}</option>
															@endforeach
														</select>
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" name="total_ground_area" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select name="year_building">
															@foreach (AdjustOption::findByGroupId(9)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
													
												</div>	
												<div class="form_row form_add_row_wrapper clearfix">
													<div class="form_col">
														<button class="btn btn_add_more_row">+ Thêm công trình xây dựng</button>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Kết cấu chính</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select>
															<option>2016</option>
															<option>2015</option>
														</select>
													</div>
												</div>	
												<div class="form_row clearfix">
													<div class="popup_button_group groupThanhToan">
														<!-- <a href="thanh-toan.html"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a> -->
														@if( !Sentry::check() ) 
														<button data='.hotel_form' type='submit' id="btn_dinhgia" class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@else
														<button  type='submit' class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@endif
													</div>
												</div>
											{{ Form::close() }}
											</div>
										</div>
									</div>
							  </article>
							</div>
						  </section>
						  
						  <section data-accordion>
							<button data-control><i class="icon_tabpanel icon_toanha"></i> Tòa nhà văn phòng</button>
							<div data-content>
							   <article>
									<!-- content tab toa nha van phong -->
									<div>
										<div class="tab_header">
											<h3 class="tab_header_title">Địa chỉ định giá</h3>
											<p>Địa chỉ : {{ $address }}</p>
										</div>
										<div class="tab_body">
											<div class="tab_body_inner">
												{{ Form::open( array('url' => 'the-price', 'method' => 'post', 'class' => 'clearfix google-map-search-form office_form') ) }}
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label class="highlight">Đất sử dụng riêng (*)</label>
														<input type="hidden" name="type" value='office'/>
														<input type="hidden" name="place_id" value='{{ $placeId }}'/>
														<input type="hidden" name="street_id"  value="{{ $streetId }}" >
														<input type="hidden" name="address"  value="{{ $address }}" >
													</div>
													<div class="form_col">
														<input type="text" placeholder="Tổng diện tích (m2)" name="total_area" value="{{ Input::old('total_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Chiều ngang mặt tiền (m)" name="horizontal" value="{{ Input::old('horizontal') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Chiều dài lớn nhất (m)" name="vertical" value="{{ Input::old('vertical') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Hình dạng thửa đất</label>
													</div>
													<div class="form_col">
														<select name="shape">
															@foreach (AdjustOption::findByGroupId(4)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
												</div>														
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất phù hợp quy hoạch</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_plan_area" value="{{ Input::old('leaving_plan_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_plan_area" value="{{ Input::old('trade_plan_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_plan_area" value="{{ Input::old('production_plan_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_plan_area" value="{{ Input::old('farming_plan_area') }}">
													</div>
												</div>											
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất vi phạm lộ giới được công nhận</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_violance_area" value="{{ Input::old('leaving_violance_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_violance_area" value="{{ Input::old('trade_violance_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_violance_area" value="{{ Input::old('production_violance_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_violance_area" value="{{ Input::old('farming_violance_area') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Công trình xây dựng</label>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Kết cấu chính</label>
														<select name="structure" id="">
															@foreach (Structure::findByAlias('toa-nha-van-phong')->structure_options()->get()->toArray() as $s)
															<option value="{{ $s['price'] }}">{{ $s['structure'] }}</option>
															@endforeach
														</select>
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" name="total_ground_area" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select name="year_building">
															@foreach (AdjustOption::findByGroupId(9)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
													
												</div>	
												<div class="form_row form_add_row_wrapper clearfix">
													<div class="form_col">
														<button class="btn btn_add_more_row">+ Thêm công trình xây dựng</button>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Kết cấu chính</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select>
															<option>2016</option>
															<option>2015</option>
														</select>
													</div>
												</div>	
												<div class="form_row clearfix">
													<div class="popup_button_group groupThanhToan">
														<!-- <a href="thanh-toan.html"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a> -->
														@if( !Sentry::check() ) 
														<button data='.office_form' type='submit' id="btn_dinhgia" class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@else
														<button  type='submit' class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@endif
													</div>
												</div>
											{{ Form::close() }}
											</div>
										</div>
									</div>
							  </article>
							</div>
						  </section>
						  
						  <section data-accordion>
							<button data-control><i class="icon_tabpanel icon_khoxuong"></i> Kho xưởng</button>
							<div data-content>
							   <article>
									<!-- content tab kho xuong -->
									<div>
										<div class="tab_header">
											<h3 class="tab_header_title">Địa chỉ định giá</h3>
											<p>Địa chỉ : {{ $address }}</p>
										</div>
										<div class="tab_body">
											<div class="tab_body_inner">
												{{ Form::open( array('url' => 'the-price', 'method' => 'post', 'class' => 'clearfix google-map-search-form warehouse_form') ) }}
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label class="highlight">Đất sử dụng riêng (*)</label>
														<input type="hidden" name="type" value='warehouse'/>
														<input type="hidden" name="place_id" value='{{ $placeId }}'/>
														<input type="hidden" name="street_id"  value="{{ $streetId }}" >
														<input type="hidden" name="address"  value="{{ $address }}" >
													
													</div>
													<div class="form_col">
														<input type="text" placeholder="Tổng diện tích (m2)" name="total_area" value="{{ Input::old('total_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Chiều ngang mặt tiền (m)" name="horizontal" value="{{ Input::old('horizontal') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Chiều dài lớn nhất (m)" name="vertical" value="{{ Input::old('vertical') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Hình dạng thửa đất</label>
													</div>
													<div class="form_col">
														<select name="shape">
															@foreach (AdjustOption::findByGroupId(4)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
												</div>														
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất phù hợp quy hoạch</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_plan_area" value="{{ Input::old('leaving_plan_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_plan_area" value="{{ Input::old('trade_plan_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_plan_area" value="{{ Input::old('production_plan_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_plan_area" value="{{ Input::old('farming_plan_area') }}">
													</div>
												</div>											
												<div class="form_row clearfix">
													<div class="form_col form_col_first">
														<label>Diện tích đất vi phạm lộ giới được công nhận</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất ở (m)" name="leaving_violance_area" value="{{ Input::old('leaving_violance_area') }}">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Đất TMDV" name="trade_violance_area" value="{{ Input::old('trade_violance_area') }}">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Đất SXKD" name="production_violance_area" value="{{ Input::old('production_violance_area') }}">
													</div>																								
													<div class="form_col">
														<input type="text" placeholder="Đất Nông Nghiệp" name="farming_violance_area" value="{{ Input::old('farming_violance_area') }}">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Công trình xây dựng</label>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Loại CTXD</label>
														<select name="structure_parent" id="structure_parent">
															@foreach (Structure::findByParent('kho-xuong')->get()->toArray() as $s)
															<option value="{{ $s['id'] }}">{{ $s['name'] }}</option>
															@endforeach
														</select>
													</div>
													<div class="form_col">
														<label>Kết cấu chính</label>
														<select name="structure" id="structure_child">
														</select>
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" name="total_ground_area" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select name="year_building">
															@foreach (AdjustOption::findByGroupId(9)->get()->toArray() as $s)
															<option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
															@endforeach
														</select>
													</div>
													
												</div>	
												<div class="form_row form_add_row_wrapper clearfix">
													<div class="form_col">
														<button class="btn btn_add_more_row">+ Thêm công trình xây dựng</button>
													</div>
												</div>																												
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Kết cấu chính</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select>
															<option>2016</option>
															<option>2015</option>
														</select>
													</div>
												</div>	
												<div class="form_row clearfix">
													<div class="popup_button_group groupThanhToan">
														<!-- <a href="thanh-toan.html"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a> -->
														@if( !Sentry::check() ) 
														<button data='.warehouse_form' type='submit' id="btn_dinhgia" class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@else
														<button  type='submit' class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
														@endif
													</div>
												</div>
											{{ Form::close() }}
											</div>
										</div>
									</div>
							  </article>
							</div>
						  </section>
						  
						</section>
					</div>
					
				</div>
			</div>
		</div>
		
	</div>
</div>

<div id="modal_alert" class="modal fade" role="dialog">	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4>Thông báo</h4>
			</div>
			<div class="modal-body">
				<div class="modal_info_inner clearfix">
					<div class="popup_button_group groupThanhToan">
						Vui lòng <a class="clogin cursor">Đăng nhập</a> hoặc chọn <a class="cnologin" href="#">Thanh toán nhanh</a>
						không cần <a class="clogin" href="#">Đăng kí tài khoản </a> để nhận kết quả định giá của bạn
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<script>
	function getOptions(val) {
		$.ajax({
	            url: '/public/structure',
	            type: 'get',
	            data: {id:val},
	            success: function(response) {
	            	var select = '';
	                $.each(response, function(i,data)
	                {
	                  select +='<option value="'+data.price+'">'+data.structure+'</option>';
	                });
	                $('#structure_child').html(select);
	            }
	        });


	}
	jQuery(document).ready(function() {
      var vitriOptions = [];
      var hinhDangThuaDatOptions = [];
      var yeuToKhacOptions = [];
      var chieuNgangOptions = [];
      var dienTichDatOptions = [];
      <?php 
      foreach($viTri as $item){
        ?>
            vitriOptions[<?php echo $item['id']?>] = {
              quanTrungTam: <?php echo $item['quanTrungTam']?>,
              quanKhac: <?php echo $item['quanKhac']?>,
              description: '<?php echo $item['description']?>'
            };
            <?php
      }
      ?>
       
      <?php 
      foreach($hinhDangThuaDat as $item){
        ?>
            hinhDangThuaDatOptions[<?php echo $item['id']?>] = {
              quanTrungTamMatTien: <?php echo $item['quanTrungTamMatTien']?>,
              quanTrungTamHem: <?php echo $item['quanTrungTamHem']?>,
              quanKhacMatTien: <?php echo $item['quanKhacMatTien']?>,
              quanKhacHem: <?php echo $item['quanKhacHem']?>
            };
            <?php
      }
      ?>    
      
      <?php 
      foreach($yeuToKhac as $item){
        ?>
            yeuToKhacOptions[<?php echo $item['id']?>] = {
              quanTrungTam: <?php echo $item['quanTrungTam']?>,
              quanKhac: <?php echo $item['quanKhac']?>
            };
            <?php
      }
      ?>   
          
      <?php 
      foreach($chieuNgang as $item){
        ?>
            chieuNgangOptions[<?php echo $item['id']?>] = {
              quanTrungTamMatTien: <?php echo $item['quanTrungTamMatTien']?>,
              quanTrungTamHem: <?php echo $item['quanTrungTamHem']?>,
              quanKhacMatTien: <?php echo $item['quanKhacMatTien']?>,
              quanKhacHem: <?php echo $item['quanKhacHem']?>,
              name: '<?php echo $item['description']?>'
            };
            <?php
      }
      ?>        
      
       <?php 
      foreach($dienTichDat as $item){
        ?>
            dienTichDatOptions[<?php echo $item['id']?>] = {
              quanTrungTamMatTien: <?php echo $item['quanTrungTamMatTien']?>,
              quanTrungTamHem: <?php echo $item['quanTrungTamHem']?>,
              quanKhacMatTien: <?php echo $item['quanKhacMatTien']?>,
              quanKhacHem: <?php echo $item['quanKhacHem']?>,
              name: '<?php echo $item['description']?>'
            };
            <?php
      }
      ?>        
		var formClass = '';

		getOptions(jQuery('#structure_parent').val());
		jQuery('#structure_parent').change(function() {
			var _this = jQuery(this);
			var val = _this.val();
	        getOptions(val);
		});

		jQuery('#btn_dinhgia').click(function(e) {
			e.preventDefault();
			formClass = jQuery(this).attr('data');
		});

		jQuery('.clogin').click(function(e) {			
			jQuery('.chooser').val('login');
			$(formClass).submit();
		});

		jQuery('.cnologin').click(function(e) {
			e.preventDefault();
			jQuery('.chooser').val('nologin');
			$(formClass).submit();
		});

		jQuery('#modal_dinhgia').modal('show');
        
        function setDinhGiaField(){
        }
        jQuery('.selectQuan, .selectVitri, .selectVitri, .selectHinhDangThuaDat,'+
                ' .selectYeuToKhac, .selectChieuNgang, .selectDienTichDat, .textChieuNgang, .textDienTichDat').change(function(){
          var quan = $(this).parents('.price-form').find('.selectQuan:first').val();
          var idOptionVitri = $(this).parents('.price-form').find('.selectVitri:first').val();
          var idOptionHinhDangThuaDat = $(this).parents('.price-form').find('.selectHinhDangThuaDat:first').val();         
          var idOptionYeuToKhac = $(this).parents('.price-form').find('.selectYeuToKhac:first').val();
          var idOptionChieuNgang = null;
          var idOptionDienTichDat = null;
          var textChieuNgang = $(this).parents('.price-form').find('.textChieuNgang:first').val();
          var textDienTich = $(this).parents('.price-form').find('.textDienTichDat:first').val();
          var selectHemMaTien = 'mat_tien';
          
          var vitriData = '';          
          var hinhDangThuaDatData = ''; 
          var yeuToKhacData = '';
          var chieuNgangData = '';
          var dienTichDatData = '';
          
          if(vitriOptions[idOptionVitri]){
            if(quan == 1 || quan == 3){
              vitriData = vitriOptions[idOptionVitri].quanTrungTam;
            }else{
              vitriData = vitriOptions[idOptionVitri].quanKhac;
            }
            if(vitriOptions[idOptionVitri].description.indexOf('hẻm') > -1){
              selectHemMaTien = 'hem';
            }
          }          
          $(this).parents('.price-form').find('.inputViTri:first').val(vitriData);                    
                    
          if(hinhDangThuaDatOptions[idOptionHinhDangThuaDat]){
            if(quan == 1 || quan == 3){
              if(selectHemMaTien == 'mat_tien'){
                hinhDangThuaDatData = hinhDangThuaDatOptions[idOptionHinhDangThuaDat].quanTrungTamMatTien;
              }else{
                hinhDangThuaDatData = hinhDangThuaDatOptions[idOptionHinhDangThuaDat].quanTrungTamHem;
              }
            }else{
              if(selectHemMaTien == 'mat_tien'){
                hinhDangThuaDatData = hinhDangThuaDatOptions[idOptionHinhDangThuaDat].quanKhacMatTien;
              }else{
                hinhDangThuaDatData = hinhDangThuaDatOptions[idOptionHinhDangThuaDat].quanKhacHem;
              }
            }            
          }
          $(this).parents('.price-form').find('.inputHinhDangThuaDat:first').val(hinhDangThuaDatData);  
          
          if(yeuToKhacOptions[idOptionYeuToKhac]){
            if(quan == 1 || quan == 3){
              yeuToKhacData = yeuToKhacOptions[idOptionYeuToKhac].quanTrungTam;
            }else{
              yeuToKhacData = yeuToKhacOptions[idOptionYeuToKhac].quanKhac;
            }            
          }
          $(this).parents('.price-form').find('.inputYeuToKhac:first').val(yeuToKhacData);             
                              
          for(var i in chieuNgangOptions){
            var partPrice = chieuNgangOptions[i]['name'].split('≤');
            if(!partPrice[0]){
              if(partPrice[1] && textChieuNgang*1 <= partPrice[1]*1){
                idOptionChieuNgang = i;
                break;
              }
            }else{
              partPrice = chieuNgangOptions[i]['name'].split(' - ≤');
              if(partPrice[1]){
                if(textChieuNgang*1 > partPrice[0]*1 && textChieuNgang*1 <= partPrice[1]*1){
                  idOptionChieuNgang = i;
                  break;
                }
              }else{
                partPrice = chieuNgangOptions[i]['name'].split('>');
                if(textChieuNgang*1 > partPrice[0]){
                  idOptionChieuNgang = i;
                  break;
                }
              }
            }
          }
          
          if(chieuNgangOptions[idOptionChieuNgang]){
            if(quan == 1 || quan == 3){
              if(selectHemMaTien == 'mat_tien'){
                chieuNgangData = chieuNgangOptions[idOptionChieuNgang].quanTrungTamMatTien;
              }else{
                chieuNgangData = chieuNgangOptions[idOptionChieuNgang].quanTrungTamHem;
              }
            }else{
              if(selectHemMaTien == 'mat_tien'){
                chieuNgangData = chieuNgangOptions[idOptionChieuNgang].quanKhacMatTien;
              }else{
                chieuNgangData = chieuNgangOptions[idOptionChieuNgang].quanKhacHem;
              }
            }            
          }
          $(this).parents('.price-form').find('.inputChieuNgang:first').val(chieuNgangData);
                    
          for(var i in dienTichDatOptions){
            var partPrice = dienTichDatOptions[i]['name'].split('≤');
            if(!partPrice[0]){
              if(partPrice[1] && textDienTich*1 <= partPrice[1]*1){
                idOptionDienTichDat = i;
                break;
              }
            }else{
              partPrice = dienTichDatOptions[i]['name'].split(' - ≤');
              if(partPrice[1]){
                if(textDienTich*1 > partPrice[0]*1 && textDienTich*1 <= partPrice[1]*1){
                  idOptionDienTichDat = i;
                  break;
                }
              }else{
                partPrice = dienTichDatOptions[i]['name'].split('>');
                if(textDienTich*1 > partPrice[0]){
                  idOptionDienTichDat = i;
                  break;
                }
              }
            }
          }
          if(dienTichDatOptions[idOptionDienTichDat]){
            if(quan == 1 || quan == 3){
              if(selectHemMaTien == 'mat_tien'){
                dienTichDatData = dienTichDatOptions[idOptionDienTichDat].quanTrungTamMatTien;
              }else{
                dienTichDatData = dienTichDatOptions[idOptionDienTichDat].quanTrungTamHem;
              }
            }else{
              if(selectHemMaTien == 'mat_tien'){
                dienTichDatData = dienTichDatOptions[idOptionDienTichDat].quanKhacMatTien;
              }else{
                dienTichDatData = dienTichDatOptions[idOptionDienTichDat].quanKhacHem;
              }
            }            
          }
          $(this).parents('.price-form').find('.inputDienTichDat:first').val(dienTichDatData); 
          
        });
        
       
	});
</script>
{{ HTML::script('default/js/map.js') }}
{{ HTML::style('default/css/custom.css') }}
@endsection