<?php require(__DIR__.'/layouts/header.php'); ?>    
<?php 

if(isset($_SESSION['dangnhap'])){
	echo "<script>window.location.href = 'index.php';</script>";
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['dangky'])){
	$hoten = $_POST['hoten'];
	$taikhoan = $_POST['taikhoan'];
	$sodienthoai = $_POST['sodienthoai'];
	$matkhau = $_POST['matkhau'];
	$nhaplaimatkhau = $_POST['nhaplaimatkhau'];
	$diachi = $_POST['diachi'];
	$err = "";
	$success = "";
	if($matkhau != $nhaplaimatkhau){
		$err = "Mật khẩu nhập không khớp!";
	}else{
		$sql_check = "SELECT count(*) AS num FROM khachhang WHERE taikhoan = '".$taikhoan."'";
		$check = queryResult($conn,$sql_check)->fetch_assoc();

		if($check['num'] == 0){
			$sql_insert= "INSERT INTO `khachhang`(`tenkhachhang`, `diachi`, `sodienthoai`, `taikhoan`, `matkhau`) VALUES ('".$hoten."','".$diachi."','".$sodienthoai."','".$taikhoan."','".$matkhau."')";
			$insert = queryExecute($conn,$sql_insert);
			$success = "Đăng ký thành công! Vui lòng đăng nhập!";
		}else{
			$err = "Tài khoản đã tồn tại!";
		}
	}
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['dangnhap'])){
	$taikhoan = $_POST['taikhoan'];
	$matkhau = $_POST['matkhau'];
	$err_dangnhap = "";
	$sql_check = "SELECT count(*) AS num FROM khachhang WHERE taikhoan = '".$taikhoan."' AND matkhau = '".$matkhau."'";
	$check = queryResult($conn,$sql_check)->fetch_assoc();

	if ($check['num'] == 1) {
		$sql_check2 = "SELECT count(*) AS num FROM khachhang WHERE taikhoan = '".$taikhoan."' AND trangthai = 0";
		$check2 = queryResult($conn,$sql_check2)->fetch_assoc();
		if ($check2['num'] == 1) {
			$err_dangnhap = "Tài khoản bị cấm bởi admin!";
		}else{
			$_SESSION['dangnhap'] = TRUE;
			$_SESSION['taikhoan'] = $taikhoan;
			echo "<script>window.location.href = 'index.php';</script>";
		}
	}else{
		$err_dangnhap = "Sai tài khoản hoặc mật khẩu!";
	}
		
}


