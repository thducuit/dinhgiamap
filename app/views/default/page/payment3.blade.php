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
								<div class="step_col">
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
								<div class="step_col active">
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
										<span>Hoàn tất</span>
										<div class="next_step hide"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="thanhtoan_body clearfix thanhtoan_body_step3">
						<div class="thanhtoan_left">
							<div class="thanhtoan_left_inner">
								<div class="complete_wrapper">
									<div class="icon_stick"></div>
									<p class="complete_text">Bạn đã hoàn tất quy trình thanh toán của chúng tôi.</p>
								</div>
							</div>
						</div>
						<div class="thanhtoan_right">
							<div class="summary_info">
								<div class="summary_info_item">
									<div class="summary_info_item_header">thông tin người thanh toán</div>
									<div class="summary_info_item_body">
										<div class="summary_info_item_row clearfix">
											<div class="summary_info_item_col">Họ tên:</div>
											<div class="summary_info_item_col">{{ $customer->name }}</div>
										</div>
										<div class="summary_info_item_row clearfix">
											<div class="summary_info_item_col">Email:</div>
											<div class="summary_info_item_col">{{ $customer->email }}</div>
										</div>
										<div class="summary_info_item_row clearfix">
											<div class="summary_info_item_col">Điện thoại:</div>
											<div class="summary_info_item_col">{{ $customer->mobile }}</div>
										</div>
									</div>
								</div>
								<div class="summary_info_item">
									<div class="summary_info_item_header">hình thức thanh toán</div>
									<div class="summary_info_item_body">
										<p>Thanh toán qua <strong>{{ $name_type }}</strong></p>
									</div>
								</div>
								<div class="summary_info_item">
									<div class="summary_info_item_header">thông tin loại dịch vụ <span><a href="#">Sửa</a><i></i></span></div>
									<div class="summary_info_item_body">
										<p>Sử dụng dịch vụ <strong>{{ $name_service }}</strong></p>
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

<!--.alert-->
@if( Session::get('message') )
<div id="modal_alert" class="modal fade" role="dialog">	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4>Thông báo</h4>
			</div>
			<div class="modal-body">
				<div class="modal_info_inner clearfix">
					<div class="popup_button_group">
						{{ Session::get('message') }}
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<script>
	jQuery(document).ready(function() {
		jQuery('#modal_alert').modal('show');
	});
</script>
@endif
<!--/.alert-->
{{ HTML::style('default/css/custom.css') }}
@endsection