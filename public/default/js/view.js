(function($, google) {
    'use strict';
    
    $(document).ready(function() {
        
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
    	    console.log(place);
    	    mapObject.setCenter(place.geometry.location);
    	    $('#placeId').val(place.place_id);
    	});
    	
    });
})(jQuery, google);