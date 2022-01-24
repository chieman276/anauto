<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>

<?php
//lấy thông tin từ file db đến
include "db.php";
// khởi tạo lớp db từ file db.php 
$db = new db();
$connect = $db->connect();
$sql = "SELECT products.*,categories.name 
as category_name 
FROM products 
JOIN categories 
ON products.category_id = categories.id;
";
$query = $connect->prepare($sql);
$query->execute();
$products = array();

while ($result = $query->fetch(mode: PDO::FETCH_OBJ)){
    array_push($products, $result);
}

// echo "<pre>";
// print_r($products);
// echo "</pre>";
?>


<!-- Start container-fluid -->
<div class="container-fluid">
    <!-- start  -->
    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title">Danh Sách Sản Phẩm</h4>
            </div>
        </div>
    </div>
    <!-- end -->
    <div class="container-fluid">
        <!-- start  -->
        <div class="row">
            <div class="col-12">
                <a class="btn btn-info" href="product-add.php">Thêm sản phẩm</a><br><br>
                <div class="table-responsive">
                    <table class="table table-bordered m-0">

                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $key => $product) : ?>
                            <tr>
                                <th> <?=$product->id; ?></th>
                                <td><?= $product->name; ?></td>
                                <td><img width="100px" src="<?= $product->image; ?>"></td>
                                <td><?= $product->price; ?></td>
                                <td><?= $product->quantity; ?></td>
                                <td><?= $product->category_name; ?></td>
                                <td>
                                <a class="btn btn-info" href="product-edit.php?id=<?= $product->id ?>">Chỉnh sửa</a>
                                <a class="btn btn-info" href="product-delete.php?id=<?= $product->id ?>" onclick=" return confirm('Bạn có chắc muốn xóa không')">Xóa</a>

                                </td>

                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end -->
    </div>
    <!-- end container-fluid -->
    <?php include "footer.php"; ?>