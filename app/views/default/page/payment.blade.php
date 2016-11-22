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
										<div class="back_step hide"></div>
										<span>Chọn gói dịch vụ</span>
										<div class="next_step"></div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="thanhtoan_body clearfix thanhtoan_body_step1">
						{{ Form::open(array('url'=>'/payment/step1', 'method'=>'post')) }}
						<div class="thanhtoan_left">
							<!--.errors-->
						    @if( $errors->has() )
						    <div class="row errors">
						        <div class="col-md-12">
					                @foreach( $errors->all() as $error )
					                <p class='error'>{{ $error }} </p>
					        		@endforeach
								</div>
						    </div>
						    @endif
							<!--/.errors-->
							<div class="thanhtoan_left_inner">
											<div class="form_group">
												<div class="form_group_header">
													<span>Chọn gói dịch vụ cần thanh toán</span>
												</div>
												<div class="expand_field_group">
                                                                                                    <div class="row">
                                                                                                        <div class="col-sm-4">
                                                                                                            <div class="form_field field_goidichvu">
														<label>
															<input type="radio" name="goidichvu_thanhtoan" id="goidichvu_thanhtoan_dichvudinhgia" value="goidichvu_thanhtoan_dichvudinhgia">
															Dịch vụ định giá
														</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                       <div class="col-sm-4">
                                                                                                            <div class="form_field field_goidichvu">
														<label>
															<input type="radio" name="goidichvu_thanhtoan" id="goidichvu_thanhtoan_xemdongia" value="goidichvu_thanhtoan_xemdongia">
															Xem đơn giá
														</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-4">
                                                                                                            <div class="form_field field_goidichvu">
														<label>
															<input type="radio" name="goidichvu_thanhtoan" id="goidichvu_thanhtoan_dinhGiavaxemDonGia" value="goidichvu_thanhtoan_dinhGiavaxemDonGia">
															Dịch vụ Định giá & Xem đơn giá
														</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col-sm-4">
                                                                                                            <div class="form_field field_goidichvu">
														<label>
															<input type="radio" name="goidichvu_thanhtoan" id="goidichvu_thanhtoan_gioiMotTram" value="100000">
															Gói 100.000 VND
														</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                       <div class="col-sm-4">
                                                                                                            <div class="form_field field_goidichvu">
														<label>
															<input type="radio" name="goidichvu_thanhtoan" id="goidichvu_thanhtoan_gioiBaTram" value="300000">
															Gói 300.000 VND
														</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-4">
                                                                                                            <div class="form_field field_goidichvu">
														<label>
															<input type="radio" name="goidichvu_thanhtoan" id="goidichvu_thanhtoan_gioiNamTram" value="500000">
															Gói 500.000 VND
														</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col-sm-4">
                                                                                                            <div class="form_field field_goidichvu">
														<label>
															<input type="radio" name="goidichvu_thanhtoan" id="goidichvu_thanhtoan_gioiNamTram" value="1000000">
															Gói 1.000.000 VND
														</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                       <div class="col-sm-4">
                                                                                                            <div class="form_field field_goidichvu">
														
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-4">
                                                                                                            <div class="form_field field_goidichvu">
														
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

													
												</div>
                                                                                            
											</div>
                                                                                        <div class="form_group_body">
                                                                                                    <div class="form_field field_btn_tieptuc text-right">
														 <button type="submit" href="thanh-toan-chon-hinh-thuc-thanh-toan.html" class="btn btn-info btn-sm btn_tieptuc">
                                                                                                             Tiếp tục <span class="glyphicon glyphicon-arrow-right"></span>
                                                                                                        </button>
													</div>
                                                                                            </div>
										</div>
							{{ Form::close() }}	

							<!-- <div class="thanhtoan_left_inner">
								<div class="form_group">
									<div class="form_group_header">
										<span>Chọn gói dịch vụ cần thanh toán</span>
									</div>
									<div class="form_group_body clearfix">
										<div class="form_field field_goidichvu">
											<label>
												@if ( $payment == 1 )
												<input type="radio" checked name="payment_package" id="goidichvu_thanhtoan_dichvudinhgia" value="1">
												@else
												<input type="radio" name="payment_package" id="goidichvu_thanhtoan_dichvudinhgia" value="1">
												@endif
												Dịch vụ định giá
											</label>
										</div>
										<div class="form_field field_goidichvu">
											<label>
												<input type="radio" name="payment_package" id="goidichvu_thanhtoan_xemquihoach" value="goidichvu_thanhtoan_xemquihoach">
												Xem qui hoạch
											</label>
										</div>
										<div class="form_field field_goidichvu">
											<label>
												@if ( $payment == 3 )
												<input type="radio" checked  name="payment_package" id="goidichvu_thanhtoan_muagoitaikhoan" value="3">
												@else
												<input type="radio"  name="payment_package" id="goidichvu_thanhtoan_muagoitaikhoan" value="3">
												@endif
												Mua gói tài khoản
											</label>
										</div>
										<!-- <div class="form_field field_goidichvu">
											<label>
												<input type="radio" name="payment_package" id="goidichvu_thanhtoan_taisancungdongia" value="price">
												Tài sản cùng đơn giá
											</label>
										</div> -->
										<!-- <div class="form_field field_btn_tieptuc">
											<button type="submit" class="btn btn_tieptuc">Tiếp tục</button>
										</div> -->
									<!--</div>
								</div>
							</div> -->
						{{ Form::close() }}
						</div>

						<!-- <div class="thanhtoan_right">
						
						</div> -->
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
@endsection