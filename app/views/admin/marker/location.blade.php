@extends('admin.layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading hidden">
			    <span class="pull-left">Thông tin các địa chỉ trên đoạn đường</span>
			</div>
			<div class="panel-body">
			    {{ Form::open(array( 'url' => 'admin/markers/edit?page=' . $page, 'enctype'=>'multipart/form-data', 'class' => 'markers-form', 'id' => 'markers-form', 'target' => '_parent' )) }}
			        <div class="col-md-12">
			            <div class="form-group">
			                <div class="pull-right">
			                    <button type='submit' class='btn btn-primary submit'>Cập nhật</button>
			                    <a href="{{ URL::to('admin/markers?page=' . $page) }}" class='btn btn-default'>Bỏ qua</a>
			                </div>
			            </div>
			        </div>
			        <!--left-->
			        <div class="col-md-6 hidden">
			            <div class="form-group">
			                <label for="name">Địa chỉ</label>
			                <input type="text" name="name" class="form-control" placeholder="địa chỉ nhà" value="{{ $marker->name }}"/>
			                <input type="hidden" name="place_id" class="form-control" id='place_id'  value="{{ $marker->place_id }}"/>
			                <input type="hidden" name="id" class="form-control" id='id'  value="{{ $marker->id }}"/>
			                <input type="hidden" name="street_id" class="form-control" id='street_id'  value="{{ $marker->street_id }}"/>
			            
			            </div>
			            
			            <div class="form-group">
			                <label for="used_acreage">Diện tích sử dụng(m<sup>2</sup>)</label>
			                <input type="text" name="used_acreage" class="form-control" placeholder="m2" value="{{ $marker->used_acreage }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="land_acreage">Diện tích đất(m<sup>2</sup>)</label>
			                <input type="text" name="land_acreage" class="form-control" placeholder="m2" value="{{ $marker->land_acreage }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="sale_price">Giá rao bán</label>
			                <input type="text" name="sale_price" class="form-control" placeholder="Giá rao bán" value="{{ $marker->sale_price }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="state_price">Đơn giá nhà nước(vnd/m2)</label>
			                <input type="text"  name="state_price" class="form-control" placeholder="Đơn giá nhà nước" value="{{ $marker->state_price }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="price">Đơn giá thị trường(vnd/m2)</label>
			                <input type="text"  name="price" class="form-control" placeholder="Đơn giá thị trường" value="{{ $marker->price }}"/>
			            </div>
			            
			            
			            <div class="form-group">
			            	<label for="plan_map_id">Bản đồ quy hoạch</label>
			            	{{ Form::select('plan_map_id', PlanMap::getOptions(), $marker->plan_map_id, ['class'=>'form-control', 'id'=>'plan_map_id']) }}
			            </div>
			        </div>
			        
			        <!--right-->
			        <div class="col-md-6 hidden">
			        	<div class="form-group">
			                <label for="province_id">Thành phố/Tỉnh thành</label>
			                {{ Form::select('province_id', Province::getOptions(), $marker->province_id, ['class'=>'province_id form-control']) }}
			            </div>
			            
			            <div class="form-group">
			                <label for="district_id">Quận/Huyện</label>
			                <select name="district_id"  class="district_id form-control">
			                	<option value=""></option>
			                </select>
			                <input type="hidden" id="district_id" class="form-control" value="{{ $marker->district_id }}">
			            </div>
			            
			            <div class="form-group">
			                <label for="ward_id">Phường/Xã</label>
			                <select name="ward_id"  class="ward_id form-control">
			                	<option value=""></option>
			                </select>
			                <input type="hidden" id="ward_id" class="form-control" value="{{ $marker->ward_id }}">
			            </div>
			            
			            <div class="form-group">
			                <label for="class_field">Phân loại</label>
			                {{ Form::select('class_field', ['1' => 'Số thửa', '2' => 'Diện tích'], $marker->class_field, ['class'=>'form-control']) }}
			            </div>
			            
			            <div class="form-group">
			                <label for="plan_field">Diện tích/Số thửa</label>
			                <input type="text" name="plan_field" class="form-control"value="{{ $marker->plan_field }}">
			            </div>
			        </div>
			        
			        <div class="col-md-12 hidden">
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
			                    <input type="text" placeholder='Lat'  name="lat" class='form-control point-lat' value="{{ $marker->lat }}"/>
			                    <input type="text" placeholder='Lng'  name="lng" class='form-control point-lng' value="{{ $marker->lng }}"/>
			                </div>
			            </div>
			        </div>
			        
			        <div class="col-md-12">
			            <div class="form-group">
			                <div class="pull-right">
			                    <button type='submit' class='btn btn-primary submit'>Cập nhật</button>
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
    	// jQuery('#street_id').change(function() {
    	// 	var val = jQuery(this).val();
    	// 	jQuery.ajax({
    	// 		url: '/public/admin/info/price',
    	// 		type: 'post',
    	// 		data: {
    	// 			id:val
    	// 		},
    	// 		success: function(response) {
    	// 			if(response) {
    	// 				jQuery('#price').val(response.price);
    	// 				jQuery('#state_price').val(response.state_price);
    	// 			}
    	// 		}
    	// 	});
    	// });

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