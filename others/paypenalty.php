<?php
	include 'PenaltyUtils.php';
	@$id = $_GET['id'];
	$result = PenaltyUtils::readPenalty($id);
	foreach($result as $res){
	$penalty_id = $res['penalty_id'];
	}
	$previous_payment = PenaltyUtils::readPreviousPayment($penalty_id);
	if(isset($_POST['submit'])){
	$date = date("Y")."-".date("m")."-".date("d");
	$payment = $_POST['amt'];	
	$results = PenaltyUtils::recordPayment($penalty_id, $date, $payment);
	
	if($result==TRUE){
		$payment_view = PenaltyUtils::readPaymentOfBorrower($penalty_id);
			foreach($payment_view as $view){
				$date = $view['payment_date'];
				$amount = $view['penalty_total'];
				$total_payment = $view['total_payment'];
				$balance = $view['balance'];
				}
		@$view_payments ="<p style='color:white; font-family:Berlin Sans FB; font-size:20px; text-align:left; padding:4px;float: left;
		width: 250px;background:gray;border:inset solid red;margin-bottom:3px;'>
			<b>Date:</b>".$date ."<br/>
			<b>Amount:</b>".$amount ."<br/>
			<b>Total Previous Payment:</b>".$previous_payment."<br/>
			<b>Current Payment:</b>".$payment."<br/>
			<b>Total Payment:</b>".$total_payment ."<br/>
			<b>Balance:</b>".$balance."<br/>
			</p>
		";
		}else{		
		$confirm = "<p style='color:red; font-family:Monotype Corsiva; font-size:20px; text-align:center; padding:4px;float: left;
		width: 500px;background:#FFCCCC;border:groove solid red;margin-bottom:3px;'>Failed to save the payment into record!</p><br/>";
		}
}
	
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
<head>
	<title>Record Payment</title>
</head>

<body>
<table>
		<tr>
			<td><?php echo @$confirm;?></td>
		</tr>
</table>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = 'post'>
	<table>
	<tr>
		<td>Amount: </td>
		<td><input type='text' name='amt' id='amt'/></td>
		<td><input type = 'submit' name='submit' value='submit'/></td>
	</tr>
	<tr>
		<td colspan='3'><?php echo @$view_payments;?>
</td>
	</tr>
	</table>

</form>

</body>

</html>