<?php
  include 'PenaltyUtils.php';
  include 'TransactionUtils.php';
  $id = $_GET['id'];
  $date = date("m")."-".date("d")."-".date("Y");
  $fetch = TransactionUtils::readTransacLost($id);
  print_r($fetch);
  foreach($fetch as $f){
    $idd = $f['trans_id'];
   $access = $f['book_access_num'];
   $book = $f['unit_price'];

  }
  $update = PenaltyUtils::lostBook($idd, $access, $book);

?>