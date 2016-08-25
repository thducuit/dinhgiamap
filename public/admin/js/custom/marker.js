(function($, google) {
    'use strict';
    
    $(document).ready(function() {
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
              event.preventDefault();
              return false;
            }
          });
          
          
        
        
        var getAddressCallback = function(object) {
            console.log(object);
            if(object) {
                $('#google-map-point-search').val(object.formatted_address);
                $('#place_id').val(object.place_id);
            }
        };
        
        function Point(lat, lng) {
            this.lat = lat || 0;
            this.lng = lng || 0;
        }
        
        Point.prototype = {
            setLat: function(lat) {
                this.lat = lat;
                return this;
            },
            setLng: function(lng) {
                this.lng = lng;
                return this;
            },
            isEmpty: function() {
                return this.lat === 0 && this.lng === 0;
            }
        };
        
        var point= new Point();
        var geocoder = new google.maps.Geocoder();
        
    	var mapsProperties = {
    		center: new google.maps.LatLng(10.762622, 106.660172), //HCM city
    		zoom: 16,
    		mapTypeId: google.maps.MapTypeId.ROADMAP
    	};
    	
    	var marker = new google.maps.Marker({
                position: new google.maps.LatLng(10.762622, 106.660172), // center HCM city
                map: mapObject,
                draggable: true
            });

    	var mapObject = new google.maps.Map(document.getElementById('google-map-container'), mapsProperties);
    	
    	marker.setMap(mapObject);
    	
    	
    	var autocomplete = new google.maps.places.Autocomplete(document.getElementById('google-map-point-search'));
    	autocomplete.bindTo('bounds', mapObject);
    	
    	autocomplete.addListener('place_changed', function() {
    	    var place = autocomplete.getPlace();
    	    console.log(place);
    	    var latLng = place.geometry.location;
    	    mapObject.setCenter(place.geometry.location);
    	    point.setLat( latLng.lat() ).setLng( latLng.lng() );
            showInput();
            setMarkerPosition(point);
            $('#place_id').val(place.place_id);
    	});
    	
        google.maps.event.addListener(mapObject, 'click', function(e) {
            var lat = e.latLng.lat();
            var lng = e.latLng.lng();
            point.setLat(lat).setLng(lng);
            showInput();
            setMarkerPosition(point);
            getAddress('latLng', e.latLng, getAddressCallback);
        });
        
        google.maps.event.addListener(marker, 'dragend', function() {
            if(marker) {
                var latLng = marker.getPosition();
                point.setLat( latLng.lat() ).setLng( latLng.lng() );
                showInput();
                getAddress('latLng', latLng, getAddressCallback);
            }
        });
        
        
        
        function getAddress(type, value, callback) {
            var request = {};
            request[type] = value;
            if(geocoder) {
                geocoder.geocode(request, function(result) {
                    if(result && $.isArray(result) && result.length) {
                        var object = result[0];
                        if( callback && $.isFunction(callback) ) {
                            callback(object);
                        }
                    }
                });
            }
        }
        
        function setMarkerPosition(point) {
            mapObject.setCenter(new google.maps.LatLng(point.lat, point.lng));
            marker.setPosition(new google.maps.LatLng(point.lat, point.lng));
        }
        
        
        function showInput() {
            $('.point-lat').val(point.lat);
            $('.point-lng').val(point.lng);
        }
        
        
        function init() {
            var lat = $('.point-lat').val();
            var lng = $('.point-lng').val();
            point.setLat( lat ).setLng( lng );
            setMarkerPosition(point);
        }
        
        init();
            
    });
})(jQuery, google);