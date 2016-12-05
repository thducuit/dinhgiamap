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
								<div class="step_col active">
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

						<div class="thanhtoan_right" style="margin-bottom: 20px">
							<div class="summary_info">
								<div class="summary_info_item">
									<div class="summary_info_item_header">thông tin loại dịch vụ </div>
									<div class="summary_info_item_body">
										<p>Sử dụng <strong>{{$name_service}}</strong></p>
									</div>
								</div>
							</div>
						</div>

						<div class="thanhtoan_left">
							<!--.alert-->
							@if( Session::get('message') )
							<div class="row">
							    <div class="col-md-12">
							    	<div class="alert">
									  <strong><p class='error'>{{ Session::get('message') }}</p></strong>
									</div>
							    </div>
							</div>
						    @endif
						    <!--/.alert-->

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
								<?php /*
								{{ Form::open( array('url' => 'register', 'method' => 'post') ) }}
								<div class="form_group form_group_thongtinthanhtoan">
									<div class="form_group_header">
										<span>Thông tin thanh toán</span>
									</div>
									<div class="form_group_body clearfix">
										<div class="form_field field_lastname">
											<label>Họ và tên(*)</label>
                                            <input type="text" name="name" value="<?php if($customer)echo $customer->name?>"/>											 
										</div>
										<div class="form_field field_company">
											<label>Đơn vị(*)</label>
                                            <input type="text" name="donvi" >											
										</div>
										<div class="form_field field_email">
											<label>Email(*)</label>
                                            <input type="email" name="email" value="<?php if($customer)echo $customer->email?>">											
										</div>
										<div class="form_field field_phone">
											<label>Điện thoại(*)</label>
                                            <input type="phone" name="phone" value="<?php if($customer)echo $customer->phone?>">											
										</div>
									</div>
								</div>
								{{ Form::close() }} */?>
								
								{{ Form::open(array('url'=>'/payment/step2', 'method'=>'post')) }}
                                
                                <div class="form_group form_group_thongtinthanhtoan">
									<div class="form_group_header">
										<span>Thông tin thanh toán</span>
									</div>
									<div class="form_group_body clearfix">
										<div class="form_field field_lastname">
											<label>Họ và tên(*)</label>
                                            <input type="text" name="name" value="<?php if($customer)echo $customer->name?>"/>											 
										</div>
										<div class="form_field field_company">
											<label>Đơn vị(*)</label>
                                            <input type="text" name="donvi" >											
										</div>
										<div class="form_field field_email">
											<label>Email(*)</label>
                                            <input type="email" name="email" value="<?php if($customer)echo $customer->email?>">											
										</div>
										<div class="form_field field_phone">
											<label>Điện thoại(*)</label>
                                            <input type="phone" name="phone" value="<?php if($customer)echo $customer->phone?>">											
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
                                                                                                                <div style="width: 225px;float: left; padding-top: 5px;">
                                                                                                                    
																
                                                                                                                    <label class="thanhtoan_tt">
																	<input type="radio" name="hinhthucthanhtoan" id="hinhthucthanhtoan_internetbanking" value="internetbanking" checked data-method="4">
																	Internet Banking
																</label>
																												
															
																
                                                                                                                                 <label class="thanhtoan_tt">
																	<input type="radio" name="hinhthucthanhtoan" id="hinhthucthanhtoan_sms" value="card"  data-method="1">
																	SMS (Thẻ cào điện thoại)
																</label>
															
                                                                                                                </div>
                                                                                                                   <div style="width: 225px;float: left; padding-top: 5px;">
                                                                                                                       
																 <label class="thanhtoan_tt">
																	<input type="radio" name="hinhthucthanhtoan" id="hinhthucthanhtoan_visa" value="visa" data-method="3">
																	Thanh toán bằng visa
																</label>
															
																 <label class="thanhtoan_tt">
																	<input type="radio" name="hinhthucthanhtoan" id="hinhthucthanhtoan_taivanphong" value="office" data-method="2">
																	Chuyển khoản & thanh toán tại VP
																</label>
															
                                                                                                                </div>

														</div>
														
														<div class="expand_container">
															
															<!-- thông tin mở rộng cho loại hình thanh toán qua sms thẻ cào -->
															<div class="expand_group expand_sms clearfix " data-method="1">
																<div class="expand_sms_group_field clearfix">
																	<div class="expand_sms_group_field_header">Chọn loại thẻ cào</div>
																	<div class="form-group">
                                                                                                                                            <div class="row" style="max-width: 638px;">
																			<div class="col-md-4">
																				<label class="sms_option_label">
																				  <input type="radio" name="sms_option" id="sms_mobifone" value="sms_mobifone"> <img src="{{ URL::asset('default/images/logo_mobifone.png') }}">
																				</label>
																			</div>
																			<div class="col-md-4">
																				<label class="sms_option_label">
																				  <input type="radio" name="sms_option" id="sms_viettel" value="sms_viettel"> <img src="{{ URL::asset('default/images/logo_viettel.png') }}">
																				</label>
																			</div>
																			<div class="col-md-4">
																				<label class="sms_option_label">
																				  <input type="radio" name="sms_option" id="sms_vinaphone" value="sms_vinaphone"> <img src="{{ URL::asset('default/images/logo_vinaphone.png') }}">
																				</label>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="expand_sms_group_field clearfix">
																	<div class="expand_sms_group_field_header">Nhập mã thẻ cào</div>
																	<div class="form-group">
																		<input type="text" class="form-control" id="sms_mathecao" placeholder="">
																		<button type="submit" class="btn btn_submit btn-default">Nhập mã</button>
																	</div>
																</div>
															</div>
															
															<!-- thông tin mở rộng cho loại hình thanh toán tại văn phòng -->
															<div class="expand_group expand_thanhtoantaivanphong clearfix" data-method="2">
                                                                                                                            <div class="expand_field_group" >
																	<div class="block_contact clearfix" style="max-width: 600px;">
                                                                                                                                            
                                                                                                                                            <div class="row">
                                                                                                                                                        <div class="col-sm-4 contact_item">
                                                                                                                                                            <div class="contact_item_header">Ngân hàng VCB</div>
                                                                                                                                                                <div class="contact_item_body">
                                                                                                                                                                        <p>Số tài khoản: 999999999</p>
                                                                                                                                                                        <p>Chi nhánh: Hồ Chí Minh</p>								
                                                                                                                                                                </div>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="col-sm-4 contact_item">
                                                                                                                                                            <div class="contact_item_header">Ngân hàng TCB</div>
                                                                                                                                                                <div class="contact_item_body">
                                                                                                                                                                        <p>Số tài khoản: 999999999</p>
                                                                                                                                                                        <p>Chi nhánh: Hồ Chí Minh</p>								
                                                                                                                                                                </div>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="col-sm-4 contact_item">
                                                                                                                                                            <div class="contact_item_header">Ngân hàng ACB</div>
                                                                                                                                                            <div class="contact_item_body">
                                                                                                                                                                    <p>Số tài khoản: 999999999</p>
                                                                                                                                                                    <p>Chi nhánh: Hồ Chí Minh</p>								
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                    </div>

																	</div>
																</div>
                                                                                                                            <div class="expand_field_group" >
																	<div class="expand_content">
																		<div class="block_contact">
                                                                                                                                                    <div class="row">
                                                                                                                                                        <div class="col-sm-12 contact_item">
                                                                                                                                                            <div class="contact_item_header">Địa Chỉ:</div>
																				<div class="contact_item_body">
																					<p>TP.HCM : Tầng 3, tòa nhà Samco, 326 Võ Văn Kiệt, Q1, Tp HCM</p>
																				</div>
                                                                                                                                                        </div>
                                                                                                                                                        
                                                                                                                                                    </div>
	
																		</div>
                                                                                                                                                
                                                                                                                                            <div class="block_contact" style="max-width: 688px;">
                                                                                                                                                    <div class="row">
                                                                                                                                                        <div class="col-sm-2 contact_item">
                                                                                                                                                            <div class="contact_item_header">Điện thoại:</div>
																				<div class="contact_item_body">
																					<p>(08) 39 256 973<br>
																					(04) 32222.786</p>												
																				</div>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="col-sm-3 contact_item">
                                                                                                                                                            <div class="contact_item_header">Email liên hệ hỗ trợ:</div>
																				<div class="contact_item_body">
																					<p>hi@cenvalue.vn</p>												
																				</div>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="col-sm-2 contact_item">
                                                                                                                                                            <div class="contact_item_header">Hotline:</div>
																				<div class="contact_item_body">
																					<p>1900 9079</p>												
																				</div>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="col-sm-5 contact_item">
                                                                                                                                                            <div class="contact_item_header">Thời gian làm việc:</div>
																				<div class="contact_item_body">
																					 <p>Từ thứ 2 đến thứ 6, thứ 7 làm việc buổi sáng</p>
                                                                                                                                                                        <p>Sáng: 8h-12h</p>
                                                                                                                                                                        <p>Chiều: 13h30-17h30</p>											
																				</div>
                                                                                                                                                        </div>
                                                                                                                                                    </div>

                                                                                                                                                    
                                                                                                                                                        
                                                                                                                                                   
																		</div>
