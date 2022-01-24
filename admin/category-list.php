<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>

<?php
 include "db.php";
 $db = new db();
 $connect = $db->connect();
 $sql = "SELECT * FROM `categories`";
 $query = $connect->prepare($sql);
$query->execute();
$categories = array();


while ($result = $query->fetch(mode: PDO::FETCH_OBJ)){
    array_push($categories, $result);
}


?>

<div class="container-fluid">
    <!-- start  -->
    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title">Danh mục sản phẩm</h4>
            </div>
        </div>
    </div>
    <!-- end -->
    <div class="container-fluid">
        <!-- start  -->
        <div class="row">
            <div class="col-12">
                <a class="btn btn-info" href="category-add.php">Thêm danh mục sản phẩm</a>
                <div class="table-responsive">

                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($categories as $key => $category): ?>
                            <tr>
                                <td> <?= $category->id ; ?> </td>
                                <td> <?= $category->name; ?> </td>
                                <td> <a href="category-edit.php?id=<?= $category->id ?>" class="btn btn-success">Chỉnh sửa</a></td>
                                <td> <a href="category-delete.php?id=<?= $category->id ?>" 
                                class="btn btn-success"
                                onclick="return confirm('Bạn có chắc muốn xóa không!')"
                                >
                                Xóa</a></td>                                
                            </tr>
                            <?php endforeach; ?>

                        </body>


                    </table>
                </div>
            </div>
        </div>
    </div>


    <?php include "footer.php"; ?>