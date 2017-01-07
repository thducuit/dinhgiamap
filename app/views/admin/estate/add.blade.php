@extends('admin.layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			    <span class="pull-left">Thông tin các tài sản</span>
			</div>
			<div class="panel-body">
			    {{ Form::open(array( 'url' => 'admin/estates/add', 'class' => 'estates-form', 'enctype'=>'multipart/form-data', 'id'=>'estates-form' )) }}
			        <div class="col-md-12">
			            <div class="form-group">
			                <div class="pull-right">
			                    <button type='submit' class='btn btn-primary submit'>Thêm</button>
			                    <a href="{{ URL::to('admin/estates') }}" class='btn btn-default'>Bỏ qua</a>
			                </div>
			            </div>
			        </div>
			        <!--left-->
			        <div class="col-md-6">
			        	<div class="form-group">
			                <label for="title">Tiêu đề</label>
			                <input type="text" name="title" class="form-control"  value="{{ Input::old('title') }}"/>
			            </div>

			            <div class="form-group">
			                <label for="address">Địa chỉ</label>
			                <input type="text" name="address" class="form-control" id="google-map-point-search" placeholder="địa chỉ nhà" value="{{ Input::old('name') }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="bedroom">Phòng ngủ</label>
			                <input type="text" name="bedroom" class="form-control"  value="{{ Input::old('bedroom') }}"/>
			            </div>

			            <div class="form-group">
			                <label for="bathroom">Phòng tắm</label>
			                <input type="text" name="bathroom" class="form-control"  value="{{ Input::old('bathroom') }}"/>
			            </div>

			            <div class="form-group">
			                <label for="areas">Tổng diện tích(m<sup>2</sup>)</label>
			                <input type="text" name="areas" class="form-control" placeholder="m2" value="{{ Input::old('areas') }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="price">Đơn giá(tr/m<sup>2</sup>)</label>
			                <input type="text" name="price" class="form-control" placeholder="tr/m2" value="{{ Input::old('price') }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="cost">Giá bán</label>
			                <input type="text" name="cost" class="form-control" placeholder="Giá rao bán" value="{{ Input::old('cost') }}"/>
			            </div>

						<div class="form-group">
			                <label for="description">Mô tả chi tiết</label>
			                <textarea name="description" id="description-content-editor" data-editor="description-content-editor" cols="30" rows="10"></textarea>
			            </div>
			        </div>
			        
			        <!--right-->
			        <div class="col-md-6">
			        	<div class="form-group">
			                <label for="wifi">Wifi</label>
			                {{ Form::select('class_field', ['1' => 'Có', '0' => 'Không'], Input::old('wifi'), ['class'=>'form-control']) }}
			            </div>

			            <div class="form-group">
			                <label for="banlamviec">Bàn làm việc</label>
			                {{ Form::select('class_field', ['1' => 'Có', '0' => 'Không'], Input::old('banlamviec'), ['class'=>'form-control']) }}
			            </div>

			            <div class="form-group">
			                <label for="tuquanao">Số lượng tủ quần áo</label>
			                <input type="text" name="tuquanao" class="form-control" value="{{ Input::old('tuquanao') }}">
			            </div>
			            
			            <div class="form-group">
			                <label for="khoangcachtrannha">Khoảng cách trần nhà</label>
			                <input type="text" name="khoangcachtrannha" class="form-control" value="{{ Input::old('khoangcachtrannha') }}">
			            </div>

			            <div class="form-group">
			                <label for="tulanh">Số lượng tủ lạnh</label>
			                <input type="text" name="tulanh" class="form-control" value="{{ Input::old('tulanh') }}">
			            </div>

			            <div class="form-group">
			                <label for="noithatmoi">Nội thất mới</label>
			                {{ Form::select('class_field', ['1' => 'Có', '0' => 'Không'], Input::old('noithatmoi'), ['class'=>'form-control']) }}
			            </div>

			            <div class="form-group">
			                <label for="maylanh">Số lượng máy lạnh</label>
			                <input type="text" name="maylanh" class="form-control" value="{{ Input::old('maylanh') }}">
			            </div>

			            <div class="form-group">
			                <label for="bontam">Bồn tắm</label>
			                {{ Form::select('class_field', ['1' => 'Có', '0' => 'Không'], Input::old('bontam'), ['class'=>'form-control']) }}
			            </div>

			            <div class="form-group">
			                <label for="tivi">Số lượng tivi</label>
			                <input type="text" name="tivi" class="form-control" value="{{ Input::old('tivi') }}">
			            </div>

			            <div class="form-group">
			                <label for="tudaugiuong">Tủ đầu giường</label>
			                {{ Form::select('class_field', ['1' => 'Có', '0' => 'Không'], Input::old('tudaugiuong'), ['class'=>'form-control']) }}
			            </div>

			            <div class="form-group">
			                <label for="bantrangdiem">Bàn trang điểm</label>
			                <input type="text" name="bantrangdiem" class="form-control" value="{{ Input::old('bantrangdiem') }}">
			            </div>

			            <div class="form-group">
			                <label for="bantivi">Kệ tivi</label>
			                {{ Form::select('class_field', ['1' => 'Có', '0' => 'Không'], Input::old('bantivi'), ['class'=>'form-control']) }}
			            </div>

			            <div class="form-group">
			                <label for="kean">Bàn ăn</label>
			                {{ Form::select('class_field', ['1' => 'Có', '0' => 'Không'], Input::old('kean'), ['class'=>'form-control']) }}
			            </div>

			        	<div class="form-group">
			                <label for="province_id">Thành phố/Tỉnh thành</label>
			                {{ Form::select('province_id', Province::getOptions(), null, ['class'=>'province_id form-control']) }}
			            </div>
			            
			            <div class="form-group">
			                <label for="district_id">Quận/Huyện</label>
			                <select name="district_id"  class="district_id form-control">
			                	<option value="0"></option>
			                </select>
			                <input type="hidden" id="district_id" class="form-control" value="{{ Input::old('district_id') }}">
			            </div>
			            
			            <div class="form-group">
			                <label for="ward_id">Phường/Xã</label>
			                <select name="ward_id"  class="ward_id form-control">
			                	<option value="0"></option>
			                </select>
			                <input type="hidden" id="ward_id" class="form-control" value="{{ Input::old('ward_id') }}">
			            </div>

			            <div class="form-group upload-group">
				        	<label for="photo">Thư viện ảnh</label>
				        	<a class="btn btn-primary" data-upload="#gallery">Tải ảnh</a>
				        	<ul class="list-group" id="gallery"></ul>	
				        </div>

			        </div>
			        
			        
			        
			        <div class="col-md-12">
			        	<div class="form-group"><div id="google-map-container"></div></div>
			            
			            <div class="form-group google-map-point">
			                <label>Tọa độ</label>
			                
			                <div class="m-google-map-point point-start">
			                    <input type="text" placeholder='Lat'  name="lat" class='form-control point-lat' value="{{ Input::old('lat') }}"/>
			                    <input type="text" placeholder='Lng'  name="lng" class='form-control point-lng' value="{{ Input::old('lng') }}"/>
			                </div>
			            </div>
			        </div>
			        
			        
			    {{ Form::close() }}
			</div>
		</div>
	</div>
</div>
{{ HTML::script('admin/js/custom/marker.js') }}
{{ HTML::script('admin/js/custom/province.js') }}
<script>
    var VLD_RQ = 'Vui lòng điền vào mục này',
        VLD_EM = 'Email chưa đúng !',
        VLD_NB = 'Nhập số !';
    jQuery(document).ready(function () {
    	

        jQuery('#estates-form').validate({
            rules: {
                name: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: VLD_RQ
                }
            }

        });

    })
</script>       
@endsection