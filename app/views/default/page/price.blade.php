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
    {{ HTML::script('default/js/view.v2.js') }}


    <!--
    POPUP
    -->
    <!-- <div class="popup_middle_wrapper"> -->
    <div id="modal_dinhgia" class="modal fade" role="dialog">
      <div class="modal-dialog" style="max-width: 900px;">
        <!-- <div class="popup_middle"> -->
        <!-- <div class="popup_middle_inner clearfix"> -->
        <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-body">
            <!--.alert-->
            @if( Session::get('message') )
            <div class="row">
              <div class="col-md-12">
                <div class="alert">
                  <strong><p class="error">{{ Session::get('message') }}</p></strong>
                </div>
              </div>
            </div>
            @endif
            <!--/.alert-->
            <!-- danh cho ban desktop -->
            <!--            <div class="desktop">-->
            <div>
              <div class="dinhgia_tabpanel">
                <div class="ztabpanel clearfix">
                  <ul>
                    <li class="clearfix"><i class="icon_tabpanel icon_nhapho"></i> <span>Nhà phố - Biệt thự</span></li>
                  </ul>
                  <!-- content tab nha pho -->
                  <div>
                    <div class="tab_header">
                      <h3 class="tab_header_title">Địa chỉ định giá</h3>
                      <p>Địa chỉ : {{ $address }}</p>
                    </div>
                    <div class="tab_body">
                      <!--.errors-->
                      @if( $errors->has() )
                      <div class="row the-error">
                        <div class="col-md-12">
                          @foreach( $errors->all() as $error )
                          <p class="error">{{ $error }} </p>
                          @endforeach
                        </div>
                      </div>
                      @endif
                      <!--/.errors-->
                      <div class="tab_body_inner">
                        {{ Form::open( array('url' => 'the-price', 'method' => 'post', 'class' => 'clearfix price-form house_form_desktop') ) }}
                        <input type="hidden" name="textDistrict" class="textDistrict" value="{{$districtName}}"/>
                        <div class="form_row clearfix">
                          <div class="form_col">
                            <label class="highlight">Vị trí tiếp giáp(*)</label>
                            <input type="hidden" name="type" value='house'/>
                            <input type="hidden" name="place_id" value='{{ $placeId }}'/>
                            <input type="hidden" name="street_id"  value="{{ $streetId }}" >
                            <input type="hidden" name="address"  value="{{ $address }}" >
                            <input type="hidden" name="lat"  value="{{ $lat }}" >
                            <input type="hidden" name="lng"  value="{{ $lng }}" >
                            <input type="hidden" name="viTri"  value="" class="inputViTri">
                            <select class="selectVitri" name='selectVitri'>
                              @foreach ($viTri as $s)
                              <option value="{{ $s['id'] }}">{{ $s['description'] }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form_col">
                            <label>Hình dạng thửa đất</label>
                            <input type="hidden" name="hinhDangThuaDat"  value="" class="inputHinhDangThuaDat">
                            <select name="shape" class="selectHinhDangThuaDat">
                              @foreach ($hinhDangThuaDat as $s)
                              <option value="{{ $s['id'] }}">{{ $s['description'] }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form_col yeu-to-khac-box" >
                            <label>Yếu tố khác</label>
                            <div class="box-input-yeutokhac"></div>
                            <select class="selectYeuToKhac" name='selectYeuToKhac[]' multiple="">
                              @foreach ($yeuToKhac as $key=>$s)
                              <option value="{{ $s['id'] }}">{{ $s['description'] }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form_row clearfix">
                          <div class="form_col">
                            <label class="highlight">Tổng diện tích đất (*)</label>
                            <input type="text" name="total_area" placeholder="Tổng diện tích (m2)" value="{{ Input::old('total_area') }}">
                          </div>
                          <div class="form_col">
                            <input type="hidden" name="chieuNgang"  value="" class="inputChieuNgang">
                            <label>&nbsp;</label>
                            <input  class="textChieuNgang" type="text" name="horizontal" placeholder="Chiều ngang mặt tiền (m)" value="{{ Input::old('horizontal') }}">
                          </div>
                          <div class="form_col">
                            <label>&nbsp;</label>
                            <input type="text" name="vertical" placeholder="Chiều dài lớn nhất (m)" value="{{ Input::old('vertical') }}">
                          </div>
                        </div>
                        <div class="form_row clearfix">
                          <div class="form_col form_col_first">
                            <div class="col-md-6" style="padding: 0;">
                              <label>Diện tích phù hợp quy hoạch</label>
                            </div>
                            <div class="col-md-6">
                              <label><input type="checkbox" class="cacLoaiDatKhac" value="1"/> Các loại đất khác</label>
                            </div>
                          </div>
                          <div class="form_col">
                            <input type="hidden" name="dienTichDat"  value="" class="inputDienTichDat">
                            <input type="text" class="textDienTichDat" placeholder="Đất ở (m)" name="leaving_plan_area" value="{{ Input::old('leaving_plan_area') }}">
                          </div>
                          <div class="form_col">
                            <input type="text" placeholder="Đất Nông Nghiệp" name="farming_plan_area" value="{{ Input::old('farming_plan_area') }}">
                          </div>
                          <div class="form_col isShownCacLoaiDatKhac">
                            <input type="text" placeholder="Đất TMDV" name="trade_plan_area" value="{{ Input::old('trade_plan_area') }}">
                          </div>
                          <div class="form_col isShownCacLoaiDatKhac">
                            <input type="text" placeholder="Đất SXKD" name="production_plan_area" value="{{ Input::old('production_plan_area') }}">
                          </div>
                        </div>
                        <div class="form_row clearfix">
                          <div class="form_col form_col_first">
                            <label>Diện tích vi phạm lộ giới được công nhận</label>
                          </div>
                          <div class="form_col">
                            <input type="text" placeholder="Đất ở (m)" name="leaving_violance_area" value="{{ Input::old('leaving_violance_area') }}">
                          </div>
                          <div class="form_col">
                            <input type="text" placeholder="Đất Nông Nghiệp" name="farming_violance_area" value="{{ Input::old('farming_violance_area') }}">
                          </div>
                          <div class="form_col isShownCacLoaiDatKhac">
                            <input type="text" placeholder="Đất TMDV" name="trade_violance_area" value="{{ Input::old('trade_violance_area') }}">
                          </div>
                          <div class="form_col isShownCacLoaiDatKhac">
                            <input type="text" placeholder="Đất SXKD" name="production_violance_area" value="{{ Input::old('production_violance_area') }}">
                          </div>
                        </div>
                        <div class="form_row clearfix">
                          <div class="form_col">
                            <label>Công trình xây dựng</label>
                            <select name="congTrinhXD" class="selectCongTrinhXayDung">
                              <option value="">Không có CTXD</option>
                              <option value="nha_pho">Nhà phố</option>
                              <option value="biet_thu">Biệt thự</option>
                            </select>
                          </div>
                        </div>
                        <div class="form_row clearfix row-ket-cau-chinh">
                          <div class="form_col form_col2">
                            <label>Kết cấu chính</label>
                            <!--<select name="structure" id="" class="selectKetCauChinh"></select>-->
                            <select name="structure" id="">
                              @foreach ($ketCauChinhNhaPho as $s)
                              <option value="{{ $s['price'] }}">{{ $s['structure'] }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form_col">
                            <label>Tổng diện tích sàn xd</label>
                            <input type="text" placeholder="" name="total_ground_area" value="">
                          </div>
                          <div class="form_col">
                            <label>Năm xây dựng</label>
                            <input type="hidden" name="year_building" class="namXD1">
                            <input type="text" name="textNamXD" class="textNamXD">
                            <?php /*
                              <select name="year_building">
                              @foreach ($namXayDung as $s)
                              <option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
                              @endforeach
                              </select>
                             *
                             */ ?>
                          </div>
                        </div>
                        <div class="form_row form_add_row_wrapper clearfix  row-ket-cau-chinh cursor" type="nha_pho">
                          <div class="form_col">
                            <a class="btn btn_add_more_row">+ Thêm công trình xây dựng</a>
                          </div>
                        </div>
                        <div class="form_row clearfix">
                          <div class="popup_button_group groupThanhToan">
                            <!-- <a href="thanh-toan.html"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a> -->
                            <button data='.house_form_desktop' type='submit' id="btn_dinhgia" land-type="nha_pho" class="orange-btn odd btn_dinhgia @if( Sentry::check() ) hidden @endif"><img src="{{ URL::asset('default/images/w3.png') }}"> XEM KẾT QUẢ</button>
                            <button type='submit' class="orange-btn odd vacantBtnSubmit nha_pho_btnsubmit @if( !Sentry::check() ) hidden @endif"><img src="{{ URL::asset('default/images/w3.png') }}"> XEM KẾT QUẢ</button>
                          </div>
                        </div>
                        {{ Form::close() }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php /*
              <!-- danh cho ban mobile -->
              <div class="mobile">
              <section id="list_loaitaisan_dinhgia" data-accordion-group>

              <section data-accordion>
              <button data-control><i class="icon_tabpanel icon_nhapho"></i> Nhà phố</button>
              <div data-content>
              <article>
              <!-- content tab nha pho -->
              <div>
              <div class="tab_header">
              <h3 class="tab_header_title">Địa chỉ định giá</h3>
              <p>Địa chỉ : {{ $address }}</p>
              </div>
              <div class="tab_body">
              <div class="tab_body_inner">
              {{ Form::open( array('url' => 'the-price', 'method' => 'post', 'class' => 'clearfix price-form house_form') ) }}
              <input type="hidden" name="textDistrict" class="textDistrict" value="{{$districtName}}"/>
              <div class="form_row clearfix">
              <div class="form_col form_col_first">
              <label class="highlight">Đất sử dụng riêng (*)</label>
              <input type="hidden" name="type" value='house'/>
              <input type="hidden" name="place_id" value='{{ $placeId }}'/>
              <input type="hidden" name="street_id"  value="{{ $streetId }}" >
              <input type="hidden" name="address"  value="{{ $address }}" >
              <input type="hidden" name="lat"  value="{{ $lat }}" >
              <input type="hidden" name="lng"  value="{{ $lng }}" >
              </div>
              <div class="form_col">
              <input type="text" placeholder="Tổng diện tích (m2)" name="total_area" value="{{ Input::old('total_area') }}">
              </div>
              <div class="form_col">
              <input type="hidden" name="chieuNgang"  value="" class="inputChieuNgang">
              <label>&nbsp;</label>
              <input  class="textChieuNgang" type="text" name="horizontal" placeholder="Chiều ngang mặt tiền (m)" value="{{ Input::old('horizontal') }}">
              </div>
              <div class="form_col">
              <input type="text" placeholder="Chiều dài lớn nhất (m)" name="vertical" value="{{ Input::old('vertical') }}">
              </div>
              </div>
              <div class="form_row clearfix">
              <div class="form_col form_col_first">
              <label>Hình dạng thửa đất</label>
              </div>
              <div class="form_col">
              <input type="hidden" name="hinhDangThuaDat"  value="" class="inputHinhDangThuaDat">
              <select name="shape" class="selectHinhDangThuaDat">
              @foreach ($hinhDangThuaDat as $s)
              <option value="{{ $s['id'] }}">{{ $s['description'] }}</option>
              @endforeach
              </select>
              </div>
              </div>
              <div class="form_row clearfix">
              <div class="form_col form_col_first">
              <label>Diện tích đất phù hợp quy hoạch</label>
              </div>
              <div class="form_col">
              <input type="hidden" name="dienTichDat"  value="" class="inputDienTichDat">
              <input type="text" class="textDienTichDat" placeholder="Đất ở (m)" name="leaving_plan_area" value="{{ Input::old('leaving_plan_area') }}">
              </div>
              <div class="form_col">
              <input type="text" placeholder="Đất TMDV" name="trade_plan_area" value="{{ Input::old('trade_plan_area') }}">
              </div>
              <div class="form_col">
              <input type="text" placeholder="Đất SXKD" name="production_plan_area" value="{{ Input::old('production_plan_area') }}">
              </div>
              <div class="form_col">
              <input type="text" placeholder="Đất Nông Nghiệp" name="farming_plan_area" value="{{ Input::old('farming_plan_area') }}">
              </div>
              </div>
              <div class="form_row clearfix">
              <div class="form_col form_col_first">
              <label>Diện tích đất vi phạm lộ giới được công nhận</label>
              </div>
              <div class="form_col">
              <input type="text" placeholder="Đất ở (m)" name="leaving_violance_area" value="{{ Input::old('leaving_violance_area') }}">
              </div>
              <div class="form_col">
              <input type="text" placeholder="Đất TMDV" name="trade_violance_area" value="{{ Input::old('trade_violance_area') }}">
              </div>
              <div class="form_col">
              <input type="text" placeholder="Đất SXKD" name="production_violance_area" value="{{ Input::old('production_violance_area') }}">
              </div>
              <div class="form_col">
              <input type="text" placeholder="Đất Nông Nghiệp" name="farming_violance_area" value="{{ Input::old('farming_violance_area') }}">
              </div>
              </div>
              <div class="form_row clearfix">
              <div class="form_col">
              <label>Công trình xây dựng</label>
              <select name="shape" class="selectCongTrinhXayDung">
              <option value="">Chọn CTXD</option>
              <option value="">Không có CTXD</option>
              <option value="nha_pho">Nhà phố</option>
              <option value="biet_thu">Biệt thự</option>
              </select>
              </div>
              </div>
              <div class="form_row clearfix row-ket-cau-chinh">
              <div class="form_col">
              <label>Kết cấu chính</label>
              <select name="structure" id="">
              @foreach (Structure::findByAlias('nha-pho')->structure_options()->get()->toArray() as $s)
              <option value="{{ $s['price'] }}">{{ $s['structure'] }}</option>
              @endforeach
              </select>
              </div>
              <div class="form_col">
              <label>Tổng diện tích sàn xd</label>
              <input type="text" placeholder="" name="total_ground_area" value="">
              </div>
              <div class="form_col">
              <label>Năm xây dựng</label>
              <select name="year_building">
              @foreach (AdjustOption::findByGroupId(9)->get()->toArray() as $s)
              <option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
              @endforeach
              </select>
              </div>
              </div>
              <div class="form_row form_add_row_wrapper clearfix row-ket-cau-chinh">
              <div class="form_col">
              <a class="btn btn_add_more_row cursor">+ Thêm công trình xây dựng</a>
              </div>
              </div>
              <div class="form_row clearfix">
              <div class="popup_button_group groupThanhToan">
              <!-- <a href="thanh-toan.html"><div id="btn_thanhtoan" class="btn btn_icon btn_gradient2"><i class="icon_thanhtoan"></i><span>Thanh toán</span></div></a> -->
              @if( !Sentry::check() )
              <button data='.house_form' type='submit' id="btn_dinhgia" class="orange-btn odd"><img src="{{ URL::asset('default/images/w3.png') }}"> XEM KẾT QUẢ</button>
              @else
              <button  type='submit' class="orange-btn odd"><img src="{{ URL::asset('default/images/w3.png') }}"> XEM KẾT QUẢ</button>
              @endif
              </div>
              </div>
              {{ Form::close() }}
              </div>
              </div>
              </div>
              </article>
              </div>
              </section>
              </section>
              </div>

             */ ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="modal_alert" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Thông báo</h4>
        </div>
        <div class="modal-body">
          <div class="modal_info_inner clearfix">
            <div class="popup_button_group groupThanhToan">
              Vui lòng <a href="#dangnhap"  data-toggle="modal" data-target="#modal_dangNhap">Đăng nhập</a> hoặc chọn <a class="cnologin" href="#">Thanh toán nhanh</a>
              không cần <a href="#dangki"  data-toggle="modal" data-target="#modal_dangky">Đăng ký tài khoản </a> để nhận kết quả định giá của bạn
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    var vitriOptions = [];
    var hinhDangThuaDatOptions = [];
    var yeuToKhacOptions = [];
    var chieuNgangOptions = [];
    var dienTichDatOptions = [];
<?php
foreach ($viTri as $item) {
  ?>
      vitriOptions[<?php echo $item['id'] ?>] = {
        quanTrungTam: <?php echo $item['quanTrungTam'] ?>,
        quanKhac: <?php echo $item['quanKhac'] ?>,
        description: '<?php echo $item['description'] ?>'
      };
  <?php
}
?>
<?php
foreach ($hinhDangThuaDat as $item) {
  ?>
      hinhDangThuaDatOptions[<?php echo $item['id'] ?>] = {
        quanTrungTamMatTien: <?php echo $item['quanTrungTamMatTien'] ?>,
        quanTrungTamHem: <?php echo $item['quanTrungTamHem'] ?>,
        quanKhacMatTien: <?php echo $item['quanKhacMatTien'] ?>,
        quanKhacHem: <?php echo $item['quanKhacHem'] ?>
      };
  <?php
}
?>
<?php
foreach ($yeuToKhac as $item) {
  ?>
      yeuToKhacOptions[<?php echo $item['id'] ?>] = {
        quanTrungTam: <?php echo $item['quanTrungTam'] ?>,
        quanKhac: <?php echo $item['quanKhac'] ?>
      };
  <?php
}
?>
<?php
foreach ($chieuNgang as $item) {
  ?>
      chieuNgangOptions[<?php echo $item['id'] ?>] = {
        quanTrungTamMatTien: <?php echo $item['quanTrungTamMatTien'] ?>,
        quanTrungTamHem: <?php echo $item['quanTrungTamHem'] ?>,
        quanKhacMatTien: <?php echo $item['quanKhacMatTien'] ?>,
        quanKhacHem: <?php echo $item['quanKhacHem'] ?>,
        name: '<?php echo $item['description'] ?>'
      };
  <?php
}
?>
<?php
foreach ($dienTichDat as $item) {
  ?>
      dienTichDatOptions[<?php echo $item['id'] ?>] = {
        quanTrungTamMatTien: <?php echo $item['quanTrungTamMatTien'] ?>,
        quanTrungTamHem: <?php echo $item['quanTrungTamHem'] ?>,
        quanKhacMatTien: <?php echo $item['quanKhacMatTien'] ?>,
        quanKhacHem: <?php echo $item['quanKhacHem'] ?>,
        name: '<?php echo $item['description'] ?>'
      };
  <?php
}
?>
    var ketCauChinhOptions = <?php echo json_encode($ketCauChinhNhaPho) ?>;
    var ketCauChinhNhaPhoOptions = '';
    var ketCauChinhCanHoOptions = '';
    var ketCauChinhKhachSanOptions = '';
    var ketCauChinhToaNhaVanPhongOptions = '';
    var ketCauChinhKhoXuongOptions = '';
<?php foreach ($ketCauChinhNhaPho as $s) { ?>
      ketCauChinhNhaPhoOptions += '<option value="<?php echo $s['price'] ?>"><?php echo $s['structure'] ?></option>';
<?php } ?>
<?php foreach ($ketCauChinhCanHo as $s) { ?>
      ketCauChinhCanHoOptions += '<option value="<?php echo $s['price'] ?>"><?php echo $s['structure'] ?></option>';
<?php } ?>

<?php foreach ($ketCauChinhKhachSan as $s) { ?>
      ketCauChinhKhachSanOptions += '<option value="<?php echo $s['price'] ?>"><?php echo $s['structure'] ?></option>';
<?php } ?>

<?php foreach ($ketCauChinhToaNhaVanPhong as $s) { ?>
      ketCauChinhToaNhaVanPhongOptions += '<option value="<?php echo $s['price'] ?>"><?php echo $s['structure'] ?></option>';
<?php } ?>
    var optionsKetCauChinhKhoXuong = '';
<?php foreach ($ketCauChinhKhoXuong as $s) { ?>
      optionsKetCauChinhKhoXuong += '<option value="<?php echo $s['id'] ?>"><?php echo $s['name'] ?></option>';
<?php } ?>
    var optionsChildKhoXuong = '';
<?php foreach ($childKhoXuong as $s) { ?>
      optionsChildKhoXuong += '<option value="<?php echo $s['price'] ?>"><?php echo $s['structure'] ?></option>';
<?php } ?>
    var namXDOptions = [];
<?php
foreach ($namXayDung as $item) {
  ?>
      namXDOptions[<?php echo $item['description'] ?>] = <?php echo $item['value'] ?>;
  <?php
}
?>
  </script>
  {{ HTML::script('default/js/thamdinhgia.js') }} 
  @endsection