@extends('default.layouts.default')
@section('content')
<!--
/*==============================*\
MAIN 
/*==============================*\
-->
<div id="main" class="screen">
	<div class="main_wrapper">
		
		<div class="page_thanhtoan_wrapper clearfix">
			<div class="page_thanhtoan_left screen"></div>
			<div class="page_thanhtoan_right">
				<div class="page_thanhtoan_right_inner">
					<div class="thanhtoan_header">
						<div class="step_container clearfix">
							<!-- dùng cho desktop-->
							<div class="desktop">
								<div class="step_col active">
									<div class="step_col_inner">
										<span class="icon_check"></span>
										<span>Chọn gói dịch vụ</span>
									</div>
								</div>
								<div class="step_col">
									<div class="step_col_inner">
										<span class="icon_check"></span>
										<span>Chọn hình thức thanh toán</span>
									</div>
								</div>
								<div class="step_col">
									<div class="step_col_inner">
										<span class="icon_check"></span>
										<span>Hoàn tất</span>
									</div>
								</div>
							</div>
							<!-- dùng cho mobile-->
							<div class="mobile">
								<div class="step_col">
									<div class="step_col_inner">
										<div class="back_step"></div>
										<span>Chọn hình thức thanh toán</span>
										<div class="next_step"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="thanhtoan_body clearfix thanhtoan_body_step2">
						<div class="thanhtoan_left">
							<div class="thanhtoan_left_inner">
								<div class="form_group form_group_thongtinthanhtoan">
									<div class="form_group_header">
										<span>Thông tin thanh toán</span>
									</div>
									<div class="form_group_body clearfix">
										<div class="form_field field_lastname">
											<label>Họ(*)</label>
												<input type="text">
											</label>
										</div>
										<div class="form_field field_firstname">
											<label>Tên(*)</label>
												<input type="text">
											</label>
										</div>
										<div class="form_field field_email">
											<label>Email(*)</label>
												<input type="email">
											</label>
										</div>
										<div class="form_field field_phone">
											<label>Điện thoại(*)</label>
												<input type="phone">
											</label>
										</div>
									</div>
								</div>
								<div class="form_group form_group_hinthucthanhtoan">
									<div class="form_group_header">
										<span>Hình thức thanh toán</span>
									</div>
									<div class="form_group_body clearfix">
									
										<div class="form_group_body clearfix">
											
											<div class="clearfix">
												<div class="form_field field_hinhthucthanhtoan">
													<label>
														<input type="radio" name="hinhthucthanhtoan" id="hinhthucthanhtoan_internetbanking" value="hinhthucthanhtoan_internetbanking">
														Thanh toán qua Internet Banking
													</label>
												</div>
												<div class="form_field field_hinhthucthanhtoan">
													<label>
														<input type="radio" name="hinhthucthanhtoan" id="hinhthucthanhtoan_taivanphong" value="hinhthucthanhtoan_taivanphong">
														Thanh toán tại văn phòng
													</label>
												</div>
												<div class="form_field field_hinhthucthanhtoan">
													<label>
														<input type="radio" name="hinhthucthanhtoan" id="hinhthucthanhtoan_visa" value="hinhthucthanhtoan_visa">
														Thẻ tín dụng Visa
													</label>
												</div>
												<div class="form_field field_hinhthucthanhtoan">
													<label>
														<input type="radio" name="hinhthucthanhtoan" id="hinhthucthanhtoan_thuphitainha" value="hinhthucthanhtoan_thuphitainha">
														Thu phí tận nhà
													</label>
												</div>
											</div>
											
											<div class="expand_container">
												
												<!-- thông tin mở rộng cho loại hình thanh toán qua internet banking -->
												<div class="expand_group expand_internetbanking clearfix">
													<div class="expand_field_group">
														<div class="expand_field">
															<input type="text" placeholder="Địa chỉ (*)">
														</div>
														<div class="expand_field">
															<input type="text" placeholder="Tỉnh thành (*)">
														</div>
														<div class="expand_field">
															<input type="text" placeholder="Quận huyện (*)">
														</div>
													</div>
													<div class="expand_field_group">
														<div class="expand_field">
															<textarea placeholder="Ghi chú"></textarea>
														</div>
													</div>
													<div class="expand_field_group">
														<div class="expand_content"><img src="images/list_bank.jpg"></div>
													</div>
												</div>
												
												<!-- thông tin mở rộng cho loại hình thanh toán tại văn phòng -->
												<div class="expand_group expand_thanhtoantaivanphong clearfix">
													<div class="expand_field_group">
														<div class="expand_content">
															<div class="block_contact">
																<div class="contact_item">
																	<div class="contact_item_header">Địa Chỉ:</div>
																	<div class="contact_item_body">
																		<p>TP.HCM : 36 Bùi Thị Xuân,<br>
																		Phường Bến Thành, Quận 1, TP.HCM</p>
																		<p>HÀ NỘI : Tầng 20,Tòa nhà 319 Bộ Quốc phòng,<br>
																		63 Lê Văn Lương, Trung Hòa, Cầu Giấy, Hà Nội</p>
																	</div>
																</div>
															</div>
															<div class="block_contact clearfix">
																<div class="contact_item">
																	<div class="contact_item_header">Điện thoại:</div>
																	<div class="contact_item_body">
																		<p>(08) 39 256 973<br>
																		(04) 32222.786</p>												
																	</div>
																</div>
																<div class="contact_item">
																	<div class="contact_item_header">Email liên hệ hỗ trợ:</div>
																	<div class="contact_item_body">
																		<p>hi@cenvalue.vn </p>												
																	</div>
																</div>
																<div class="contact_item">
																	<div class="contact_item_header">Hotline:</div>
																	<div class="contact_item_body">
																		<p>1900 9079</p>												
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											
											<div class="form_field field_btn_tieptuc">
												<a class="btn btn_tieptuc" href="{{ URL::to('/payment3') }}">Tiếp tục</a>
											</div>
										</div>													
										
									</div>
								</div>
							</div>
						</div>
						<div class="thanhtoan_right">
							<div class="summary_info">
								<div class="summary_info_item">
									<div class="summary_info_item_header">thông tin loại dịch vụ <span><a href="#">Sửa</a><i></i></span></div>
									<div class="summary_info_item_body">
										<p>Sử dụng dịch vụ <strong>Định giá</strong></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
@endsection