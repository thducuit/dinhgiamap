@extends('admin.layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			    <span class="pull-left">Thông tin các địa chỉ trên đoạn đường</span>
			</div>
			<div class="panel-body">
			    {{ Form::open(array( 'url' => 'admin/estates/edit?page=' . $page, 'enctype'=>'multipart/form-data', 'class' => 'estates-form', 'id' => 'estates-form' )) }}
			        <div class="col-md-12">
			            <div class="form-group">
			                <div class="pull-right">
			                    <button type='submit' class='btn btn-primary submit'>Cập nhật</button>
			                    <a href="{{ URL::to('admin/estates?page=' . $page) }}" class='btn btn-default'>Bỏ qua</a>
			                </div>
			            </div>
			        </div>
			        <!--left-->
			        <div class="col-md-6">
			        	<div class="form-group">
			                <label for="title">Tiêu đề</label>
			                <input type="text" name="title" class="form-control"  value="{{ $estate->title }}"/>
			            </div>

			            <div class="form-group">
			                <label for="address">Địa chỉ</label>
			                <input type="text" name="address" class="form-control" id="google-map-point-search" placeholder="địa chỉ nhà" value="{{ $estate->address }}"/>
			                <input type="hidden" name="id" class="form-control" id='id'  value="{{ $estate->id }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="bedroom">Phòng ngủ</label>
			                <input type="text" name="bedroom" class="form-control"  value="{{ $estate->bedroom }}"/>
			            </div>

			            <div class="form-group">
			                <label for="bathroom">Phòng tắm</label>
			                <input type="text" name="bathroom" class="form-control"  value="{{ $estate->bathroom }}"/>
			            </div>

			            <div class="form-group">
			                <label for="areas">Tổng diện tích(m<sup>2</sup>)</label>
			                <input type="text" name="areas" class="form-control" placeholder="m2" value="{{ $estate->areas }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="price">Đơn giá(tr/m<sup>2</sup>)</label>
			                <input type="text" name="price" class="form-control" placeholder="tr/m2" value="{{ $estate->price }}"/>
			            </div>
			            
			            <div class="form-group">
			                <label for="cost">Giá bán</label>
			                <input type="text" name="cost" class="form-control" placeholder="Giá rao bán" value="{{ $estate->cost }}"/>
			            </div>
			        </div>
			        
			        <!--right-->
			        <div class="col-md-6">

			        	<div class="form-group">
			                <label for="wifi">Wifi</label>
			                {{ Form::select('class_field', ['1' => 'Có', '0' => 'Không'], $estate->wifi, ['class'=>'form-control']) }}
			            </div>

			            <div class="form-group">
			                <label for="banlamviec">Bàn làm việc</label>
			                {{ Form::select('class_field', ['1' => 'Có', '0' => 'Không'], $estate->banlamviec, ['class'=>'form-control']) }}
			            </div>

			            <div class="form-group">
			                <label for="tuquanao">Số lượng tủ quần áo</label>
			                <input type="text" name="tuquanao" class="form-control" value="{{ $estate->tuquanao }}">
			            </div>
			            
			            <div class="form-group">
			                <label for="khoangcachtrannha">Khoảng cách trần nhà</label>
			                <input type="text" name="khoangcachtrannha" class="form-control" value="{{ $estate->khoangcachtrannha }}">
			            </div>

			            <div class="form-group">
			                <label for="tulanh">Số lượng tủ lạnh</label>
			                <input type="text" name="tulanh" class="form-control" value="{{ $estate->tulanh }}">
			            </div>

			            <div class="form-group">
			                <label for="noithatmoi">Nội thất mới</label>
			                {{ Form::select('class_field', ['1' => 'Có', '0' => 'Không'], $estate->noithatmoi, ['class'=>'form-control']) }}
			            </div>

			            <div class="form-group">
			                <label for="maylanh">Số lượng máy lạnh</label>
			                <input type="text" name="maylanh" class="form-control" value="{{ $estate->maylanh }}">
			            </div>

			            <div class="form-group">
			                <label for="bontam">Bồn tắm</label>
			                {{ Form::select('class_field', ['1' => 'Có', '0' => 'Không'], $estate->bontam, ['class'=>'form-control']) }}
			            </div>

			            <div class="form-group">
			                <label for="tivi">Số lượng tivi</label>
			                <input type="text" name="tivi" class="form-control" value="{{ $estate->tivi }}">
			            </div>

			            <div class="form-group">
			                <label for="tudaugiuong">Tủ đầu giường</label>
			                {{ Form::select('class_field', ['1' => 'Có', '0' => 'Không'], $estate->tudaugiuong, ['class'=>'form-control']) }}
			            </div>

			            <div class="form-group">
			                <label for="bantrangdiem">Bàn trang điểm</label>
			                <input type="text" name="bantrangdiem" class="form-control" value="{{ $estate->bantrangdiem }}">
			            </div>

			            <div class="form-group">
			                <label for="bantivi">Kệ tivi</label>
			                {{ Form::select('class_field', ['1' => 'Có', '0' => 'Không'], $estate->bantivi, ['class'=>'form-control']) }}
			            </div>

			            <div class="form-group">
			                <label for="kean">Bàn ăn</label>
			                {{ Form::select('class_field', ['1' => 'Có', '0' => 'Không'], $estate->kean, ['class'=>'form-control']) }}
			            </div>

			        	<div class="form-group">
			                <label for="province_id">Thành phố/Tỉnh thành</label>
			                {{ Form::select('province_id', Province::getOptions(), $estate->province_id, ['class'=>'province_id form-control']) }}
			            </div>
			            
			            <div class="form-group">
			                <label for="district_id">Quận/Huyện</label>
			                <select name="district_id"  class="district_id form-control">
			                	<option value=""></option>
			                </select>
			                <input type="hidden" id="district_id" class="form-control" value="{{ $estate->district_id }}">
			            </div>
			            
			            <div class="form-group">
			                <label for="ward_id">Phường/Xã</label>
			                <select name="ward_id"  class="ward_id form-control">
			                	<option value=""></option>
			                </select>
			                <input type="hidden" id="ward_id" class="form-control" value="{{ $estate->ward_id }}">
			            </div>
			            
			            
			        </div>
			        
			        <div class="col-md-12">
			        </div>
			        
			        <div class="col-md-12">
			        	<div class="form-group"><div id="google-map-container"></div></div>
			            
			            <div class="form-group google-map-point">
			                <label>Tọa độ</label>
			                
			                <div class="m-google-map-point point-start">
			                    <input type="text" placeholder='Lat'  name="lat" class='form-control point-lat' value="{{ $estate->lat }}"/>
			                    <input type="text" placeholder='Lng'  name="lng" class='form-control point-lng' value="{{ $estate->lng }}"/>
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