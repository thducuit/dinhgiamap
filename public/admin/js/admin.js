(function($, CKEDITOR) {
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

    function disableOption() {
        $('*[data-option-disable]').each(function() {
            var ids = $(this).attr('data-option-disable');
            ids = $.map(ids.split(','), function(value){
                        return parseInt(value, 10);
                    });
            $(this).find('option').each(function() {
                //console.log( $(this).val() );
                var option_val = parseInt( $(this).val() );
                if(ids.indexOf(option_val) !== -1) {
                    $(this).attr('disabled', 'true');
                }
            });
        });
    }
    
    
    function initEditor()  {
        //CK EDITOR
        $('*[data-editor]').each(function() {
            var id = $(this).attr('data-editor');
            CKEDITOR.replace( id );
        });
    }

    function openUploadDialog(htmlGallery) {
        var html = '';
        window.KCFinder = {
            callBackMultiple: function(files) {
                //window.KCFinder = null;
                html = "<li class='list-group-item'>" +
                
                            "<img width='200' src='" + files[0] + "' />" +
                            "<input type='hidden' name='file[]' value='" + files[0] + "' />" +
                        
                            "<a  class='btn btn-danger remove pull-right'><i class='glyphicon glyphicon-remove'></i></a>" +
                        
                        "</li>";
                htmlGallery.append(html);
            }
        };
        window.open('/public/admin/js/kcfinder/browse.php?type=files&dir=files/public',
            'kcfinder_multiple', 'status=0, toolbar=0, location=0, menubar=0, ' +
            'directories=0, resizable=1, scrollbars=0, width=800, height=600'
        );
    }

    function uploadPhoto() {
        $('*[data-upload]').click(function() {
            var htmlGalleryID = $(this).attr('data-upload');
            openUploadDialog($(htmlGalleryID));
        });
    }

    function removePhoto() {
        $(document).on('click', '.upload-group .remove', function(e) {
            e.preventDefault();
            $(this).parent().remove();
        })
    }
    
    $(document).ready(function() {
        confirm();

        uploadPhoto();

        removePhoto();

        disableOption();
    });

    $( window ).load(function() {
      initEditor();
    });
})(jQuery, CKEDITOR);