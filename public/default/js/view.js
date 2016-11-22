(function($, google) {
    'use strict';
    
    $(document).ready(function() {

        var isAutoComplete = false;
        var geocoder = new google.maps.Geocoder();

        var mapsProperties = {
    		center: new google.maps.LatLng(10.762622, 106.660172), //HCM city
    		zoom: 16,
    		mapTypeId: google.maps.MapTypeId.ROADMAP
    	};

    	var mapObject = new google.maps.Map(document.getElementById('map_view'), mapsProperties);
    	
    	var autocomplete = new google.maps.places.Autocomplete(document.getElementById('google-map-autocomplete'));
    	autocomplete.bindTo('bounds', mapObject);
    	
    	autocomplete.addListener('place_changed', function() {
    	    var place = autocomplete.getPlace();
    	    mapObject.setCenter(place.geometry.location);
    	    $('#placeId').val(place.place_id);
            isAutoComplete = true;
    	});

        $('.input_submit').click(function(event) {
            event.stopPropagation();
            if(isAutoComplete) {
                return true;
            }else {
                var address = $('.cen-address-text').val();
                if(address) {
                    getAddress('address', address, function(result) {
                        if(result && $.isArray(result) && result.length ) {
                            var obj = result[0];
                            $('.cen-address-text').val(obj.formatted_address);
                            $('#placeId').val(obj.place_id);
                            $('.google-map-search-form').submit();
                        }
                    });
                }
                return false;
            }
        });

        $('.cen-address-text').change(function() {
            isAutoComplete = false;
        });


        function getAddress(type, value, callback) {
            var request = {};
            request[type] = value;
            if (geocoder) {
                geocoder.geocode(request, function(result) {
                    if (result && $.isArray(result) && result.length) {
                        if (callback && $.isFunction(callback)) {
                            callback(result);
                        }
                    }
                });
            }
        }
    	
    });
})(jQuery, google);