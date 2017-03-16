<div id="modal-xemquyhoach" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">     
      <div class="modal-body">
        <a href="#" class="close-btn" data-dismiss="modal" ></a>
        <div class="ban-do-quy-hoach">
            <div id="map_plan_pop_up" class="map_plan_pop_up" ></div>
            <!-- <div class="menu">
                <div class="icon zoom-in"><img src="{{ URL::asset('default/images/modal-xemquyhoach-zoom-in.png') }}"/></div>
                <div class="icon zoom-out"><img src="{{ URL::asset('default/images/modal-xemquyhoach-zoom-out.png') }}"/></div>
                <div class="icon full-screen"><img src="{{ URL::asset('default/images/modal-xemquyhoach-full-screen.png') }}"/></div>
                <div class="icon position"><img src="{{ URL::asset('default/images/modal-xemquyhoach-position.png') }}"/></div>
            </div> -->
        </div>
    </div>
  </div>
</div>

<script>
    var map = null;
    function init(folderMapName, callback) {
      if(!map) {
          var mapMinZoom = 0;
          var mapMaxZoom = 7;
          map = L.map('map_plan_pop_up', {
            maxZoom: mapMaxZoom,
            minZoom: mapMinZoom,
            fullscreenControl: true
          }).setView([0, 0], mapMaxZoom);

          L.tileLayer('/public/plan/'+folderMapName+'/{z}/{x}/{y}.png', {
            minZoom: mapMinZoom, 
            maxZoom: mapMaxZoom,
            attribution: 'dinhgiatructuyen.vn',
            noWrap: true,
            tms: false
          }).addTo(map);
      } 
      callback();
    }
    $(document).ready(function(){
        $('#plan-btn-popup').click(function(e) {
            e.preventDefault();
            var folderMapName = $(this).attr('href');
            init(folderMapName, function() {
                $('#modal-xemquyhoach').modal('show');
            });
             
        });                    
    });
</script>