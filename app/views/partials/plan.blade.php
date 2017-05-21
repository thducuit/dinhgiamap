<div id="modal-xemquyhoach" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <a href="#" class="close-btn" data-dismiss="modal" ></a>
        <div class="ban-do-quy-hoach">
          <div class="map-plan-search-tool">
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
              <div class="filter_col">
                <div class="popup_button_group">
                  <button type="submit" id="btn_submit_xem_qui_hoach" class="grey-btn page_xemquihoach_wrapper__grey-btn"><img src="{{ URL::asset('default/images/w5.png') }}"> Xem quy hoạch</button>
                </div>
              </div>
            </div>
          </div>
          <div id="map_plan_pop_up" class="map_plan_pop_up" >
            <p>Chưa cập nhật bản đồ quy hoạch</p>
          </div>
        </div>
      </div>
    </div>
  </div>