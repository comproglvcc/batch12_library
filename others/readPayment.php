<?php
include 'PenaltyUtils.php';
$read = PenaltyUtils::readAllPayments();
?>

<html>
<head>
	<title>Read All Payments</title>
</head>

<body>
	<table>
		<tr>
			<td>Name:<td>
			<td><td>
		</tr>
		<tr>
			<td>Course:<td>
			<td><td>
		</tr>
		<tr>
			<td>Obligation:<td>
			<td><td>
		</tr>
	
	<?php foreach($read as $payments):?>
		<tr>
			<td>Date:<td>
			<td><?php echo $payments['payment_date'];?><td>
		</tr>
		<tr>
			<td>Amount:<td>
			<td><?php echo $payments['amount'];?><td>
		</tr>	
	
	</table>
</body>
</html>