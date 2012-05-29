<?php
    include '../utils/TransactionUtils.php';
    include '../utils/PenaltyUtils.php';
  @$id = $_GET['id'];
  $date = date("Y")."-".date("m")."-".date("d");
  $access = TransactionUtils::returnBook($id, $date);  
  $update = TransactionUtils::updateBookStatus($access);
  
?>