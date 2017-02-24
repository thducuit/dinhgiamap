var mapMinZoom = 0;
	var mapMaxZoom = 7;
    var map = L.map('map_photo', {
		minZoom: mapMinZoom,
		maxZoom: mapMaxZoom,
		fullscreenControl: true
    }).setView([0, 0], 5);
    
    function drawPolygon(type, bounds) {
        switch(type) {
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
    if(positionSoTo){      
      var type = positionSoTo.type || '';
      var bounds = positionSoTo.latlng || positionSoTo;
      drawPolygon(type, bounds);
    }
    L.tileLayer('/public/plan/'+folderMapName+'/{z}/{x}/{y}.png', {
        minZoom: mapMinZoom,
        maxZoom: mapMaxZoom,
        attribution: 'dinhgiatructuyen.vn',
        tms: false,
        noWrap: true
    }).addTo(map);
    
    if(markerPosition){
      L.marker(markerPosition).addTo(map).on('click', function(){
        if(placeIdSoThua){
          window.location.href = '/public/price?placeId='+placeIdSoThua+'&address='+addressSoThua+'&street=0';
        }
        console.log(addressSoThua);
        console.log(placeIdSoThua);
      });
    }
    var drawnItems = new L.FeatureGroup();
	map.addLayer(drawnItems);

    var drawControl = new L.Control.Draw({
		draw: {
			position: 'topleft',
			polygon: {
				title: 'Draw a sexy polygon!',
				allowIntersection: false,
				drawError: {
					color: '#b00b00',
					timeout: 1000
				},
				shapeOptions: {
					color: '#bada55'
				},
				showArea: true
			},
			polyline: {
				metric: false
			},
			circle: {
				shapeOptions: {
					color: '#662d91'
				}
			}
		},
		edit: {
			featureGroup: drawnItems
		}
	});
	map.addControl(drawControl);