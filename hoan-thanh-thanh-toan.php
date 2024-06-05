<?php require(__DIR__.'/layouts/header.php'); ?>  
<?php 
if(!isset($_SESSION['dangnhap'])){
	echo "<script>window.location.href = 'dang-nhap.php';</script>";
}

?>
		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
							<li class="breadcrumb-item active">Thanh Toán</li>
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
							<h1>Thành công !</h1>
							<p>Đơn hàng của bạn đã được đặt hàng thành công.</p>
						</div>
						<ul class="order-details-list">
							<li>Mã đơn hàng: <strong class="mdh">0</strong></li>
							<li>Thời gian: <strong class="tg">0</strong></li>
							<li>Tổng tiền: <strong class="ttdon">0</strong></li>
							<li>Hình thức thanh toán: <strong>Trả tiền khi nhận hàng</strong></li>
						</ul>
						<p>Chúng tôi sẽ sớm xác nhận đơn cho bạn.</p>
						<h3 class="order-table-title">Chi Tiết Đơn Hàng</h3>
						<div class="table-responsive">
							<table class="table order-details-table">
								<thead>
									<tr>
										<th>Sản phẩm</th>
										<th>Thành tiền</th>
									</tr>
								</thead>
								<tbody>
									
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- order complete Page End -->
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $(document).ready(function() {
    	var giohang = localStorage.getItem('giohang')
        if(giohang != null){
        	window.location.href = 'index.php'
        }

        var donhangthanhcong = JSON.parse(localStorage.getItem('thongtindonhang'))
        for (var i = 0; i < donhangthanhcong.length; i++) {
        	var gia = parseInt(donhangthanhcong[i].giaban) * parseInt(donhangthanhcong[i].soluong) * 1000
            $('tbody').append('<tr> <td><a href="http://localhost/webbansach/san-pham.php?id='+donhangthanhcong[i].masanpham+'">'+donhangthanhcong[i].tensanpham+'</a> <strong>× '+donhangthanhcong[i].soluong+'</strong></td> <td><span>'+gia.toLocaleString('vi', {style : 'currency', currency : 'VND'})+'</span></td> </tr>')
        }

        $('.mdh').html('#000'+localStorage.getItem('madonhang'))
        $('.tg').html(localStorage.getItem('thoigian'))
        $('.ttdon').html(localStorage.getItem('tt'))

    })
</script>
<?php require(__DIR__.'/layouts/footer.php'); ?>  