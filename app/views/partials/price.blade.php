<!-- Modal -->
<div id="modal_dongiathitruong" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Đơn giá đất</h4>
      </div>
      <div class="modal-body">
        <div class="address_row">
          <p><strong>Địa chỉ</strong></p>
          <p id="dgtt_popup_address">68 Hai Bà Trưng, P.Bến Nghé, Q.1, Tp.HCM</p>
        </div>
        <div class="clearfix">
          <div class="modal_half">
            <p><strong>Đơn giá đất thị trường đề xuất</strong><br>
              <span class="price"><span class="dongia_highlight_left"></span>(VNĐ/M<sup>2</sup>)</span></p>
          </div>
          <div class="modal_half">
            <p><strong>Đơn giá đất nhà nước</strong><br>
              <span class="price"><span class="dongia_highlight_right"></span>(VNĐ/M<sup>2</sup>)</span></p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <?php 
        /*
        <a href="#" class="show-price-temp-pop-up">
          <div class="btn btn_icon btn_gradient2" style="padding-right: 70px;">
            <i class="icon_phathanhchungthu"></i>
            <span>Định giá sơ bộ</span>
          </div>
        </a>
        <a id="btn_dinhgia" class="btn btn_dinhgia btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Thẩm Định giá</span></a>
         * 
         */?>
        <a class="grey-btn odd show-price-temp-pop-up"><img src="{{ URL::asset('default/images/w2.png') }}"> ĐỊNH GIÁ SƠ BỘ</a>
        <a id="btn_dinhgia" class="orange-btn odd btn_dinhgia" ><img src="{{ URL::asset('default/images/w3.png') }}"> THẨM ĐỊNH GIÁ</a>
      </div>
    </div>

  </div>
</div> <!-- end modal -->