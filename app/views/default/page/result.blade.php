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
                <input class="input_text cen-address-text" type="text" name="address" value="{{ $address }}" id="google-map-autocomplete" placeholder="Nhập địa chỉ tài sản để định giá">
                <input class="input_text place-id" name="placeId" id="placeId" type="hidden" value="{{ $placeId }}" >
                <input type="hidden" class="input_text lat" name="lat" id="lat" value="{{ $lat }}">
                <input type="hidden" class="input_text lng" name="lng" id="lng" value="{{ $lng }}">
              </div>
              <div class="form_group form_group_submit">
                <input class="input_submit" type="submit" value="Tìm kiếm">
              </div>
            {{ Form::close() }}
          </div>
        </div>  
        <div class="list-item-marker">
          <ul></ul>
        </div>
        <div class="box-current-position">
          <a class="btn-get-current-position cursor"><img src="{{ URL::asset('default/images/logo_icon2.png') }}"/></a>
        </div>
    </div>    

    <!--
    MAP VIEW
    -->
    <div id="map_view" class="screen"></div>
		

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
                          <span class="title-ct1">CÔNG TRÌNH XÂY DỰNG </span>
                      </div>
                    <?php }?>
                    <?php if(isset($inputThamDinhGia['congTrinhXD']) && $inputThamDinhGia['congTrinhXD'] && $inputThamDinhGia['ketCauChinh']){?>
                    
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="info-d"><label>Công trình xây dựng: </label> <?php 
                                        switch($inputThamDinhGia['congTrinhXD']){
                                          case 'nha_pho': echo 'NHÀ PHỐ';break;
                                          case 'biet_thu': echo 'BIỆT THỰ̣';break;
                                          default: echo 'Không có CTXD';break;
                                        }
                                        ?></div>
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
                                <a href="#" class="orange-btn col-md-4 col-sm-12 col-xs-12 plan-btn-popup"><img src="{{ URL::asset('default/images/w5.png') }}"> XEM QUY HOẠCH</a>
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
		</div>							

		<script>
      var IS_ON_RESULT_PAGE = true;
			$( document ).ready(function(){
				$('#modal_ketquadinhgia').modal('show');
			});						
		</script>
		
	</div>
</div>
{{ HTML::script('default/js/view.v2.js') }}
@endsection			