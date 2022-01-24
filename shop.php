<?php include "./header.php"; ?>
<?php
//lấy thông tin từ file db đến
include "db.php";
// khởi tạo lớp db từ file db.php 
$db = new db();
$connect = $db->connect();
$sql = "SELECT * FROM products";
$query = $connect->prepare($sql);
$query->execute();
$products = array();
// lấy dữ liệu push vào products
while ($result = $query->fetch(mode: PDO::FETCH_OBJ)) {
    array_push($products, $result);
}
// echo "<pre>";
// print_r($products);
// echo "</pre>";

?>

<!--================Category Product Area =================-->
<section class="cat_product_area section_gap">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="product_top_bar">
                    <div class="left_dorp">
                        <select class="sorting">
                            <option value="1">Default sorting</option>
                            <option value="2">Default sorting 01</option>
                            <option value="4">Default sorting 02</option>
                        </select>
                        <select class="show">
                            <option value="1">Show 12</option>
                            <option value="2">Show 14</option>
                            <option value="4">Show 16</option>
                        </select>
                    </div>
                </div>

                <div class="latest_product_inner">
                    <div class="row">
                        <?php foreach ($products as $key => $product) : ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <div class="product-img">
                                        <img class="card-img" src="<?= $product->image; ?>" alt="" width="100px" height="170px"/>

                                        <div class="p_icon">
                                            <a href="product-detail.php?id=<?= $product->id ?>">
                                                <i class="ti-eye"></i>
                                            </a>
                                            <!-- <a href="#">
                                                <i class="ti-heart"></i>
                                            </a> -->
                                            <a class="main_btn" href="addtocart.php?id=<?=$product->id ?>">
                                                <i class="ti-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-btm">
                                        <a href="product-detail.php?id=<?= $product->id ?>" class="d-block">
                                            <h4><?=  $product->name;  ?></h4>
                                        </a>
                                        <div class="mt-3">
                                            <span class="mr-4"><?= number_format($product->price). "đ"; ?></span>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Browse Categories</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <li>
                                    <a href="#">Frozen Fish</a>
                                </li>
                                <li>
                                    <a href="#">Dried Fish</a>
                                </li>
                                <li>
                                    <a href="#">Fresh Fish</a>
                                </li>
                                <li>
                                    <a href="#">Meat Alternatives</a>
                                </li>
                                <li>
                                    <a href="#">Fresh Fish</a>
                                </li>
                                <li>
                                    <a href="#">Meat Alternatives</a>
                                </li>
                                <li>
                                    <a href="#">Meat</a>
                                </li>
                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Product Brand</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <li>
                                    <a href="#">Apple</a>
                                </li>
                                <li>
                                    <a href="#">Asus</a>
                                </li>
                                <li class="active">
                                    <a href="#">Gionee</a>
                                </li>
                                <li>
                                    <a href="#">Micromax</a>
                                </li>
                                <li>
                                    <a href="#">Samsung</a>
                                </li>
                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Color Filter</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <li>
                                    <a href="#">Black</a>
                                </li>
                                <li>
                                    <a href="#">Black Leather</a>
                                </li>
                                <li class="active">
                                    <a href="#">Black with red</a>
                                </li>
                                <li>
                                    <a href="#">Gold</a>
                                </li>
                                <li>
                                    <a href="#">Spacegrey</a>
                                </li>
                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Price Filter</h3>
                        </div>
                        <div class="widgets_inner">
                            <div class="range_item">
                                <div id="slider-range"></div>
                                <div class="">
                                    <label for="amount">Price : </label>
                                    <input type="text" id="amount" readonly />
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Category Product Area =================-->

<?php include "./footer.php" ?>