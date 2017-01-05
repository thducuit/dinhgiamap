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
			            <td>Địa chỉ</td>
			            <td>{{ $estate->address }}</td>
			        </tr>
			    </table>
			    <div class="col-md-12">
		            <div class="form-group">
		                <div class="pull-right">
		                    <a href="{{ URL::to('admin/estates?page=' . $page) }}" class='btn btn-default'>Trở lại</a>
		                </div>
		            </div>
		        </div>
			</div>
		</div>
	</div>
</div>
@endsection