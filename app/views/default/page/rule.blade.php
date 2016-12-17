
@extends('default.layouts.default')
@section('content')

<!--
/*==============================*\
MAIN
/*==============================*\
-->
<div id="main" class="screen">
	<div class="main_wrapper">

<div class="about_us_wrapper policy-wrapper" style="padding-bottom: 20px;">
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
									<h3>ĐIỀU KHOẢN VÀ QUY CHẾ HOẠT ĐỘNG CỦA WEBSITE<br><a href="http://www.dinhgiatructuyen.vn">WWW.DINHGIATRUCTUYEN.VN</a></h3>

									<p>
										Xin vui lòng đọc Điều khoản và Quy chế Hoạt động của website trước sử dụng trước khi chính thức sử dụng www.dinhgiatructuyen.vn. Khi bạn tiếp tục truy cập và sử dụng website này và các sản phẩm liên quan đến www.dinhgiatructuyen.vn có nghĩa là bạn đã đồng ý và chấp nhận quy chế hoạt động và điều khoản sử dụng. Nếu bạn không đồng ý, vui lòng không sử dụng website hay bất kỳ sản phẩm nào của www.dinhgiatructuyen.vn.
									</p>
									<p>
										Quy chế quản lý hoạt động này có hiệu lực từ ngày 25/12/2016, là ngày đăng tải trên website: <a href="http://www.dinhgiatructuyen.vn">http://www.dinhgiatructuyen.vn/</a>.
									</p>
									<div class="role-listing">
										<div class="role-listing-title">I.	Chấp nhận và đồng ý các điều khoản sử dụng:</div>
										<div class="role-listing-content">
											<p class="role-listing-subcontent">
												−	Chào mừng và cám ơn bạn đã chọn sử dụng dịch vụ tra cứu & định giá tài sản trực tuyến của Công ty Cổ phần Thẩm định giá Thế Kỷ - có tên viết tắt là CEN VALUE (sau đây gọi chung là “CEN VALUE”). 
											</p>
											<p class="role-listing-subcontent">
												−	Khi đã sử dụng website và các sản phẩm liên quan đến www.dinhgiatructuyen.vn đồng nghĩa với việc bạn đã chấp nhận và đồng ý với những ràng buộc về mặt pháp lý, và tuân thủ theo quy chế hoạt động và điều khoản sử dụng của website.
											</p>
											<p class="role-listing-subcontent">
												−	CEN VALUE là chủ bản quyền – chủ sở hữu của website www.dinhgiatructuyen.vn và các sản phẩm liên quan. CEN VALUE có quyền chỉnh sửa, thay đổi, sắp xếp lại nội dung, bổ sung quy chế hoạt động và điều khoản sử dụng trên website website và các sản phẩm liên quan. Việc chỉnh sửa, thay đổi, sắp xếp lại hoặc tái sử dụng những nội dung này mà không có sự đồng ý của CEN VALUE đều là vi phạm quyền lợi hợp pháp của CEN VALUE.
											</p>
											<p class="role-listing-subcontent">
												−	Người sử dụng có trách nhiệm cập nhật và theo dõi những thay đổi mới nhất trên website www.dinhgiatructuyen.vn. Nếu bạn không đồng ý với những thay đổi mới nhất, bạn có quyền yêu cầu ngưng sử dụng tài khoản tại website và các sản phẩm liên quan của www.dinhgiatructuyen.vn.
											</p>
											<p class="role-listing-subcontent">
												−	Tài khoản của Khách hàng trên www.dinhgiatructuyen.vn không dùng để trao đổi, mua bán với mục đích thương mại.
											</p>

										</div>
										<div class="role-listing-title">II.	Nguyên tắc hoạt động</div>
										<div class="role-listing-content">
											<p class="role-listing-subcontent">
												−	CEN VALUE luôn tôn trọng sở hữu trí tuệ của người khác, và chúng tôi yêu cầu người dùng của chúng tôi cũng làm như vậy. Chúng tôi luôn cố gắng đảm bảo những dữ liệu trên website và các sản phẩm liên quan đều là hợp pháp, đáp ứng đầy đủ các quy định của pháp luật có liên quan, không thuộc các trường hợp cấm kinh doanh, cấm quảng cáo theo quy định của pháp luật.
											</p>
											<p class="role-listing-subcontent">
												−	Nhưng chúng tôi không chắc chắn có thể kiểm soát tất cả thông tin trên website và các sản phẩm liên quan. Khi phát hiện được bất kỳ hành vi vi phạm bản quyền nào trên website và các sản phẩm liên quan, Ban Quản Trị sẽ xoá nội dung đó khỏi website một cách nhanh nhất có thể.
											</p> 

											<p class="role-listing-subcontent">
												−	Thành viên trên sàn giao dịch điện tử <a href="http://www.dinhgiatructuyen.vn">www.dinhgiatructuyen.vn</a> là các cá nhân, tổ chức, thương nhân, môi giới có nhu cầu về tra cứu đơn giá đất, định giá nhà đất, tài sản, bất động sản hoặc liên quan đễn lĩnh vực bất động sản, được www.dinhgiatructuyen.vn chính thức công nhận và được phép sử dụng dịch vụ do website <a href="http://www.dinhgiatructuyen.vn">www.dinhgiatructuyen.vn</a> và các bên liên quan cung cấp.
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
									<h3>ĐIỀU KHOẢN VÀ QUY CHẾ HOẠT ĐỘNG CỦA WEBSITE<br><a href="http://www.dinhgiatructuyen.vn">WWW.DINHGIATRUCTUYEN.VN</a></h3>

									<div class="role-listing">

										<div class="role-listing-title">II. Nguyên tắc hoạt động</div>
										<div class="role-listing-content">


											<p class="role-listing-subcontent">
												−   Từ “Dịch vụ” bao gồm tất cả các dịch vụ do <a href="http://www.dinhgiatructuyen.vn">www.dinhgiatructuyen.vn</a> cung cấp hoặc liên quan đến website <a href="http://www.dinhgiatructuyen.vn">www.dinhgiatructuyen.vn</a>.
											</p>      
											<p class="role-listing-subcontent">
												−   Tổ chức, cá nhân, thương nhân tham gia giao dịch tự do thỏa thuận trên cơ sở tôn trọng quyền và lợi ích hợp pháp của các bên tham gia hoạt động mua bán hàng hóa, sản phẩm, dịch vụ thông qua hợp đồng, không trái với qui định của pháp luật.
											</p>                                                
										</div>

									</div>    
									<div class="role-listing">
										<div class="role-listing-title">III.	Quy định chung:</div>
										<p>
											Trong Quy chế này, trừ khi chủ thể hoặc ngữ cảnh có yêu cầu khác, các từ và các thuật ngữ sau đây sẽ có ý nghĩa sau đây:
										</p>
										<div class="role-listing-content">
											<p class="role-listing-subcontent">
												−	<a href="http://dinhgiatructuyen.vn">dinhgiatructuyen.vn</a>: Là trang website www.dinhgiatructuyen.vn trực thuộc Công ty Cổ phần Thẩm định giá Thế Kỷ - CEN VALUE. Đây là website giao dịch thương mại điện tử, nơi các tổ chức, cá nhân có thể tra cứu thông tin đơn giá đất, định giá nhà đất, bất động sản, tài sản, tìm hiểu thông tin thị trường, đăng các thông tin liên hệ nhằm phục vụ mục đích cung cấp thông tin đơn giá đất nhà nước, đơn giá đất thị trường, giá trị tài sản, bất động sản do Khách hàng cung cấp thông tin.
											</p>
											<p class="role-listing-subcontent">
												−	Khách hàng: Là các tổ chức/cá nhân/thương nhân sử dụng website dinhgiatructuyen.vn và các ứng dụng liên quan, bao gồm cả Người dùng và Thành viên có nhu cầu sử dụng website và các dịch vụ được cung cấp bởi website dinhgiatructuyen.vn một cách tự nguyện.
											</p>
											<p class="role-listing-subcontent">
												−	Thông tin: Là những thông tin được công khai trên trang website dinhgiatructuyen.vn. Bao gồm nhưng không giới hạn các nội dung như: Thông tin về dịch vụ, Thông tin cá nhân, Thông tin doanh nghiệp, Thông tin về thị trường/dịch vụ được giới thiệu trên các nguồn chính thống khác.
											</p>
											<p class="role-listing-subcontent">
												−	Chăm sóc Khách hàng: Khi đăng ký thành công tài khoản, Khách hàng sẽ nhận được các thông tin liên quan đến việc hỗ trợ sử dụng sản phẩm, dịch vụ và chăm sóc Khách hàng của dinhgiatructuyen.vn qua các kênh như: điện thoại, email, tin nhắn SMS. Nội dung điện thoại, email và tin nhắn được dinhgiatructuyen.vn sử dụng theo quy định pháp luật hiện hành.
											</p>
										</div>
										<div class="role-listing-title">IV.	Quy trình giao dịch</div>
										<div class="role-listing-content">
											<div class="role-listing-subcontent">
												<p class="role-listing-subtitle">1.   Nguyên tắc chung</p>
												<p>Website dinhgiatructuyen.vn cung cấp các dịch vụ trực tuyến cho những Khách hàng có nhu cầu:</p>
												<div class="ml-10" style="margin-left: 10px; margin-top: 5px;">
													<p>
														−  Sản phẩm hàng hóa, dịch vụ tham gia giao dịch trên Website dinhgiatructuyen.vn phải được phép kinh doanh, lưu hành và không thuộc các trường hợp cấm kinh doanh, cấm quảng cáo theo quy định của pháp luật Việt Nam.
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
									<h3>ĐIỀU KHOẢN VÀ QUY CHẾ HOẠT ĐỘNG CỦA WEBSITE<br><a href="http://www.dinhgiatructuyen.vn">WWW.DINHGIATRUCTUYEN.VN</a></h3>
									<div class="role-listing">



										<div class="role-listing-title">IV. Quy trình giao dịch</div>
										<div class="role-listing-content">
											<div class="role-listing-subcontent">
												<p class="role-listing-subtitle">1.   Nguyên tắc chung</p>                                              
												<div class="ml-10" style="margin-left: 10px; margin-top: 5px;">

													−   Thành viên tham gia giao dịch trên Website dinhgiatructuyen.vn là cá nhân và/hoặc doanh nghiệp và/hoặc thương nhân có nhu cầu mua hoặc bán sản phẩm trên Website dinhgiatructuyen.vn. Thành viên phải đăng ký các thông tin liên quan, được Website dinhgiatructuyen.vn chính thức công nhận. Thành viên sử dụng trang web này đồng ý rằng:

													<div style="margin-left: 20px;">
														<p>
															•   Là một cá nhân và/hoặc doanh nghiệp và/hoặc thương nhân;
														</p>
														<p>
															•   Có đầy đủ năng lực hành vi dân sự;
														</p>
														<p>
															•   Việc Thành viên truy cập trang website này tại mọi thời điểm, địa điểm Thành viên phải thực hiện đầy đủ các điều khoản trong Quy chế này;
														</p>
														<p>
															•   Thành viên phải bảo vệ mật khẩu của Thành viên và giám sát các thông tin có liên quan đến tài khoản của Thành viên; Thành viên hiểu và đồng ý rằng Thành viên sẽ chịu trách nhiệm cả về việc tài khoản của Thành viên được sử dụng bởi bất cứ ai mà Thành viên cho phép truy cập vào nó;
														</p>
														<p>
															•   Các thông tin mà Thành viên cung cấp cho Website dinhgiatructuyen.vn là thông tin chính xác, đầy đủ và đúng sự thật;
														</p>
														<p>
															•   Các nội dung trong bản Quy chế này phải tuân thủ theo hệ thống pháp luật hiện hành của Việt Nam. Thành viên khi tham gia vào Website dinhgiatructuyen.vn phải tự tìm hiểu trách nhiệm pháp lý của mình đối với luật pháp hiện hành của Việt Nam và cam kết thực hiện đúng những nội dung trong Quy chế của Website dinhgiatructuyen.vn.
														</p>

													</div>


												</div>  
											</div>                                                                                  
										</div>                                      
									</div>                                    
									<div class="role-listing-title">IV. Quy trình giao dịch</div>
									<div class="role-listing-content">
										<div class="role-listing-subcontent">    									
											<p class="role-listing-subtitle">2. Quy trình giao dịch:</p>
											<div style="margin-left: 10px;">
												<div class="role-listing-subcontent">
													a).  Quy trình giao dịch dành cho Người Mua: Người mua xe có thể đăng ký làm thành viên của Website dinhgiatructuyen.vn hoặc không. Bằng cách truy cập vào địa chỉ website: dinhgiatructuyen.vn người dùng có thể tìm danh sách các xe mà mình quan tâm. Nếu người dùng có nhu cầu mua sẽ liên hệ trực tiếp với người đăng tin để xem xe và thỏa thuận việc giao dịch giữa hai Bên cụ thể. dinhgiatructuyen.vn sẽ không tham gia và không chịu trách nhiệm liên quan vào quá trình giao dịch giữa người mua và người bán.

												</div>
												<div class="role-listing-subcontent">          
													b).  Quy trình dành cho Người Bán Hàng/Đăng Tin: Người đăng tin bán xe trên dinhgiatructuyen.vn bắt buộc phải đăng ký làm thành viên của dinhgiatructuyen.vn và phải đăng nhập vào hệ thống website dinhgiatructuyen.vn. Cách thức đăng ký thành viên và đăng nhập theo hướng dẫn tại: http://www.dinhgiatructuyen.vn/huong-dan-su-dung/
												</div>
												<div class="role-listing-subcontent">
													c). Quy trình giao nhận vận chuyển: Là thỏa thuận trực tiếp giữa người mua và người bán hàng/đăng tin, dinhgiatructuyen.vn không tham gia vào quá trình này.
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
										<h3>ĐIỀU KHOẢN VÀ QUY CHẾ HOẠT ĐỘNG CỦA WEBSITE<br><a href="http://www.dinhgiatructuyen.vn">WWW.DINHGIATRUCTUYEN.VN</a></h3>
										<div class="role-listing">
											<div class="role-listing-title">IV. Quy trình giao dịch</div>
											<div class="role-listing-content">
												<div class="role-listing-subcontent">                                       
													<p class="role-listing-subtitle">2. Quy trình giao dịch:</p>
													<div style="margin-left: 10px;">

														<div class="role-listing-subcontent">
															d). Quy trình xác nhận/hủy đơn hàng: Website dinhgiatructuyen.vn không có chức năng lập đơn hàng mua xe. Người mua chỉ tìm thông tin xe trên trang dinhgiatructuyen.vn rồi liên hệ trực tiếp với người bán.
														</div>
														<div class="role-listing-subcontent">
															e). Quy trình bảo hành/bảo trì sản phẩm: Không có
														</div>

														<div class="role-listing-subcontent">
															<p>
																f). Quy trình giải quyết tranh chấp, khiếu nại:
															</p>
															<div style="margin-left: 15px;">
																<p class="role-listing-subcontent">
																	-   Nếu phát sinh tranh chấp giữa Thành viên và Website dinhgiatructuyen.vn, Website dinhgiatructuyen.vn cố gắng cung cấp một phương thức trung lập và tiết kiệm để giải quyết tranh chấp nhanh chóng. Theo đó, Thành viên và Website dinhgiatructuyen.vn đồng ý rằng Website dinhgiatructuyen.vn sẽ giải quyết theo pháp luật bất kỳ khiếu nại hoặc tranh cãi ngoài Thỏa thuận này hoặc các dịch vụ của Website dinhgiatructuyen.vn phù hợp với một trong những phần phụ lục bên dưới hoặc như Website dinhgiatructuyen.vn và Thành viên đồng ý bằng văn bản. 
																</p>
																<p class="role-listing-subcontent">
																	-   Trước khi sử dụng đến các biện pháp thay thế, Website dinhgiatructuyen.vn khuyến khích Thành viên trước tiên hãy liên hệ với Website dinhgiatructuyen.vn để tìm được giải pháp phù hợp. Website dinhgiatructuyen.vn sẽ xem xét yêu cầu hợp lý để giải quyết tranh chấp thông qua các thủ tục giải quyết tranh chấp thay thế, chẳng hạn như trọng tài, thay thế cho kiện tụng. Bất kỳ khiếu nại nào phát sinh trong quá trình sử dụng dịch vụ trên Website dinhgiatructuyen.vn phải được gởi đến Phòng Hỗ Trợ Khách hàng của dinhgiatructuyen.vn tại địa chỉ email: info@dinhgiatructuyen.vn, ngay sau khi xày ra sự kiện phát sinh khiếu nại.  dinhgiatructuyen.vn sẽ căn cứ từng trường hợp cụ thể để có phương án giải quyết cho phù hợp. Mọi tranh chấp giữa người sử dụng với nhau hoặc giữa người sử dụng với website dinhgiatructuyen.vn sẽ được giải quyết trên cơ sở thương lượng. Trường hợp không đạt được thỏa thuận như mong muốn, một trong hai Bên có quyền đưa vụ việc ra Tòa án nhân dân có thẩm quyền hoặc Trọng Tài Thương Mại Quốc Tế Việt Nam để giải quyết.
																</p> 
															</div> 

														</div>     
														<div class="role-listing-subcontent">
															<p>dinhgiatructuyen.vn không chịu trách nhiệm và liên quan đến giao dịch giữa người mua và người mua và người bán</p>
															IV.　Quy trình giao dịch
															Đối với người mua xe: Người mua tự liên hệ với thành viên đăng tin bán xe để tiến hành giao dịch và thanh toán.
															Khách hàng có thể nạp tiền vào tài khoản dinhgiatructuyen.vn bằng cách đăng nhập vào tài khoản của bạn tại website dinhgiatructuyen.vn, ở trang tài khoản, bấm “Nạp tiền” để thực hiện giao dịch nạp tiền theo hướng dẫn.
															Quý khách có thể lựa chọn nạp tiền vào tài khoản theo những hình thức sau:
															Cách 1: Thẻ nội địa (Chuyển tiền qua online banking).
															Cách 2: Nạp tiền qua thẻ thanh toán quốc tế (Visa, MasterCard, JCB).
															Cách 3: Nạp tiền qua thẻ cào trả trước (Mobifone, Viettel, Vinaphone, Vietnammobile).
															Cách 4: Chuyển khoản
															Cách 5: Nhắn tin SMS
															Chi tiết biểu phí dịch vụ, quý khách có thể tham khảo tại: http://dinhgiatructuyen.vn/bang-gia-dich-vu/

														</div>                                      

													</div>                                      

												</div>
												<div class="role-listing-title">IV. Quy trình giao dịch</div>
												<div class="role-listing-content">
													<div class="role-listing-subcontent">
														<p class="role-listing-subtitle">3.  Quy định về giao dịch trên hệ thống dinhgiatructuyen.vn</p>
														<p>Website dinhgiatructuyen.vn có các quy định về giao dịch như sau:</p>

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
											<h3>ĐIỀU KHOẢN VÀ QUY CHẾ HOẠT ĐỘNG CỦA WEBSITE<br><a href="http://www.dinhgiatructuyen.vn">WWW.DINHGIATRUCTUYEN.VN</a></h3>
											<div class="role-listing-title">IV. Quy trình giao dịch</div>
											<div class="role-listing-content">
												<div class="role-listing-subcontent">                                             
													<div class="role-listing-subcontent" style="margin-left: 10px;">
														<p>
															−    dinhgiatructuyen.vn không hỗ trợ hoàn trả tiền cho các giao dịch mà Quý Khách hàng thực hiện trên website dinhgiatructuyen.vn. Trong các trường hợp Thành viên hoặc/và Khách hàng sử dụng chức năng nhắn tin SMS mà gửi nhầm đầu số hoặc các tin nhắn không hợp lệ và vẫn bị trừ tiền trong tài khoản thì dinhgiatructuyen.vn sẽ không chịu trách nhiệm về vấn đề này.
														</p>
														<p>
															−   Nếu giao dịch của Thành viên và/hoặc Khách hàng không thành công vì lý do giao dịch có dấu hiệu rủi ro (thẻ đã bị trừ tiền), vui lòng liên hệ bộ phận hỗ trợ Khách hàng theo email: hi@cenvalue.vn 
														</p>
														<p>
															−   Trong trường hợp giao dịch bị khiếu nại, chargeback (đòi bồi hoàn), hai Bên sẽ thống nhất giải quyết khiếu nại theo quy định của pháp luật hiện hành.
														</p>

														<p>    
															−   Thành viên và/hoặc Khách hàng không được nạp tiền vào tài khoản (và/hoặc nếu cố tình nạp thì số tiền đó có thể bị đóng băng/tạm giữ bởi dinhgiatructuyen.vn tại bất cứ thời điểm nào) trong trường hợp số tiền bạn chuyển nạp có nguồn gốc không hợp pháp, ví dụ: Chuyển tiền từ thẻ tín dụng hoặc thẻ ghi nợ quốc tế ăn cắp…
														</p>
													</div> 
													<div class="role-listing-subcontent" style="margin-left: 10px;">
														<div>
															a).  Đối với các giao dịch thanh toán qua cổng thanh toán 1Pay: 
															Các giao dịch thanh toán được thực hiện qua bên đối tác thứ ba – cổng thanh toán 1Pay, thì các thông tin tài khoản, số thẻ không được lưu trữ trên server dinhgiatructuyen.vn 

														</div>
														<div>
															<p>b).  Đối với nạp tiền bằng thẻ cào điện thoại: </p>
															<div>
																<p>
																	−   Thành viên và/hoặc Khách hàng chỉ được phép nhập sai số series của thẻ cào tối đa ba (3) lần, từ lần thứ tư (4) trở đi thẻ cào sẽ bị khóa (đây là chính sách áp dụng chung của tất cả các nhà mạng)
																</p>
																<p>
																	−   Khoảng cách thời gian kết thúc tin nhắn trước và thời gian bắt đầu nhắn tin sau phải lớn hơn năm (5) giây. Website dinhgiatructuyen.vn không có trách nhiệm giải quyết các thắc mắc khiếu nại liên quan phát sinh.
																</p>
																<p>
																	−   dinhgiatructuyen.vn tuân thủ các quy định về chống spam tin nhắn của các nhà mạng. Tùy vào từng nhà cung cấp dịch vụ mạng di động, các bạn lưu ý đọc kỹ các quy định riêng đối với từng mạng di động dưới đây:
																	Quy định của mạng VinaPhone đối với Khách hàng sử dụng thuê bao trả trước: Không giới hạn số lượng tin nhắn gửi đển các đầu số dịch vụ nội dung. Đối với khách hàng sử dụng thuê bao trả sau: Tổng cước sử dụng dịch vụ của 01 (một) thuê bao không quá: 100.000vnđ/ngày (từ 0h00 đến 23h59, đã bao gồm thuế GTGT).
																	Quy định của mạng Viettel: Khách hàng không được sử dụng các dịch vụ nội dung của một nhà cung cấp quá 150.000vnđ/ngày (từ 0h00 đến 23h59, đã bao gồm thuế GTGT).
																	Quy định của mạng Mobifone: Từ ngày 01/11/2012, Khách hàng không được sử dụng các dịch vụ nội dung của một nhà cung cấp quá 300.000vnđ/ngày (từ 0h00 đến 23h59, đã bao gồm thuế GTGT).
																</p>
															</div>    
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
											<h3>ĐIỀU KHOẢN VÀ QUY CHẾ HOẠT ĐỘNG CỦA WEBSITE<br><a href="http://www.dinhgiatructuyen.vn">WWW.DINHGIATRUCTUYEN.VN</a></h3>                                  


											<div class="role-listing">
												<div class="role-listing-title">V. Đảm bảo an toàn giao dịch:</div>
												<div class="role-listing-content">
													<div class="role-listing-subcontent">

														<div class="role-listing-subcontent" style="margin-left: 10px;">
															<span class="role-listing-subtitle">1.  Quản lý thông tin của Người Bán Hàng</span>:
															Khi đăng ký tham gia bán hàng trên Website dinhgiatructuyen.vn, Người Bán
															Hàng phải cung cấp đầy đủ các thông tin liên quan và phải hoàn toàn chịu trách nhiệm
															đối với các thông tin này. Các thông tin cụ thể bao gồm: thông tin về nhân thân đối
															với cá nhân, thông tin về tư cách pháp lý đối với thành viên là tổ chức, pháp nhân.
															Các thông tin này sẽ được Website dinhgiatructuyen.vn đưa vào dữ liệu
															quản lý.
														</div>
														<div class="role-listing-subcontent" style="margin-left: 10px;">
															<span
															class="role-listing-subtitle">2.  Kiểm soát giao dịch của Người Bán Hàng</span>:
															Các giao dịch của Người Bán Hàng với Khách hàng là trực tiếp và không qua Sàn Giao
															dịch TMĐT dinhgiatructuyen.vn vì vậy dinhgiatructuyen.vn khuyến cáo Khách hàng cần
															tìm hiểu và xác thực thông tin của người bán trước khi thực hiện giao dịch
														</div>

														<div class="role-listing-subcontent" style="margin-left: 10px;">
															<span class="role-listing-subtitle">3.  Cơ chế gửi khiếu nại về Người Bán Hàng dành cho các Khách hàng</span>: Khách hàng có quyền gửi khiếu nại về Người Bán Hàng đến Website dinhgiatructuyen.vn. Khi tiếp nhận những phản hồi này, Website dinhgiatructuyen.vn sẽ xác nhận lại thông tin, trường hợp đúng như phản ánh của người mua tùy theo mức độ, Website dinhgiatructuyen.vn sẽ có những biện pháp xử lý kịp thời nhằm bảo vệ quyền lợi của Khách hàng.
														</div> 

														<div class="role-listing-subcontent" style="margin-left: 10px;">
															<div class="role-listing-subtitle">
																4.  Bảo vệ thông tin cá nhân Khách hàng:

															</div>
															<div style="margin-left: 10px;">
																<p>
																	−  Chính sách bảo mật này công bố cách thức mà Website dinhgiatructuyen.vn thu thập, lưu trữ và xử lý thông tin hoặc dữ liệu cá nhân (sau đây gọi chung là “Thông tin cá nhân”) của các Khách hàng của mình thông qua wesite của Website dinhgiatructuyen.vn. 
																</p>
																<p>
																	−   Website dinhgiatructuyen.vn cam kết sẽ bảo mật các Thông tin cá nhân của Khách hàng, sẽ nỗ lực hết sức và sử dụng các biện pháp thích hợp để các thông tin mà Khách hàng cung cấp cho dinhgiatructuyen.vn trong quá trình sử dụng website này được bảo mật và bảo vệ khỏi sự truy cập trái phép.
																</p> 
																<p>
																	−   Tuy nhiên, Website dinhgiatructuyen.vn không đảm bảo ngăn chặn được tất cả các truy cập trái phép. Trong trường hợp truy cập trái phép nằm ngoài khả năng kiểm soát của dinhgiatructuyen.vn, Website dinhgiatructuyen.vn sẽ không chịu trách nhiệm dưới bất kỳ hình thức nào đối với bất kỳ khiếu nại, tranh chấp hoặc thiệt hại nào phát sinh từ hoặc liên quan đến truy cập trái phép đó.
																</p>
																<p>
																	−   Khách hàng được khuyến nghị để nắm rõ những quyền lợi của mình khi sử dụng các dịch vụ của Website dinhgiatructuyen.vn được cung cấp trên website này.
																</p>
																<p>
																	−   Website dinhgiatructuyen.vn đưa ra các cam kết dưới đây phù hợp với các quy định của pháp luật Việt Nam, trong đó bao gồm các cách thức mà dinhgiatructuyen.vn sử dụng để bảo mật thông tin của Khách hàng.
																</p>
															</div>                                                   
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
											<h3>ĐIỀU KHOẢN VÀ QUY CHẾ HOẠT ĐỘNG CỦA WEBSITE<br><a href="http://www.dinhgiatructuyen.vn">WWW.DINHGIATRUCTUYEN.VN</a></h3>
											<div class="role-listing">
												<div class="role-listing-title">V.  Đảm bảo an toàn giao dịch:</div>
												<div class="role-listing-content">
													<div class="role-listing-subcontent">

														<div class="role-listing-subcontent" style="margin-left: 10px;">
															<div class="role-listing-subtitle">
																5.  Mục đích thu thập Thông tin cá nhân: Website dinhgiatructuyen.vn thu thập Thông tin cá nhân của Khách hàng cho một hoặc một số mục đích như sau:

															</div>
															<div style="margin-left: 10px;">
																<p>
																	−   Thực hiện và quản lý việc đặt hàng cho Khách hàng;
																</p>
																<p>
																	−   Thực hiện và quản lý việc sử dụng dịch vụ vận chuyển hàng hóa;
																</p> 
																<p>
																	−   Thực hiện và quản lý hoạt động tiếp thị, cung cấp thông tin khuyến mại tới Khách hàng như gửi các cập nhật mới nhất về thông tin khuyến mại và chào giá mới liên quan đến sản phẩm và dịch vụ của Website dinhgiatructuyen.vn;
																</p>
																<p>
																	−   Cung cấp giải pháp nâng hạng và thay đổi dịch vụ nhằm phục vụ nhu cầu Khách hàng;
																</p>
																<p>
																	−   Quản lý, phân tích, đánh giá số liệu liên quan đến dữ liệu của Khách hàng để xây dựng chính sách bán và chính sách phục vụ Khách hàng phù hợp;
																</p>

																<p>
																	−   Tiếp nhận thông tin, góp ý, đề xuất, khiếu nại của Khách hàng nhằm cải thiện chất lượng dịch vụ của Website dinhgiatructuyen.vn;
																</p>
																<p>
																	−    Liên hệ với Khách hàng để giải quyết các yêu cầu của Khách hàng;
																</p>
																<p>
																	−    Đảm bảo an ninh, an toàn đối với các giao dịch thanh toán trực tuyến.
																</p>
															</div>                                                   
														</div> 

														<div class="role-listing-subcontent" style="margin-left: 10px;">
															<div class="role-listing-subtitle">
																6.  Loại thông tin thu thập:
															</div>
															<p>Những loại Thông tin cá nhân mà Website dinhgiatructuyen.vn thu thập từ Khách hàng của mình bao gồm:</p>

														</div> 


													</div>                                          
												</div>
											</div>
											<div class="role-listing">

												<div class="role-listing-content">
													<div class="role-listing-subcontent">


														<div class="role-listing-subcontent" style="margin-left: 10px;">

															<div style="margin-left: 10px;">
																<p>
																	−   Thông tin cá nhân gồm: Họ và tên, Tên truy cập;…
																</p>
																<p>
																	−   Thông tin liên lạc như số điện thoại, địa chỉ gửi thư, địa 
																	chỉ email, số fax;…
																</p>
																<p>
																	−   Thông tin về doanh nghiệp của Khách hàng như tên doanh nghiệp, địa chỉ doanh nghiệp, chức danh;…
																</p>

															</div>  
															<p>
																Các Thông tin cá nhân trên được yêu cầu đối với những dịch vụ cụ thể, Khách hàng có quyền từ chối hoặc không cung cấp đầy đủ các thông tin được yêu cầu. Trong trường hợp đó, Website dinhgiatructuyen.vn không thể cung cấp cho Khách hàng những dịch vụ đầy đủ và chất lượng. Website dinhgiatructuyen.vn cần sự hỗ trợ từ phía Khách hàng trong việc đảm bảo tính chính xác và đầy đủ của các thông tin thu thập. Vì vậy, xin vui lòng thông báo cho dinhgiatructuyen.vn về bất kỳ sự thay đổi nào trong Thông tin cá nhân Khách hàng bằng việc liên hệ với dinhgiatructuyen.vn qua các hình thức được công bố trên website.
															</p>                                                 
														</div> 

														<div class="role-listing-subcontent" style="margin-left: 10px;">
															<div class="role-listing-subtitle">
																7.   Thời gian lưu trữ thông tin thu thập:
															</div>

															<div style="margin-left: 10px;">                                                       
																Website dinhgiatructuyen.vn sẽ lưu trữ các Thông tin cá nhân do Khách hàng cung cấp trên các hệ thống nội bộ của dinhgiatructuyen.vn trong quá trình cung cấp dịch vụ cho Khách hàng hoặc cho đến khi hoàn thành mục đích thu thập hoặc khi Khách hàng có yêu cầu hủy các thông tin đã cung cấp. Nhưng dinhgiatructuyen.vn sẽ lưu lại số điện thoại đã đăng ký để phục vụ cho điều khoản mỗi số điện thoại chỉ đăng ký duy nhất 01 (một) tài khoản trên dinhgiatructuyen.vn và chỉ được đăng 01 (một) tin miễn phí duy nhất.   
															</div>  

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
											<h3>ĐIỀU KHOẢN VÀ QUY CHẾ HOẠT ĐỘNG CỦA WEBSITE<br><a href="http://www.dinhgiatructuyen.vn">WWW.DINHGIATRUCTUYEN.VN</a></h3>

											<div class="role-listing">
												<div class="role-listing-title">V.  Đảm bảo an toàn giao dịch:</div>
												<div class="role-listing-content">
													<div class="role-listing-subcontent">                                              

														<div class="role-listing-subcontent" style="margin-left: 10px;">
															<div class="role-listing-subtitle">
																8.  Việc công bố Thông tin thu thập
															</div>
															<p style="margin-left: 10px;">
																Website dinhgiatructuyen.vn có thể tiết lộ Thông tin cá nhân từ Khách hàng cho Bên thứ ba để đáp ứng yêu cầu pháp lý, thực thi các chính sách của dinhgiatructuyen.vn, khi có thông báo rằng một danh sách hoặc nội dung vi phạm các quyền lợi, hoặc để bảo vệ quyền lợi, tài sản hoặc sự an toàn. Những thông tin này sẽ được công bố theo quy định của pháp luật và các quy định hiện hành. Website dinhgiatructuyen.vn cũng có thể chia sẻ thông tin cá nhân của bạn cho:
															</p>
															<div style="margin-left: 10px;">
																<p>
																	−   Bên thứ ba để cung cấp nội dung và dịch vụ chung (như đăng ký, giao dịch và hỗ trợ Khách hàng), giúp phát hiện và ngăn chặn hành vi bất hợp pháp và vi phạm chính sách của dinhgiatructuyen.vn, và để hướng dẫn các quyết định về sản phẩm, dịch vụ và thông tin liên lạc của Bên thứ ba. Các Bên thứ ba sẽ sử dụng thông tin này để gửi cho bạn thông tin liên lạc tiếp thị chỉ khi bạn yêu cầu dịch vụ của họ.
																</p>
																<p>
																	−   Cung cấp dịch vụ theo hợp đồng hỗ trợ hoạt động kinh doanh của dinhgiatructuyen.vn (bao gồm nhưng không giới hạn các nội dung như: điều tra gian lận, thu thập hóa đơn, liên kết, các chương trình khen thưởng và hỗ trợ Khách hàng). Bên thứ ba khác mà bạn yêu cầu dinhgiatructuyen.vn gửi thông tin của bạn (hoặc/và bên mà Khách hàng đồng ý khi sử dụng một dịch vụ cụ thể khác).
																</p>
																<p>
																	−   Các cơ quan thực thi pháp luật, các cơ quan khác của chính phủ hoặc các Bên thứ ba để đáp ứng yêu cầu thông tin liên quan đến điều tra hình sự, hoạt động bất hợp pháp bị cáo buộc hoặc bất kỳ hoạt động nào khác có thể làm cho dinhgiatructuyen.vn, Khách hàng hay bất kỳ người dùng dinhgiatructuyen.vn phải chịu trách nhiệm pháp lý. Các thông tin cá nhân dinhgiatructuyen.vn tiết lộ có thể bao gồm ID người dùng của bạn và lịch sử ID người dùng, tên, thành phố, quận, số điện thoại, địa chỉ email, khiếu nại gian lận và đấu thầu và danh sách lược sử hoặc bất cứ điều gì khác mà  dinhgiatructuyen.vn cho là có liên quan.
																</p>
																<p>
																	−   Các cơ quan khác có liên quan đến điều tra gian lận, vi phạm sở hữu trí tuệ, vi phạm bản quyền, hoặc các hoạt động bất hợp pháp khác, tùy theo quyết định của dinhgiatructuyen.vn tin rằng cần thiết hoặc thích hợp, hoặc theo thỏa thuận bảo mật hoặc theo yêu cầu của pháp luật. Khi đó, dinhgiatructuyen.vn có thể tiết lộ tên, địa chỉ, thành phố, quận, quốc gia, số điện thoại, địa chỉ email và tên công ty.
																</p>

																<p>
																	−   Các đơn vị kinh doanh khác mà dinhgiatructuyen.vn kế hoạch sát nhập với hoặc được mua lại bởi một cá thể kinh doanh. Trong trường hợp có một sự sát nhập như vậy xảy ra, dinhgiatructuyen.vn sẽ yêu cầu đơn vị sát nhập thực thi Chính sách Bảo mật này đối với Thông tin cá nhân của Khách hàng. Nếu Thông tin cá nhân của Khách hàng được sử dụng trái với Chính sách này, Khách hàng sẽ nhận được thông báo trước. Các Bên thứ ba và Các Liên Kết Sàn TMĐT dinhgiatructuyen.vn có thể chuyển thông tin của Khách hàng cho các công ty khác trong nhóm. Website dinhgiatructuyen.vn có thể chuyển thông tin của Quý Khách hàng cho các đại lý và nhà thầu phụ trong khuôn khổ quy định của Chính sách Bảo mật. 
																	Ví dụ:  dinhgiatructuyen.vn sẽ nhờ Bên thứ ba giao hàng, nhận tiền thanh toán, phân tích dữ liệu, tiếp thị và dịch vụ hỗ trợ Khách hàng. dinhgiatructuyen.vn có thể trao đổi thông tin với Bên thứ ba với mục đích chống gian lận và giảm rủi ro tín dụng. dinhgiatructuyen.vn có thể chuyển cơ sở dữ liệu gồm thông tin cá nhân của bạn nếu dinhgiatructuyen.vn bán cả công ty hoặc chỉ một phần.
																</p>
															</div>                                                   
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
											<h3>ĐIỀU KHOẢN VÀ QUY CHẾ HOẠT ĐỘNG CỦA WEBSITE<br><a href="http://www.dinhgiatructuyen.vn">WWW.DINHGIATRUCTUYEN.VN</a></h3>
											<div class="role-listing">
												<div class="role-listing-title">V.  Đảm bảo an toàn giao dịch:</div>
												<div class="role-listing-content">
													<div class="role-listing-subcontent">                                             

														<div class="role-listing-subcontent" style="margin-left: 10px;">

															<div style="margin-left: 10px;">                      


																<p> 
																	−   Trong khuôn khổ Chính sách bảo mật, dinhgiatructuyen.vn không bán hay tiết lộ dữ liệu cá nhân của bạn cho Bên thứ ba mà KHÔNG được đồng ý trước trừ khi điều này là cần thiết cho các điều khoản trong Chính sách bảo mật hoặc dinhgiatructuyen.vn được yêu cầu phải làm như vậy theo quy định của Pháp luật. 
																</p>
																<p>
																	−   Website có thể bao gồm quảng cáo của Bên thứ ba và các liên kết đến các trang website khác hoặc khung của các trang website khác. Xin lưu ý rằng dinhgiatructuyen.vn không có nhiệm vụ về việc Bên thứ ba hay các website khác hoặc bất kỳ Bên thứ ba nào mà dinhgiatructuyen.vn chuyển giao dữ liệu cho phù hợp với Chính sách bảo mật, vi phạm bảo mật thông tin hay nội dung Bảo mật thông tin.
																</p>
															</div>                                                   
														</div> 

														<div class="role-listing-subcontent" style="margin-left: 10px;">
															<div class="role-listing-subtitle">
																9.   Quyền của Khách hàng đối với các Thông tin cá nhân được thu thập
															</div>
															<p>
																Bất kỳ Khách hàng nào tự nguyện cung cấp Thông tin cá nhân cho Website dinhgiatructuyen.vn đều có các quyền như sau:
															</p>
															<div style="margin-left: 10px;">
																<p>
																	−    Yêu cầu xem lại các thông tin được thu thập;
																</p>
																<p>
																	−    Yêu cầu sao chép lại các thông tin được thu thập;
																</p>
																<p>
																	−   Yêu cầu chỉnh sửa, bổ sung thông tin được thu thập (đối với Khách hàng nhận thông tin qua E-Newsletter và hội viên Chương trình Khách hàng thân thiết, Khách hàng có thể truy cập và tự chỉnh sửa thông tin của mình bằng cách truy cập vào tài khoản của mình trên website dinhgiatructuyen.vn);
																</p>
																<p>
																	−   Yêu cầu dừng việc thu thập thông tin;
																</p>
																<p>
																	−   Khách hàng có thể thực hiện các quyền trên bằng cách tự truy cập vào website hoặc liên hệ với dinhgiatructuyen.vn qua email hoặc địa chỉ liên lạc được công bố trên website của Website dinhgiatructuyen.vn.
																</p>
																<p>
																	−   Trong trường hợp Khách hàng cung cấp cho dinhgiatructuyen.vn các Thông tin cá nhân không chính xác hoặc không đầy đủ để xác nhận được nhân thân Khách hàng, dinhgiatructuyen.vn không thể bảo vệ được quyền bảo mật của Khách hàng theo quy định trên.
																</p>                                                        

															</div>                                                   
														</div> 



													</div>                                          
												</div>
											</div>

											<div class="role-listing">
												<div class="role-listing-title">VI. Quản lý thông tin xấu:</div>
												<div class="role-listing-content">
													<div class="role-listing-subcontent">        
														<div class="role-listing-subcontent" style="margin-left: 10px;">
															<div class="role-listing-subtitle">
																1.   Quy chế đăng tin:
															</div>
															<p>
																Là thành viên của dinhgiatructuyen.vn Khách hàng có thể tra cứu đơn giá đất, định giá tài sản, bất động sản, nhà đất trên website dinhgiatructuyen.vn 
															</p>
															<div style="margin-left: 10px;">
																<div style="margin: 5px 0px;">
																	−   Để sử dụng dịch vụ trên dinhgiatructuyen.vn Khách hàng cần phải là Thành viên và phải đăng nhập vào dinhgiatructuyen.vn 
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
						</li>  
						<li>
							<img src="{{ URL::asset('default/images/role.jpg') }}" largesrc="{{ URL::asset('default/images/role.jpg') }}"/>

							<div class="elements">
								<div class="main_width">
									<div class="role-content">
										<div class="role-content-inner">
											<h3>ĐIỀU KHOẢN VÀ QUY CHẾ HOẠT ĐỘNG CỦA WEBSITE<br><a href="http://www.dinhgiatructuyen.vn">WWW.DINHGIATRUCTUYEN.VN</a></h3>                                    
											<div class="role-listing">
												<div class="role-listing-title">VI. Quản lý thông tin xấu:</div>
												<div class="role-listing-content">
													<div class="role-listing-subcontent">        
														<div class="role-listing-subcontent" style="margin-left: 10px;">

															<div style="margin-left: 10px;">

																<div style="margin: 5px 0px;">
																	−   Thành viên cá nhân (thành viên thường) không được để thông tin liên hệ là tên công ty/tổ chức khi sử dụng dịch vụ
																</div>
																<div style="margin: 5px 0px;">
																	−   Người đăng tin phải hoàn toàn chịu trách nhiệm về nội dung và thông tin đăng của mình trên dinhgiatructuyen.vn.
																</div>
																<div style="margin: 5px 0px;">
																	−   Các tin đăng nếu vi phạm một trong những tiêu chí sau thì sẽ bị Ban Quản Trị dinhgiatructuyen.vn xóa mà không cần báo trước:
																	<div style="margin-left: 10px;">
																		<p>
																			•   Thông tin liên lạc (trong phần đăng ký tài khoản) không đúng (người dùng không thể liên lạc được, hoặc bản 
																			thân người có trong thông tin liên lạc không đăng tin)
																		</p>
																		<p>
																			•   Tin đăng để số điện thoại/email không đúng quy định (nhập số điện thoại/email vào phần mô tả thông tin)
																		</p>
																	</div>
																</div>

															</div>                                                   
														</div> 
														<div class="role-listing-subcontent" style="margin-left: 10px;">
															<div class="role-listing-subtitle">
																2. Nghiêm cấm:
															</div>
															<p>
																Là thành viên của dinhgiatructuyen.vn Khách hàng có thể tra cứu đơn giá đất, định giá tài sản, bất động sản, nhà đất trên website dinhgiatructuyen.vn 
															</p>
															<div style="margin-left: 10px;">
																<p>
																	−   Không được đăng tải thông tin rao vặt mà pháp luật Việt Nam nghiêm cấm.
																</p>
																<p>
																	−   Không đăng tải thông tin rao vặt trái với đạo đức xã hội Việt Nam.
																</p>
																<p>
																	−   Không đăng tải sex, crack, hack, chính trị, tôn giáo.
																</p>
															</div>                                                   
														</div> 

														<div class="role-listing-subcontent" style="margin-left: 10px;">
															<div class="role-listing-subtitle">
																3.   Quyền hạn của của dinhgiatructuyen.vn:
															</div>

															<div style="margin-left: 10px;">
																<p>
																	−   Website dinhgiatructuyen.vn sẽ toàn quyền loại bỏ các thông tin đăng của Thành viên và/hoặc Khách hàng nếu như tin đăng vi phạm quy chế đăng tin
																</p>
																<p>
																	−   Các tin đăng không phù hợp với chuyên mục quy định sẽ bị xóa hoặc Website dinhgiatructuyen.vn chuyển sang chuyên mục khác cho là hợp lý.
																</p>
																<p>
																	−   Website dinhgiatructuyen.vn giữ quyền quyết định về việc lưu giữ hay loại bỏ tin đã đăng trên trang web này mà không cần báo trước.
																</p>
																<p>
																	−   Website dinhgiatructuyen.vn không giải quyết các tranh chấp giữa khách hàng, cũng như không giải quyết bất cứ khiếu nại nào của khách hàng về thông tin do khách hàng cung cấp.
																</p>
																<p>
																	−   Website dinhgiatructuyen.vn có toàn quyền thay đổi một hay nhiều điều khoản có trong quy định về đăng tin mà không cần giải thích lý do và cũng không cần phải thông báo trước.
																</p>
																<p>


																</div>                                                   
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
												<h3>ĐIỀU KHOẢN VÀ QUY CHẾ HOẠT ĐỘNG CỦA WEBSITE<br><a href="http://www.dinhgiatructuyen.vn">WWW.DINHGIATRUCTUYEN.VN</a></h3>                                    
												<div class="role-listing">
													<div class="role-listing-title">VI. Quản lý thông tin xấu:</div>
													<div class="role-listing-content">
														<div class="role-listing-subcontent"> 
															<div class="role-listing-subcontent" style="margin-left: 10px;">
																<div class="role-listing-subtitle">
																	3.   Quyền hạn của của dinhgiatructuyen.vn:
																</div>

																<div style="margin-left: 10px;">

																	<p>
																		−   Giới hạn trách nhiệm trong các trường hợp phát sinh lỗi kỹ thuật của Website dinhgiatructuyen.vn 
																	</p>
																	<p>
																		−   Website dinhgiatructuyen.vn cam kết nỗ lực đảm bảo sự an toàn và ổn định của toàn bộ hệ thống kỹ thuật. Tuy nhiên, trong trường hợp xảy ra sự cố do lỗi của dinhgiatructuyen.vn, dinhgiatructuyen.vn sẽ ngay lập tức áp dụng các biện pháp để đảm bảo quyền lợi cho người sử dụng.
																	</p>
																	<p>
																		−   Khi thực hiện các giao dịch, dịch vụ, bắt buộc các thành viên phải thực hiện đúng theo các quy trình hướng dẫn.
																		−   Ban Quản Trị website dinhgiatructuyen.vn cam kết cung cấp chất lượng dịch vụ tốt nhất cho các thành viên tham gia giao dịch. Trường hợp phát sinh lỗi kỹ thuật, lỗi phần mềm hoặc các lỗi khách quan khác dẫn đến Thành viên không thể tham gia giao dịch được thì các Thành viên thông báo cho Ban Quản Trị website qua email: hi@cenvalue.vn 
																	</p>
																	<p>
																		−   Ban Quản Trị website dinhgiatructuyen.vn sẽ không chịu trách nhiệm giải quyết trong trường hợp thông báo của các Thành viên không đến được Ban Quản Trị, phát sinh từ lỗi kỹ thuật, lỗi đường truyền, phần mềm hoặc các lỗi khác không do Ban Quản Trị gây ra.
																	</p>

																</div>                                                   
															</div>     

														</div>                                          
													</div>
												</div>

												<div class="role-listing">                                      

													<div class="role-listing-title">VII.    Quyền và Nghĩa vụ của các Bên tham gia website <a href="http://dinhgiatructuyen.vn">dinhgiatructuyen.vn</a> </div>
													<div class="role-listing-content">
														<div class="role-listing-subcontent">        
															<div class="role-listing-subcontent" style="margin-left: 10px;">
																<div class="role-listing-subtitle">
																	1.   Quyền và Nghĩa vụ của Ban Quản Trị website <a href ="http://dinhgiatructuyen.vn">dinhgiatructuyen.vn</a>:
																</div>

																<div style="margin-left: 10px;">
																	<div>
																		<p>a). Ban Quản Trị website dinhgiatructuyen.vn có quyền:</p>
																		<div style="margin-left: 10px;">
																			<p>
																				−   Có quyền từ chối, tạm ngừng hay chấm dứt tin đăng của Thành viên trong trường hợp thành viên cung cấp thông tin không chính xác, không đầy đủ, vi phạm pháp luật, đạo đức, thuần phong mỹ tục Việt Nam;
																			</p>
																			<p>
																				−   Có quyền từ chối cung cấp một hoặc tất cả dịch vụ nếu Thành viên có những hoạt động lừa đảo, giả mạo, gây rối loạn thị trường, gây mất đoàn kết đối với các Thành viên khác của Website dinhgiatructuyen.vn.
																			</p>
																			<p>
																				−   Website dinhgiatructuyen.vn giữ bản quyền sử dụng dịch vụ và các nội dung trên Website dinhgiatructuyen.vn theo luật bản quyền Quốc Tế và các quy dịnh pháp luật về bảo hộ sở hữu trí tuệ tại Việt Nam. Và, tất cả các biểu tượng, logo, nội dung theo các ngôn ngữ khác nhau đều thuộc quyền sở hữu của CEN VALUE. Nghiêm cấm mọi hành vi sao chép, sử dụng và phổ biến bất hợp pháp các quyền sở hữu trên.
																			</p>    
																		</div>
																	</div> 
																	<div>
																		<p>
																			b).  Ban Quản Trị website dinhgiatructuyen.vn có nghĩa vụ:</p>
																			<div style="margin-left: 10px;">
																				<p>
																					−   Chịu trách nhiệm xây dựng và duy trì hoạt động bình thường của website dinhgiatructuyen.vn. Ban Quản Trị chịu trách cung cấp chất lượng dịch vụ tốt cho các thành viên tham gia giao dịch và nhanh chóng khắc phục lỗi kỹ thuật, các lỗi khách quan khác trong thời gian sớm nhất. Website dinhgiatructuyen.vn không chịu trách nhiệm liên đới đối với các hậu quả xảy ra các sự kiện bất khả kháng như: thiên tai, hỏa hoạn, biến động xã hội, các quyết định của cơ quan chức năng...
																				</p>

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
									</li>  

									<li>
										<img src="i{{ URL::asset('default/images/role.jpg') }}" largesrc="{{ URL::asset('default/images/role.jpg') }}"/>

										<div class="elements">
											<div class="main_width">
												<div class="role-content" style="margin-left: 12%;">
													<div class="role-content-inner">
														<h3 style="margin-bottom: 5px;">ĐIỀU KHOẢN VÀ QUY CHẾ HOẠT ĐỘNG CỦA WEBSITE<br><a href="http://www.dinhgiatructuyen.vn">WWW.DINHGIATRUCTUYEN.VN</a></h3>                                    
														<div class="role-listing">                                      

															<div class="role-listing-title">VII.    Quyền và Nghĩa vụ của các Bên tham gia website <a href="http://dinhgiatructuyen.vn">dinhgiatructuyen.vn</a> </div>
															<div class="role-listing-content">
																<div class="role-listing-subcontent">        
																	<div class="role-listing-subcontent" style="margin-left: 10px;">
																		<div class="role-listing-subtitle">
																			1.   Quyền và Nghĩa vụ của Ban Quản Trị website <a href ="http://dinhgiatructuyen.vn">dinhgiatructuyen.vn</a>:
																		</div>

																		<div style="margin-left: 10px;">

																			<div>

																				<div style="margin-left: 10px;">

																					<p>
																						−   Xây dựng Cơ chế Hoạt động, Hợp đồng, Quy định, Hướng dẫn các quy trình tra cứu, định giá… cho các Thành viên tham gia website dinhgiatructuyen.vn 
																					</p>
																					<p>
																						−   Lưu giữ và cập nhật thông tin đăng ký của các Thành viên trên website dinhgiatructuyen.vn 
																					</p>
																					<p>
																						−   Tích cực hỗ trợ cơ quan quản lý nhà nước điều tra các hành vi kinh doanh vi phạm pháp luật; cung cấp các tài liệu như thông tin đăng ký, lịch sử dữ liệu giao dịch… của đối tượng có hành vi vi phạm pháp luật trên Website dinhgiatructuyen.vn.
																					</p>
																					<p>
																						−   Bảo vệ thông tin cá nhân của Khách hàng trên dinhgiatructuyen.vn. 
																						dinhgiatructuyen.vn cam kết sẽ bảo mật các Thông tin cá nhân của Khách hàng, sẽ nỗ lực hết sức và sử dụng các biện pháp thích hợp để các thông tin mà Khách hàng cung cấp cho dinhgiatructuyen.vn trong quá trình sử dụng website này được bảo mật và bảo vệ khỏi sự truy cập trái phép. Tuy nhiên,  dinhgiatructuyen.vn không đảm bảo ngăn chặn được tất cả các truy cập trái phép. Trong trường hợp truy cập trái phép nằm ngoài khả năng kiểm soát của dinhgiatructuyen.vn, dinhgiatructuyen.vn  sẽ không chịu trách nhiệm dưới bất kỳ hình thức nào đối với bất kỳ khiếu nại, tranh chấp hoặc thiệt hại nào phát sinh từ hoặc liên quan đến truy cập trái phép đó.
																					</p>

																					<p>
																						−   Xây dựng Cơ chế Hoạt động, Hợp đồng, Quy định, Hướng dẫn các quy trình tra cứu, định giá… cho các Thành viên tham gia website dinhgiatructuyen.vn 
																					</p>
																					<p>
																						−   Lưu giữ và cập nhật thông tin đăng ký của các Thành viên trên website dinhgiatructuyen.vn 
																					</p>
																					<p>
																						−   Tích cực hỗ trợ cơ quan quản lý nhà nước điều tra các hành vi kinh doanh vi phạm pháp luật; cung cấp các tài liệu như thông tin đăng ký, lịch sử dữ liệu giao dịch… của đối tượng có hành vi vi phạm pháp luật trên Website dinhgiatructuyen.vn.
																					</p>
																					<p>
																						−   Bảo vệ thông tin cá nhân của Khách hàng trên dinhgiatructuyen.vn. 
																						dinhgiatructuyen.vn cam kết sẽ bảo mật các Thông tin cá nhân của Khách hàng, sẽ nỗ lực hết sức và sử dụng các biện pháp thích hợp để các thông tin mà Khách hàng cung cấp cho dinhgiatructuyen.vn trong quá trình sử dụng website này được bảo mật và bảo vệ khỏi sự truy cập trái phép. Tuy nhiên,  dinhgiatructuyen.vn không đảm bảo ngăn chặn được tất cả các truy cập trái phép. Trong trường hợp truy cập trái phép nằm ngoài khả năng kiểm soát của dinhgiatructuyen.vn, dinhgiatructuyen.vn  sẽ không chịu trách nhiệm dưới bất kỳ hình thức nào đối với bất kỳ khiếu nại, tranh chấp hoặc thiệt hại nào phát sinh từ hoặc liên quan đến truy cập trái phép đó.
																					</p>
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
										</li>  

										<li>
											<img src="{{ URL::asset('default/images/role.jpg') }}" largesrc="{{ URL::asset('default/images/role.jpg') }}"/>

											<div class="elements">
												<div class="main_width">
													<div class="role-content" style="margin-left: 12%;">
														<div class="role-content-inner">
															<h3 style="margin-bottom: 5px;">ĐIỀU KHOẢN VÀ QUY CHẾ HOẠT ĐỘNG CỦA WEBSITE<br><a href="http://www.dinhgiatructuyen.vn">WWW.DINHGIATRUCTUYEN.VN</a></h3>

															<div class="role-listing">                                        

																<div class="role-listing-title">VII.    Quyền và Nghĩa vụ của các Bên tham gia website dinhgiatructuyen.vn </div>

																<div class="role-listing-content">
																	<div class="role-listing-subcontent">        
																		<div class="role-listing-subcontent" style="margin-left: 10px;">
																			<div class="role-listing-subtitle">
																				2.    Quyền và Nghĩa vụ của Thành viên
																			</div>

																			<div style="margin-left: 10px;">
																				<div>
																					<p>
																						a). Quyền của Thành viên:
																					</p>
																					<div style="margin-left: 10px;">
																						<p>
																							−   Khi đăng ký trở thành Thành viên của dinhgiatructuyen.vn và được dinhgiatructuyen.vn đồng ý, Thành viên sẽ được quyền sử dụng các dịch vụ của website dinhgiatructuyen.vn.
																						</p>
																						<p>
																							−   Thành viên sẽ được cấp một tên đăng ký và mật khẩu riêng để được vào sử dụng các dịch vụ, quản lý các thông tin và các giao dịch của mình trên Website dinhgiatructuyen.vn.
																						</p>
																						<p>
																							−   Thành viên sẽ được nhân viên của dinhgiatructuyen.vn hướng dẫn sử dụng được các công cụ, các tính năng phục vụ cho việc quản lý tra cứu, định giá, thanh toán và sử dụng các dịch vụ tiện ích trên website dinhgiatructuyen.vn.
																						</p>
																						<p>
																							−   Thành viên sẽ được hưởng các chính sách ưu đãi do Website dinhgiatructuyen.vn hay các đối tác thứ ba cung cấp trên Website dinhgiatructuyen.vn. Các chính sách ưu đãi này sẽ được đăng tải trực tiếp trên Website dinhgiatructuyen.vn hoặc được gửi trực tiếp đến các Thành viên.
																						</p>
																						<p>
																							−   Thành viên có quyền đóng góp ý kiến cho dinhgiatructuyen.vn trong quá trình hoạt động. Các kiến nghị được gửi trực tiếp bằng thư, fax hoặc email đến cho dinhgiatructuyen.vn.
																						</p>    

																					</div>
																				</div>   

																				<div>
																					<p>
																						b). Nghĩa vụ của Thành viên:
																					</p>
																					<div style="margin-left: 10px;">
																						<p>   
																							−   Thành viên sẽ tự chịu trách nhiệm về bảo mật và lưu giữ và mọi hoạt động sử dụng dịch vụ dưới tên đăng ký, mật khẩu và hộp thư điện tử của mình. Thành viên có trách nhiệm thông báo kịp thời cho dinhgiatructuyen.vn về những hành vi sử dụng trái phép, lạm dụng, vi phạm bảo mật, lưu giữ tên đăng ký và mật khẩu của mình để hai Bên cùng hợp tác xử lý.
																						</p>
																						<p>
																							−   Thành viên cam kết những thông tin cung cấp cho dinhgiatructuyen.vn và những thông tin đang tải lên dinhgiatructuyen.vn là chính xác và hoàn chỉnh. Thành viên đồng ý giữ và thay đổi các thông tin trên dinhgiatructuyen.vn là cập nhật, chính xác và hoàn chỉnh.
																						</p>
																						<p>
																							−   Thành viên tự chịu trách nhiệm về nội dung, hình ảnh của thông tin cá nhân và/hoặc thông tin doanh nghiệp và các thông tin khác cũng như toàn bộ quá trình giao dịch với các đối tác trên Website dinhgiatructuyen.vn.
																						</p>
																						<p>    
																							−   Thành viên cam kết, đồng ý không sử dụng dịch vụ của website dinhgiatructuyen.vn vào những mục đích bất hợp pháp, không hợp lý, lừa đảo, đe doạ, thăm rò thông tin bất hợp pháp, phá hoại, tạo ra và phát tán virus gây hư hại tới hệ thống, cấu hình, truyền tải thông tin của Website dinhgiatructuyen.vn hay sử dụng dịch vụ của mình vào mục đích đầu cơ, lũng đoạn.
																						</p>

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
											</li>    
											<li>
												<img src="{{ URL::asset('default/images/role.jpg') }}" largesrc="{{ URL::asset('default/images/role.jpg') }}"/>

												<div class="elements">
													<div class="main_width">
														<div class="role-content" style="margin-left: 12%;">
															<div class="role-content-inner">
																<h3 style="margin-bottom: 5px;">ĐIỀU KHOẢN VÀ QUY CHẾ HOẠT ĐỘNG CỦA WEBSITE<br><a href="http://www.dinhgiatructuyen.vn">WWW.DINHGIATRUCTUYEN.VN</a></h3>



																<div class="role-listing">                                        

																	<div class="role-listing-title">VIII.   Điều khoản áp dụng</div>
																	<div class="role-listing-content">
																		<div class="role-listing-subcontent">        
																			<div class="role-listing-subcontent" style="margin-left: 10px;">
																				<div>
																					<p>
																						1.    Mọi tranh chấp phát sinh giữa dinhgiatructuyen.vn với một hay các Thành viên khác sẽ được giải quyết theo tinh thần hợp tác, hòa giải, thương luợng. Trường hợp hai (các) Bên thương lượng/hòa giải không thành, tùy theo tích chất của việc tranh chấp, vụ việc sẽ được đưa ra phân xử tại Trung Tâm Trọng tài Quốc tế Việt Nam hoặc Tòa Án có thẩm quyền.
																					</p>
																					<p>
																						2. <a href="http://dinhgiatructuyen.vn"> dinhgiatructuyen.vn</a> sẽ không liên quan và chịu trách nhiệm khi xảy tranh chấp phát sinh trong quá trình giao dịch khác ngoài website dinhgiatructuyen.vn.
																					</p>
																					<p>
																						3.  Trong trường hợp phải thay đổi nội dung Quy chế để phù hợp với thực tiễn họat động của website dinhgiatructuyen.vn thì Ban Quản Trị sẽ thông báo trên Sàn cho các thành viên biết. Sau thời gian thông báo 05 (năm) ngày này, Quy chế mới - đã được sửa đổi - sẽ được áp dụng. Việc các Thành viên tiếp tục sử dụng dịch vụ sau khi Quy chế mới được công bố và thực thi đồng nghĩa với việc các Thành viên đó đã đồng ý và chấp nhận với Quy chế mới này.
																					</p>
																					<p>
																						4.  Địa chỉ liên hệ chính thức của website: <a href="http://dinhgiatructuyen.vn">dinhgiatructuyen.vn </a>
																					</p>

																				</div>                                                



																			</div> 
																		</div>                                           

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
										<ul>
											<li>


												<div class="elements">
													<div class="main_width">
														<div class="role-content">
															<div class="role-content-inner">
																<h3>ĐIỀU KHOẢN VÀ QUY CHẾ HOẠT ĐỘNG CỦA WEBSITE<br><a href="http://www.dinhgiatructuyen.vn" style="font-size: 16px;">WWW.DINHGIATRUCTUYEN.VN</a>
																</h3>

																<p>
																	Xin vui lòng đọc Điều khoản và Quy chế Hoạt động của website trước sử dụng trước khi chính thức
																	sử dụng www.dinhgiatructuyen.vn. Khi bạn tiếp tục truy cập và sử dụng website này và các sản
																	phẩm liên quan đến www.dinhgiatructuyen.vn có nghĩa là bạn đã đồng ý và chấp nhận quy chế hoạt
																	động và điều khoản sử dụng. Nếu bạn không đồng ý, vui lòng không sử dụng website hay bất kỳ sản
																	phẩm nào của www.dinhgiatructuyen.vn.
																</p>

																<p>
																	Quy chế quản lý hoạt động này có hiệu lực từ ngày 25/12/2016, là ngày đăng tải trên website: <a
																	href="http://www.dinhgiatructuyen.vn">http://www.dinhgiatructuyen.vn/</a>.
																</p>

																<div class="role-listing">
																	<div class="role-listing-title">I. Chấp nhận và đồng ý các điều khoản sử dụng:</div>
																	<div class="role-listing-content">
																		<p class="role-listing-subcontent">
																			− Chào mừng và cám ơn bạn đã chọn sử dụng dịch vụ tra cứu & định giá tài sản trực tuyến
																			của Công ty Cổ phần Thẩm định giá Thế Kỷ - có tên viết tắt là CEN VALUE (sau đây gọi
																			chung là “CEN VALUE”).
																		</p>

																		<p class="role-listing-subcontent">
																			− Khi đã sử dụng website và các sản phẩm liên quan đến www.dinhgiatructuyen.vn đồng
																			nghĩa với việc bạn đã chấp nhận và đồng ý với những ràng buộc về mặt pháp lý, và tuân
																			thủ theo quy chế hoạt động và điều khoản sử dụng của website.
																		</p>

																		<p class="role-listing-subcontent">
																			− CEN VALUE là chủ bản quyền – chủ sở hữu của website www.dinhgiatructuyen.vn và các sản
																			phẩm liên quan. CEN VALUE có quyền chỉnh sửa, thay đổi, sắp xếp lại nội dung, bổ sung
																			quy chế hoạt động và điều khoản sử dụng trên website website và các sản phẩm liên quan.
																			Việc chỉnh sửa, thay đổi, sắp xếp lại hoặc tái sử dụng những nội dung này mà không có sự
																			đồng ý của CEN VALUE đều là vi phạm quyền lợi hợp pháp của CEN VALUE.
																		</p>

																		<p class="role-listing-subcontent">
																			− Người sử dụng có trách nhiệm cập nhật và theo dõi những thay đổi mới nhất trên website
																			www.dinhgiatructuyen.vn. Nếu bạn không đồng ý với những thay đổi mới nhất, bạn có quyền
																			yêu cầu ngưng sử dụng tài khoản tại website và các sản phẩm liên quan của
																			www.dinhgiatructuyen.vn.
																		</p>

																		<p class="role-listing-subcontent">
																			− Tài khoản của Khách hàng trên www.dinhgiatructuyen.vn không dùng để trao đổi, mua bán
																			với mục đích thương mại.
																		</p>

																	</div>
																	<div class="role-listing-title">II. Nguyên tắc hoạt động</div>
																	<div class="role-listing-content">
																		<p class="role-listing-subcontent">
																			− CEN VALUE luôn tôn trọng sở hữu trí tuệ của người khác, và chúng tôi yêu cầu người
																			dùng của chúng tôi cũng làm như vậy. Chúng tôi luôn cố gắng đảm bảo những dữ liệu trên
																			website và các sản phẩm liên quan đều là hợp pháp, đáp ứng đầy đủ các quy định của pháp
																			luật có liên quan, không thuộc các trường hợp cấm kinh doanh, cấm quảng cáo theo quy
																			định của pháp luật.
																		</p>

																		<p class="role-listing-subcontent">
																			− Nhưng chúng tôi không chắc chắn có thể kiểm soát tất cả thông tin trên website và các
																			sản phẩm liên quan. Khi phát hiện được bất kỳ hành vi vi phạm bản quyền nào trên website
																			và các sản phẩm liên quan, Ban Quản Trị sẽ xoá nội dung đó khỏi website một cách nhanh
																			nhất có thể.
																		</p>

																		<p class="role-listing-subcontent">
																			− Thành viên trên sàn giao dịch điện tử <a href="http://www.dinhgiatructuyen.vn">www.dinhgiatructuyen.vn</a>
																			là các cá nhân, tổ chức, thương nhân, môi giới có nhu cầu về tra cứu đơn giá đất, định
																			giá nhà đất, tài sản, bất động sản hoặc liên quan đễn lĩnh vực bất động sản, được
																			www.dinhgiatructuyen.vn chính thức công nhận và được phép sử dụng dịch vụ do website <a
																			href="http://www.dinhgiatructuyen.vn">www.dinhgiatructuyen.vn</a> và các bên liên
																			quan cung cấp.
																		</p>

																		<p class="role-listing-subcontent">
																			− Từ “Dịch vụ” bao gồm tất cả các dịch vụ do <a href="http://www.dinhgiatructuyen.vn">www.dinhgiatructuyen.vn</a>
																			cung cấp hoặc liên quan đến website <a href="http://www.dinhgiatructuyen.vn">www.dinhgiatructuyen.vn</a>.
																		</p>

																		<p class="role-listing-subcontent">
																			− Tổ chức, cá nhân, thương nhân tham gia giao dịch tự do thỏa thuận trên cơ sở tôn trọng
																			quyền và lợi ích hợp pháp của các bên tham gia hoạt động mua bán hàng hóa, sản phẩm,
																			dịch vụ thông qua hợp đồng, không trái với qui định của pháp luật.
																		</p>
																	</div>

																</div>

															</div>
														</div>
													</div>
												</div>
											</li>
											<li>


												<div class="elements">
													<div class="main_width">
														<div class="role-content">
															<div class="role-content-inner">


																<div class="role-listing">
																	<div class="role-listing-title">III. Quy định chung:</div>
																	<p>
																		Trong Quy chế này, trừ khi chủ thể hoặc ngữ cảnh có yêu cầu khác, các từ và các thuật ngữ
																		sau đây sẽ có ý nghĩa sau đây:
																	</p>

																	<div class="role-listing-content">
																		<p class="role-listing-subcontent">
																			− dinhgiatructuyen.vn: Là trang website www.dinhgiatructuyen.vn trực thuộc Công ty Cổ
																			phần Thẩm định giá Thế Kỷ - CEN VALUE. Đây là website giao dịch thương mại điện tử, nơi
																			các tổ chức, cá nhân có thể tra cứu thông tin đơn giá đất, định giá nhà đất, bất động
																			sản, tài sản, tìm hiểu thông tin thị trường, đăng các thông tin liên hệ nhằm phục vụ mục
																			đích cung cấp thông tin đơn giá đất nhà nước, đơn giá đất thị trường, giá trị tài sản,
																			bất động sản do Khách hàng cung cấp thông tin.
																		</p>

																		<p class="role-listing-subcontent">
																			− Khách hàng: Là các tổ chức/cá nhân/thương nhân sử dụng website dinhgiatructuyen.vn và
																			các ứng dụng liên quan, bao gồm cả Người dùng và Thành viên có nhu cầu sử dụng website
																			và các dịch vụ được cung cấp bởi website dinhgiatructuyen.vn một cách tự nguyện.
																		</p>

																		<p class="role-listing-subcontent">
																			− Thông tin: Là những thông tin được công khai trên trang website dinhgiatructuyen.vn.
																			Bao gồm nhưng không giới hạn các nội dung như: Thông tin về dịch vụ, Thông tin cá nhân,
																			Thông tin doanh nghiệp, Thông tin về thị trường/dịch vụ được giới thiệu trên các nguồn
																			chính thống khác.
																		</p>

																		<p class="role-listing-subcontent">
																			− Chăm sóc Khách hàng: Khi đăng ký thành công tài khoản, Khách hàng sẽ nhận được các
																			thông tin liên quan đến việc hỗ trợ sử dụng sản phẩm, dịch vụ và chăm sóc Khách hàng của
																			dinhgiatructuyen.vn qua các kênh như: điện thoại, email, tin nhắn SMS. Nội dung điện
																			thoại, email và tin nhắn được dinhgiatructuyen.vn sử dụng theo quy định pháp luật hiện
																			hành.
																		</p>
																	</div>
																	<div class="role-listing-title">IV. Quy trình giao dịch</div>
																	<div class="role-listing-content">
																		<div class="role-listing-subcontent">
																			<p class="role-listing-subtitle">1. Nguyên tắc chung</p>

																			<p>Website dinhgiatructuyen.vn cung cấp các dịch vụ trực tuyến cho những
																				Khách hàng có nhu cầu:</p>

																				<div class="ml-10" style="margin-left: 10px; margin-top: 10px;">
																					<p>
																						− Sản phẩm hàng hóa, dịch vụ tham gia giao dịch trên Website
																						dinhgiatructuyen.vn phải được phép kinh doanh, lưu hành và không thuộc các
																						trường hợp cấm kinh doanh, cấm quảng cáo theo quy định của pháp luật Việt Nam.
																					</p>

																					− Thành viên tham gia giao dịch trên Website dinhgiatructuyen.vn là cá
																					nhân và/hoặc doanh nghiệp và/hoặc thương nhân có nhu cầu mua hoặc bán sản phẩm trên
																					Website dinhgiatructuyen.vn. Thành viên phải đăng ký các thông tin liên
																					quan, được Website dinhgiatructuyen.vn chính thức công nhận. Thành viên
																					sử dụng trang web này đồng ý rằng:


																					<div style="margin-left: 20px;">
																						<p>
																							• Là một cá nhân và/hoặc doanh nghiệp và/hoặc thương nhân;
																						</p>

																						<p>
																							• Có đầy đủ năng lực hành vi dân sự;
																						</p>

																						<p>
																							• Việc Thành viên truy cập trang website này tại mọi thời điểm, địa điểm
																							Thành viên phải thực hiện đầy đủ các điều khoản trong Quy chế này;
																						</p>

																						<p>
																							• Thành viên phải bảo vệ mật khẩu của Thành viên và giám sát các thông tin
																							có liên quan đến tài khoản của Thành viên; Thành viên hiểu và đồng ý rằng
																							Thành viên sẽ chịu trách nhiệm cả về việc tài khoản của Thành viên được sử
																							dụng bởi bất cứ ai mà Thành viên cho phép truy cập vào nó;
																						</p>

																						<p>
																							• Các thông tin mà Thành viên cung cấp cho Website
																							dinhgiatructuyen.vn là thông tin chính xác, đầy đủ và đúng sự thật;
																						</p>

																						<p>
																							• Các nội dung trong bản Quy chế này phải tuân thủ theo hệ thống pháp luật
																							hiện hành của Việt Nam. Thành viên khi tham gia vào Website
																							dinhgiatructuyen.vn phải tự tìm hiểu trách nhiệm pháp lý của mình đối với
																							luật pháp hiện hành của Việt Nam và cam kết thực hiện đúng những nội dung
																							trong Quy chế của Website dinhgiatructuyen.vn.
																						</p>

																					</div>


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


													<div class="elements">
														<div class="main_width">
															<div class="role-content">

																<div class="role-content-inner">


																	<div class="role-listing-content">
																		<div class="role-listing-subcontent">
																			<p class="role-listing-subtitle">2. Quy trình giao dịch:</p>

																			<div style="margin-left: 10px;">
																				<div class="role-listing-subcontent">
																					a). Quy trình giao dịch dành cho Người Mua: Người mua xe có thể đăng ký làm thành
																					viên của Website dinhgiatructuyen.vn hoặc không. Bằng cách truy cập vào
																					địa chỉ website: dinhgiatructuyen.vn người dùng có thể tìm danh sách các xe mà mình
																					quan tâm. Nếu người dùng có nhu cầu mua sẽ liên hệ trực tiếp với người đăng tin để
																					xem xe và thỏa thuận việc giao dịch giữa hai Bên cụ thể. dinhgiatructuyen.vn sẽ
																					không tham gia và không chịu trách nhiệm liên quan vào quá trình giao dịch giữa
																					người mua và người bán.

																				</div>
																				<div class="role-listing-subcontent">
																					b). Quy trình dành cho Người Bán Hàng/Đăng Tin: Người đăng tin bán xe trên
																					dinhgiatructuyen.vn bắt buộc phải đăng ký làm thành viên của dinhgiatructuyen.vn và
																					phải đăng nhập vào hệ thống website dinhgiatructuyen.vn. Cách thức đăng ký thành
																					viên và đăng nhập theo hướng dẫn tại:
																					http://www.dinhgiatructuyen.vn/huong-dan-su-dung/
																				</div>
																				<div class="role-listing-subcontent">
																					c). Quy trình giao nhận vận chuyển: Là thỏa thuận trực tiếp giữa người mua và người
																					bán hàng/đăng tin, dinhgiatructuyen.vn không tham gia vào quá trình này.
																				</div>
																				<div class="role-listing-subcontent">
																					d). Quy trình xác nhận/hủy đơn hàng: Website dinhgiatructuyen.vn không có chức năng
																					lập đơn hàng mua xe. Người mua chỉ tìm thông tin xe trên trang dinhgiatructuyen.vn
																					rồi liên hệ trực tiếp với người bán.
																				</div>
																				<div class="role-listing-subcontent">
																					e). Quy trình bảo hành/bảo trì sản phẩm: Không có
																				</div>

																				<div class="role-listing-subcontent">
																					<p>
																						f). Quy trình giải quyết tranh chấp, khiếu nại:
																					</p>

																					<div style="margin-left: 15px;">
																						<p class="role-listing-subcontent">
																							- Nếu phát sinh tranh chấp giữa Thành viên và Website
																							dinhgiatructuyen.vn, Website dinhgiatructuyen.vn cố gắng cung cấp
																							một phương thức trung lập và tiết kiệm để giải quyết tranh chấp nhanh chóng.
																							Theo đó, Thành viên và Website dinhgiatructuyen.vn đồng ý rằng
																							Website dinhgiatructuyen.vn sẽ giải quyết theo pháp luật bất kỳ
																							khiếu nại hoặc tranh cãi ngoài Thỏa thuận này hoặc các dịch vụ của Sàn giao
																							dịch TMĐT dinhgiatructuyen.vn phù hợp với một trong những phần phụ lục bên
																							dưới hoặc như Website dinhgiatructuyen.vn và Thành viên đồng ý
																							bằng văn bản.
																						</p>

																						<p class="role-listing-subcontent">
																							- Trước khi sử dụng đến các biện pháp thay thế, Website
																							dinhgiatructuyen.vn khuyến khích Thành viên trước tiên hãy liên hệ với Sàn
																							Giao dịch TMĐT dinhgiatructuyen.vn để tìm được giải pháp phù hợp. Sàn Giao
																							dịch TMĐT dinhgiatructuyen.vn sẽ xem xét yêu cầu hợp lý để giải quyết tranh
																							chấp thông qua các thủ tục giải quyết tranh chấp thay thế, chẳng hạn như
																							trọng tài, thay thế cho kiện tụng. Bất kỳ khiếu nại nào phát sinh trong quá
																							trình sử dụng dịch vụ trên Website dinhgiatructuyen.vn phải được
																							gởi đến Phòng Hỗ Trợ Khách hàng của dinhgiatructuyen.vn tại địa chỉ email:
																							info@dinhgiatructuyen.vn, ngay sau khi xày ra sự kiện phát sinh khiếu nại.
																							dinhgiatructuyen.vn sẽ căn cứ từng trường hợp cụ thể để có phương án giải
																							quyết cho phù hợp. Mọi tranh chấp giữa người sử dụng với nhau hoặc giữa
																							người sử dụng với website dinhgiatructuyen.vn sẽ được giải quyết trên cơ sở
																							thương lượng. Trường hợp không đạt được thỏa thuận như mong muốn, một trong
																							hai Bên có quyền đưa vụ việc ra Tòa án nhân dân có thẩm quyền hoặc Trọng Tài
																							Thương Mại Quốc Tế Việt Nam để giải quyết.
																						</p>
																					</div>

																				</div>
																				<div class="role-listing-subcontent">
																					dinhgiatructuyen.vn không chịu trách nhiệm và liên quan đến giao dịch giữa người mua
																					và người mua và người bán
																					IV.　Quy trình giao dịch
																					Đối với người mua xe: Người mua tự liên hệ với thành viên đăng tin bán xe để tiến
																					hành giao dịch và thanh toán.
																					Khách hàng có thể nạp tiền vào tài khoản dinhgiatructuyen.vn bằng cách đăng nhập vào
																					tài khoản của bạn tại website dinhgiatructuyen.vn, ở trang tài khoản, bấm “Nạp tiền”
																					để thực hiện giao dịch nạp tiền theo hướng dẫn.
																					Quý khách có thể lựa chọn nạp tiền vào tài khoản theo những hình thức sau:
																					Cách 1: Thẻ nội địa (Chuyển tiền qua online banking).
																					Cách 2: Nạp tiền qua thẻ thanh toán quốc tế (Visa, MasterCard, JCB).
																					Cách 3: Nạp tiền qua thẻ cào trả trước (Mobifone, Viettel, Vinaphone,
																					Vietnammobile).
																					Cách 4: Chuyển khoản
																					Cách 5: Nhắn tin SMS
																					Chi tiết biểu phí dịch vụ, quý khách có thể tham khảo tại:
																					http://dinhgiatructuyen.vn/bang-gia-dich-vu/

																				</div>

																			</div>

																		</div>
																	</div>
																</div>
															</div>
														</div>
													</li>
													<li>


														<div class="elements">
															<div class="main_width">
																<div class="role-content">
																	<div class="role-content-inner">

																		<div class="role-listing">

																			<div class="role-listing-content">
																				<div class="role-listing-subcontent">
																					<p class="role-listing-subtitle">3. Quy định về giao dịch trên hệ thống
																						dinhgiatructuyen.vn</p>

																						<p>Website dinhgiatructuyen.vn có các quy định về giao dịch như sau:</p>

																						<div class="role-listing-subcontent" style="margin-left: 10px;">
																							<p>
																								− dinhgiatructuyen.vn không hỗ trợ hoàn trả tiền cho các giao dịch mà Quý Khách
																								hàng thực hiện trên website dinhgiatructuyen.vn. Trong các trường hợp Thành viên
																								hoặc/và Khách hàng sử dụng chức năng nhắn tin SMS mà gửi nhầm đầu số hoặc các
																								tin nhắn không hợp lệ và vẫn bị trừ tiền trong tài khoản thì dinhgiatructuyen.vn
																								sẽ không chịu trách nhiệm về vấn đề này.
																							</p>

																							<p>
																								− Nếu giao dịch của Thành viên và/hoặc Khách hàng không thành công vì lý do giao
																								dịch có dấu hiệu rủi ro (thẻ đã bị trừ tiền), vui lòng liên hệ bộ phận hỗ trợ
																								Khách hàng theo email: hi@cenvalue.vn
																							</p>

																							<p>
																								− Trong trường hợp giao dịch bị khiếu nại, chargeback (đòi bồi hoàn), hai Bên sẽ
																								thống nhất giải quyết khiếu nại theo quy định của pháp luật hiện hành.
																							</p>

																							<p>
																								− Thành viên và/hoặc Khách hàng không được nạp tiền vào tài khoản (và/hoặc nếu
																								cố tình nạp thì số tiền đó có thể bị đóng băng/tạm giữ bởi dinhgiatructuyen.vn
																								tại bất cứ thời điểm nào) trong trường hợp số tiền bạn chuyển nạp có nguồn gốc
																								không hợp pháp, ví dụ: Chuyển tiền từ thẻ tín dụng hoặc thẻ ghi nợ quốc tế ăn
																								cắp…
																							</p>
																						</div>
																						<div class="role-listing-subcontent" style="margin-left: 10px;">
																							<div>
																								a). Đối với các giao dịch thanh toán qua cổng thanh toán 1Pay:
																								Các giao dịch thanh toán được thực hiện qua bên đối tác thứ ba – cổng thanh toán
																								1Pay, thì các thông tin tài khoản, số thẻ không được lưu trữ trên server
																								dinhgiatructuyen.vn

																							</div>
																							<div>
																								<p>b). Đối với nạp tiền bằng thẻ cào điện thoại: </p>

																								<div>
																									<p>
																										− Thành viên và/hoặc Khách hàng chỉ được phép nhập sai số series của thẻ
																										cào tối đa ba (3) lần, từ lần thứ tư (4) trở đi thẻ cào sẽ bị khóa (đây
																										là chính sách áp dụng chung của tất cả các nhà mạng)
																									</p>

																									<p>
																										− Khoảng cách thời gian kết thúc tin nhắn trước và thời gian bắt đầu
																										nhắn tin sau phải lớn hơn năm (5) giây. Website
																										dinhgiatructuyen.vn không có trách nhiệm giải quyết các thắc mắc khiếu
																										nại liên quan phát sinh.
																									</p>

																									<p>
																										− dinhgiatructuyen.vn tuân thủ các quy định về chống spam tin nhắn của
																										các nhà mạng. Tùy vào từng nhà cung cấp dịch vụ mạng di động, các bạn
																										lưu ý đọc kỹ các quy định riêng đối với từng mạng di động dưới đây:
																										Quy định của mạng VinaPhone đối với Khách hàng sử dụng thuê bao trả
																										trước: Không giới hạn số lượng tin nhắn gửi đển các đầu số dịch vụ nội
																										dung. Đối với khách hàng sử dụng thuê bao trả sau: Tổng cước sử dụng
																										dịch vụ của 01 (một) thuê bao không quá: 100.000vnđ/ngày (từ 0h00 đến
																										23h59, đã bao gồm thuế GTGT).
																										Quy định của mạng Viettel: Khách hàng không được sử dụng các dịch vụ nội
																										dung của một nhà cung cấp quá 150.000vnđ/ngày (từ 0h00 đến 23h59, đã bao
																										gồm thuế GTGT).
																										Quy định của mạng Mobifone: Từ ngày 01/11/2012, Khách hàng không được sử
																										dụng các dịch vụ nội dung của một nhà cung cấp quá 300.000vnđ/ngày (từ
																										0h00 đến 23h59, đã bao gồm thuế GTGT).
																									</p>
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
														</li>

														<li>


															<div class="elements">
																<div class="main_width">
																	<div class="role-content">
																		<div class="role-content-inner">

																			<div class="role-listing">
																				<div class="role-listing-title">V. Đảm bảo an toàn giao dịch:</div>
																				<div class="role-listing-content">
																					<div class="role-listing-subcontent">

																						<div class="role-listing-subcontent" style="margin-left: 10px;">
																							<span class="role-listing-subtitle">1.  Quản lý thông tin của Người Bán Hàng</span>:
																							Khi đăng ký tham gia bán hàng trên Website dinhgiatructuyen.vn, Người Bán
																							Hàng phải cung cấp đầy đủ các thông tin liên quan và phải hoàn toàn chịu trách nhiệm
																							đối với các thông tin này. Các thông tin cụ thể bao gồm: thông tin về nhân thân đối
																							với cá nhân, thông tin về tư cách pháp lý đối với thành viên là tổ chức, pháp nhân.
																							Các thông tin này sẽ được Website dinhgiatructuyen.vn đưa vào dữ liệu
																							quản lý.
																						</div>
																						<div class="role-listing-subcontent" style="margin-left: 10px;">
																							<span
																							class="role-listing-subtitle">2.  Kiểm soát giao dịch của Người Bán Hàng</span>:
																							Các giao dịch của Người Bán Hàng với Khách hàng là trực tiếp và không qua Sàn Giao
																							dịch TMĐT dinhgiatructuyen.vn vì vậy dinhgiatructuyen.vn khuyến cáo Khách hàng cần
																							tìm hiểu và xác thực thông tin của người bán trước khi thực hiện giao dịch
																						</div>
																						<div class="role-listing-subcontent" style="margin-left: 10px;">
																							<span class="role-listing-subtitle">3.  Cơ chế gửi khiếu nại về Người Bán Hàng dành cho các Khách hàng</span>:
																							Khách hàng có quyền gửi khiếu nại về Người Bán Hàng đến Website
																							dinhgiatructuyen.vn. Khi tiếp nhận những phản hồi này, Website
																							dinhgiatructuyen.vn sẽ xác nhận lại thông tin, trường hợp đúng như phản ánh của
																							người mua tùy theo mức độ, Website dinhgiatructuyen.vn sẽ có những biện
																							pháp xử lý kịp thời nhằm bảo vệ quyền lợi của Khách hàng.
																						</div>

																						<div class="role-listing-subcontent" style="margin-left: 10px;">
																							<div class="role-listing-subtitle">
																								4. Bảo vệ thông tin cá nhân Khách hàng:

																							</div>
																							<div style="margin-left: 10px;">
																								<p>
																									− Chính sách bảo mật này công bố cách thức mà Website
																									dinhgiatructuyen.vn thu thập, lưu trữ và xử lý thông tin hoặc dữ liệu cá
																									nhân (sau đây gọi chung là “Thông tin cá nhân”) của các Khách hàng của mình
																									thông qua wesite của Website dinhgiatructuyen.vn.
																								</p>

																								<p>
																									− Website dinhgiatructuyen.vn cam kết sẽ bảo mật các Thông tin cá
																									nhân của Khách hàng, sẽ nỗ lực hết sức và sử dụng các biện pháp thích hợp để
																									các thông tin mà Khách hàng cung cấp cho dinhgiatructuyen.vn trong quá trình
																									sử dụng website này được bảo mật và bảo vệ khỏi sự truy cập trái phép.
																								</p>

																								<p>
																									− Tuy nhiên, Website dinhgiatructuyen.vn không đảm bảo ngăn chặn
																									được tất cả các truy cập trái phép. Trong trường hợp truy cập trái phép nằm
																									ngoài khả năng kiểm soát của dinhgiatructuyen.vn, Website
																									dinhgiatructuyen.vn sẽ không chịu trách nhiệm dưới bất kỳ hình thức nào đối
																									với bất kỳ khiếu nại, tranh chấp hoặc thiệt hại nào phát sinh từ hoặc liên
																									quan đến truy cập trái phép đó.
																								</p>

																								<p>
																									− Khách hàng được khuyến nghị để nắm rõ những quyền lợi của mình khi sử dụng
																									các dịch vụ của Website dinhgiatructuyen.vn được cung cấp trên
																									website này.
																								</p>

																								<p>
																									− Website dinhgiatructuyen.vn đưa ra các cam kết dưới đây phù hợp
																									với các quy định của pháp luật Việt Nam, trong đó bao gồm các cách thức mà
																									dinhgiatructuyen.vn sử dụng để bảo mật thông tin của Khách hàng.
																								</p>
																							</div>
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


															<div class="elements">
																<div class="main_width">
																	<div class="role-content">
																		<div class="role-content-inner">

																			<div class="role-listing">

																				<div class="role-listing-content">
																					<div class="role-listing-subcontent">


																						<div class="role-listing-subcontent" style="margin-left: 10px;">
																							<div class="role-listing-subtitle">
																								5. Mục đích thu thập Thông tin cá nhân: Website dinhgiatructuyen.vn
																								thu thập Thông tin cá nhân của Khách hàng cho một hoặc một số mục đích như sau:

																							</div>
																							<div style="margin-left: 10px;">
																								<p>
																									− Thực hiện và quản lý việc đặt hàng cho Khách hàng;
																								</p>

																								<p>
																									− Thực hiện và quản lý việc sử dụng dịch vụ vận chuyển hàng hóa;
																								</p>

																								<p>
																									− Thực hiện và quản lý hoạt động tiếp thị, cung cấp thông tin khuyến mại tới
																									Khách hàng như gửi các cập nhật mới nhất về thông tin khuyến mại và chào giá
																									mới liên quan đến sản phẩm và dịch vụ của Website
																									dinhgiatructuyen.vn;
																								</p>

																								<p>
																									− Cung cấp giải pháp nâng hạng và thay đổi dịch vụ nhằm phục vụ nhu cầu
																									Khách hàng;
																								</p>

																								<p>
																									− Quản lý, phân tích, đánh giá số liệu liên quan đến dữ liệu của Khách hàng
																									để xây dựng chính sách bán và chính sách phục vụ Khách hàng phù hợp;
																								</p>

																								<p>
																									− Tiếp nhận thông tin, góp ý, đề xuất, khiếu nại của Khách hàng nhằm cải
																									thiện chất lượng dịch vụ của Website dinhgiatructuyen.vn;
																								</p>

																								<p>
																									− Liên hệ với Khách hàng để giải quyết các yêu cầu của Khách hàng;
																								</p>

																								<p>
																									− Đảm bảo an ninh, an toàn đối với các giao dịch thanh toán trực tuyến.
																								</p>
																							</div>
																						</div>

																						<div class="role-listing-subcontent" style="margin-left: 10px;">
																							<div class="role-listing-subtitle">
																								6. Loại thông tin thu thập:
																							</div>
																							<p>Những loại Thông tin cá nhân mà Website dinhgiatructuyen.vn thu thập
																								từ Khách hàng của mình bao gồm:</p>

																								<div style="margin-left: 10px;">
																									<p>
																										− Thông tin cá nhân gồm: Họ và tên, Tên truy cập;…
																									</p>

																									<p>
																										− Thông tin liên lạc như số điện thoại, địa chỉ gửi thư, địa
																										chỉ email, số fax;…
																									</p>

																									<p>
																										− Thông tin về doanh nghiệp của Khách hàng như tên doanh nghiệp, địa chỉ
																										doanh nghiệp, chức danh;…
																									</p>

																								</div>
																								<p>
																									Các Thông tin cá nhân trên được yêu cầu đối với những dịch vụ cụ thể, Khách hàng
																									có quyền từ chối hoặc không cung cấp đầy đủ các thông tin được yêu cầu. Trong
																									trường hợp đó, Website dinhgiatructuyen.vn không thể cung cấp cho
																									Khách hàng những dịch vụ đầy đủ và chất lượng. Website
																									dinhgiatructuyen.vn cần sự hỗ trợ từ phía Khách hàng trong việc đảm bảo tính
																									chính xác và đầy đủ của các thông tin thu thập. Vì vậy, xin vui lòng thông báo
																									cho dinhgiatructuyen.vn về bất kỳ sự thay đổi nào trong Thông tin cá nhân Khách
																									hàng bằng việc liên hệ với dinhgiatructuyen.vn qua các hình thức được công bố
																									trên website.
																								</p>
																							</div>

																							<div class="role-listing-subcontent" style="margin-left: 10px;">
																								<div class="role-listing-subtitle">
																									7. Thời gian lưu trữ thông tin thu thập:
																								</div>

																								<div style="margin-left: 10px;">
																									Website dinhgiatructuyen.vn sẽ lưu trữ các Thông tin cá nhân do Khách
																									hàng cung cấp trên các hệ thống nội bộ của dinhgiatructuyen.vn trong quá trình
																									cung cấp dịch vụ cho Khách hàng hoặc cho đến khi hoàn thành mục đích thu thập
																									hoặc khi Khách hàng có yêu cầu hủy các thông tin đã cung cấp. Nhưng
																									dinhgiatructuyen.vn sẽ lưu lại số điện thoại đã đăng ký để phục vụ cho điều
																									khoản mỗi số điện thoại chỉ đăng ký duy nhất 01 (một) tài khoản trên
																									dinhgiatructuyen.vn và chỉ được đăng 01 (một) tin miễn phí duy nhất.
																								</div>

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


																<div class="elements">
																	<div class="main_width">
																		<div class="role-content">
																			<div class="role-content-inner">

																				<div class="role-listing">

																					<div class="role-listing-content">
																						<div class="role-listing-subcontent">


																							<div class="role-listing-subcontent" style="margin-left: 10px;">
																								<div class="role-listing-subtitle">
																									8. Việc công bố Thông tin thu thập
																								</div>
																								<p style="margin-left: 10px;">
																									Website dinhgiatructuyen.vn có thể tiết lộ Thông tin cá nhân từ Khách
																									hàng cho Bên thứ ba để đáp ứng yêu cầu pháp lý, thực thi các chính sách của
																									dinhgiatructuyen.vn, khi có thông báo rằng một danh sách hoặc nội dung vi phạm
																									các quyền lợi, hoặc để bảo vệ quyền lợi, tài sản hoặc sự an toàn. Những thông
																									tin này sẽ được công bố theo quy định của pháp luật và các quy định hiện hành.
																									Website dinhgiatructuyen.vn cũng có thể chia sẻ thông tin cá nhân của
																									bạn cho:
																								</p>

																								<div style="margin-left: 10px;">
																									<p>
																										− Bên thứ ba để cung cấp nội dung và dịch vụ chung (như đăng ký, giao dịch
																										và hỗ trợ Khách hàng), giúp phát hiện và ngăn chặn hành vi bất hợp pháp và
																										vi phạm chính sách của dinhgiatructuyen.vn, và để hướng dẫn các quyết định
																										về sản phẩm, dịch vụ và thông tin liên lạc của Bên thứ ba. Các Bên thứ ba sẽ
																										sử dụng thông tin này để gửi cho bạn thông tin liên lạc tiếp thị chỉ khi bạn
																										yêu cầu dịch vụ của họ.
																									</p>

																									<p>
																										− Cung cấp dịch vụ theo hợp đồng hỗ trợ hoạt động kinh doanh của
																										dinhgiatructuyen.vn (bao gồm nhưng không giới hạn các nội dung như: điều tra
																										gian lận, thu thập hóa đơn, liên kết, các chương trình khen thưởng và hỗ trợ
																										Khách hàng). Bên thứ ba khác mà bạn yêu cầu dinhgiatructuyen.vn gửi thông
																										tin của bạn (hoặc/và bên mà Khách hàng đồng ý khi sử dụng một dịch vụ cụ thể
																										khác).
																									</p>

																									<p>
																										− Các cơ quan thực thi pháp luật, các cơ quan khác của chính phủ hoặc các
																										Bên thứ ba để đáp ứng yêu cầu thông tin liên quan đến điều tra hình sự, hoạt
																										động bất hợp pháp bị cáo buộc hoặc bất kỳ hoạt động nào khác có thể làm cho
																										dinhgiatructuyen.vn, Khách hàng hay bất kỳ người dùng dinhgiatructuyen.vn
																										phải chịu trách nhiệm pháp lý. Các thông tin cá nhân dinhgiatructuyen.vn
																										tiết lộ có thể bao gồm ID người dùng của bạn và lịch sử ID người dùng, tên,
																										thành phố, quận, số điện thoại, địa chỉ email, khiếu nại gian lận và đấu
																										thầu và danh sách lược sử hoặc bất cứ điều gì khác mà dinhgiatructuyen.vn
																										cho là có liên quan.
																									</p>

																									<p>
																										− Các cơ quan khác có liên quan đến điều tra gian lận, vi phạm sở hữu trí
																										tuệ, vi phạm bản quyền, hoặc các hoạt động bất hợp pháp khác, tùy theo quyết
																										định của dinhgiatructuyen.vn tin rằng cần thiết hoặc thích hợp, hoặc theo
																										thỏa thuận bảo mật hoặc theo yêu cầu của pháp luật. Khi đó,
																										dinhgiatructuyen.vn có thể tiết lộ tên, địa chỉ, thành phố, quận, quốc gia,
																										số điện thoại, địa chỉ email và tên công ty.
																									</p>

																									<p>
																										− Các đơn vị kinh doanh khác mà dinhgiatructuyen.vn kế hoạch sát nhập với
																										hoặc được mua lại bởi một cá thể kinh doanh. Trong trường hợp có một sự sát
																										nhập như vậy xảy ra, dinhgiatructuyen.vn sẽ yêu cầu đơn vị sát nhập thực thi
																										Chính sách Bảo mật này đối với Thông tin cá nhân của Khách hàng. Nếu Thông
																										tin cá nhân của Khách hàng được sử dụng trái với Chính sách này, Khách hàng
																										sẽ nhận được thông báo trước. Các Bên thứ ba và Các Liên Kết Sàn TMĐT
																										dinhgiatructuyen.vn có thể chuyển thông tin của Khách hàng cho các công ty
																										khác trong nhóm. Website dinhgiatructuyen.vn có thể chuyển thông
																										tin của Quý Khách hàng cho các đại lý và nhà thầu phụ trong khuôn khổ quy
																										định của Chính sách Bảo mật.
																										Ví dụ: dinhgiatructuyen.vn sẽ nhờ Bên thứ ba giao hàng, nhận tiền thanh
																										toán, phân tích dữ liệu, tiếp thị và dịch vụ hỗ trợ Khách hàng.
																										dinhgiatructuyen.vn có thể trao đổi thông tin với Bên thứ ba với mục đích
																										chống gian lận và giảm rủi ro tín dụng. dinhgiatructuyen.vn có thể chuyển cơ
																										sở dữ liệu gồm thông tin cá nhân của bạn nếu dinhgiatructuyen.vn bán cả công
																										ty hoặc chỉ một phần.
																									</p>

																									<p>
																										− Trong khuôn khổ Chính sách bảo mật, dinhgiatructuyen.vn không bán hay tiết
																										lộ dữ liệu cá nhân của bạn cho Bên thứ ba mà KHÔNG được đồng ý trước trừ khi
																										điều này là cần thiết cho các điều khoản trong Chính sách bảo mật hoặc
																										dinhgiatructuyen.vn được yêu cầu phải làm như vậy theo quy định của Pháp
																										luật.
																									</p>

																									<p>
																										− Website có thể bao gồm quảng cáo của Bên thứ ba và các liên kết đến các
																										trang website khác hoặc khung của các trang website khác. Xin lưu ý rằng
																										dinhgiatructuyen.vn không có nhiệm vụ về việc Bên thứ ba hay các website
																										khác hoặc bất kỳ Bên thứ ba nào mà dinhgiatructuyen.vn chuyển giao dữ liệu
																										cho phù hợp với Chính sách bảo mật, vi phạm bảo mật thông tin hay nội dung
																										Bảo mật thông tin.
																									</p>
																								</div>
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


																<div class="elements">
																	<div class="main_width">
																		<div class="role-content">
																			<div class="role-content-inner">

																				<div class="role-listing">

																					<div class="role-listing-content">
																						<div class="role-listing-subcontent">

																							<div class="role-listing-subcontent" style="margin-left: 10px;">
																								<div class="role-listing-subtitle">
																									9. Quyền của Khách hàng đối với các Thông tin cá nhân được thu thập
																								</div>
																								<p>
																									Bất kỳ Khách hàng nào tự nguyện cung cấp Thông tin cá nhân cho Sàn Giao dịch
																									TMĐT dinhgiatructuyen.vn đều có các quyền như sau:
																								</p>

																								<div style="margin-left: 10px;">
																									<p>
																										− Yêu cầu xem lại các thông tin được thu thập;
																									</p>

																									<p>
																										− Yêu cầu sao chép lại các thông tin được thu thập;
																									</p>

																									<p>
																										− Yêu cầu chỉnh sửa, bổ sung thông tin được thu thập (đối với Khách hàng
																										nhận thông tin qua E-Newsletter và hội viên Chương trình Khách hàng thân
																										thiết, Khách hàng có thể truy cập và tự chỉnh sửa thông tin của mình bằng
																										cách truy cập vào tài khoản của mình trên website dinhgiatructuyen.vn);
																									</p>

																									<p>
																										− Yêu cầu dừng việc thu thập thông tin;
																									</p>

																									<p>
																										− Khách hàng có thể thực hiện các quyền trên bằng cách tự truy cập vào
																										website hoặc liên hệ với dinhgiatructuyen.vn qua email hoặc địa chỉ liên lạc
																										được công bố trên website của Website dinhgiatructuyen.vn.
																									</p>

																									<p>
																										− Trong trường hợp Khách hàng cung cấp cho dinhgiatructuyen.vn các Thông tin
																										cá nhân không chính xác hoặc không đầy đủ để xác nhận được nhân thân Khách
																										hàng, dinhgiatructuyen.vn không thể bảo vệ được quyền bảo mật của Khách hàng
																										theo quy định trên.
																									</p>

																								</div>
																							</div>


																						</div>
																					</div>
																					<div class="role-listing">
																						<div class="role-listing-title">VI. Quản lý thông tin xấu:</div>
																						<div class="role-listing-content">
																							<div class="role-listing-subcontent">
																								<div class="role-listing-subcontent" style="margin-left: 10px;">
																									<div class="role-listing-subtitle">
																										1. Quy chế đăng tin:
																									</div>
																									<p>
																										Là thành viên của dinhgiatructuyen.vn Khách hàng có thể tra cứu đơn giá đất,
																										định giá tài sản, bất động sản, nhà đất trên website dinhgiatructuyen.vn
																									</p>

																									<div style="margin-left: 10px;">
																										<div style="margin: 5px 0px;">
																											− Để sử dụng dịch vụ trên dinhgiatructuyen.vn Khách hàng cần phải là
																											Thành viên và phải đăng nhập vào dinhgiatructuyen.vn
																										</div>
																										<div style="margin: 5px 0px;">
																											− Thành viên cá nhân (thành viên thường) không được để thông tin liên hệ
																											là tên công ty/tổ chức khi sử dụng dịch vụ
																										</div>
																										<div style="margin: 5px 0px;">
																											− Người đăng tin phải hoàn toàn chịu trách nhiệm về nội dung và thông
																											tin đăng của mình trên dinhgiatructuyen.vn.
																										</div>
																										<div style="margin: 5px 0px;">
																											− Các tin đăng nếu vi phạm một trong những tiêu chí sau thì sẽ bị Ban
																											Quản Trị dinhgiatructuyen.vn xóa mà không cần báo trước:
																											<div style="margin-left: 10px;">
																												<p>
																													• Thông tin liên lạc (trong phần đăng ký tài khoản) không đúng
																													(người dùng không thể liên lạc được, hoặc bản
																													thân người có trong thông tin liên lạc không đăng tin)
																												</p>

																												<p>
																													• Tin đăng để số điện thoại/email không đúng quy định (nhập số
																													điện thoại/email vào phần mô tả thông tin)
																												</p>
																											</div>
																										</div>

																									</div>
																								</div>
																								<div class="role-listing-subcontent" style="margin-left: 10px;">
																									<div class="role-listing-subtitle">
																										2. Nghiêm cấm:
																									</div>
																									<p>
																										Là thành viên của dinhgiatructuyen.vn Khách hàng có thể tra cứu đơn giá đất,
																										định giá tài sản, bất động sản, nhà đất trên website dinhgiatructuyen.vn
																									</p>

																									<div style="margin-left: 10px;">
																										<p>
																											− Không được đăng tải thông tin rao vặt mà pháp luật Việt Nam nghiêm
																											cấm.
																										</p>

																										<p>
																											− Không đăng tải thông tin rao vặt trái với đạo đức xã hội Việt Nam.
																										</p>

																										<p>
																											− Không đăng tải sex, crack, hack, chính trị, tôn giáo.
																										</p>
																									</div>
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


																	<div class="elements">
																		<div class="main_width">
																			<div class="role-content">
																				<div class="role-content-inner">

																					<div class="role-listing">


																						<div class="role-listing-content">
																							<div class="role-listing-subcontent">
																								<div class="role-listing-subcontent" style="margin-left: 10px;">
																									<div class="role-listing-subtitle">
																										3. Quyền hạn của của dinhgiatructuyen.vn:
																									</div>

																									<div style="margin-left: 10px;">
																										<p>
																											− Website dinhgiatructuyen.vn sẽ toàn quyền loại bỏ các thông tin
																											đăng của Thành viên và/hoặc Khách hàng nếu như tin đăng vi phạm quy chế đăng
																											tin
																										</p>

																										<p>
																											− Các tin đăng không phù hợp với chuyên mục quy định sẽ bị xóa hoặc Sàn Giao
																											dịch TMĐT dinhgiatructuyen.vn chuyển sang chuyên mục khác cho là hợp lý.
																										</p>

																										<p>
																											− Website dinhgiatructuyen.vn giữ quyền quyết định về việc lưu
																											giữ hay loại bỏ tin đã đăng trên trang web này mà không cần báo trước.
																										</p>

																										<p>
																											− Website dinhgiatructuyen.vn không giải quyết các tranh chấp
																											giữa khách hàng, cũng như không giải quyết bất cứ khiếu nại nào của khách
																											hàng về thông tin do khách hàng cung cấp.
																										</p>

																										<p>
																											− Website dinhgiatructuyen.vn có toàn quyền thay đổi một hay
																											nhiều điều khoản có trong quy định về đăng tin mà không cần giải thích lý do
																											và cũng không cần phải thông báo trước.
																										</p>

																										<p>
																											− Giới hạn trách nhiệm trong các trường hợp phát sinh lỗi kỹ thuật của Sàn
																											Giao dịch TMĐT dinhgiatructuyen.vn
																										</p>

																										<p>
																											− Website dinhgiatructuyen.vn cam kết nỗ lực đảm bảo sự an toàn
																											và ổn định của toàn bộ hệ thống kỹ thuật. Tuy nhiên, trong trường hợp xảy ra
																											sự cố do lỗi của dinhgiatructuyen.vn, dinhgiatructuyen.vn sẽ ngay lập tức áp
																											dụng các biện pháp để đảm bảo quyền lợi cho người sử dụng.
																										</p>

																										<p>
																											− Khi thực hiện các giao dịch, dịch vụ, bắt buộc các thành viên phải thực
																											hiện đúng theo các quy trình hướng dẫn.
																											− Ban Quản Trị website dinhgiatructuyen.vn cam kết cung cấp chất lượng dịch
																											vụ tốt nhất cho các thành viên tham gia giao dịch. Trường hợp phát sinh lỗi
																											kỹ thuật, lỗi phần mềm hoặc các lỗi khách quan khác dẫn đến Thành viên không
																											thể tham gia giao dịch được thì các Thành viên thông báo cho Ban Quản Trị
																											website qua email: hi@cenvalue.vn
																										</p>

																										<p>
																											− Ban Quản Trị website dinhgiatructuyen.vn sẽ không chịu trách nhiệm giải
																											quyết trong trường hợp thông báo của các Thành viên không đến được Ban Quản
																											Trị, phát sinh từ lỗi kỹ thuật, lỗi đường truyền, phần mềm hoặc các lỗi khác
																											không do Ban Quản Trị gây ra.
																										</p>

																									</div>
																								</div>


																							</div>
																						</div>
																						<div class="role-listing">

																							<div class="role-listing-title">VII. Quyền và Nghĩa vụ của các Bên tham gia website
																								dinhgiatructuyen.vn
																							</div>
																							<div class="role-listing-content">
																								<div class="role-listing-subcontent">
																									<div class="role-listing-subcontent" style="margin-left: 10px;">
																										<div class="role-listing-subtitle">
																											1. Quyền và Nghĩa vụ của Ban Quản Trị website dinhgiatructuyen.vn:
																										</div>

																										<div style="margin-left: 10px;">
																											<div>
																												<p>a). Ban Quản Trị website dinhgiatructuyen.vn có quyền:</p>

																												<div style="margin-left: 10px;">
																													<p>
																														− Có quyền từ chối, tạm ngừng hay chấm dứt tin đăng của Thành
																														viên trong trường hợp thành viên cung cấp thông tin không chính
																														xác, không đầy đủ, vi phạm pháp luật, đạo đức, thuần phong mỹ
																														tục Việt Nam;
																													</p>

																													<p>
																														− Có quyền từ chối cung cấp một hoặc tất cả dịch vụ nếu Thành
																														viên có những hoạt động lừa đảo, giả mạo, gây rối loạn thị
																														trường, gây mất đoàn kết đối với các Thành viên khác của Sàn
																														Giao dịch TMĐT dinhgiatructuyen.vn.
																													</p>

																													<p>
																														− Website dinhgiatructuyen.vn giữ bản quyền sử dụng
																														dịch vụ và các nội dung trên Website
																														dinhgiatructuyen.vn theo luật bản quyền Quốc Tế và các quy dịnh
																														pháp luật về bảo hộ sở hữu trí tuệ tại Việt Nam. Và, tất cả các
																														biểu tượng, logo, nội dung theo các ngôn ngữ khác nhau đều thuộc
																														quyền sở hữu của CEN VALUE. Nghiêm cấm mọi hành vi sao chép, sử
																														dụng và phổ biến bất hợp pháp các quyền sở hữu trên.
																													</p>
																												</div>
																											</div>
																											<div>
																												<p>
																													b). Ban Quản Trị website dinhgiatructuyen.vn có nghĩa vụ:</p>

																													<div style="margin-left: 10px;">
																														<p>
																															− Chịu trách nhiệm xây dựng và duy trì hoạt động bình thường của
																															website dinhgiatructuyen.vn. Ban Quản Trị chịu trách cung cấp
																															chất lượng dịch vụ tốt cho các thành viên tham gia giao dịch và
																															nhanh chóng khắc phục lỗi kỹ thuật, các lỗi khách quan khác
																															trong thời gian sớm nhất. Website dinhgiatructuyen.vn không chịu
																															trách nhiệm liên đới đối với các hậu quả xảy ra các sự kiện bất
																															khả kháng như: thiên tai, hỏa hoạn, biến động xã hội, các quyết
																															định của cơ quan chức năng...
																														</p>

																														<p>
																															− Xây dựng Cơ chế Hoạt động, Hợp đồng, Quy định, Hướng dẫn các
																															quy trình tra cứu, định giá… cho các Thành viên tham gia website
																															dinhgiatructuyen.vn
																														</p>

																														<p>
																															− Lưu giữ và cập nhật thông tin đăng ký của các Thành viên trên
																															website dinhgiatructuyen.vn
																														</p>

																														<p>
																															− Tích cực hỗ trợ cơ quan quản lý nhà nước điều tra các hành vi
																															kinh doanh vi phạm pháp luật; cung cấp các tài liệu như thông
																															tin đăng ký, lịch sử dữ liệu giao dịch… của đối tượng có hành vi
																															vi phạm pháp luật trên Website dinhgiatructuyen.vn.
																														</p>

																														<p>
																															− Bảo vệ thông tin cá nhân của Khách hàng trên
																															dinhgiatructuyen.vn.
																															dinhgiatructuyen.vn cam kết sẽ bảo mật các Thông tin cá nhân của
																															Khách hàng, sẽ nỗ lực hết sức và sử dụng các biện pháp thích hợp
																															để các thông tin mà Khách hàng cung cấp cho dinhgiatructuyen.vn
																															trong quá trình sử dụng website này được bảo mật và bảo vệ khỏi
																															sự truy cập trái phép. Tuy nhiên, dinhgiatructuyen.vn không đảm
																															bảo ngăn chặn được tất cả các truy cập trái phép. Trong trường
																															hợp truy cập trái phép nằm ngoài khả năng kiểm soát của
																															dinhgiatructuyen.vn, dinhgiatructuyen.vn sẽ không chịu trách
																															nhiệm dưới bất kỳ hình thức nào đối với bất kỳ khiếu nại, tranh
																															chấp hoặc thiệt hại nào phát sinh từ hoặc liên quan đến truy cập
																															trái phép đó.
																														</p>
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
																			</li>

																			<li>


																				<div class="elements">
																					<div class="main_width">
																						<div class="role-content">
																							<div class="role-content-inner">


																								<div class="role-listing">


																									<div class="role-listing-content">
																										<div class="role-listing-subcontent">
																											<div class="role-listing-subcontent" style="margin-left: 10px;">
																												<div class="role-listing-subtitle">

																												</div>

																												<div style="margin-left: 10px;">

																													<div>

																														<div style="margin-left: 10px;">

																															<p>
																																− Xây dựng Cơ chế Hoạt động, Hợp đồng, Quy định, Hướng dẫn các quy
																																trình tra cứu, định giá… cho các Thành viên tham gia website
																																dinhgiatructuyen.vn
																															</p>

																															<p>
																																− Lưu giữ và cập nhật thông tin đăng ký của các Thành viên trên
																																website dinhgiatructuyen.vn
																															</p>

																															<p>
																																− Tích cực hỗ trợ cơ quan quản lý nhà nước điều tra các hành vi kinh
																																doanh vi phạm pháp luật; cung cấp các tài liệu như thông tin đăng
																																ký, lịch sử dữ liệu giao dịch… của đối tượng có hành vi vi phạm pháp
																																luật trên Website dinhgiatructuyen.vn.
																															</p>

																															<p>
																																− Bảo vệ thông tin cá nhân của Khách hàng trên dinhgiatructuyen.vn.
																																dinhgiatructuyen.vn cam kết sẽ bảo mật các Thông tin cá nhân của
																																Khách hàng, sẽ nỗ lực hết sức và sử dụng các biện pháp thích hợp để
																																các thông tin mà Khách hàng cung cấp cho dinhgiatructuyen.vn trong
																																quá trình sử dụng website này được bảo mật và bảo vệ khỏi sự truy
																																cập trái phép. Tuy nhiên, dinhgiatructuyen.vn không đảm bảo ngăn
																																chặn được tất cả các truy cập trái phép. Trong trường hợp truy cập
																																trái phép nằm ngoài khả năng kiểm soát của dinhgiatructuyen.vn,
																																dinhgiatructuyen.vn sẽ không chịu trách nhiệm dưới bất kỳ hình thức
																																nào đối với bất kỳ khiếu nại, tranh chấp hoặc thiệt hại nào phát
																																sinh từ hoặc liên quan đến truy cập trái phép đó.
																															</p>
																														</div>
																													</div>

																												</div>
																											</div>
																											<div class="role-listing-content">
																												<div class="role-listing-subcontent">
																													<div class="role-listing-subcontent" style="margin-left: 10px;">
																														<div class="role-listing-subtitle">
																															2. Quyền và Nghĩa vụ của Thành viên
																														</div>

																														<div style="margin-left: 10px;">
																															<div>
																																<p>
																																	a). Quyền của Thành viên:
																																</p>

																																<div style="margin-left: 10px;">
																																	<p>
																																		− Khi đăng ký trở thành Thành viên của dinhgiatructuyen.vn
																																		và được dinhgiatructuyen.vn đồng ý, Thành viên sẽ được quyền
																																		sử dụng các dịch vụ của website dinhgiatructuyen.vn.
																																	</p>

																																	<p>
																																		− Thành viên sẽ được cấp một tên đăng ký và mật khẩu riêng
																																		để được vào sử dụng các dịch vụ, quản lý các thông tin và
																																		các giao dịch của mình trên Website
																																		dinhgiatructuyen.vn.
																																	</p>

																																	<p>
																																		− Thành viên sẽ được nhân viên của dinhgiatructuyen.vn hướng
																																		dẫn sử dụng được các công cụ, các tính năng phục vụ cho việc
																																		quản lý tra cứu, định giá, thanh toán và sử dụng các dịch vụ
																																		tiện ích trên website dinhgiatructuyen.vn.
																																	</p>

																																	<p>
																																		− Thành viên sẽ được hưởng các chính sách ưu đãi do Sàn Giao
																																		dịch TMĐT dinhgiatructuyen.vn hay các đối tác thứ ba cung
																																		cấp trên Website dinhgiatructuyen.vn. Các chính
																																		sách ưu đãi này sẽ được đăng tải trực tiếp trên Sàn Giao
																																		dịch TMĐT dinhgiatructuyen.vn hoặc được gửi trực tiếp đến
																																		các Thành viên.
																																	</p>

																																	<p>
																																		− Thành viên có quyền đóng góp ý kiến cho
																																		dinhgiatructuyen.vn trong quá trình hoạt động. Các kiến nghị
																																		được gửi trực tiếp bằng thư, fax hoặc email đến cho
																																		dinhgiatructuyen.vn.
																																	</p>

																																</div>
																															</div>

																															<div>
																																<p>
																																	b). Nghĩa vụ của Thành viên:
																																</p>

																																<div style="margin-left: 10px;">
																																	<p>
																																		− Thành viên sẽ tự chịu trách nhiệm về bảo mật và lưu giữ và
																																		mọi hoạt động sử dụng dịch vụ dưới tên đăng ký, mật khẩu và
																																		hộp thư điện tử của mình. Thành viên có trách nhiệm thông
																																		báo kịp thời cho dinhgiatructuyen.vn về những hành vi sử
																																		dụng trái phép, lạm dụng, vi phạm bảo mật, lưu giữ tên đăng
																																		ký và mật khẩu của mình để hai Bên cùng hợp tác xử lý.
																																	</p>

																																	<p>
																																		− Thành viên cam kết những thông tin cung cấp cho
																																		dinhgiatructuyen.vn và những thông tin đang tải lên
																																		dinhgiatructuyen.vn là chính xác và hoàn chỉnh. Thành viên
																																		đồng ý giữ và thay đổi các thông tin trên
																																		dinhgiatructuyen.vn là cập nhật, chính xác và hoàn chỉnh.
																																	</p>

																																	<p>
																																		− Thành viên tự chịu trách nhiệm về nội dung, hình ảnh của
																																		thông tin cá nhân và/hoặc thông tin doanh nghiệp và các
																																		thông tin khác cũng như toàn bộ quá trình giao dịch với các
																																		đối tác trên Website dinhgiatructuyen.vn.
																																	</p>

																																	<p>
																																		− Thành viên cam kết, đồng ý không sử dụng dịch vụ của
																																		website dinhgiatructuyen.vn vào những mục đích bất hợp pháp,
																																		không hợp lý, lừa đảo, đe doạ, thăm rò thông tin bất hợp
																																		pháp, phá hoại, tạo ra và phát tán virus gây hư hại tới hệ
																																		thống, cấu hình, truyền tải thông tin của Website
																																		dinhgiatructuyen.vn hay sử dụng dịch vụ của mình vào mục
																																		đích đầu cơ, lũng đoạn.
																																	</p>

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
																						</li>

																						<li>


																							<div class="elements">
																								<div class="main_width">
																									<div class="role-content">
																										<div class="role-content-inner">


																											<div class="role-listing">

																												<div class="role-listing-title">VIII. Điều khoản áp dụng</div>
																												<div class="role-listing-content">
																													<div class="role-listing-subcontent">
																														<div class="role-listing-subcontent" style="margin-left: 10px;">
																															<div>
																																<p>
																																	1. Mọi tranh chấp phát sinh giữa dinhgiatructuyen.vn với một hay các Thành
																																	viên khác sẽ được giải quyết theo tinh thần hợp tác, hòa giải, thương luợng.
																																	Trường hợp hai (các) Bên thương lượng/hòa giải không thành, tùy theo tích
																																	chất của việc tranh chấp, vụ việc sẽ được đưa ra phân xử tại Trung Tâm Trọng
																																	tài Quốc tế Việt Nam hoặc Tòa Án có thẩm quyền.
																																</p>

																																<p>
																																	2. <a href="http://dinhgiatructuyen.vn"> dinhgiatructuyen.vn</a> sẽ không
																																	liên quan và chịu trách nhiệm khi xảy tranh chấp phát sinh trong quá trình
																																	giao dịch khác ngoài website dinhgiatructuyen.vn.
																																</p>

																																<p>
																																	3. Trong trường hợp phải thay đổi nội dung Quy chế để phù hợp với thực tiễn
																																	họat động của website dinhgiatructuyen.vn thì Ban Quản Trị sẽ thông báo trên
																																	Sàn cho các thành viên biết. Sau thời gian thông báo 05 (năm) ngày này, Quy
																																	chế mới - đã được sửa đổi - sẽ được áp dụng. Việc các Thành viên tiếp tục sử
																																	dụng dịch vụ sau khi Quy chế mới được công bố và thực thi đồng nghĩa với
																																	việc các Thành viên đó đã đồng ý và chấp nhận với Quy chế mới này.
																																</p>

																																<p>
																																	4. Địa chỉ liên hệ chính thức của website: <a
																																	href="http://dinhgiatructuyen.vn">dinhgiatructuyen.vn </a>
																																</p>

																															</div>


																														</div>
																													</div>

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

																	</div>

																</div>
															</div>

														</div>

																@endsection