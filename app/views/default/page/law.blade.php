
@extends('default.layouts.default')
@section('content')

<!--
/*==============================*\
MAIN 
/*==============================*\
-->
<div id="main" class="screen">
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
							<img src="{{ URL::asset('default/images/role.jpg') }}" largesrc="{{ URL::asset('default/images/role.jpg') }}"/>

							<div class="elements">
								<div class="main_width">
									<div class="role-content">
										<div class="role-content-inner">
											<h3>ĐIỀU KHOẢN THỎA THUẬN SỬ DỤNG DỊCH VỤ <br>TẠI ĐỊNH GIÁ TRỰC TUYẾN </h3>

											<p>Khi sử dụng website Định Giá Trực Tuyến được tổ chức bởi Ban
												Quản Trị Định Giá Trực Tuyến, Thành viên và/hoặc Khách hàng
												đã hiểu và cam kết tuân thủ mọi quy định được nêu ra trong
												bản điều khoản Thỏa Thuận Sử Dụng Dịch Vụ dưới đây.</p>
												<div class="role-listing">
													<div class="role-listing-title">1.	Đăng Ký Tài Khoản</div>
													<div class="role-listing-content">
														<p class="role-listing-subcontent">
															−	Bạn phải trên 14 tuổi, có đầy đủ quyền công dân để xem xét và chịu trách nhiệm với những điều khoản của chúng tôi đưa ra khi làm thành viên của Định Giá Trực Tuyến.
														</p>
														<p class="role-listing-subcontent">
															- Làm Thành viên của Định Giá Trực Tuyến nghĩa là bạn đã đồng ý cung cấp các thông tin mới nhất, đầy đủ, trung thực và chính xác về bản thân bạn theo hướng dẫn trong hồ sơ đăng ký sử dụng; đồng thời duy trì và cập nhật kịp thời dữ liệu đăng ký để bảo đảm rằng dữ liệu này là mới nhất, đầy đủ, trung thực và chính xác.
														</p>
														<p class="role-listing-subcontent">
															−	Nếu bạn cung cấp bất kỳ thông tin nào không phải là thông tin mới nhất, không đầy đủ, không trung thực hoặc không chính xác; và/hoặc, nếu Định Giá Trực Tuyến có căn cứ hợp lý để nghi ngờ rằng thông tin đó không phải là thông tin mới nhất, không đầy đủ, không trung thực hoặc không chính xác; thì Định Giá Trực Tuyến có quyền tạm khóa hoặc đình chỉ việc sử dụng Tài Khoản của bạn và từ chối quyền sử dụng Dịch vụ (hoặc bất kỳ phần nào của Dịch vụ) của bạn tại thời điểm hiện tại hoặc sau đó.  
														</p>	
													</div>
													<div class="role-listing-title">2.	Bảo Mật Tài Khoản.</div>
													<div class="role-listing-content">
														<p class="role-listing-subcontent">
															−	Bạn hoàn toàn chịu trách nhiệm trong việc kiểm soát mật khẩu của mình. Trong bất cứ trường hợp nào, bạn sẽ phải chịu trách nhiệm cho tất cả hành động có liên quan đến việc sử dụng mật khẩu của mình trên hệ thống.
														</p>
														<p class="role-listing-subcontent">
															−	Ban Quản Trị Định Giá Trực Tuyến có thể truy cập, lưu giữ và tiết lộ thông tin Tài Khoản của bạn với sự đồng ý của bạn và/hoặc trong trường hợp Luật pháp Việt Nam cho phép và/hoặc Cơ Quan Nhà Nước có thẩm quyền yêu cầu cung cấp.
														</p>                                    			
													</div>
													<div class="role-listing-title">3.	Sở Hữu Trí Tuệ.</div>
													<div class="role-listing-content">
														<p class="role-listing-subcontent">
															−	Định Giá Trực Tuyến sẽ không đòi hỏi quyền sở hữu nội dung mà bạn đăng lên hoặc phát hành trong Định Giá Trực Tuyến. Tuy nhiên, ứng với nội dung bạn đăng, bạn đồng ý cho phép Định Giá Trực Tuyến không phải trả tiền bản quyền và được độc quyền sử dụng. Định Giá Trực Tuyến có thể chuyển nhượng được và trao đổi nội dung của bạn với đối tác thứ ba. Trong trường hợp bạn muốn rút lại, xóa bỏ những nội dung do mình gửi, đăng tải thì phải được sự đồng ý của Ban Quản Trị Định Giá Trực Tuyến.
														</p>

													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
							</li>
							<li>
								<img src="{{ URL::asset('default/images/role.jpg') }}" largesrc="{{ URL::asset('default/images/role.jpg') }}"/>

								<div class="elements">
									<div class="main_width">
										<div class="role-content">
											<div class="role-content-inner">
												<h3>ĐIỀU KHOẢN THỎA THUẬN SỬ DỤNG DỊCH VỤ <br>TẠI ĐỊNH GIÁ TRỰC TUYẾN </h3>

												<div class="role-listing">

													<div class="role-listing-content">

														<p class="role-listing-subcontent">
															−	Bạn đồng ý không tái bản, sao chụp, bán, bán lại hoặc lợi dụng vì các mục đích thương mại, bất kì nội dung nào của Định Giá Trực Tuyến (bao gồm cả Tài Khoản của bạn).
														</p>                                   			
													</div>
													<div class="role-listing-title">4.	Sửa Đổi Nội Dung</div>
													<div class="role-listing-content">
														<p class="role-listing-subcontent">
															−	Bạn phải trên 14 tuổi, có đầy đủ quyền công dân để xem xét và chịu trách nhiệm với những điều khoản của chúng tôi đưa ra khi làm thành viên của Định Giá Trực Tuyến.
														</p>
														<p class="role-listing-subcontent">
															Định Giá Trực Tuyến giữ quyền: sửa đổi, ngừng tạm thời hoặc ngừng vĩnh viễn nội dung bạn đã đăng. Bạn đồng ý rằng Định Giá Trực Tuyến không có nghĩa vụ dưới bất kỳ hình thức nào đối với bạn hoặc bất kỳ Bên thứ ba nào về việc điều chỉnh, tạm ngừng hoặc ngừng cung cấp nội dung.
														</p>
													</div>
													<div class="role-listing-title">5.	Sử Dụng Dịch Vụ SMS.</div>
													<div class="role-listing-content">
														<div class="role-listing-subcontent">
															−	Chúng tôi sẽ không chịu trách nhiệm khi xảy ra một trong những trường hợp sau:
															<div class="ml-10" style="margin-left: 10px;">
																<p>
																	(i).	Bạn nhắn tin sai cú pháp mà chúng tôi đã cung cấp.
																	<br>
																	(ii).	Bạn gửi sai số Tổng đài dịch vụ mà chúng tôi đã cung cấp.
																	<br>
																	(iii).	Tin nhắn của bạn gửi đi bị lỗi do Bên thứ ba, cụ thể là nhà cung cấp dịch vụ SMS.
																	<br>
																	(iv).	Nhà cung cấp dịch vụ SMS tính sai trong Tài Khoản của bạn.
																	<br>
																	(v).	Các lỗi phát sinh từ nhà cung cấp dịch vụ điện thoại di động gây ra.
																</p>
															</div>	
														</div>
														<p class="role-listing-subcontent">
															−	Một khi bạn đã sử dụng các dịch vụ SMS trên www.dinhgiatructuyen.vn, nghĩa là bạn đã đồng ý với các điều khoản sử dụng nêu trên.
														</p>                                    			
													</div>
													<div class="role-listing-title">6.	Quy Định Về Việc Thông Báo</div>
													<div class="role-listing-content">
														<p class="role-listing-subcontent">
															Khi làm Thành viên và/hoặc Khách hàng của Định Giá Trực Tuyến tức là bạn đã đồng ý nhận được những thư thông báo, thư giới thiệu, thư mời tham gia những sự kiện, những bữa tiệc mà Định Giá Trực Tuyến tổ chức. Bạn cũng có thể yêu cầu chúng tôi ngừng gửi đến bạn những thông tin mà bạn cho là không cần thiết đối với nhu cầu tiếp nhận thông tin của bạn.
															Chúng tôi có thể gửi thông báo cho bạn qua thư điện tử, thư thông thường hoặc điện thoại, SMS,… Trong mọi trường hợp bạn phải thừa nhận rằng tất cả những thông báo theo phương thức đó và/hoặc việc nhận các đường link liên kết với các bạn đến những thông báo trên dịch vụ sẽ được coi là những thông báo đầy đủ nhất. 

														</p>                                  			
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li>
								<img src="{{ URL::asset('default/images/role.jpg') }}" largesrc="{{ URL::asset('default/images/role.jpg') }}"/>

								<div class="elements">
									<div class="main_width">
										<div class="role-content">

											<div class="role-content-inner">
												<h3>ĐIỀU KHOẢN THỎA THUẬN SỬ DỤNG DỊCH VỤ <br>TẠI ĐỊNH GIÁ TRỰC TUYẾN </h3>

												<div class="role-listing">
													<div class="role-listing-title">7.	Quy Định Về Việc Miễn Trừ Trách Nhiệm</div>
													<div class="role-listing-content">
														<p class="role-listing-subcontent">
															Khi đồng ý làm Thành viên sử dụng dịch vụ của Định Giá Trực Tuyến nghĩa là bạn đã đồng ý rằng Định Giá Trực Tuyến sẽ không phải chịu bất kỳ trách nhiệm nào nếu có những tổn thất, thiệt hại phát sinh từ việc bạn sử dụng website <a href="http://www.dinhgiatructuyen.vn">http://www.dinhgiatructuyen.vn</a>

														</p>                                  			
													</div>
													<div class="role-listing-title">8.	Chấm Dứt và Thay Đổi Thỏa Thuận Sử Dụng (“TTSD”):</div>
													<div class="role-listing-content">
														<div class="role-listing-subcontent">
															a).	Việc chấm dứt TTSD sẽ được thực hiện bao gồm nhưng không giới hạn các nội dung cụ thể nếu như:
															<div class="role-listing-subcontent" style="margin-left: 10px;">
																<p> 
																	−	Nếu bạn có những hành vi mang mục đích xấu hoặc vi phạm TTSD cũng như các hướng dẫn hay thỏa thuận liên kết/không liên kết khác của Định Giá Trực Tuyến.
																</p>

																<p>
																	−	Nếu có sự yêu cầu từ các cơ quan thi hành Pháp luật hoặc các Cơ quan có thẩm quyền khác. 
																</p>

																<p>
																	−	Nếu có sự yêu cầu của bạn (bạn có thể yêu cầu bằng cách thông báo thông qua trang dịch vụ của Định Giá Trực Tuyến hoặc gửi Email thông báo cho chúng tôi) 
																</p>

																<p>
																	−	Nếu bạn xóa bỏ hoặc thay đổi nội dung nào trên website Định Giá Trực Tuyến (hoặc bất kỳ phần nào trong Nội Dung đó) mà không được có sự đồng ý của Định Giá Trực Tuyến. 
																</p>

																<p>
																	−	Nếu có các vấn đề kỹ thuật hoặc bảo mật đột xuất. 
																	−	Nếu bạn không sử dụng Tài Khoản trong thời gian kéo dài từ sáu (6) tháng trở lên.
																</p>

																<p>
																	−	Nếu bạn thực hiện các hành vi lừa dối hoặc các hành vi bất hợp pháp. 
																</p>

																<p>
																	−	Nếu bạn lợi dụng những lỗ hổng kỹ thuật để gây sự cố về phần mềm hoặc phần cứng. Định Giá Trực Tuyến được giữ toàn quyền về định nghĩa thế nào là “sự cố” trong trường hợp này.
																</p>
															</div>
														</div>
														<div class="role-listing-subcontent">
															b).	Việc chấm dứt TTSD và xóa bỏ Tài Khoản bao gồm:
															<div class="role-listing-subcontent" style="margin-left: 10px;">
																<p>− 	Xóa bỏ Tài Khoản truy cập vào website Định Giá Trực Tuyến.</p>


																<p>
																	−	Xóa bỏ mật khẩu và các nội dung trong Tài Khoản truy cập.
																</p>

																<p>
																	−	Ngăn cản việc tiếp tục đăng ký hoặc trở thành Thành viên dưới các hình thức khác.
																</p>

																<p>
																	−	Việc chấm dứt TTSD và xóa bỏ Tài Khoản được quyết định hoàn toàn bởi Định Giá Trực Tuyến. 
																</p>

																<p>
																	−	Định Giá Trực Tuyến không có nghĩa vụ đối với bạn hoặc bất kỳ Bên thứ ba nào về việc chấm dứt TTSD. 
																</p>

															</div>
														</div>

													</div>                                   	

												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li>
								<img src="{{ URL::asset('default/images/role.jpg') }}" largesrc="{{ URL::asset('default/images/role.jpg') }}"/>

								<div class="elements">
									<div class="main_width">
										<div class="role-content">
											<div class="role-content-inner">
												<h3>ĐIỀU KHOẢN THỎA THUẬN SỬ DỤNG DỊCH VỤ <br>TẠI ĐỊNH GIÁ TRỰC TUYẾN </h3>

												<div class="role-listing">
													<div class="role-listing-title">9.	Điều Khoản Chung:</div>
													<div class="role-listing-content">
														<p class="role-listing-subcontent">
															−	Định Giá Trực Tuyến được quyền khai trừ hoặc xóa bỏ tư cách Thành viên, thậm chí truy tố trước pháp luật (tùy mức độ) nếu bạn vi phạm một trong những điều khoản đã quy định ở trên.
														</p>
														<p class="role-listing-subcontent">
															−	Nội dung Điều Khoản Sử Dụng có thể thay đổi bất cứ lúc nào mà chúng tôi thấy nó không còn phù hợp. Thay đổi sẽ có hiệu lực ngay khi được cập nhật trên website <a href="http://www.dinhgiatructuyen.vn">www.dinhgiatructuyen.vn</a>. Bạn có trách nhiệm cập nhật những thay đổi trong Điều Khoản Sử Dụng. Việc bạn tiếp tục sử dụng dịch vụ trên website <a href="http://www.dinhgiatructuyen.vn">www.dinhgiatructuyen.vn</a> sau khi Điều Khoản Sử Dụng được thay đổi đồng nghĩa với việc bạn đã hiểu và chấp nhận với sự thay đổi đó và sẽ tuân theo quy định mới. Những thỏa thuận ghi trong điều khoản này sẽ có hiệu lực ngay khi bạn đăng nhập dịch vụ của chúng tôi.
														</p>
													</div>
												</div>
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

					<div class="about_block_content">
						<div class="role-content">
							<div class="role-content-inner">
								<h3>ĐIỀU KHOẢN THỎA THUẬN SỬ DỤNG DỊCH VỤ <br>TẠI ĐỊNH GIÁ TRỰC TUYẾN </h3>

								<p>Khi sử dụng website Định Giá Trực Tuyến được tổ chức bởi Ban
									Quản Trị Định Giá Trực Tuyến, Thành viên và/hoặc Khách hàng
									đã hiểu và cam kết tuân thủ mọi quy định được nêu ra trong
									bản điều khoản Thỏa Thuận Sử Dụng Dịch Vụ dưới đây.</p>

									<div class="role-listing">
										<div class="role-listing-title">1. Đăng Ký Tài Khoản</div>
										<div class="role-listing-content">
											<p class="role-listing-subcontent">
												− Bạn phải trên 14 tuổi, có đầy đủ quyền công dân để xem xét và chịu trách nhiệm với những
												điều khoản của chúng tôi đưa ra khi làm thành viên của Định Giá Trực Tuyến.
											</p>

											<p class="role-listing-subcontent">
												- Làm Thành viên của Định Giá Trực Tuyến nghĩa là bạn đã đồng ý cung cấp các thông tin mới
												nhất, đầy đủ, trung thực và chính xác về bản thân bạn theo hướng dẫn trong hồ sơ đăng ký sử
												dụng; đồng thời duy trì và cập nhật kịp thời dữ liệu đăng ký để bảo đảm rằng dữ liệu này là
												mới nhất, đầy đủ, trung thực và chính xác.
											</p>

											<p class="role-listing-subcontent">
												− Nếu bạn cung cấp bất kỳ thông tin nào không phải là thông tin mới nhất, không đầy đủ,
												không trung thực hoặc không chính xác; và/hoặc, nếu Định Giá Trực Tuyến có căn cứ hợp lý để
												nghi ngờ rằng thông tin đó không phải là thông tin mới nhất, không đầy đủ, không trung thực
												hoặc không chính xác; thì Định Giá Trực Tuyến có quyền tạm khóa hoặc đình chỉ việc sử dụng
												Tài Khoản của bạn và từ chối quyền sử dụng Dịch vụ (hoặc bất kỳ phần nào của Dịch vụ) của
												bạn tại thời điểm hiện tại hoặc sau đó.
											</p>
										</div>
										<div class="role-listing-title">2. Bảo Mật Tài Khoản.</div>
										<div class="role-listing-content">
											<p class="role-listing-subcontent">
												− Bạn hoàn toàn chịu trách nhiệm trong việc kiểm soát mật khẩu của mình. Trong bất cứ trường
												hợp nào, bạn sẽ phải chịu trách nhiệm cho tất cả hành động có liên quan đến việc sử dụng mật
												khẩu của mình trên hệ thống.
											</p>

											<p class="role-listing-subcontent">
												− Ban Quản Trị Định Giá Trực Tuyến có thể truy cập, lưu giữ và tiết lộ thông tin Tài Khoản
												của bạn với sự đồng ý của bạn và/hoặc trong trường hợp Luật pháp Việt Nam cho phép và/hoặc
												Cơ Quan Nhà Nước có thẩm quyền yêu cầu cung cấp.
											</p>
										</div>
										<div class="role-listing-title">3. Sở Hữu Trí Tuệ.</div>
										<div class="role-listing-content">
											<p class="role-listing-subcontent">
												− Định Giá Trực Tuyến sẽ không đòi hỏi quyền sở hữu nội dung mà bạn đăng lên hoặc phát hành
												trong Định Giá Trực Tuyến. Tuy nhiên, ứng với nội dung bạn đăng, bạn đồng ý cho phép Định
												Giá Trực Tuyến không phải trả tiền bản quyền và được độc quyền sử dụng. Định Giá Trực Tuyến
												có thể chuyển nhượng được và trao đổi nội dung của bạn với đối tác thứ ba. Trong trường hợp
												bạn muốn rút lại, xóa bỏ những nội dung do mình gửi, đăng tải thì phải được sự đồng ý của
												Ban Quản Trị Định Giá Trực Tuyến.
											</p>

											<p class="role-listing-subcontent">
												− Bạn đồng ý không tái bản, sao chụp, bán, bán lại hoặc lợi dụng vì các mục đích thương mại,
												bất kì nội dung nào của Định Giá Trực Tuyến (bao gồm cả Tài Khoản của bạn).
											</p>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
					<div class="about_block">
						<div class="about_block_content">
							<div class="role-content">
								<div class="role-content-inner">


									<div class="role-listing">
										<div class="role-listing-title">4. Sửa Đổi Nội Dung</div>
										<div class="role-listing-content">
											<p class="role-listing-subcontent">
												− Bạn phải trên 14 tuổi, có đầy đủ quyền công dân để xem xét và chịu trách nhiệm với những
												điều khoản của chúng tôi đưa ra khi làm thành viên của Định Giá Trực Tuyến.
											</p>

											<p class="role-listing-subcontent">
												Định Giá Trực Tuyến giữ quyền: sửa đổi, ngừng tạm thời hoặc ngừng vĩnh viễn nội dung bạn đã
												đăng. Bạn đồng ý rằng Định Giá Trực Tuyến không có nghĩa vụ dưới bất kỳ hình thức nào đối
												với bạn hoặc bất kỳ Bên thứ ba nào về việc điều chỉnh, tạm ngừng hoặc ngừng cung cấp nội
												dung.
											</p>
										</div>
										<div class="role-listing-title">5. Sử Dụng Dịch Vụ SMS.</div>
										<div class="role-listing-content">
											<div class="role-listing-subcontent">
												− Chúng tôi sẽ không chịu trách nhiệm khi xảy ra một trong những trường hợp sau:
												<div class="ml-10" style="margin-left: 10px;">
													<p>
														(i). Bạn nhắn tin sai cú pháp mà chúng tôi đã cung cấp.
														<br>
														(ii). Bạn gửi sai số Tổng đài dịch vụ mà chúng tôi đã cung cấp.
														<br>
														(iii). Tin nhắn của bạn gửi đi bị lỗi do Bên thứ ba, cụ thể là nhà cung cấp dịch vụ
														SMS.
														<br>
														(iv). Nhà cung cấp dịch vụ SMS tính sai trong Tài Khoản của bạn.
														<br>
														(v). Các lỗi phát sinh từ nhà cung cấp dịch vụ điện thoại di động gây ra.
													</p>
												</div>
											</div>
											<p class="role-listing-subcontent">
												− Một khi bạn đã sử dụng các dịch vụ SMS trên www.dinhgiatructuyen.vn, nghĩa là bạn đã đồng
												ý với các điều khoản sử dụng nêu trên.
											</p>
										</div>
										<div class="role-listing-title">6. Quy Định Về Việc Thông Báo</div>
										<div class="role-listing-content">
											<p class="role-listing-subcontent">
												Khi làm Thành viên và/hoặc Khách hàng của Định Giá Trực Tuyến tức là bạn đã đồng ý nhận được
												những thư thông báo, thư giới thiệu, thư mời tham gia những sự kiện, những bữa tiệc mà Định
												Giá Trực Tuyến tổ chức. Bạn cũng có thể yêu cầu chúng tôi ngừng gửi đến bạn những thông tin
												mà bạn cho là không cần thiết đối với nhu cầu tiếp nhận thông tin của bạn.
												Chúng tôi có thể gửi thông báo cho bạn qua thư điện tử, thư thông thường hoặc điện thoại,
												SMS,… Trong mọi trường hợp bạn phải thừa nhận rằng tất cả những thông báo theo phương thức
												đó và/hoặc việc nhận các đường link liên kết với các bạn đến những thông báo trên dịch vụ sẽ
												được coi là những thông báo đầy đủ nhất.

											</p>
										</div>
										<div class="role-listing-title">7. Quy Định Về Việc Miễn Trừ Trách Nhiệm</div>
										<div class="role-listing-content">
											<p class="role-listing-subcontent">
												Khi đồng ý làm Thành viên sử dụng dịch vụ của Định Giá Trực Tuyến nghĩa là bạn đã đồng ý
												rằng Định Giá Trực Tuyến sẽ không phải chịu bất kỳ trách nhiệm nào nếu có những tổn thất,
												thiệt hại phát sinh từ việc bạn sử dụng website <a href="http://www.dinhgiatructuyen.vn">http://www.dinhgiatructuyen.vn</a>

											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="about_block">

						<div class="about_block_content">
							<div class="role-content">

								<div class="role-content-inner">


									<div class="role-listing">
										<div class="role-listing-title">8. Chấm Dứt và Thay Đổi Thỏa Thuận Sử Dụng (“TTSD”):</div>
										<p>Định Giá Trực Tuyến có thể chấm dứt ngay lập tức TTSD của bạn mà không cần thông báo trước và
											không chịu trách nhiệm về những thiệt hại đối với bạn cũng như bên thứ ba.</p>

											<div class="role-listing-content">
												<div class="role-listing-subcontent">
													a). Việc chấm dứt TTSD sẽ được thực hiện bao gồm nhưng không giới hạn các nội dung cụ thể
													nếu như:
													<div class="role-listing-subcontent" style="margin-left: 10px;">
														<p>
															− Nếu bạn có những hành vi mang mục đích xấu hoặc vi phạm TTSD cũng như các hướng
															dẫn hay thỏa thuận liên kết/không liên kết khác của Định Giá Trực Tuyến.
														</p>
														<br>

														<p>
															− Nếu có sự yêu cầu từ các cơ quan thi hành Pháp luật hoặc các Cơ quan có thẩm quyền
															khác.
														</p>
														<br>

														<p>
															− Nếu có sự yêu cầu của bạn (bạn có thể yêu cầu bằng cách thông báo thông qua trang
															dịch vụ của Định Giá Trực Tuyến hoặc gửi Email thông báo cho chúng tôi)
														</p>
														<br>

														<p>
															− Nếu bạn xóa bỏ hoặc thay đổi nội dung nào trên website Định Giá Trực Tuyến (hoặc
															bất kỳ phần nào trong Nội Dung đó) mà không được có sự đồng ý của Định Giá Trực
															Tuyến.
														</p>
														<br>

														<p>
															− Nếu có các vấn đề kỹ thuật hoặc bảo mật đột xuất.
															− Nếu bạn không sử dụng Tài Khoản trong thời gian kéo dài từ sáu (6) tháng trở lên.
														</p>
														<br>

														<p>
															− Nếu bạn thực hiện các hành vi lừa dối hoặc các hành vi bất hợp pháp.
														</p>
														<br>

														<p>
															− Nếu bạn lợi dụng những lỗ hổng kỹ thuật để gây sự cố về phần mềm hoặc phần cứng.
															Định Giá Trực Tuyến được giữ toàn quyền về định nghĩa thế nào là “sự cố” trong
															trường hợp này.
														</p>
													</div>
												</div>
												<div class="role-listing-subcontent">
													b). Việc chấm dứt TTSD và xóa bỏ Tài Khoản bao gồm:
													<div class="role-listing-subcontent" style="margin-left: 10px;">
														<p>− Xóa bỏ Tài Khoản truy cập vào website Định Giá Trực Tuyến.</p>

														<br>

														<p>
															− Xóa bỏ mật khẩu và các nội dung trong Tài Khoản truy cập.
														</p>
														<br>

														<p>
															− Ngăn cản việc tiếp tục đăng ký hoặc trở thành Thành viên dưới các hình thức khác.
														</p>
														<br>

														<p>
															− Việc chấm dứt TTSD và xóa bỏ Tài Khoản được quyết định hoàn toàn bởi Định Giá Trực
															Tuyến.
														</p>
														<br>

														<p>
															− Định Giá Trực Tuyến không có nghĩa vụ đối với bạn hoặc bất kỳ Bên thứ ba nào về
															việc chấm dứt TTSD.
														</p>

													</div>
												</div>

											</div>

										</div>
									</div>

									<div class="about_block">
										<div class="about_block_content">
											<div class="role-content">
												<div class="role-content-inner">

													<div class="role-listing">
														<div class="role-listing-title">9. Điều Khoản Chung:</div>
														<div class="role-listing-content">
															<p class="role-listing-subcontent">
																− Định Giá Trực Tuyến được quyền khai trừ hoặc xóa bỏ tư cách Thành viên, thậm
																chí truy tố trước pháp luật (tùy mức độ) nếu bạn vi phạm một trong những điều
																khoản đã quy định ở trên.
															</p>

															<p class="role-listing-subcontent">
																− Nội dung Điều Khoản Sử Dụng có thể thay đổi bất cứ lúc nào mà chúng tôi thấy
																nó không còn phù hợp. Thay đổi sẽ có hiệu lực ngay khi được cập nhật trên
																website <a href="http://www.dinhgiatructuyen.vn">www.dinhgiatructuyen.vn</a>.
																Bạn có trách nhiệm cập nhật những thay đổi trong Điều Khoản Sử Dụng. Việc bạn
																tiếp tục sử dụng dịch vụ trên website <a href="http://www.dinhgiatructuyen.vn">www.dinhgiatructuyen.vn</a>
																sau khi Điều Khoản Sử Dụng được thay đổi đồng nghĩa với việc bạn đã hiểu và chấp
																nhận với sự thay đổi đó và sẽ tuân theo quy định mới. Những thỏa thuận ghi trong
																điều khoản này sẽ có hiệu lực ngay khi bạn đăng nhập dịch vụ của chúng tôi.
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>


									</div>
									<div class="about_block">
										<div class="about_block_content">

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