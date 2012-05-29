<?php

	include "../utils/BookUtils.php";
    if(isset($_POST['submit'])){
         $access = $_POST['baccess'];
         $status = $_POST['status'];
         $idB = $_POST['bId'];
         $addStock = BookUtils::addStock($idB, $access, $status);
    }

    $id = $_REQUEST['id'];
	$result = BookUtils::readBook($id);
	  foreach($result as $book){
       $title=$book['book_title'];
       $stock =$book['stock']+1;
       $idd = $book['book_id'];
   }

?>

<html>
      <head></head>


<form action ="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
<table border='1'>
<tr><td colspan='2' align = 'center'>Add New Book Stock:<b> <?php echo $title; ?></b></br>
        Stock Number:<?php echo $stock; ?></td>
</tr>

<tr>
	<td>Book Item Number :</td>
	<td><input type ='text' id='bId' name='bId' size='28' value=<?php echo $idd; ?>></td>
</tr>

<tr>
	<td>Accession Number :</td>
	<td><input type ='text' id='baccess' name='baccess' size='28'/></td>
</tr>

<tr>
	<td>Status :</td>
	<td><select name = 'status'>
                    <option value ='limited'>Limited</option>
                    <option value ='available'>Available</option>
                    <option value =''></option>
        </td>
</tr>
<tr>
	<td colspan='2' align='center'><input type = 'submit' name='submit' value='submit'/></br><a href="viewStock.php?id=<?php echo $bid; ?>">View Book</a></td>
</tr>
</table>

</form>





</html>