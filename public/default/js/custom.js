(function($, url) {

	function getStreet(id) {
		if(id) {
			$.ajax({
				url: url.district,
				type: 'post',
				data: {
					id:id
				},
				success: function(response) {
					var select = '';
					$.each(response, function(i,data) {
	                  select +='<option value="'+data.id+'">'+data.name+'</option>';
	                });
	                $('#district').html(select);
				}
			});
		}
	}
	$(document).ready(function() {
      
		$('#province').change(function() {
			var val = $(this).val();
			getStreet( val );
		});

		getStreet($('#province').val());
	});
    var timeOut;
    $('#google-map-autocomplete').keyup(function(e){
        var position = $(this).val();
        if (timeOut) {          
          clearTimeout(timeOut);
        }
        
        timeOut = setTimeout(function(){ 
//          var locationFromGoogle = $('.pac-container .pac-item').length;          
//          if(!locationFromGoogle){
            $.get(url.searchMarkers, {position:position}, function(data){
              $('.list-item-marker ul').html('');
              if(data.length){              
                for(var i in data){
                  if(data[i].id){
                    $('.list-item-marker ul').append('<li place-id="'+data[i].place_id+'" address="'+position+'" class="cursor"><i class="marker-icon"></i> '+data[i].name+' <div class="clear"></div></li>');
                  }
                }
                $('.list-item-marker').show();
              }else{              
                $('.list-item-marker').hide();
                $('.pac-container').show();
              }            
            });
//          }
          
        }, 600);
        
    });
    
    $(document).on('click', '.list-item-marker ul li', function(){
      var placeId = $(this).attr('place-id');
      var address = $(this).attr('address');      
      $('.google-map-search-form .place-id').val(placeId);
      $('.google-map-search-form .cen-address-text').val(address);
      $('.list-item-marker').hide();
    });
    
    
	$('#google-map-autocomplete').focus(function(e){
        $(this).val('');
    });
    
    $('.login-form .btn-login').click(function(){
      var ele = $(this);
      $.post(url.login, $('.login-form').serialize(), function(data){
        if(data.id){
          $('.menu_list').find('.login-menu-item:first').hide();
          $('.menu_list').find('.register-menu-item:first').hide();
          $('#modal_dangNhap').modal('hide');          
          if($('.vacant_land_form').prop('tagName') !== 'undefined'){
            var landType = ele.attr('land-type');
            $('.'+landType+'_btnsubmit').trigger('click');
          }
        }else{
          $('.login-form').find('.the-error:first').html(data);
        }
      })
    });
    
    $('.register-form .btn-register').click(function(){
      var ele = $(this);
      $.post(url.register, $('.register-form').serialize(), function(data){
        var errors = '';
        if(data.id){
//          $('.menu_list').find('.login-menu-item:first').hide();
//          $('.menu_list').find('.register-menu-item:first').hide();
//          $('#modal_dangky').modal('hide');      
//          if($('.vacant_land_form').prop('tagName') !== 'undefined'){
//            var landType = ele.attr('land-type');
//            $('.'+landType+'_btnsubmit').trigger('click');
//          }
          $('#modal_dangky .popup_button_group').html('<div class="alert alert-success">Cám ơn quý khách đã đăng ký tài khoản tại <a href="#">www.dinhgiatructuyen.vn</a>. Vui lòng kích hoạt tài khoản trước khi sử dụng dịch vụ.</div>');

        }else{          
          errors = '<ul>';
          for(var i in data){
            errors += '<li>'+data[i][0]+'</li>';
          }
          errors += '</ul>';
        }        
        $('.register-form').find('.the-error:first').html(errors);
      });
    });
    
})(jQuery, url);