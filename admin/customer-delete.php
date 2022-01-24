<?php include "db.php"; ?>
<?php
//lấy id từ url xuống
// khai báo biến id để nhận biến id ở $_REQUEST["id"]
// $id = (isset($_REQUEST["id"]) && !empty($_REQUEST["id"])) ? $_REQUEST["id"] : "";

// echo "<pre>";
// print_r($_REQUEST);
// echo "</pre>";

$id = $_REQUEST['id'];

$db = new db();
$connect = $db->connect();

$sql = "DELETE FROM `customers` WHERE `customers`.`id` = $id";
    //thực thi câu lệnh sql
    $connect->exec($sql);
    //chuyển hướng sang file index.php
    header("location: customer-list.php");


?>