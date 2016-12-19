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

		<div id="page_detail_container" class="container full-width">
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
						<p>Tọa lạc trên con phó sầm uất Lũy Bán Bích (Q.Tân Phú), nhà phố nổi bật với kiến trúc hiện đại, sang trọng với tường trắng, mái ngói xám nâu điểm tô tường đá cao cấp ở tầng trệt.</p>
						<p>
							Từ khoảng sân rộng rãi, bạn sẽ được dẫn vào hai gian nhà riêng với nhà xe có lối cầu thang lên lầu, không gian sinh hoạt chung với khách và nhà bếp được thiết kế thông nhau theo phong cách hiện đại mang sự thoáng đãng và rộng rãi với gam màu trắng chủ đạo.
						</p>
						<div class="property-contact">
							<span>Liên hệ: </span>
							<strong>STDA Miền Nam - 19006868</strong>
						</div>
					</div>
				</div>
				<div class="col-sm-6 property-right">
					<div class="property-title">
						<h4>
							BÁN NHÀ MẶT TIỀN :300 LŨY BÁN BÍCH P. HIỆP TÂN Q. TÂN PHÚ
						</h4>
						<div class="property-address">
							300 Lũy Bán Bích, P. Hiệp Tân, Q. Tân Phú, Tp. Hồ Chí Minh
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
									<img src="{{ URL::asset('default/images/property_icon_4.png') }}"/>105 m<sup>2</sup>
								</span>
							</li>
							<li class=""><img src="{{ URL::asset('default/images/property_icon_5.png') }}"/> 33.33 triệu/m<sup>2</sup></li>
							<li class=""><img src="{{ URL::asset('default/images/property_icon_6.png') }}"/> Giá bán 3.5 tỷ</li>
						</ul>
					</div>
					<div class="meta-content">
						<div class="panel-group" id="accordion">
							<div class="panel panel-default" id="panel1">
								<div class="panel-heading odd">
									<h4 class="panel-title facility">
										<a data-toggle="collapse" data-target="#collapseOne"
										href="#collapseOne" data-parent="#accordion">
										<span class="facility-title">Tiện nghi |</span> &nbsp <span class="title-more">Xem thêm đầy đủ</span>
										<span class="facility-more">
											<span class="icon" aria-hidden="true"></span>
										</span>
									</a>
								</h4>

							</div>
							<div id="collapseOne" class="panel-collapse collapse in">
								<div class="panel-body">
									<table id="table_facility" class="table_option table">
										<tbody>
											<tr>
												<td>
													Cáp TV
												</td>
												<td>
													<span class="icon glyphicon glyphicon-ok" aria-hidden="true"></span>
												</td>
												<td>
													Phòng cho người giúp việc
												</td>
												<td>
													<span class="icon glyphicon glyphicon-remove" aria-hidden="true"></span>
												</td>
												<td>

												</td>
											</tr>

											<tr>
												<td>
													Ban công Internet
												</td>
												<td>
													<span class="icon glyphicon glyphicon-ok" aria-hidden="true"></span>
												</td>
												<td>
													Hệ thống báo cháy
												</td>
												<td>
													<span class="icon glyphicon glyphicon-remove" aria-hidden="true"></span>
												</td>
												<td>

												</td>
											</tr>

											<tr>
												<td>
													Cho phép nấu ăn
												</td>
												<td>
													<span class="icon glyphicon glyphicon-ok" aria-hidden="true"></span>
												</td>
												<td>
													Bãi đậu xe hơi
												</td>
												<td>
													<span class="icon glyphicon glyphicon-remove" aria-hidden="true"></span>
												</td>
												<td>

												</td>
											</tr>

											<tr>
												<td>
													Cho phép thú cứng
												</td>
												<td>
													<span class="icon glyphicon glyphicon-ok" aria-hidden="true"></span>
												</td>
												<td>
													Thang máy
												</td>
												<td>
													<span class="icon glyphicon glyphicon-remove" aria-hidden="true"></span>
												</td>
												<td>

												</td>
											</tr>
											<tr>
												<td>
													Trần nhà cao
												</td>
												<td>
													<span class="icon glyphicon glyphicon-ok" aria-hidden="true"></span>
												</td>
												<td>
													Thang máy riêng
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
						<div class="panel panel-default" id="panel2">
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
					<div class="panel-body">
						<table id="table_area_facility" class="table_option table">
							<tbody>
								<tr>
									<td>
										Trường học
									</td>
									<td>
										600m
									</td>
									<td>
										Sân bay
									</td>
									<td>

									</td>
									<td>

									</td>
								</tr>

								<tr>
									<td>
										Trạm ATM
									</td>
									<td>
										30m
									</td>
									<td>
										Siêu thị
									</td>
									<td>

									</td>
									<td>

									</td>
								</tr>
								<tr>
									<td>
										Bệnh viện
									</td>
									<td>
										200m
									</td>
									<td>
										Trạm xe buýt
									</td>
									<td>

									</td>
									<td>

									</td>
								</tr>

								<tr>
									<td>
										Nhà hàng
									</td>
									<td>

									</td>
									<td>
										Trung tâm TP
									</td>
									<td>

									</td>
									<td>

									</td>
								</tr>

								<tr>
									<td>
										Ngân hàng
									</td>
									<td>

									</td>
									<td>
										Công viên
									</td>
									<td>

									</td>
									<td>

									</td>
								</tr>

								<tr>
									<td>
										Gas xe lửa
									</td>
									<td>

									</td>
									<td>
										Bưu điện
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
										Chợ
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
		</div>                

	</div>
</div>
<div class="" style="clear:both;"></div>
</div>

</div>

</div>
</div>
@endsection