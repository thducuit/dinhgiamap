(function($, google, icon, url) {
  'use strict';

  $(document).ready(function() {
    //var place = null;
    var geocoder = new google.maps.Geocoder();
    var isAutoComplete = false;
    var markers = [];

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
      //mapObject.setCenter(place.geometry.location);
      $('#placeId').val(place.place_id);
      isAutoComplete = true;
    });

    var infowindow = new google.maps.InfoWindow();


    function setContent(marker) {
      if (!marker.info) return null;
      var contentString = '<div class="popup_map_wrapper">' +
        '<div class="popup_map">' +
        '<div class="popup_map_inner clearfix">' +
        '<div class="popup_center">' +
        '<div class="property_title">' + marker.info.name  + '</div>' +
        // '<div class="property_address">Khu vực: Quận 2, TP.Hồ Chí Minh</div>' +
        '<div class="property_info_row clearfix">' +
        '<div class="property_info_left">Diện tích đất</div>' +
        '<div class="property_info_right">' + marker.info.land_acreage  + 'm<sup>2</sup></div>' +
        '</div>' +
        '<div class="property_info_row clearfix">' +
        '<div class="property_info_left">Diện tích sử dụng</div>' +
        '<div class="property_info_right">' + marker.info.used_acreage  + 'm<sup>2</sup></div>' +
        '</div>' +
        '<div class="property_info_row clearfix">' +
        '<div class="property_info_left">Giá rao bán</div>' +
        '<div class="property_info_right">' + marker.info.sale_price  + '</div>' +
        '</div>' +
        '</div>' +
        // '<div class="popup_right">' +
        // '<div class="property_thumbbnail"></div>' +
        // '<div class="popup_button_group">' +
        // '<a href="#"><div class="btn btn_icon btn_gradient4"><i class="icon_cungdongia"></i><span>Xem chi tiết</span></div></a>' +
        // '</div>' +
        // '</div>' +
        '</div>' +
        '<button class="btn_close_popup"></button>' +
        '</div>' +
        '</div>';

      infowindow.setContent(contentString);
    }

    function getMarkers(lat, lng, callback) {
      $.ajax({
        url: url.markers,
        data: {
          lat: lat,
          lng: lng
        },
        success: function(response) {
          //console.log('get markers', response);
          callback(response);
        }
      });
    }
    
    var myicon = new google.maps.MarkerImage(
        icon.address,
        null, /* size is determined at runtime */
        null, /* origin is 0,0 */
        null, /* anchor is bottom center of the scaled image */
        new google.maps.Size(42, 52)
    );

    function showMarkers(list) {
      list.forEach(function(object) {
        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(object.lat, object.lng),
          map: mapObject,
          icon: myicon
        });
        marker['info'] = object;
        bindInfoWindow(marker);
        markers.push(marker);
      });
    }


    function bindInfoWindow(marker) {
      google.maps.event.addListener(marker, 'click', function() {
        setContent(marker);
        infowindow.open(mapObject, marker);
      });
    }


    // marker.addListener('click', function() {
    //   infowindow.open(mapObject, marker);
    //   findAddressInformation();
    // });
    
    function drawCircle (point) {
      var cityCircle = new google.maps.Circle({
        strokeColor: '#f68b1f',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        // fillColor: '#f68b1f',
        // fillOpacity: 0.35,
        map: mapObject,
        center: point,
        radius: 1*100
      });
    }

    function init() {
      var lat = $(".lat").val();
      var lng = $(".lng").val();
      
      mapObject.setCenter(new google.maps.LatLng(lat, lng));
      mapObject.setZoom(18);
      getMarkers(lat, lng, showMarkers);
      drawCircle(new google.maps.LatLng(lat, lng));
    }

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
    

    init();

  });
})(jQuery, google, icon, url);