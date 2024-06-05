<footer class="site-footer">
        <div class="container">
            <div class="row justify-content-between  section-padding">
                <div class=" col-xl-3 col-lg-4 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="brand-footer footer-title">
                            <img src="image/logo--footer.png" alt="">
                        </div>
                        <div class="footer-contact">
                            <p><span class="label">Địa Chỉ:</span><span class="text">Đại học công nghiệp Hà Nội</span></p>
                            <p><span class="label">Số Điện Thoại:</span><span class="text">0812.399.932</span></p>
                            <p><span class="label">Email:</span><span class="text">bansach.com</span></p>
                        </div>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-2 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="footer-title">
                            <h3>Thông Tin</h3>
                        </div>
                        <ul class="footer-list normal-list">
                            <li><a href="">Giảm Giá</a></li>
                            <li><a href="">Sản Phẩm Mới</a></li>
                            <li><a href="">Siêu Giảm Giá</a></li>
                            <li><a href="">Liên Hệ</a></li>
                            <li><a href="">Sơ Đồ Trang</a></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-2 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="footer-title">
                            <h3>Giải Đáp</h3>
                        </div>
                        <ul class="footer-list normal-list">
                            <li><a href="">Giao Hàng</a></li>
                            <li><a href="">Về Chúng Tôi</a></li>
                            <li><a href="">Cửa Hàng</a></li>
                            <li><a href="">Liên Hệ</a></li>
                            <li><a href="">Sơ Đồ Trang</a></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-title">
                        <h3>THÔNG BÁO</h3>
                    </div>
                    <div class="newsletter-form mb--30">
                        <form action="./php/mail.php">
                            <input type="email" class="form-control" placeholder="Nhập email của bạn...">
                            <button class="btn btn--primary w-100">Đăng Ký</button>
                        </form>
                    </div>
                    <div class="social-block">
                        <h3 class="title">KẾT NỐI</h3>
                        <ul class="social-list list-inline">
                            <li class="single-social facebook"><a href=""><i class="ion ion-social-facebook"></i></a>
                            </li>
                            <li class="single-social twitter"><a href=""><i class="ion ion-social-twitter"></i></a></li>
                            <li class="single-social google"><a href=""><i
                                        class="ion ion-social-googleplus-outline"></i></a></li>
                            <li class="single-social youtube"><a href=""><i class="ion ion-social-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var giohang = localStorage.getItem('giohang')

            if(giohang == null){
                $('.sanpham_giohang').append('<div class=" single-cart-block " style="text-align: center;"> Không có sản phẩm </div>')
            }else{
                var giohang = JSON.parse(localStorage.getItem('giohang'))
                var tien = 0
                for (var i = 0; i < giohang.length; i++) {
                    var gia = parseInt(giohang[i].giaban) * parseInt(giohang[i].soluong) * 1000
                    $('.sanpham_giohang').append('<div class=" single-cart-block "> <div class="cart-product"> <a href="san-pham.php?id='+giohang[i].masanpham+'" class="image"> <img style="width: 100px; height: 100px;" src="http://localhost/webbansach/'+giohang[i].anhchinh+'" alt=""> </a> <div class="content"> <h3 class="title"><a href="san-pham.php?id='+giohang[i].masanpham+'">'+giohang[i].tensanpham+'</a> </h3> <p class="price"><span class="qty">'+giohang[i].soluong+' ×</span> '+giohang[i].giaban+'đ</p> </div> </div> </div>')
                    tien += gia
                }

                $('.slgiohang').html(giohang.length)

                $('.tiengiohang').html(tien.toLocaleString('vi', {style : 'currency', currency : 'VND'}))

                $('.dh').append('<div class="btn-block"> <a href="gio-hang.php" class="btn">Xem Giỏ Hàng <i class="fas fa-chevron-right"></i></a> <a href="thanh-toan.php" class="btn btn--primary">Thanh Toán <i class="fas fa-chevron-right"></i></a> </div>')
                
            }
        });
    </script>

    <!-- Use Minified Plugins Version For Fast Page Load -->
    <script src="js/plugins.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>