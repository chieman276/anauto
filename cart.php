<?php
include "db.php";
session_start();
$code = $_SESSION['code'];
echo $code;



//   echo "<pre>";
// print_r($_REQUEST);
// echo "</pre>";

// khởi tạo lớp db từ file db.php 
$db = new db();
$connect = $db->connect();
$sql = "SELECT cart.*,image , name ,(cart.price*cart.quantity) as total 
FROM `cart` 
JOIN products ON cart.product_id = products.id WHERE code = $code ";


$query = $connect->prepare($sql);
$query->execute();
$carts = array();

while ($result = $query->fetch(mode: PDO::FETCH_OBJ)){
    array_push($carts, $result);
}

 ?>


<?php include "./header.php"; ?>
    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div
            class="banner_content d-md-flex justify-content-between align-items-center"
          >
            <div class="container">
              <h2  style= "color: blue; text-align: center;">Giỏ hàng</h2>
            </div>
            <div class="page_link">
              <a href="index.php">Home</a>
              <a href="cart.php">Cart</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Cart Area =================-->
    <section class="cart_area">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Hình ảnh sản phẩm</th>
                  <th scope="col">Tên sản phẩm</th>
                  <th scope="col">Giá sản phẩm(VNĐ)</th>
                  <!-- <th scope="col">Quantity</th>
                  <th scope="col">Total</th> -->
                </tr>
              </thead>
              <tbody>
              <?php
            foreach ($carts as $key => $cart):
            ?>
                <tr>

                    <td data-th="cart">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img  src="<?= $cart->image ?>" alt="Sản phẩm 1" class="img-responsive" width="100">
                            </div>
                            </td>
                            <td>
                            <div class="col-sm-10">
                                <h4 class="nomargin"><?= $cart->name ?></h4>
                                <!-- <p>Mô tả của sản phẩm 1</p> -->
                            </div>
                        </div>
                        </td>
                    <td data-th="Price"><?= number_format($cart->price ) ?></td>
                    <form action="update.php" method="POST">
                    <!-- <td data-th="Quantity"><input name="cart_id[]" type="hidden" class="hidden" value="<?= $cart->cart_id ?>">
                        <input name="quantity[]" class="form-control text-center" value="<?= $cart->quantity?>" type="number">
                    </td>
                    <td data-th="Subtotal" class="text-center"><?= number_format($cart->total ) ?></td> -->
                    <td class="actions" data-th="">
                        <!-- <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i> -->
                        </button>
                        <a href="cartdelete.php?id=<?= $cart->id ?>"><i class="fa fa-trash-o btn btn-danger" onclick="return confirm('Bạn có chắc muốn bỏ mặt hàng này')"></i></a>
                       
                    </td>

                </tr>
            <?php endforeach; ?>
               
                <tr class="bottom_button">
                  <td>
                    <a class="gray_btn" href="#">Cập nhật</a>
                  </td>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="cupon_text">
                      <!-- <input type="text" placeholder="Coupon Code" /> -->
                      <a class="main_btn" href="checkout.php">Đặt hàng</a>
                      <!-- <a class="gray_btn" href="#">Close Coupon</a> -->
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <!-- <h5>Subtotal</h5> -->
                  </td>
                  <td>
                    <!-- <h5>$2160.00</h5> -->
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!--================End Cart Area =================-->
<?php include "./footer.php" ?>
