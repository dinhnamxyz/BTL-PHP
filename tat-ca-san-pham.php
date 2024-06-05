<?php require(__DIR__.'/layouts/header.php'); ?>  
<?php 



$start = 0;
$limit = 6;

$sql_soluongsp = "SELECT * FROM sanpham";
$tongsanpham = queryResult($conn,$sql_soluongsp)->num_rows;
$sotrang = ceil($tongsanpham / $limit);

if(isset($_GET['trang'])){
	if($_GET['trang'] <= 0){
		$_GET['trang'] = 1;
	}

	$start = ($_GET['trang'] - 1) * $limit; 
	$sql_sanpham = "SELECT * FROM sanpham LIMIT ".$start.",".$limit;
	$sanpham = queryResult($conn,$sql_sanpham);
}else{
	$sql_sanpham = "SELECT * FROM sanpham LIMIT ".$start.",".$limit;
	$sanpham = queryResult($conn,$sql_sanpham);
}



 ?>  
		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
							<li class="breadcrumb-item active">Sản Phẩm</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<main class="inner-page-sec-padding-bottom">
			<div class="container">
				<div class="shop-toolbar mb--30">
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-2 col-sm-6">
							<!-- Product View Mode -->
							<div class="product-view-mode">
								<a href="#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>
								<a href="#" class="sorting-btn" data-target="grid-four">
									<span class="grid-four-icon">
										<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
									</span>
								</a>
								<a href="#" class="sorting-btn" data-target="list "><i class="fas fa-list"></i></a>
							</div>
						</div>
						<div class="col-xl-4 col-md-4 col-sm-6  mt--10 mt-sm--0">
							
						</div>
						<div class="col-lg-1 col-md-2 col-sm-6  mt--10 mt-md--0">
							
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
							<div class="sorting-selection">
								<span>Sắp xếp theo:</span>
								<select class="form-control nice-select sort-select mr-0">
									<option value="" selected="selected">Mặc Định</option>
									<option value="">
										Theo tên: (A - Z)</option>
									<option value="">
										Theo tên: (Z - A)</option>
									<option value="">
										Theo giá: (Thấp &gt; Cao)</option>
									<option value="">
										Theo giá: (Thấp &gt; Cao)</option>
									
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="shop-toolbar d-none">
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-2 col-sm-6">
							<!-- Product View Mode -->
							<div class="product-view-mode">
								<a href="#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>
								<a href="#" class="sorting-btn" data-target="grid-four">
									<span class="grid-four-icon">
										<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
									</span>
								</a>
								<a href="#" class="sorting-btn" data-target="list "><i class="fas fa-list"></i></a>
							</div>
						</div>
						<div class="col-xl-5 col-md-4 col-sm-6  mt--10 mt-sm--0">
							<span class="toolbar-status">
								
							</span>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-6  mt--10 mt-md--0">
							<div class="sorting-selection">
								
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
							<div class="sorting-selection">
								<span>Sắp xếp theo:</span>
								<select class="form-control nice-select sort-select mr-0">
									<option value="" selected="selected">Mặc Định</option>
									<option value="">
										Theo tên: (A - Z)</option>
									<option value="">
										Theo tên: (Z - A)</option>
									<option value="">
										Theo giá: (Thấp &gt; Cao)</option>
									<option value="">
										Theo giá: (Thấp &gt; Cao)</option>
									
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="shop-product-wrap grid with-pagination row space-db--30 shop-border">


					<?php while($row = $sanpham->fetch_assoc()){ ?>

						<div class="col-lg-4 col-sm-6">
							<div class="product-card">
								<div class="product-grid-content">
									<div class="product-header">
										<a href="" class="author">
											<?php echo $row['tag']; ?>
										</a>
										<h3><a href="san-pham.php?id=<?php echo $row['masanpham']; ?>"><?php echo substr($row['tensanpham'],0,28);?>...</a></h3>
									</div>
									<div class="product-card--body">
										<div class="card-image">
											<img src="http://localhost/webbansach/<?php echo $row['anhchinh']; ?>" alt="" style="height: 350px; width: 350px;">
											<div class="hover-contents">
												<a href="san-pham.php?id=<?php echo $row['masanpham']; ?>" class="hover-image">
													<img src="http://localhost/webbansach/<?php echo $row['anhphu1']; ?>" alt="" style="height: 350px;     width: 350px;">
												</a>
											</div>
										</div>
										<div class="price-block">
                                            <span class="price"><?php echo number_format($row['giaban']); ?>đ</span>
                                            <del class="price-old"><?php echo number_format($row['giagoc']); ?>đ</del>
                                            <span class="price-discount">-<?php echo number_format($row['giagoc'] - $row['giaban']); ?></span>
                                        </div>
									</div>
								</div> <hr>



								<div class="product-list-content">
									<div class="card-image">
										<img src="http://localhost/webbansach/<?php echo $row['anhchinh']; ?>" alt="">
									</div>
									<div class="product-card--body">
										<div class="product-header">
											<a href="" class="author">
												<?php echo $row['tag']; ?>
											</a>
											<h3><a href="san-pham.php?id=<?php echo $row['masanpham']; ?>" tabindex="0"><?php echo $row['tensanpham'];?></a></h3>
										</div>
										<article>
											<h2 class="sr-only">Mô tả</h2>
											<p><?php echo substr($row['tensanpham'],0,200);?>...</p>
										</article>
										<div class="price-block">
                                            <span class="price"><?php echo number_format($row['giaban']); ?>đ</span>
                                            <del class="price-old"><?php echo number_format($row['giagoc']); ?>đ</del>
                                            <span class="price-discount">-<?php echo number_format($row['giagoc'] - $row['giaban']); ?></span>
                                        </div>
										
										<div class="btn-block">
											<a href="" class="btn btn-outlined">Thêm Giỏ Hàng</a>
										</div>
									</div>
								</div>


							</div>
						</div>

					<?php } ?>
					
					
					
				</div>
				
			</div>
			<nav aria-label="Page navigation example">
				<br>
				<br>
				<ul class="pagination" style="justify-content: center;">
					<?php if(isset($_GET['trang'])){ ?>
						<li class="page-item"><a class="page-link" href="./tat-ca-san-pham.php?trang=<?php echo $_GET['trang'] - 1; ?>">Trước</a></li>
					<?php }else{ ?>
						<li class="page-item"><a class="page-link" href="#">Trước</a></li>
					<?php } ?>
					<?php for($i = 1; $i <= $sotrang; $i++){ ?>
						<?php if($i == 1){ ?>
							<li class="page-item"><a class="page-link" href="./tat-ca-san-pham.php"><?php echo $i; ?></a></li>
						<?php }else{ ?>
							<li class="page-item"><a class="page-link" href="./tat-ca-san-pham.php?trang=<?php echo $i; ?>"><?php echo $i; ?></a></li>
						<?php } ?>
					<?php } ?>
					<?php if(isset($_GET['trang']) && $sotrang >= 2 && $sotrang != $_GET['trang']){ ?>
						<li class="page-item"><a class="page-link" href="./tat-ca-san-pham.php?trang=<?php echo $_GET['trang'] + 1; ?>">Sau</a></li>
					<?php }else{ ?>
						<li class="page-item"><a class="page-link" href="#">Sau</a></li>
					<?php } ?>
				</ul>
			</nav>
		</main>
	</div>

<?php require(__DIR__.'/layouts/footer.php'); ?>    