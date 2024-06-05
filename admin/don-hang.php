<?php require(__DIR__.'/layouts/header.php'); ?>		

<?php 
require('../database/connect.php');	
require('../database/query.php');	
$sql = "SELECT donhang.madonhang, donhang.makhachhang, donhang.trangthai AS trangthaihang, donhang.tongtien, donhang.diachi AS diachihang, donhang.thoigian, khachhang.* FROM donhang, khachhang WHERE donhang.makhachhang = khachhang.makhachhang ORDER BY donhang.madonhang DESC";
$result = queryResult($conn,$sql);

?>

<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Quản Lý Đơn Hàng</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Đơn Hàng</li>
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
                                	Đơn Hàng
                            	</h4>
                                <h6 class="card-subtitle">Thông tin đơn hàng trong hệ thống</h6>
                                <h6 class="card-title m-t-40"><i class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Danh sách đơn hàng</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Mã Đơn Hàng</th>
                                                <th scope="col">Tên Khách Hàng</th>
                                                <th scope="col">Địa Chỉ</th>
                                                <th scope="col">Số Điện Thoại</th>
                                                <th scope="col">Tổng Tiền</th>
                                                <th scope="col">Thời Gian</th>
                                                <th scope="col">Trạng Thái</th>
                                                <th scope="col">Hành Động</th>
                                                <th scope="col">Hủy Đơn</th>
                                                <th scope="col">Xem Đơn</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       		<?php if(!isset($result->num_rows)){ ?>
                                       			<p>Không có đơn hàng nào để hiển thị</p>
                                       		<?php } else { ?>

					                        <?php while($row = $result->fetch_assoc()) { ?>
	                                            <tr>
	                                                <th scope="row">#000<?php echo $row['madonhang']; ?></th>
	                                                <td><?php echo $row['tenkhachhang']; ?></td>
	                                                <td><?php echo $row['diachihang']; ?></td>
	                                                <td><?php echo $row['sodienthoai']; ?></td>
                                                    <td><?php echo number_format($row['tongtien']); ?>đ</td>
                                                    <td><?php echo $row['thoigian']; ?></td>
	                                                <td>
                                                        <?php 
                                                            if($row['trangthaihang'] == 0){
                                                                echo "Chưa duyệt đơn";
                                                            }else if($row['trangthaihang'] == 1){
                                                                echo "Đang giao hàng";
                                                            }else if($row['trangthaihang'] == 2){
                                                                echo "Đã hủy đơn";
                                                            }else if($row['trangthaihang'] == 3){
                                                                echo "Khách đã nhận";
                                                            }
                                                         ?>
                                                            
                                                    </td>
                                                    <td>
                                                        <?php if($row['trangthaihang'] == 0){ ?>
                                                                <a class="btn btn-success text-white" href="xu-ly-don.php?action=1&id=<?php echo $row["madonhang"]; ?>">Xác Nhận Đơn</a>
                                                        <?php }else if($row['trangthaihang'] == 1){ ?>
                                                            <a class="btn btn-warning text-white" href="xu-ly-don.php?action=3&id=<?php echo $row["madonhang"]; ?>">Giao Thành Công</a>
                                                        <?php }else{ ?>
                                                            <?php echo 'Không được phép'; ?>
                                                        <?php } ?>
                                                    </td>
	                                                <td>
                                                        
                                                        <?php if($row['trangthaihang'] != 3 && $row['trangthaihang'] != 2){ ?>
                                                            <a class="btn btn-danger text-white" href="xu-ly-don.php?action=2&id=<?php echo $row["madonhang"]; ?>">Hủy Đơn Hàng</a>
                                                        <?php }else{ ?>
                                                            <?php echo 'Không được phép'; ?>
                                                        <?php } ?>
	                                                </td>
                                                    <td>
                                                        <a class="btn btn-default text-white" href="chi-tiet-don-hang.php?id=<?php echo $row["madonhang"]; ?>">Xem</a>
                                                    </td>
	                                            </tr>
                                            <?php } } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php require(__DIR__.'/layouts/footer.php'); ?>		
