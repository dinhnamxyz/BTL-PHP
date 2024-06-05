<?php require(__DIR__.'/layouts/header.php'); ?>	
<?php 
require('../database/connect.php');	
require('../database/query.php');	

$taikhoan = $_SESSION['user'];

$sql = "SELECT * FROM nhanvien WHERE taikhoan = '".$taikhoan."'";
$result = queryResult($conn,$sql)->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$hoten = $_POST['hoten'];
    $sodienthoai = $_POST['sodienthoai'];
    $diachi = $_POST['diachi'];
    $matkhau = $result['matkhau'];

    if(!empty($_POST['matkhau'])){
        $matkhau = $_POST['matkhau'];
    }

	$sql_update = "UPDATE nhanvien SET hoten = '".$hoten."', sodienthoai = '".$sodienthoai."', diachi = '".$diachi."', matkhau = '".$matkhau."'";
	queryExecute($conn,$sql_update);

    $_SESSION['fullname'] = $hoten;
    echo '<script type="text/JavaScript"> window.location.href = "http://localhost/webbansach/admin/ca-nhan.php"; </script>';
}


?>
<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Thông Tin Cá Nhân</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Cá nhân</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-md-12">Mã Nhân Viên</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Nhập mã nhân viên" class="form-control form-control-line" required disabled value="<?php echo $result['manhanvien']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Tài Khoản</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Nhập tài khoản" class="form-control form-control-line" required name="taikhoan" disabled value="<?php echo $taikhoan; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Họ Tên</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Nhập họ tên" class="form-control form-control-line" required name="hoten" value="<?php echo $result['hoten']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Số Điện Thoại</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Nhập số điện thoại" class="form-control form-control-line" required name="sodienthoai" value="<?php echo $result['sodienthoai']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Địa Chỉ</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Nhập địa chỉ" class="form-control form-control-line" required name="diachi" value="<?php echo $result['diachi']; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-12">Mật Khẩu</label>
                                        <div class="col-md-12">
                                            <input type="password" placeholder="Nhập mật khẩu" class="form-control form-control-line"  name="matkhau">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success text-white" type="submit">Cập Nhật Thông Tin</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php require(__DIR__.'/layouts/footer.php'); ?>		
