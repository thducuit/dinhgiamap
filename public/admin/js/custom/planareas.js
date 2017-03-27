(function($, url, planpage) {
	var layer = null;
	var map = null;
    var data = {};
    polygon = null;
    marker = null;

	function getLayer(type, layer) {
    	data = {
    		'type': type,
    		'latlng': parseLatLng(layer.getLatLngs())
    	};
    	$("#points").val( JSON.stringify(data) );
    }

    function editLayer(layer) {
    	data.latlng = parseLatLng(layer.getLatLngs());
    	$("#points").val( JSON.stringify(data) );
    }

    function parseLatLng(data) {
    	var result = [];
    	if($.isArray(data)) {
    		data.forEach(function(item) {
    			result.push({'lat':item.lat, 'lng':item.lng})
    		});
    	}
    	return result;
    }

    function getPlan() {
    	var lat = $('#lat').val();
    	var lng = $('#lng').val();
    	var json = $('#points').val();
    	//show polygon
    	if(json) {
    		var point = $.parseJSON( $('#points').val() );
	    	var type = point.type || '';
	    	var bounds = point.latlng || point;
	    	drawPolygon(type, bounds);
    	}
    	//show marker
    	if(lat&&lng) {
    		marker = L.marker([lat, lng]).addTo(map);
    	}
    }

    function drawPolygon(type, bounds) {
    	switch(type) {
		    case 'rectangle':
		        polygon = L.rectangle(bounds, {color: "#ff7800", weight:'1px'}).addTo(map);
		        break;
		    case 'circle':
		        polygon = L.circle(bounds, 200).addTo(map);
		        break;
		    case 'polygon':
		    	polygon = L.polygon(bounds, {color: 'ff7800', weight:'1px'}).addTo(map);
		    	break;
		    default:
		        polygon = L.polyline(bounds, {color: "#ff7800", weight:'1px'}).addTo(map)
		}
    }

    function getMarker(layer) {
    	var points = layer.getLatLng();
    	$('#lat').val(points.lat);
    	$('#lng').val(points.lng);
    }

	$(document).ready(function() {
		var mapMinZoom = 0;
		var mapMaxZoom = 7;
		map = L.map('google-map-container', {
			minZoom: mapMinZoom,
			maxZoom: mapMaxZoom,
			fullscreenControl: true
		}).setView([0, 0], 5);

		L.tileLayer('/public/plan/' + planpage + '/{z}/{x}/{y}.png', {
			minZoom: mapMinZoom,
			maxZoom: mapMaxZoom,
			attribution: 'dinhgiatructuyen.vn',
			tms: false,
			noWrap: true
		}).addTo(map);

		var drawnItems = new L.FeatureGroup();
		map.addLayer(drawnItems);

	    $("#btn-reset-polygon-image").on('click', function() {
	    	map.removeLayer(polygon);
	    	$('#points').val('');
	    });

	    $("#btn-reset-marker-image").on('click', function() {
	    	map.removeLayer(marker);
	    	$('#lat').val('');
    		$('#lng').val('');
	    });

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

		// leaflet draw action :created
		map.on('draw:created', function (e) {
			var type = e.layerType,
				layer = e.layer;
				
			if (type === 'marker') {
	            getMarker(layer);
	        }
	        else if(type === 'circle') {
	        	console.log(layer);
	        }else {
				getLayer(type, layer);
	        }	
	        drawnItems.addLayer(layer);
			
		});

		// leaflet draw action :edited
		map.on('draw:edited', function (e) {
		    var layers = e.layers;

		    layers.eachLayer(function (layer) {
		        //do whatever you want, most likely save back to db
		        editLayer(layer);
		    });
		});


		// leaflet draw action :deleted
		map.on('draw:deleted', function (e) {
		    var layers = e.layers;

		    layers.eachLayer(function (layer) {
		        //do whatever you want, most likely save back to db
		        console.log('deleted', layer);
		        editLayer(layer);
		    });
		});

		getPlan();
	});
})(jQuery, url, planpage);