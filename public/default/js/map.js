(function($, google, icon, url) {
    'use strict';

    $(document).ready(function() {
        var place = null;
        var geocoder = new google.maps.Geocoder();
        
        var placeInfo = null;

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
            position: new google.maps.LatLng(10.762622, 106.660172), // center HCM city
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
            //mapObject.setCenter(place.geometry.location);
            console.log('place', place);
            $('#placeId').val(place.place_id);
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
            return null
        }

        function getAddress(type, value, callback) {
            var request = {};
            request[type] = value;
            if (geocoder) {
                geocoder.geocode(request, function(result) {
                    if (result && $.isArray(result) && result.length) {
                        console.log('geo', result);
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

        function getDragendAddressCallback(list) {
            console.log('drag', list);
            var object = list[0];
            $('#google-map-autocomplete').val(object.formatted_address);
            $('#placeId').val(object.place_id);
            place = {
                name: object.formatted_address,
                place_id: object.place_id,
                lat: object.geometry.location.lat(),
                lng: object.geometry.location.lng()
            };
            findAddressInformation();
        }

        google.maps.event.addListener(marker, 'dragend', function() {
            if (marker) {
                var latLng = marker.getPosition();
                getAddress('latLng', latLng, getDragendAddressCallback);
            }
        });

        google.maps.event.addListener(mapObject, 'click', function(e) {
            setMarkerPosition(e.latLng);
            mapObject.setCenter(e.latLng);
            getAddress('latLng', e.latLng, getDragendAddressCallback);
        });

        function setContent(place) {
            if (!place) return null;
            placeInfo = place;
            var p = $('#placeId').val();
            var a = $('#google-map-autocomplete').val();
            var contentString = '<div class="popup_map">' +
                '<div class="popup_map_inner clearfix">' +
                '<div class="p_address">' +
                '<p>' + place.name + '</p>' +
                '</div>' +
                '<div class="clearfix">' +
                '<div class="p_half">' +
                '<div class="p_status">' +
                '<p>Trạng thái: </strong></p>' +
                '</div>' +
                '</div>' +
                '<div class="p_half">' +
                '<div class="p_value">' +
                '<p><a href="#"><i class="icon_money"></i><span><strong>Liên hệ định giá</strong></span></a></p>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="popup_button_group">' +
                '<a id="showDGPopUp" href="#"><div class="btn btn_icon btn_gradient1"><i class="icon_xemdongia"></i><span>Xem đơn giá</span></div></a>' +
                '<a href="' + url.plan + '"><div class="btn btn_icon btn_gradient2"><i class="icon_xemquihoach"></i><span>Xem qui hoạch</span></div></a>' +
                '<a id="showDinhGiaPopUp" href="' + url.price + '?placeId=' + p +'&address='+a+'"><div class="btn btn_icon btn_gradient3"><i class="icon_dinhgia"></i><span>Định giá</span></div></a>' +
                '<a href="' + url.address + '?lat=' + place.lat + '&lng=' + place.lng + '"><div class="btn btn_icon btn_gradient4"><i class="icon_cungdongia"></i><span>Tài sản cùng đơn giá</span></div></a>' +
                '</div>' +
                '</div>' +
                '</div>';

            infowindow.setContent(contentString);
        }

        $('body').on('click', '#showDGPopUp', function(e) {
            e.preventDefault();
            var street =  (placeInfo.street && placeInfo.street.name) ? placeInfo.street.name : '';
            var html = [placeInfo.name, '<br>', street].join('');
            $('#dgtt_popup_address').html(html);
            if(placeInfo.price_format) {
                $('.dongia_highlight_left').html(placeInfo.price_format);
            }
            if(placeInfo.state_price_format) {
                $('.dongia_highlight_right').html(placeInfo.state_price_format);
            }
            $('#dgtt_popup').removeClass('none');
        });
        
        // $('body').on('click', '#showDinhGiaPopUp', function(e) {
        //     e.preventDefault();
        //     var street =  placeInfo.street.name || '';
        //     var html = [placeInfo.name, '<br>', street].join('');
        //     //$('#dgtt_popup_address').html(html);
        //     $('#dinhgia_popup').removeClass('none');
        // });
        
        
        
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
                    console.log('address information', response);
                    if (response && response.name) {
                        setContent(response);
                    }
                    else {
                        setContent(place);
                    }
                }
            })
        }

        marker.addListener('click', function() {
            infowindow.open(mapObject, marker);
            findAddressInformation();
        });

        function init() {
            var placeId = $("#placeId").val();
            getAddress('placeId', placeId, getAddressCallback);
        }

        init();

    });
})(jQuery, google, icon, url);