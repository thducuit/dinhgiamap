@extends('admin.layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			    <span class="pull-left">Thông tin Đoạn đường / Khu vực</span>
			</div>
			<div class="panel-body">
			    {{ Form::open(array( 'url' => 'admin/streets/add', 'enctype'=>'multipart/form-data' )) }}
			        
			        <!--left-->
			        <div class="col-md-6">
			            <div class="form-group">
			                <label for="name">Tên Đoạn đường / Khu vực</label>
			                <input type="text" name="name" class="form-control" placeholder="tên" id="google-map-point-search" value="{{ Input::old('name') }}"/>
			                <input type="hidden" name="place_id" class="form-control" id="place_id" value="{{ Input::old('place_id') }}"/>
			            	<input type="hidden" placeholder='Lat'  name="start_lat" class='form-control point-start-lat' value="{{ Input::old('start_lat') }}"/>
			                <input type="hidden" placeholder='Lng'  name="start_lng" class='form-control point-start-lng' value="{{ Input::old('start_lng') }}"/>
			                <input type="hidden" placeholder='Lng' 	name="plan_id"  id="plan_id" class='form-control ' value="{{ $plan_id }}"/>
			            
			            </div>
			            
			            <div class="form-group">
			                <label for="price">Giá thị trường</label>
			                <input type="text" name="price" class="form-control" placeholder="Giá thị trường(VNĐ)" value="{{ Input::old('price') }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="price">Giá nhà nước</label>
			                <input type="text" name="state_price" class="form-control" placeholder="Giá nhà nước(VNĐ)" value="{{ Input::old('state_price') }}"/>
			            </div>

			            <!-- <div class="form-group">
				        	<label for="photo_plan">Hình ảnh quy hoạch</label>
				        	{{ Form::select('plan_id', Plan::getOptions(), null, ['class'=>'form-control', 'id'=>'plan_id']) }}
				        </div> -->
			        </div>
			        
			        <!--right-->
			        <div class="col-md-6"></div>
			        
			        <div class="col-md-12">
			            <!-- <div class="form-group google-map-point">
			                <label>Điểm đầu</label>
			                <div class="m-google-map-point point-start" id='point-start'>
			                    <input type="text" placeholder='Lat'  name="start_lat" class='form-control point-start-lat' value="{{ Input::old('start_lat') }}"/>
			                    <input type="text" placeholder='Lng'  name="start_lng" class='form-control point-start-lng' value="{{ Input::old('start_lng') }}"/>
			                </div>
			                <a href='#point-start'>Chọn</a>
			            </div>
			            <div class="clearfix"></div>
			            <div class="form-group google-map-point">
			                <label>Điểm cuối</label>
			                <div class="m-google-map-point point-end" id='point-end'>
			                    <input type="text" placeholder='Lat'  name="end_lat" class='form-control point-end-lat' value="{{ Input::old('end_lat') }}"/>
			                    <input type="text" placeholder='Lng'  name="end_lng" class='form-control point-end-lng' value="{{ Input::old('end_lng') }}"/>
			                </div>
			                <a href='#point-end'>Chọn</a>
			            </div>
			            <div class="clearfix"></div> -->

			            <div class="form-group">
			            	<div id="google-map-container"></div>
			            	<input class="form-control" type="text" id="points" name="points"></input>
			            </div>
			        </div>
			        
			        <div class="col-md-12">
			            <div class="form-group">
			                <div class="pull-right">
			                    <button type='submit' class='btn btn-primary'>Thêm</button>
			                    <a href="{{ URL::to('admin/plans') }}" class='btn btn-default'>Bỏ qua</a>
			                </div>
			            </div>
			        </div>
			    {{ Form::close() }}
			</div>
		</div>
	</div>
</div> 
   
{{ HTML::script('admin/js/custom/draw.js') }}       
@endsection