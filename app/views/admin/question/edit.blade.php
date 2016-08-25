@extends('admin.layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			    <span class="pull-left">Thông tin các địa chỉ trên đoạn đường</span>
			</div>
			<div class="panel-body">
			    {{ Form::open(array( 'url' => 'admin/questions/edit', 'class' => 'markers-form' )) }}
			        
			        <!--left-->
			        <div class="col-md-6">
			            <div class="form-group">
			                <label for="question">Câu hỏi</label>
			                <input type="text" name="question" class="form-control"  value="{{ $question->question }}"/>
			                
			                <input type="hidden" name="id" class="form-control" id='id'  value="{{ $question->id }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="answers">Trả lời</label>
			                <textarea name="answers" class="form-control">{{ $question->answers }}</textarea>
			            </div>
			        </div>
			        
			        <!--right-->
			        <div class="col-md-6">
			        </div>
			        
			        <div class="col-md-12">
			            <div class="form-group">
			                <div class="pull-right">
			                    <button type='submit' class='btn btn-primary submit'>Cập nhật</button>
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