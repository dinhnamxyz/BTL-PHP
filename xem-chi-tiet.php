<?php require(__DIR__.'/layouts/header.php'); ?>  
<?php 
if(!isset($_SESSION['dangnhap'])){
	echo "<script>window.location.href = 'dang-nhap.php';</script>";
}

$taikhoan = $_SESSION['taikhoan'];
$sql_mkh = "SELECT * FROM khachhang WHERE taikhoan = '".$taikhoan."'";
$mkh = queryResult($conn,$sql_mkh)->fetch_assoc()['makhachhang'];

$madonhang = $_GET['id'];
$sql_donhang = "SELECT * FROM donhang WHERE makhachhang = ".$mkh." AND madonhang = ".$madonhang."";
$donhang = queryResult($conn,$sql_donhang)->fetch_assoc();


$sql_chitiet = "SELECT chitietdonhang.*, sanpham.masanpham, sanpham.tensanpham, sanpham.giaban FROM chitietdonhang, sanpham WHERE chitietdonhang.masanpham = sanpham.masanpham AND madonhang = ".$madonhang."";
$chitietdonhang = queryResult($conn,$sql_chitiet);


?>
		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
							<li class="breadcrumb-item">Tài Khoản</li>
							<li class="breadcrumb-item active">Chi Tiết Đơn Hàng</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>

		<!-- order complete Page Start -->
		<section class="order-complete inner-page-sec-padding-bottom">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="order-complete-message text-center">
							<h1>Thông tin đơn hàng</h1>
							<p>Đơn hàng của bạn đã được đặt hàng thành công.</p>
						</div>
						<ul class="order-details-list">
							<li>Mã đơn hàng: <strong>#000<?php echo $donhang['madonhang']; ?></strong></li>
							<li>Thời gian: <strong><?php echo $donhang['thoigian']; ?></strong></li>
							<li>Tổng tiền: <strong><?php echo number_format($donhang['tongtien']); ?>đ</strong></li>
							<li>Hình thức thanh toán: <strong>Trả tiền khi nhận hàng</strong></li>
							<li>
								Trạng thái: <strong>
									<?php 
										if($donhang['trangthai'] == 0){
											echo "Đang đợi duyệt";
										}else if($donhang['trangthai'] == 1){
											echo "Đang giao hàng";
										}else if($donhang['trangthai'] == 2){
											echo "Đã hủy đơn";
										}else if($donhang['trangthai'] == 3){
											echo "Đã nhận hàng";
										}
									?>
								</strong>
							</li>
						</ul>
						<h3 class="order-table-title">Chi Tiết Đơn Hàng</h3>
						<div class="table-responsive">
							<table class="table order-details-table">
								<thead>
									<tr>
										<th>Tên Sách</th>
										<th>Thành tiền</th>
									</tr>
								</thead>
								<tbody>
									<?php while($row = $chitietdonhang->fetch_assoc()){ ?>
										<tr> <td><a href="http://localhost/webbansach/san-pham.php?id=<?php echo $row['masanpham']; ?>"><?php echo $row['tensanpham']; ?></a> <strong>× <?php echo $row['soluong']; ?></strong></td> <td><span><?php echo number_format($row['giaban'] * $row['soluong']); ?>đ</span></td> </tr>
									<?php } ?>
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- order complete Page End -->
	</div>
<?php require(__DIR__.'/layouts/footer.php'); ?>  