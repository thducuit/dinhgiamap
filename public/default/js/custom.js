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
})(jQuery, url);