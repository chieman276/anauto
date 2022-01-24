<?php include "db.php"; ?>
<?php
//kiem tra xem da submit form hay chua
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";
    /*
    Array
(
    [name] => VinFat
)
    */
    //lấy dữ liệu 
    $name = $_REQUEST['name'];
    $db = new db();
    $connect = $db->connect();


    $errors = [];
    if ($name == "") {
        $errors['name'] = 'Vui lòng nhập tên Admin!';
    }

    if (count($errors) == 0) {

        $sql = "INSERT INTO `categories` (`name`) 
        VALUES 
        ('$name')";

        //thực thi câu lệnh sql
        $connect->exec($sql);
        //chuyển hướng sang file index.php
        header("location: category-list.php");
    } else {
        // foreach ($errors as $key => $error) {
        //     echo $error;
        // }
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
                <h4 class="header-title">Thêm danh mục</h4>
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
                        <?php echo (isset($errors['name'])) ? $errors['name'] : ""; ?>
                    </small>
                </div>
                <button type="submit" class="btn btn-info">Nhập mặt hàng</button>
                <a href="category-list.php" class="btn btn-info">Thoát</a>
            </form>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>