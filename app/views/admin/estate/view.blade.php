@extends('admin.layouts.admin')
@section('content')
    <div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
				    <span class="pull-left">Danh sách tài sản</span>
				    <a href="{{ URL::to('admin/estates/add') }}" class="btn btn-info btn-md pull-right">Thêm</a>
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
                    					        <th style=""><div class="th-inner ">Tiêu đề</div></th>
                    					        <th style=""><div class="th-inner "></div></th>
                    					    </tr>
					                    </thead>
					                    <tbody>
					                        @if(!empty($estates))
    					                        @foreach($estates as $e)
    					                        <tr>
    					                            <td>{{ $e->title }}</td>
    					                            <td>
    					                            	<div class="btn-group">
    					                            		@if($e->status == 1)
    					                            			<a href="{{ URL::to('admin/estates/hide/' . $e->id) }}" class='btn btn-success'>Đang hiện</a>
    					                            		@else
    					                            			<a href="{{ URL::to('admin/estates/show/' . $e->id) }}" class='btn btn-warning'>Đang ẩn</a>
    					                            		@endif
    					                            		<a href="{{ URL::to('admin/estates/edit/' . $e->id . '?page=' . $page) }}" class='btn btn-default'><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg> Sửa</a>
    					                                	<a href="{{ URL::to('admin/estates/delete/' . $e->id . '?page=' . $page) }}" data-confirm='Do you really want to delete this item?' class='btn btn-danger'><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg> Xóa</a>
    					                            		<a href="{{ URL::to('admin/estates/detail/' . $e->id . '?page=' . $page) }}" class='btn btn-info'><i class="glyphicon glyphicon-pushpin"></i> Chi tiết</a>
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