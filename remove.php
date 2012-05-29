<?php
session_start();
$id = $_GET['id'];

$key = array_search($id, $_SESSION['cart']);
unset($_SESSION['cart'][$key]);

header("location:searchfile.php");


?>