<?php include "db.php"; ?>
<?php
//kiểm tra xem đã submit form hay chưa
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";
    /*
    Array
(
    [name] => VinFat
    [birthday] => 27-6-2121
    [phone] => 0828732
    [password] => 123
    [email] => army2@gmail.com
)
    */
    $db = new db();
    $connect = $db->connect();

    $name = $_REQUEST['name'];
    $birthday = $_REQUEST['birthday'];
    $phone = $_REQUEST['phone'];
    $password = $_REQUEST['password'];
    $email = $_REQUEST['email'];

    $errors = [];
    if ($name == "") {
        $errors['name'] = "Vui lòng nhập Tên người dùng";
    }
    if ($birthday == "") {
        $errors['birthday'] = "Vui lòng nhập Ngày sinh";
    }
    if ($phone == "") {
        $errors['phone'] = "Vui lòng nhập Số điện thoại";
    }
    if ($password == "") {
        $errors['password'] = "Vui lòng nhập Mật khẩu";
    }
    if ($email == "") {
        $errors['email'] = "Vui lòng nhập Email";
    }

    if (count($errors) == 0) {
        $sql = "INSERT INTO `users` (`name`, `birthday`, `phone`, `password`, `email`) 
        VALUES ('$name', '$birthday', '$phone', '$password', '$email')";
        //thực thi câu lệnh sql
        $connect->exec($sql);
        //chuyển hướng sang file index.php
        header("location: user-list.php");
    }
}

?>
<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<!-- Start container-fluid -->
<div class="container-fluid">
    <!-- start  -->
    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title">Thêm người dùng</h4>
            </div>
        </div>
    </div>
    <!-- end -->
    <div class="row">
        <div class="col-12">
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name">
                    <small class="form-text text-danger">
                        <?= (isset($errors['name']) ? $errors['name'] : "") ?>
                    </small>
                </div>
                <div class="mb-3">
                    <label class="form-label">birthday</label>
                    <input type="date" class="form-control" name="birthday">
                    <small class="form-text text-danger">
                        <?= (isset($errors['birthday']) ? $errors['birthday'] : "") ?>
                    </small>
                </div>
                <div class="mb-3">
                    <label class="form-label">phone</label>
                    <input type="text" class="form-control" name="phone">
                    <small class="form-text text-danger">
                        <?= (isset($errors['phone']) ? $errors['phone'] : "") ?>
                    </small>
                </div>
                <div class="mb-3">
                    <label class="form-label">password</label>
                    <input type="text" class="form-control" name="password">
                    <small class="form-text text-danger">
                        <?= (isset($errors['password']) ? $errors['password'] : "") ?>
                    </small>
                </div>
                <div class="mb-3">
                    <label class="form-label">email</label>
                    <input type="text" class="form-control" name="email">
                    <small class="form-text text-danger">
                        <?= (isset($errors['email']) ? $errors['email'] : "") ?>
                    </small>
                </div>

                <button type="submit" class="btn btn-info">Nhập mặt hàng</button>
                <a href="user-list.php" class="btn btn-info">Thoát</a>
            </form>

        </div>
    </div>
</div>


<?php include "footer.php"; ?>