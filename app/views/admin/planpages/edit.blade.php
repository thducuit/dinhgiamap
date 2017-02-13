@extends('admin.layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			    <span class="pull-left">Cập nhật tờ Quy hoạch</span>
			</div>
			<div class="panel-body">
			    {{ Form::open(array( 'url' => 'admin/planpages/edit/' . $plan_map_id)) }}
			        <div class="col-md-12">
			            <div class="form-group">
			                <div class="pull-right">
			                    <button type='submit' class='btn btn-primary'>Cập nhật</button>
			                    <a href="{{ URL::to('admin/planpages/index/' . $plan_map_id) }}" class='btn btn-default'>Bỏ qua</a>
			                </div>
			            </div>
			        </div>
			        <!--left-->
			        <div class="col-md-6">
			            <div class="form-group">
			                <label for="name">Tên Đoạn đường / Khu vực</label>
			                <p>{{ $map_name }}</p>
			                <input type="hidden" id="id" name="id" value="{{ $plan->id }}"/>
			            </div>

			            <div class="form-group">
			                <label for="order">Số tờ</label>
			                <input type="text" id="order" class='form-control' name="order" value="{{ $plan->order }}"/>
			            </div>
			        </div>
			        
			        <!--right-->
			        <div class="col-md-6"></div>
			        
			        <div class="col-md-12">
				        <div class="form-group">
				        	<label for="points">Bản đồ</label>
			        		<div id="google-map-container"></div>
			        		<input class="form-control" type="hidden" id="points" name="points" value="{{ htmlentities($plan->position) }}"></input>
			        	</div>
			        	<div class="form-group">
			        		 <label for="gpoints">Google map</label>
	                        <div id="g-google-map-container" style="height:1000px"></div>
	                        <input class="form-control" type="hidden" id="gpoints" name="gpoints" value="{{ htmlentities($plan->gposition) }}"></input>
	                    </div>
                    </div>
			    {{ Form::close() }}
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    var planpage = "{{ $map_name }}"
</script>
{{ HTML::script('admin/js/custom/planareas.js') }}        
{{ HTML::script('admin/js/custom/gplanareas.js') }}        
@endsection