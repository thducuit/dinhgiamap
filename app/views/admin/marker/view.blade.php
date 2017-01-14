@extends('admin.layouts.admin')
@section('content')
    <div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
				    <span class="pull-left">Danh sách vị trí</span>
				    <a href="{{ URL::to('admin/markers/add') }}" class="btn btn-info btn-md pull-right">Thêm</a>
				</div>
				<div class="panel-body">
					<div class="bootstrap-table">
					    <div class="fixed-table-toolbar"></div>
					    <div class="fixed-table-container">
					       <div class="fixed-table-header">
					       		<form method="get" action="{{ URL::to('admin/markers') }}">
					       			<div class="search search-left pull-left">
					       				{{ Form::select('province', Province::getOptions(), $province, ['class'=>'province_id form-control']) }}
					       				<select name="district"  class="district_id form-control">
						                	<option value="0"></option>
						                </select>
						                <input type="hidden" id="district_id" class="form-control" value="{{ $district }}">
					       				<select name="ward"  class="ward_id form-control">
						                	<option value="0"></option>
						                </select>
						                <input type="hidden" id="ward_id" class="form-control" value="{{ $ward }}">
					       				
					       			</div>	
					       			<div class="search search-right pull-right">
					       				<input class="form-control" name='keyword' placeholder="Tìm kiếm từ khoá" value="{{ $keyword }}" />
					       				<input type="submit" class="btn btn-primary" value="Tìm kiếm" />
					       				<a href="{{ URL::to('admin/markers') }}" class="btn btn-default">Tải lại</a>
					       			</div>
					       		</form>
					       </div>
					       <div class="fixed-table-body">
					           <div class="fixed-table-loading" style="top: 37px;">Loading, please wait…</div>
					               <table data-toggle="table" class="table table-hover customTable">
		                                <thead>
                    					    <tr>
                    					        <th style=""><div class="th-inner ">Tên</div></th>
                    					        <th style=""><div class="th-inner ">Giá thị trường (VNĐ)</div></th>
                    					        <th style=""><div class="th-inner ">Giá nhà nước (VNĐ)</div></th>
                    					        <th style=""><div class="th-inner "></div></th>
                    					    </tr>
					                    </thead>
					                    <tbody>
					                        @if(!empty($markers))
    					                        @foreach($markers as $e)
    					                        <tr>
    					                            <td>{{ $e->name }}</td>
    					                            <td>{{ number_format($e->price) }}</td>
    					                            <td>{{ number_format($e->state_price) }}</td>
    					                            <td>
    					                            	<div class="btn-group">
    					                            		<a href="{{ URL::to('admin/markers/edit/' . $e->id . '?page=' . $page) }}" class='btn btn-default'><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg> Sửa</a>
    					                                	<a href="{{ URL::to('admin/markers/delete/' . $e->id . '?page=' . $page) }}" data-confirm='Do you really want to delete this item?' class='btn btn-danger'><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg> Xóa</a>
    					                            		<a href="{{ URL::to('admin/markers/show/' . $e->id . '?page=' . $page) }}" class='btn btn-info'><i class="glyphicon glyphicon-pushpin"></i> Chi tiết</a>
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