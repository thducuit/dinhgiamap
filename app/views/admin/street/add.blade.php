@extends('admin.layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			    <span class="pull-left">Thông tin đoạn đường</span>
			</div>
			<div class="panel-body">
			    {{ Form::open(array( 'url' => 'admin/streets/add' )) }}
			        
			        <!--left-->
			        <div class="col-md-6">
			            <div class="form-group">
			                <label for="name">Đường</label>
			                <input type="text" name="name" class="form-control" placeholder="tìm kiếm tên đường" id="google-map-point-search" value="{{ Input::old('name') }}"/>
			                <input type="hidden" id="place_id" name="place_id"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="price">Giá</label>
			                <input type="text" name="price" class="form-control" placeholder="Giá" value="{{ Input::old('price') }}"/>
			            </div>
			            
			            
			            <!--<div class="form-group">-->
			            <!--    <label for="district">Quận</label>-->
			            <!--</div>-->
			            
			            
			        </div>
			        
			        <!--right-->
			        <div class="col-md-6"></div>
			        
			        <div class="col-md-12">
			            <div class="form-group google-map-point">
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
			            <div class="clearfix"></div>
			            <div class="form-group">
			            	<div id="google-map-container"></div>
			            </div>
			        </div>
			        
			        <div class="col-md-12">
			            <div class="form-group">
			                <div class="pull-right">
			                    <button type='submit' class='btn btn-primary'>Thêm</button>
			                    <a href="{{ URL::to('admin/streets') }}" class='btn btn-default'>Bỏ qua</a>
			                </div>
			            </div>
			        </div>
			    {{ Form::close() }}
			</div>
		</div>
	</div>
</div>
{{ HTML::script('admin/js/custom/street.js') }}
        
@endsection