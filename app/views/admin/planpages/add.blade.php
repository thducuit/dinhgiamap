@extends('admin.layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="pull-left">Thêm tờ Quy hoạch</span>
            </div>
            <div class="panel-body">
                {{ Form::open(array( 'url' => 'admin/planpages/add/' . $plan_map_id )) }}
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="pull-right">
                                <button type='submit' class='btn btn-primary'>Thêm</button>
                                <a href="{{ URL::to('admin/planpages/index/' . $plan_map_id) }}" class='btn btn-default'>Bỏ qua</a>
                            </div>
                        </div>
                    </div>
                    <!--left-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Tên Đoạn đường / Khu vực</label>
                            <p>{{ $map_name }}</p>
                            <input type="hidden" id="plan_map_id" name="plan_map_id" value="{{ $plan_map_id }}"/>
                        </div>

                        <div class="form-group">
                            <label for="order">Số tờ</label>
                            <input type="text" id="order" class='form-control' name="order" value=""/>
                        </div>
                    </div>
                    
                    <!--right-->
                    <div class="col-md-6"></div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="points">Bản đồ</label>
                            <button type="button" id="btn-reset-polygon-image">Clear Polygon</button>
                            <div id="google-map-container"></div>
                            <input class="form-control" type="hidden" id="points" name="points"></input>
                        </div>
                        <div class="form-group">
                            <label for="gpoints">Google map</label>
                            <button type="button" id="btn-reset-polygon-map">Clear Polygon</button>
                            <div id="g-google-map-container" style="height:1000px"></div>
                            <input class="form-control" type="hidden" id="gpoints" name="gpoints"></input>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var planpage = "{{ $map_name }}"
</script>
     
{{ HTML::script('admin/js/custom/planareas.js') }}        
{{ HTML::script('admin/js/custom/gplanareas.js') }}        
@endsection