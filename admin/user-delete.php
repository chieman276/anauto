<?php include "db.php" ?>
<?php
$id = (isset($_REQUEST['id']) && !empty($_REQUEST['id']) ? ($_REQUEST['id']): "");
$db = new db();
$connect = $db->connect();

$sql = "DELETE FROM `users` WHERE `users`.`id` = $id";

$connect->exec($sql);

header("location: user-list.php")

?>