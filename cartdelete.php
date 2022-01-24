
<?php include "db.php" ?>
<?php
$id = (isset($_REQUEST['id']) && !empty($_REQUEST['id']) ? ($_REQUEST['id']): "");
$db = new db();
$connect = $db->connect();

$sql = "DELETE FROM `cart` WHERE `cart`.`id` = $id";

$connect->exec($sql);

header("location: cart.php")

?>