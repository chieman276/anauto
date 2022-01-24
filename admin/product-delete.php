<?php include "db.php"; ?>
<?php
// echo "<pre>";
// print_r($_REQUEST);
$id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? ($_REQUEST['id']) : "";
$db = new db();
$connect = $db->connect();
$sql =  "DELETE FROM `products` WHERE `products`.`id` = $id";
$connect->exec($sql);
header("location: product-list.php");
?>