?>

		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
							<li class="breadcrumb-item active">Đăng Nhập</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<!--=============================================
    =            Login Register page content         =
    =============================================-->
		<main class="page-section inner-page-sec-padding-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">
						<!-- Login Form s-->
						<form method="POST">
							<div class="login-form">
								<h4 class="login-title">Khách Hàng Mới</h4>
								<p><span class="font-weight-bold">Đăng ký tài khoản</span></p>
								<?php if(isset($err) && !empty($err)){ ?>
									<div class="col-md-12">
										<p style="font-size: 15px; color: #62ab00; font-weight: bold;"><?php echo $err; ?></p>
									</div>
								<?php } ?>
								<?php if(isset($success) && !empty($success)){ ?>
									<div class="col-md-12">
										<p style="font-size: 15px; color: #62ab00; font-weight: bold;"><?php echo $success; ?></p>
									</div>
								<?php } ?>
								<div class="row">
									<div class="col-md-12 col-12 mb--15">
										<label for="name">Họ tên</label>
										<input class="mb-0 form-control" type="text" id="name"
											placeholder="Nhập tên bạn.."  name="hoten">
											<span id = "span_hoten"></span>
									</div>
									<div class="col-12 mb--20">
										<label for="tk">Tài khoản</label>
										
										<input class="mb-0 form-control" type="text" id="tk" placeholder="Nhập tên đăng nhập.."  name="taikhoan">
										<span id = "span_tk"></span>
									</div>
									<div class="col-12 mb--20">
										<label for="sdt">Số điện thoại</label>
										<input class="mb-0 form-control" type="text" id="sdt" placeholder="Nhập số điện thoại.."  name="sodienthoai">
										<span id = "span_sdt"></span>
									</div>
									<div class="col-12 mb--20">
										<label for="dc">Địa chỉ</label>
										<input class="mb-0 form-control" type="text" id="dc" placeholder="Nhập địa chỉ.."  name="diachi">
										<span id = "span_dc"></span>
									</div>
									<div class="col-lg-6 mb--20">
										<label for="password">Mật khẩu</label>
										<input class="mb-0 form-control" type="password" id="password" placeholder="Nhập mật khẩu.."  name="matkhau">
										<span id = "span_password"></span>
									</div>
									<div class="col-lg-6 mb--20">
										<label for="password-confirm">Nhập lại mật khẩu</label>
										<input class="mb-0 form-control" type="password" id="password-confirm" placeholder="Nhập lại mật khẩu.."  name="nhaplaimatkhau">
										<span id = "span_password_confirm"></span>
									</div>
									<div class="col-md-12">
										<input type="submit" class="btn btn-outlined" name="dangky" value="Đăng Ký">
									</div>

									
								</div>
							</div>
						</form>
					</div>
					<!-- Validate đăng kí -->
					<script>
						const hoTen = document.getElementById('name');
						const tk = document.getElementById('tk');
						const sdt = document.getElementById('sdt');
						const dc = document.getElementById('dc');
						const password = document.getElementById('password');
						const password_confirm = document.getElementById('password-confirm');

						hoTen.addEventListener('focusout', function(){
							const hoTenValue = hoTen.value.trim();
							let errorMessage = '';
							if(hoTenValue === '')
							{
								errorMessage = 'Họ tên không được để trống !!!';
							}
							const spanError = document.getElementById('span_hoten');
							if(errorMessage !=='')
							{
								spanError.innerHTML = errorMessage;
								hoTen.style.borderColor = "red";
							}else
							{
								spanError.innerHTML = '';
								hoTen.style.borderColor = '#e3e3e3'; 
							}
						});

						tk.addEventListener('focusout', () => {
							const tkValue = tk.value.trim();
							let errorMessage = '';

							if (tkValue === '') {
								errorMessage = 'Không để trống tên tài khoản';
							}else if (/\s/.test(tkValue)) {
								errorMessage = 'Tên tài khoản không được chứa khoảng trắng';
							}else if (tkValue.length < 6) {
								errorMessage = 'Tên tài khoản quá ngắn';
							}

							const errorSpan = document.getElementById("span_tk");
							if (errorMessage !== '') {
								errorSpan.innerHTML = errorMessage;
								tk.style.borderColor = "red";
							} else {
								errorSpan.innerHTML = '';
								tk.style.borderColor = "#e3e3e3";
							}
						});

						sdt.addEventListener('focusout', () => {
							const sdtValue = sdt.value.trim();
							let errorMessage = '';

							if (sdtValue === '') {
								errorMessage = 'Không để trống số điện thoại';
							}else if (/\s/.test(tkValue)) {
								errorMessage = 'Số điện thoại không được chứa khoảng trắng';
							}else if (tkValue.length != 10) {
								errorMessage = 'Số điện thoại có 10 chữ số';
							}

							const errorSpan = document.getElementById("span_sdt");
							if (errorMessage !== '') {
								errorSpan.innerHTML = errorMessage;
								sdt.style.borderColor = "red";
							} else {
								errorSpan.innerHTML = '';
								sdt.style.borderColor = "#e3e3e3";
							}
						});

						dc.addEventListener('focusout', function(){
							const dcValue = dc.value.trim();
							let errorMessage = '';
							if(dcValue === '')
							{
								errorMessage = 'Địa chỉ không được để trống !!!';
							}
							const spanError = document.getElementById('span_dc');
							if(errorMessage !=='')
							{
								spanError.innerHTML = errorMessage;
								dc.style.borderColor = "red";
							}else
							{
								spanError.innerHTML = '';
								dc.style.borderColor = '#e3e3e3'; 
							}

						});

						password.addEventListener('input', () => {
						const passwordValue = password.value.trim();
						let errorMessage = '';

						if (passwordValue === '') {
							errorMessage = 'Không để trống mật khẩu';
						} else if (/\s/.test(passwordValue)) {
							errorMessage = 'Mật khẩu không được chứa khoảng trắng';
						} else if (passwordValue.length < 6) {
							errorMessage = 'Mật khẩu yếu, phải có ít nhất 6 ký tự';
						}

						const errorSpan = document.getElementById("span_password");
						if (errorMessage !== '') {
							errorSpan.innerHTML = errorMessage;
							password.style.borderColor = "red";
						} else {
							errorSpan.innerHTML = '';
							password.style.borderColor = "#e3e3e3";
						}
					});

						password_confirm.addEventListener('focusout', () => {
						const confirmPasswordValue = password_confirm.value.trim();
						const passwordValue = password.value.trim();
						let errorMessage = '';

						if (confirmPasswordValue === '') {
							errorMessage = 'Không để trống mật khẩu';
						} else if (passwordValue !== confirmPasswordValue) {
							errorMessage = 'Mật khẩu không khớp. Vui lòng nhập lại mật khẩu';
						}

						const errorSpan = document.getElementById("span_password_confirm");
						if (errorMessage !== '') {
							errorSpan.innerHTML = errorMessage;
							password_confirm.style.borderColor = "red";
						} else {
							errorSpan.innerHTML = '';
							password_confirm.style.borderColor = "#e3e3e3";
						}
					});
					</script>

					</script>

					<div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
						<form method="POST">
							<div class="login-form">
								<h4 class="login-title">Đăng Nhập Khách Hàng</h4>
								<p><span class="font-weight-bold">Đăng nhập bằng tài khoản</span></p>
								<?php if(isset($err_dangnhap) && !empty($err_dangnhap)){ ?>
									<div class="col-md-12">
										<p style="font-size: 15px; color: #62ab00; font-weight: bold;"><?php echo $err_dangnhap; ?></p>
									</div>
								<?php } ?>
								<div class="row">
									<div class="col-md-12 col-12 mb--15">
										<label for="email">Tài khoản</label>
										<input class="mb-0 form-control" type="text" id="email1"
											placeholder="Nhập tài khoản.." name="taikhoan" >
										<span id = "span_error_tk"></span>
									</div>
									<div class="col-12 mb--20">
										<label for="password">Mật khẩu</label>
										<input class="mb-0 form-control" type="password" id="login-password" placeholder="Nhập mật khẩu.." name="matkhau" >
										<span id = "span_error_pass"></span>
									</div>
									<div class="col-md-12">
										<input type="submit" class="btn btn-outlined" name="dangnhap" value="Đăng Nhập">
									</div>
								</div>
							</div>
						</form>
					</div>
					<!-- Validate đăng nhập -->
					<script>
						const taiKhoanDangNhap =  document.getElementById('email1');
						taiKhoanDangNhap.addEventListener('focusout', ()=>{
							var taiKhoanDangNhapValue = taiKhoanDangNhap.value.trim();
							let errorMessage  = '';
							if(taiKhoanDangNhapValue ==='')
							{
								errorMessage = "Vui lòng nhập tài khoản";
							}else if(/\s/.test(taiKhoanDangNhapValue))
							{
								errorMessage = "Tài khoản không chứa khoảng trắng";
							}


							var spanError  = document.getElementById('span_error_tk');
							if(errorMessage !=="")
							{
								spanError.innerHTML = errorMessage;
								taiKhoanDangNhap.style.borderColor = "red";
							}else
							{
								spanError.innerHTML = '';
								taiKhoanDangNhap.style.borderColor = "#e3e3e3";
							}

						});


						const matKhauDangNhap =  document.getElementById('login-password')
						matKhauDangNhap.addEventListener('focusout', ()=> {
							var matKhauDangNhapValue = matKhauDangNhap.value.trim();
							let errorMessage = '';
							if(matKhauDangNhapValue  ==='')
							{
								errorMessage = 'Vui lòng nhập mật khẩu';
							}else if (/\s/.test(matKhauDangNhapValue))
							{
								errorMessage = 'Mật khẩu đang chứa khoảng trắng. Vui lòng kiểm tra lại !!!';
							}


							const spanError = document.getElementById('span_error_pass');
							if(errorMessage != '')
							{
								spanError.innerHTML =  errorMessage;
								matKhauDangNhap.style.borderColor = 'red';
							}else
							{
								spanError.innerHTML = '';
								matKhauDangNhap.style.borderColor = '#e3e3e3';
							}
						});


					</script>
				</div>
			</div>
		</main>
	</div>

<?php require(__DIR__.'/layouts/footer.php'); ?>    
