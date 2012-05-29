<?php
	include 'BookUtils.php';
	$id = $_GET['id'];
	$result = BookUtils::readBook($id);
  foreach($result as $book){
       $title=$book['book_title'];
       $stock =$book['remaining_stock'];
       $copy = $book['copyright'];
       $publisher = $book['publisher'];
       $page = $book['page_number'];
       $fname = $book['firstname'];
       $lname = $book['lastname'];
       $class = $book['class_name'];
       $price = $book['unit_price'];
       $idd = $book['book_id'];

        }
?>
<html>
	<table border='1'>
		<tr>
		<td colspan='2' align='center'><b><?php echo $title; ?></b></br>
		Total Number of Stocks: <?php echo $stock;?></td>
		</tr>

				<tr>
					<td>Copyright: </td><td> <?php echo $copy; ?> </td>
				</tr>
				<tr>
                                	<td>Publisher: </td><td> <?php echo $publisher; ?></td>
				</tr>
				<tr>
                                	<td>Pages: </td><td><?php echo $page; ?> </td>
				</tr>
                                <tr>
                                	<td>Author: </td><td><?php echo $fname; ?> <?php echo $lname; ?></td>
                                </tr>
                                <tr>
                                	<td>Classification: </td><td><?php echo $class; ?> </td>
				</tr>
				<tr>
                                	<td>Unit Price</td><td> <?php echo $price; ?></td>
				</tr>

                                <tr>
					<td colspan='2' align='center'><a href="viewStock.php?id=<?php echo $idd; ?>"><input type='button' value='view Stock' /></a>
					<a href="update.php?id=<?php echo $idd; ?>"><input type='button' value='update' /></a></td>

				</tr>


	</table>
</html>
