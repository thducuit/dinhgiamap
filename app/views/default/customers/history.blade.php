@extends('default.layouts.default')
@section('content')
<!--
/*==============================*\
MAIN 
/*==============================*\
-->
<div id="main" class="minscreen">
	<div class="main_wrapper">
		
		<div class="profile_wrapper clearfix">
			<div class="profile_left">
				<div class="clearfix">
					<div class="profile_info_wrapper">
						<div class="profile_avatar_wrapper">
							<div class="profile_avatar" style="background: url(images/icon_camera.png) center no-repeat; background-size: cover;"></div>
						</div>
						<div class="profile_name">
							<span>Lê Hoàng Thành</span>
						</div>								
					</div>
					<div class="profile_info_wrapper">
						<p class="sotien">Số tiền: <strong>250.000 VNĐ</strong></p>
						<button type="button" class="btn btn_gradient_yellow btn_naptien">Nạp tiền</button>
					</div>
				</div>
				<div class="profile_menu">
					<ul>
						<li><a href="thong-tin-tai-khoan.html">Thông tin tài khoản</a></li>
						<li ><a href="lich-su-giao-dich.html">Lịch sử giao dịch</a></li>
						<li class="current"><a href="xem-tai-san-dinh-gia.html">Xem tài sản định giá</a></li>
					</ul>
				</div>
			</div>
			<div class="profile_right profile_lichsugiaodich">
				<div class="profile_right_inner">
					<div class="filter_container clearfix">								
						<div class="filter_col">
							<label>Từ ngày</label>
							<div class="input-group date" id="datetimepicker_ngaybatdau">
								<input class="form-control" type="text" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>						
						<div class="filter_col">
							<label>Đến ngày</label>
							<div class="input-group date" id="datetimepicker_ngayketthuc">
								<input class="form-control" type="text" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
						<div class="filter_col">
							<button type="button" class="btn btn_gradient_yellow">Lọc dữ liệu</button>
						</div>
					</div>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<td>Ngày</td>
									<td>Loại giao dịch</td>
									<td>Số tiền / lượt</td>
									<td>Trạng thái</td>
									<td>Chứng thư</td>
                                                                                    <td>Thời hạn</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>15:08:2016 15:28:21</td>
									<td>Xem qui hoạch</td>
									<td>20.000VNĐ</td>
									<td>Giao dịch thành công</td>
                                                                                    <td>
                                                                                        <a href="#"> Xem chi tiết
                                                                                            <span class="glyphicon glyphicon-play"></span></a>
                                                                                    </td>
									<td>20/08/2016</td>
								</tr>
								<tr>
									<td>15:08:2016 15:28:21</td>
									<td>Xem qui hoạch</td>
									<td>20.000VNĐ</td>
									<td>Giao dịch thành công</td>
                                                                                     <td>
                                                                                        <a href="#"> Xem chi tiết
                                                                                            <span class="glyphicon glyphicon-play"></span></a>
                                                                                    </td>
									<td>20/08/2016</td>
								</tr>
								<tr>
									<td>15:08:2016 15:28:21</td>
									<td>Xem qui hoạch</td>
									<td>20.000VNĐ</td>
									<td>Giao dịch thành công</td>
                                                                                    <td>
                                                                                        <a href="#"> Xem chi tiết
                                                                                            <span class="glyphicon glyphicon-play"></span></a>
                                                                                    </td>
									<td>20/08/2016</td>
								</tr>
								<tr>
									<td>15:08:2016 15:28:21</td>
									<td>Xem qui hoạch</td>
									<td>20.000VNĐ</td>
									<td>Giao dịch thành công</td>
                                                                                    <td>
                                                                                        <a href="#"> Xem chi tiết
                                                                                            <span class="glyphicon glyphicon-play"></span></a>
                                                                                    </td>
									<td>20/08/2016</td>
								</tr>
								<tr>
									<td>15:08:2016 15:28:21</td>
									<td>Xem qui hoạch</td>
									<td>20.000VNĐ</td>
									<td>Giao dịch thành công</td>
                                                                                    <td>
                                                                                        <a href="#"> Xem chi tiết
                                                                                            <span class="glyphicon glyphicon-play"></span></a>
                                                                                    </td>
									<td>20/08/2016</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
@endsection
			