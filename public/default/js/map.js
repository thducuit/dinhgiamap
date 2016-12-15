(function($, google, icon, url) {
    'use strict';

    $(document).ready(function() {
        var place = null;
        var geocoder = new google.maps.Geocoder();
        var isAutoComplete = false;

        var polygons = [];
        
        

        var mapsProperties = {
            center: new google.maps.LatLng(10.762622, 106.660172), //HCM city
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var mapObject = new google.maps.Map(document.getElementById('map_view'), mapsProperties);

        var myicon = new google.maps.MarkerImage(
            icon.home,
            null, /* size is determined at runtime */
            null, /* origin is 0,0 */
            null, /* anchor is bottom center of the scaled image */
            new google.maps.Size(42, 52)
        );
        
        var marker = new google.maps.Marker({
            //position: new google.maps.LatLng(10.762622, 106.660172), // center HCM city
            map: mapObject,
            icon: myicon,
            animation: google.maps.Animation.DROP,
            draggable: true
        });
        marker.setMap(mapObject);

        var autocomplete = new google.maps.places.Autocomplete(document.getElementById('google-map-autocomplete'));
        autocomplete.bindTo('bounds', mapObject);

        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            $('#placeId').val(place.place_id);
            isAutoComplete = true;
        });

        var infowindow = new google.maps.InfoWindow();

        var getAddressCallback = function(list) {
            var placeId = $("#placeId").val();
            if (list.length > 0) {
                var object = findResultObject(list, placeId);
                if (!object) {
                    object = list[0];
                }
                place = {
                    name: object.formatted_address,
                    place_id: object.place_id,
                    lat: object.geometry.location.lat(),
                    lng: object.geometry.location.lng()
                };
                setMarkerPosition(object.geometry.location);
                mapObject.setCenter(object.geometry.location);
            }
        };

        function findResultObject(list, placeId) {
            for (var i = 0; i < list.length; i++) {
                var o = list[i];
                if (o.place_id === placeId) {
                    return o;
                }
            }
            return null;
        }

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

        function setMarkerPosition(point) {
            marker.setPosition(new google.maps.LatLng(point.lat(), point.lng()));
        }

        var markerLatLng = null;
        function getDragendAddressCallback(list) {
            var object = list[0];
            $('#google-map-autocomplete').val(object.formatted_address);
            $('#placeId').val(object.place_id);
            var lat = object.geometry.location.lat();
            var long = object.geometry.location.lng();
            if(markerLatLng){
              lat = markerLatLng.lat();
              long = markerLatLng.lng();
            }
            place = {
                name: object.formatted_address,
                place_id: object.place_id,
                lat: lat,
                lng: long
            };              
            findAddressInformation();
        }

        google.maps.event.addListener(marker, 'dragend', function() {
            if (marker) {
                var latLng = marker.getPosition();
                markerLatLng = latLng;
                getAddress('latLng', latLng,getDragendAddressCallback);
            }
        });

        google.maps.event.addListener(mapObject, 'click', function(e) {
            setMarkerPosition(e.latLng);
            mapObject.setCenter(e.latLng);
            markerLatLng = e.latLng;
            getAddress('latLng', e.latLng, getDragendAddressCallback);
        });

        function setContent(place) {
            $('#modal_info .p_address p').text(place.name);

            placeInfo = place;
            var a = $('#google-map-autocomplete').val();
            var p = $('#placeId').val();
            var priceLink = [url.price, '?placeId=', p, '&address=', a, '&street=', placeInfo.street_id].join('');
            $('.btn_dinhgia').attr('href', priceLink);
        }

        $('#show-price-pop-up').click(function(e) {
            e.preventDefault();
            var street =  (placeInfo.street && placeInfo.street.name) ? placeInfo.street.name : '';
            var html = [placeInfo.name, '<br>', street].join('');
            $('#dgtt_popup_address').html(html);
            
            if(placeInfo.price_format && placeInfo.state_price_format) {
                buildHTMLPopupDG();
            }else {
                getStreetPrice(function(place){              
                  $('.giaThiTruong').val(place.price_format);
                  $('.giaUB').val(place.state_price_format);
                  $('.textDistrict').val(place.districtName);              
                  $('#modal_dongiasobo').modal('show');
                });
            }  
        });


        $('.show-price-temp-pop-up').click(function(e) {
            e.preventDefault();
            $('#modal_dongiathitruong').modal('hide');
            var street =  (placeInfo.street && placeInfo.street.name) ? placeInfo.street.name : '';
            var html = [placeInfo.name, '<br>', street].join('');
            $('#dgsb_popup_address, .dgsb_popup_address').html(html);
            getStreetPrice(function(place){              
              console.log(place.state_price_format);
              $('.giaThiTruong').val(place.price_format);
              $('.giaUB').val(place.state_price_format);
              $('.giaUBLabel').html(place.state_price_format);
              
              $('.textDistrict').val(place.districtName);              
              $('#modal_dongiasobo').modal('show');
            });
           
        });

        function buildHTMLPopupDG() {
            $('.dongia_highlight_left').html(placeInfo.price_format);
            $('.dongia_highlight_right').html(placeInfo.state_price_format);
            $('#modal_dongiathitruong').modal('show');
        }

        function getStreetPrice(cb){
            $.ajax({
                url: url.priceStreet,
                type: 'get',
                data: {
                    id: placeInfo.street_id
                },
                success: function(response) {
                    if(response){
                        placeInfo.price_format = response.price_format;
                        placeInfo.state_price_format = response.state_price_format;                                                
                        placeInfo.districtName = response.districtName;
                        if(cb){
                          cb(placeInfo);
                        }else{
                          buildHTMLPopupDG();
                        }
                    }
                }
            });
        }
        
        
        $('#btn_close').click(function() {
            $('#dgtt_popup').addClass('none');
        });

        function findAddressInformation() {
            var placeId = $("#placeId").val();
            $.ajax({
                url: url.info,
                type: 'get',
                data: {
                    placeId: placeId
                },
                success: function(response) {                  
                    if (response && response.name) {
                        setContent(response);
                        $('#modal_info').modal('show');
                    }
                    else {
                       ContainInPolygon(place, function(streetId){
							place.street_id = streetId;							
                                      setContent(place);
                        $('#modal_info').modal('show');
                      });
                    }
                }
            })
        }

        function ContainInPolygon(place, callback){			
            for(var i = polygons.length; i>=0; i--) {

                if( polygons[i] && google.maps.geometry.poly.containsLocation(new google.maps.LatLng(place.lat, place.lng), polygons[i]) ){
                    return callback(i);
				}
				if(i === 0){
					return callback(i);
				}

            }
            
        }

        marker.addListener('click', function() {
            findAddressInformation();
        });

        /**
        get area -> draw polygons -> get current point
        */
        function getAreas () {
            $.ajax({
                url: url.street,
                type: 'get',
                success: function(response) {
                    if(response) {
                        drawPolygon(response);
                    }
                    initCurrentPoint();
                }
            })    
        }

        function drawPolygon(response) {
            $.map(response, function(value, index) {
                if(value) {
                    var triangleCoords = JSON.parse(value);
                    if(triangleCoords.latlng && $.isArray(triangleCoords.latlng) && triangleCoords.latlng.length)  {
                        polygons[index] = new google.maps.Polygon({
                                          paths: triangleCoords.latlng,
                                          strokeColor: '#FF0000',
                                          strokeOpacity: 0.5,
                                          strokeWeight: 1,
                                          fillColor: '#FF0000',
                                          fillOpacity: 0.35
                                        });
                        polygons[index].setMap(mapObject);
                    }
                }else{
                    polygons[index] = null;
                }
            });
        }

        function initCurrentPoint(){
            var placeId = $("#placeId").val();
            getAddress('placeId', placeId, getAddressCallback);
        }

        function init() {
            getAreas();
        }

        $('.input_submit').click(function(event) {
            event.stopPropagation();
            if(isAutoComplete) {
                return true;
            }else {
                var address = $('.cen-address-text').val();
                if(address) {
                    getAddress('address', address, function(result) {
                        //console.log(result);
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

        init();

    });
})(jQuery, google, icon, url);