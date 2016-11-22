(function($, google, url) {
    'use strict';
    
    
    $(document).ready(function() {
        var polygons = [];
        var shapes = [];

        var mapsProperties = {
            center: new google.maps.LatLng(10.762622, 106.660172), //HCM city
            zoom: 17,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var mapObject = new google.maps.Map(document.getElementById('google-map-container'), mapsProperties);
        
        var drawingManager = new google.maps.drawing.DrawingManager({
          drawingMode: google.maps.drawing.OverlayType.MARKER,
          drawingControl: true,
          drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: [/*'marker',*/ /*'circle',*/ 'polygon', 'polyline', 'rectangle']
          },
          markerOptions: {icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'},
          circleOptions: {
            fillColor: '#ffff00',
            fillOpacity: 0.2,
            strokeWeight: 2,
            clickable: false,
            editable: true,
            zIndex: 1
          }
        });
        drawingManager.setMap(mapObject);

        google.maps.event.addListener(drawingManager, 'polygoncomplete', function (event) {
            // Get circle center and radius
            var center =  (event.getPath().getArray());
            $("#points").val( JSON.stringify(center) );
            //var radius = event.type;
            //pushShape(event);
        });
    
        google.maps.event.addListener(drawingManager, 'polylinecomplete', function (event) {
            // Get circle center and radius
            var center =  (event.getPath().getArray());
            $("#points").val( JSON.stringify(center) );
            //var radius = event.type;
            //pushShape(event);
        });
    
        
        google.maps.event.addListener(drawingManager, 'rectanglecomplete', function (event) {
            // Get circle center and radius
            var center =  [];
            var ne = event.getBounds().getNorthEast();
            center.push({"lat":ne.lat(),"lng":ne.lng()});
            var sw = event.getBounds().getSouthWest();
            center.push({"lat":sw.lat(),"lng":sw.lng()});
            $("#points").val( JSON.stringify(center) );
            //var radius = event.type;
            //pushShape(event);
        }); 

        google.maps.event.addListener(drawingManager, "overlaycomplete", function (event) {
            pushShape(event)

        });

        function pushShape(event) {
            var newShape = event.overlay;
            newShape.type = event.type;
            shapes.push(newShape);
            if (drawingManager.getDrawingMode()) {
                drawingManager.setDrawingMode(null);
            }
        }

        google.maps.event.addListener(drawingManager, "drawingmode_changed", function () {
            if (drawingManager.getDrawingMode() != null) {
                for (var i = 0; i < shapes.length; i++) {
                    shapes[i].setMap(null);
                }
                shapes = [];
            }
        });

        var autocomplete = new google.maps.places.Autocomplete(document.getElementById('google-map-point-search'));
        autocomplete.bindTo('bounds', mapObject);
        
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            mapObject.setCenter(place.geometry.location);
            $('.point-start-lat').val( place.geometry.location.lat() );
            $('.point-start-lng').val( place.geometry.location.lng() );
            $('#place_id').val(place.place_id);
        });

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
                    var color = id===index ? '#FF0000' : 'blue';
                    var triangleCoords = JSON.parse(value);
                    polygons[index] = new google.maps.Polygon({
                                      paths: triangleCoords,
                                      strokeColor: color,
                                      strokeOpacity: 0.5,
                                      strokeWeight: 1,
                                      fillColor: color,
                                      fillOpacity: 0.35
                                    });
                    polygons[index].setMap(mapObject);
                }else{
                    polygons[index] = null;
                }
            });
        }


        
        var imageMapType;

        function getPlan() {
            var id = parseInt($("#plan_id").val());
            if(id) {
                $.ajax({
                    url: url.plan,
                    type: 'post',
                    data: {
                        id:id
                    },
                    success: function(response) {
                        if(response) {
                            createMapImageType(response);
                        }
                    }
                });
            }
        }

        function appendClearPolygonButton() {
            $('#google-map-container').append('');
        }

        $('.btn-default').click(function() {
            for (var i = 0; i < shapes.length; i++) {
                shapes[i].setMap(null);
            }
            shapes = [];
        });

        function init() {
            if( $('#place_id').val() ) {
                mapObject.setCenter( new google.maps.LatLng($('.point-start-lat').val(), $('.point-start-lng').val()) );
            }

            //appendClearPolygonButton();
            getAreas();
            getPlan();
        }

        function createMapImageType(object) {
            var bounds = object.position;
            var name = object.name;
            var imageMapType = new google.maps.ImageMapType({
                getTileUrl: function(coord, zoom) {
                    if (zoom < 17 || zoom > 20  ) {
                  return null;
                }
                console.log(name, coord);
                return ['/public/upload/', name, '/',
                    zoom, '/', coord.x, '/', coord.y, '.png'].join('');
              },
              tileSize: new google.maps.Size(256, 256)
            });
            mapObject.overlayMapTypes.push(imageMapType);
        }



        init();
            
    });
})(jQuery, google, url);