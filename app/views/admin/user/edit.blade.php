@extends('admin.layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			    <span class="pull-left">Cập nhật thành viên</span>
			</div>
			<div class="panel-body">
			    {{ Form::open(array( 'url' => 'admin/users/edit', 'class' => 'markers-form', 'enctype'=>'multipart/form-data' )) }}
			        
			        <!--left-->
			        <div class="col-md-6">
			            <div class="form-group">
			                <label for="email">Email</label>
			                <input type="text" name="email" class="form-control"  value="{{ $user->email }}"/>

			                <input type="hidden" name="id" class="form-control" id='id'  value="{{ $user->id }}"/>
			            </div>

			            <div class="form-group">
			                <label for="last_name">Họ</label>
			                <input type="text" name="last_name" class="form-control"  value="{{ $user->last_name }}"/>
			            </div>

			            <div class="form-group">
			                <label for="first_name">Tên</label>
			                <input type="text" name="first_name" class="form-control"  value="{{ $user->first_name }}"/>
			            </div>

			            <div class="form-group">
			                <label for="group">Nhóm</label>
			                {{ Form::select('group_name', Group::getOptions(), $group_name, ['class'=>'group form-control']) }}
			            </div>

			        </div>
			        
			        <!--right-->
			        <div class="col-md-6"></div>
			        
			        <div class="col-md-12">
			            <div class="form-group">
			                <div class="pull-right">
			                    <button type='submit' class='btn btn-primary submit'>Cập nhật</button>
			                    <a href="{{ URL::to('admin/users') }}" class='btn btn-default'>Bỏ qua</a>
			                </div>
			            </div>
			        </div>
			    {{ Form::close() }}
			</div>
		</div>
	</div>
</div>
        
@endsection