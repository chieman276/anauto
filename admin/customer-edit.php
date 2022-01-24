<?php include "db.php";?>
<?php

$db = new db();
$connect = $db->connect();
//lấy id từ url xuống
// khai báo biến id để nhận biến id ở $_REQUEST["id"]
$id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? $_REQUEST['id']: "";
//kiểm tra kết quả id có nhận hay ko
    if ($id != "") {
    $sql = "SELECT * FROM `customers` WHERE `id` = $id";

    //truyen cau truy van vao
    $stmt = $connect->query($sql);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    //fetchALL se tra ve du lieu nhieu hon 1 ket qua
    $customer = $stmt->fetch();
    }
//kiểm tra xem đã submif form chưa
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";
    /*
    Array
(
    [id] => 1
    [name] => VinFat1111111111
    [birthday] => 23-2-2121
    [phone] => 0777333274
    [password] => 123
    [email] => votuan@gmail.com
)
    */
    $name = $_REQUEST['name'];
    $password = $_REQUEST['password'];
    $email = $_REQUEST['email'];

    $errors = [];
    if ($name == "") {
        $errors['name'] = 'Vui lòng nhập Tên người dùng';
    }
    if ($password == "") {
        $errors['password'] = 'Vui lòng nhập Mật khẩu';
    }
    if ($email == "") {
        $errors['email'] = 'Vui lòng nhập Email';
    }

    if (count($errors) == 0){
        $sql = "UPDATE `customers` SET 
        `name` = '$name', 

        `password` = '$password', 
        `email` = '$email' 
        WHERE `customers`.`id` = $id;
        ";
    
        //thực thi câu lệnh sql
        $connect->exec($sql);
        //chuyển hướng sang file customer-list.php
        header("location: customer-list.php");

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
                <h4 class="header-title">Chỉnh sửa thông tin khách hàng</h4>
            </div>
        </div>
    </div>
    <!-- end -->
    <div class="row">
        <div class="col-12">
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?= $customer->name ?>">
                <small class="form-text text-danger">
                    <?= (isset($errors['name']) ? $errors['name'] : "") ?>
                </small>
            </div>

            <div class="mb-3">
                <label class="form-label">password</label>
                <input type="text" class="form-control" name="password" value="<?= $customer->password ?>">
                <small class="form-text text-danger">
                    <?= (isset($errors['password']) ? $errors['password'] : "") ?>
                </small>
            </div>
            <div class="mb-3">
                <label class="form-label">email</label>
                <input type="text" class="form-control" name="email" value="<?= $customer->email ?>">
                <small class="form-text text-danger">
                    <?= (isset($errors['email']) ? $errors['email'] : "") ?>
                </small>
            </div>

            <button type="submit" class="btn btn-info">Nhập mặt hàng</button>
            <a href="customer-list.php" class="btn btn-info">Thoát</a>
        </form>

        </div>
    </div>
</div>


<?php include "footer.php"; ?>