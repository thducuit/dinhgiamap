@extends('default.layouts.default')
@section('content')

<!--
/*==============================*\
MAIN 
/*==============================*\
-->
<div id="main" class="screen">
	<div class="main_wrapper">
							
		<div class="block_overlay">
      <!--
      SEARCH BOX
      -->
      <div id="search_box">
        <div class="search_box_inner">
          {{ Form::open( array('url' => 'search', 'method' => 'get', 'class' => 'clearfix google-map-search-form') ) }}
          <div class="form_group form_group_icon_location"><i class="icon_location"></i></div>
          <div class="form_group form_group_input_text">
            <input class="input_text cen-address-text" type="text" name="address" value="{{ Session::get('address') }}" id="google-map-autocomplete" placeholder="Nhập địa chỉ tài sản để định giá">
            <input class="input_text" name="placeId" id="placeId" type="hidden" value="{{ Session::get('place_id') }}" >
          </div>
          <div class="form_group form_group_submit">
            <input class="input_submit" type="submit" value="Tìm kiếm">
          </div>
          {{ Form::close() }}
        </div>
      </div>    
    </div>


    <!--
    MAP VIEW
    -->
    <div id="map_view"></div>
		

		<!-- Modal -->
		<div id="modal_ketquadinhgia" class="modal fade" role="dialog">
          <div class="modal-dialog modal-style1" role="document">
            <div class="modal-content">
              <a href="#" class="close-btn" data-dismiss="modal" ></a>

              <div class="page_01">
                <div class="head">                    
                  <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                      <a href="#" class="logo"><img class="img-responsive" src="{{ URL::asset('default/images/logo-dinhgia-forweb-final_1.png') }}" ></a>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12">
                      <div class="info-top">
                        <!-- <span class="bold emeral">CÔNG TY CỔ PHẦN THẨM ĐỊNH GIÁ THẾ KỶ</span> -->
                        <br><img src="{{ URL::asset('default/images/map.png') }}" > Tầng 3 Tòa nhà Samco, 326 Võ Văn Kiệt,
                        P.Cô Giang, Q1, TPHCM
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                      <div class="contact-top">
                        <img src="{{ URL::asset('default/images/t1.png') }}" > <span class="bold red">1900 6088</span>
                        <br><img src="{{ URL::asset('default/images/t2.png') }}" > hotro@dinhgiatructuyen.vn
                        <br><img src="{{ URL::asset('default/images/t3.png') }}" >	dinhgiatructuyen.vn
                      </div>
                    </div>
                  </div>                    
                </div>
                <div class="bread-blk">                   
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="bread">
                        <img src="{{ URL::asset('default/images/kd-dinhgia.png') }}" class="red-ribbon" style="width: 225px;">
                        <span class="bold emeral">Địa chỉ: {{ $result['name'] }}</span>
                      </div>
                    </div>
                    <!-- <div class="col-md-3 col-sm-12 col-xs-12">
                      <a href="#" class="orange-btn" id="btn_xemtaisandinhgia"><img src="{{ URL::asset('default/images/w3.png') }}" > XEM TÀI SẢN ĐÃ ĐỊNH GIÁ</a>

                    </div> -->
                  </div>
                </div>

                <div class="content1">
                  <div class="row info-blk">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <span class="title-ct1">CHI TIẾT</span>
                      </div>
                      <div class="col-md-5 col-sm-12 col-xs-12">
                          <div class="info-d"><label>Tổng điện tích đất (m<sup>2</sup>):</label> {{$inputThamDinhGia['total_area']}}</div>
                          <div class="info-d"><label>Vị trí tiếp giáp:</label> {{$inputThamDinhGia['vitri']}}</div>
                      </div>
                      <div class="col-md-4 col-sm-12 col-xs-12">
                          <div class="info-d"><label>Chiều ngang (m):</label> {{$inputThamDinhGia['horizontal']}}</div>
                          <div class="info-d"><label>Hình dạng thửa đất:</label> {{$inputThamDinhGia['hinhDangThuaDat']}}</div>
                      </div>
                      <div class="col-md-3 col-sm-12 col-xs-12">
                          <?php if($inputThamDinhGia['vertical']){?><div class="info-d"><label>Chiều dài (m):</label> {{$inputThamDinhGia['vertical']}}</div><?php }?>
                          <?php if($inputThamDinhGia['yeuToKhac']){?><div class="info-d"><label>Yếu tố khác:</label> {{$inputThamDinhGia['yeuToKhac']}}</div><?php }?>
                      </div>

                  </div>
                  <?php if($inputThamDinhGia['farming_plan_area'] || $inputThamDinhGia['trade_plan_area'] || $inputThamDinhGia['production_plan_area']){?>
                  <div class="row info-blk">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <span class="title-ct1">DIỆN TÍCH PHÙ HỢP QUY HOẠCH:</span>
                      </div>
                      <div class="col-md-4 col-sm-12 col-xs-12">
                          <div class="info-d"><label>Đất ở (m<sup>2</sup>):</label> {{$inputThamDinhGia['leaving_plan_area']}}</div>
                      </div>
                      <div class="col-md-4 col-sm-12 col-xs-12">
                          <div class="info-d"><label>Đất nông nghiệp (m<sup>2</sup>):</label> {{$inputThamDinhGia['farming_plan_area']}}</div>
                      </div>
                      <div class="col-md-4 col-sm-12 col-xs-12">
                          <div class="info-d"><label>Đất TMDV (m<sup>2</sup>):</label> {{$inputThamDinhGia['trade_plan_area']}}</div>
                      </div>
                      <div class="col-md-4 col-sm-12 col-xs-12">
                          <div class="info-d"><label>Đất SXKD (m<sup>2</sup>):</label> {{$inputThamDinhGia['production_plan_area']}}</div>
                      </div>

                  </div>
                  <?php }?>
                  <div class="row info-blk">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <span class="title-ct1">DIỆN TÍCH VI PHẠM LỘ GIỚI ĐƯỢC CÔNG NHẬN</span>
                      </div>
                    <?php if($inputThamDinhGia['farming_violance_area']){?>
                      <div class="col-md-4 col-sm-12 col-xs-12">
                          <div class="info-d"><label>Đất nông nghiệp (m<sup>2</sup>):</label> {{$inputThamDinhGia['farming_violance_area']}}</div>
                      </div>
                    <?php }?>
                    <?php if($inputThamDinhGia['leaving_violance_area']){?>
                      <div class="col-md-4 col-sm-12 col-xs-12">
                          <div class="info-d"><label>Đất ở (m<sup>2</sup>):</label> {{$inputThamDinhGia['leaving_violance_area']}}</div>
                      </div>
                    <?php }?>
                    <?php if($inputThamDinhGia['trade_violance_area']){?>
                      <div class="col-md-4 col-sm-12 col-xs-12">
                          <div class="info-d"><label>Đất TMDV (m<sup>2</sup>):</label> {{$inputThamDinhGia['trade_violance_area']}}</div>
                      </div>
                        <?php }?>
                    <?php if($inputThamDinhGia['production_violance_area']){?>
                      <div class="col-md-4 col-sm-12 col-xs-12">
                          <div class="info-d"><label>Đất SXKD (m<sup>2</sup>):</label> {{$inputThamDinhGia['production_violance_area']}}</div>
                      </div>
                    <?php }?>
                  </div>
                  
                  <?php if(isset($inputThamDinhGia['congTrinhXD']) && $inputThamDinhGia['congTrinhXD']){?>
                  <div class="row info-blk">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <span class="title-ct1">CÔNG TRÌNH XÂY DỰNG <?php 
                                        // switch($inputThamDinhGia['congTrinhXD']){
                                        //   case 'nha_pho': echo 'NHÀ PHỐ';break;
                                        //   case 'biet_thu': echo 'BIỆT THỰ̣';break;
                                        //   default: echo 'Không có CTXD';break;
                                        // }
                                        ?></span>
                      </div>
                    <?php }?>
                    <?php if(isset($inputThamDinhGia['congTrinhXD']) && $inputThamDinhGia['congTrinhXD'] && $inputThamDinhGia['ketCauChinh']){?>
                    
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="info-d"><label>Công trình xây dựng: </label> 1</div>
                      </div>
                      <div class="col-md-4 col-sm-12 col-xs-12">
                          <div class="info-d"><label>Kết cấu chính: </label> {{$inputThamDinhGia['ketCauChinh']}}</div>
                      </div>
                      <div class="col-md-4 col-sm-12 col-xs-12">
                          <div class="info-d"><label>Tổng diện tích sàn xây dựng(m<sup>2</sup>):</label> {{$inputThamDinhGia['total_ground_area']}}</div>
                      </div>
                      <div class="col-md-4 col-sm-12 col-xs-12">
                          <div class="info-d"><label>Năm xây dựng:</label> {{$inputThamDinhGia['textNamXD']}}</div>
                      </div>                      
                  
                  <?php }?>
                  <?php 
                    if(isset($inputThamDinhGia['structureMore'])){
                      for($i=0; $i < count($inputThamDinhGia['structureMore']); $i++){?>
                  
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="info-d"><label>Công trình xây dựng: </label> <?php echo $i + 2;?></div>
                      </div>
                      <div class="col-md-4 col-sm-12 col-xs-12">
                          <div class="info-d"><label>Kết cấu chính: </label> {{$inputThamDinhGia['structureMore'][$i]}}</div>
                      </div>
                      <div class="col-md-4 col-sm-12 col-xs-12">
                          <div class="info-d"><label>Tổng diện tích sàn xây dựng(m<sup>2</sup>):</label> {{$inputThamDinhGia['total_ground_area_more'][$i]}}</div>
                      </div>
                      <div class="col-md-4 col-sm-12 col-xs-12">
                          <div class="info-d"><label>Năm xây dựng:</label> {{$inputThamDinhGia['textNamXDMore'][$i]}}</div>
                      </div> 
                      <?php  }?>
                    <?php } ?>
                   </div> 

          </div>
                
                <div class="content2">
                  <div class="row">
                    <div class="col-md-4  col-sm-12 col-xs-12 container-unit-price">
                      <div class="feature">
                        <div>
                          <img src="{{ URL::asset('default/images/i1.png') }}" >
                        </div>
                        <span class="bold">ĐƠN GIÁ THỊ TRƯỜNG</span>
                        <br>ĐẤT Ở BÌNH QUÂN
                        <h2 class="price emeral">{{ $result['unit_price'] }}</h2>
                      </div>
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12 container-total-price">
                      <div class="col-md-6">
                        <div class="feature">
                          <div>
                            <img src="{{ URL::asset('default/images/i2.png') }}" >
                          </div>
                          <span class="bold">QUYỀN SỬ DỤNG</span>
                          <br>ĐẤT
                          <h2 class="price emeral">{{ $result['total_price'] }}</h2>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="feature">
                          <div>
                            <img src="{{ URL::asset('default/images/i3.png') }}" >
                          </div>
                          <span class="bold">QUYỀN SỞ HỮU</span>
                          <br>CÔNG TRÌNH XÂY DỰNG
                          <h2 class="price emeral">{{ $result['building_price'] }}</h2>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 total-price">
                          <div class="content3">
                            <h1><span class="bold">TỔNG GIÁ TRỊ:</span> {{ $result['total'] }}</h1>
                          </div>
                        </div>
                      </div>


                    </div>

                  </div>
                </div>

                <div class="content4">
                  <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">

                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12 padding-left-right-zero">
                      <span class="italic padding-left-5">* Đơn giá đất ủy ban mặt tiền đường là: {{$result['unit_state_price']}} VNĐ/m<sup>2</sup></span>
                    </div>                            
                  </div>
                  <div class="row bot-info">                            
                    <div class="col-md-12 col-sm-12 col-xs-12 right">
                      <div class="btn-action-group-evalue-result">
                        <div class="row">
                          <div class="buttons">
                            <div class="col-md-3 col-sm-12 col-xs-12 padding-left-right-zero">
                              <div class="center">
                                <!-- <a href="{{ URL::to('/tai-san-dang-giao-dich.html') }}" class="orange-btn col-md-4 col-sm-12 col-xs-12"><img src="{{ URL::asset('default/images/w4.png') }}" > TÀI SẢN ĐANG GIAO DỊCH</a> -->
                                <span class="emeral notice-info">XEM THÔNG TIN LƯU Ý <img src="{{ URL::asset('default/images/arrow1.png') }}" > </span>
                              </div>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12 padding-left-right-zero">
                              <div class="center">
                                <!-- <span class="emeral notice-info">XEM THÔNG TIN LƯU Ý <img src="{{ URL::asset('default/images/arrow1.png') }}" > </span> -->
                              </div>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12 padding-left-right-zero">
                              <div class="center">
                                <a class="emeral-btn col-md-4 col-sm-12 col-xs-12 btn_dinhgia cursor" href="{{ URL::to('/lien-he.html') }}"><img src="{{ URL::asset('default/images/w6.png') }}" > PHÁT HÀNH CHỨNG THƯ</a>
                                <!-- <a href="{{ URL::to('/xem-quy-hoach.html') }}" class="orange-btn col-md-4 col-sm-12 col-xs-12"><img src="{{ URL::asset('default/images/w5.png') }}"> XEM QUY HOẠCH</a> -->
                              </div>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12 padding-left-right-zero">
                              <div class="center">
                                <a href="{{ URL::to('/xem-quy-hoach.html') }}" class="orange-btn col-md-4 col-sm-12 col-xs-12"><img src="{{ URL::asset('default/images/w5.png') }}"> XEM QUY HOẠCH</a>
                                <!-- <a class="emeral-btn col-md-4 col-sm-12 col-xs-12 btn_dinhgia cursor"><img src="{{ URL::asset('default/images/w6.png') }}" > THẨM ĐỊNH GIÁ</a> -->
                              </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row notice-info-content" style="display: none;">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <p style="margin-top: 15px">- Đơn giá xây dựng tham khảo theo suất đầu tư trung bình của các công ty xây dựng uy tín trên địa bàn Tp.HCM</p>

                      <p>- Cen Value cung cấp kết quả thẩm định giá sơ bộ mang tính chất tư vấn theo đúng mục đích yêu cầu và sử dụng hệ thống cơ sở dữ liệu thị trường kết hợp với các phân tích khu vực Bất động sản tọa lạc sẵn có mà chưa thực hiện khảo sát hiện trạng, do đó kết quả sơ bộ chưa phải là quyết định cuối cùng. Kết quả thẩm định chỉ được xác nhận khi Cen Value hoàn thành việc khảo sát thực tế.</p>

                      <p>- Cen Value không thẩm định tính sở hữu hợp pháp hay những thay đổi pháp lý trên giấy tờ gốc mà có thể hiện hoặc không thể hiện trên bản sao đã được cung cấp, và Cen Value giả định rằng tất cả thông tin mà quý khách đã cung cấp là trung thực và chính xác.</p>

                      <p>- Để các kết quả sơ bộ chính xác hơn, Cen Value đề xuất khách hàng cung cấp các thông tin liên quan đến tài sản một cách thực tế và khách quan nhất nhằm có đánh gia tối ưu nhất về giá trị tài sản của mình. Hoặc liên hệ ngay với chúng tôi để được các chuyên viên hỗ trợ.</p>

                      <p>- Chuyên viên định giá của Cen Value sẽ TRỰC TIẾP KHẢO SÁT, ĐÁNH GIÁ THỰC TẾ nhằm tư vấn tốt nhất, tối ưu nhất về giá trị tài sản, cũng như pháp lý, đồng thời Cen Value sẽ cung cấp cho khách hàng MỘT BẢN CHỨNG THƯ & MỘT BẢN BÁO CÁO ĐẦY ĐỦ về hiện trạng và giá trị tài sản khi có yêu cầu.</p>

                      <p>- CENVALUE PHÁT HÀNH CHỨNG THƯ THẨM ĐỊNH GIÁ với các mục đích THẾ CHẤP VAY VỐN / CHỨNG MINH NĂNG LỰC TÀI CHÍNH / BẢO LÃNH / MUA BÁN / DU HỌC / ĐỊNH CƯ NƯỚC NGOÀI / KIỂM TOÁN ……</p>

                      <p>- Quý khách vui lòng liên hệ <b>Hotline - 090 231 7679</b> hoặc Chuyên viên của chúng tôi khi có các phản hồi hoặc nhu cầu về thẩm định gíá để được hỗ trợ.</p>

                      <p>- Kết quả sơ bộ có hiệu lực trong thời gian 30 (ba mươi) ngày kể từ ngày thông báo.
                        Rất mong sự phản hồi của Quý khách.</p>    
                    </div>                            
                  </div>
                </div>
                <div class="phone-print-email">
                  <a href="tel:0902317679"><img src="{{ URL::asset('default/images/phone.png') }}" /></a>
                  <a href="#"><img src="{{ URL::asset('default/images/fax.png') }}" /></a>
                  <a href="mailto:dinhgiaonline@gmail.com"><img src="{{ URL::asset('default/images/email.png') }}" /></a>
                </div>

              </div>

            </div>
          </div>
          <?php /*
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
                    <a class="close" href="{{action('HomeController@view')}}">&times;</a>
					<div class="modal-body">
						
						<div class="modal_ketquadinhgia_header clearfix">
							<div class="modal_ketquadinhgia_header_logo">
								<img src="{{ URL::asset('default/images/logo-dinhgia-forweb-final_1.png') }}">
							</div>									
							<div class="modal_ketquadinhgia_header_right clearfix">
								<div class="modal_ketquadinhgia_header_right_col">
									<p><strong>Công ty Cổ Phần Thẩm Định Giá Thế Kỷ</strong></p>
									<p>
									Tầng 3, Tòa nhà Samco, số 326 Võ Văn Kiệt, Phường Cô Giang , quận 1. Tp Hồ Chí Minh.</br>
									<strong>Hotline:</strong> 1900 6088 
									</p>
								</div>
								<div class="modal_ketquadinhgia_header_right_col">
									<p><strong>Email:</strong></br>									
									hotro@dinhgiatructuyen.vn</p>
									<p><strong>Website:</strong></br>
									dinhgiatructuyen.vn</p>
								</div>
							</div>									
						</div	>
						<div class="popup_middle_body">
							<div class="ketquadinhgia_wrapper">
								<div class="ketquadinhgia_header">
									<h3 class="ketquadinhgia_title">KẾT QUẢ ĐỊNH GIÁ BẤT ĐỘNG SẢN</h3>
									<p>Địa chỉ: {{ $result['name'] }}</p>
                                    
                                    <strong>Chi Tiết:</strong>
                                    
                                  
                                    <div class="row">
                                      <div class="col-md-3 col-chitietsobo">
                                        <div class="chitietsobo-item">Tổng diện tích đất ( m2 ) : {{$inputThamDinhGia['total_area']}}</div>
                                        <div class="chitietsobo-item">Vị trí tiếp giáp: {{$inputThamDinhGia['vitri']}}</div>
                                      </div>
                                      <div class="col-md-3 col-chitietsobo">
                                        <div class="chitietsobo-item">Chiều ngang ( m ) : {{$inputThamDinhGia['horizontal']}}</div>
                                        <div class="chitietsobo-item">Hình dạng thửa đất: {{$inputThamDinhGia['hinhDangThuaDat']}}</div>
                                      </div>
                                      <div class="col-md-6 col-chitietsobo">
                                        <?php if($inputThamDinhGia['vertical']){?><div class="chitietsobo-item">Chiều dài ( m ) : {{$inputThamDinhGia['vertical']}}</div><?php }?>
                                        <?php if($inputThamDinhGia['yeuToKhac']){?><div class="chitietsobo-item">Yếu tố khác: {{$inputThamDinhGia['yeuToKhac']}}</div><?php }?>
                                      </div>
                                    </div>
                                    <?php if($inputThamDinhGia['farming_plan_area'] || $inputThamDinhGia['trade_plan_area'] || $inputThamDinhGia['production_plan_area']){?>
                                    <div class="row">
                                      <div class="col-md-12 col-chitietsobo"><div class="chitietsobo-item">Diện tích phù hợp quy hoạch:</div></div>
                                      <div class="col-md-3 col-chitietsobo"><div class="chitietsobo-item">Đất ở ( m ) :  {{$inputThamDinhGia['leaving_plan_area']}}</div></div>
                                      <?php if($inputThamDinhGia['farming_plan_area']){?><div class="col-md-3 col-chitietsobo"><div class="chitietsobo-item">Đất nông nghiệp ( m ) : {{$inputThamDinhGia['farming_plan_area']}}</div></div><?php }?>
                                      <?php if($inputThamDinhGia['trade_plan_area']){?>
                                      <div class="col-md-3 col-chitietsobo"><div class="chitietsobo-item">Đất TMDV ( m ) : {{$inputThamDinhGia['trade_plan_area']}}</div></div>
                                      <?php }?>
                                      <?php if($inputThamDinhGia['production_plan_area']){?>
                                      <div class="col-md-3 col-chitietsobo"><div class="chitietsobo-item">Đất SXKD ( m ) : {{$inputThamDinhGia['production_plan_area']}}</div></div>
                                      <?php }?>
                                    </div>
                                    <?php }?>
                                    <div class="row">
                                      <div class="col-md-12 col-chitietsobo"><div class="chitietsobo-item">Diện tích vi phạm lộ giới được công nhận:</div></div>
                                      <?php if($inputThamDinhGia['leaving_violance_area']){?><div class="col-md-3 col-chitietsobo"><div class="chitietsobo-item">Đất ở ( m ) :  {{$inputThamDinhGia['leaving_violance_area']}}</div></div><?php }?>
                                      <?php if($inputThamDinhGia['farming_violance_area']){?><div class="col-md-3 col-chitietsobo"><div class="chitietsobo-item">Đất nông nghiệp ( m ) : {{$inputThamDinhGia['farming_violance_area']}}</div></div><?php }?>
                                      <?php if($inputThamDinhGia['trade_violance_area']){?>
                                      <div class="col-md-3 col-chitietsobo"><div class="chitietsobo-item">Đất TMDV ( m ) : {{$inputThamDinhGia['trade_violance_area']}}</div></div>
                                      <?php }?>
                                      <?php if($inputThamDinhGia['production_violance_area']){?>
                                      <div class="col-md-3 col-chitietsobo"><div class="chitietsobo-item">Đất SXKD ( m ) : {{$inputThamDinhGia['production_violance_area']}}</div></div>
                                      <?php }?>
                                    </div>                                    
                                    <?php if(isset($inputThamDinhGia['congTrinhXD']) && $inputThamDinhGia['congTrinhXD']){?>
                                    <div class="row">
                                      <div class="col-md-12 col-chitietsobo">
                                        <div class="chitietsobo-item">Công trình xây dựng: 
                                        <?php 
                                        switch($inputThamDinhGia['congTrinhXD']){
                                          case 'nha_pho': echo 'Nhà phố';break;
                                          case 'biet_thu': echo 'Biệt thự';break;
                                          default: echo 'Không có CTXD';break;
                                        }
                                        ?>
                                        </div>
                                      </div>                                        
                                    </div>
                                    <?php }?>
                                    <?php if(isset($inputThamDinhGia['congTrinhXD']) && $inputThamDinhGia['congTrinhXD'] && $inputThamDinhGia['ketCauChinh']){?>
                                    <div class="row">                                      
                                      <div class="col-md-3 col-chitietsobo">
                                        <div class="chitietsobo-item">Công trình xây dựng 1</div>                                        
                                      </div>  
                                      <div class="col-md-3 col-chitietsobo">                                        
                                        <div class="chitietsobo-item">Kết cấu chính: {{$inputThamDinhGia['ketCauChinh']}}</div>                                        
                                      </div>  
                                      <div class="col-md-3 col-chitietsobo">                                        
                                        <div class="chitietsobo-item">Tổng diện tích sàn xd: {{$inputThamDinhGia['total_ground_area']}}</div>                                        
                                      </div>  
                                      <div class="col-md-3 col-chitietsobo">                                        
                                        <div class="chitietsobo-item">Năm xây dựng: {{$inputThamDinhGia['textNamXD']}}</div>
                                      </div>                                                          
                                    </div>
                                    <?php }?> 
                                    <?php 
                                    if(isset($inputThamDinhGia['structureMore'])){
                                    for($i=0; $i < count($inputThamDinhGia['structureMore']); $i++){?>
                                      <div class="row">                                      
                                        <div class="col-md-3 col-chitietsobo">
                                          <div class="chitietsobo-item">Công trình xây dựng <?php echo $i + 2;?></div>                                        
                                        </div>  
                                        <div class="col-md-3 col-chitietsobo">                                        
                                          <div class="chitietsobo-item">Kết cấu chính: {{$inputThamDinhGia['structureMore'][$i]}}</div>                                        
                                        </div>  
                                        <div class="col-md-3 col-chitietsobo">                                        
                                          <div class="chitietsobo-item">Tổng diện tích sàn xd: {{$inputThamDinhGia['total_ground_area_more'][$i]}}</div>                                        
                                        </div>  
                                        <div class="col-md-3 col-chitietsobo">                                        
                                          <div class="chitietsobo-item">Năm xây dựng: {{$inputThamDinhGia['textNamXDMore'][$i]}}</div>
                                        </div>                                                          
                                      </div>
                                    <?php }
                                    }?>
									<div id="btn_xemtaisandinhgia" class="btn btn_icon btn_gradient3"><a href="#"><i class="icon_dinhgia"></i><span>Xem tài sản đã định giá</span></a></div>									
								</div>
                              <br>
								<div class="ketquadinhgia_body">
									<table class="ketquadinhgia_table">
										<thead>
											<tr>											
												<th>HẠNG MỤC</th>
												<th>GIÁ TRỊ ( VNĐ ) </th>												
											</tr>
										</thead>
										<tbody>
                                            <tr>												
												<td class="text-left">Đơn giá thị trường đất ở bình quân</td>
												<td class="text-right">{{ $result['unit_price'] }}</td>												
											</tr>
											<tr>												
												<td class="text-left"><strong>Quyền sử dụng đất</strong></td>
												<td class="text-right">{{ $result['total_price'] }}</td>												
											</tr>
											
											<tr>												
												<td class="text-left"><strong>Quyền sở hữu công trình xây dựng</strong></td>
												<td class="text-right">{{ $result['building_price'] }}</td>												
											</tr>
                                            <?php 
                                            if($result['buildingPriceMore']){                                              
                                              foreach($result['buildingPriceMore'] as $key => $price){?>
                                            <tr>												
												<td class="text-left"><strong>Quyền sở hữu công trình xây dựng <?php echo $key+2?></strong></td>
												<td class="text-right">{{ $price }}</td>												
											</tr>
                                            <?php 
                                              }
                                            }?>
											<tr>												
												<td class="text-left"><strong>Tổng giá trị</strong></td>
												<td class="text-right">{{ $result['total'] }}</td>												
											</tr>													
										</tbody>
									</table>
									<p>* Đơn giá đất ủy ban mặt tiền đường là: {{$result['unit_state_price']}} VNĐ/m2</p>									
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
										<p>- Kết quả sơ bộ có hiệu lực trong thời gian 30 (ba mươi) ngày kể từ ngày thông báo.</p> 
										<p>Rất mong sự phản hồi của Quý khách.</p>
									</div>
								</div>
                                <div class="thamdinhgia-btn-box">
                                    <a class="btn btn_icon btn_gradient2" href="{{ URL::to('/xem-quy-hoach.html') }}"><i class="icon_xemquihoach"></i><span>Xem Quy hoạch</span></a>                                    
									<a class="btn btn_icon btn_gradient4" href="{{ URL::to('/tai-san-dang-giao-dich.html') }}"><i class="icon_xemquihoach"></i><span>Tài sản đang giao dịch</span></a>
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
          */?>
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