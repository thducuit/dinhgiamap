@extends('default.layouts.default')
@section('content')


<!--
	/*==============================*\
	MAIN 
	/*==============================*\
-->
<div id="main" class="screen">
	<div class="main_wrapper">

		<div class="page_contact_wrapper page-guide-container clearfix">
			<div class="page_contact_left screen"></div>
			<div class="page_contact_right">
				<div class="page_contact_right_inner">


					<div class="page_contact_right_header">
						Hướng dẫn sử dụng
					</div>
					<section id="list_faq" data-accordion-group>

						<section data-accordion>
							<button data-control>Hướng dẫn đăng ký</button>
							<div data-content class="page-guide-item">
								<article>
									<div class="page-guide-header">
										<h1 class="header_main_title">ĐĂNG KÝ - ĐĂNG NHẬP <br>QUÊN MẬT KHẨU</h1>
									</div>
									<div class="page-guide-body">
										<p>- Chọn Đăng ký  từ menu danh mục</p>
										<p><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_24.jpg') }}"></p>
										<p>- Khách hàng nhập thông tin bao gồm ( email đăng nhập, mật khẩu (có ít nhất 8 ký tự), họ và tên, điện thoại, giới tính, ngày sinh, địa chỉ.</p>
										<p><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_25.jpg') }}"></p>
										<p>- Chọn Đăng nhập  từ menu danh mục</p>
										<p><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_26.jpg') }}"></p>
										<p>- Khách hàng nhập Email hoặc Số điện thoại</p>
										<p>- Nhập tiếp mật khẩu để đăng nhập.</p>
										<p>- Hoàn tất </p>
									</div>
								</article>
							</div>
						</section>

						<section data-accordion>
							<button data-control>Hướng dẫn thanh toán</button>
							<div data-content class="page-guide-item">
								<article>
									<div class="page-guide-header">
										<h1 class="header_main_title">HƯỚNG DẪN THANH TOÁN</h1>
										<p class="header_sub_title">(Các hình thức thanh toán DGOL)</p>
									</div>
									<div class="page-guide-body">
										<p>- Internet banking (Thanh toán trực tuyến bằng thẻ ATM nội địa</p>
										<p><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_13.jpg') }}"></p>
										<p>- Thanh toán bằng thẻ Visa</p>
										<p><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_14.jpg') }}"></p>
										<p>- Thẻ cào điện thoại/nhắn tin SMS</p>
										<p><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_15.jpg') }}"></p>
										<p>- Chuyển khoản và thanh toán tại VIP</p>
										<p><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_16.jpg') }}"></p>
										<hr>
										<p><strong>Bước 1 (phần bắt buộc):</strong></p>
										<p>- Đăng nhập</p>
										<p><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_17.jpg') }}"></p>
										<p><strong>Bước 2 (phần bắt buộc):</strong></p>
										<p>- Chọn gói dịch vụ để thanh toán + Chọn hình thức thanh toán</p>
										<p><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_18.jpg') }}"></p>
										<p><strong>Bước 3 (phần bắt buộc):</strong></p>
										<p>- Xử lý và xác nhận thanh toán</p>
										<p><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_19.jpg') }}"></p>
										<p><strong>Bước 4 (phần bắt buộc):</strong></p>
										<p>- Nhận kết quả định giá</p>
										<p><center><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_20.jpg') }}"></center></p>
										<p>- Hoặc sử dụng dịch vụ</p>
										<p><center><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_21.jpg') }}"></center></p>
										<p><center><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_22.jpg') }}"></center></p>
										<p><center>Quí khách vui lòng đọc kỹ hướng dẫn thanh toán hoặc điều khoản thanh toán</center></p>
										<p><center>(Các giao dịch thanh toán được xử lý tại cổng thanh toán được cung cấp từ đối tác thứ 3)</center></p>
										<p><center><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_23.jpg') }}"></center></p>
									</div>
								</article>
							</div>
						</section>

						<section data-accordion>
							<button data-control>Hướng dẫn liên hệ phát hành chưng thư</button>
							<div data-content>
								<article>
									<div class="page-guide-header">
										<h1 class="header_main_title">LIÊN HỆ PHÁT HÀNH CHỨNG THƯ</h1>
										<p class="header_sub_title">(Văn bản có giá trị pháp lý – tính phí cenvalue offline)</p>
									</div>
									<div class="page-guide-body">
										<p>- Liên hệ <span style="color: #d22026;"><strong>Hotline 0909…..</strong></span> để gặp trực tiếp chuyên viên tư vấn.</p>
										<p>- Icon Liên hệ định giá ( footer )</p>
										<p><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_11.jpg') }}"></p>             
										<p>- Liên hệ tư vấn từ menu</p>
										<p><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_12.jpg') }}"></p> 
									</div>
								</article>
							</div>
						</section>

						<section data-accordion>
							<button data-control>Hướng dẫn xem đơn giá</button>
							<div data-content>
								<article>
									<div class="page-guide-header">
										<h1 class="header_main_title">Hướng dẫn xem đơn giá</h1>
										<p class="header_sub_title">(Giá trị thị trường giao dịch của tài sản & đơn giá đất nhà nước)</p>
									</div>
									<div class="page-guide-body">
										<p>- Nhập địa chỉ tài sản cần tra cứu tại thanh tìm kiếm</p>
										<p><center><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_1.jpg') }}"></center></p>
										<p>- Click vào icon vị trí trên bản đồ.</p>
										<p>- Nhấn giữ và kéo rê icon vị trí tới địa điểm xem đơn giá</p>
										<p><center><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_2.jpg') }}"></center></p>
										<p>- Chọn vào icon vị trí trên bản đồ để biết Đơn giá</p>
										<p><center><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_3.jpg') }}"></center></p>
									</div>
								</article>
							</div>
						</section>

						<section data-accordion>
							<button data-control>Hướng dẫn xem định giá</button>
							<div data-content>
								<article>
									<div class="page-guide-header">
										<h1 class="header_main_title">Hướng dẫn xem định giá</h1>
										<p class="header_sub_title">(Giá trị cụ thể của tài sản)</p>
									</div>
									<div class="page-guide-body">
										<p>- Chọn nút Định giá ở popup hiển thị</p>
										<p><center><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_4.jpg') }}"></center></p>
										<p>- Chọn loại tài sản cần định giá <strong>(Đất trống, Nhà phố, Biệt thự, Căn hộ, Khách sạn, Tòa nhà văn phòng, Kho xưởng)</strong></p>
										<p><center><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_5.jpg') }}"></center></p>
										<p>- Nhập thông số chi tiết của tài sản (<span style="color: #d22026;">nhập các thông tin yêu cầu bắt buộc</span> <strong>– Lưu ý : nhập càng chi tiết kết quả càng chính xác</strong>)</p>
										<p>- Nhấn nút “Định giá” <img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_6.jpg') }}"></p>
									</div>
								</article>
							</div>
						</section>

						<section data-accordion>
							<button data-control>Hướng dẫn xem quy hoạch</button>
							<div data-content>
								<article>
									<div class="huongdan_header">
										<h1 class="header_main_title">HƯỚNG DẪN XEM QUY HOẠCH</h1>
										<p class="header_sub_title">(Xem quy hoạch tại khu vực tài sản tọa lạc)</p>
									</div>
									<div class="huongdan_body">
										<p>- Chọn nút xem quy hoạch ở popup hiển thị</p>
										<p><center><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_7.jpg') }}"></center></p>
										<p><center><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_8.jpg') }}"></center></p>
										<p>- Nhập thông tin tỉnh/thành, quận/huyện, phường/xã, tên đường, (<span style="color: #d22026;">số thửa / số tờ trên giấy chứng nhận QSDĐ</span>).</p>
										<p><center><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_9.jpg') }}"></center></p>
										<p>- Nhấn nút “Xem quy hoạch” để xem kết quả</p>
										<p><img src="{{ URL::asset('default/images/huongdan/cenvalue_huongdan_10.jpg') }}"></p>
										<p>- Nếu khách hàng muốn <strong>nhận văn bản quy hoạch</strong> <span style="color: #d22026;">có chứng thực của cơ quan Nhà nước trong thời gian nhanh nhất</span>, khách hàng vuilòng để lại thông tin hoặc liên hệ trực tiếp với chuyên viên tư vấn để hỗ trợ.</p>
										<p><em>(Dịch vụ có tính phí)</em></p>
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
@endsection