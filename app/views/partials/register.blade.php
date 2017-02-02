<!--                        modal dang ky-->
<div class="modal fade " id="modal_dangky" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bolder; color: #00929a;">ĐĂNG KÝ THÀNH VIÊN</h4>
      </div>
      <div class="modal-body">
       <div class="popup_button_group">
        <div class="form-group">
         <p style="font-weight: bolder; padding-left: 7px;">Mời quí vị đăng ký thành viên để được hưởng nhiều lợi ích và hổ trợ từ chúng tôi.</p>
       </div>

       <!--                                                                                             <form class="form-horizontal" id="form_dangky" role="form" action="" method="post">-->
       <form class="form-horizontal register-form" id="form_dangky" method="post" action="">
         <div class="the-error"></div>
         <div class="form-group">
          <label class="col-sm-4 control-label">Loại tài khoản (*):</label>
          <div class="col-sm-8">

            <label class="radio-inline">
              <input type="radio" name="taiKhoan" id="inlineRadio2" checked="true" value="1"> Môi giới/Cá nhân
            </label>
            <label class="radio-inline">
              <input type="radio" name="taiKhoan" id="inlineRadio2" value="0"> Công ty
            </label>

          </div>
        </div>
        <div class="form-group">
         <label  class="col-sm-4 control-label">Tên đăng nhập (*):</label>
         <div class="col-sm-8">
          <input type="text" class="form-control" id="danKy_email" name="email"  placeholder="Email đăng nhập">
          <div class="help-block"></div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 control-label">Mật khẩu (*):</label>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="danKy_MatKhau" name="password"  placeholder="Mật khẩu">
          <div class="help-block"></div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 control-label">Gõ lại mật khẩu (*):</label>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="danKy_ReMatKhau" name="password_confirmation"  placeholder="Gõ lại mật khẩu">
          <div class="help-block"></div>
        </div>
      </div>
      <div class="form-group">
        <label  class="col-sm-4 control-label">Họ & Tên (*):</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="dangKy_ht" name="name"  placeholder="Họ & Tên">
          <div class="help-block"></div>
        </div>
      </div>                                                                                            
      <div class="form-group">
        <label  class="col-sm-4 control-label">Điện thoại (*):</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="dangKy_dienthoai" name="mobile">
          <div class="help-block"></div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 control-label">Địa chỉ:</label>
        <div class="col-sm-8">
         <input type="text" class="form-control" id="dangKy_diaChi" name="address"  placeholder="Địa chỉ">

       </div>
     </div>
     <div class="form-group">
      <label  class="col-sm-4 control-label">Giới tính:</label>
      <div class="col-sm-8">
        <label class="radio-inline">
          <input type="radio" name="gender" checked="true" id="inlineRadio1" value="1"> Nam
        </label>
        <label class="radio-inline">
          <input type="radio" name="gender" id="inlineRadio2" value="0"> Nữ
        </label>

      </div>
    </div>
    <div class="form-group tab_body ngay-sinh-box">
      <label  class="col-sm-4 control-label">Ngày sinh:</label>
      <div class="col-sm-8 form_row">    
        <div class="form_col">
          <select name="d_ngaySinh">
            <option value="">Ngày</option>
            <?php 
            for($i = 1; $i <= 31; $i++){
              ?>
              <option value="<?php echo $i?>"><?php echo $i?></option>
              <?php
            }
            ?>
          </select>
        </div>
        <div class="form_col">
          <select name="m_ngaySinh">
            <option value="">Tháng</option>
            <?php 
            for($i = 1; $i <= 12; $i++){
              ?>
              <option value="<?php echo $i?>"><?php echo $i?></option>
              <?php
            }
            ?>
          </select>
        </div>
        <div class="form_col">
          <select name="y_ngaySinh">
            <option value="">Năm</option>
            <?php 
            for($i = 1916; $i <= 1998; $i++){
              ?>
              <option value="<?php echo $i?>"><?php echo $i?></option>
              <?php
            }
            ?>
          </select>
        </div>
<!--                                                                                                <div class="input-group">                                                                                                      
                      <div class="input-group date" id="datetimepicker_ngaysinh">
                          <input class="form-control" type="text" id="d_ngaySinh" name="d_ngaySinh">
                                  <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                          </div>                                                                                                        
                        </div>                                                                                                         -->
                      </div>
                    </div>                                                                                            
<!--                    <div class="form-group">
                      <label  class="col-sm-3 control-label">Mã xác nhận:</label>
                      <div class="col-sm-9">
                        <div class="row">
                          <div class="col-xs-5 text-left" >
                           <input type="text" class="form-control" id="danKy_captcha" name="danKy_captcha"  name="capChar"  >
                           <div class="help-block"></div>
                         </div>
                         <div class="col-xs-7 text-left">
                          <img src="{{ URL::asset('default/images/capchar.png') }}">
                          <img src="{{ URL::asset('default/images/refesh.gif') }}">
                        </div>

                      </div>

                    </div>
                  </div>-->
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="danKy_DongY" id="danKy_DongY" value="1"> Tôi đồng ý với qui định của <a href="{{ URL::to('/dieu-khoan.html') }}" target="_blank"><span style="font-weight: bold;">ĐỊNH GIÁ TRỰC TUYẾN</span></a> 

                        </label>
                      </div>
                      <span style="padding-left: 21px;">
                        hoặc vui lòng xem thêm<a href="#"><span> Chính sách sử dụng</span></a>
                      </span>
                      <div class="help-block dk_agree" style="color: #a94442;"></div>
<!--                                                                                                 <div class="checkbox">
                    <label>
                         Tôi đồng ý với qui định của <span style="font-weight: bold;">ĐỊNH GIÁ TRỰC TUYẾN</span> hoặc.
                       
                    </label>
                  </div>  -->
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">                  
                  <a class="btn btn-danger btn-flat btn-register">Đăng ký</a>                       
                </div>
              </div>
            </form>	
          </div>
        </div>

      </div>

    </div>
  </div>
<!-- end modal dang ky-->