<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<!-- Start container-fluid -->
<div class="container-fluid">
    <!-- start  -->
    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title">Quản lý sản phẩm</h4>
            </div>

        </div>

    </div>
    <!-- end -->
</div>
<?php
//lấy thông tin từ file db đến
include "db.php";
// khởi tạo lớp db từ file db.php 
$db = new db();
$connect = $db->connect();
$sql = "SELECT * FROM products";
$query = $connect->prepare($sql);
$query->execute();
$products = array();

while ($result = $query->fetch(mode: PDO::FETCH_OBJ)){
    array_push($products, $result);
}
?>

 <body>
     <div class="container">
         <h1 style="color:orange ;text-align:center">Quản lý sản phẩm</h1>
         <a href="product-add.php" class="btn btn-primary"> Thêm mới</a>
         <table class="table table-border" style="width: 60%">
             <thead>
                 <tr>
                     <td><b>ID</b></td>
                     <td><b>Name</b></td>
                     <td><b>Image</b></td>
                     <td><b>Price</b></td>
                     <td><b>Description</b></td>
                     <td><b>Quantity</b></td>
                     <td><b>Category_id</b></td>
                     <td colspan="3" style="text-align:center"><b>Chức năng</b></td>
                     <hr>

                 </tr>
                 </thead>
             <tbody>
                 <?php foreach($products as $key => $product) : ?>
                 <tr>
                     <td><?= $product->id ?></td>
                     <td><?= $product->name ?></td>
                     <td class=""><img style="width:200px;" src='<?php echo $product->image ?>'></td>

                     <td><?= number_format($product->price) ?> Đ</td>
                     <td><?= $product->description ?></td>
                     <td><?= $product->quantity ?></td>
                     <td><?= $product->category_id ?></td>


                     <td> <a href="detail.php?id=<?= $product->id ?>" class="btn btn-primary"> Xem chi tiết</a></td>
                     <td> <a href="edit.php?id=<?= $product->id ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                     </td>
                     <td> <a href="delete.php?id=<?= $product->id ?>"
                             onclick="return confirm ('Bạn có chắc muốn xóa không')" class="btn btn-danger"> <i
                                 class="fas fa-trash-alt"></i></a></td>

                 </tr>
                 <?php endforeach; ?>

             </tbody>



         </table>

     </div>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
         integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
     </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
         integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
     </script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
         integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
     </script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
         integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
 </body>

 </html>
<!-- end container-fluid -->
<?php include "footer.php"; ?>

