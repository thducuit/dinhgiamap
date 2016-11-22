@extends('admin.layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			    <span class="pull-left">Đổi mật khẩu</span>
			</div>
			<div class="panel-body">
			    {{ Form::open(array( 'url' => 'admin/users/password', 'class' => 'markers-form', 'enctype'=>'multipart/form-data' )) }}
			        
			        <!--left-->
			        <div class="col-md-6">
			            <input type="hidden" name="id" class="form-control" id='id'  value="{{ $user->id }}"/>
			            <div class="form-group">
			                <label for="password">Mật khẩu cũ</label>
			                <input type="password" name="old_password" class="form-control"  value=""/>
			            </div>

			            <div class="form-group">
			                <label for="password">Mật khẩu mới</label>
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