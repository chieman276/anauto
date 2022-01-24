<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "db.php"; ?>
<?php
// khởi tạo lớp db từ file db.php 
$db = new db();
$connect = $db->connect();

$sql = "SELECT * FROM `users`";

$query = $connect->prepare($sql);
$query->execute();
$users = array();

while ($result = $query->fetch(mode: PDO::FETCH_OBJ)){
    array_push($users, $result);
}
?>


<!-- Start container-fluid -->
<div class="container-fluid">
    <!-- start  -->
    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title">Danh Sách Người Dùng</h4>
            </div>
        </div>
    </div>
    <!-- end -->
    <div class="container-fluid">
        <!-- start  -->
        <div class="row">
            <div class="col-12">
                <a class="btn btn-info" href="user-add.php">Thêm người dùng </a>
                <div class="table-responsive">
                    <table class="table table-bordered m-0">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Birthday</th>
                                <th>Phone</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $key => $user): ?>
                            <tr class="container">
                                <td><?= $user->id ?></td>
                                <td><?= $user->name ?></td>
                                <td> <?= $user->birthday ?></td>
                                <td> <?= $user->phone?></td>
                                <td> <?= $user->password ?></td>
                                <td> <?= $user->email ?></td>
                                <td >
                                <a  href="user-edit.php?id=<?= $user->id ?>" class="btn btn-info">Chỉnh sửa</a>
                                <a href="user-delete.php?id=<?= $user->id ?>" 
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