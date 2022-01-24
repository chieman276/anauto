<?php include "header.php"; ?>
<?php
include ('db.php');

//
if ($_GET && $_GET['id']) {
    $db = new db();
    $id = $_GET['id'];
    $connect = $db->connect();
    $sql = "SELECT products.*,categories.name AS category_name FROM `products` 
    JOIN `categories` ON products.category_id = categories.id
    WHERE products.id = $id";

    $query = $connect->prepare($sql);
    $query->execute();
    $product = array();

    while ($result = $query->fetch(PDO::FETCH_OBJ)) {
        $product = $result;
    }
}
// echo "<pre>";
// print_r($product);
// echo "</pre>";

?>


<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_product_img">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="<?= $product->image; ?>" alt="First slide" />
                            </div>
 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3><?= $product->name; ?></h3>
                    <h2><?=  number_format($product->price); ?> đ</h2>
                    <ul class="list">
                        <li>
                            <a class="active" href="#">
                                <span>Category</span><?= $product->category_name; ?></a>
                        </li>
                        <li>
                            <a href="#"> <span>Availibility</span> : In Stock</a>
                        </li>
                    </ul>
                    <p>
                        <?= $product->description; ?>
                    </p>
                    <div class="product_count">
                        <label for="qty">Quantity:</label>
                        <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty" />
                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button">
                            <i class="lnr lnr-chevron-up"></i>
                        </button>
                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button">
                            <i class="lnr lnr-chevron-down"></i>
                        </button>
                    </div>
                    <div class="card_area">
                        <a class="main_btn" href="addtocart.php?id=<?=$product->id ?>">Thêm vào giỏ hàng</a>
                        <a class="icon_btn" href="#">
                            <i class="lnr lnr lnr-diamond"></i>
                        </a>
                        <a class="icon_btn" href="#">
                            <i class="lnr lnr lnr-heart"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<?php include "footer.php"; ?>