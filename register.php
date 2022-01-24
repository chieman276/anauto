<?php
include "db.php";
$db = new db();
$connect = $db->connect();
//kiểm tra xem đã submit form hay chưa
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";

    /*
Array
(
    [name] => ann
    [birthday] => 2002-02-22
    [phone] => 0828732
    [email] => anc@gmail.com
    [password] => 123456
)
    */
    $name = $_REQUEST['name'];
    $birthday = $_REQUEST['birthday'];
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $errors = [];

    if ($name == "") {
        $errors['name'] = 'vui lòng nhập Tên của bạn!';
    }
    if ($birthday == "") {
        $errors['birthday'] = 'Vui lòng nhập Ngày sinh của bạn!';
    }
    if ($phone == "") {
        $errors['phone'] = 'Vui lòng nhập Số điện thoại!';
    }
    if ($email == "") {
        $errors['email'] = 'Vui lòng nhập Email!';
    }
    if ($password == "") {
        $errors['password'] = 'Vui lòng nhập Mật khẩu!';
    }

    //kiểm tra nếu không có lỗi
    //mảng errors có độ dài bằng 0
    if (count($errors) == 0) {
        $sql = "INSERT INTO `users` 
        (`name`, `birthday`, `phone`, `email`,`password`) 
        VALUES 
        ('$name', '$birthday', '$phone', '$email', '$password')";

        //thực thi câu lệnh sql
        $connect->exec($sql);
        //chuyển hướng sang file login.php
        header("location: index.php");
    } else {
        // echo "<pre>";
        // print_r($errors);
        // echo "</pre>";
        foreach ($errors as $key => $error) {
            echo $error;
        }
    }
}
?>

<?php include "./header.php"; ?>
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2 style="color:brown">ĐĂNG KÍ</h2>
                    <section class="tracking_box_area section_gap">
    <div class="container">
        <div class="tracking_box_inner">
            <p>Vui lòng điền thông tin để đăng kí tài khoản</p>
            <form class="row tracking_form" action="#" method="post" novalidate="novalidate">
                <div class="col-md-12 form-group">
                    <input type="name" class="form-control" id="name" name="name" placeholder="Tên">
                    <small class="form-text text-danger">
                        <?php echo (isset($errors['name'])) ? $errors['name'] : ""; ?>

                </div>
                <div class="col-md-12 form-group">
                    <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Ngày sinh">
                    <?php echo (isset($errors['birthday'])) ? $errors['birthday'] : ""; ?>
                </div>
                <div class="col-md-12 form-group">

                    <input type="name" class="form-control" id="name" name="phone" placeholder="Số điện thoại">
                    <?php echo (isset($errors['phone'])) ? $errors['phone'] : ""; ?>
                </div>
                <div class="col-md-12 form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">

                    <?php echo (isset($errors['email'])) ? $errors['email'] : ""; ?>

                </div>
                <div class="col-md-12 form-group">
                    <input type="password" class="form-control" id="password" placeholder="Mật khẩu" name="password">
                    <?php echo (isset($errors['password'])) ? $errors['password'] : ""; ?>
                    </small>
                </div>

                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="btn submit_btn">Đăng Kí</button>
                </div>
            </form>
                </div>
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="tracking.html">Order Tracking</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Tracking Box Area =================-->

        </div>
    </div>
</section>
<!--================End Tracking Box Area =================-->


<?php include "./footer.php" ?>