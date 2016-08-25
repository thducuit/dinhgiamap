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
						<div class="thanhtoan_left">
							<div class="thanhtoan_left_inner">
								<div class="form_group">
									<div class="form_group_header">
										<span>Chọn gói dịch vụ cần thanh toán</span>
									</div>
									<div class="form_group_body clearfix">
										<div class="form_field field_goidichvu">
											<label>
												<input type="radio" name="goidichvu_thanhtoan" id="goidichvu_thanhtoan_dichvudinhgia" value="goidichvu_thanhtoan_dichvudinhgia">
												Dịch vụ định giá
											</label>
										</div>
										<div class="form_field field_goidichvu">
											<label>
												<input type="radio" name="goidichvu_thanhtoan" id="goidichvu_thanhtoan_xemquihoach" value="goidichvu_thanhtoan_xemquihoach">
												Xem qui hoạch
											</label>
										</div>
										<div class="form_field field_goidichvu">
											<label>
												<input type="radio" name="goidichvu_thanhtoan" id="goidichvu_thanhtoan_muagoitaikhoan" value="goidichvu_thanhtoan_muagoitaikhoan">
												Mua gói tài khoản
											</label>
										</div>
										<div class="form_field field_goidichvu">
											<label>
												<input type="radio" name="goidichvu_thanhtoan" id="goidichvu_thanhtoan_taisancungdongia" value="goidichvu_thanhtoan_taisancungdongia">
												Tài sản cùng đơn giá
											</label>
										</div>
										<div class="form_field field_btn_tieptuc">
											<a class="btn btn_tieptuc" href="{{ URL::to('/payment2') }}">Tiếp tục</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="thanhtoan_right">
						
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
@endsection