<?php
session_start();
$id = $_GET['id'];
if(count($_SESSION['cart'])<3 && !in_array($id, $_SESSION['cart'])){
$_SESSION['cart'][] = $id;
}

header("location:accepted.php");

?> 