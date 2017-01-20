(function($, url) {
	'use strict';
	
	var PropertyValueMap = function () {
        var $gmap = null;
        var cityCircleArray = [];
        var infoWindowArray = [];
        var latPosition = 0;
        var lngPosition = 0;
        if(latTaiSanGD){
          latPosition = latTaiSanGD;
        }
        if(lngTaiSanGD){
          lngPosition = lngTaiSanGD;
        }
        var mapOptions = {
            center: new google.maps.LatLng(latPosition, lngPosition),
            zoom: 17,
            overviewMapControl: true,
            overviewMapControlOptions: {
                opened: false
            },                
            panControl: false,
            rotateControl: false,
            scaleControl: false,
            zoomControl: false,
            streetViewControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                position: google.maps.ControlPosition.TOP_RIGHT
            }
        };

        $gmap = new google.maps.Map(document.getElementById('map_view'), mapOptions);
        var initMap = function (list) {
            
            // var markers = [
            //     {"latitude": "10.773857", "longitude":"106.632648", "content": 'BÁN NHÀ MẶT TIỀN :300 LŨY BÁN BÍCH P. HIỆP TÂN Q. TÂN PHÚ', "price": '7.5 tỷ', "area": "84", "district": "Quận Tân Phú", "city": "Hồ Chí Minh"},
            //     {"latitude": "10.773419", "longitude": "106.632215", "content": 'Bán gấp nhà mặt tiền 369 Lũy Bán Bích 3m5-29m đúc 3 tấm', "price" : '9.5 tỷ', "area": "102", "district": "Quận Tân Phú", "city": "Hồ Chí Minh"},
            //     {"latitude": "10.774673", "longitude": "106.632705", "content": '425 LŨY BÁN BÍCH', "price" : '14 tỷ', "area": "202", "district": "Quận Tân Phú", "city": "Hồ Chí Minh"},

            //     {"latitude": "10.772117", "longitude": "106.633812", "content": 'Bán nhà 262/26/78B đường Lũy Bán Bích', "price" : '1.8 tỷ', "area": "97", "district": "Quận Tân Phú", "city": "Hồ Chí Minh"},
            //     {"latitude": "10.772471", "longitude": "106.632540", "content": 'Bán nhà 262/26/78B đường Lũy Bán Bích', "price" : '3 tỷ', "area": "118.8", "district": "Quận Tân Phú", "city": "Hồ Chí Minh"},
            //     {"latitude": "10.773196", "longitude": "106.633161", "content": 'Bán nhà hẻm 284 đường Lũy Bán Bích', "price" : '4 tỷ', "area": "85", "district": "Quận Tân Phú", "city": "Hồ Chí Minh"},

            //     {"latitude": "10.775116", "longitude": "106.634859", "content": 'Bán nhà đường Trịnh Đình Thảo', "price" : '1.55 tỷ', "area": "21", "district": "Quận Tân Phú", "city": "Hồ Chí Minh"}, 
            //     {"latitude": "10.774232", "longitude": "106.636850", "content": 'Bán nhà 3x8m đường Trịnh Đình Thảo', "price" : '1.7 tỷ', "area": "24", "district": "Quận Tân Phú", "city": "Hồ Chí Minh"},  
            //     {"latitude": "10.774757", "longitude": "106.635604", "content": 'Bán nhà mặt tiền Trịnh Đình Thảo, P. Hòa Thạnh', "price" : '26 tỷ', "area": "605", "district": "Quận Tân Phú", "city": "Hồ Chí Minh"},


            //     {"latitude": "10.775118", "longitude": "106.629251", "content": 'Bán nhà MT đường Lương Trúc Đàm', "price" : '12 tỷ', "area": "160", "district": "Quận Tân Phú", "city": "Hồ Chí Minh"}, 
            //     {"latitude": "10.774722", "longitude": "106.630492", "content": 'Bán nhà 6.2x18m MT Lương Trúc Đàm', "price" : '6.6 tỷ', "area": "111.6", "district": "Quận Tân Phú", "city": "Hồ Chí Minh"},  
            //     {"latitude": "10.774835", "longitude": "106.630121", "content": 'Bán nhà MTKD 6x20m đúc 4 tấm đường Lương Trúc Đàm', "price" : '6.5 tỷ', "area": "120", "district": "Quận Tân Phú", "city": "Hồ Chí Minh"},

            //     {"latitude": "10.775370", "longitude": "106.629212", "content": 'Bán nhà 4mx18.6m, MT Huỳnh Văn Một', "price" : '4 tỷ', "area": "77.4", "district": "Quận Tân Phú", "city": "Hồ Chí Minh"}, 
            //     {"latitude": "10.775043", "longitude": "106.630731", "content": 'Bán nhà 4x18m, MT Huỳnh Văn Một', "price" : '4.4 tỷ', "area": "72", "district": "Quận Tân Phú", "city": "Hồ Chí Minh"},  
            //     {"latitude": "10.775000", "longitude": "106.630542", "content": 'Cần bán nhà MT Huỳnh Văn Một, Tân Phú 4x18.5m', "price" : '4.5 tỷ', "area": "74", "district": "Quận Tân Phú", "city": "Hồ Chí Minh"},
                 
            // ];
            var markers = list;

            $.each(markers, function (index, markerObject) {
                var marker_icon;
                var glatlng = new google.maps.LatLng(parseFloat(markerObject.lat), parseFloat(markerObject.lng));

                var gmarker = new google.maps.Marker({
                    position: glatlng
                });
                marker_icon = new google.maps.MarkerImage(icon.real);
                marker_icon.size = new google.maps.Size(32, 46);

                gmarker.setIcon(marker_icon);
                
                gmarker.marker = new InfoBox({
                    draggable: true,
                    content: '<div class=\'property-price\'>'+markerObject.cost+'</div>',
                    disableAutoPan: true,
                    pixelOffset: new google.maps.Size(-20, 0),
                    position: new google.maps.LatLng(markerObject.lat, markerObject.lng),
                    closeBoxURL: "",
                    isHidden: false,
                    pane: "floatPane",
                    enableEventPropagation: true
                });
                gmarker.marker.isHidden = false;
                gmarker.marker.open($gmap, gmarker);
                gmarker.setMap($gmap);

                var infoWindow ;
                infoWindow = new InfoBox({                    
                    //closeBoxMargin: "-10px -10px 10px 10px",
                    closeBoxURL: "",
                    content: generateInfo(markerObject),
                    position: new google.maps.LatLng(markerObject.lat, markerObject.lng),
                    pixelOffset: new google.maps.Size(-250, -310)
                });

                google.maps.event.addListener(gmarker, 'click', function (event) {
                    var lat = (event.latLng.lat().toFixed(6));
                    var lng = (event.latLng.lng().toFixed(6));
                    if (cityCircleArray.length > 0) {
                        $.each(cityCircleArray, function (index, cityCircle) {
                            cityCircle.setMap(null);
                        });
                    }
                   closeInfoWindow();


                    var cityCircle = new google.maps.Circle({
                        strokeColor: '#90b5bb',
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: '#90b5bb',
                        fillOpacity: 0.35,
                        map: $gmap,
                        center: new google.maps.LatLng(lat, lng),
                        radius: 200
                    });
                    cityCircleArray.push(cityCircle);
                                       
                    infoWindow.setZIndex(999999999);   
                    infoWindow.open($gmap, gmarker);
                    infoWindowArray.push(infoWindow);

                    $gmap.setCenter(event.latLng);
                });

            });
        }
        var generateInfo = function (info) {
            var html = '<div class="popup_map" id="info_tai_san_cung_don_gia">\
                    <div class="popup_map_inner clearfix" id="modal_dinhgia">\
                         <div class="popup_left">\
                            <div class="property_title">'+info.title+'</div>\
                            <div class="property_address">Khu vực: '+info.address+'</div>\
                            <div class="property_info_row clearfix">\
                                <div class="property_info_left">Diện tích đất</div>\
                                <div class="property_info_right">'+info.areas+'m<sup>2</sup></div>\
                             </div>\
                            <div class="property_info_row clearfix">\
                                <div class="property_info_left">Giá rao bán</div>\
                                <div class="property_info_right">'+info.cost+'</div>\
                            </div>\
                            <div class="property_info_row clearfix property_info_row_end">\
                                <div class="property_info_left">Liên hệ</div>\
                                <div class="property_info_right">STDA Miền Nam - 19006868</div>\
                            </div>\
                        </div>\
                        <div class="popup_right" style="padding-top:0px;">\
                        <button type="button" class="close hidden-xs" id="btn_close_info_window" style="float:right;margin-right:-15px;">×</button>\
                      \
                            <div class="property_thumbbnail" style="background: url(default/images/hinh_taisancungdongia_35823583.png) center no-repeat; background-size: cover;margin-top:32px;"></div>\
                          <div class="popup_button_group">\
                              <a href="' + url.reals + '?place=' + info.place_id + '">\
                                  <div class="btn btn_icon btn_gradient4"><i class="icon_cungdongia"></i><span>Xem chi tiết</span></div>\
                              </a>\
                          </div>\
                        </div>\
                    </div>\
                    <button type="button" id="btn_close_info_window" class="btn_close_popup"></button>\
                </div>';
            return html;
        }

        var closeInfoWindow = function () {
             if (infoWindowArray.length > 0) {
                $.each(infoWindowArray, function (index, infoWindow) {
                    infoWindow.close();                    
                });
            }
        }

        function getRealEstate(callback) {
            $.ajax({
                url: url.getReal+'?lat='+latPosition+'&'+'lng='+lngPosition,
                type: 'get',
                data: {},
                success: function(response) {
                    var markers = (response)? response : [];
                    if(callback) {
                        callback(markers);
                    }
                    
                }
            });
        }

        var init = function() {
            getRealEstate(initMap);
        };


        return {
            init: function () {
                init();
               
            },
            closeInfoWindow: function() {
                closeInfoWindow();
            }
        }
    }();
    
    $(document).ready(function () {        
        PropertyValueMap.init();
    });
    $( document ).on( "click", "#btn_close_info_window", function() {
    
       PropertyValueMap.closeInfoWindow();
    });
})(jQuery, url);