<?php
    include 'PenaltyUtils.php';
    $result = PenaltyUtils::readPenalty();

?>

<html>
      <head></head>

<div align='center'>
<table>
	<tr>
		<td>Add |</td>
		<td>Search</td>
	</tr>
</table>
</div>

      <table border='1'>
		<tr align='center'>
			<td> Book Title </td>
			<td> Book Accession Num</td>
			<td> Borrower Name</td>
			<td> Course</td>
			<td> Amount</td>			
			<td> Balance</td>

		</tr>

			<?php foreach($result as $penalty): ?>
				<tr>
					<td> <?php echo $penalty['book_title']; ?> </td>
					<td> <?php echo $penalty['book_access_num']; ?></td>
					<td> <?php echo $penalty['lname'] . " " .$penalty['name'] ; ?></td>
					<td> <?php echo $penalty['course']; ?> </td>
					<td> <?php echo $penalty['penalty_total']; ?> </td>					
					<td> <?php echo $penalty['balance']; ?> </td>
					<td> <?php echo $penalty['description']; ?> </td>			
					<td><a href="paypenalty.php?id=<?php echo $penalty['penalty_id']; ?>"><input type='button' value='Pay Penalty' /></a></td>
				</tr>
				<?php endforeach; ?>
	</table>


</html>