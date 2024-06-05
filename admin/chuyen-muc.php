<?php require(__DIR__.'/layouts/header.php'); ?>		

<?php 
require('../database/connect.php');	
require('../database/query.php');	
$sql = "SELECT * FROM chuyenmuc";
$result = queryResult($conn,$sql);

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
                                    <li class="breadcrumb-item active" aria-current="page">Chuyên mục</li>
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
                                <h4 class="card-title">
                                	Chuyên Mục
                                	<a class="btn btn-success text-white" style="float: right;" href="them-chuyen-muc.php">Thêm Chuyên Mục</a>
                            	</h4>
                                <h6 class="card-subtitle">Thông tin các chuyên mục sản phẩm trong cửa hàng</h6>
                                <h6 class="card-title m-t-40"><i class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Danh sách chuyên mục</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tên Chuyên Mục</th>
                                                <th scope="col">Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       		<?php if(!isset($result->num_rows)){ ?>
                                       			<p>Không có chuyên mục nào để hiển thị</p>
                                       		<?php } else { ?>
                                        	<?php 
					                            $i = 1;
					                        ?>
					                        <?php while($row = $result->fetch_assoc()) { ?>
	                                            <tr>
	                                                <th scope="row"><?php echo $i; ?></th>
	                                                <td><?php echo $row['tenchuyenmuc']; ?></td>
	                                                <td>
	                                                	<a href="sua-chuyen-muc.php?id=<?php echo $row['machuyenmuc']; ?>" style="margin-right: 20px;"><i class="fa-solid fa-pen-to-square"></i></a>
	                                                	<a href="xoa-chuyen-muc.php?id=<?php echo $row['machuyenmuc']; ?>"><i class="fa-solid fa-trash"></i></a>
	                                                </td>
	                                            </tr>
                                            <?php $i++; } } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php require(__DIR__.'/layouts/footer.php'); ?>		
