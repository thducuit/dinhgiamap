<?php
$districts = [];
for ($i = 1; $i <= 9; $i++) {
  $districts[$i] = 'Quận ' . $i;
}
$districts[] = 'Quận Tân Bình';
$districts[] = 'Quận Tân Phú';
$viTri = AdjustOption::findByGroupId(15)->get()->toArray();
$hinhDangThuaDat = AdjustOption::findByGroupId(4)->get()->toArray();
$yeuToKhac = AdjustOption::findByGroupId(16)->get()->toArray();
$chieuNgang = AdjustOption::findByGroupId(1)->get()->toArray();
$dienTichDat = AdjustOption::findByGroupId(3)->get()->toArray();
$ketCauChinh = User::getKetCauChinh();
?>
<div id="modal_dongiasobo" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Xem giá sơ bộ</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" class="giaThiTruong"/>
        <div class="tab_header address_row">
          <h3 class="tab_header_title">Địa chỉ</h3>
          <p id="dgsb_popup_address">68 Hai Bà Trưng, P.Bến Nghé, Q.1, Tp.HCM</p>
        </div>					
        <div class="form_row clearfix">
          <div class="tab_body">
            <div class="tab_body_inner">
              {{ Form::open( array('url' => 'the-price', 'method' => 'post', 'class' => 'clearfix price-form vacant_land_form') ) }}
              <div class="form_row clearfix">
                <div class="form_col">
                  <label>Quận</label>
                  <select class="selectQuan">
                    <option value="">Chọn Quận</option>
                    @foreach ($districts as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>

              </div>


              <div class="form_row clearfix">
                <div class="form_col">
                  <input type="hidden" name="dienTichDat"  value="" class="inputDienTichDat">
                  <label class="highlight">Diện tích đất (*)</label>
                  <input type="text" name="textDienTichDat" class="textDienTichDat" placeholder="Tổng diện tích (m2)" value="">
                </div>
                <div class="form_col"  style="width: 30%;">
                  <input type="hidden" name="chieuNgang"  value="" class="inputChieuNgang">
                  <label>&nbsp;</label>                                                      
                  <input  class="textChieuNgang" type="text" name="horizontal" placeholder="Chiều ngang mặt tiền (m)" value="">                                                      
                </div>
                <div class="form_col"  style="width: 30%;">
                  <label>&nbsp;</label>
                  <input type="text" name="vertical" placeholder="Chiều dài lớn nhất (m)" value="">
                </div>
              </div>	
              <div class="form_row clearfix">
                <div class="form_col">
                  <label class="highlight">Vị trí (*)</label>                    
                  <input type="hidden" name="viTri"  value="" class="inputViTri">
                  <select class="selectVitri">
                    <option value="">Chọn Vị trí</option>
                    @foreach ($viTri as $s)
                    <option value="{{ $s['id'] }}">{{ $s['description'] }}</option>
                    @endforeach															
                  </select>

                </div>
                <div class="form_col" style="width: 30%;">
                  <label>Hình dạng thửa đất</label>
                  <input type="hidden" name="hinhDangThuaDat"  value="" class="inputHinhDangThuaDat">                                                  
                  <select name="shape" class="selectHinhDangThuaDat">
                    <option value="">Hình dạng</option>
                    @foreach ($hinhDangThuaDat as $s)
                    <option value="{{ $s['id'] }}">{{ $s['description'] }}</option>
                    @endforeach
                  </select>
                </div>                                                                                            
                <div class="form_col" style="width: 30%;">
                  <label>Công trình xây dựng</label>                  
                  <select name="shape" class="selectCongTrinhXayDung">                    
                    <option value="">Không</option>
                    <option value="nha_pho">Nhà phố</option>
                    <option value="biet_thu">Biệt thự</option>
                  </select>
                </div>                                                                                            
              </div>
              <div class="form_row clearfix">
                <div class="form_col">
                  <label>Kết cấu  chính</label>                  
                  <select name="shape" class="selectKetCauChinh" disabled=""></select>
                </div>     
                <div class="form_col" style="width: 30%;">
                  <label>Tổng diện tích sàn xd</label>                  
                  <input type="text" name="dien-tich-san-xd" class="dien-tich-san-xd" disabled="">
                </div>     
                <div class="form_col" style="width: 30%;">
                  <label>Năm xây dựng</label>                  
                  <select name="year_building" disabled="" class='selectNamXayDung'>
                    @foreach (AdjustOption::findByGroupId(9)->get()->toArray() as $s)
                    <option value="{{ $s['value'] }}">{{ $s['description'] }}</option>
                    @endforeach
                  </select>
                </div>     
              </div>
              {{ Form::close() }}
            </div>                          

          </div>
        </div>

      </div>
      <div class="modal-footer">
        <a id="btn_dinhgiasobo" class="btn btn_icon btn_gradient4"><i class="icon_phathanhchungthu"></i><span>Xem giá sơ bộ</span></a>
      </div>
    </div>

  </div>

</div>


<div id="modal_ketqua_dongiasobo" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-body">
						
						<div class="modal_ketquadinhgia_header clearfix">
							<div class="modal_ketquadinhgia_header_logo">
								<img src="{{ URL::asset('default/images/logo_ketquadinhgia.png') }}">
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
									<h3 class="ketquadinhgia_title">KẾT QUẢ XEM GIÁ SƠ BỘ</h3>									
									<h3 class="ketquadinhgia_title">ĐỊA CHỈ ĐỊNH GIÁ TÀI SẢN</h3>
									<p class='dgsb_popup_address'></p>																											
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
												<td><strong>Đơn giá thị trường đề xuất</strong></td>
                                                <td><span class='giaThiTruong'></span></td>
												<td>VNĐ</td>
											</tr>
											<tr>
												<td></td>
												<td>Giá trị đất</td>
												<td><span class='giaTriDat'></span></td>
												<td>VNĐ/M2</td>
											</tr>
											<tr>
												<td>II</td>
												<td><strong>Giá trị công trình xây dựng</strong></td>
												<td><span class='giaTriCTXD'></span></td>
												<td>VNĐ</td>
											</tr>
											<tr>
												<td>III</td>
												<td><strong>Tổng giá trị (I+II)</strong></td>
												<td><span class='tongGiaTriSoBo'></span></td>
												<td>VNĐ</td>
											</tr>													
										</tbody>
									</table>
								
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
  jQuery(document).ready(function() {
    var vitriOptions = [];
    var hinhDangThuaDatOptions = [];
    var chieuNgangOptions = [];
    var dienTichDatOptions = [];
    var ketCauChinhOptions = <?php echo json_encode($ketCauChinh)?>;
    
    <?php 
      foreach($viTri as $item){
        ?>
            vitriOptions[<?php echo $item['id']?>] = {
              quanTrungTam: <?php echo $item['quanTrungTam']?>,
              quanKhac: <?php echo $item['quanKhac']?>,
              description: '<?php echo $item['description']?>'
            };
            <?php
      }
      ?>
       
      <?php 
      foreach($hinhDangThuaDat as $item){
        ?>
            hinhDangThuaDatOptions[<?php echo $item['id']?>] = {
              quanTrungTamMatTien: <?php echo $item['quanTrungTamMatTien']?>,
              quanTrungTamHem: <?php echo $item['quanTrungTamHem']?>,
              quanKhacMatTien: <?php echo $item['quanKhacMatTien']?>,
              quanKhacHem: <?php echo $item['quanKhacHem']?>
            };
            <?php
      }
      ?>    
      <?php 
      foreach($chieuNgang as $item){
        ?>
            chieuNgangOptions[<?php echo $item['id']?>] = {
              quanTrungTamMatTien: <?php echo $item['quanTrungTamMatTien']?>,
              quanTrungTamHem: <?php echo $item['quanTrungTamHem']?>,
              quanKhacMatTien: <?php echo $item['quanKhacMatTien']?>,
              quanKhacHem: <?php echo $item['quanKhacHem']?>,
              name: '<?php echo $item['description']?>'
            };
            <?php
      }
      ?>        
      
       <?php 
      foreach($dienTichDat as $item){
        ?>
            dienTichDatOptions[<?php echo $item['id']?>] = {
              quanTrungTamMatTien: <?php echo $item['quanTrungTamMatTien']?>,
              quanTrungTamHem: <?php echo $item['quanTrungTamHem']?>,
              quanKhacMatTien: <?php echo $item['quanKhacMatTien']?>,
              quanKhacHem: <?php echo $item['quanKhacHem']?>,
              name: '<?php echo $item['description']?>'
            };
            <?php
      }
      ?> 
      
      
          
      jQuery('#modal_dongiasobo .selectQuan,#modal_dongiasobo  .selectVitri,#modal_dongiasobo  .selectHinhDangThuaDat,'+
            '#modal_dongiasobo  .textChieuNgang,#modal_dongiasobo  .textDienTichDat').change(function(){
      var quan = $(this).parents('.price-form').find('.selectQuan:first').val();
      var idOptionVitri = $(this).parents('.price-form').find('.selectVitri:first').val();
      var idOptionHinhDangThuaDat = $(this).parents('.price-form').find('.selectHinhDangThuaDat:first').val();               
      var idOptionChieuNgang = null;
      var idOptionDienTichDat = null;
      var textChieuNgang = $(this).parents('.price-form').find('.textChieuNgang:first').val();
      var textDienTich = $(this).parents('.price-form').find('.textDienTichDat:first').val();
      var selectHemMaTien = 'mat_tien';

      var vitriData = '';          
      var hinhDangThuaDatData = '';       
      var chieuNgangData = '';
      var dienTichDatData = '';

      if(vitriOptions[idOptionVitri]){
        if(quan == 1 || quan == 3){
          vitriData = vitriOptions[idOptionVitri].quanTrungTam;
        }else{
          vitriData = vitriOptions[idOptionVitri].quanKhac;
        }
        if(vitriOptions[idOptionVitri].description.indexOf('hẻm') > -1){
          selectHemMaTien = 'hem';
        }
      }          
      $(this).parents('.price-form').find('.inputViTri:first').val(vitriData);                    

      if(hinhDangThuaDatOptions[idOptionHinhDangThuaDat]){
        if(quan == 1 || quan == 3){
          if(selectHemMaTien == 'mat_tien'){
            hinhDangThuaDatData = hinhDangThuaDatOptions[idOptionHinhDangThuaDat].quanTrungTamMatTien;
          }else{
            hinhDangThuaDatData = hinhDangThuaDatOptions[idOptionHinhDangThuaDat].quanTrungTamHem;
          }
        }else{
          if(selectHemMaTien == 'mat_tien'){
            hinhDangThuaDatData = hinhDangThuaDatOptions[idOptionHinhDangThuaDat].quanKhacMatTien;
          }else{
            hinhDangThuaDatData = hinhDangThuaDatOptions[idOptionHinhDangThuaDat].quanKhacHem;
          }
        }            
      }
      $(this).parents('.price-form').find('.inputHinhDangThuaDat:first').val(hinhDangThuaDatData);      

      for(var i in chieuNgangOptions){
        var partPrice = chieuNgangOptions[i]['name'].split('≤');
        if(!partPrice[0]){
          if(partPrice[1] && textChieuNgang*1 <= partPrice[1]*1){
            idOptionChieuNgang = i;
            break;
          }
        }else{
          partPrice = chieuNgangOptions[i]['name'].split(' - ≤');
          if(partPrice[1]){
            if(textChieuNgang*1 > partPrice[0]*1 && textChieuNgang*1 <= partPrice[1]*1){
              idOptionChieuNgang = i;
              break;
            }
          }else{
            partPrice = chieuNgangOptions[i]['name'].split('>');
            if(textChieuNgang*1 > partPrice[0]){
              idOptionChieuNgang = i;
              break;
            }
          }
        }
      }

      if(chieuNgangOptions[idOptionChieuNgang]){
        if(quan == 1 || quan == 3){
          if(selectHemMaTien == 'mat_tien'){
            chieuNgangData = chieuNgangOptions[idOptionChieuNgang].quanTrungTamMatTien;
          }else{
            chieuNgangData = chieuNgangOptions[idOptionChieuNgang].quanTrungTamHem;
          }
        }else{
          if(selectHemMaTien == 'mat_tien'){
            chieuNgangData = chieuNgangOptions[idOptionChieuNgang].quanKhacMatTien;
          }else{
            chieuNgangData = chieuNgangOptions[idOptionChieuNgang].quanKhacHem;
          }
        }            
      }
      $(this).parents('.price-form').find('.inputChieuNgang:first').val(chieuNgangData);

      for(var i in dienTichDatOptions){
        var partPrice = dienTichDatOptions[i]['name'].split('≤');
        if(!partPrice[0]){
          if(partPrice[1] && textDienTich*1 <= partPrice[1]*1){
            idOptionDienTichDat = i;
            break;
          }
        }else{
          partPrice = dienTichDatOptions[i]['name'].split(' - ≤');
          if(partPrice[1]){
            if(textDienTich*1 > partPrice[0]*1 && textDienTich*1 <= partPrice[1]*1){
              idOptionDienTichDat = i;
              break;
            }
          }else{
            partPrice = dienTichDatOptions[i]['name'].split('>');
            if(textDienTich*1 > partPrice[0]){
              idOptionDienTichDat = i;
              break;
            }
          }
        }
      }
      if(dienTichDatOptions[idOptionDienTichDat]){
        if(quan == 1 || quan == 3){
          if(selectHemMaTien == 'mat_tien'){
            dienTichDatData = dienTichDatOptions[idOptionDienTichDat].quanTrungTamMatTien;
          }else{
            dienTichDatData = dienTichDatOptions[idOptionDienTichDat].quanTrungTamHem;
          }
        }else{
          if(selectHemMaTien == 'mat_tien'){
            dienTichDatData = dienTichDatOptions[idOptionDienTichDat].quanKhacMatTien;
          }else{
            dienTichDatData = dienTichDatOptions[idOptionDienTichDat].quanKhacHem;
          }
        }            
      }
      $(this).parents('.price-form').find('.inputDienTichDat:first').val(dienTichDatData); 

    });
    $('#modal_dongiasobo #btn_dinhgiasobo').click(function(){
      //Gia tri dat
      var viTri = $('#modal_dongiasobo .inputViTri').val();
      var hinhDangThuaDat = $('#modal_dongiasobo .inputHinhDangThuaDat').val();
      var chieuNgang = $('#modal_dongiasobo .inputChieuNgang').val();
      var dienTichDat = $('#modal_dongiasobo .inputDienTichDat').val();      
      var giaThiTruong = $('#modal_dongiasobo .giaThiTruong').val();
      $('#modal_ketqua_dongiasobo .giaThiTruong').html(giaThiTruong);
      
      giaThiTruong = giaThiTruong.replace(/\,/gm, '');      
      var giaTriDat = parseInt(giaThiTruong) + parseInt(giaThiTruong)*(parseInt(viTri) + parseInt(hinhDangThuaDat) + parseInt(chieuNgang) + parseInt(dienTichDat))/100;      
     
     //giá trị công trình xây dựng
     var ketCauChinh = $('#modal_dongiasobo .selectKetCauChinh').val();
     var dienTichSanXD = $('#modal_dongiasobo .dien-tich-san-xd').val();
     var namXayDung = $('#modal_dongiasobo .selectNamXayDung').val();
     var giaTriCTXD = (ketCauChinh*dienTichSanXD*namXayDung)/100;
     var tongGiaTriSoBo = parseInt(giaThiTruong) + parseInt(giaTriCTXD);
     
     
     $('#modal_ketqua_dongiasobo .giaTriDat').html(giaTriDat.toFixed(0).replace(/(\d)(?=(\d{3})+\b)/g, '$1,'));
     $('#modal_ketqua_dongiasobo .giaTriCTXD').html(giaTriCTXD.toFixed(0).replace(/(\d)(?=(\d{3})+\b)/g, '$1,'));
     $('#modal_ketqua_dongiasobo .tongGiaTriSoBo').html(tongGiaTriSoBo.toFixed(0).replace(/(\d)(?=(\d{3})+\b)/g, '$1,'));
     
     $('#modal_ketqua_dongiasobo').modal('show');
    });
    
    $('.selectCongTrinhXayDung').change(function(){
      var congTrinh = $(this).val();
      if(congTrinh){
        $('.selectKetCauChinh').removeAttr('disabled');
        $('.dien-tich-san-xd').removeAttr('disabled');
        $('.selectNamXayDung').removeAttr('disabled');        
        var options = '';
        if(congTrinh == 'nha_pho'){
          for(var i in ketCauChinhOptions){
            if(i < 5){
              options += '<option value="'+ketCauChinhOptions[i].price+'">'+ketCauChinhOptions[i].label+'</option>';
            }
          }
        }else if(congTrinh == 'biet_thu'){
          for(var i in ketCauChinhOptions){
            if(i >= 5){
              options += '<option value="'+ketCauChinhOptions[i].price+'">'+ketCauChinhOptions[i].label+'</option>';
            }
          }
        }
        $('.selectKetCauChinh').html(options);
      }else{
        $('.selectKetCauChinh').attr('disabled', 'true');
        $('.dien-tich-san-xd').attr('disabled', 'true');
        $('.selectNamXayDung').attr('disabled', 'true');
      }        
    });
  });
</script>