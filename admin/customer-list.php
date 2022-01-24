<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "db.php"; ?>
<?php
// khởi tạo lớp db từ file db.php 
$db = new db();
$connect = $db->connect();

$sql="SELECT * FROM `customers`";

$query = $connect->prepare($sql);
$query->execute();
$customers = array();

while ($result = $query->fetch(mode: PDO::FETCH_OBJ)){
    array_push($customers, $result);
}
?>


<!-- Start container-fluid -->
<div class="container-fluid">
    <!-- start  -->
    <div class="row">
        <div class="col-12">
            <div>
                <!-- <h4 class="header-title">Danh Sách Khách hàng</h4> -->
            </div>
        </div>
    </div>
    <!-- end -->
    <div class="container-fluid">
        <!-- start  -->
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered m-0">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($customers as $key => $customer): ?>
                            <tr class="container">
                                <td><?= $customer->id ?></td>
                                <td><?= $customer->name ?></td>
                                <td> <?= $customer->password ?></td>
                                <td> <?= $customer->email ?></td>
                                <td >
                                <a  href="customer-edit.php?id=<?= $customer->id ?>" class="btn btn-info">Chỉnh sửa</a>
                                <a href="customer-delete.php?id=<?= $customer->id ?>" 
                                class="btn btn-success"
                                onclick="return confirm('Bạn có chắc muốn xóa không!')"
                                >
                                Xóa</a>
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


<?php include "footer.php"; ?>