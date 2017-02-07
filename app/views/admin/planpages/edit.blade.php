@extends('admin.layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			    <span class="pull-left">Thông tin Quy hoạch thi tiết</span>
			</div>
			<div class="panel-body">
			    {{ Form::open(array( 'url' => 'admin/planpages/edit' )) }}
			        
			        <!--left-->
			        <div class="col-md-6">
			            <div class="form-group">
			                <label for="name">Tên Đoạn đường / Khu vực</label>
			                <p>{{ $plan->name }}</p>
			                <input type="hidden" id="id" name="id" value="{{ $plan->id }}"/>
			            </div>

			            <div class="form-group">
			                <label for="order">Số tờ</label>
			                <input type="text" id="order" class='form-control' name="order" value="{{ $plan->order }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="plan_map_id">Chọn khu vực Quy Hoạch</label>
			                {{ Form::select('plan_map_id', PlanMap::getOptions(), null, ['class'=>'plan_map_id form-control']) }}
			            </div>
			        </div>
			        
			        <!--right-->
			        <div class="col-md-6"></div>
			        
			        
			        
			        <div class="col-md-12">
			            <div class="form-group">
			                <div class="pull-right">
			                    <button type='submit' class='btn btn-primary'>Cập nhật</button>
			                    <a href="{{ URL::to('admin/planpages') }}" class='btn btn-default'>Bỏ qua</a>
			                </div>
			            </div>
			        </div>
			    {{ Form::close() }}
			</div>
		</div>
	</div>
</div>

{{ HTML::script('admin/js/custom/province.js') }}        
@endsection