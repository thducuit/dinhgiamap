@extends('admin.layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			    <span class="pull-left">Thông tin Quy hoạch</span>
			</div>
			<div class="panel-body">
			    {{ Form::open(array( 'url' => 'admin/maps/edit' )) }}
			        
			        <!--left-->
			        <div class="col-md-6">
			            <div class="form-group">
			                <label for="name">Tên Đoạn đường / Khu vực</label>
			                <p>{{ $plan->name }}</p>
			                <input type="hidden" id="id" name="id" value="{{ $plan->id }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="province_id">Thành phố/Tỉnh thành</label>
			                {{ Form::select('province_id', Province::getOptions(), null, ['class'=>'province_id form-control']) }}
			            </div>
			            
			            <div class="form-group">
			                <label for="district_id">Quận/Huyện</label>
			                <select name="district_id"  class="district_id form-control">
			                	<option value="0"></option>
			                </select>
			                <input type="hidden" id="district_id" class="form-control" value="{{  $plan->district_id }}">
			            </div>
			            
			            <div class="form-group">
			                <label for="ward_id">Phường/Xã</label>
			                <select name="ward_id"  class="ward_id form-control">
			                	<option value="0"></option>
			                </select>
			                <input type="hidden" id="ward_id" class="form-control" value="{{  $plan->ward_id }}">
			            </div>
			        </div>
			        
			        <!--right-->
			        <div class="col-md-6"></div>
			        
			        
			        
			        <div class="col-md-12">
			            <div class="form-group">
			                <div class="pull-right">
			                    <button type='submit' class='btn btn-primary'>Cập nhật</button>
			                    <a href="{{ URL::to('admin/maps') }}" class='btn btn-default'>Bỏ qua</a>
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