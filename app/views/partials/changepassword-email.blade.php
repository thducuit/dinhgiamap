<!--doi mat khau tu email-->
<div class="modal fade" id="modal_MXNhanTuEmail" role="dialog">
  <div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-body">
       <div class="popup_button_group form-horizontal">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <form class="form-horizontal" role="form">

         <div class="form-group">
           <div class="col-sm-10 col-sm-offset-1">
             <h4 class="modal-title" style="font-weight: bolder;">ĐỔI MẬT KHẨU</h4>



           </div>
         </div>
         <div class="form-group">
           <div class="col-sm-10 col-sm-offset-1">

             <label>Mã xác nhận đã được gửi tới Email quý khách. Vui lòng nhập mã xác nhận và mật khẩu mới.</label><br>

           </div>
         </div>
         <div class="form-group">

          <div class="col-sm-10 col-sm-offset-1">
            <label class="control-label">Mã xác nhận</label>

            <input type="text" class="form-control"  placeholder="Mã xác nhận">
          </div>
        </div>   
        <div class="form-group">

          <div class="col-sm-10 col-sm-offset-1">
            <label class="control-label">Mật khẩu mới</label>

            <input type="password" class="form-control"  placeholder="Mật khẩu mới">
          </div>
        </div> 
        <div class="form-group">

          <div class="col-sm-10 col-sm-offset-1">
            <label class="control-label">Xác nhận mật khẩu mới</label>

            <input type="password" class="form-control"  placeholder="Nhập lại mật khẩu mới.">
          </div>
        </div> 
        <div class="form-group">

          <div class="col-sm-10 col-sm-offset-1">
            <label class="control-label">Captcha.</label>
            <div class="row">
              <div class="col-sm-4"><a href="#"><img src="{{ URL::asset('default/images/capchar.png') }}" ></a></div>
              <div class="col-sm-8"><a href="#"><input type="text" class="form-control"  placeholder="Xác nhận mã"></a></div>

            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-1 col-sm-10">
            <div class="">
              <button class="btn btn-danger btn-flat " id="capLaiMatKhau" style="width: 100%;">Tạo mật khẩu mới</button>

            </div>

          </div>   
        </div>

      </form>

    </div>


  </div>
</div>

</div>

</div>  
<!--end doi mat khau tu Email-->