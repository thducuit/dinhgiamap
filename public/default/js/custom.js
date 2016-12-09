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

	$('#google-map-autocomplete').focus(function(e){
        $(this).val('');
    });
    
    $('.login-form .btn-login').click(function(){
      $.post(url.login, $('.login-form').serialize(), function(data){
        if(data == 'success'){
          $('.menu_list').find('.login-menu-item:first').hide();
          $('.menu_list').find('.register-menu-item:first').hide();
          $('#modal_dangNhap').modal('hide');
        }else{
          $('.login-form').find('.the-error:first').html(data);
        }
      })
    });
    
    
})(jQuery, url);