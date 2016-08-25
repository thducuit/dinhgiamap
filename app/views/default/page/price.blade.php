@extends('default.layouts.default')
@section('content')

<!--
/*==============================*\
MAIN 
/*==============================*\
-->
<div id="main" class="screen">
	<div class="main_wrapper">
		
		<div class="block_overlay none">
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
		<div id="map_view"></div>	
		
		<!--
		POPUP
		-->
		<div class="popup_middle_wrapper">
			<div class="popup_middle">
				<div class="popup_middle_inner clearfix">
					
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
											{{ Form::open(array( 'url' => '/the-price', 'method'=>'post' )) }}
												<div class="form_row clearfix">
													<div class="form_col">
														<label class="highlight">Đất sử dụng riêng (*)</label>
													</div>
													<div class="form_col">
														<input type="text" name="total_area" placeholder="Tổng diện tích (m2)" value="">
													</div>
													<div class="form_col">
														<input type="text" name="horizontal" placeholder="Chiều ngang mặt tiền (m)" value="">
													</div>																										
													<div class="form_col">
														<input type="text" name="vertical" placeholder="Chiều dài lớn nhất (m)" value="">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Hình dạng thửa đất</label>
													</div>
													<div class="form_col">
														<select name="shape">
															<option>Vuông vức</option>
															<option>Hình chữ nhật</option>
														</select>
													</div>
												</div>														
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Đất phù hợp quy hoạch</label>
													</div>
													<div class="form_col">
														<input type="text" name="leaving_plan_area" placeholder="Diện tích đất ở (m)" value="">
													</div>
													<div class="form_col">
														<input type="text" name="farming_plan_area" placeholder="Diện tích đất Nông Nghiệp" value="">
													</div>																										
													<div class="form_col">
														<input type="text" name="building_plan_area" placeholder="Diện tích đất SX-XD" value="">
													</div>
												</div>											
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Đất vi phạm lộ giới được công nhận</label>
													</div>
													<div class="form_col">
														<input type="text" name="leaving_accept_area" placeholder="Diện tích đất ở (m)" value="">
													</div>
													<div class="form_col">
														<input type="text" name="farming_accept_area" placeholder="Diện tích đất Nông Nghiệp" value="">
													</div>																										
													<div class="form_col">
														<input type="text" name="building_accept_area" placeholder="Diện tích đất SX-XD" value="">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="popup_button_group">
														<a href="thanh-toan.html"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a>
														<button id="btn_dinhgia" class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
													</div>
												</div>
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
											{{ Form::open(array( 'url' => '/the-price', 'method'=>'post' )) }}
												<div class="form_row clearfix">
													<div class="form_col">
														<label class="highlight">Đất sử dụng riêng (*)</label>
													</div>
													<div class="form_col">
														<input type="text" name="total_area" placeholder="Tổng diện tích (m2)" value="">
													</div>
													<div class="form_col">
														<input type="text" name="horizontal" placeholder="Chiều ngang mặt tiền (m)" value="">
													</div>																										
													<div class="form_col">
														<input type="text" name="vertical" placeholder="Chiều dài lớn nhất (m)" value="">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Hình dạng thửa đất</label>
													</div>
													<div class="form_col">
														<select name="shape">
															<option>Vuông vức</option>
															<option>Hình chữ nhật</option>
														</select>
													</div>
												</div>														
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Đất phù hợp quy hoạch</label>
													</div>
													<div class="form_col">
														<input name="leaving_plan_area" type="text" placeholder="Diện tích đất ở (m)" value="">
													</div>
													<div class="form_col">
														<input name="farming_plan_area" type="text" placeholder="Diện tích đất Nông Nghiệp" value="">
													</div>																										
													<div class="form_col">
														<input name="building_plan_area" type="text" placeholder="Diện tích đất SX-XD" value="">
													</div>
												</div>											
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Đất vi phạm lộ giới được công nhận</label>
													</div>
													<div class="form_col">
														<input name="leaving_accept_area" type="text" placeholder="Diện tích đất ở (m)" value="">
													</div>
													<div class="form_col">
														<input name="farming_accept_area" type="text" placeholder="Diện tích đất Nông Nghiệp" value="">
													</div>																										
													<div class="form_col">
														<input name="building_accept_area" type="text" placeholder="Diện tích đất SX-XD" value="">
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
														<input name="structure[]" type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input name="total_ground_area[]" type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select name="building_year[]">
															<option>2016</option>
															<option>2015</option>
														</select>
													</div>
													<div class="form_col">
														<label>Năm sửa chữa (nếu có)</label>
														<select name="fixing_year[]">
															<option>2016</option>
															<option>2015</option>
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
														<input name="structure[]" type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Tổng diện tích sàn xd</label>
														<input name="total_ground_area[]" type="text" placeholder="" value="">
													</div>
													<div class="form_col">
														<label>Năm xây dựng</label>
														<select name="building_year[]">
															<option>2016</option>
															<option>2015</option>
														</select>
													</div>
													<div class="form_col">
														<label>Năm sửa chữa (nếu có)</label>
														<select name="fixing_year[]">
															<option>2016</option>
															<option>2015</option>
														</select>
													</div>
												</div>	
												<div class="form_row clearfix">
													<div class="popup_button_group">
														<a href="thanh-toan.html"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a>
														<button type='submit' id="btn_dinhgia" class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></button>
													</div>
												</div>
											{{ Form::close() }}
										</div>
									</div>
								</div>
								
								<!-- content tab biet thu -->
								<div>
									<div class="tab_header">
										biet thu
									</div>
									<div class="tab_body">
										a
									</div>
								</div>
								
								<!-- content tab can ho -->
								<div>
									<div class="tab_header">
										can ho
									</div>
									<div class="tab_body">
										a
									</div>
								</div>
								
								<!-- content tab khach san -->
								<div>
									<div class="tab_header">
										khach san
									</div>
									<div class="tab_body">
										a
									</div>
								</div>
								
								<!-- content tab toa nha van phong -->
								<div>
									<div class="tab_header">
										toa nha van phong
									</div>
									<div class="tab_body">
										a
									</div>
								</div>
								
								<!-- content tab kho xuong -->
								<div>
									<div class="tab_header">
										kho xuong
									</div>
									<div class="tab_body">
										a
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
										<p>Địa chỉ : 27 Phó Đức Chính, Phường Nguyễn Thái Bình Quận 1, TPHCM</p>
									</div>
									<div class="tab_body">
										<div class="tab_body_inner">
											<form>
												<div class="form_row clearfix">
													<div class="form_col">
														<label class="highlight">Đất sử dụng riêng (*)</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Tổng diện tích (m2)" value="">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Chiều ngang mặt tiền (m)" value="">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Chiều dài lớn nhất (m)" value="">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Hình dạng thửa đất</label>
													</div>
													<div class="form_col">
														<select>
															<option>Vuông vức</option>
															<option>Hình chữ nhật</option>
														</select>
													</div>
												</div>														
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Đất phù hợp quy hoạch</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Diện tích đất ở (m)" value="">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Diện tích đất Nông Nghiệp" value="">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Diện tích đất SX-XD" value="">
													</div>
												</div>											
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Đất vi phạm lộ giới được công nhận</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Diện tích đất ở (m)" value="">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Diện tích đất Nông Nghiệp" value="">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Diện tích đất SX-XD" value="">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="popup_button_group">
														<a href="thanh-toan.html"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a>
														<div id="btn_dinhgia" class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></div></a>
													</div>
												</div>
											</form>
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
										<p>Địa chỉ : 27 Phó Đức Chính, Phường Nguyễn Thái Bình Quận 1, TPHCM</p>
									</div>
									<div class="tab_body">
										<div class="tab_body_inner">
											<form>
												<div class="form_row clearfix">
													<div class="form_col">
														<label class="highlight">Đất sử dụng riêng (*)</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Tổng diện tích (m2)" value="">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Chiều ngang mặt tiền (m)" value="">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Chiều dài lớn nhất (m)" value="">
													</div>
												</div>
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Hình dạng thửa đất</label>
													</div>
													<div class="form_col">
														<select>
															<option>Vuông vức</option>
															<option>Hình chữ nhật</option>
														</select>
													</div>
												</div>														
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Đất phù hợp quy hoạch</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Diện tích đất ở (m)" value="">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Diện tích đất Nông Nghiệp" value="">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Diện tích đất SX-XD" value="">
													</div>
												</div>											
												<div class="form_row clearfix">
													<div class="form_col">
														<label>Đất vi phạm lộ giới được công nhận</label>
													</div>
													<div class="form_col">
														<input type="text" placeholder="Diện tích đất ở (m)" value="">
													</div>
													<div class="form_col">
														<input type="text" placeholder="Diện tích đất Nông Nghiệp" value="">
													</div>																										
													<div class="form_col">
														<input type="text" placeholder="Diện tích đất SX-XD" value="">
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
													<div class="form_col">
														<label>Năm sửa chữa (nếu có)</label>
														<select>
															<option>2016</option>
															<option>2015</option>
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
													<div class="form_col">
														<label>Năm sửa chữa (nếu có)</label>
														<select>
															<option>2016</option>
															<option>2015</option>
														</select>
													</div>
												</div>	
												<div class="form_row clearfix">
													<div class="popup_button_group">
														<a href="thanh-toan.html"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a>
														<div id="btn_dinhgia" class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></div></a>
													</div>
												</div>
											</form>
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
											<p>Địa chỉ : 27 Phó Đức Chính, Phường Nguyễn Thái Bình Quận 1, TPHCM</p>
										</div>
										<div class="tab_body">
											<div class="tab_body_inner">
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
											<p>Địa chỉ : 27 Phó Đức Chính, Phường Nguyễn Thái Bình Quận 1, TPHCM</p>
										</div>
										<div class="tab_body">
											<div class="tab_body_inner">
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
											<p>Địa chỉ : 27 Phó Đức Chính, Phường Nguyễn Thái Bình Quận 1, TPHCM</p>
										</div>
										<div class="tab_body">
											<div class="tab_body_inner">
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
											<p>Địa chỉ : 27 Phó Đức Chính, Phường Nguyễn Thái Bình Quận 1, TPHCM</p>
										</div>
										<div class="tab_body">
											<div class="tab_body_inner">
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
											<p>Địa chỉ : 27 Phó Đức Chính, Phường Nguyễn Thái Bình Quận 1, TPHCM</p>
										</div>
										<div class="tab_body">
											<div class="tab_body_inner">
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
{{ HTML::script('default/js/map.js') }}
{{ HTML::style('default/css/custom.css') }}
@endsection