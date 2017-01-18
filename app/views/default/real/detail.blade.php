@extends('default.layouts.default')
@section('content')
<style type="text/css">
	#main {
		height: auto!important
	}
</style>

<!--
/*==============================*\
MAIN
/*==============================*\
-->
<div id="main" class="screen">
    <div class="main_wrappe">

        <div id="page_detail_container" class="container full-width ">
            <div class="row">
                <div class="col-sm-6 property-left">
                    <div class="property-image">                    			
                    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">		
	                    	<div class="carousel-inner">
	                    		<div class="item active">
					               <img src="{{ URL::asset('default/images/chi-tiet/real-estate-002.jpg') }}" alt="Chania">
					            </div>
					            <div class="item">
					               <img src="{{ URL::asset('default/images/chi-tiet/real-estate-001.jpg') }}" alt="Chania">
					            </div>       

					        </div>

					       
					        <div class="">
					        	 <!-- Controls -->
					        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
					            <img src="{{ URL::asset('default/images/slider_arrow_left.png') }}" class="icon-prev">
					        </a>
					        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
					           <img src="{{ URL::asset('default/images/slider_arrow_right.png') }}" class="icon-next">
					        </a>	
					        </div>			  
						  	
                    	</div>
                    </div>
                    <div class="property-description" >
                    	<div>
                    		{{ $estate->content }}
                    	</div>
                    	<div class="property-contact">
                    		<span>Liên hệ: </span>
                    		<strong>{{ $estate->contact }}</strong>
                    	</div>
                    </div>
                </div>
                <div class="col-sm-6 property-right detail-info">
                    <div class="property-title">
                        <h4>
                            {{ $estate->title }}
                        </h4>
                        <div class="property-address">
                            {{ $estate->address }}
                        </div>
                    </div>
                    <div class="property-meta">
                        <ul>
                            <li class="">
                            	<span><img src="{{ URL::asset('default/images/property_icon_1.png') }}"/> 5</span>
                            </li>
                            <li class="">
                            	<span><img src="{{ URL::asset('default/images/property_icon_2.png') }}"/>5</span>
                        	</li>
                            <li class="">
                            	<span><img src="{{ URL::asset('default/images/property_icon_3.png') }}"/>3</span>
                        	</li>
                            <li class="">
                            	<span>
                            		<img src="{{ URL::asset('default/images/property_icon_4.png') }}"/>{{ $estate->areas }} m<sup>2</sup>
                            	</span>
                        	</li>
                            <li class=""><img src="{{ URL::asset('default/images/property_icon_5.png') }}"/> {{ $estate->price }} triệu/m<sup>2</sup></li>
                            <li class=""><img src="{{ URL::asset('default/images/property_icon_6.png') }}"/> Giá bán {{ $estate->cost }}</li>
                        </ul>
                    </div>
                    <div class="meta-content">
		                <div class="panel-group" id="accordion">
		                    <div class="panel panel-default" id="panel1">
		                        <div class="panel-heading even">
		                            <h4 class="panel-title facility">
		                                <a data-toggle="collapse" data-target="#collapseOne"
		                                   href="#collapseOne" data-parent="#accordion">
		                                    <span class="facility-title">Mô tả chi tiết |</span> &nbsp <span class="title-more">Xem thêm đầy đủ</span>
		                                    <span class="facility-more">
		                                    	<span class="icon" aria-hidden="true"></span>
		                                    </span>
		                                </a>
		                            </h4>

		                        </div>
		                        <div id="collapseOne" class="panel-collapse collapse in">
		                            <div class="panel-body">
		                            	<div class="desc block-utilities">
										    <ul class="info">
										        <li class="utilities acreage"><strong>Diện tích đất </strong> 69,3m² </li>
										        <li class="utilities acreage"><strong>Diện tích sử dụng :</strong> 197,1m²</li>
										        <li class="utilities floor"><strong>Số tầng:</strong> 1 trệt, 1 tầng thượng + 2 lầu </li>


										        <li class="utilities height"><strong>Chiều dài : </strong> 17.04m</li>
										        <li class="utilities width"><strong>Chiều rộng : </strong> 4.0m</li>
										        <li class="utilities incense"><strong>Hướng nhà: </strong> T.Nam </li>


										    </ul>
										</div>
										<div class="desc-info">
										    <p>Cần bán gấp nhà nằm ngay mặt tiền đường Lũy Bán Bích, phường Hòa Thạnh, quận Tân Phú. Mặt tiền đường lớn, khu vực sầm uất. Tiện kinh doanh, buồn bán mọi ngành nghề, cho thuê hoặc mở văn phòng công ty, trường mầm non, trung tâm anh ngữ, ngân hàng.</p>

										    <p>Nhà 1 trệt 1 lửng, 2 lầu, sân thượng. DT 12,4 x 37,35m. Hướng Tây Bắc. Tiện sửa chữa, xây mới.
											Khu an ninh. Giao thông đi lại thuận tiện. Gần chợ, trường học, bệnh viện, công viên.
											Sổ hồng. Giá 115 tỷ.</p>
										    <div></div>
										</div>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="panel panel-default" id="panel2" style="display: none;">
		                        <div class="panel-heading even">
		                            <h4 class="panel-title facility">
		                                <a data-toggle="collapse" data-target="#collapseTwo"
		                                   href="#collapseTwo" class="collapsed" data-parent="#accordion">		                                    
		                                     <span class="facility-title">Dịch vụ |</span> &nbsp<span class="title-more">Xem thêm đầy đủ</span>
		                                      <span class="facility-more">
		                                    	<span class="icon" aria-hidden="true"></span>
		                                    </span>
		                                </a>
		                            </h4>

		                        </div>
		                        <div id="collapseTwo" class="panel-collapse collapse">
		                            <div class="panel-body">
		                            	<table id="table_service" class="table_option table">
		                            		<tbody>
		                            			<tr>
		                            				<td>
		                            					Sân chơi trẻ em
		                            				</td>
		                            				<td>
		                            					<span class="icon glyphicon glyphicon-ok" aria-hidden="true"></span>
		                            				</td>
		                            				<td>
		                            					Phòng tập Gym
		                            				</td>
		                            				<td>
		                            					<span class="icon glyphicon glyphicon-remove" aria-hidden="true"></span>
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            			</tr>

		                            			<tr>
		                            				<td>
		                            					Chỗ nướng BBQ
		                            				</td>
		                            				<td>
		                            					<span class="icon glyphicon glyphicon-ok" aria-hidden="true"></span>
		                            				</td>
		                            				<td>
		                            					Dịch vụ Spa
		                            				</td>
		                            				<td>
		                            					<span class="icon glyphicon glyphicon-remove" aria-hidden="true"></span>
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            			</tr>

		                            			<tr>
		                            				<td>
		                            					Dịch vụ dọn phòng
		                            				</td>
		                            				<td>
		                            					<span class="icon glyphicon glyphicon-ok" aria-hidden="true"></span>
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            			</tr>

		                            			<tr>
		                            				<td>
		                            					Dịch vụ  masage
		                            				</td>
		                            				<td>
		                            					<span class="icon glyphicon glyphicon-ok" aria-hidden="true"></span>
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            			</tr>
		                            			<tr>
		                            				<td>
		                            					Dịch vụ giặt ủi
		                            				</td>
		                            				<td>
		                            					<span class="icon glyphicon glyphicon-ok" aria-hidden="true"></span>
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            			</tr>

		                            			<tr>
		                            				<td>
		                            					
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            			</tr>
		                            			<tr>
		                            				<td>
		                            					
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            			</tr>
		                            		</tbody>
		                            	</table>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="panel panel-default" id="panel3">
		                        <div class="panel-heading odd">
		                            <h4 class="panel-title facility">
		                                <a data-toggle="collapse" data-target="#collapseThree"
		                                   href="#collapseThree" class="collapsed" data-parent="#accordion">		                                    
		                                     <span class="facility-title">Nội thất |</span>&nbsp <span class="title-more">Xem thêm đầy đủ</span>
		                                      <span class="facility-more">
		                                    	<span class="icon" aria-hidden="true"></span>
		                                    </span>
		                                </a>
		                            </h4>

		                        </div>
		                        <div id="collapseThree" class="panel-collapse collapse">
		                            <div class="panel-body">
		                            	<table id="table_furniture" class="table_option table">
		                            		<tbody>
		                            			<tr>
		                            				<td>
		                            					Wifi
		                            				</td>
		                            				<td>
		                            					<span class="icon glyphicon glyphicon-ok" aria-hidden="true"></span>
		                            				</td>
		                            				<td>
		                            					Bàn làm việc
		                            				</td>
		                            				<td>
		                            					<span class="icon glyphicon glyphicon-remove" aria-hidden="true"></span>
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            			</tr>

		                            			<tr>
		                            				<td>
		                            					Số lượng tủ quần áo
		                            				</td>
		                            				<td>
		                            					<span class="icon glyphicon glyphicon-ok" aria-hidden="true"></span>
		                            				</td>
		                            				<td>
		                            					Khoảng cách trần nhà
		                            				</td>
		                            				<td>
		                            					<span class="icon glyphicon glyphicon-remove" aria-hidden="true"></span>
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            			</tr>

		                            			<tr>
		                            				<td>
		                            					Số lượng tủ lạnh
		                            				</td>
		                            				<td>
		                            					<span class="icon glyphicon glyphicon-ok" aria-hidden="true"></span>
		                            				</td>
		                            				<td>
		                            					Nội thất mới
		                            				</td>
		                            				<td>
		                            					<span class="icon glyphicon glyphicon-remove" aria-hidden="true"></span>
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            			</tr>

		                            			<tr>
		                            				<td>
		                            					Số lượng máy lạnh
		                            				</td>
		                            				<td>
		                            					0
		                            				</td>
		                            				<td>
		                            					Bồn tắm
		                            				</td>
		                            				<td>
		                            					<span class="icon glyphicon glyphicon-remove" aria-hidden="true"></span>
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            			</tr>
		                            			<tr>
		                            				<td>
		                            					Số lượng TV
		                            				</td>
		                            				<td>
		                            					0
		                            				</td>
		                            				<td>
		                            					Tủ đàu giường
		                            				</td>
		                            				<td>
		                            					<span class="icon glyphicon glyphicon-remove" aria-hidden="true"></span>
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            			</tr>

		                            			<tr>
		                            				<td>
		                            					Bàn trang điểm
		                            				</td>
		                            				<td>
		                            					0
		                            				</td>
		                            				<td>
		                            					Kệ TV
		                            				</td>
		                            				<td>
		                            					<span class="icon glyphicon glyphicon-remove" aria-hidden="true"></span>
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            			</tr>
		                            			<tr>
		                            				<td>
		                            					
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            				<td>
		                            					Bàn ăn
		                            				</td>
		                            				<td>
		                            					<span class="icon glyphicon glyphicon-remove" aria-hidden="true"></span>
		                            				</td>
		                            				<td>
		                            					
		                            				</td>
		                            			</tr>
		                            		</tbody>
		                            	</table>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="panel panel-default" id="panel4">
		                        <div class="panel-heading even">
		                            <h4 class="panel-title facility">
		                                <a data-toggle="collapse" data-target="#collapseFour"
		                                   href="#collapseFour" class="collapsed" data-parent="#accordion">		                                    
		                                    <span class="facility-title">Tiện ích khu vực |</span>&nbsp <span class="title-more">Xem thêm đầy đủ</span>
		                                     <span class="facility-more">
		                                    	<span class="icon" aria-hidden="true"></span>
		                                    </span>
		                                </a>
		                            </h4>

		                        </div>
		                        <div id="collapseFour" class="panel-collapse collapse">
		                            <div class="panel-body" style="border-top: none;">
		                            	<img src="{{ URL::asset('default/images/chi-tiet/area-facility.png') }}" class="img-responsive">
		                            </div>
		                        </div>
		                    </div>
		                </div>                
		                
		            </div>
                </div>
                <div class="" style="clear:both;"></div>
            </div>

        </div>

    </div>
</div>

@endsection