<!--                                                                                                                                                <div class="block_contact">
                                                                                                                                                    <div class="row">
                                                                                                                                                        <div class="col-sm-12 contact_item">
                                                                                                                                                            <div class="contact_item_header">Thời gian làm việc:</div>
																				<div class="contact_item_body">
                                                                                                                                                                    <p>Từ thứ 2 đến thứ 6, thứ 7 làm việc buổi sáng</p>
                                                                                                                                                                    <p>Sáng: 8h-12h</p>
                                                                                                                                                                    <p>Chiều: 13h30-17h30</p>
																				</div>
                                                                                                                                                        </div>
                                                                                                                                                        
                                                                                                                                                    </div>
	
																		</div>-->
                                                                                                                                                 
                                                                                                                                            
																	</div>
																</div>
                                                                                                                             <div class="expand_field_group" >
																	<div class="expand_content">
																		<div class="block_contact">
																			<div class="contact_item">
																				<div class="contact_item_header">Để đảm bảo quyền lợi, khách hàng cần lưu ý</div>
																				<div class="contact_item_body">
                                                                                                                                                                    <p>Giao dịch tại các điểm được quy định</p>
                                                                                                                                                                    <p>Kiểm tra cẩn thận các giao dịch trước khi rời nơi giao dịch</p>
                                                                                                                                                                    <p>Khách hàng phải ký vào phiếu thu và hồ sơ đăng ký dịch vụ</p>
                                                                                                                                                                    <p>Dịch vụ chỉ được đăng ký / gia hạn khi nhận được thanh toán và thông tin chính xác đầy đủ</p>
																				</div>
																			</div>
																		</div>
																		
																	</div>
																</div>
															</div>
															
															<!-- thông tin mở rộng cho loại hình thanh toán qua visa -->
															<div class="expand_group expand_visa clearfix" data-method="3">
																<div class="expand_field_group">
                                                                                                                                    
                                                                                                                                 
                                                                                                                                        <div class="row"  style="max-width: 304px;">
																		<div class="col-xs-4">	
                                                                                                                                                   
																			<div class="radio">
                                                                                                                                                            <label >
                                                                                                                                                                <input type="radio" name="theQT" style="float: none;" value="">
                                                                                                                                                                <img src="{{ URL::asset('default/images/visa1.png') }}" class="the_qt">
																				</label>
																			</div>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-xs-4">	
                                                                                                                                                        <div class="radio">
																				<label>
																				<input type="radio" name="theQT" style="float: none;" value="">
                                                                                                                                                                <img src="{{ URL::asset('default/images/mastercard.png') }}" class="the_qt">
																				</label>
																			</div>
                                                                                                                                                </div>
                                                                                                                                                 <div class="col-xs-4">	
                                                                                                                                                        <div class="radio">
																				<label>
																				<input type="radio" name="theQT" style="float: none;" value="">
                                                                                                                                                                <img src="{{ URL::asset('default/images/JCB.png') }}" class="the_qt">
																				</label>
																			</div>
                                                                                                                                                 </div> 
																		</div>
                                                                                                                                                <div class="row">
                                                                                                                                                    <div  style="padding-left: 15px; padding-right: 15px;">
                                                                                                                                                         <div class="form-group">
                                                                                                                                                        
                                                                                                                                                             <div class="visa_left">
                                                                                                                                                                 <div style="padding-top: 10px;">
                                                                                                                                                                   
                                                                                                                                                                                <label class="control-label">Số thẻ:</label>
                                                                                                                                                                           
                                                                                                                                                                        
                                                                                                                                                                                   
                                                                                                                                                                             <input type="text" class="input_ttoan"  placeholder="4123 4525 4964 5869">

                                                                                                                                                                        </div>
                                                                                                                                                                                    
                                                                                                                                                                        <div style="padding-top: 10px;">
                                                                                                                                                                            
                                                                                                                                                                            <label class="control-label">Tên in trên thẻ:</label>
                                                                                                                                                                            
                                                                                                                                                                             <input type="text" class="input_ttoan"  placeholder="Lê Văn Thành">

                                                                                                                                                                       
                                                                                                                                                                        </div>
                                                                                                                                                                                    
                                                                                                                                                                         
                                                                                                                                                        </div>
                                                                                                                                                             <div class="visa_left">
                                                                                                                                                             
                                                                                                                                                                           <div style="padding-top: 10px;">
                                                                                                                                                                              
                                                                                                                                                                            <label class="control-label">Ngày hết hạn:</label>
                                                                                                                                                                               
                                                                                                                                                                             <input type="text" class="input_ttoan"  placeholder="MM/YY">

                                                                                                                                                                        </div>
                                                                                                                                                                                    
                                                                                                                                                                        <div style="padding-top: 10px;">
                                                                                                                                                                           
                                                                                                                                                                            <label class="control-label">Mã bảo mật:</label>
                                                                                                                                                                           
                                                                                                                                                                             <input type="text" class="input_ttoan"  placeholder="Vd: 123">

                                                                                                                                                                        </div>
                                                                                                                                                                                    
                                                                                                                                                                         
                                                                        
                                                                                                                                                                   
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                        
                                                                                                                                                    </div>
                                                                                                                                                   
                                                                                                                                                   
                                                                                                                                                    
                                                                                                                                                </div>
