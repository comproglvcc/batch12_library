<?php
    include 'TransactionUtils.php';
    $result = TransactionUtils::readTransaction();

?>

<html>
      <head>
		<title>Transaction Records</title>
	  </head>
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
			<td> Book Accession Number </td>
			<td> Borrower ID </td>
			<td> Date Issued</td>
			<td> Date Due</td>
		</tr>

			<?php foreach($result as $trans): ?>
				<tr>
					<td> <?php echo $trans['book_access_num']; ?> </td>
					<td> <?php echo $trans['borrowers_id']; ?></td>
					<td> <?php echo $trans['date_issue']; ?> </td>
					<td> <?php echo $trans['date_due']; ?></td>

					<td><a href="detailsTrans.php?id=<?php echo $trans['trans_id']; ?>"><input type='button' value='Details' /></a></td>
					<td><a href="return.php?id=<?php echo $trans['trans_id']; ?>"><input type='button' value='Return' /></a></td>
					<td><a href="lost.php?id=<?php echo $trans['trans_id']; ?>"><input type='button' value='Lost' /></a></td>
				<tr>

				<?php endforeach; ?>
	</table>


</html>