<?php
$viTri = AdjustOption::findByGroupId(15, null, 1)->get()->toArray();
$hinhDangThuaDat = AdjustOption::findByGroupId(4, null, 1)->get()->toArray();
$chieuNgang = AdjustOption::findByGroupId(1, null, 1)->get()->toArray();
$dienTichDat = AdjustOption::findByGroupId(3, null, 1)->get()->toArray();
$ketCauChinh = User::getKetCauChinh();
$namXayDung = AdjustOption::findByGroupId(9)->get()->toArray();
?>
<div id="modal_dongiasobo" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thẩm định cơ bản</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" class="giaThiTruong"/>
        <input type="hidden" class="giaUB"/>
        <div class="tab_header address_row">
          <h3 class="tab_header_title">Địa chỉ</h3>
          <p id="dgsb_popup_address">68 Hai Bà Trưng, P.Bến Nghé, Q.1, Tp.HCM</p>
        </div>
        <div class="form_row clearfix">
          <div class="tab_body">
            <div class="tab_body_inner">
              {{ Form::open( array('url' => 'the-price', 'method' => 'post', 'class' => 'clearfix price-form vacant_land_form') ) }}
            <ul class="error error-dongiasobo"></ul>
            <input type="hidden" name="textDistrict" class="textDistrict"/>
            <div class="form_row clearfix">
              <div class="form_col">
                <input type="hidden" name="dienTichDat"  value="" class="inputDienTichDat">
                <label class="highlight">Tổng Diện tích đất (*)</label>
                <input type="text" name="textDienTichDat" class="textDienTichDat" placeholder="Tổng diện tích (m2)" value="">
              </div>
              <div class="form_col"  style="">
                <input type="hidden" name="chieuNgang"  value="" class="inputChieuNgang">
                <label>&nbsp;</label>
                <input  class="textChieuNgang" type="text" name="horizontal" placeholder="Chiều ngang mặt tiền" value="">
              </div>
              <div class="form_col"  style="">
                <label>&nbsp;</label>
                <input type="text" name="vertical" placeholder="Chiều dài lớn nhất" class="textChieuDai" value="">
              </div>
            </div>
            <div class="form_row clearfix">
              <div class="form_col">
                <label class="highlight">Vị trí tiếp giáp(*)</label>
                <input type="hidden" name="viTri"  value="" class="inputViTri">
                <select class="selectVitri">
                  @foreach ($viTri as $s)
                  <option value="{{ $s['id'] }}">{{ $s['description'] }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form_col" style="">
                <label>Hình dạng thửa đất</label>
                <input type="hidden" name="hinhDangThuaDat"  value="" class="inputHinhDangThuaDat">
                <select name="shape" class="selectHinhDangThuaDat">
                  @foreach ($hinhDangThuaDat as $s)
                  <option value="{{ $s['id'] }}">{{ $s['description'] }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form_col" style="">
                <label>Công trình xây dựng</label>
                <select name="shape" class="selectCongTrinhXayDung">
                  <option value="">Không có CTXD</option>
                  <option value="nha_pho">Nhà phố</option>
                  <option value="biet_thu">Biệt thự</option>
                </select>
              </div>
            </div>
            <div class="form_row clearfix row-ket-cau-chinh" style="display: none;">
              <div class="form_col">
                <label>Kết cấu  chính</label>
              <select name="shape" class="selectKetCauChinh" disabled=""></select>
            </div>
            <div class="form_col" style="">
              <label>Tổng diện tích sàn xd</label>
              <input type="text" name="dien-tich-san-xd" class="dien-tich-san-xd" disabled="">
            </div>
            <div class="form_col" style="">
              <label>Năm xây dựng</label>
              <input type="hidden" name="namXD" class="namXD">
              <input type="text" name="textNamXD" class="textNamXD" disabled="">
            </div>
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <a id="btn_dinhgiasobo" class="emeral-btn odd"><img src="{{ URL::asset('default/images/w2.png') }}">  XEM KẾT QUẢ</a>
    <?php /*
    <a id="btn_dinhgiasobo" class="btn btn_icon btn_gradient4"><i class="icon_phathanhchungthu"></i><span>Xem giá sơ bộ</span></a>
    *
    */?>
  </div>
</div>
</div>
</div>
<div id="modal_ketqua_dongiasobo" class="modal fade" role="dialog">
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
            <br><img src="{{ URL::asset('default/images/t3.png') }}" >  dinhgiatructuyen.vn
          </div>
        </div>
      </div>
    </div>
    <div class="bread-blk">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="bread">
            <img src="{{ URL::asset('default/images/kq-sobo.png') }}" class="red-ribbon" style="width: 225px;">
            <span class="bold emeral">Địa chỉ: <span class='dgsb_popup_address'></span></span>
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
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="info-d"><label>Tổng điện tích đất (m<sup>2</sup>):</label> <span class="tongDienTichLabel"></span></div>
          <div class="info-d"><label>Vị trí tiếp giáp:</label> <span class="vitriLabel"></span></div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="info-d"><label>Chiều ngang (m):</label> <span class="chieuNgangLabel"></span></div>
          <div class="info-d"><label>Hình dạng thửa đất:</label> <span class="hinhDangLabel"></span></div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="info-d"><label>Chiều dài (m):</label> <span class="chieuDaiLabel"></span></div>
        </div>
      </div>
      <div class="row info-blk">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <span class="title-ct1">CÔNG TRÌNH XÂY DỰNG <!-- NHÀ PHỐ --></span>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="info-d"><label>Công trình xây dựng: </label> <span class="CTXDLabel"></span></div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="info-d"><label>Tổng diện tích sàn xây dựng(m<sup>2</sup>):</label> <span class="tongDienTichSanLabel"></span></div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="info-d"><label>Năm xây dựng:</label> <span class="namXDLabel"></span></div>
        </div>
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
            <h2 class="price emeral"><span class='giaThiTruong'></span></h2>
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
              <h2 class="price emeral"><span class='giaTriDat'></span></h2>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="feature">
              <div>
                <img src="{{ URL::asset('default/images/i3.png') }}" >
              </div>
              <span class="bold">QUYỀN SỞ HỮU</span>
              <br>CÔNG TRÌNH XÂY DỰNG
              <h2 class="price emeral"><span class='giaTriCTXD'></span></h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 total-price">
              <div class="content3">
                <h1><span class="bold">TỔNG GIÁ TRỊ:</span> <span class='tongGiaTriSoBo'></span></h1>
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
          <span class="italic padding-left-5">* Đơn giá đất ủy ban mặt tiền đường là: <span class="giaUBLabel"></span> VNĐ/m<sup>2</sup></span>
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
                    <!-- <a class="emeral-btn col-md-4 col-sm-12 col-xs-12 cursor btn_dinhgia_adv"><img src="{{ URL::asset('default/images/w3.png') }}"> THẨM ĐỊNH NÂNG CAO</a> -->
                  </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 padding-left-right-zero">
                  <div class="center">
                    <!-- <a href="{{ URL::to('/xem-quy-hoach.html') }}" class="orange-btn col-md-4 col-sm-12 col-xs-12"><img src="{{ URL::asset('default/images/w5.png') }}"> XEM QUY HOẠCH1</a> -->
                    <a href="{{ URL::to('/lien-he.html') }}" class="emeral-btn col-md-4 col-sm-12 col-xs-12 cursor"><img src="{{ URL::asset('default/images/w6.png') }}" > PHÁT HÀNH CHỨNG THƯ</a>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 padding-left-right-zero">
                  <div class="center">
                    <!-- <a class="emeral-btn col-md-4 col-sm-12 col-xs-12 btn_dinhgia cursor"><img src="{{ URL::asset('default/images/w6.png') }}" > THẨM ĐỊNH GIÁ</a> -->
                    <!-- <a href="{{ URL::to('/xem-quy-hoach.html') }}" class="orange-btn col-md-4 col-sm-12 col-xs-12 plan-btn-popup"><img src="{{ URL::asset('default/images/w5.png') }}"> XEM QUY HOẠCH</a> -->
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
var vitriOptions = [];
var hinhDangThuaDatOptions = [];
var chieuNgangOptions = [];
var dienTichDatOptions = [];
var ketCauChinhOptions = <?php echo json_encode($ketCauChinh) ?>;
var namXDOptions = [];
<?php
foreach ($viTri as $item) {
?>
vitriOptions[<?php echo $item['id'] ?>] = {
    quanTrungTam: <?php echo $item['quanTrungTam'] ?>,
    quanKhac: <?php echo $item['quanKhac'] ?>,
    description: "<?php echo $item['description'] ?>"
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
    quanKhacHem: <?php echo $item['quanKhacHem'] ?>,
    description: "<?php echo $item['description'] ?>"
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
    name: "<?php echo $item['description'] ?>"
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
    name: "<?php echo $item['description'] ?>"
};
<?php
}
?>
<?php
foreach ($namXayDung as $item) {
?>
  namXDOptions[<?php echo $item['description'] ?>] = <?php echo $item['value'] ?>;
<?php
}
?>
</script>

  {{ HTML::script('default/js/dinhgiasobo.js') }}