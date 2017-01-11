@extends('admin.layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			    <span class="pull-left">Thông tin chi tiết</span>
			</div>
			<div class="panel-body">
			    <table class="table table-striped">
			        <tr>
			            <td>Tên</td>
			            <td>{{ $contact->name }}</td>
			        </tr>
			        <tr>
			            <td>Email</td>
			            <td>{{ $contact->email }}</td>
			        </tr>
			        <tr>
			            <td>Điện thoại</td>
			            <td>{{ $contact->phone }}</td>
			        </tr>
			        <tr>
			            <td>Mục đích</td>
			            <td>{{ $contact->purpose }}</td>
			        </tr>
                    <tr>
			            <td>Vị trí tài sản</td>
			            <td>{{ $contact->position }}</td>
			        </tr>
			        <tr>
			            <td>Nội dung</td>
			            <td>{{ $contact->content }}</td>
			        </tr>
                    <tr>
			            <td>Tập tin</td>
                        <td><a href="/public/upload/contact/{{ $contact->file }}" target="_blank">{{ $contact->file }}</a></td>
			        </tr>
			    </table>
			    <div class="col-md-12">
		            <div class="form-group">
		                <div class="pull-right">
		                    <a href="{{ URL::to('admin/contacts') }}" class='btn btn-default'>Trở lại</a>
		                </div>
		            </div>
		        </div>
			</div>
		</div>
	</div>
</div>
@endsection