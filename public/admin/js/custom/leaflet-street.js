(function($, url) {
	var layers = [];
	var layer = null;
	var options = {
        minZoom: 10,
        maxZoom: 30,
        opacity: 0.9,
        //tms: false
    };
    var map = null;
    var data = {};

    var polygons = [];

	function getPlanImage() {
        $.ajax({
            url: url.plan,
            type: 'post',
            success: function(response) {
                if(response) {
                    showImageOverlay(response);
                }
            }
        });
    }

    function showImageOverlay(response) {
    	if(!response || !response.length)
    		return;
    	response.forEach(function(item) {
    		layers[item.name] = L.tileLayer(['/public/upload/', item.name, '/{z}/{x}/{y}.png'].join(''), options).addTo(map);	
    	});
    }

    function getPlaceId(place_id) {
    	$('#place_id').val(place_id);
    } 

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

    function getAreas () {
        $.ajax({
            url: url.street,
            type: 'get',
            success: function(response) {
                if(response) {
                    drawPolygon(response);
                }
            }
        })    
    }

    function drawPolygon(response) {
        var id = $('#id').val();
        $.map(response, function(value, index) {
            if(value) {
                var color = id===index ? '#000' : '#FF0000';
                var triangleCoords = JSON.parse(value);
                // polygons[index] = new google.maps.Polygon({
                //                   paths: triangleCoords.latlng,
                //                   strokeColor: color,
                //                   strokeOpacity: 0.5,
                //                   strokeWeight: 1,
                //                   fillColor: color,
                //                   fillOpacity: 0.35
                //                 });
                // polygons[index].setMap(map);
                if(triangleCoords.latlng) {
                	polygons[index] = L.polygon(triangleCoords.latlng, {color: color, weight:'1px'}).addTo(map)
                }
                
            }else{
                polygons[index] = null;
            }
        });
    }


	$(document).ready(function() {
		map = new L.Map('google-map-container', {
		    center: new L.LatLng(10.762622, 106.660172),
		    zoom: 18,
		    fullscreenControl: true
		});

		var osm = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
		var ggl = new L.Google('ROADMAP');
		map.addLayer(ggl);
		map.addControl(new L.Control.Layers( {'OSM':osm, 'Google':ggl}, {}));


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
		    getPlaceId(places[0].place_id);
		});

		//draw image overlay
		getPlanImage();

		//leaflet draw control
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

		// leaflet draw action :created
		map.on('draw:created', function (e) {
			var type = e.layerType,
				layer = e.layer;

			//console.log(layer.getLatLngs());

			// if (type === 'marker') {
			// 	layer.bindPopup('A popup!');
			// }

			drawnItems.addLayer(layer);

			getLayer(type, layer);
		});

		// leaflet draw action :edited
		map.on('draw:edited', function (e) {
		    var layers = e.layers;
		    layers.eachLayer(function (layer) {
		        //do whatever you want, most likely save back to db
		        editLayer(layer);
		    });
		});
		
		
		getAreas ();
        
	});
})(jQuery, url);