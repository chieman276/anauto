<?php include "db.php"; ?>
<?php
$db = new db();
$connect = $db->connect();

// khai báo biến id để nhận biến id ở $_REQUEST["id"]
$id = (isset($_REQUEST["id"]) && !empty($_REQUEST["id"])) ? $_REQUEST["id"] : "";

if ($id != "") {
    $sql = "SELECT * FROM `products` WHERE `id` = $id";

    //truyen cau truy van vao
    $stmt = $connect->query($sql);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    //fetchALL se tra ve du lieu nhieu hon 1 ket qua
    $product = $stmt->fetch();
    // echo "<pre>";
    // print_r($product);
    // echo "</pre>";
    /*
    stdClass Object
(
    [id] => 30
    [name] => VinFat333333
    [image] => https://giaxeoto.vn/admin/upload/images/resize/640-ford-territory-2021-gia-bao-nhieu.jpg
    [price] => 646000000
    [description] => Ecosport là mẫu xe CUV 05 chỗ cỡ nhỏ của Ford Việt nam. Phiên bản Ecosport 2021 hiện tại ra mắt tại Việt nam từ tháng 10-2020 và không còn lốp treo sau. Xe sử dụng 2 khối động cơ 1.5L I3 với công suất 120 sức ngựa và 1.0L Ecoboots công suất 125 sức ngựa. Có 3 phiên bản tự động với hộp số tự động 6 cấp êm ái. 
    [quantity] => 12
    [category_id] => 1
)
    */
}
//kiểm tra xem đã người dùng gửi dữ liệu
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";
    /*
    Array
(
    [id] => 2
    [name] => VinFat
    [image] => anh
    [price] => 3
    [description] => Ecosport là mẫu xe CUV 05 chỗ cỡ nhỏ của Ford Việt nam. Phiên bản Ecosport 2021 hiện tại ra mắt tại Việt nam từ tháng 10-2020 và không còn lốp treo sau. Xe sử dụng 2 khối động cơ 1.5L I3 với công suất 120 sức ngựa và 1.0L Ecoboots công suất 125 sức ngựa. Có 3 phiên bản tự động với hộp số tự động 6 cấp êm ái. 
    [quantity] => 120
    [category_id] => 2
)
    */
    $name = $_REQUEST['name'];
    $image = $_REQUEST['image'];
    $price = $_REQUEST['price'];
    $description = $_REQUEST['description'];
    $quantity = $_REQUEST['quantity'];
    $category_id = $_REQUEST['category_id'];

    $errors = [];

    if ($name == ""){
        $errors['name'] = 'Vui lòng nhập tên sản phẩm';
    }
    if ($image == ""){
        $errors['image'] = 'Vui lòng nhập hình ảnh';
    }
    if ($price == ""){
        $errors['price'] = 'Vui lòng nhập giá sản phẩm';
    }
    if ($description == ""){
        $errors['description'] = 'Vui lòng nhập chi tiết sản phẩm';
    }
    if ($quantity == ""){
        $errors['quantity'] = 'Vui lòng nhập số lượng sản phẩm';
    }
    if (count($errors) == 0 ) {
        $sql = "UPDATE `products` SET 
        `name` = '$name',
        `image` = '$image',
        `price` = '$price', 
        `description` = '$description', 
        `quantity` = '$quantity', 
        `category_id` = '$category_id' 
        WHERE `products`.`id` = '$id';";
    
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
                <h4 class="header-title">Chỉnh Sửa Sản Phẩm</h4>

            </div>

        </div>
    </div>
    <!-- end -->
    <div class="row">
        <div class="col-12">
            <form action="" method="POST">
                <!-- <input name="id" type="hidden" value="<?= $product->id ?>"> -->
                <div class="form-group">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="<?= $product->name ?>">
                        <small class="form-text text-danger">
                        <?php echo (isset($errors['name'])) ? $errors['name'] : ""; ?>
                        </small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="text" class="form-control" name="image" value="<?= $product->image ?>">
                        <small class="form-text text-danger">
                        <?php echo (isset($errors['image'])) ? $errors['image'] : ""; ?>
                        </small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" value="<?= $product->price ?>">
                        <small class="form-text text-danger">
                        <?php echo (isset($errors['price'])) ? $errors['price'] : ""; ?>
                        </small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" value="<?= $product->description ?>">
                        <small class="form-text text-danger">
                        <?php echo (isset($errors['description'])) ? $errors['description'] : ""; ?>
                        </small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="text" class="form-control" name="quantity" value="<?= $product->quantity ?>">
                        <small class="form-text text-danger">
                        <?php echo (isset($errors['quantity'])) ? $errors['quantity'] : ""; ?>
                        </small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category_id</label>
                        <select class="form-select form-control" name="category_id">
                        
                            <option>1 <label>- Car</label></option>
                            <option>2<label>- Motorcycle</label></option>
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

<!-- end -->
</div>
<!-- end container-fluid -->
<?php include "footer.php"; ?>