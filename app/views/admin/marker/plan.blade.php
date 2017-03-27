@extends('admin.layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="pull-left">Cập nhật Quy hoạch</span>
            </div>
            <div class="panel-body">
                {{ Form::open(array( 'url' => 'admin/markers/plan/' . $marker_id, 'class' => 'markers-form', 'enctype'=>'multipart/form-data', 'id'=>'markers-form' )) }}
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="pull-right">
                                <button type='submit' class='btn btn-primary submit'>Cập nhật</button>
                                <a href="{{ URL::to('admin/markers/index/' . $marker_id) }}" class='btn btn-default'>Bỏ qua</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="points">Bản đồ</label>
                            <button type="button" id="btn-reset-polygon-image">Clear Polygon</button>
                            <button type="button" id="btn-reset-marker-image">Clear Marker</button>
                            <div id="google-map-container"></div>
                            <input class="form-control" type="hidden" id="points" name="position" value="{{ htmlentities($marker->sposition) }}"></input>
                            <input class="form-control" type="hidden" id="marker_id" name="id" value="{{ $marker->id }}"></input>
                        </div>
                        
                        <div class="form-group google-map-point">
                            <label>Tọa độ</label>
                            <div class="m-google-map-point point-start">
                                <input type="text" placeholder='Lat'  name="lat" id="lat" class='form-control point-lat' value="{{ $marker->slat }}"/>
                                <input type="text" placeholder='Lng'  name="lng" id="lng" class='form-control point-lng' value="{{ $marker->slng }}"/>
                            </div>
                        </div>
                    </div>
                    
                    
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var planpage = "{{ $page_name }}"
</script>
{{ HTML::script('admin/js/custom/planareas.js') }}     
@endsection