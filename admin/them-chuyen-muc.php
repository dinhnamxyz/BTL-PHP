<?php require(__DIR__.'/layouts/header.php'); ?>	
<?php 
require('../database/connect.php');	
require('../database/query.php');	


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$tenchuyenmuc = $_POST['tenchuyenmuc'];
	$sql_insert = "INSERT INTO `chuyenmuc`(`tenchuyenmuc`) VALUES ('".$tenchuyenmuc."')";
	queryExecute($conn,$sql_insert);
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
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Chuyên mục</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm chuyên mục</li>
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
                                        <label class="col-md-12">Tên chuyên mục</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Nhập tên chuyên mục" class="form-control form-control-line" required name="tenchuyenmuc">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success text-white" type="submit">Thêm Chuyên Mục</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php require(__DIR__.'/layouts/footer.php'); ?>		
