<?php require(__DIR__.'/layouts/header.php'); ?>	
<?php 
require('../database/connect.php');	
require('../database/query.php');	

$machuyenmuc = $_GET['id'];

$sql = "SELECT * FROM chuyenmuc WHERE machuyenmuc = ".$machuyenmuc;
$result = queryResult($conn,$sql);

$chuyenmuc = $result->fetch_assoc();


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$tenchuyenmuc = $_POST['tenchuyenmuc'];
	$sql_update = "UPDATE `chuyenmuc` SET `tenchuyenmuc`='".$tenchuyenmuc."' WHERE `machuyenmuc`= ".$machuyenmuc;
	queryExecute($conn,$sql_update);
    echo '<script type="text/JavaScript"> window.location.href = "http://localhost/webbansach/admin/chuyen-muc.php"; </script>';
}


?>
<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Quản Lý Chuyên Mục</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Chuyên Mục</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sửa Chuyên Mục</li>
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
                                        <label class="col-md-12">Mã Chuyên Mục</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Nhập mã chuyên mục" class="form-control form-control-line"  name="machuyenmuc" value="<?php echo $chuyenmuc['machuyenmuc']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Tên Chuyên Mục</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Nhập tên chuyên mục" class="form-control form-control-line"  name="tenchuyenmuc" value="<?php echo $chuyenmuc['tenchuyenmuc']; ?>" required> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success text-white" type="submit">Sửa Chuyên Mục</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php require(__DIR__.'/layouts/footer.php'); ?>        