<!--																		<div class="row">
																		<div class="col-md-6">
																			<div class="row">
																				<div class="form-group">
																					<label for="" class="col-sm-6 control-label">Tên in trên thẻ</label>
																					<div class="col-sm-6">
																					  <input type="text" class="form-control" id="tenintrenthe" placeholder="Lê Văn Thành">
																					</div>
																				 </div>
																			 </div>
																		</div>
																		<div class="col-md-6">
																			<div class="row">
																				<div class="form-group">
																					<label for="" class="col-sm-6 control-label">Mã bảo mật</label>
																					<div class="col-sm-6">
																					  <input type="text" class="form-control" id="mabaomat" placeholder="Vd: 123">
																					</div>
																				 </div>
																			 </div>
																		</div>
                                                                                                                                                </div>-->
                                                                                                                            
																	
                                                                                                                                                <div class="row">
                                                                                                                                                    <div class="col-md-12">	
																			<div class="checkbox">
																				<label>
																				<input type="checkbox" value="">
																				Lưu và bảo mật thẻ cho lần thanh toán sau
																				</label>
																			</div>
																			<p>CenValue không trực tiếp thu thẻ của bạn.Để đảm bảo an toàn, thông tin thẻ của bạn chỉ được lưu bởi CyberSource, công ty quản lý thanh toán lớn nhất thế giới. ( thuộc tổ chức Visa).</p>
																		</div>
                                                                                                                                                </div>
																		
																	</div>
                                                                                                                                         <div class="expand_field_group">
                                                                                                                                    <div class="block_contact">
                                                                                                                                        <div class="row">
                                                                                                                                                        <div class="col-sm-6 contact_item">
                                                                                                                                                            <div class="contact_item_header">Thanh toán trực tuyến bằng thẻ quốc tế</div>
																				<div class="contact_item_body">
                                                                                                                                                                    <p>- Chấp nhận thanh toán các loại thẻ quốc tế: MasterCard (chủ thể ở Việt Nam), Visa (chủ thể ở Việt Nam)</p>
                                                                                                                                                                    <p>- Thực hiện giao dịch thanh toán hoàn toàn trực tuyến, đơn giản thuận tiện cho khách hàng</p>
                                                                                                                                                                    <p>- An toàn bảo mật cho khách hàng trong thanh toán</p>
                                                                                                                                                                    <p>- Dịch vụ được kích hoạt ngay khi thanh toán</p>
																				</div>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="col-sm-6 contact_item noiDungThanhToan">
                                                                                                                                                            <div class="contact_item_header">Để đảm bảo quyền lợi, khách hàng cần lưu ý </div>
																				<div class="contact_item_body">
                                                                                                                                                                    <p>- Để thanh toán bằng thẻ quốc tế, thẻ của quý khách phải được đăng ký và kích hoạt chức năng thanh toán trực tuyến với ngân hàng trước khi sử dụng</p>
                                                                                                                                                                    <p>- Quý khách cần điền thông tin thẻ tín dụng gồm "Số thẻ", "Tên in trên thẻ", "Ngày hết hạn", "Mã bảo mật"</p>
                                                                                                                                                                    <p>- Các thông tin thẻ tín dụng của quý khách sẽ được bảo mật và được xác nhận với ngân hàng phát hành thẻ</p>
                                                                                                                                                                    <p>- Dịch vụ chỉ được đăng ký / gia hạn khi nhận được thanh toán và thông tin chính xác đầy đủ</p>
																				</div>
                                                                                                                                                        </div>
                                                                                                                                                        
                                                                                                                                            </div>
                                                                                                                                        
                                                                                                                                    </div>
                                                                                                                                    

                                                                                                                                </div>
                                                                                                                               
                                                                                                                            
																</div>
                                                                                                                        
                                                                                                                        <!-- thông tin mở rộng cho loại hình thanh toán qua internet banking -->
															<div class="expand_group expand_internetbanking active clearfix" data-method="4">
																<div class="expand_field_group" id="thanhtoan_the">
																	<div class="expand_content">
                                                                                                                                            
                                                                                                                                            <div class="Lg_TheNganHang">

                                                                                                                                                <div class="ABBANK"><img src="{{ URL::asset('default/images/abbank.png') }}" class="TheNganHang" title="ABBANK"> </div>

                                                                                                                                            <div class="ABBANK"><img src="{{ URL::asset('default/images/vietcombank.png') }}" class="TheNganHang" title="VIETCOMBANK"> </div>
                                                                                                                                                <div class="ABBANK"><img src="{{ URL::asset('default/images/viettinbank.png') }}" class="TheNganHang" title="VIETTINBANK"> </div>
                                                                                                                                                <div class="ABBANK"><img src="{{ URL::asset('default/images/dongAbank.png') }}" class="TheNganHang" title="DONGABANK"> </div>
                                                                                                                                                <div class="ABBANK"><img src="{{ URL::asset('default/images/vpbank.png') }}" class="TheNganHang" title="VPBANK"> </div>
                                                                                                                                                <div class="ABBANK"><img src="{{ URL::asset('default/images/BIDV.png') }}" class="TheNganHang" title="BIDV"> </div>
                                                                                                                                                <div class="ABBANK"><img src="{{ URL::asset('default/images/VIB.png') }}" class="TheNganHang" title="VIB"> </div>
                                                                                                                                                <div class="ABBANK"><img src="{{ URL::asset('default/images/TECHCOMBANK.png') }}" class="TheNganHang" title="TECHCOMBANK"> </div>
                                                                                                                                                <div class="ABBANK"><img src="{{ URL::asset('default/images/SHB.png') }}" class="TheNganHang" title="SHB"> </div>
                                                                                                                                                <div class="ABBANK"><img src="{{ URL::asset('default/images/TPBANK.png') }}" class="TheNganHang" title="TPBANK"> </div>
                                                                                                                                                <div class="ABBANK"><img src="{{ URL::asset('default/images/MBBANK.png') }}" class="TheNganHang" title="MB"> </div>
                                                                                                                                                <div class="ABBANK"><img src="{{ URL::asset('default/images/VIETABANK.png') }}" class="TheNganHang" title="VIETABANK"> </div>
                                                                                                                                                <div class="ABBANK"><img src="{{ URL::asset('default/images/MARTINEBANK.png') }}" class="TheNganHang" title="MARITIMEBANK"> </div>
                                                                                                                                                <div class="ABBANK"><img src="{{ URL::asset('default/images/EXIMBANK.png') }}" class="TheNganHang" title="EXIMBANK"> </div>
                                                                                                                                               

                                                                                                                                            </div>
                                                                                                                                              


                                                                                                                                        </div>
                                                                                                                                  
																</div>
                                                                                                                            <div class="expand_field_group">
                                                                                                                                    <div class="block_contact">
                                                                                                                                        <div class="expand_content">
                                                                                                                                        <div class="row">
                                                                                                                                                        <div class="col-sm-6 contact_item">
                                                                                                                                                            <div class="contact_item_header">Thanh toán trực tuyến bằng thẻ ATM nội địa</div>
																				<div class="contact_item_body">
                                                                                                                                                                    <p>- Chấp nhận thanh toán các loại thẻ thanh toán nội địa (thẻ ATM) do các Ngân hàng phát hành</p>
                                                                                                                                                                    <p>- Thực hiện giao dịch thanh toán hoàn toàn trực tuyến, đơn giản thuận tiện cho khách hàng</p>
                                                                                                                                                                    <p>- An toàn bảo mật cho khách hàng trong thanh toán</p>
                                                                                                                                                                    <p>- Dịch vụ được kích hoạt ngay khi thanh toán</p>
																				</div>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="col-sm-6 contact_item noiDungThanhToan">
                                                                                                                                                            <div class="contact_item_header">Để đảm bảo quyền lợi, khách hàng cần lưu ý </div>
																				<div class="contact_item_body">
                                                                                                                                                                    <p>- Để thanh toán bằng thẻ ATM, thẻ của quý khách phải được đăng ký và kích hoạt chức năng thanh toán trực tuyến với ngân hàng trước khi sử dụng</p>
                                                                                                                                                                    <p>- Quý khách cần điền đầy đủ thông tin thẻ bao gồm "Số thẻ", "Tên in trên thẻ", "Ngày hết hạn", "Mã bảo mật"</p>
                                                                                                                                                                    <p>- Các thông tin thẻ tín dụng của quý khách sẽ được bảo mật và được xác nhận với ngân hàng phát hành thẻ</p>
                                                                                                                                                                    <p>- Dịch vụ chỉ được đăng ký / gia hạn khi nhận được thanh toán và thông tin chính xác đầy đủ</p>
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
								</div>

								<div class="form_group_body clearfix">
                                                                                                 <div class="checkbox">
                                                                                                  <label>
                                                                                                      <input type="checkbox" name="thanhToan_DongY" id="danKy_DongY" value="1"> Tôi đã đọc và đồng ý với <a href="#">Thỏa thuận sử dụng</a> và <a href="#">Chính sách bảo mật</a> của <span style="font-weight: bold;">ĐỊNH GIÁ TRỰC TUYẾN</span> 
                                                                                                       
                                                                                                  </label>
                                                                                                </div>
                                                                                                
                                                                                            </div>
                                                                                            <div class="form_group_body clearfix">
                                                                                                <div class="row">
                                                                                                    <div class="col-xs-6">
                                                                                                        <a href="thanh-toan.html" class="btn btn-info btn-sm btn_tieptuc">
                                                                                                            <span class="glyphicon glyphicon-arrow-left"></span> Quay lại
                                                                                                        </a>
                                                                                                    </div>
                                                                                                    <div class="col-xs-6 text-right">
                                                                                                      <button type="submit" class="btn btn-info btn-sm btn_tieptuc">Tiếp tục <span class="glyphicon glyphicon-arrow-right"></span></button>                                                                                                        
                                                                                                    </div>
                                                                                                </div>
                                                                                                
                                                                                                
                                                                                                
                                                                                            </div>
								{{ Form::close() }}
								
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
@endsection