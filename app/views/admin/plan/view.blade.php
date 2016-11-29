@extends('admin.layouts.admin')
@section('content')
    <div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
				    <span class="pull-left">Danh sách Quy hoạch</span>
				    <!-- <a href="{{ URL::to('admin/plans/add') }}" class="btn btn-info btn-md pull-right">Thêm</a> -->
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
                    					        <th style=""><div class="th-inner ">Tên bản đồ quy hoạch</div></th>
                    					        <th style=""><div class="th-inner ">Trạng thái</div></th>
                    					        <th style=""><div class="th-inner "></div></th>
                    					    </tr>
					                    </thead>
					                    <tbody>
					                        @if(!empty($plans))
    					                        @foreach($plans as $e)
    					                        <tr>
    					                            <td>{{ $e->name }}</td>
    					                            <td>
    					                            	<div class="btn-group">
    					                            		
    					                            		@if($e->status == 0)
    					                            			<a href="{{ URL::to('admin/plans/update/' . $e->name) }}" class='btn btn-info'><i class="glyphicon glyphicon-pushpin"></i> Chưa cập nhật</a>
    					                            		@else
    					                            			<a href="{{ URL::to('admin/plans/delete/' . $e->id) }}" data-confirm='Do you really want to delete this item?' class='btn btn-danger'><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg> Xoá</a>
    					                                		<!-- <a href="{{ URL::to('admin/plans/delete/' . $e->id) }}" data-confirm='Do you really want to delete this item?' class='btn btn-danger'><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg> Xóa Bản đồ quy hoạch</a> -->
    					                            			<!-- <a href="#" class='btn btn-default'><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg> Đã cập nhật</a> -->
    					                            		@endif

    					                            		@if($e->_show == 1)
    					                            			<a href="{{ URL::to('admin/plans/hide/' . $e->id) }}" class='btn btn-success'>Đang hiện</a>
    					                            		@else
    					                            			<a href="{{ URL::to('admin/plans/show/' . $e->id) }}" class='btn btn-warning'>Đang ẩn</a>
    					                            		@endif
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