<?php
session_start();

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
    [email] => an@gmail.com
    [password] => 123456
)
    */
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $errors = [];

    if ($email == "") {
        $errors['email'] = 'Vui lòng nhập Email!';
    }
    if ($password == "") {
        $errors['password'] = 'Vui lòng nhập Password!';
    }

    if (count($errors) == 0) {
        $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";

        //truyen cau truy van vao
        $stmt = $connect->query($sql);
        //Thiết lập kiểu dữ liệu trả về
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        //fetchALL se tra ve du lieu nhieu hon 1 ket qua
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['user'] = $user;

            header("location: index1.php");
        }
    } else {
        foreach ($errors as $key => $error) {
            echo  $error;
        }
    }
}
// echo "<pre>";
// print_r($errors);
// echo "</pre>";


?>
<?php include "./header.php"; ?>


<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2 style="color:brown"> THÔNG TIN ĐĂNG NHẬP</h2>
                    <section class="tracking_box_area section_gap">
                        <div class="container">
                            <div class="tracking_box_inner">
                                <p>Vui lòng điền thông tin đăng nhập</p>
                                <form class="row tracking_form" action="" method="post" novalidate="novalidate">
                                    <small class="form-text text-danger">
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
                                <button type="submit" value="submit" class="btn submit_btn">Đăng nhập </button><br> <br>
                                <h6>nhấn vào <a href="register.php"> đây để đăng kí</a></h6>


                            </div>
                            </form>
                        </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Tracking Box Area =================-->

</div>
</section>
<!--================End Tracking Box Area =================-->


<?php include "./footer.php" ?>