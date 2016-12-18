$( document ).ready(function() {
    
	var Window = $(window);
	var Body = $(document.body);
	
		
	/* ========================== *\
		XU LY RESPONSIVE
	\* ========================== */
	
	Window.on('resize', function(){
		$('.screen').height(Window.height()-$('#footer').height());
		$('.minscreen').css('min-height', (Window.height()-$('#footer').height()-60));
		$('.page_xemquihoach_left').height(Window.height());
		$('.page_contact_left').height(Window.height());
		$('#navigation').height(Window.height()-$('#header .header_show').height());
		$('.page_xemquihoach_right').width(Window.width()-$('.page_xemquihoach_left').width());
		$('.page_contact_right').width(Window.width()-$('.page_contact_left').width());
		$('.page_thanhtoan_right').width(Window.width()-$('.page_thanhtoan_left').width());
	}).trigger('resize');
	
	$('#menu_button').click(function(){
		$('body').toggleClass('menu_mobile_active');
	});
	
	
	$('body').addClass('ready');
	
	$('#list_faq [data-accordion]').accordion();
	$('#list_hinhthucthanhtoan [data-accordion]').accordion();
	$('#list_loaitaisan_dinhgia [data-accordion]').accordion();
	
	$('#show_ketquadinhgia_popup_note').click(function(){
		$('.ketquadinhgia_popup_note').addClass('show');
	});
	$('.ketquadinhgia_popup_note .btn_close').click(function(){
		$('.ketquadinhgia_popup_note').removeClass('show');
	});
	
    $('input[type=radio][name=hinhthucthanhtoan]').change(function() {
        var data_method = $(this).attr('data-method');
		$('.expand_group').removeClass('active');
		$('.expand_group[data-method="'+data_method+'"]').addClass('active');
    });
	
});



