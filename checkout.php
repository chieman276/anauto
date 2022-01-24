<?php
include "db.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $db = new db();
  $connect = $db->connect();
  // echo "<pre>";
  // print_r($_REQUEST);
  // echo "</pre>";
  //   Array
  // (
  //     [name] => Mai Chiếm An
  //     [email] => an@gmail.com
  //     [password] => 123456
  // )
  $name = $_REQUEST['name'];
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];

  $errors = [];

  if ($name == "") {
    $errors['name'] = 'Vui lòng nhập Name!';
  }

  if ($email == "") {
    $errors['email'] = 'Vui lòng nhập Email!';
  }
  if ($password == "") {
    $errors['password'] = 'Vui lòng nhập Password!';
  }

  if (count($errors) == 0) {
    $sql = "INSERT INTO `customers` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
    //thực thi câu lệnh sql
    $connect->exec($sql);
    //chuyển hướng sang file index.php
    header("location: alert.php");
  }
}

?>



<?php include "./header.php" ?>


<!--================Home Banner Area =================-->
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container">
      <div class="banner_content d-md-flex justify-content-between align-items-center">
        <div class="mb-3 mb-md-0">
          <br> <br>
          <h2 class="text-center">Kiểm tra sản phẩm</h2>
          <section class="checkout_area section_gap">
            <div class="container">
              <div class="returning_customer">
                <div class="check_title">
                  <!-- <h5>
              Returning Customer?
              <a href="login.php">Click here to login</a>
            </h5> -->
                </div>
                <p>
                  Vui lòng nhập thông tin

                </p>
                <form class="row tracking_form" action="" method="post" novalidate="novalidate">
                  <small class="form-text text-danger">
                    <div class="col-md-12 form-group">

                      <input type="text" class="form-control" id="name" name="name" placeholder="Họ tên">
                      <?php echo (isset($errors['name'])) ? $errors['name'] : ""; ?>
                    </div>
                    <div class="col-md-12 form-group">

                      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                      <?php echo (isset($errors['email'])) ? $errors['email'] : ""; ?>
                    </div>
                    <div class="col-md-12 form-group">
                      <input type="password" class="form-control" id="password" placeholder="Mật khẩu" name="password">
                      <?php echo (isset($errors['password'])) ? $errors['password'] : ""; ?>
                  </small>
                  <br>
                  <div class="col-md-12 form-group">
                    <!-- <button type="submit" value="submit" class="btn submit_btn">
                      Gửi đi
                    </button> -->
                    <button type="submit" value="submit" class="btn submit_btn" onclick="return confirm('Bạn có chắc muốn mua sản phẩm')">Gửi đi </button>
                    <div class="creat_account">
                      <input type="checkbox" id="f-option" name="selector" />
                      <label for="f-option">Remember me</label>
                    </div>
                    <!-- <a class="lost_pass" href="#">Lost your password?</a> -->
                  </div>
                </form>
              </div>
              <div class="page_link">
                <a href="shop.php">Home</a>
                <a href="checkout.php">Product Checkout</a>
              </div>
            </div>
        </div>
      </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Checkout Area =================-->

</div>
<div class="cupon_area">
  <div class="check_title">
    <h2>
      <!-- Have a coupon?
              <a href="#">Click here to enter your code</a> -->
    </h2>
  </div>
  <!-- <input type="text" placeholder="Enter coupon code" /> -->
  <!-- <a class="tp_btn" href="#">Apply Coupon</a> -->
</div>



<?php include "./footer.php" ?>