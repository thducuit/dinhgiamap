(function($, google) {
    'use strict';
    
    $(document).ready(function() {
        
        var polyline = [];
        
        var mapsProperties = {
    		center: new google.maps.LatLng(10.762622, 106.660172), //HCM city
    		zoom: 16,
    		mapTypeId: google.maps.MapTypeId.ROADMAP
    	};

    	var mapObject = new google.maps.Map(document.getElementById('map_view'), mapsProperties);
    	
    	var autocomplete = new google.maps.places.Autocomplete(document.getElementById('google-map-autocomplete'));
    	autocomplete.bindTo('bounds', mapObject);
    	
    	var getAddressCallback = function(object) {
    	    if(object) {$.ajax({
                    url: '/public/markers',
                    type: 'POST',
                    data: {placeId: object.place_id},
                    success: function(response) {
                        var data = response.data;
                        removeLine();
                        drawLine(data);
                        mapObject.setZoom(18);
                    }   
                });
    	    }
    	};
    	
    	var geocoder = new google.maps.Geocoder();
    	
    	
    	autocomplete.addListener('place_changed', function() {
    	    var place = autocomplete.getPlace();
    	    mapObject.setCenter(place.geometry.location);
    	    getAddress('latLng', place.geometry.location, getAddressCallback);
    	});
    	
    	function removeLine() {
    	    if(polyline && polyline.length) {
    	        polyline.forEach(function(p) {
    	           p.setMap(null); 
    	        });
    	    }
    	}
    	
    	function drawLine(list) {
    	    polyline = [];
    	    list.forEach(function(item) {
    	        var polylineObject = new google.maps.Polyline({
                    path: [
                        new google.maps.LatLng(item.start_lat, item.start_lng),
                        new google.maps.LatLng(item.end_lat, item.end_lng)
                    ],
                    strokeColor: 'red',
                    strokeOpacity: 1,
                    strokeHeight: 5
                });
                polylineObject.setMap(mapObject);
                
                polyline.push(polylineObject);
    	    });
    	}
    	
    	function getAddress(type, value, callback) {
            var request = {};
            request[type] = value;
            if(geocoder) {
                geocoder.geocode(request, function(result) {
                    if(result && $.isArray(result) && result.length) {
                        var object = result[0];
                        console.log(object);
                        if(callback && $.isFunction(callback)) {
                            callback(object);
                        }
                    }
                });
            }
        }
    	
    });
})(jQuery, google);