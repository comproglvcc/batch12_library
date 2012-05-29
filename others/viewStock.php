<?php
	include 'BookUtils.php';
	$id = $_GET['id'];
	$result = BookUtils::readBookstock($id);

  foreach($result as $book){
       $title=$book['book_title'];
       $stock =$book['original_stock'];
        }
?>
<html>

<div align='center'>

</div>
	<table border='1'>

             <tr>
                     <td colspan='2' align='center'><b><?php echo $title; ?></b></td>
             </tr>
                        <tr>
                        	<td colspan='2' align='center'> Total Number of Stocks:<?php echo $stock; ?>
                        	<a href="addStock.php?id=<?php echo $book['book_id']; ?>"><input type='button' value='add another Stock' /></a> </td>
                        </tr>

			<?php foreach($result as $book): ?>
			<tr>
                            <td> Accession Number </td>
                            <td><i> <?php echo $book['accession_num']; ?> </i></td>
                        </tr>
			<tr>
                                 <td> Copyright: </td>
                                 <td><i> <?php echo $book['copyright']; ?> </i></td>
			</tr>
			<tr>
                                 <td> Publisher: </td>
                                 <td><i> <?php echo $book['publisher']; ?></i></td>
			</tr>
			<tr>
                                 <td> Pages: </td>
 		                 <td><i> <?php echo $book['page_number']; ?> </i></td>
			</tr>
			<tr>
                        	<td> Author: </td>
                        	<td><i> <?php echo $book['firstname']; ?> <?php echo $book['lastname']; ?></i></td>
			</tr>
			<tr>
                        	<td> Classification: </td>
                        	<td><i> <?php echo $book['class_name']; ?> </i></td>
			</tr>
			<tr>
                        	<td> Unit Price: </td>
                        	<td><i> <?php echo $book['unit_price']; ?></i></td>
			</tr>
			<tr>
                        	<td> Status: </td>
                        	<td><i> <?php echo $book['status']; ?> </i></td>
			</tr>
                        <tr>
					<td colspan='2' align='center'>
					<a href="deleteBook.php?id=<?php echo $book['book_id']; ?>"><input type='button' value='delete' /></a>
					<a href="update.php?id=<?php echo $book['book_id']; ?>"><input type='button' value='update' /></a>
                                        </td>

                        </tr>

                         <?php endforeach; ?>
	</table>
</html>
