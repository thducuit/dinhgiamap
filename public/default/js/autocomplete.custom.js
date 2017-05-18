(function($, google, url) {
    'use strict';
    
    $(document).ready(function() {
        
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
        
        var polyline = null;
        
        var mapsProperties = {
    		center: new google.maps.LatLng(10.762622, 106.660172), //HCM city
    		zoom: 16,
    		mapTypeId: google.maps.MapTypeId.ROADMAP
    	};

    	var mapObject = new google.maps.Map(document.getElementById('google-map-view'), mapsProperties);
        
        
        $('#autocomplete').autocomplete({
            serviceUrl: url.searchArea,
            onSelect: function(suggestion){
               $.ajax({
                    url: url.markers,
                    type: 'POST',
                    data: {streetId: suggestion.data},
                    success: function(response) {
                        console.log(response);
                        removeLine();
                        var data = response.data;
                        pointStart.setLat(data.start_lat).setLng(data.start_lng);
                        pointEnd.setLat(data.end_lat).setLng(data.end_lng);
                        drawWay();
                        setCenter();
                    }   
                });
            },
            minChars: 1,
        });
        
        
        function setCenter(){
            var center = google.maps.geometry.spherical.interpolate(new google.maps.LatLng(pointStart.lat, pointStart.lng), new google.maps.LatLng(pointEnd.lat, pointEnd.lng), 0.5);
            mapObject.setCenter( new google.maps.LatLng(center.lat(), center.lng() ));
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
                    strokeHeight: 5
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
        
    });
})(jQuery, google, url);