<?php
	include 'BookUtils.php';
	$result = BookUtils::readEachBooks();
?>
<html>

<div align='center'>
<table>
	<tr>
		<td>Add |</td>
		<td>Search</td>
	</tr>
</table>
</div>
	<table border='1'>
		<tr>
			<td> Item Number </td>
			<td> Book Name </td>
			<td> </td>
		</tr>
				
			<?php foreach($result as $book): ?>
				<tr>
					<td> <?php echo $book['book_id']; ?> </td>
					<td> <?php echo $book['book_title']; ?></td>
					<td><a href="eachBook.php?id=<?php echo $book['book_id']; ?>"><input type='button' value='details' /></a></td>
					<td><a href="addStock.php?id=<?php echo $book['book_id']; ?>"><input type='button' value='add Stock' /></a></td>
					<td><a href="viewStock.php?id=<?php echo $book['book_id']; ?>"><input type='button' value='view Stock' /></a></td>
				<tr>

				<?php endforeach; ?>
	</table>
</html>
