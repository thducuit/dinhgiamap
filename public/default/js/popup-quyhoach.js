(function(url) {
    var map;
    var tileLayer;

    function init(object, callback) {
        if (!map) {
            if (object.name) {
                $('#map_plan_pop_up p').hide();
                var mapMinZoom = 0;
                var mapMaxZoom = 7;
                map = L.map('map_plan_pop_up', {
                    maxZoom: mapMaxZoom,
                    minZoom: mapMinZoom,
                    fullscreenControl: true
                }).setView([0, 0], 2);

                var mapBounds = new L.LatLngBounds(
                    map.unproject([0, 19968], mapMaxZoom),
                    map.unproject([28160, 0], mapMaxZoom));
                    
                map.fitBounds(mapBounds);

                tileLayer = L.tileLayer(url.plan + '/' + object.name + '/{z}/{x}/{y}.png', {
                    minZoom: mapMinZoom,
                    maxZoom: mapMaxZoom,
                    bounds: mapBounds,
                    attribution: 'dinhgiatructuyen.vn',
                    noWrap: true,
                    tms: false
                }).addTo(map);

                if (object.sposition) {
                    drawPolygon(JSON.parse(object.sposition));
                    L.marker([object.slat, object.slng]).addTo(map);
                    map.panTo([object.slat, object.slng]);
                }
                
                var drawnItems = new L.FeatureGroup();
                map.addLayer(drawnItems);

                L.drawLocal.draw.toolbar.buttons.polygon = 'Tính diện tích';
                L.drawLocal.draw.toolbar.buttons.polyline = 'Tính khoảng cách';
                L.drawLocal.draw.toolbar.buttons.marker = 'Đặt vị trí';
                L.drawLocal.draw.handlers.polygon.tooltip.start = 'Nhấn vào để bắt đầu vẽ';
                L.drawLocal.draw.handlers.polygon.tooltip.cont = 'Nhấn vào để tiếp tục vẽ';
                L.drawLocal.draw.handlers.polygon.tooltip.end = 'Nhấn vào điểm đầu để hoàn tất';
                L.drawLocal.draw.handlers.polyline.tooltip.start = 'Nhấn vào để bắt đầu vẽ';
                L.drawLocal.draw.handlers.polyline.tooltip.cont = 'Nhấn vào để tiếp tục vẽ';
                L.drawLocal.draw.handlers.polyline.tooltip.end = 'Nhấn vào điểm cuối để hoàn tất';

                var drawControl = new L.Control.Draw({
                    draw: {
                        position: 'topleft',
                        polygon: {
                            title: 'Tính diện tích',
                            allowIntersection: false,
                            drawError: {
                                color: '#b00b00',
                                timeout: 1000
                            },
                            shapeOptions: {
                                color: '#bada55'
                            },
                            //metric: false,
                            showArea: true
                        },
                        polyline: {
                            title: 'Tính khoảng cách',
                            metric: true
                        },
                        rectangle: false,
                        circle: false
                    },
                    edit: {
                        featureGroup: drawnItems
                    }
                });
                map.addControl(drawControl);

                map.on('draw:created', function(e) {
                    var type = e.layerType,
                        layer = e.layer;

                    drawnItems.addLayer(layer);
                });
            } else {
                $('#map_plan_pop_up p').show();
            }
        }else {
            if(object && object.name) {
                $('#map_plan_pop_up p').hide();
                tileLayer.setUrl(url.plan + '/' + object.name + '/{z}/{x}/{y}.png');
            }else {
                $('#map_plan_pop_up p').show();
                tileLayer.setUrl('');
            }
            
        }
        callback();
    }

    function getPlan(type, id, callback) {
        $.ajax({
            url: url.planmap,
            type: 'post',
            data: {
                id: id,
                type: type
            },
            success: function(response) {
                callback(response);
            }
        });
    }

    function drawPolygon(object) {
        if (object && object.latlng) {
            var bounds = object.latlng;
            switch (object.type) {
                case 'rectangle':
                    L.rectangle(bounds, {
                        color: "#ff7800",
                        weight: '1px'
                    }).addTo(map);
                    break;
                case 'circle':
                    L.circle(bounds, 200).addTo(map);
                    break;
                case 'polygon':
                    L.polygon(bounds, {
                        color: 'ff7800',
                        weight: '1px'
                    }).addTo(map);
                    break;
                default:
                    L.polyline(bounds, {
                        color: "#ff7800",
                        weight: '1px'
                    }).addTo(map)
            }
        }
    }

    function getPlanByWard() {
        var ward_id = $('.map-plan-search-tool .ward_id').val();
        if(!ward_id) {
            alert('Chọn phường để tiếp tục');
        }else {
            $.ajax({
                url: '/xem-quy-hoach-v2.html',
                type: 'post',
                data: {
                    ward_id: ward_id
                },
                success: function(response) {
                    init(response, function() {});
                }
            });
        }
    }

    $(document).ready(function() {
        $('.plan-btn-popup').click(function(e) {
            e.preventDefault();
            var type = $(this).attr('type');
            var id = $(this).attr('data-id');
            if(map) {
                tileLayer.setUrl('');
            }
            if (parseInt(id)) {
                getPlan(type, id, function(object) {
                    $('.modal.in').modal('hide');
                    $('#modal-xemquyhoach').modal('show');
                    setTimeout(function() {
                        init(object, function() {});
                    }, 2000);

                });
            } else {
                $('#map_plan_pop_up').html('<p>Chưa cập nhật bản đồ quy hoạch</p>');
                $('.modal.in').modal('hide');
                $('#modal-xemquyhoach').modal('show');
            }
        });


        $('#btn_submit_xem_qui_hoach').click(function() {
            getPlanByWard();
        });
    });
})(url);