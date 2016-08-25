(function($, google) {
    'use strict';
    
    var chossenPoint = '#point-start';
    
    
    
    function selectPoint() {
        $('#point-start').find('input').addClass('point-focus');
        $('.google-map-point a').click(function(e) {
            e.preventDefault();
            var id = $(this).attr('href');
            chossenPoint = id;
            $('.google-map-point input').removeClass('point-focus');
            $(id).find('input').addClass('point-focus');
        });
    }
    
    function goChooserStart(){
        chossenPoint = '#point-start';
        $('.google-map-point input').removeClass('point-focus');
        $('#point-start').find('input').addClass('point-focus');
    }
    
    function goChooserEnd(){
        chossenPoint = '#point-end';
        $('.google-map-point input').removeClass('point-focus');
        $('#point-end').find('input').addClass('point-focus');
    }
    
    
    $(document).ready(function() {
        var polyline = null;
        var marker1 = null;
        var marker2 = null;
        
        
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
        
        var pointStart = new Point();
        var pointEnd = new Point();
        
    	var mapsProperties = {
    		center: new google.maps.LatLng(10.762622, 106.660172), //HCM city
    		zoom: 16,
    		mapTypeId: google.maps.MapTypeId.ROADMAP
    	};

    	var mapObject = new google.maps.Map(document.getElementById('google-map-container'), mapsProperties);
    	
    	var geocoder = new google.maps.Geocoder();
    	
    	var getAddressCallback = function(object) {
    	    if(object) {
    	        $('#place_id').val(object.place_id);
    	    }
        };
        
    	var autocomplete = new google.maps.places.Autocomplete(document.getElementById('google-map-point-search'));
    	autocomplete.bindTo('bounds', mapObject);
    	
    	autocomplete.addListener('place_changed', function() {
    	    var place = autocomplete.getPlace();
    	    mapObject.setCenter(place.geometry.location);
    	    mapObject.setZoom(18);
    	    getAddress('latLng', place.geometry.location, getAddressCallback);
    	});
    	
    	
        google.maps.event.addListener(mapObject, 'click', function(e) {
            var lat = e.latLng.lat();
            var lng = e.latLng.lng();
            if(chossenPoint === '#point-start') {
                pointStart.setLat(lat).setLng(lng);
                showInput();
                goChooserEnd();
                removeMarker('start');
                marker1 = createMarker(pointStart, 'start');
            }else {
                pointEnd.setLat(lat).setLng(lng);
                showInput();
                goChooserStart();
                removeMarker('end');
                marker2 = createMarker(pointEnd, 'end');
            }
            
            
            // draw polyline
            drawWay();
        });
        
        
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
        
        
        function removeMarker(type) {
            if(type === 'start') {
                if(marker1){
                    marker1.setMap(null);
                    marker1 = null;
                }    
            }
            if(type === 'end') {
                if(marker2){
                    marker2.setMap(null); 
                    marker2 = null;
                }   
            }
        }
        
        function createMarker(point, name){
            return new google.maps.Marker({
                position: point,
                map: mapObject,
                title: name
            });
        }
        
        
        function showInput() {
            if(chossenPoint === '#point-start') {
                $('.point-start-lat').val(pointStart.lat);
                $('.point-start-lng').val(pointStart.lng);
            }else {
                $('.point-end-lat').val(pointEnd.lat);
                $('.point-end-lng').val(pointEnd.lng);
            }
        }
        
        function drawWay() {
            if( ! pointStart.isEmpty() && ! pointEnd.isEmpty() ) {
                
               removeLine();
               
                polyline = new google.maps.Polyline({
                    path: [
                        new google.maps.LatLng(pointStart.lat, pointStart.lng),
                        new google.maps.LatLng(pointEnd.lat, pointEnd.lng)
                    ],
                    strokeColor: 'red',
                    strokeOpacity: 1,
                    strokeHeight: 2
                });
                polyline.setMap(mapObject);
            }else {
                alert('Choose for start and end point');
            }
        }
        
        function removeLine() {
            if(polyline) {
                 polyline.setMap(null);
            }
        }
        
        function init() {
            pointStart.setLat($('.point-start-lat').val()).setLng($('.point-start-lng').val());
            pointEnd.setLat($('.point-end-lat').val()).setLng($('.point-end-lng').val());
            mapObject.setCenter( new google.maps.LatLng(pointStart.lat, pointStart.lng) );
            drawWay();
        }
        
        selectPoint();
        init();
            
    });
})(jQuery, google);