<?php 

session_start(); 

require('./database/connect.php'); 
require('./database/query.php');

$sql_chuyenmuc = "SELECT * FROM chuyenmuc";
$chuyenmuc = queryResult($conn,$sql_chuyenmuc);


?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pustok - Cửa Hàng Bán Sách Trực Tuyến!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
</head>

<body>
    <div class="site-wrapper" id="top">
        <div class="site-header d-none d-lg-block">
            <div class="header-middle pt--10 pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 ">
                            <a href="index.php" class="site-brand">
                                <img src="image/logo.png" alt="">
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <div class="header-phone ">
                                <div class="icon">
                                    <i class="fas fa-headphones-alt"></i>
                                </div>
                                <div class="text">
                                    <p>Hỗ trợ 24/7</p>
                                    <p class="font-weight-bold number">0812.399.932</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="main-navigation flex-lg-right">
                                <ul class="main-menu menu-right " style="display: -webkit-inline-box;">
                                    <li class="menu-item ">
                                        <a href="index.php">Trang Chủ</a>
                                    </li>
                                    <!-- Shop -->
                                    <li class="menu-item">
                                        <a href="tat-ca-san-pham.php">Sản Phẩm</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="lien-he.php">Liên Hệ</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="tai-khoan.php">Tài Khoản</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <nav class="category-nav">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger"><i
                                            class="fa fa-bars"></i>Chuyên Mục</a>
                                    <ul class="category-menu">
                                        <?php while($row = $chuyenmuc->fetch_assoc()){ ?>
                                            <li class="cat-item "><a href="chuyen-muc.php?id=<?php echo $row['machuyenmuc']; ?>"><?php echo $row['tenchuyenmuc']; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-lg-5">
                            <form method="GET" action="tim-kiem.php">
                                <div class="header-search-block">
                                    <input type="text" placeholder="Tìm kiếm sản phẩm..." name="tensach">
                                    <button type="submit">Tìm Kiếm</button>
                                </div>
                            </form>
                            
                        </div>
                        <div class="col-lg-4">
                            <div class="main-navigation flex-lg-right">
                                <div class="cart-widget">
                                    <?php if(isset($_SESSION['dangnhap'])){ ?>
                                        <div class="login-block">
                                            <a href="#" class="font-weight-bold"><?php echo $_SESSION['taikhoan']; ?></a><br>
                                            <a href="dang-xuat.php">Đăng Xuất</a>
                                        </div>
                                    <?php }else{ ?>
                                        <div class="login-block">
                                            <a href="dang-nhap.php" class="font-weight-bold">Đăng Nhập</a> <br>
                                            <span>hoặc</span><a href="dang-nhap.php">Đăng Ký</a>
                                        </div>
                                    <?php } ?>
                                    <div class="cart-block">
                                        <div class="cart-total">
                                            <span class="text-number slgiohang">
                                              0  
                                            </span>
                                            <span class="text-item">
                                                Giỏ Hàng
                                            </span>
                                            <span class="price tiengiohang">
                                                0
                                                <i class="fas fa-chevron-down"></i>
                                            </span>
                                        </div>
                                        <div class="cart-dropdown-block ">
                                            <div class="sanpham_giohang">
                                                
                                            </div>
                                            <div class=" single-cart-block dh">
                                                
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-mobile-menu">
            <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
                <div class="container">
                    <div class="row align-items-sm-end align-items-center">
                        <div class="col-md-4 col-7">
                            <a href="index.php" class="site-brand">
                                <img src="image/logo.png" alt="">
                            </a>
                        </div>
                        <div class="col-md-5 order-3 order-md-2">
                            <nav class="category-nav   ">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger"><i
                                            class="fa fa-bars"></i>Chuyên Mục</a>
                                    <ul class="category-menu">
                                        <?php while($row = $chuyenmuc->fetch_assoc()){ ?>
                                            <li class="cat-item "><a href="chuyen-muc.php?id=<?php echo $row['machuyenmuc']; ?>"><?php echo $row['tenchuyenmuc']; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-3 col-5  order-md-3 text-right">
                            <div class="mobile-header-btns header-top-widget">
                                <ul class="header-links">
                                    <li class="sin-link">
                                        <a href="cart.html" class="cart-link link-icon"><i class="ion-bag"></i></a>
                                    </li>
                                    <li class="sin-link">
                                        <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i
                                                class="ion-navicon"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--Off Canvas Navigation Start-->
            <aside class="off-canvas-wrapper">
                <div class="btn-close-off-canvas">
                    <i class="ion-android-close"></i>
                </div>
                <div class="off-canvas-inner">
                    <!-- search box start -->
                    <div class="search-box offcanvas">
                        <form>
                            <input type="text" placeholder="Search Here">
                            <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                        </form>
                    </div>
                    <!-- search box end -->
                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav class="off-canvas-nav">
                            <ul class="mobile-menu main-mobile-menu">
                                <li class="menu-item ">
                                        <a href="index.php">Trang Chủ</a>
                                    </li>
                                    <!-- Shop -->
                                    <li class="menu-item">
                                        <a href="tat-ca-san-pham.php">Sản Phẩm</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="lien-he.php">Liên Hệ</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="contact.html">Tài Khoản</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->
                    
                    <div class="off-canvas-bottom">
                        <div class="contact-list mb--10">
                            <a href="" class="sin-contact"><i class="fas fa-mobile-alt"></i>0812.399.932</a>
                            <a href="" class="sin-contact"><i class="fas fa-envelope"></i>bansach.com</a>
                        </div>
                        <div class="off-canvas-social">
                            <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="single-icon"><i class="fas fa-rss"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </aside>
            <!--Off Canvas Navigation End-->
        </div>

        <div class="sticky-init fixed-header common-sticky">
            <div class="container d-none d-lg-block">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <a href="index.php" class="site-brand">
                            <img src="image/logo.png" alt="">
                        </a>
                    </div>
                    <div class="col-lg-8">
                        <div class="main-navigation flex-lg-right">
                            <ul class="main-menu menu-right ">
                                <li class="menu-item ">
                                        <a href="index.php">Trang Chủ</a>
                                    </li>
                                    <!-- Shop -->
                                    <li class="menu-item">
                                        <a href="tat-ca-san-pham.php">Sản Phẩm</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="lien-he.php">Liên Hệ</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="contact.html">Tài Khoản</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>