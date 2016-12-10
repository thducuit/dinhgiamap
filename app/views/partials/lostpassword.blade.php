<!--                                        quên mật khẩu-->
<div class="modal fade" id="modal_quenMatKhau" role="dialog">
  <div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
       <div class="popup_button_group form-horizontal">
         
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <!--                                                                                   <form class="form-horizontal" role="form">-->
        <form class="form-horizontal" id="form_quenMatKhau" role="form">    
         <div class="form-group">
           <div class="col-sm-10 col-sm-offset-1">
             <h4 class="modal-title" style="font-weight: bolder;">QUÊN MẬT KHẨU TÀI KHOẢN.</h4>
             
             
             
           </div>
         </div>
         <div class="form-group">
           <div class="col-sm-10 col-sm-offset-1">
            
             <label>Để lấy lại mật khẩu bạn vui lòng nhập địa chỉ Email hoặc số điện thoại của mình vào đây.</label><br>
             
           </div>
         </div>
         <div class="form-group">
           
          <div class="col-sm-10 col-sm-offset-1">
            <label class="control-label">Email hoặc số điện thoại.</label>
            
            <input type="text" class="form-control"  id="quenMatKhau_email" name="quenMatKhau_email" placeholder="Email hoặc số điện thoại">
            <div class="help-block"></div>
          </div>
        </div> 
        <div class="form-group">
         
          <div class="col-sm-10 col-sm-offset-1">
            <label class="control-label">Captcha.</label>
            <div class="row">
              <div class="col-sm-4"><a href="#"><img src="{{ URL::asset('default/images/capchar.png') }}" ></a></div>
              <div class="col-sm-8"><a href="#">
                
                <input type="text" class="form-control" id="quenMatKhau_captCha" name="quenMatKhau_captCha" placeholder="Xác nhận mã"></a></div>
                <div class="help-block"></div>
              </div>
            </div>
          </div>  
          <div class="form-group">
            <div class="col-sm-offset-1 col-sm-10">
              <div class="">
                <button class="btn btn-danger btn-flat " id="capLaiMatKhau" style="width: 100%;">Cấp lại mật khẩu</button>
                
              </div>
              
            </div>   
          </div>
          
        </form>

      </div>
      
      
    </div>
  </div>
  
</div>

</div>  

<!--                                        end quen mat khẩu-->