
<div class="modal fade" id="modal_dangNhap" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bolder;">ĐĂNG NHẬP</h4>
      </div>
      <div class="modal-body">
        <div class="popup_button_group">
          <form class="form-horizontal login-form" role="form" method="post">
            <span class="the-error"></span>
            <div class="form-group">

              <div class="col-sm-12">
                <label  class="control-label">Tên đăng nhập(*):</label>
                <input type="text" class="form-control"  placeholder="Tên đăng nhập" name="email">
                <div class="help-block"></div>
              </div>
            </div>
            <div class="form-group">

              <div class="col-sm-12">
                <label class="control-label">Mật khẩu (*):</label>
                <input type="password" class="form-control"  placeholder="Mật khẩu"  name="password">
                <div class="help-block"></div>
              </div>
            </div>                                                                                                                                                                  
            <div class="form-group">
              <div class="col-sm-12">

                <div class="row">
                  <div class="col-sm-8">
                    <a class="btn btn-info btn-flat btn-login">Đăng nhập</a>                       
                    <a class="btn-forgot-password quenMatKhau" href="#">Quên mật khẩu ?</a>                        
                  </div>
                  <div class="col-sm-4 dn_dangky">
                    <a href="#"  class="btn btn-info dangKy2 dangKy-btn" data-toggle="modal" data-target="#modal_dangky">Đăng ký</a>
                  </div>

                </div>
                    <!--                                                                                                  <div class="" style="float: left;">
                    <button class="btn btn-info btn-flat">Đăng nhập</button>
                    <a class="btn-forgot-password quenMatKhau" href="#">Quên mật khẩu ?</a>
                    </div>
                    <div class="text-right dn_dangky">
                    <a href="#"  class="btn btn-info dangKy2 dangKy-btn" data-toggle="modal" data-target="#modal_dangky">Đăng ký</a>
                  </div>-->
                </div>
              </div>

            </form>	
          </div>
        </div>

      </div>

    </div>
  </div>