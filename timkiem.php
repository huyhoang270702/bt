     
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/style.css">
	<link rel="stylesheet" href="assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/huong-style.css">
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


                           <h3 class="section-title"> Kết quả tìm kiếm </h3>
                           <p style="color: black; magin-left: 10px;">Có <?php echo $totalnumber; ?> sản phẩm được tìm thấy </p>
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

