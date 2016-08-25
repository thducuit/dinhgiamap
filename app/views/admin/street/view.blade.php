@extends('admin.layouts.admin')
@section('content')
    <div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
				    <span class="pull-left">Danh sách đoạn đường</span>
				    <a href="{{ URL::to('admin/streets/add') }}" class="btn btn-primary btn-md pull-right">Thêm</a>
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
                    					        <th style=""><div class="th-inner ">Tên</div></th>
                    					        <th style=""><div class="th-inner ">Phường</div></th>
                    					        <th style=""><div class="th-inner ">Quận</div></th>
                    					        <th style=""><div class="th-inner "></div></th>
                    					    </tr>
					                    </thead>
					                    <tbody>
					                        @if(!empty($streets))
    					                        @foreach($streets as $e)
    					                        <tr>
    					                            <td>{{ $e->name }}</td>
    					                            <td>{{ $e->ward }}</td>
    					                            <td>{{ $e->district }}</td>
    					                            <td>
    					                                <div class="btn-group">
    					                                	<a href="{{ URL::to('admin/streets/edit/' . $e->id) }}" class='btn btn-default'><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg> Sửa</a>
    					                                	<a href="{{ URL::to('admin/streets/delete/' . $e->id) }}" data-confirm='Do you really want to delete this item?' class='btn btn-danger'><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg> Xóa</a>
    					                            	
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