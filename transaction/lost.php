<?php
session_start();
	if (@$_SESSION['user']=='admin'){
    include '../utils/TransactionUtils.php';
    include '../utils/PenaltyUtils.php';

  $id = $_GET['id'];
  $date = date("m")."-".date("d")."-".date("Y");
  $fetch = TransactionUtils::readTransacLost($id);
  foreach($fetch as $f){
    $idd = $f['trans_id'];
   $access = $f['book_access_num'];
   $book = $f['unit_price'];
   

  }
  $update = PenaltyUtils::lostBook($idd, $access, $book);
  echo $idd;
  echo $access;
  echo $book;
 } else {
	 header("location:../admin/admin_restriction.php");
	 }
?>