(function($) {
    'use strict';
    
    function confirm() {
        $('*[data-confirm]').click(function(e) {
            e.preventDefault();
            var message = $(this).attr('data-confirm');
            var url = $(this).attr('href');
            if( bootbox ) {
                bootbox.confirm(message, function(result) {
                  if( result ) {
                      window.location = url;
                  }
                });
            }
        });
    }
    
    
    
    
    $(document).ready(function() {
        confirm();
    });
})(jQuery);