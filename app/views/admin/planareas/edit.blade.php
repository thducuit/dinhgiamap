@extends('admin.layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			    <span class="pull-left">Thông tin thửa Quy hoạch</span>
			</div>
			<div class="panel-body">
			    {{ Form::open(array( 'url' => 'admin/planareas/edit/' . $plan_page_id, 'class' => 'markers-form', 'enctype'=>'multipart/form-data', 'id'=>'planareas-form' )) }}
			        <div class="col-md-12">
			            <div class="form-group">
			                <div class="pull-right">
			                    <button type='submit' class='btn btn-primary submit'>Cập nhật</button>
			                    <a href="{{ URL::to('admin/planareas/index/' . $plan_page_id) }}" class='btn btn-default'>Bỏ qua</a>
			                </div>
			            </div>
			        </div>
			        <!--left-->
			        <div class="col-md-6">
			            <div class="form-group">
			                <label for="name">Tờ Quy hoạch</label>
			                <p>{{ $page_name }}</p>
			                <input type="hidden" name="plan_page_id" class="form-control" id='plan_page_id'  value="{{ $plan_page_id }}"/>
			                <input type="hidden" name="id" class="form-control" id='id'  value="{{ $plan->id }}"/>
			            </div>

			            <div class="form-group">		
			                <label for="order">Số thửa</label>
			                <input type="text" id="order" class='form-control' name="order" value="{{ $plan->order }}"/>
			            </div>

			            <div class="form-group">		
			                <label for="address">Địa chỉ</label>
			                <input type="text" id="address" class='form-control' name="address" value="{{  $plan->address  }}"/>
			            </div>

			        </div>	
			        
			        <!--right-->
			        <div class="col-md-6">
			        </div>
			        
			        <div class="col-md-12">
			        	<div class="form-group">
			        	<label for="points">Bản đồ</label>
			        		<div id="google-map-container"></div>
			        		<input class="form-control" type="hidden" id="points" name="points" value="{{ htmlentities($plan->position) }}"></input>
			        		<input class="form-control" type="hidden" id="place_id" name="place_id" value="{{ $plan->place_id }}"></input>
			        	</div>
			            
			            <div class="form-group google-map-point">
			            	<label>Tọa độ</label>
			                <div class="m-google-map-point point-start">
			                    <input type="text" placeholder='Lat'  name="lat" id="lat" class='form-control point-lat' value="{{ $plan->lat }}"/>
			                    <input type="text" placeholder='Lng'  name="lng" id="lng" class='form-control point-lng' value="{{ $plan->lng }}"/>
			                </div>
			            </div>

			            <div class="form-group">
			        		<label for="gpoints">Google map</label>
			        		<div id="g-google-map-container" style="height:1000px"></div>
			        		<input class="form-control" type="hidden" id="gpoints" name="gpoints" value="{{ htmlentities($plan->gposition) }}"></input>
			        	</div>
			            
			            <div class="form-group google-map-point">
			                <label>Tọa độ</label>
			                <div class="m-google-map-point point-start">
			                    <input type="text" placeholder='Lat'  name="glat" id="glat" class='form-control gpoint-lat' value="{{ $plan->glat }}"/>
			                    <input type="text" placeholder='Lng'  name="glng" id="glng" class='form-control gpoint-lng' value="{{ $plan->glng }}"/>
			                </div>
			            </div>
			        </div>
			        
			        
			    {{ Form::close() }}
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var planpage = "{{ $page_name }}"
</script>
{{ HTML::script('admin/js/custom/planareas.js') }}    
{{ HTML::script('admin/js/custom/gplanareas.js') }}    
@endsection