zjs.onready('image.slider.theme.linear, ui.tabpanel, ui.popup', function(){
	
	zjs('#btn_xemquihoach').click(function(){zjs('#popup_xemquihoach').popupShow()});
	
});



                     $(document).ready(function () {
                         $(this).keydown(function(event) {
                                    if (event.which == 27) { // 27 is 'Ecs' in the keyboard
                                            disablePopup();  // function close pop up
                                            
                                    }
                            });
//                            $('#datetimepicker_ngaybatdau').datetimepicker({
//				'sideBySide':true,
//			});
//			$('#datetimepicker_ngayketthuc').datetimepicker({
//				'sideBySide':true,
//			});
//                        $('#datetimepicker_ngaysinh').datetimepicker({
//				'sideBySide':true,
//			});
                            
                            function disablePopup() {
                                           $('#modal_dangNhap').modal('hide');
                                           $('#modal_dangky').modal('hide');
                                           
                                    }
                                    var dangKy = {
                                        danKy_email:"Email không được để trống và nhập đúng định dạng.", 
                                        danKy_MatKhau:"Mật khẩu không được để trống và tối thiểu 8 ký tự.",
                                        danKy_ReMatKhau:"Mật khẩu không đồng nhất.",
                                        dangKy_ht:"Họ tên không được để trống.",
                                        dangKy_dienthoai:"Số điện thoại không được để trống và nhập đúng định dạng.",
                                        danKy_captcha:"Xác nhận mã.",
                                        danKy_DongY:"Bạn chưa đồng ý.",
                                        //quen mat khau
                                        quenMatKhau_captCha:"Xác nhận mã.",
                                        quenMatKhau_email:"Kiểm tra lại thông tin.",
                                        
                                    };
                                    function KTEmail(input)
                                    {
                                        var re=/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{1,}$/;
                                                       var is_email=re.test(input.val());                
                                                      if(is_email){

                                                          input.parents(".form-group").removeClass("has-error");
                                                          input.parents(".form-group").addClass("has-success");
                                                          input.next().text('');
                                                         }
                                                   else{
                                                       input.parents(".form-group").removeClass("has-success");
                                                       input.parents(".form-group").addClass("has-error");

                                                       input.next().text(dangKy["danKy_email"]);  

                                                        }
                                    }
                                    function KTDienThoai(input)
                                    {
                                         var re=/^([0-9]{10,11})$/ ;
                                                  var is_name=re.test(input.val());		

                                                 if(is_name){

                                                     input.parents(".form-group").removeClass("has-error");
                                                     input.parents(".form-group").addClass("has-success");
                                                     input.next().text('');
                                                    }
                                              else{
                                                  input.parents(".form-group").removeClass("has-success");
                                                  input.parents(".form-group").addClass("has-error");
                                                  input.next().text(dangKy["dangKy_dienthoai"]);        
                                                   }
                                    }
                                    $('#danKy_email').focusout(function (){
                                        var input=$(this);
                                        KTEmail(input);

                                    });
                                    $('#danKy_MatKhau').focusout(function (){
                                        var input=$(this);
                                        var re=/^(.{8,})$/ ;
                                         var is_password=re.test(input.val());
                                      if(is_password){
                                          
                                           input.parents(".form-group").removeClass("has-error");
                                           input.parents(".form-group").addClass("has-success");
                                           input.next().text('');
                                          }
                                    else{
                                        input.parents(".form-group").removeClass("has-success");
                                        input.parents(".form-group").addClass("has-error");
                                        input.next().text(dangKy["danKy_MatKhau"]);           
                                         }
                                      
                                    });
                                    $('#danKy_ReMatKhau').focusout(function (){
                                        var input=$(this);
                                        var re=$('#danKy_MatKhau').val() ;
                                        var is_name=(input.val()==re)?true:false;	
                                      if(is_name){
                                          
                                           input.parents(".form-group").removeClass("has-error");
                                           input.parents(".form-group").addClass("has-success");
                                           input.next().text('');
                                          }
                                    else{
                                        input.parents(".form-group").removeClass("has-success");
                                        input.parents(".form-group").addClass("has-error");
                                        input.next().text(dangKy["danKy_ReMatKhau"]);           
                                         }
                                      
                                    });
                                     $('#dangKy_ht').keyup(function (){
                                        var input=$(this);
                                        var is_name=($.trim(input.val())!="")?true:false;		
                                      
                                      if(is_name){
                                          
                                           input.parents(".form-group").removeClass("has-error");
                                           input.parents(".form-group").addClass("has-success");
                                           input.next().text('');
                                          }
                                    else{
                                        input.parents(".form-group").removeClass("has-success");
                                        input.parents(".form-group").addClass("has-error");
                                        input.next().text(dangKy["dangKy_ht"]);         
                                         }
                                    });
                                    $('#dangKy_dienthoai').keyup(function (){
                                        var input=$(this);
                                        KTDienThoai(input);
                                    });
                                    
                                 $('#danKy_captcha').keyup(function (){
                                    var input=$(this);
                                    var is_captcha=($.trim(input.val())!="")?true:false;		

                                    if(is_captcha){
                                          
                                           input.parents(".form-group").removeClass("has-error");
                                           input.parents(".form-group").addClass("has-success");
                                           input.next().text('');
                                          }
                                    else{
                                        input.parents(".form-group").removeClass("has-success");
                                        input.parents(".form-group").addClass("has-error");
                                        input.next().text(dangKy["danKy_captcha"]);         
                                         }
                                });
                                $('#quenMatKhau_captCha').keyup(function (){
                                    var input=$(this);
                                    var is_captcha=($.trim(input.val())!="")?true:false;		

                                    if(is_captcha){
                                          
                                           input.parents(".form-group").removeClass("has-error");
                                           input.parents(".form-group").addClass("has-success");
                                           input.next().text('');
                                          }
                                    else{
                                        input.parents(".form-group").removeClass("has-success");
                                        input.parents(".form-group").addClass("has-error");
                                        input.next().text(dangKy["danKy_captcha"]);         
                                         }
                                });
//                                     
                                    $('#danKy_DongY').click(function (){
                                                        //alert('ok');

                                               var input=$(this);
                                              if(input.is(':checked')) {
//                                               $("input:checkbox").attr('checked', true);
                                                input.parents(".form-group").removeClass("has-error").addClass("has-success");
                                                 
                                                  $('.dk_agree').text('');

                                           } else {
//                                               $("input:checkbox").attr('checked', false);
                                                input.parents(".form-group").removeClass("has-success").addClass("has-error");
                                                    
                                                    $('.dk_agree').text(dangKy["danKy_DongY"]);
                                                   }
                                                     });
                                
                                     $('#form_dangky').on('click', 'button[id="register"]', function (event) {
                                         
                                            
//                                            disablePopup();
//                                            $("#modal_KichHoatTaiKhoan").modal('show');
                                            
                                            var form_data=$("#form_dangky").serializeArray();
                                                var error_free=true;
                                                for (var input in form_data){
                                                    
                                                     if(form_data[input]['name']!="taiKhoan" && form_data[input]['name']!="dangKy_diaChi")
                                                     {
//                                                        var element=$("#lienhe_"+form_data[input]['name']);
                                                        var dak=form_data[input]['name'];
                                                         
                                                        var element=$("#"+dak);
                                                         
                                                        var valid=element.parents(".form-group").hasClass('has-success');
                                                        if(!valid)
                                                        {
                                                           
                                                            for (var item in dangKy) {
                                                                
                                                                if(item==dak)
                                                                {
                                                                     
                                                                  element.parents(".form-group").removeClass("has-success");                                                                  
                                                                    element.parents(".form-group").addClass("has-error");
                                                                  
                                                                    element.next().text(dangKy[item]);    
                                                                    error_free=false;
                                                                }
                                                            }
    
                                                         }
                                                        }
                                                        
//                                                      
                                                     }
                                                      if (!$('#danKy_DongY').parents(".form-group").hasClass('has-success')){                            
                                                    //alert('Yêu cầu đồng ý với thông tin đăng ký');
                                                        $('.dk_agree').text(dangKy["danKy_DongY"]);
                                                         error_free=false;
                                                         event.preventDefault();


                                                             }
                                                
                                              if (!error_free){
                                                        
                                                        event.preventDefault(); 
                                                         return false;
                                                }else{
                                                    disablePopup();
                                                   $("#modal_KichHoatTaiKhoan").modal('show');
                                                }
                                           // alert('ok');
                                            return false;
                                     });
                                     
                                     $('#form_ChonKichHoat').on('click', 'button[id="KichHoatTK"]', function () {
                                         
                                         
                                         var KichHoat=$('input[name=KHoat]:checked', '#form_ChonKichHoat').val();
                                           if(KichHoat==0)
                                              {
                                                   $("#modal_KichHoatTaiKhoan").modal('hide');
                                                   $("#modal_ThongBaoKHQEmail").modal('show');
                                              }else{
                                                  $("#modal_KichHoatTaiKhoan").modal('hide');
                                                    $("#modal_maXacNhan").modal('show');
                                              }
                                        
                                         return false;
                                     });
                                     var KTFQuenMK=true;
                                     $('#quenMatKhau_email').keyup(function (){
                                        var input=$(this);
                                        
                                         if($.isNumeric( input.val())){
                                                        
                                                         KTFQuenMK=false;
                                                       KTDienThoai(input);                                    
                                         }else
                                             {       
                                                     KTFQuenMK=true;
                                                     KTEmail(input); 
                                             }
                                    });
                                     $('#form_quenMatKhau').on('click', 'button[id="capLaiMatKhau"]', function (event) {
                                         
                                            var form_data=$("#form_quenMatKhau").serializeArray();
                                                var error_free=true;
                                                for (var input in form_data){
                                                    
                                                     
//                                                        var element=$("#lienhe_"+form_data[input]['name']);
                                                        var dak=form_data[input]['name'];
                                                         
                                                        var element=$("#"+dak);
                                                         
                                                        var valid=element.parents(".form-group").hasClass('has-success');
                                                        if(!valid)
                                                        {
                                                           
                                                            for (var item in dangKy) {
                                                                
                                                                if(item==dak)
                                                                {
                                                                     
                                                                  element.parents(".form-group").removeClass("has-success");                                                                  
                                                                    element.parents(".form-group").addClass("has-error");
                                                                  
                                                                    element.next().text(dangKy[item]);    
                                                                    error_free=false;
                                                                }
                                                            }
    
                                                         }
                                                        
                                                        
//                                                      
                                                     }
                                                     if (!error_free){
                                                        //alert("ok");
                                                        event.preventDefault(); 
                                                         return false;
                                                         }else{
                                                             
                                                             disablePopup();
                                                            if(KTFQuenMK)
                                                               {
                                                                    $("#modal_quenMatKhau").modal('hide');
                                                                     $("#modal_RePassEmail").modal('show');
                                                               }
                                                               else{
                                                                    $("#modal_quenMatKhau").modal('hide');
                                                                   $("#modal_doiMatKhauMobile").modal('show');
                                                               }
                                                         }
                                             
                                              
                                            return false;
                                     });
                                     
                                     
                                     $('#form_xacNhanOTP').on('click', 'button[id="xacNhanOTP"]', function () {
                                            disablePopup();
                                             $("#modal_maXacNhan").modal('hide');
                                            $("#modal_dangKyThanhCong").modal('show');
                                           
                                            return false;
                                     });
                                     $('.quenMatKhau').click(function () {
//                                         
                                             disablePopup();
                                              $("#modal_quenMatKhau").modal('show');
//                                               $("#modal_RePassEmail").modal('show');
                                            return false;
                                     });
                                     
                                     $("#CapMatKhauQuaMail").click(function (){
                                          disablePopup();
                                              $("#modal_quenMatKhau").modal('hide');
                                              $("#modal_doiMatKhauMobile").modal('hide');
                                               $("#modal_MXNhanTuEmail").modal('show');
                                     });
                              
                         
                         
	
//                       var formClass = '';
//
//		getOptions(jQuery('#structure_parent').val());
//		jQuery('#structure_parent').change(function() {
//			var _this = jQuery(this);
//			var val = _this.val();
//	        getOptions(val);
//		});

		jQuery('.modal-body #btn_dinhgia').click(function(e) {
			e.preventDefault();
			jQuery('#modal_alert').modal('toggle');
			formClass = jQuery(this).attr('data');
//                        alert('ok');
		});

//		jQuery('.clogin').click(function(e) {
//			e.preventDefault();
//			jQuery('.chooser').val('login');
//			$(formClass).submit();
//		});
//
//		jQuery('.cnologin').click(function(e) {
//			e.preventDefault();
//			jQuery('.chooser').val('nologin');
//			$(formClass).submit();
//		});
//
		jQuery('#modal_dinhgia').modal('show');  
                
                
                
                     });
    
 
       