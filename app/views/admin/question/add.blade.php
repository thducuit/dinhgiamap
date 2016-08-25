@extends('admin.layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			    <span class="pull-left">Đặt câu hỏi & trả lời</span>
			</div>
			<div class="panel-body">
			    {{ Form::open(array( 'url' => 'admin/questions/add', 'class' => 'markers-form', 'enctype'=>'multipart/form-data' )) }}
			        
			        <!--left-->
			        <div class="col-md-6">
			            <div class="form-group">
			                <label for="question">Câu hỏi</label>
			                <input type="text" name="question" class="form-control"  value="{{ Input::old('question') }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="answers">Trả lời</label>
			                <textarea name="answers" class="form-control">{{ Input::old('answers') }}</textarea>
			            </div>
			        </div>
			        
			        <!--right-->
			        <div class="col-md-6"></div>
			        
			        <div class="col-md-12">
			            <div class="form-group">
			                <div class="pull-right">
			                    <button type='submit' class='btn btn-primary submit'>Thêm</button>
			                    <a href="{{ URL::to('admin/questions') }}" class='btn btn-default'>Bỏ qua</a>
			                </div>
			            </div>
			        </div>
			    {{ Form::close() }}
			</div>
		</div>
	</div>
</div>
        
@endsection