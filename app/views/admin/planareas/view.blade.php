@extends('admin.layouts.admin')
@section('content')
    <div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
				    <span class="pull-left">Thửa quy hoạch</span>
				    <a href="{{ URL::to('admin/planareas/add/' . $plan_page_id ) }}" class="btn btn-info btn-md pull-right">Thêm</a>
				</div>
				<div class="panel-body">
					<div class="bootstrap-table">
					    <div class="fixed-table-toolbar"></div>
					    <div class="fixed-table-container">
					       <div class="fixed-table-header">
					       </div>
					       <div class="fixed-table-body">
					           <div class="fixed-table-loading" style="top: 37px;">Loading, please wait…</div>
					               <table data-toggle="table" class="table table-hover customTable">
		                                <thead>
                    					    <tr>
                    					        <th style=""><div class="th-inner ">ID</div></th>
                    					        <th style=""><div class="th-inner ">Số thửa</div></th>
                    					        <th style=""><div class="th-inner "></div></th>
                    					    </tr>
					                    </thead>
					                    <tbody>
					                        @if(!empty($plans))
    					                        @foreach($plans as $e)
    					                        <tr>
    					                            <td>{{ $e->id }}</td>
    					                            <td>{{ $e->order }}</td>
    					                            <td>
    					                            	<div class="btn-group">
    					                            		<a href="{{ URL::to('admin/planareas/edit/' . $plan_page_id . '/' . $e->id . '?page=' . $page) }}" class='btn btn-default'><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg> Sửa</a>
    					                                	<a href="{{ URL::to('admin/planareas/delete/' . $plan_page_id . '/' . $e->id . '?page=' . $page) }}" data-confirm='Do you really want to delete this item?' class='btn btn-danger'><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg> Xóa</a>
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
{{ HTML::script('admin/js/custom/province.js') }}  
@endsection