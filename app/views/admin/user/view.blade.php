@extends('admin.layouts.admin')
@section('content')
    <div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
				    <span class="pull-left">Danh sách câu hỏi</span>
				    <a href="{{ URL::to('admin/users/add') }}" class="btn btn-info btn-md pull-right">Thêm</a>
				</div>
				<div class="panel-body">
					<div class="bootstrap-table">
					    <div class="fixed-table-toolbar"></div>
					    <div class="fixed-table-container">
					       <div class="fixed-table-header"></div>
					       <div class="fixed-table-body">
					           <div class="fixed-table-loading" style="top: 37px;">Loading, please wait…</div>
					               <table data-toggle="table" class="table table-hover customTable">
		                                <thead>
                    					    <tr>
                    					        <th style=""><div class="th-inner ">Email</div></th>
                    					        <th style=""><div class="th-inner ">Tài khoản</div></th>
                    					        <th style=""><div class="th-inner ">Họ tên</div></th>
                    					        <th style=""><div class="th-inner ">Nhóm</div></th>
                    					        <th style=""><div class="th-inner "></div></th>
                    					    </tr>
					                    </thead>
					                    <tbody>
					                        @if(!empty($users))
    					                        @foreach($users as $e)
    					                        <tr>
    					                            <td>{{ $e->email }}</td>
    					                            <td>
    					                            	@if($e->activated == 1)
    					                            	<a href="{{ URL::to('admin/users/deactive/' . $e->id) }}" class='btn btn-info'>Đang kích hoạt</a>
    					                            	@else
    					                            	<a href="{{ URL::to('admin/users/active/' . $e->id) }}" class='btn btn-default'>Chưa kích hoạt</a>
    					                            	@endif
    					                            </td>
    					                            <td>{{ $e->last_name }} {{ $e->first_name }}</td>
    					                            <td>
                                                        @if( count(Sentry::findUserById($e->id)->getGroups()) )
                                                            {{ Sentry::findUserById($e->id)->getGroups()[0]->name }}
                                                        @endif   
                                                    </td>			
    					                            <td>
    					                            	<div class="btn-group">
    					                            		<a href="{{ URL::to('admin/users/edit/' . $e->id) }}" class='btn btn-default'><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg> Sửa</a>
    					                                	<a href="{{ URL::to('admin/users/delete/' . $e->id) }}" data-confirm='Do you really want to delete this item?' class='btn btn-danger'><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg> Xóa</a>
    					                            		<a href="{{ URL::to('admin/users/password/' . $e->id) }}" class='btn btn-info'><i class="glyphicon glyphicon-pushpin"></i> Đổi mật khẩu</a>
    					                            	</div>
    					                            </td>
    					                        </tr>
    					                        @endforeach
    					                        @else
                        					    <tr class="no-records-found">
                        					        <td colspan="6">No matching records found</td>
                        					    </tr>
                        					@endif
					                    </tbody>
					                </table>
					            </div>
					        <div class="fixed-table-pagination">
					            {{ $pager }}
					        </div>
					    </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
@endsection