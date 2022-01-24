<?php
include_once('db.php');
session_start();
// echo '<pre>';
// print_r($_REQUEST);
// echo '</pre>';
//nếu session code tồn tại thì $code = $_SESSION['code'] ngược lại thì $_SESSION['code'] = time();
if(isset($_SESSION['code'])){
$code = $_SESSION['code'];
}else{
    $_SESSION['code'] = time();
}

// echo '<pre>';
// print_r($_REQUEST);
// echo '</pre>';
$db = new db();
$connect = $db->connect();
$sql = "SELECT * FROM products WHERE id = '" . $_GET['id'] . "' ";

$query = $connect->prepare($sql);

$query->execute();

while ($result = $query->fetch(PDO::FETCH_OBJ)) {// dịch ra
    $product = $result;// lấy một đối tượng
    
}
// echo '<pre>';
// print_r($product);
$sql = "INSERT INTO `cart` (`id`, `product_id`, `quantity`, `price`, `code`)
 VALUES (NULL, '$product->id', '".$_REQUEST['quantity']."', '$product->price', '$code');";

 
$query = $connect->prepare($sql);

$query->execute();

// echo "<pre>";
// print_r($sql);
// die();

header('location: cart.php?id=<?=$product->id?>');
