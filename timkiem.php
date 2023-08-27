     
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/style.css">
	<link rel="stylesheet" href="assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/huong-style.css">
    <div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						<li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
						<li><a href="signup.php">Đăng kí</a></li>
						<li><a href="login.php">Đăng nhập</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.php" id="logo"><img src="assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="post" id="searchform" action="timkiem.php">
					        <input type="text" value="" name="search" id="search" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (Trống) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
				

								<div class="cart-item">
									<div class="media">
										<a class="pull-left" href="#"><img src="assets/dest/images/products/cart/1.png" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">Sample Woman Top</span>
											<span class="cart-item-options">Size: XS; Colar: Navy</span>
											<span class="cart-item-amount">1*<span>$49.50</span></span>
										</div>
									</div>
								</div>

								<div class="cart-item">
									<div class="media">
										<a class="pull-left" href="#"><img src="assets/dest/images/products/cart/2.png" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">Sample Woman Top</span>
											<span class="cart-item-options">Size: XS; Colar: Navy</span>
											<span class="cart-item-amount">1*<span>$49.50</span></span>
										</div>
									</div>
								</div>

								<div class="cart-item">
									<div class="media">
										<a class="pull-left" href="#"><img src="assets/dest/images/products/cart/3.png" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">Sample Woman Top</span>
											<span class="cart-item-options">Size: XS; Colar: Navy</span>
											<span class="cart-item-amount">1*<span>$49.50</span></span>
										</div>
									</div>
								</div>

								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">$34.55</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="checkout.php" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="index.php">Trang chủ</a></li>
						<li><a href="#">Sản phẩm</a>
							<ul class="sub-menu">
								<li><a href="product_type.php">Sản phẩm 1</a></li>
								<li><a href="product_type.php">Sản phẩm 2</a></li>
								<li><a href="product_type.php">Sản phẩm 4</a></li>
							</ul>
						</li>
						<li><a href="about.php">Giới thiệu</a></li>
						<li><a href="contacts.php">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div>
<?php
require_once ('./model/connect.php');
error_reporting(2);
// Search products
$message = "Không thể tìm kiếm được, vui lòng kiếm tra lại!";
if(isset($_POST['search']))
{
    $searchKeyword = $_POST['search'];
    $sql = "SELECT * FROM products WHERE (name LIKE '%$searchKeyword%')";
}
else {
    echo $message;
}

$resultSearch = mysqli_query($conn, $sql);
if($resultSearch)
{
    $totalnumber = mysqli_num_rows($resultSearch);
}
else {
    $totalnumber = 0;
}

?>


                           <h3 class="section-title text-center"> Kết quả tìm kiếm </h3>
                           <p style="color: black; magin-left: 10px; text-align:center">Có <?php echo $totalnumber; ?> sản phẩm được tìm thấy </p>
                        </div>
                        <div class="content-product-main">
                            <div class="row">
                                <?php
                                    $i = 0;
                                    while($kq = mysqli_fetch_assoc($resultSearch))
                                    {
                                        if($kq['image'] == null || $kq['image'] ==''){
                                            $thum_Image = "";
                                        }
                                        else{
                                            $thum_Image = "./image/product/".$kq['image'];
                                        }
                                        $i++;
                          ?>    
                                        <div class="col-md-3 col-sm-6 text-center">
                                            <div class="thumbnail">
                                                <div class="hoverimagel">
                                                    <img src="<?php echo $thum_Image; ?>" alt="không có" width="100%" height="60%">
                                    </div>
                                    <div class="name product">
                                        <?php echo $kq['name']; ?>
                                    </div>
                                    <div class="price mt-5">
                                        Giá: <?php echo $kq['promotion_price']; ?><span> vnđ</span>
                                    </div>
                                    <div class="product-info">
                                        <a nref="addcart.php?id=<?php echo $kq['id']; ?>">
                                            <button type="button" class="btn btn-primary">
                                             Mua hàng 
                                            <button>
                                        </a>
                                        <a href="product.php?id=<?php echo $kq['id']; ?>">
                                            <button type="button" class="btn btn-primary">
                                             Chi Tiết 
                                            <button>
                                         </a>
                                    </div>
                                 </div>
                             </div>
                        <?php
                                
                                    }
                        ?>
                                <div class="error-search" style="color: #FF0000: font-weight: bold: margin-left: 15px;">
                        <?php
                                if($i <= 0)
                                {
                                    echo "CÁI THỨ MI ĐANG TÌM KHÔNG TỒN TẠI";
                                }
                        ?>
                            </div>
                    </div>
                </div>

