<div id="modal_info" class="modal fade modal_popup" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <a href="#" class="close-btn" data-dismiss="modal"></a>
            <div class="page_03 text-center">
                <div class="head-top">
                    <strong><img class="modal_info__marker" src="{{ URL::asset('default/images/map.png') }}" > 
                      <div class="pp_address">
                        <p>Địa chỉ : 27 Phó Đức Chính, P.Nguyễn Thái Bình, Q.1, TPHCM</p>
                      </div>
                    </strong>
                </div>
                <div class="btn-list">
                    <div class="col col-md-6 col-sm-12 col-xs-12">
                        <a id="show-price-pop-up" href="#" class="orange-btn even"><img src="{{ URL::asset('default/images/w1.png') }}"> XEM ĐƠN GIÁ ĐẤT</a>
                        <a class="orange-btn odd btn_dinhgia" ><img src="{{ URL::asset('default/images/w3.png') }}"> THẨM ĐỊNH GIÁ</a>
                        <a href="" class="orange-btn even"><img src="{{ URL::asset('default/images/w5.png') }}"> XEM QUY HOẠCH</a>
                    </div>
                    <div class="col col-md-6 col-sm-12 col-xs-12">
                        <a class="emeral-btn odd show-price-temp-pop-up"><img src="{{ URL::asset('default/images/w2.png') }}"> ĐỊNH GIÁ SƠ BỘ</a>
                        <a class="emeral-btn even" href="{{ URL::to('/tai-san-dang-giao-dich.html') }}"><img src="{{ URL::asset('default/images/w4.png') }}"> TÀI SẢN ĐANG GIAO DỊCH</a>
                        <a href="{{ URL::to('/xem-quy-hoach.html') }}" class="emeral-btn odd"><img src="{{ URL::asset('default/images/w6.png') }}"> ĐỊNH GIÁ DỰ ÁN </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /*
<div id="modal_info" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width: 480px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>

				<div class="pp_address">
					<p>Địa chỉ : 27 Phó Đức Chính, P.Nguyễn Thái Bình, Q.1, TPHCM</p>
				</div>
			</div>
			<div class="modal-body">
				<div class="popup_button_group text-center">
					<div class="row">
						<div class="col-sm-12">
							<div class="infortrai">
								<a href="#" id="show-price-pop-up">
									<div class="btn btn_icon btn_gradient1" style="padding-right: 50px;">
										<i class="icon_xemdongia"></i>
										<span>Xem đơn giá đất </span>
									</div></a>

									<a href="#" class="show-price-temp-pop-up">
										<div class="btn btn_icon btn_gradient2" style="padding-right: 70px;">
											<i class="icon_phathanhchungthu"></i>
											<span>Định giá sơ bộ</span>
										</div>
									</a>
								</div>
								<div class="inforphai">
									<a class="btn_dinhgia" href="#">
										<div class="btn btn_icon btn_gradient3" style="padding-right: 50px;">
											<i class="icon_dinhgia"></i><span>Thẩm Định giá </span>
										</div>
									</a>

									<a href="{{ URL::to('/tai-san-dang-giao-dich.html') }}" class="btn-tai-san-giao-dich"><div id="btn_xemquihoach" class="btn btn_icon btn_gradient4"><i class="icon_xemquihoach"></i><span>Tài sản đang giao dịch</span></div></a>
								</div>

							</div> 

						</div>
					</div>
				</div>

			</div>

		</div>
			</div>
 * 
 */?>