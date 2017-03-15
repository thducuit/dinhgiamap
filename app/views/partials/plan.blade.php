<div id="modal-xemquyhoach" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">     
      <div class="modal-body">
        <a href="#" class="close-btn" data-dismiss="modal" ></a>
        <div class="ban-do-quy-hoach">
            <img src="{{ URL::asset('default/images/popup-xem-quy-hoach.jpg') }}" alt="popup-xem-quy-hoach.jpg">
            <div class="menu">
                <div class="icon zoom-in"><img src="{{ URL::asset('default/images/modal-xemquyhoach-zoom-in.png') }}"/></div>
                <div class="icon zoom-out"><img src="{{ URL::asset('default/images/modal-xemquyhoach-zoom-out.png') }}"/></div>
                <div class="icon full-screen"><img src="{{ URL::asset('default/images/modal-xemquyhoach-full-screen.png') }}"/></div>
                <div class="icon position"><img src="{{ URL::asset('default/images/modal-xemquyhoach-position.png') }}"/></div>
            </div>
        </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        $('#plan-btn-popup').click(function(e) {
            e.preventDefault();
            $('#modal-xemquyhoach').modal('show'); 
        });
                            
    });
</script>