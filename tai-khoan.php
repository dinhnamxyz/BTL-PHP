<?php require(__DIR__.'/layouts/header.php'); ?>  
<?php 
if(!isset($_SESSION['dangnhap'])){
	echo "<script>window.location.href = 'dang-nhap.php';</script>";
}

$taikhoan = $_SESSION['taikhoan'];
$sql_mkh = "SELECT * FROM khachhang WHERE taikhoan = '".$taikhoan."'";
$kh = queryResult($conn,$sql_mkh)->fetch_assoc();
$mkh = $kh['makhachhang'];

$sql_donhang = "SELECT * FROM donhang WHERE  makhachhang = ".$mkh." ORDER BY madonhang DESC";
$donhang = queryResult($conn,$sql_donhang);


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$tenkhachhang = $_POST['tenkhachhang'];
	$diachi = $_POST['diachi'];
	$sodienthoai = $_POST['sodienthoai'];
	$matkhau = $kh['matkhau'];

	if(!empty($_POST['matkhau'])){
		$matkhau = $_POST['matkhau'];
	}

	$sql_update= "UPDATE `khachhang` SET `tenkhachhang`='".$tenkhachhang."',`diachi`='".$diachi."',`sodienthoai`='".$sodienthoai."',`matkhau`='".$matkhau."' WHERE makhachhang = ".$mkh."";
	$capnhat = queryExecute($conn,$sql_update);

	

}

?>
		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
							<li class="breadcrumb-item active">Tài Khoản</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<div class="page-section inner-page-sec-padding">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="row">
							<!-- My Account Tab Menu Start -->
							<div class="col-lg-3 col-12">
								<div class="myaccount-tab-menu nav" role="tablist">
									<a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
										Đơn Hàng</a>
									<a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Tài Khoản</a>
									<a href="dang-xuat.php"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a>
								</div>
							</div>
							<!-- My Account Tab Menu End -->
							<!-- My Account Tab Content Start -->
							<div class="col-lg-9 col-12 mt--30 mt-lg--0">
								<div class="tab-content" id="myaccountContent">
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade show active" id="dashboad" role="tabpanel">
										<div class="myaccount-content">
											<h3>Đơn Hàng</h3>
											<div class="myaccount-table table-responsive text-center">
												<table class="table table-bordered">
													<thead class="thead-light">
														<tr>
															<th>Mã Đơn</th>
															<th>Ngày Đặt</th>
															<th>Tổng Tiền</th>
															<th>Trạng Thái</th>
															<th>Xem</th>
														</tr>
													</thead>
													<tbody>
														<?php if(!isset($donhang->num_rows)){ ?>

														<?php }else{ ?>
															<?php while($row = $donhang->fetch_assoc()){ ?>
																<tr>
																	<td>#000<?php echo $row['madonhang']; ?></td>
																	<td><?php echo $row['thoigian']; ?></td>
																	<td><?php echo number_format($row['tongtien']); ?>đ</td>
																	<td>
																		<?php 
																			if($row['trangthai'] == 0){
																				echo "Đang đợi duyệt";
																			}else if($row['trangthai'] == 1){
																				echo "Đang giao hàng";
																			}else if($row['trangthai'] == 2){
																				echo "Đã hủy đơn";
																			}else if($row['trangthai'] == 3){
																				echo "Đã nhận hàng";
																			}
																		?>
																	</td>
																	<td><a href="xem-chi-tiet.php?id=<?php echo $row['madonhang'] ?>" class="btn">Xem Chi Tiết</a></td>
																</tr>
															<?php } ?>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									
									<div class="tab-pane fade" id="account-info" role="tabpanel">
										<div class="myaccount-content">
											<h3>Thông Tin Tài Khoản</h3>
											<div class="account-details-form">
												<form method="POST">
													<div class="row">
														<div class="col-12  mb--30">
															<input id="display-name" placeholder="Họ tên.."
																type="text" required name="tenkhachhang" value="<?php echo $kh['tenkhachhang']; ?>">
														</div>
														<div class="col-12  mb--30">
															<input id="display-name" placeholder="Số điện thoại.."
																type="text" required name="sodienthoai" value="<?php echo $kh['sodienthoai']; ?>">
														</div>
														<div class="col-12  mb--30">
															<input id="display-name" placeholder="Địa chỉ.."
																type="text" required name="diachi" value="<?php echo $kh['diachi']; ?>">
														</div>
														<div class="col-12  mb--30">
															<input id="display-name" placeholder="Tài khoản.."
																type="text" required name="taikhoan" disabled value="<?php echo $kh['taikhoan']; ?>">
														</div>
														<div class="col-12  mb--30">
															<input id="current-pwd" placeholder="Mật khẩu mới.."
																type="password" name="matkhau">
														</div>
														<div class="col-12">
															<button class="btn btn--primary" type="submit">Cập Nhật</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<!-- Single Tab Content End -->
								</div>
							</div>
							<!-- My Account Tab Content End -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php require(__DIR__.'/layouts/footer.php'); ?>    