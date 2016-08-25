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
			            <td>{{ $marker->name }}</td>
			        </tr>
			        <tr>
			            <td>Đoạn đường</td>
			            <td>{{ $street->name }}</td>
			        </tr>
			        <tr>
			            <td>Đơn giá thị trường vnđ/m<sup>2</sup></td>
			            <td>{{ $marker->price }}</td>
			        </tr>
			        <tr>
			            <td>Đơn giá nhà nước vnđ/m<sup>2</sup></td>
			            <td>{{ $marker->state_price }}</td>
			        </tr>
			        <tr>
			            <td>Diện tích đất m<sup>2</sup></td>
			            <td>{{ $marker->land_acreage }}</td>
			        </tr>
			        <tr>
			            <td>Diện tích sử dụng m<sup>2</sup></td>
			            <td>{{ $marker->used_acreage }}</td>
			        </tr>
			        <tr>
			            <td>Giá rao bán</td>
			            <td>{{ $marker->sale_price }}</td>
			        </tr>
			        
			        <tr>
			            <td>Khu vực</td>
			            <td>{{ $ward->name }}, {{ $district->name }}, {{ $province->name }} </td>
			        </tr>
			        <tr>
			            <td>Phân loại</td>
			            <td>
			                @if($marker->class_field == 1)
			                    Diện tích
			                 @else
			                     Số thửa
			                 @endif
			            </td>
			        </tr>
			        
			        @if($marker->class_field == 1)
			        <tr>
			            <td>Diện tích m<sup>2</sup></td>
			            <td>{{ $marker->plan_field }}</td>
			        </tr>
			        @else
			        <tr>
			            <td>Số thửa</td>
			            <td>{{ $marker->plan_field }} </td>
			        </tr>
			        @endif
			    </table>
			    <div class="col-md-12">
		            <div class="form-group">
		                <div class="pull-right">
		                    <a href="{{ URL::to('admin/markers') }}" class='btn btn-default'>Trở lại</a>
		                </div>
		            </div>
		        </div>
			</div>
		</div>
	</div>
</div>
@endsection