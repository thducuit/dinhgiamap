(function($, url) {
    'use strict';
    
    var buildOptionDistrict = function (callback) {
        var val = $('.province_id').val();
        $.ajax({
            url: url.district,
            type: 'post',
            data: {id:val},
            success: function(response) {
                var select = '<option value="">Quận/Huyện</option>';
                var district_id = $('#district_id').val();
                $.each(response, function(i,data)
                {
                  var selected = data.id === parseInt(district_id) ? 'selected' : ''
                  select +='<option '+selected+' value="'+data.id+'">'+data.name+'</option>';
                });
                $('.district_id').html(select);
                if(callback) {
                    callback();
                }
            }
        });
    }
    
    var buildOptionWard = function (callback) {
        var val = $('.district_id').val();
        $.ajax({
            url: url.ward,
            type: 'post',
            data: {id:val},
            success: function(response) {
                var select = '<option value="">Phường/Xã</option>';
                var ward_id = $('#ward_id').val();
                $.each(response, function(i,data)
                {
                  var selected = data.id === parseInt(ward_id) ? 'selected' : ''
                  select +='<option '+selected+' value="'+data.id+'">'+data.name+'</option>';
                });
                $('.ward_id').html(select);
                if(callback) {
                    callback();
                }
            }
        });
    }
    
    function init() {
        buildOptionDistrict(buildOptionWard);
    }
    
    $(document).ready(function(){
        $('.province_id').change(function() {
           
            buildOptionDistrict(buildOptionWard);
        });
        
        $('.district_id').change(function() {
            buildOptionWard();
        });
    });
    
    init();
})(jQuery, url);