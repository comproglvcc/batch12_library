<?php
session_start();
if (@$_SESSION['user']=='student'){
		include "./utils/BorrowerUtils.php";
		$id=$_GET['stud_id'];
		$borrower= BorrowerUtils::borrower_in($id);
}
?>
<html>
<head>


<link rel="stylesheet" href="./includes/css/try.css" type="text/css" media="screen">
<link rel="stylesheet" href="./includes/css/layout.css" type="text/css" media="screen">
</head>
<div id="background">

	
	
<div id="container">

	<div id="header">
	<img src="./includes/img/logo1.png" width='330' height='150'>	
		<div id="navigation">
		<ul>
			<li id="logout"><a href="logout.php"><img src="./includes/img/nav_icons/logout.png" width='30' height='30'>Log Out</a></li>
			</ul>
		</div>
	</div>

	<div id="content-container">

	<div id = "contentC">
	<div id = "contentC">
	<p style="font-family: 'Impact', Helvetica, Arial, sans-serif;
	font-size: 30px; font-weight: normal;
	text-align: center;
	text-shadow: black 3px 3px 3px;
	color:white; background:#ccc;"><a href="student_transactions.php?id=<?php echo $id; ?>">View Book Transactions</a></p>


	<form action="<?php $_SERVER['PHP_SELF']; ?>" method='POST'>
	

	<div id = "contentC">
	<div id = "contentC">
	<table align='center' style="background-image:url(id.png); width:580px; height:380px; margin-top:60px;" /> 
		<tr>
			<td>
				<table style='padding:15px; margin-top:60px; margin-left:24px; margin-right:8px;'>
				<?php foreach($borrower as $bor): ?>	
				<tr>
					<td> </td>
					<td rowspan='6' style="padding-left:17px;margin-top:40px;margin-left:40px;"><img src="./includes/img/borrowers/<?php echo $bor['student_id'];?>.jpg" border='5' width='140' height='160'/> </td>
				</tr>
				
				
				<tr>
					<td> </td>
					<td> </td>
				</tr>
				
				<tr>
					<td> </td>
					<td> </td>
				</tr>
				
				<tr>
					<td> </td>
					<td> </td>
				</tr>
				
				<tr>
					<td> </td>
					<td> </td>
				</tr>
					
				
				<tr>
				<td rowspan = '2'>
					<table style="margin-top:30px;">
					<tr>
						<td><h4> <?php echo $bor['course']; ?></h4></td>
				
					</tr>
				
					<tr>
					
					<td> <i><b><?php echo $bor['firstname']." ". $bor['lastname']; ?></b></i> </td>
					
					</tr>
					
					<tr>
					
					<td> <?php echo $bor['address']; ?></td>
					</tr> 
				
					<tr>
					
					<td> <?php echo $bor['contact']; ?></td>
					
					</tr>
					</table>
				</td>
				
					<td></td>
					
				</tr>
				

				<tr>
					
					<td style='padding-top:8px;'align='center'><b><?php echo $bor['student_id']; ?> </b></td>
				</tr>				
				 
				<!---
				<tr>
					
					<td align='center' colspan='2'><a href="editBorrower.php?id=<?php echo $id; ?>"><input type='button' value='Edit details' /></a></td>
				</tr>---->

				<?php endforeach; ?>
				</table>
			</td>
		</tr>
		
	</table>
	

</form>

	</div>
	</div>
</div>
</html>
