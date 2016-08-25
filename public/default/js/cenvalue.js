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
	
});



zjs.onready('image.slider.theme.linear, ui.tabpanel', function(){});