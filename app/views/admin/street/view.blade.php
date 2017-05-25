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
						<div class="fixed-table-header">
							<form method="get" action="{{ URL::to('admin/streets') }}">
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
									<input class="form-control" placeholder="Ký hiệu" name="code" value="{{ $code }}" />
								</div>
								<div class="search search-right pull-right">
									<input class="form-control" name='keyword' placeholder="Tìm kiếm từ khoá" value="{{ $keyword }}" />
									<input type="submit" class="btn btn-primary" value="Tìm kiếm" />
									<a href="{{ URL::to('admin/streets') }}" class="btn btn-default">Tải lại</a>
								</div>
							</form>
						</div>
						<div class="fixed-table-body">
							<div class="fixed-table-loading" style="top: 37px;">Loading, please wait…</div>
							<table data-toggle="table" class="table table-hover customTable">
								<thead>
									<tr>
										<th style=""><div class="th-inner ">Ký hiệu</div></th>
										<th style=""><div class="th-inner ">ID</div></th>
										<th style=""><div class="th-inner ">Tên</div></th>
										<th style=""><div class="th-inner ">Giá thị trường(VND)</div></th>
										<th style=""><div class="th-inner ">Giá nhà nước(VND)</div></th>
										<th style=""><div class="th-inner ">Phường</div></th>
										<th style=""><div class="th-inner ">Quận</div></th>
										<th style=""><div class="th-inner "></div></th>
									</tr>
								</thead>
								<tbody>
									@if(!empty($streets))
									@foreach($streets as $e)
									<tr>
										<td>{{ $e->code }}</td>
										<td>{{ $e->id }}</td>
										<td>{{ $e->name }}</td>
										<td>{{ number_format($e->price) }}</td>
										<td>{{ number_format($e->state_price) }}</td>
										<td>{{ Ward::name($e->ward_id) }}</td>
										<td>{{ District::name($e->district_id) }}</td>
										<td>
											<div class="btn-group">
												<a href="{{ URL::to('admin/streets/edit/' . $e->id . '?page=' . $page) }}" class='btn btn-default'><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg> Sửa</a>
												<a href="{{ URL::to('admin/streets/delete/' . $e->id . '?page=' . $page) }}" data-confirm='Do you really want to delete this item?' class='btn btn-danger'><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg> Xóa</a>
												@if( !empty($e->plan_map_id) )
												<a href="{{ URL::to('admin/streets/plan/' . $e->id . '?page=' . $page) }}" class='btn btn-success'><i class="glyphicon glyphicon-pushpin"></i> Quy hoạch</a>
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
							<div class="input-group pull-right page-search-form">
								<input type="text" class="form-control" id="page-number" placeholder="số trang" data-href="{{ URL::to('admin/streets') }}" aria-describedby="basic-addon2">
								<span class="input-group-btn">
									<button class="btn btn-secondary" type="button" id="page-search">Đi đến!</button>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{{ HTML::script('admin/js/custom/province.js') }}
@endsection