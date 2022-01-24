<?php
include "db.php";

$db = new db();
$connect = $db->connect();

// khai báo biến id để nhận biến id ở $_REQUEST["id"]
$id = (isset($_REQUEST["id"]) && !empty($_REQUEST["id"])) ? $_REQUEST["id"] : "";

//kiểm tra kết quả id có nhận hay ko
if ($id != "") {
    $sql = "SELECT * FROM `categories` WHERE `id` = $id";

    //truyen cau truy van vao
    $stmt = $connect->query($sql);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    //fetchALL se tra ve du lieu nhieu hon 1 ket qua
    $category = $stmt->fetch();

    // echo "<pre>";
    // print_r($category);
    // echo "</pre>";

    /*
    stdClass Object
(
    [id] => 1
    [name] => Car
)
    */

    //kiểm tra xem đáubmì form hay chưa
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //lấy dữ liệu đưa vào bộ nhớ
        $name = $_REQUEST['name'];

        $errors = [];

        if ($name == "") {
            $errors['name'] = 'Vui lòng nhập tên Admin';
        }
        if (count($errors) == 0) {
            $sql = "UPDATE `categories` SET 
            `name` = '$name' 
            WHERE `categories`.`id` = $id";

            //thực thi câu lệnh sql
            $connect->exec($sql);
            //chuyển hướng sang file index.php
            header("location: category-list.php");
        } 
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
                <h4 class="header-title">Sửa danh mục mặt hàng</h4>
            </div>
        </div>
    </div>
    <!-- end -->
    <div class="row">
        <div class="col-12">
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $category->name; ?>">
                    <small class="form-text text-danger">
                        <?php echo (isset($errors['name'])) ? $errors['name'] : ""; ?>
                    </small>
                </div>
                <button type="submit" class="btn btn-info">Cập nhật</button>
                <a href="category-list.php" class="btn btn-info">Thoát</a>
            </form>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>