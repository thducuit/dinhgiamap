@extends('admin.layouts.admin')
@section('content')
    <div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
				    <span class="pull-left">Qua hoạch chi tiết (tờ)</span>
				    <!-- <a href="{{ URL::to('admin/maps/add') }}" class="btn btn-info btn-md pull-right">Thêm</a> -->
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
                                                <th style=""><div class="th-inner ">Số tờ</div></th>
                    					        <th style=""><div class="th-inner ">Tên</div></th>
                    					        <th style=""><div class="th-inner ">Trạng thái</div></th>
                    					        <th style=""><div class="th-inner "></div></th>
                    					    </tr>
					                    </thead>
					                    <tbody>
					                        @if(!empty($maps))
    					                        @foreach($maps as $e)
    					                        <tr>
                                                    <td>{{ $e->order }}</td>
    					                            <td>{{ $e->name }}</td>
                                                    <td></td>
    					                            <td>
    					                            	<div class="btn-group">
    					                            		
    					                            		@if($e->status == 0)
    					                            			<a href="{{ URL::to('admin/planpages/update/' . $e->name) }}" class='btn btn-info'><i class="glyphicon glyphicon-pushpin"></i> Chưa cập nhật</a>
    					                            		@else
    					                            			<a href="{{ URL::to('admin/planpages/delete/' . $e->id) }}" data-confirm='Do you really want to delete this item?' class='btn btn-danger'><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg> Xoá</a>
    					                                		<!-- <a href="{{ URL::to('admin/maps/delete/' . $e->id) }}" data-confirm='Do you really want to delete this item?' class='btn btn-danger'><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg> Xóa Bản đồ quy hoạch</a> -->
    					                            			<!-- <a href="#" class='btn btn-default'><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg> Đã cập nhật</a> -->
    					                            		@endif

    					                            		@if($e->_show == 1)
    					                            			<a href="{{ URL::to('admin/planpages/hide/' . $e->id) }}" class='btn btn-success'>Đang hiện</a>
    					                            		@else
    					                            			<a href="{{ URL::to('admin/planpages/show/' . $e->id) }}" class='btn btn-warning'>Đang ẩn</a>
    					                            		@endif

                                                            <a href="{{ URL::to('admin/planpages/edit/' . $e->id) }}" class='btn btn-default'><i class="glyphicon glyphicon-pushpin"></i> Thêm thông tin</a>

                                                            <a href="{{ URL::to('admin/planareas/index/' . $e->id) }}" class='btn btn-warning'><i class="glyphicon glyphicon-pushpin"></i> Số thửa</a>
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