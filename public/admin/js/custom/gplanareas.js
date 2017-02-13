(function($, url, planpage) {
	var layer = null;
	var map = null;
    var data = {};

	function getLayer(type, layer) {
    	data = {
    		'type': type,
    		'latlng': parseLatLng(layer.getLatLngs())
    	};
    	$("#gpoints").val( JSON.stringify(data) );
    }

    function editLayer(layer) {
    	data.latlng = parseLatLng(layer.getLatLngs());
    	$("#gpoints").val( JSON.stringify(data) );
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
    	var lat = $('#glat').val();
    	var lng = $('#glng').val();
    	var json = $('#gpoints').val();
    	//show polygon
    	if(json) {
    		var point = $.parseJSON( $('#gpoints').val() );
	    	var type = point.type || '';
	    	var bounds = point.latlng || point;
	    	drawPolygon(type, bounds);
    	}
    	//show marker
    	if(lat&&lng) {
    		L.marker([lat, lng]).addTo(map);
    	}
    }

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

    function getMarker(layer) {
    	var points = layer.getLatLng();
    	$('#glat').val(points.lat);
    	$('#glng').val(points.lng);
    }

	$(document).ready(function() {
		map = new L.Map('g-google-map-container', {
		    center: new L.LatLng(10.762622, 106.660172),
		    zoom: 18,
		    fullscreenControl: true
		});

		var osm = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
		var ggl = new L.Google('ROADMAP');
		map.addLayer(ggl);
		map.addControl(new L.Control.Layers( {'OSM':osm, 'Google':ggl}, {}));

		var drawnItems = new L.FeatureGroup();
		map.addLayer(drawnItems);

		//Autocomplete
        var GoogleSearch = L.Control.extend({
			onAdd: function() {
				var element = document.createElement("input");
				element.id = "search-box";
				element.setAttribute("class", "form-control");
				return element;
			}
	    });

	    (new GoogleSearch).addTo(map);

	    var input = document.getElementById("search-box");

	    var searchBox = new google.maps.places.SearchBox(input);

	    searchBox.addListener('places_changed', function() {
	       	var places = searchBox.getPlaces();
	       	if (places.length == 0) {
		        return;
		    }
		    map.setView(new L.LatLng(places[0].geometry.location.lat(), places[0].geometry.location.lng()));
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