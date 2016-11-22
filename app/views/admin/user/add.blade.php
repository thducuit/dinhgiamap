@extends('admin.layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			    <span class="pull-left">Thêm thành viên</span>
			</div>
			<div class="panel-body">
			    {{ Form::open(array( 'url' => 'admin/users/add', 'class' => 'markers-form', 'enctype'=>'multipart/form-data' )) }}
			        
			        <!--left-->
			        <div class="col-md-6">
			            <div class="form-group">
			                <label for="email">Email</label>
			                <input type="text" name="email" class="form-control"  value="{{ Input::old('email') }}"/>
			            </div>

			            <div class="form-group">
			                <label for="last_name">Họ</label>
			                <input type="text" name="last_name" class="form-control"  value="{{ Input::old('last_name') }}"/>
			            </div>

			            <div class="form-group">
			                <label for="first_name">Tên</label>
			                <input type="text" name="first_name" class="form-control"  value="{{ Input::old('first_name') }}"/>
			            </div>

			            <div class="form-group">
			                <label for="group">Nhóm</label>
			                {{ Form::select('group_name', Group::getOptions(), Input::old('group_name'), ['class'=>'group form-control']) }}
			            </div>
			            
			            <div class="form-group">
			                <label for="password">Mật khẩu</label>
			                <input type="password" name="password" class="form-control"  value=""/>
			            </div>

			            <div class="form-group">
			                <label for="password_confirmation">Nhập lại mật khẩu</label>
			                <input type="password" name="password_confirmation" class="form-control"  value=""/>
			            </div>

			        </div>
			        
			        <!--right-->
			        <div class="col-md-6"></div>
			        
			        <div class="col-md-12">
			            <div class="form-group">
			                <div class="pull-right">
			                    <button type='submit' class='btn btn-primary submit'>Thêm</button>
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