var map = null;
    function init(object, callback) {
        if(!map) {
            if(object.name) {
                var mapMinZoom = 0;
                var mapMaxZoom = 7;
                map = L.map('map_plan_pop_up', {
                maxZoom: mapMaxZoom,
                minZoom: mapMinZoom,
                fullscreenControl: true
              }).setView([0, 0], 5);

                L.tileLayer('/public/plan/' + object.name + '/{z}/{x}/{y}.png', {
                    minZoom: mapMinZoom, 
                    maxZoom: mapMaxZoom,
                    attribution: 'dinhgiatructuyen.vn',
                    noWrap: true,
                    tms: false
                }).addTo(map);

                if(object.sposition) {
                    drawPolygon( JSON.parse(object.sposition) );
                }
                L.marker([object.slat, object.slng]).addTo(map);
                map.panTo([object.slat, object.slng]);
            }else {
                $('#map_plan_pop_up').html('<p>Chưa cập nhật bản đồ quy hoạch</p>');
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
            success:function(response) {
                callback(response);
            }
        });
    }

    function drawPolygon(object) {
        if(object && object.latlng) {
            var bounds = object.latlng;
            switch(object.type) {
                case 'rectangle':
                    L.rectangle(bounds, {color: "#ff7800", weight:'1px'}).addTo(map);
                    break;
                case 'circle':
                    L.circle(bounds, 200).addTo(map);
                    break;
                case 'polygon':
                    L.polygon(bounds, {color: 'ff7800', weight:'1px'}).addTo(map);
                    break;
                default:
                    L.polyline(bounds, {color: "#ff7800", weight:'1px'}).addTo(map)
            }
        }
    }

    $(document).ready(function(){
        $('#plan-btn-popup').click(function(e) {
            e.preventDefault();
            var type = $(this).attr('type');
            var id = $(this).attr('data-id');
            if(parseInt(id)) {              
                getPlan(type, id, function(object) {
                  $('#modal-xemquyhoach').modal('show');
                  setTimeout(function(){
                    init(object, function() {});
                  }, 2000);
                    
                });
            }else {
                $('#map_plan_pop_up').html('<p>Chưa cập nhật bản đồ quy hoạch</p>');
                $('#modal-xemquyhoach').modal('show');
            }
        });                    
    });