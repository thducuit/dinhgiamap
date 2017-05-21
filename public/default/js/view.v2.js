(function($, google, icon) {
    'use strict';

    $(document).ready(function() {
        var timeOut,
            polygons = [],
            areas = [],
            DEFAULT_POSITION = {
                lat: 10.762622,
                lng: 106.660172
            }, //HCM city
            _currentMarker = {
                streetId: 0
            },
            markerInfoPromise;

        var geocoder = new google.maps.Geocoder();
        var infowindow = new google.maps.InfoWindow();

        var isChooseExtendMarker = false;

        //INIT MAP AND MARKER
        var myicon = new google.maps.MarkerImage(
            icon.home,
            null, /* size is determined at runtime */
            null, /* origin is 0,0 */
            null, /* anchor is bottom center of the scaled image */
            new google.maps.Size(42, 52)
        );

        var mapsProperties = {
            center: new google.maps.LatLng(DEFAULT_POSITION.lat, DEFAULT_POSITION.lng),
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var mapObject = new google.maps.Map(document.getElementById('map_view'), mapsProperties);

        var marker = new google.maps.Marker({
            map: mapObject,
            icon: myicon,
            animation: google.maps.Animation.DROP,
            draggable: true
        });

        marker.setMap(mapObject);

        function setMarkerPosition(point) {
            marker.setPosition(new google.maps.LatLng(point.lat(), point.lng()));
        }

        google.maps.event.addListener(mapObject, 'click', function(e) {
            console.log('map click!');
            setMarkerPosition(e.latLng);
            setMarkerCenter(e.latLng);
            updateCurrentMarkerLocation(e.latLng);
            getAddress('latLng', e.latLng, getDragendMarkerCallback);
        });

        google.maps.event.addListener(marker, 'dragend', function(e) {
            console.log('marker dragend!');
            updateCurrentMarkerLocation(e.latLng);
            getAddress('latLng', e.latLng, getDragendMarkerCallback);
        });

        google.maps.event.addListener(marker, 'click', function(e) {
            console.log('marker click!');
            handleMarkerInfo();
        });

        /*
        SEARCH BAR
        _ using autocomplete by gooble and db
        _ if place id is empty it will get from google map before submit form
        */
        var autocomplete = new google.maps.places.Autocomplete(document.getElementById('google-map-autocomplete'));
        autocomplete.bindTo('bounds', mapObject);

        autocomplete.addListener('place_changed', function() {
            var obj = autocomplete.getPlace();
            updateSearchForm(obj.formatted_address, obj.place_id, obj.geometry.location.lat(), obj.geometry.location.lng());
            isChooseExtendMarker = false;
        });

        $('#google-map-autocomplete').keyup(function(e) {
            var position = $(this).val();
            fixListItemMarkerPosition();
            if (timeOut) {
                clearTimeout(timeOut);
            }

            timeOut = setTimeout(function() {
                $.get(url.searchMarkers, {
                    position: position
                }, function(data) {
                    $('.list-item-marker ul').html('');
                    if (data.length) {
                        for (var i in data) {
                            if (data[i].id) {
                                $('.list-item-marker ul').append('<li lat="' + data[i].lat + '" lng="' + data[i].lng + '" place-id="' + data[i].place_id + '" address="' + data[i].name + '" class="cursor"><i class="marker-icon"></i> ' + data[i].name + ' <div class="clear"></div></li>');
                            }
                        }
                        $('.list-item-marker').show();
                    } else {
                        $('.list-item-marker').hide();
                        $('.pac-container').show();
                    }
                });
            }, 600);
        });

        $(document).on('click', '.list-item-marker ul li', function() {
            var placeId = $(this).attr('place-id');
            var address = $(this).attr('address');
            var lat = $(this).attr('lat');
            var lng = $(this).attr('lng');
            updateSearchForm(address, placeId, lat, lng);
            $('.list-item-marker').hide();
            isChooseExtendMarker = true;
        });

        // $('.cen-address-text').click(function() {
        //    resetSearchForm();
        // });

        $('.google-map-search-form').submit(function(event) {
            var address = $('.google-map-search-form .cen-address-text').val();
            var placeId = $('.google-map-search-form #placeId').val();
            var lat = $('.google-map-search-form #lat').val();
            var lng = $('.google-map-search-form #lng').val();
            if (address) {
                if (!placeId || !lat || !lng) {
                    getAddress('address', address, function(result) {
                        if (result && $.isArray(result) && result.length) {
                            var obj = result[0];
                            address = isChooseExtendMarker ? address : obj.formatted_address;
                            updateSearchForm(address, obj.place_id, obj.geometry.location.lat(), obj.geometry.location.lng());
                            $('.google-map-search-form').submit();
                        }
                    });
                    return false
                } else {
                    return true;
                }
            } else {
                return false;
            }
            return false;
        });

        function updateSearchForm(address, placeId, lat, lng) {
            if (address) {
                $('.google-map-search-form .cen-address-text').val(address);
            }
            if (placeId) {
                $('.google-map-search-form #placeId').val(placeId);
            }
            if (lat && lng) {
                $('.google-map-search-form #lat').val(lat);
                $('.google-map-search-form #lng').val(lng);
            }
        }

        // function resetSearchForm() {
        //     $('.google-map-search-form .cen-address-text').val('');
        //     $('.google-map-search-form #placeId').val('');
        //     $('.google-map-search-form #lat').val('');
        //     $('.google-map-search-form #lng').val('');
        // }

        function initCurrentMarker() {
            var address = $('.google-map-search-form .cen-address-text').val();
            var placeId = $('.google-map-search-form #placeId').val();
            var lat = $('.google-map-search-form #lat').val();
            var lng = $('.google-map-search-form #lng').val();
            var street = $('#areas').html();
            street = (street) ? JSON.parse(street.trim()) : {};
            if (!placeId) {
                return;
            }
            var point = formatLocation(lat, lng);
            _currentMarker = {
                address: address,
                placeId: placeId,
                streetId: (street.id) ? street.id : 0,
                lat: point.lat(),
                lng: point.lng(),
                street: street
            };
            markerInfoPromise = findMarkerInfo();
            setMarkerPosition(point);
            setMarkerCenter(point);
        }

        // ACTION
        $('#btn_close').click(function() {
            $('#dgtt_popup').addClass('none');
        });

        $('#show-price-pop-up').click(function(e) {
            e.preventDefault();
            initPriceModal();
            $('.modal.in').modal('hide');
            $('#modal_dongiathitruong').modal('show');
        });

        $('.show-price-temp-pop-up').click(function(e) {
            e.preventDefault();
            initGetPriceSimpleModal();
            $('.modal.in').modal('hide');
            $('#modal_dongiasobo').modal('show');
        });

        //UTILS
        function formatLocation(lat, lng) {
            return new google.maps.LatLng(lat, lng);
        }

        function setMarkerPosition(point) {
            marker.setPosition(point);
        }

        function setMarkerCenter(point) {
            mapObject.setCenter(point);
        }

        function updateCurrentMarkerLocation(point) {
            _currentMarker.lat = point.lat();
            _currentMarker.lng = point.lng();
        }

        function updateCurrentMarker(address, placeId, lat, lng) {
            if (address) {
                _currentMarker.address = address;
            }
            if (placeId) {
                _currentMarker.placeId = placeId;
            }
        }

        //get information marker from google map
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

        function getDragendMarkerCallback(list) {
            if (list && $.isArray(list) && list.length) {
                var obj = list[0];
                updateSearchForm(obj.formatted_address, obj.place_id);
                updateCurrentMarker(obj.formatted_address, obj.place_id);
                markerInfoPromise = findMarkerInfo();
                findPolygon();
            }
        }

        // get marker information from DB
        function findMarkerInfo() {
            var defer = $.Deferred();
            $.ajax({
                url: url.info,
                type: 'get',
                data: {
                    placeId: _currentMarker.placeId
                },
                success: function(response) {
                    defer.resolve(response);
                }
            });
            return defer.promise();
        }

        function handleMarkerInfo() {
            $.when(markerInfoPromise).done(
                function(response) {
                    findMarkerCallback(response);
                    //open modal
                    $('.modal.in').modal('hide');
                    $('#modal_info').modal('show');
                });
        }

        function findMarkerCallback(response) {
            updateCurrentMarkerPrice(response);
            initModalInfo();
            initPlanMapModal(response);
        }

        // check if marker is existed in what polygon
        function isContainedInPolygon(callback) {
            $.ajax({
                url: url.searchArea,
                type: 'post',
                data: {
                    lat: _currentMarker.lat,
                    lng: _currentMarker.lng
                },
                success: function(response) {
                    callback(response);
                }
            });
        }

        function findPolygon() {
            console.log('finding area !!!');
            isContainedInPolygon(function(area) {
                _currentMarker.streetId = area.id;
                _currentMarker.street = {
                    price_format: (area.price_format) ? area.price_format : 0,
                    state_price_format: (area.state_price_format) ? area.state_price_format : 0,
                    price: (area.price) ? area.price : 0,
                    state_price: (area.state_price) ? area.state_price : 0,
                    district_format: area.district_format
                };
            });
        }

        function initModalInfo() {
            var urlTaiSanGiaoDich = $('#modal_info').find('.btn-tai-san-giao-dich:first').attr('href');
            urlTaiSanGiaoDich += '?lat=' + _currentMarker.lat + '&lng=' + _currentMarker.lng;
            $('#modal_info').find('.btn-tai-san-giao-dich:first').attr('href', urlTaiSanGiaoDich);
            $('#modal_info .pp_address p').text(_currentMarker.address);
            $('.btn_dinhgia_adv').attr('href', [url.price, '?placeId=', _currentMarker.placeId, '&address=', _currentMarker.address, '&street=', _currentMarker.streetId, '&lat=', _currentMarker.lat, '&lng=', _currentMarker.lng].join(''));
        }

        function initPlanMapModal(object) {
            if (object && object.id) {
                $(".plan-btn-popup").attr('type', 'marker').attr('data-id', object.id);
            } else {
                $(".plan-btn-popup").attr('type', 'street').attr('data-id', _currentMarker.streetId);
            }
        }

        function initPriceModal() {
            $('#dgtt_popup_address').html(_currentMarker.address);
            if (_currentMarker.price_format && _currentMarker.state_price_format) {
                $('.dongia_highlight_left').html(_currentMarker.price_format);
                $('.dongia_highlight_right').html(_currentMarker.state_price_format);
                $('.giaThiTruong').val(_currentMarker.price_format);
                $('.giaUB').val(_currentMarker.state_price_format);
            } else {
                $('.dongia_highlight_left').html(_currentMarker.street.price_format);
                $('.dongia_highlight_right').html(_currentMarker.street.state_price_format);
                $('.giaThiTruong').val(_currentMarker.street.price_format);
                $('.giaUB').val(_currentMarker.street.state_price_format);
            }
            $('.textDistrict').val(_currentMarker.street.district_format);
        }

        function initGetPriceSimpleModal() {
            $('#dgsb_popup_address, .dgsb_popup_address').html(_currentMarker.address);
            if (_currentMarker.price_format && _currentMarker.state_price_format) {
                $('.giaThiTruong').val(_currentMarker.price_format);
                $('.giaUB').val(_currentMarker.state_price_format);
                $('.giaUBLabel').html(_currentMarker.state_price_format.replace(/,/gm, '.'));
            } else {
                $('.giaThiTruong').val(_currentMarker.street.price_format);
                $('.giaUB').val(_currentMarker.street.state_price_format);
                $('.giaUBLabel').html(_currentMarker.street.state_price_format.replace(/,/gm, '.'));
            }
            $('.textDistrict').val(_currentMarker.street.district_format);
        }

        function updateCurrentMarkerPrice(object) {
            _currentMarker.price_format = (object.price_format) ? object.price_format : 0;
            _currentMarker.state_price_format = (object.state_price_format) ? object.state_price_format : 0;
            _currentMarker.price = (object.price) ? object.price : 0;
            _currentMarker.state_price = (object.state_price) ? object.state_price : 0;
        }

        function fixListItemMarkerPosition() {
            var widthLocationLabel = $('.form_group_icon_location').outerWidth(true);
            var widthAutocomplete = $('#google-map-autocomplete').outerWidth(true);
            $('.list-item-marker').css('width', widthAutocomplete + 'px').css('left', widthLocationLabel + 'px');
        }


        //RUN INIT
        (function() {
            initCurrentMarker();
        })()

    });
})(jQuery, google, icon);