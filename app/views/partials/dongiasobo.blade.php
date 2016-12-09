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
                  <select name="year_building" disabled="">
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
<script>
  jQuery(document).ready(function() {
    var vitriOptions = [];
    var hinhDangThuaDatOptions = [];
    var chieuNgangOptions = [];
    var dienTichDatOptions = [];
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
      var viTri = $('#modal_dongiasobo .inputViTri').val();
      var hinhDangThuaDat = $('#modal_dongiasobo .inputHinhDangThuaDat').val();
      var chieuNgang = $('#modal_dongiasobo .inputChieuNgang').val();
      var dienTichDat = $('#modal_dongiasobo .inputDienTichDat').val();      
      var giaThiTruong = $('#modal_dongiasobo .giaThiTruong').val();
      giaThiTruong = giaThiTruong.replace(/\,/gm, '');      
      var giaTriDat = parseInt(giaThiTruong) + parseInt(giaThiTruong)*(parseInt(viTri) + parseInt(hinhDangThuaDat) + parseInt(chieuNgang) + parseInt(dienTichDat))/100;      
      console.log(giaTriDat);
    });
  });
</script>