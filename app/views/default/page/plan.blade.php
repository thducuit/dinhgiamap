@extends('default.layouts.default')
@section('content')

<!--
/*==============================*\
MAIN 
/*==============================*\
-->
<div id="main" class="screen">
  <div class="main_wrapper">

    <div class="page_xemquihoach_wrapper clearfix">
      <div class="page_xemquihoach_left screen"></div>
      <div class="page_xemquihoach_right">
        <div class="page_xemquihoach_right_inner">
          <div class="xemquihoach_header">
            <p><strong>xem quy hoạch 1 địa điểm tài sản</strong></p>
            <p>(Chọn lựa các thông tin bên dưới để xem qui hoạch)</p>
          </div>
          {{ Form::open(array('url'=>'/xem-quy-hoach.html', 'method'=>'post')) }}
          <!--.errors-->
          @if( $errors->has() )
          <div class="row the-error">
            <div class="col-md-12">
              @foreach( $errors->all() as $error )
              <p class="error">{{ $error }} </p>
              @endforeach
            </div>
          </div>
          @endif
          <!--/.errors-->
          <!-- Filter -->
          <div class="filter_group clearfix">
            <div class="filter_col">
              <label>Tỉnh/Thành Phố</label>
              {{ Form::select('province_id', Province::getOptions(), Input::old('province_id'), ['class'=>'province_id']) }}
            </div>
            <div class="filter_col">
              <label>Quận/Huyện</label>
              <select name="district_id"  class="district_id">
                <option>Quận/Huyện</option>
              </select>
              <input type="hidden" id="district_id" class="form-control" value="{{ Input::old('district_id') }}">
            </div>
            <div class="filter_col">
              <label>Phường/Xã</label>
              <select name="ward_id"  class="ward_id">
                <option>Phường/Xã</option>
              </select>
              <input type="hidden" id="ward_id" class="form-control" value="{{ Input::old('ward_id') }}">
            </div>
            <!--						<div class="filter_col">
                                        <label>Phân loại</label>
                                        <select>
                                            <option>Số thửa</option>
                                            <option>Số tờ</option>
                                        </select>
                                    </div>-->

            <div class="filter_col">
              <label></label>
              <input type="radio" class="plan-type" name="type" value="0">Địa chỉ
              <input type="radio" class="plan-type" name="type" value="1" checked>Số tờ/thửa
            </div>  
            <div class="filter_col address hidden">
              <label></label>
              <input type="text" placeholder="Nhập địa chỉ" name="soTo" value="{{ Input::old('diaChi') }}">
            </div>
            <div class="filter_col page">
              <label></label>
              <input type="text" placeholder="Nhập số tờ" name="soTo" value="{{ Input::old('soTo') }}">
            </div>
            <div class="filter_col page">
              <label></label>
              <input type="text" placeholder="Nhập số thửa" name="soThua" value="{{ Input::old('soThua') }}">
            </div>
            <?php /*
            <div class="filter_col">
              <div class="popup_button_group">

                <button type="submit" id="btn_submit_xem_qui_hoach" class="btn btn_icon btn_gradient2"><i class="icon_xemquihoach"></i><span>Xem qui hoạch</span></button>                               
              </div>
            </div>
            <div class="filter_col">                        
              <a href="{{ URL::to('/tai-san-dang-giao-dich.html') }}" class="btn btn_icon btn_gradient4"><i class="icon_xemquihoach"></i><span>Tài sản đang giao dịch</span></a>                        
            </div>
             * 
             */?>
            <div class="filter_col">
              <div class="popup_button_group">
                <button type="submit" id="btn_submit_xem_qui_hoach" class="grey-btn page_xemquihoach_wrapper__grey-btn"><img src="{{ URL::asset('default/images/w5.png') }}"> Xem quy hoạch</button>                               
              </div>
            </div>
            <!-- <div class="filter_col">                        
              <a class="emeral-btn page_xemquihoach_wrapper__emeral-btn" href="{{ URL::to('/tai-san-dang-giao-dich.html') }}"><img src="{{ URL::asset('default/images/w4.png') }}"> TÀI SẢN ĐANG GIAO DỊCH</a>              
            </div> -->
            
            
          
          </div>
          
          {{ Form::close() }}

          <!-- Map -->
          <div id="map_xemquihoach">
            <div class="map_xemquihoach_inner">
              <div id="map_photo" style="height: 410px"></div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</div>
{{ HTML::script('admin/js/custom/province.js') }} 
<script>
  
</script>

<?php if (Session::get('name')) {
  ?>
  <script>
    var folderMapName = '<?php echo Session::get('name'); ?>';
    var positionSoTo = null;
    var markerPosition = null;
    var addressSoThua = null;
    var placeIdSoThua = null;
  <?php if (Session::get('positionSoTo')) { ?>
      positionSoTo = <?php echo Session::get('positionSoTo'); ?>;
  <?php } ?>
  <?php if (Session::get('coordinateSoThua')) {
    $coordinate = Session::get('coordinateSoThua');
    ?>

      markerPosition = [<?php echo $coordinate['lat']; ?>, <?php echo $coordinate['lng']; ?>];
  <?php } ?>
  <?php if (Session::get('addressSoThua')) { ?>
      addressSoThua = '<?php echo Session::get('addressSoThua') ?>';
  <?php } ?>
  <?php if (Session::get('placeIdSoThua')) { ?>
      placeIdSoThua = '<?php echo Session::get('placeIdSoThua') ?>';
  <?php } ?>

  </script>    
  {{ HTML::script('default/js/xem-quy-hoach.js') }} 
<?php } ?>
@endsection