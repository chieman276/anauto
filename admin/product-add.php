<?php include "db.php"; ?>
<?php
//kiểm tra xem người dùng gửi dữ liệu 
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";
    /*
    
Array
(
    [name] => VinFat
    [image] => anh
    [price] => 3
    [description] => blue
    [quantity] => 12
    [category_id] => 1
)
    
    */
    //lay giá trị gán vào bộ nhớ
    $name = $_REQUEST['name'];
    $image = $_REQUEST['image'];
    $price = $_REQUEST['price'];
    $description = $_REQUEST['description'];
    $quantity = $_REQUEST['quantity'];
    $category_id = $_REQUEST['category_id'];

    $db = new db();
    $connect = $db->connect();

    $errors = [];
    if ($name == "") {
        $errors['name'] = "Vui lòng nhập tên sản phẩm";
    }
    if ($image == "") {
        $errors['image'] = "Vui lòng nhập ảnh";
    }
    if ($price == "") {
        $errors['price'] = "Vui lòng nhập giá sản phẩm";
    }
    if ($description == "") {
        $errors['description'] = "Vui lòng nhập chi tiết sản phẩm";
    }
    if ($quantity == "") {
        $errors['quantity'] = "Vui lòng nhập số lượng sản phẩm";
    }

    if (count($errors) == 0) {

        // $sql = "INSERT INTO `products` (`name`, `image`, `price`, `description`, `quantity`, `category_id`) 
        // VALUES 
        // ('$name',
        // '$image',
        // '$price', 
        // '$description', 
        // '$quantity', 
        // '$category_id',
        // )";

        $sql ="INSERT INTO `products` (`name`, `image`, `price`, `description`, `quantity`, `category_id`) 
        VALUES 
        ('$name', '$image', '$price', '$description', '$quantity', '$category_id')";
        
        // echo $sql;
        // die();
        //thực thi câu lệnh sql
        $connect->exec($sql);
        //chuyển hướng sang file index.php
        header("location: product-list.php");
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
                <h4 class="header-title">Thêm mặt hàng</h4>
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
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="text" class="form-control" name="image">
                    <small class="form-text text-danger">
                        <?php echo (isset($errors['image'])) ? $errors['image'] : ""; ?>
                    </small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" name="price">
                    <small class="form-text text-danger">
                        <?php echo (isset($errors['price'])) ? $errors['price'] : ""; ?>
                    </small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" name="description">
                    <small class="form-text text-danger">
                        <?php echo (isset($errors['description'])) ? $errors['description'] : ""; ?>
                    </small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="text" class="form-control" name="quantity">
                    <small class="form-text text-danger">
                        <?php echo (isset($errors['quantity'])) ? $errors['quantity'] : ""; ?>
                    </small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category_id</label>
                    <select class="form-select form-control" name="category_id">
                        
                        <option value="1">1 <label>- Car</label></option>
                        <option value="2">2<label>- Motorcycle</label></option>
                        <small class="form-text text-danger">
                    <?php echo (isset($errors['category_id'])) ? $errors['category_id'] : ""; ?>
                    </small>

                    </select>
                </div>
                <button type="submit" class="btn btn-info">Nhập mặt hàng</button>
                <a href="product-list.php" class="btn btn-info">Thoát</a>
            </form>

        </div>
    </div>
</div>
<!-- end container-fluid -->
<?php include "footer.php"; ?>