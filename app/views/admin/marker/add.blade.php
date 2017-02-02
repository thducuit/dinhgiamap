@extends('admin.layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			    <span class="pull-left">Thông tin các địa chỉ trên đoạn đường</span>
			</div>
			<div class="panel-body">
			    {{ Form::open(array( 'url' => 'admin/markers/add', 'class' => 'markers-form', 'enctype'=>'multipart/form-data', 'id'=>'markers-form' )) }}
			        <div class="col-md-12">
			            <div class="form-group">
			                <div class="pull-right">
			                    <button type='submit' class='btn btn-primary submit'>Thêm</button>
			                    <a href="{{ URL::to('admin/markers') }}" class='btn btn-default'>Bỏ qua</a>
			                </div>
			            </div>
			        </div>
			        <!--left-->
			        <div class="col-md-6">
			            <div class="form-group">
			                <label for="name">Địa chỉ</label>
			                <input type="text" name="name" class="form-control" placeholder="địa chỉ nhà" value="{{ Input::old('name') }}"/>
			                <input type="hidden" name="place_id" class="form-control" id='place_id'  value="{{ Input::old('place_id') }}"/>
			            	<input type="hidden" name="street_id" class="form-control" id='street_id'  value="{{ Input::old('street_id') }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="used_acreage">Diện tích sử dụng(m<sup>2</sup>)</label>
			                <input type="text" name="used_acreage" class="form-control" placeholder="m2" value="{{ Input::old('used_acreage') }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="land_acreage">Diện tích đất(m<sup>2</sup>)</label>
			                <input type="text" name="land_acreage" class="form-control" placeholder="m2" value="{{ Input::old('land_acreage') }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="sale_price">Giá rao bán</label>
			                <input type="text" name="sale_price" class="form-control" placeholder="Giá rao bán" value="{{ Input::old('sale_price') }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="state_price">Đơn giá nhà nước(vnd/m2)</label>
			                <input type="text" id="state_price"  name="state_price" class="form-control" placeholder="Đơn giá nhà nước" value="{{ Input::old('state_price') }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="price">Đơn giá thị trường(vnd/m2)</label>
			                <input type="text" id="price" name="price" class="form-control" placeholder="Đơn giá thị trường" value="{{ Input::old('price') }}"/>
			            </div>
			            
			            <!-- <div class="form-group">
			            	<label for="street_id">Khu vực/Đoạn đường</label>
			            	{{ Form::select('street_id', Street::getOptions(), null, ['class'=>'form-control', 'id'=>'street_id']) }}
			            </div> -->
			        </div>
			        
			        <!--right-->
			        <div class="col-md-6">
			        	<div class="form-group">
			                <label for="province_id">Thành phố/Tỉnh thành</label>
			                {{ Form::select('province_id', Province::getOptions(), null, ['class'=>'province_id form-control']) }}
			            </div>
			            
			            <div class="form-group">
			                <label for="district_id">Quận/Huyện</label>
			                <select name="district_id"  class="district_id form-control">
			                	<option value="0"></option>
			                </select>
			                <input type="hidden" id="district_id" class="form-control" value="{{ Input::old('district_id') }}">
			            </div>
			            
			            <div class="form-group">
			                <label for="ward_id">Phường/Xã</label>
			                <select name="ward_id"  class="ward_id form-control">
			                	<option value="0"></option>
			                </select>
			                <input type="hidden" id="ward_id" class="form-control" value="{{ Input::old('ward_id') }}">
			            </div>
			            
			            <div class="form-group">
			                <label for="class_field">Phân loại</label>
			                {{ Form::select('class_field', ['1' => 'Số thửa', '2' => 'Diện tích'], Input::old('class_field'), ['class'=>'form-control']) }}
			            </div>
			            
			            <div class="form-group">
			                <label for="plan_field">Diện tích/Số thửa</label>
			                <input type="text" name="plan_field" class="form-control" value="{{ Input::old('plan_field') }}">
			            </div>
			        </div>
			        
			        <div class="col-md-12">
			        	<div class="form-group">
				        	<label for="plan_photo">Hình ảnh quy hoạch(dạng zip)</label>
				        	<input type="file" name="plan_photo" class="form-control">
				        </div>
			        </div>
			        
			        <div class="col-md-12">
			        	<input type="text" class="form-control" id="google-map-point-search" placeholder="tìm kiếm địa chỉ nhà"/>
			        	<div class="form-group"><div id="google-map-container"></div></div>
			            
			            <div class="form-group google-map-point">
			                <label>Tọa độ</label>
			                
			                <div class="m-google-map-point point-start">
			                    <input type="text" placeholder='Lat'  name="lat" class='form-control point-lat' value="{{ Input::old('lat') }}"/>
			                    <input type="text" placeholder='Lng'  name="lng" class='form-control point-lng' value="{{ Input::old('lng') }}"/>
			                </div>
			            </div>
			        </div>
			        
			        
			    {{ Form::close() }}
			</div>
		</div>
	</div>
</div>
{{ HTML::script('admin/js/custom/marker.js') }}
{{ HTML::script('admin/js/custom/province.js') }}
<script>
    var VLD_RQ = 'Vui lòng điền vào mục này',
        VLD_EM = 'Email chưa đúng !',
        VLD_NB = 'Nhập số !';
    jQuery(document).ready(function () {
    	jQuery('#street_id').change(function() {
    		var val = jQuery(this).val();
    		jQuery.ajax({
    			url: '/public/admin/info/price',
    			type: 'post',
    			data: {
    				id:val
    			},
    			success: function(response) {
    				if(response) {
    					jQuery('#price').val(response.price);
    					jQuery('#state_price').val(response.state_price);
    				}
    			}
    		});
    	});

        jQuery('#markers-form').validate({
            rules: {
                name: {
                    required: true
                },
				price: {
                    required: true,
                    number: true
                },
                state_price: {
                    required: true,
                    number: true
                }
            },
            messages: {
                name: {
                    required: VLD_RQ
                },
                price: {
                    required: VLD_RQ,
                    number: VLD_NB
                },
                state_price: {
                    required: VLD_RQ,
                    number: VLD_NB
                }
            }

        });

    })
</script>       
@endsection