@extends('default.layouts.default')
@section('content')

<!--
/*==============================*\
MAIN 
/*==============================*\
-->
<div id="main" class="screen">
	<div class="main_wrapper">
							
		<!--
		MAP VIEW
		-->
		<div id="map_view"></div>	
		

		<!-- Modal -->
		<div id="modal_ketquadinhgia" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-body">
						
						<div class="modal_ketquadinhgia_header clearfix">
							<div class="modal_ketquadinhgia_header_logo">
								<img src="{{ URL::asset('default/images/logo-dinhgia-forweb-final_1.png') }}">
							</div>									
							<div class="modal_ketquadinhgia_header_right clearfix">
								<div class="modal_ketquadinhgia_header_right_col">
									<p><strong>Công ty Cổ Phần Thẩm Định Giá Thế Kỷ</strong></p>
									<p>Miền Nam:</br>
									Tầng 2, tòa nhà HDTC, 36 Bùi Thị Xuân, Q1, Tp HCM</br>
									<strong>Tel:</strong> (84.8) 3925 6973   -   <strong>Fax:</strong> (84.8) 3925 6955
									</p>
								</div>
								<div class="modal_ketquadinhgia_header_right_col">
									<p><strong>Email:</strong></br>
									dinhgiaonline@gmail.com</br>
									thamdinhgiatheky@cengroup.vn</p>
									<p><strong>Website:</strong></br>
									www.thamdinhgiatheky.vn</p>
								</div>
							</div>									
						</div	>
						<div class="popup_middle_body">
							<div class="ketquadinhgia_wrapper">
								<div class="ketquadinhgia_header">
									<h3 class="ketquadinhgia_title">KẾT QUẢ ĐỊNH GIÁ BẤT ĐỘNG SẢN</h3>
									<p>Kính gửi: Quý khách hàng</p>
									<p><strong>Công ty Cổ Phần Thẩm Định Giá Thế Kỷ (Cen Value)</strong> cám ơn sự tín nhiệm của Quý khách về dịch vụ thẩm định giá của chúng tôi. Sau khi nhận được yêu cầu và mục đích thẩm định giá của Quý khách hàng. Qua quá trình nghiên cứu và đưa ra các biên pháp thực hiện, căn cứ vào tình hình giao dich thực tế của thị trường và đặc tính công việc, chúng tôi trân trọng thông báo đến Quý khách Kết quả đánh giá sơ bộ thị trường tài sản bất động sản của Qúy khách hàng, cụ thể như sau:</p>
									<h3 class="ketquadinhgia_title">ĐỊA CHỈ ĐỊNH GIÁ TÀI SẢN</h3>
									<p>{{ $result['name'] }}</p>
									
									<div id="btn_xemtaisandinhgia" class="btn btn_icon btn_gradient3"><a href="#"><i class="icon_dinhgia"></i><span>Xem tài sản đã định giá</span></a></div>
									
								</div>
								<div class="ketquadinhgia_body">
									<table class="ketquadinhgia_table">
										<thead>
											<tr>
												<th>STT</th>
												<th>HẠNG MỤC</th>
												<th>GIÁ TRỊ</th>
												<th>ĐƠN VỊ TÍNH</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>I</td>
												<td><strong>Quyền sử dụng đất</strong></td>
												<td>{{ $result['total_price'] }}</td>
												<td>VNĐ</td>
											</tr>
											<tr>
												<td></td>
												<td>Đơn giá thị trường đất ở bình quân</td>
												<td>{{ $result['unit_price'] }}</td>
												<td>VNĐ/M2</td>
											</tr>
											<tr>
												<td>II</td>
												<td><strong>Quyền sở hữu công trình xây dựng</strong></td>
												<td>{{ $result['building_price'] }}</td>
												<td>VNĐ</td>
											</tr>
											<tr>
												<td>III</td>
												<td><strong>Tổng giá trị (I+II)</strong></td>
												<td>{{ $result['total'] }}</td>
												<td>VNĐ</td>
											</tr>													
										</tbody>
									</table>
									<p>* Đơn giá đất ở UB mặt tiền đương XXXXX là: 15,000,000</p>
									<p>* Biên độ chênh lệch ± 10% giữa giá trị sơ bộ và giá trị thực tế  khi Chuyên viên thẩm định giá khảo sát thực tế hiện trạng tài sản.</p>
								</div>
								<div id="show_ketquadinhgia_popup_note" class="btn btn_arrow btn_arrow00757b"><a>Xem thông tin lưu ý<i></i></a></div>
								<div class="ketquadinhgia_popup_note">
									<div class="ketquadinhgia_popup_note_header">
										<p>Xem thông tin lưu ý</p>
										<div class="btn btn_close"><a>Đóng lại</a></div>
									</div>
									<div class="ketquadinhgia_popup_note_body">
										<p>- Cen Value cung cấp kết quả thẩm định giá sơ bộ mang tính chất tư vấn theo đúng mục đích yêu cầu và sử dụng hệ thống cơ sở dữ liệu thị trường kết hợp với các phân tích khu vực Bất động sản tọa lạc sẵn có mà chưa thực hiện khảo sát hiện trạng, do đó kết quả sơ bộ chưa phải là quyết định cuối cùng. Kết quả thẩm định chỉ được xác nhận khi Cen Value hoàn thành việc khảo sát thực tế.</p>
										<p>-  Cen Value không thẩm định tính sở hữu hợp pháp hay những thay đổi pháp lý trên giấy tờ gốc mà có thể hiện hoặc không thể hiện trên bản sao đã được cung cấp, và  Cen Value giả định rằng tất cả thông tin mà quý khách đã cung cấp là trung thực và chính xác.</p>
										<p>- Để các kết quả sơ bộ chính xác hơn, Cen Value đề xuất khách hàng cung cấp các thông tin liên quan đến tài sản một cách thực tế và khách quan nhất nhằm có đánh gia tối ưu nhất về giá trị tài sản của mình. <br>Hoặc liên hệ ngay với chúng tôi để được các chuyên viên hỗ trợ.</p>
										<p>- Chuyên viên định giá của Cen Value sẽ TRỰC TIẾP KHẢO SÁT, ĐÁNH GIÁ THỰC TẾ nhằm tư vấn tốt nhất, tối ưu nhất về giá trị tài sản, cũng như pháp lý, đồng thời Cen Value sẽ cung cấp cho khách hàng MỘT BẢN CHỨNG THƯ  & MỘT BẢN BÁO CÁO ĐẦY ĐỦ về hiện trạng và giá trị tài sản khi có yêu cầu.</p>
										<p>- CENVALUE PHÁT HÀNH CHỨNG THƯ THẨM ĐỊNH GIÁ với các mục đích THẾ CHẤP VAY VỐN / CHỨNG MINH NĂNG LỰC TÀI CHÍNH / BẢO LÃNH / MUA BÁN / DU HỌC	/ ĐỊNH CƯ NƯỚC NGOÀI / KIỂM TOÁN ……</p>
										<p>- Quý khách vui lòng liên hệ <strong>Hotline - 090 231 7679</strong> hoặc Chuyên viên của chúng tôi khi có các phản hồi hoặc nhu cầu về thẩm định gíá để được hỗ trợ.</p>
										<p>- Kết quả sơ bộ có hiệu lực trong thời gian 3 (ba) ngày kể từ ngày thông báo.</p> 
										<p>Rất mong sự phản hồi của Quý khách.</p>
									</div>
								</div>
								<div class="ketquadinhgia_bottom_button">
									<a class="hotline" href="tel:0902317679">Hotline</a>
									<a class="print" href="#">Print</a>
									<a class="email" href="mailto:dinhgiaonline@gmail.com">Email</a>
								</div>
							</div>
						</div>	
						
					</div>
				</div>
				
			</div>
		</div>							

		<script>
			$( document ).ready(function(){
				$('#modal_ketquadinhgia').modal('show');
			});						
		</script>
		
	</div>
</div>
{{ HTML::script('default/js/map.js') }}
{{ HTML::style('default/css/custom.css') }}
@endsection
			