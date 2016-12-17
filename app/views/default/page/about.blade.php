@extends('default.layouts.default')
@section('content')

<!--
/*==============================*\
MAIN 
/*==============================*\
-->
<!-- <div id="main" class="screen">
	<div class="main_wrapper">
		
		<div class="about_us_wrapper">
			<div class="desktop">
				<div class="about_us_slider">
					<div class="zslider screen" data-option="theme:'linear',
						transition:'fade',
						transitionTime:1600,
						preload: false,
						autoplay: true,
						autoplayTime: 6000,
						border: false,
						navButton: true,
						navThumb: false,
						navDot: false,
						fullscreenWidth: true,
						fullHeight: true,
						navThumbTemplate: '<a></a>',
						navDotTemplate: '<a>.</a>'">
						<ul>
							<li>
								<img src="{{ URL::asset('default/images/about_banner1.jpg') }}" largesrc="{{ URL::asset('default/images/about_banner1.jpg') }}" />									
								<div class="elements">
									<div class="main_width">
										<div class="slider_content">
											<div class="slider_content_inner">
												<h3>Thẩm định giá Thế Kỷ (CenValue)<h3>
												<p>Để định giá tài sản tại một thời điểm một cách chính xác là một việc rất khó, nhất là trong lĩnh vực bất động sản khi thị trường biến động không ngừng. Tài sản BĐS là tài sản có giá trị lớn vì thế định giá sai lệch 1 chút cũng là con số lớn.</p>
												<p>Tuy nhiên hoạt động thẩm định giá tại nước ta chưa phổ biến, chi phí cao. Vì thế để giúp cá nhân hay doanh nghiệp dễ dàng, nhanh chóng, chính xác và ít tốn kém khi cần định giá tài sản BĐS, Công ty Cổ phần Thẩm định giá Thế Kỷ (Cen Value) đưa ra thị trường công cụ định giá trực tuyến ngay trên máy tính và điện thoại di động.</p>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li>
								<img src="{{ URL::asset('default/images/about_banner2.jpg') }}" largesrc="{{ URL::asset('default/images/about_banner2.jpg') }}" />
								<div class="elements">
									<div class="main_width">
										<div class="slider_content">
											<div class="slider_content_inner">
												<h3>Định giá trực tuyến đầu tiên của Việt Nam</h3>
												<p>Trong thời gian nghiên cứu hơn 5 năm và sử dụng hơn 100 cộng tác viên tiến hành khảo sát thực tế từng tuyến đường, con hẻm trong thành phố, CEN VALUE đã viết ra phần mềm thẩm định giá online đầu tiên tại Việt Nam dành riêng cho mảng BĐS. Tất cả phép toán đều được xây dựng một cách khoa học, qua nhiều lần thử nghiệm và hoàn thiện nhằm  đưa ra kết quả chính xác lên đến 95%.</p>
												<p>Chất lượng dịch vụ của thẩm định giá online cũng đã được nhiều khách hàng, đối tác sử dụng và đánh giá rất cao. Vì vậy, khách hàng có thể hoàn toàn yên tâm về độ chính xác, tin cậy mà thẩm định giá online mang lại.</p>
											</div>
										</div>												
									</div>
								</div>
							</li>
							<li>
								<img src="{{ URL::asset('default/images/about_banner3.jpg') }}" largesrc="{{ URL::asset('default/images/about_banner3.jpg') }}" />									
								<div class="elements">
									<div class="main_width">
										<div class="slider_content">
											<div class="slider_content_inner">
												<h3>Đối tượng sử dụng định giá trực tuyến:<h3>														
												<p>- Cá nhân có nhu cầu định giá BĐS để mua bán, vay vốn ngân hàng, thừa kế…</p>
												<p>- Tổ chức tín dụng, ngân hàng và doanh nghiệp có nhu cầu thẩm định giá BĐS</p>
												<h3>Thao tác sử dụng dễ dàng:<h3>														
												<p>Khách hàng chỉ cần truy cập vào trang mạng www.dinhgiatructuyen.vn , điền đầy đủ thông tin theo yêu cầu sẽ nhận ngay kết quả miễn phí.</p>
												<p>Khách hàng có nhu cầu báo giá chính xác và có dấu chứng thực thì sẽ thanh toán thêm phí. Hoặc có thể liên hệ hotline để được đội ngũ tư vấn hỗ trợ trực tiếp.</p>
												<div class="btn btn_arrow btn_arrow00757b"><a href="lien-he.html">Đi đến trang liên hệ <i></i></a></div>													
											</div>												
										</div>												
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				
			</div>
			
			<div class="mobile">
				<div class="about_block">
					<div class="about_block_image">
						<img src="{{ URL::asset('default/images/about_banner1.jpg') }}">
					</div>
					<div class="about_block_content">
						<h3>Thẩm định giá Thế Kỷ (CenValue)<h3>
						<p>Để định giá tài sản tại một thời điểm một cách chính xác là một việc rất khó, nhất là trong lĩnh vực bất động sản khi thị trường biến động không ngừng. Tài sản BĐS là tài sản có giá trị lớn vì thế định giá sai lệch 1 chút cũng là con số lớn.</p>
						<p>Tuy nhiên hoạt động thẩm định giá tại nước ta chưa phổ biến, chi phí cao. Vì thế để giúp cá nhân hay doanh nghiệp dễ dàng, nhanh chóng, chính xác và ít tốn kém khi cần định giá tài sản BĐS, Công ty Cổ phần Thẩm định giá Thế Kỷ (Cen Value) đưa ra thị trường công cụ định giá trực tuyến ngay trên máy tính và điện thoại di động.</p>
					</div>
				</div>
				<div class="about_block">
					<div class="about_block_image">
						<img src="{{ URL::asset('default/images/about_banner2.jpg') }}">
					</div>
					<div class="about_block_content">
						<h3>Định giá trực tuyến đầu tiên của Việt Nam</h3>
						<p>Trong thời gian nghiên cứu hơn 5 năm và sử dụng hơn 100 cộng tác viên tiến hành khảo sát thực tế từng tuyến đường, con hẻm trong thành phố, CEN VALUE đã viết ra phần mềm thẩm định giá online đầu tiên tại Việt Nam dành riêng cho mảng BĐS. Tất cả phép toán đều được xây dựng một cách khoa học, qua nhiều lần thử nghiệm và hoàn thiện nhằm  đưa ra kết quả chính xác lên đến 95%.</p>
						<p>Chất lượng dịch vụ của thẩm định giá online cũng đã được nhiều khách hàng, đối tác sử dụng và đánh giá rất cao. Vì vậy, khách hàng có thể hoàn toàn yên tâm về độ chính xác, tin cậy mà thẩm định giá online mang lại.</p>
					</div>
				</div>
				<div class="about_block">
					<div class="about_block_image">
						<img src="{{ URL::asset('default/images/about_banner3.jpg') }}">
					</div>
					<div class="about_block_content">
						<h3>Đối tượng sử dụng định giá trực tuyến:<h3>														
						<p>- Cá nhân có nhu cầu định giá BĐS để mua bán, vay vốn ngân hàng, thừa kế…</p>
						<p>- Tổ chức tín dụng, ngân hàng và doanh nghiệp có nhu cầu thẩm định giá BĐS</p>
						<h3>Thao tác sử dụng dễ dàng:<h3>														
						<p>Khách hàng chỉ cần truy cập vào trang mạng www.dinhgiatructuyen.vn , điền đầy đủ thông tin theo yêu cầu sẽ nhận ngay kết quả miễn phí.</p>
						<p>Khách hàng có nhu cầu báo giá chính xác và có dấu chứng thực thì sẽ thanh toán thêm phí. Hoặc có thể liên hệ hotline để được đội ngũ tư vấn hỗ trợ trực tiếp.</p>
						<div class="btn btn_arrow btn_arrow00757b"><a href="lien-he.html">Đi đến trang liên hệ <i></i></a></div>
					</div>
				</div>
			</div>
			
		</div>					
		
	</div>
</div> -->


<!--
/*==============================*\
MAIN
/*==============================*\
-->
<div id="main" class="screen">
    <div class="">

        <div class="about_us_wrapper">
            	<img src="{{ URL::asset('default/images/gioi-thieu.png') }}" style="width:100%;">
        </div>

    </div>
</div>
@endsection